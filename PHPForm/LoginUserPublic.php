<?php

include("../rao/EstabulariForm_con.php");
include("../PHP/h.php");

/* establecer el limitador de caché a 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* establecer la caducidad de la caché a 30 minutos */
session_cache_expire(1);
$cache_expire = session_cache_expire();

session_start();
$aux = 0;

//echo "p:".$_POST["data"];
$c = explode("|",$_POST["data"]);

$u = $c[0];

//echo "c[1]: ".$c[1]."----------";

$DH = DH($c[1]);

//echo "DH:".$DH."<br>";

$a = explode("|",$DH);

//echo "p1:".$a[0].'<br>';
//echo "p2:".sha1($a[0]).'<br>';
//echo "p3:".sha1(sha1($a[0]));

//echo "---".verifyTimedHash($a[1],$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"],$a[0],5)."---";

if (verifyTimedHash($a[1],$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"],$a[0],5))
{
	$p = sha1($a[0]); 
	
	//echo "p:".$p."--------";

	$SQL = "SELECT * FROM Users where User = '".$u. "' AND Password = '". $p."'"; 
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result)){
	$aux = 1;
	if ($row["Validado"] == "2")
	{
		$_SESSION["IdUser"] = $row["IdUser"];
		$Nom = $row["Nom"] ." ". $row["Cognoms"];
		$Mailing = $row["Mailing"];
	}
	
	if ($row["Validado"] == "0") $aux = 3;
	if ($row["Validado"] == "1") $aux = 4;
	   
	}
}
mysql_close($oConn);

echo $aux."|".$Nom."|".$Mailing;

?>