<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("ComandaCap.php"); 
include("DadesEcon.php"); 
include("Procediment.php"); 
include("Recollida.php"); 
include("Observacions.php"); 
include("ComprovaStock.php");
include("MOVStockPublic.php");

//Resp:Resp,CC:CC,RC:RC,FR:FR,HR:HR,LR:LR,aux:aux,NumProc:NumProc

session_start();

//$Resp = Pon($_POST["Resp"]);
$CC = $_POST["CC"];
//$RC = $_POST["RC"];
$NProc = $_POST["NumProc"];
$FR = $_POST["FR"];
$HR = $_POST["HR"];
$LR = $_POST["LR"];
$aux = $_POST["aux"];
$VM = $_POST["VM"];
$SAC = $_POST["Sacrifici"];


$Obs = $_POST["Obs"];

//echo "-----".$aux."-----</br>";

if(!$CC||!$NProc||!$FR||!$HR||!$LR||!$aux){
	exit ("Ha ocorregut un error quan s'intentava guardar la comanda. Es possible que el teu ordinador tingui guardada una versió antiga de la web a la caché. Per solucionar-ho neceteja la caché del teu navegador polsant Control+R o mayuscula + F5 i reinicia la página. Si el problema persisteix, posat en contacte amb el Centre de Recursos Docents de la Facultat de Medicina al 93 581 40 55");
}

if (!$aux||(count($aux)==0)){ 
	echo "Hi ha hagut un error al tramitar la comanda, si us plau actualitzi la pàgina amb F5 i torni a provar d'omplir-la ";
	return false;
}

$IdCC= ComandaCap(1,$NProc,$CC);
//DadesEcon($IdCC,$Resp, $CC, $RC);
if ($Obs) Observacions($IdCC,$Obs);
Recollida($IdCC,$FR,$HR,$LR,$VM,$SAC);
//FrangHor($IdCC,$Horari);

$hoy = date("Y-m-d");

/////////////////////////////// PetAnimProd

	$validado = 1; ///Variable que nos permitira volver atras en el caso que no hayan animales

	$todo = explode("#",$aux);


	//print_r($todo);
	
	foreach ($todo as $linea){
	
		$cadena = explode("|",$linea);	
		
		//echo "cadena:".print_r($cadena);
		
		if ($validado == 1)
		{
			
			if($cadena[2]){
				$fechaNac = InsertFecha($cadena[2]);
				$idProcLinea = $cadena[4];
			}
			else {
				if($cadena[5]!= "3"){	/// el de 1 o 2 dias no entra			
					//$fechaNac = date('Y-m-d');
					$fechaNac = new DateTime(InsertFecha($_POST["FR"])); 
					//echo 'fechaNac:'.$fechaNac->format('Y-m-d').'</br>';
					//$fechaNac = strtotime('-'.$cadena[5].' day');
					$fechaNac->sub(new DateInterval('P'.$cadena[5].'D'));
					//echo 'fechaNac:'.$fechaNac.'</br>';
					$fechaNac = $fechaNac->format('Y-m-d');
					
				}else{$fechaNac = "null";}
				
				$idProcLinea = 12;
				
				
				//echo $fechaNac->format('Y-m-d');	
			}
			
			
			//echo "-----".$cadena[5].":";
			//echo $fechaNac."-----";

			if ($cadena[5]){
				$crias = $cadena[5];
			}else{
				$crias = 0;
			}
			if ($fechaNac != "null"){
			
				$SQL = "INSERT INTO PetAnimProd(IdComandaCap, IdSoca, Cantidad, FechaNac, Sexo, IdProcediment, Estado,IdUser, CT, Crias) VALUES ($IdCC,".$cadena[0].",".$cadena[1].",'".$fechaNac."','".$cadena[3]."','".$idProcLinea."',0,". $_SESSION["IdUser"].",0,'".$crias."')";
			}else{
				$SQL = "INSERT INTO PetAnimProd(IdComandaCap, IdSoca, Cantidad, FechaNac, Sexo, IdProcediment, Estado,IdUser, CT, Crias) VALUES ($IdCC,".$cadena[0].",".$cadena[1].",".$fechaNac.",'".$cadena[3]."','".$idProcLinea."',0,". $_SESSION["IdUser"].",0,'".$crias."')";
			}
			$result = mysql_query($SQL,$oConn);
			
			if (mysql_error($oConn)) die("ERROR:".mysql_error($oConn)."-------".$SQL);
			//echo $SQL;
			
			//Seco y cantidad ,,
			$UniMas = 0;
			$UniFam = 0;
			
			if ($cadena[3] == "M") $UniMas = $cadena[1];
			else $UniFam = $cadena[1];


			// Creo el movimiento de venta en el stock inicial del IProd de la linea
			//echo "MOVStockGuarda(".$cadena[0].", ".$UniMas.", ".$UniFam.", ".$hoy.", 5,".$idProcLinea.", ".$fechaNac.", ".$IdCC.", ".$cadena[5].")";
			
			//echo $cadena[5];
			if ($cadena[5] != "3"){
				if (($validado == 1)||($cadena[5])) $validado = MOVStockGuarda($cadena[0],$UniMas,$UniFam,$hoy,5,$idProcLinea,$fechaNac,$IdCC,$cadena[5]);	
				// Creo el movimiento de compra en el stock final del IdProc ComandaCap
				if (($validado == 1)||($cadena[5])) $validado = MOVStockGuarda($cadena[0],$UniMas,$UniFam,$hoy,3,$NProc,$fechaNac,$IdCC,$cadena[5]);
				//Creo el movimiento de reserva en el NProc de comanda.
				if (($validado == 1)||($cadena[5])) $validado = MOVStockGuarda($cadena[0],$UniMas,$UniFam,$hoy,6,$NProc,$fechaNac,$IdCC,$cadena[5]);
			}
			
			
					
			$bloc = $i+1;
			
			if ($validado != 1){
				echo "No hi han animals suficients al bloc ".$bloc.", degut a que un altre usuari ha finalitzat abans la seva comanda.";
				EliminaloTodo($IdCC, $oConn);
				return false;
			}
			
			//echo "////////".$validado."\\\\\\\\\\";
			
///////////////////////////////////////////
		}
	}
	
	/////En el caso de que haya ocurrido un error (debido posiblemente a que alguien haya hecho un pedido mientras este se lo pensaba, borrar todos los rastros.)
function EliminaloTodo($IdCC, $oConn)
	{
		//Borro movimientos de STOCK
		$SQL = "DELETE FROM AnimalMOVCap WHERE IdComandaCap =".$IdCC;
		$result = mysql_query($SQL,$oConn);
		//Borro movimientos de PetAnimProd
		$SQL = "DELETE FROM PetAnimProd WHERE IdComandaCap =".$IdCC;
		$result = mysql_query($SQL,$oConn);
		//Borro Recogida
		$SQL = "DELETE FROM Recollida WHERE IdComandaCap =".$IdCC;
		$result = mysql_query($SQL,$oConn);
		//Borro Obnservaciones
		$SQL = "DELETE FROM Obs WHERE IdComandaCap =".$IdCC;
		$result = mysql_query($SQL,$oConn);
		//Borro Comanda de ComandaCap
		$SQL = "DELETE FROM ComandaCap WHERE IdComandaCap =".$IdCC;
		$result = mysql_query($SQL,$oConn);
		
		//echo $mensaje;
	}
	//////
	
	

	
?>