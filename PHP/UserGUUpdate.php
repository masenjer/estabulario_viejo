<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

////id:id,N:N,A:A,E:E,U:U,P:P,R1:R1,R2:R2,R3:R3,R4:R4

$N = $_GET["N"];
$N = Pon($N);
$A = $_GET["A"];
$A = Pon($A);
$E = $_GET["E"];
$U = $_GET["U"];
$P = $_GET["P"];
$R1 = $_GET["R1"];
$R2 = $_GET["R2"];
$R3 = $_GET["R3"];
$R4 = $_GET["R4"];
$R5 = $_GET["R5"];
$R6 = $_GET["R6"];
$R7 = $_GET["R7"];
$R8 = $_GET["R8"];
$R9 = $_GET["R9"];
$R10 = $_GET["R10"];
$R11 = $_GET["R11"];
$R12 = $_GET["R12"];
$R13 = $_GET["R13"];
$R14 = $_GET["R14"];
$R15 = $_GET["R15"];

$id = $_GET["id"];

	if ($P)
	{
		$P = sha1($P);
		$P = sha1($P);
		
		$password = "Password = '".$P."',";
	}


if ($id == "")
{	
	$SQL = "INSERT INTO Tecnics(Nom, Cognoms, Email, User, Password, Usuarios, Creacio, Edicio, Noticias, WebUsers, Proveidors, Investigadors, Procediments, Stock, Comandes, PEmail, Fungibles, EspeciesiSoques, InformeFacturacio, InformeDiari) VALUES ('$N','$A','$E','$U','$P',$R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$R14,$R15)";
	echo $SQL;
	$result = mysql_query($SQL,$oConn);
	
//	$SQL2 = "SELECT IdUser FROM Users ORDER BY IdUser DESC LIMIT 1";
//	$result2 = mysql_query($SQL2,$oConn);
//	
//	while($row = mysql_fetch_array($result2))
//	{
//		$id = $row["IdUser"]; 	
//	}

}
else
{
	$SQL = "UPDATE Tecnics SET 
				Nom = '$N',
				Cognoms = '$A', 
				Email = '$E', 
				User = '$U', 
				".$password."
				Usuarios = $R1,
				Creacio = $R2,
				Edicio = $R3,
				Noticias = $R4,
				WebUsers = $R5,
				Proveidors = $R6,
				Investigadors = $R7,
				Procediments = $R8,
				Stock = $R9,
				Comandes = $R10,  
				PEmail = $R11,  
				Fungibles = $R12,  
				EspeciesiSoques = $R13,  
				InformeFacturacio = $R14,  
				InformeDiari = $R15  
				WHERE IdTecnic = $id";
	$result = mysql_query($SQL,$oConn);
}

echo $SQL;
?>