<?php
include("../../../rao/EstabulariForm_con.php");
include("../../../rao/PonQuita.php");

$id = $_POST["id"];
$val = Pon($_POST["val"]);

$SQL = "UPDATE FrangHor SET Deniega = '".$val."' where IdFrangHor = ".$id;
$result = mysql_query($SQL,$oConn);

echo $_POST["idCC"];

?>