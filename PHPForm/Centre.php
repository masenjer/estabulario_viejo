<?php
function GuardaCentre($IdCC,$NomCentre,$DirCentre,$PaisCentre,$PersCentre,$TelCentre,$EmailCentre,$NReg)
{
	include("../rao/EstabulariForm_con.php");

	$SQL = "INSERT INTO Centre(IdComandaCap, Nom, Adreca,  Pais, Contacte, Telefon, Email, NumReg) VALUES ($IdCC,'$NomCentre', '$DirCentre', '$PaisCentre','$PersCentre', '$TelCentre', '$EmailCentre','$NReg')";
	$result = mysql_query($SQL,$oConn);
	
}
?>