<?php
include("../rao/EstabulariForm_con.php");

$A = $_POST["A"];
$C = $_POST["C"];

$SQL = "SELECT Email from Users WHERE Mailing = 1 and Validado = 2 ";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$sheader="From:s.estabulari@uab.cat\nReply-To:s.estabulari@uab.cat\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	
	mail($row["Email"],$A,$C,$sheader);
}


?>