<?php
include("../rao/EstabulariForm_con.php");

//NIUInves:NIUInves,:,:NProc,:NOrden,:id

$NIUInves = $_GET["NIUInves"];
$Inves = $_GET["Inves"];
$NProc = $_GET["NProc"];
$NOrden = $_GET["NOrden"];
$Estat = $_GET["Estat"];
$id = $_GET["id"];
$idE = $_GET["idE"];

$msg = 1;

if (!$NIUInves) $NIUInves =0; 

if ($id == "")
{
	$SQL = "SELECT * FROM Procediment WHERE NumProc = '$NProc'";
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$msg = "El número de procedimiento introducido ya se encuentra en la base de datos y no se puede duplicar";
	}
	
	if	($msg == 1)
	{
		$SQL = "INSERT INTO Procediment(IdInvestigador, NumProc,NumOrdre, Estat, IdEspecie) VALUES ($Inves, '$NProc', '$NOrden', $Estat, $idE)";
		$result = mysql_query($SQL,$oConn);
		
		$SQL = "SELECT IdProcediment FROM Procediment ORDER BY IdProcediment DESC LIMIT 1 ";
		$result = mysql_query($SQL, $oConn);
		
		while($row = mysql_fetch_array($result))
		{
			$id = $row["IdProcediment"];	
		}
	}
}
else
{
	$SQL = "UPDATE Procediment SET 
					IdInvestigador=$Inves,
					NumProc='$NProc',
					NumOrdre='$NOrden',
					IdEspecie=$idE,
					Estat = $Estat 
					WHERE IdProcediment = $id ";
	$result = mysql_query($SQL,$oConn);
}

echo $msg."|".$id;
?>