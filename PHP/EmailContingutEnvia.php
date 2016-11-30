<?php
include("../rao/sas_con.php");
include("../rao/PonQuita.php"); 

//////:id, :op, :nom, :origen, :desti

$id = $_POST["id"];
$op = $_POST["op"];

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
	$Contingut = str_replace('src="../Images', 'src="http://serveiassistencialdesalut.uab.cat/Images', $Contingut);
}

$nom = $_POST["nom"];
$origen = $_POST["origen"];
$desti = $_POST["desti"];
$TA = $_POST["TA"];

$mensaje = '
<html>
<body>
<p><font face="verdana" size="1">Mail enviat per '.$nom.'</font></p>
<p>'.$TA.'</p>
<table border="0">
  <tr>
    <td><font face="verdana" size="1"><strong>'.$Titol.'</strong></font></td>
  </tr>
  <tr>
    <td><font face="verdana" size="1">'.$Contingut.'</font></td>
  </tr>
  <tr>
  	<td height="20px"></td>
  <tr>
  <tr>
  	<td align="left"><a href="http://serveiassistencialdesalut.uab.cat/#'.$id.'_'.$op.'">Per a m&eacute;s informaci&oacute; feu clic aquí</a></td>
  </tr>
</table>
</body>
</html>';



$asunto = 'En '.$nom.' vol compartir amb tu una informació sobre el Servei Assistencial de Salut';

$sheader="From:".$origen ."\nReply-To:".$desti."\n";
$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
$sheader=$sheader."Mime-Version: 1.0\n";
$sheader=$sheader."Content-Type: text/html;  charset=utf-8";

mail($desti,$asunto,$mensaje,$sheader);

echo $mensaje;//"Email enviat correctament";

?>