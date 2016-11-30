<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 
require("../dompdf/dompdf_config.inc.php"); 

$id = $_GET["id"];
$op = $_GET["op"];
 
switch($op)
{
	case 1: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMenu WHERE IdLinMenu = " . $id;
				break;
	case 2: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMD WHERE  IdLinMD = " . $id;
				break;

}

/////Primero compruebo que no se trate de un nodo padre

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$Titol = $row["Titol"];
	$Titol = Quita($Titol);
	
	$Contingut = $row["Contingut"];
	//$Contingut = Quita($Contingut);
	//$IdCap = $row["IdCapMenu"];
}

$Text = utf8_decode(
	'<p><b>'.$Titol.'</b></p><br><br><p>'.$Contingut.'</p>');


$dompdf = new DOMPDF();
$dompdf->load_html($Text);
$dompdf->render();
$dompdf->stream("../PDF/".$id."_".$op."sample.pdf");

?>