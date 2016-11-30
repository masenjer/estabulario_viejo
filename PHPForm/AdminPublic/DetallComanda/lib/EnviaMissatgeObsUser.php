<?php
	include("../../../../rao/EstabulariForm_con.php");
	include("../../../../rao/PonQuita.php");
	session_start();
	
	$IdCC = $_POST["id"];
	$Obs = $_POST["Obs"];
	
	$SQL = " INSERT INTO Obs(IdComandaCap, Obs, IdUser, Fecha, Hora)VALUES($IdCC,'".Pon($Obs)."',".$_SESSION["IdUser"].",CURDATE(), CURTIME())";
	$result = mysql_query($SQL,$oConn);
	
	$SQL = " UPDATE ComandaCap SET AvisT = 1 WHERE IdComandaCap =".$IdCC;
	$result = mysql_query($SQL,$oConn);	
	
	echo $IdCC;
?>