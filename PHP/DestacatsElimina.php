<?php
include("../rao/sas_con.php");

$id = $_GET["id"];
$IMG = $_GET["IMG"];

if ($IMG)
{
	unlink('../ImgDes/'.$IMG);	
}

$SQL = "DELETE FROM Destacat WHERE IdDestacat =".$id;
$result = mysql_query($SQL,$oConn);

echo $id;
?>