<?php
/* establecer el limitador de caché a 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* establecer la caducidad de la caché a 30 minutos */
session_cache_expire(1);
$cache_expire = session_cache_expire();

session_start();

include("h.php");
include("../../rao/EstabulariForm_con.php"); 

//echo "p:".$_POST["data"];
$c = explode("|",$_POST["data"]);

$u = $c[0];
$DH = DH($c[1]);

//echo "DH:".$DH."<br>";

$a = explode("|",$DH);

//echo "p1:".$a[0].'<br>';
//echo "p2:".sha1($a[0]).'<br>';
//echo "p3:".sha1(sha1($a[0]));

if (verifyTimedHash($a[1],$_SESSION["dsalkdjfkaldjfkldasjfkadjfkjdasf"],$a[0],5))
{
	$p = sha1($a[0]); 
	//$p = $a[0]; 
	
	//echo "\\\\\\\\\\\\\\".$p."/////////////////";

	$aux = 0;
	
	$SQL = "SELECT * FROM Tecnics where User = '".$u. "' AND Password = '". $p."'"; 
	$result = mysql_query($SQL,$oConn);
	
	echo $SQL;
	
	while ($row = mysql_fetch_array($result)){
	$aux = 1;
	
	$_SESSION["Creacio"] = $row["Creacio"];
	$_SESSION["Edicio"] = $row["Edicio"];
	$_SESSION["Noticias"] = $row["Noticias"];
	$_SESSION["Usuarios"] = $row["Usuarios"];
	$_SESSION["WebUsers"] = $row["WebUsers"];
	$_SESSION["Proveidors"] = $row["Proveidors"];
	$_SESSION["Investigadors"] = $row["Investigadors"];
	$_SESSION["Procediments"] = $row["Procediments"];
	$_SESSION["Stock"] = $row["Stock"];
	$_SESSION["Comandes"] = $row["Comandes"];
	$_SESSION["PEmail"] = $row["PEmail"];
	$_SESSION["Fungibles"] = $row["Fungibles"];
	$_SESSION["EspeciesiSoques"] = $row["EspeciesiSoques"];
	$_SESSION["InformeDiari"] = $row["InformeDiari"];
	$_SESSION["InformeFacturacio"] = $row["InformeFacturacio"];
	$_SESSION["IdA"] = $row["IdTecnic"];
	   
	}
	
	mysql_close($oConn);
	
}

//	$_SESSION["Creacio"] = 1;
//	$_SESSION["Edicio"] = 1;
//	$_SESSION["Noticias"] = 1;
//	$_SESSION["Usuarios"] = 1;

echo $aux;

?>