<?php
function ComandaCap($Tipus, $NProc, $CC)
{
	include("../rao/EstabulariForm_con.php");
	session_start();
	
	if ($CC)
	{
		$CC1 = ", IdProjecte";
		$CC2=", ".$CC;	
	}
	
	$hoy = InsertFecha(date("d/m/Y"));
	
	if ($NProc)
	$SQL = " INSERT INTO ComandaCap(Fecha, TipusForm, IdUsuari, IdProcediment".$CC1." ,Facturada)VALUES('$hoy',$Tipus,".$_SESSION["IdUser"].",$NProc".$CC2.",0)";
	else
	$SQL = " INSERT INTO ComandaCap(Fecha, TipusForm, IdUsuari".$CC1.", Facturada)VALUES('$hoy',$Tipus,".$_SESSION["IdUser"].$CC2.",0)";

	$result = mysql_query($SQL,$oConn);
	
	$SQL = " SELECT IdComandaCap from ComandaCap where IdUsuari = ".$_SESSION["IdUser"] ." Order by IdComandaCap Desc Limit 1";
	$result = mysql_query($SQL,$oConn);
	while ($row = mysql_fetch_array($result))
	{
		$IdCC = $row["IdComandaCap"];
	}
	
	return $IdCC;
}
?>