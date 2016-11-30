<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

session_start();

///T:T,ER:ER,D:D

$Niu = Pon($_GET["Niu"]);
$U = Pon($_GET["U"]);
$P = Pon($_GET["P"]);
$N = Pon($_GET["N"]);
$C = Pon($_GET["C"]);
$T = Pon($_GET["T"]);
$E = Pon($_GET["E"]);
$I = Pon($_GET["I"]);
$ER = Pon($_GET["ER"]);
$D = Pon($_GET["D"]);

if (!$Niu) $Niu = "NULL";

	if ($P)
	{
		$P = sha1($P);
		$P = sha1($P);
		
		$password = "Password = '".$P."',";
	}


//Niu,U,P1,P2,N,C,E,I
	$SQL = "SELECT * FROM Users WHERE User = '$U' AND IdUser <> ".$_GET["id"];
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$error = 1;	/// Comprova que no existeix un altre usuari amb el mateix User
	}

	$SQL = "UPDATE Users SET 
			User = '$U',
			".$password."
			NIU = $Niu,
			Nom = '$N',
			Cognoms = '$C',
			Telefono = '$T', 
			Email = '$E',
			Investigador = '$I',
			EmailInvestigador = '$ER',
			Centro = '$D'
			WHERE IdUser = ".$_GET["id"];	
			
	//echo $SQL;	
	
	if (!$error)$result = mysql_query($SQL,$oConn);
	
echo $error;
?>