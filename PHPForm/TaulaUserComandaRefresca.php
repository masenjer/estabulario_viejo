<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CercaClientCarregaDIV.php");
include("CercaTipusComandaCarregaDIV.php");
include("CercaFinalitzatCarregaDIV.php");
include("CadenaFiltres.php");

session_start();

$i = 0;
$Filtre= "";

$FiltreText = FiltreText($_POST["filtre"]);

$SelectedRow = $_POST["SelectedRow"];

$Ordre2 = $_POST["Ordre"];
$Ordre = explode("|",$Ordre2);

if ($Ordre[1] == '0') $ASCDESC = " ASC";
else $ASCDESC = " DESC";

$OrdreT = " ORDER BY " .$Ordre[0]. $ASCDESC;

if(!$_POST["CodiClient"])$FiltreClient = "vacia";
else $FiltreClient = $_POST["CodiClient"];

if(!$_POST["TipusComanda"]) $FiltreComanda = "vacia";
else $FiltreComanda = $_POST["TipusComanda"];

if(!$_POST["Finalitzat"]) $FiltreFinalitzat = "vacia";
else $FiltreFinalitzat = $_POST["Finalitzat"];

//list($DIVClient,$InputCodiClient) = explode("###",CarregaCercaDIVClient($_FiltreClient));
//list($DIVTipusComanda,$InputTipusComanda) = explode("###",CarregaCercaDIVTipusComanda($_FiltreComanda));
//list($DIVFinalitzat,$InputFinalitzat) = explode("###",CarregaCercaDIVFinalitzat($FiltreFinalitzat));
//
//$FiltreCodiClient = CreaCadenaFiltreNum($_POST["CodiClient"],"CC.IdUsuari");
$FiltreTipusComanda = CreaCadenaFiltreNum($_POST["TipusComanda"],"CC.TipusForm");
$FiltreFinalitzat = CreaCadenaFiltreNum($_POST["Finalitzat"],"CC.Facturada");

if ($FiltreTipusComanda != "")
{
	$Filtre	= " AND ".$FiltreTipusComanda;	
	if($FiltreFinalitzat != "")
	{
		$Filtre	= $Filtre . " AND ".$FiltreFinalitzat;
	}
}
else
{
	if($FiltreFinalitzat != "")
	{
		$Filtre	= " AND ".$FiltreFinalitzat;
	}	
}

if (($Filtre != "")&&($FiltreText != ""))
{
	$Coletilla = " AND ";
}
 
  ////Barra de filtradores
  
  $valorFT = explode("|",$_POST["filtre"]);
  
  echo
  ' 
<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';
$SQL = "SELECT P.NumProc, CC.Fecha, CC.IdComandaCap, CC.TipusForm, CC.IdProcediment, CC.Facturada, U.Nom, U.Cognoms from ComandaCap CC, Users U, Procediment P WHERE U.IdUser = CC.IdUsuari AND P.IdProcediment = CC.IdProcediment AND CC.IdUsuari = " . $_SESSION["IdUser"] . $Filtre. $Coletilla . $FiltreText . $OrdreT;
//
//echo "													Filtre:".$Filtre;
//echo "													Coletilla:".$Coletilla;
//echo "													FiltreText:".$FiltreText;
//echo "													OrdreT:".$OrdreT;
//echo "                                                              SQL: ".$SQL ."                                                                                    ";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	switch($row["TipusForm"])
	{
		case "0": 	$TitolTipus = "Reserva d'espais i equips al SE";
					break;	
		case "1": 	$TitolTipus = "Petició d' animals estabulats al SE";
					break;	
		case "2": 	$TitolTipus = "Petició de famelles acoblades";
					break;	
		case "3": 	$TitolTipus = "Compra d'animals";
					break;	
		case "4": 	$TitolTipus = "Compra de dietes, jaços i caixes de transp";
					break;	
		case "5": 	$TitolTipus = "Compra de fàrmacs, desinfectats i fungibles";
					break;	
		case "6": 	$TitolTipus = "Hormonació i encreuaments";
					break;	
		case "7": 	$TitolTipus = "Encreuaments";
					break;	
		case "8": 	$TitolTipus = "Gàbies / Animals";
					break;	
		case "9": 	$TitolTipus = "Importació";
					break;	
		case "10": 	$TitolTipus = "Exportació";
					break;	
		case "11": 	$TitolTipus = "Sol·licitut d'espai per allotjament animals";
					break;	
		case "12": 	$TitolTipus = "Avís d'arribada paqueteria demanada proveidor";
					break;	
		case "13": 	$TitolTipus = "Accés puntual al SE";
					break;	
		case "14": 	$TitolTipus = "Accés fora horari al SE";
					break;	
		case "15": 	$TitolTipus = "Autorització entrada al SE";
					break;	
		case "16": 	$TitolTipus = "Entrada de materials a la planta baixa";
					break;	
					
	}
	
	switch($row["Facturada"])
	{
		case "0":	$facturada = "Pendent";
					$class = "ButtonComandesEstatSel0";
					break;	
		case "1":	$facturada = "En Curs";
					$class = "ButtonComandesEstatSel1";
					break;	
		case "2":	$facturada = "Finalitzat";
					$class = "ButtonComandesEstatSel2";
					break;	
	}


	
	if ($row["IdComandaCap"] == $SelectedRow ) $color = 'background-color:orange;';
	else $color = "";
			
  echo'
  <tr>	
	  <td id="TDRowComandes'.$row["IdComandaCap"].'"  onclick="SelectRowUserComanda('.$row["IdComandaCap"].');" style="cursor:pointer;'.$color.'">
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="110px" class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			  <td width="100px" class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			  
			  <td width="90px" class="GridLine'.$i.'">'.$row["NumProc"].'</td>
			  <td width="280px" class="GridLine'.$i.'">'.$TitolTipus.'</td>
			  
			  <td width="60px" class="GridLine'.$i.'"><input type="button" class="'.$class.'" value="'.$facturada.'"></td>
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>';

?>

