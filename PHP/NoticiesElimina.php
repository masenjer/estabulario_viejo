<?php
include("../rao/sas_con.php");

$id = $_GET["id"];
$IMG = $_GET["IMG"];

if ($IMG)
{
	unlink('../ImgNot/'.$IMG);	
}

$SQL = "DELETE FROM Noticias WHERE IdNoticia =".$id;
$result = mysql_query($SQL,$oConn);

echo $id;
?>