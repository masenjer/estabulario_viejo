<?php

if (!$SESSION["IdA"]){
	include("../../rao/EstabulariForm_con.php");
	include("../../rao/PonQuita.php"); 
	include("../../PHP/Fechas.php"); 
	include("Recollida.php"); 
	include("ArribadaProveidor.php"); 
	include("ExpoFecha.php"); 
	include("Devolucio.php"); 
	include("FrangHor.php"); 
	include("UsuarisFH.php"); 
	include("Centre.php"); 
	include("Procedencia.php"); 
	include("Caixes.php"); 
	include("00.php"); 
	include("01.php"); 
	include("02.php"); 
	include("03.php"); 
	include("04y05.php"); 
	include("06.php"); 
	include("07.php"); 
	include("08.php"); 
	include("09.php"); 
	include("10.php"); 
	include("11.php"); 
	include("12.php"); 
	include("13.php"); 
	include("14.php"); 
	include("15.php"); 
	include("16.php"); 
	include("Obs.php");
	include("BotonsEstatComanda.php");
	include("lib/SelectEstatLinies.php");
	include("Missatgeria.php");
	include("../SelectSetGramsDies.php");
	
	session_start();
	
	$id = $_GET["id"];
	
	//$SQL = "SELECT Responsable, CentreCost, ReservaCredit FROM DadesEcon WHERE IdComandaCap=".$id ;
	//$result = mysql_query($SQL,$oConn);
	//
	//while ($row = mysql_fetch_array($result))
	//{
	//	echo 
	//	'<table width="100%" cellpadding="0" cellspacing="5" border="0">
	//		<tr>
	//			<td align="left"><b>Responsable: </b>'.$row["Responsable"].'</td>
	//			<td align="center"><b>Centre Gestor: </b>'.$row["CentreCost"].'</td>
	//			<td align="right"><b>Reserva de Crèdit</b>: '.$row["ReservaCredit"].'</td>
	//		</tr>	
	//	</table>'; 
	//	
	//	
	//}
	//echo '#o#o#';
	
	$SQL = "SELECT TipusForm, Facturada, IdProcediment, IdProjecte, AvisT FROM ComandaCap WHERE IdComandaCap=".$id ;
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$TP = $row["TipusForm"];
		$Estat = $row["Facturada"];
		$IdProc = $row["IdProcediment"];
		$AvisT = $row["AvisT"];
		
		if ($row["IdProjecte"])
		{
			$SQL2 = "SELECT I.Nom,I.Cognoms, P.Projecte 
					FROM ComandaCap CC
					INNER JOIN 	Projecte P 
								
					ON 			P.IdProjecte = CC.IdProjecte
					
					INNER JOIN (Procediment PP
								INNER JOIN Investigador I 
								ON I.IdInvestigador = PP.IdInvestigador)
								
					ON		PP.IdProcediment = CC.IdProcediment	 
					WHERE 	CC.IdComandaCap=".$id;
			$result2 = mysql_query($SQL2,$oConn);
			
			//echo $SQL2;
			
			while ($row2 = mysql_fetch_array($result2))
			{
				echo 
				'<table width="100%" cellpadding="0" cellspacing="5" border="0">
					<tr>
						<td align="left" width="300px"><b>Investigador: </b>'.$row2["Nom"].' '.$row2["Cognoms"].'</td>
						<td align="left"><b>Centre Gestor o Projecte: </b>'.$row2["Projecte"].'</td>
						<td ></td>
					</tr>	
				</table>'; 
			}
				
		}
		echo '#o#o#';
	}
	
	switch($TP)
	{
		case "0":	
		case "2":	
		case "3":	
		case "4":
		case "8":
		case "10":		
		case "16":	
		case "5":	$imprimir = '
						<td align="left">
							<input type="button" value="Imprimir albar&agrave;" onclick="ImprimirAlbara('.$id.');">
						</td>';
					break;
		
		case "1":	$imprimir = '
						<td align="left">
							<input type="button" value="Imprimir albar&agrave;" onclick="ImprimirAlbaraPetAnimProd('.$id.');">
						</td>';
					break;
					
		case "6":	$imprimir = '
						<td align="left">
							<input type="button" value="Imprimir albar&agrave;" onclick="ImprimirAlbara('.$id.');">
						</td>
						<td align="left">
							<input type="button" value="Imprimir etiquetes" onclick="ImprimirEtiquetes('.$id.',\'HormoyCruces\');">
						</td>';
					break;
		
		case "7":	$imprimir = '
						<td align="left">
							<input type="button" value="Imprimir albar&agrave;" onclick="ImprimirAlbara('.$id.');">
						</td>';
						/*'<td align="left">
							<input type="button" value="Imprimir etiquetes" onclick="ImprimirEtiquetes('.$id.',\'Cruces\');">
						</td>';*/
					break;
		
		case "13":
		case "15":	$imprimir = '
						<td align="left">
							<input type="button" value="Imprimir Autoritzaci&oacute; d\'Entrada" onclick="ImprimirAutoEntrada('.$id.','.$TP.');">
						</td>';
					break;
	
	}
	//if (($TP=="0")||($TP=="1")||($TP=="2")||($TP=="3")||($TP=="4")||($TP=="5"))
	//$imprimir = '<td align="left"><input type="button" value="Imprimir albar&agrave;" onclick="ImprimirAlbara('.$id.');"></td>';
	
	switch ($TP)
	{
		case "0":	CarregaDetallComanda0($id);
					break;
		case "1":	CarregaDetallComanda1($id,$IdProc);
					break;
		case "2":	CarregaDetallComanda2($id);
					break;
		case "3":	CarregaDetallComanda3($id);
					break;
		case "4":	CarregaDetallComanda4($id,0);
					break;
		case "5":	CarregaDetallComanda4($id,3);
					break;
		case "6":	CarregaDetallComanda6($id);
					break;
		case "7":	CarregaDetallComanda7($id);
					break;
		case "8":	CarregaDetallComanda8($id);
					break;
		case "9":	CarregaDetallComanda9($id);
					break;
		case "10":	CarregaDetallComanda10($id);
					break;
		case "11":	CarregaDetallComanda11($id);
					break;
		case "12":	CarregaDetallComanda12($id); 
					break;
		case "13":	CarregaDetallComanda13($id); 
					break;
		case "14":	CarregaDetallComanda14($id); 
					break;
		case "15":	CarregaDetallComanda15($id); 
					break;
		case "16":	CarregaDetallComanda16($id); 
					break;
	}
	
	echo '#o#o#';
	
		MostraObservacions($id);
		MostraMissatgeria($id);
//		if ($Estat!= "2")MostraMissatgeria($id);
		
	echo '#o#o#';
	
	echo '
		<table width="100%">
			<tr>
				'.$imprimir.'
				<td align="right">'.MostraBotonsEstatComanda($id,$Estat).'</td>
			</tr>
		</table>
	';
	
	echo '#o#o#';
	
	if ($Estat == "0") echo $id;
	
	echo '#o#o#';
	if ($AvisT == "1") echo $id;
}
else echo "Caducada";
?>