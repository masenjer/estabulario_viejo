<?php
session_start();
session_destroy();

	$_SESSION["Creacio"] = "";
	$_SESSION["Edicio"] = "";
	$_SESSION["Noticias"] = "";
	$_SESSION["Usuarios"] = "";
	$_SESSION["WebUsers"] = "";
	$_SESSION["Proveidors"] = "";
	$_SESSION["Investigadors"] = "";
	$_SESSION["Procediments"] = "";
	$_SESSION["Stock"] = "";
	$_SESSION["Comandes"] = "";
	$_SESSION["PEmail"] = "";
	$_SESSION["Fungibles"] = "";
	$_SESSION["EspeciesiSoques"] = "";
	$_SESSION["InformeDiari"] = "";
	$_SESSION["InformeFacturacio"] = "";
	$_SESSION["IdA"] = "";//$row["IdUser"];
	$_SESSION["IdUser"] = "";
?>