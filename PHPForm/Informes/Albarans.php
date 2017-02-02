<?php

//error_reporting(E_ALL); 
//ini_set("display_errors", 1); 

include("../../rao/EstabulariForm_con.php");
include("../../rao/PonQuita.php"); 
include("../../PHP/Fechas.php"); 
include("DetallAlbara/MaketaInforme.php"); 
include("DetallAlbara/Recollida.php"); 
include("DetallAlbara/Devolucio.php"); 
include("DetallAlbara/FrangHor.php"); 
include("DetallAlbara/UsuarisFH.php"); 
include("DetallAlbara/Centre.php"); 
include("DetallAlbara/Procedencia.php"); 
include("DetallAlbara/Caixes.php"); 
include("DetallAlbara/00.php"); 
include("DetallAlbara/01.php"); 
include("DetallAlbara/02.php"); 
include("DetallAlbara/03.php"); 
include("DetallAlbara/04y05.php"); 
include("DetallAlbara/06.php"); 
include("DetallAlbara/07.php"); 
include("DetallAlbara/08.php"); 
include("DetallAlbara/09.php"); 
include("DetallAlbara/10.php"); 
include("DetallAlbara/11.php"); 
include("DetallAlbara/12.php"); 
include("DetallAlbara/13.php"); 
include("DetallAlbara/14.php"); 
include("DetallAlbara/15.php"); 
include("DetallAlbara/16.php"); 
include("DetallAlbara/Obs.php");
include("DetallAlbara/DadesUsuari.php");
include("DetallAlbara/DadesEstabulari.php");
include("DetallAlbara/lib/SelectEstatLinies.php");

include("../SelectSetGramsDies.php");

require("../../dompdf/autoload.inc.php");   


session_start();

$id = $_GET["id"];

$SQL = "
		SELECT CC.TipusForm, CC.Facturada, CC.IdProcediment, P.NumProc, CC.IdUsuari, CC.IdProjecte  
		FROM ComandaCap CC
		LEFT JOIN Procediment P ON P.IdProcediment = CC.IdProcediment 
		WHERE CC.IdComandaCap=".$id ;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$TP = $row["TipusForm"];
	$IdProc = $row["IdProcediment"];
	$IdU = $row["IdUsuari"];
	$idP = $row["IdProjecte"];
	$NumProc = $row["NumProc"];
}

$text = '
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Header and Footer example</title>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 0.5cm 0;
	text-align: justify;
}

p{
	padding:20px;
	padding-left:0px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	font-weight:bold;
}

.titolForm{
	width:100%;
	text-align:center;
	color: #000;
	background-color:#ddd;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12pt;
	font-weight:bold;
	padding:20px;

}

td{
	border:none;
}

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
	color: #aaa;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10pt;
}

#header {
  top: 0;
	border-bottom: 0.1pt solid #aaa;
}

#footer {
  bottom: 0;
  border-top: 0.1pt solid #aaa;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-number {
  text-align: center;
}

.page-number:before {
  content: "Page " counter(page);
}

.GridLine0{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	padding-left:5px;
	padding-right:5px;
	height:15px;
	vertical-align:middle;
	text-align:left;
	background-color:#FFF;
}

.GridLine1{
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	background-color:#eee;
	padding-left:5px;
	padding-right:5px;
	height:15px;
	vertical-align:middle;
	text-align:left;
	
}

.CapcaGrid{
	background-color:#999;
	border-style:solid;
	border-width:1px;
	border-color:#999;
	border-top:none;
	border-left:none;
	font-family:Verdana, Geneva, sans-serif;
	font-size:11pt;
	font-weight:bold;
	color:#FFF;
	vertical-align:middle;
	height:15px;
	text-align:center;
}


hr {
  page-break-after: always;
  border: 0;
}

</style>
  
</head>
<body>

	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="left" width="100%">'.MostraDadesEstabulari().'</td>
			<td align="right">'.MostraDadesUsuari($IdU).'</td>
		</tr>
	</table>
	<br>
';

		$text .=  
		'
		<table>
			<tr>
				<td colspan="2">
					<b>Data de l\'albarà:</b> '.date("d/m/Y").'
				</td>
			</tr>		
			<tr>
				<td colspan="2">
					<b>Número d\'albarà:</b> '.$id.'
				</td>
			</tr>		
				
		</table>
		
		<br>
';

if ($idP)
{
		$SQL = "SELECT IP.Nom as NomProcediment,IP.Cognoms as CognomsProcediment, IE.Nom as NomProjecte,IE.Cognoms as CognomsProjecte, P.Projecte 
				FROM ComandaCap CC
				INNER JOIN 	(Projecte P 
							 INNER JOIN Investigador IE 
							ON IE.IdInvestigador = P.IdInvestigador)			
				ON 			P.IdProjecte = CC.IdProjecte
				
				INNER JOIN (Procediment PP
							INNER JOIN Investigador IP 
							ON IP.IdInvestigador = PP.IdInvestigador)
							
				ON		PP.IdProcediment = CC.IdProcediment	 
				WHERE 	CC.IdComandaCap=".$id;
	if(!$result = mysql_query($SQL,$oConn))DIE("ERROR:".mysql_error());
	
	//echo $SQL;
	while ($row = mysql_fetch_array($result))
	{
		$text.='
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left"><b>Responsable étic: </b>'.$row["NomProcediment"].' '.$row["CognomsProcediment"].'</td>
			</tr>
			<tr>
				<td align="left"><b>Número de projecte étic: </b>'.$NumProc.'</td>
				
			</tr>
			</table>
		
		<br>
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left"><b>Responsable econòmic: </b>'.$row["NomProjecte"].' '.$row["CognomsProjecte"].'</td>
			</tr>
			<tr>
				<td align="left"><b>Número de projecte econòmic: </b>'.$row["Projecte"].'</td>
				
			</tr>	
		</table><br><br>'; 
	}
	
	
}


switch ($TP)
{
	case "0":	$text .= CarregaDetallComanda0($id);
				break;
	case "1":	$text .= CarregaDetallComanda1($id,$IdProc);
				break;
	case "2":	$text .= CarregaDetallComanda2($id);
				break;
	case "3":	$text .= CarregaDetallComanda3($id);
				break;
	case "4":	$text .= CarregaDetallComanda4($id,0);
				break;
	case "5":	$text .= CarregaDetallComanda4($id,3);
				break;
	case "6":	$text .= CarregaDetallComanda6($id);
				break;
	case "7":	$text .= CarregaDetallComanda7($id);
				break;
	case "8":	$text .= CarregaDetallComanda8($id);
				break;
	case "9":	$text .= CarregaDetallComanda9($id);
				break;
	case "10":	$text .= CarregaDetallComanda10($id);
				break;
	case "11":	$text .= CarregaDetallComanda11($id);
				break;
	case "12":	$text .= CarregaDetallComanda12($id); 
				break;
	case "13":	$text .= CarregaDetallComanda13($id); 
				break;
	case "14":	$text .= CarregaDetallComanda14($id); 
				break;
	case "15":	$text .= CarregaDetallComanda15($id); 
				break;
	case "16":	$text .= CarregaDetallComanda16($id); 
				break;
}

	

$text .= MostraObservacions($id).'<br><br><br><br>Firma

</body></html>
';

//
//	$text .= MostraObservacions($id);
//	
	//echo utf8_decode($text);
//	

//echo $text;

	use Dompdf\Dompdf;



	$dompdf = new Dompdf();
	$dompdf->loadHtml($text); 
	$dompdf->render();
	$dompdf->stream("albara".$id);

?>
