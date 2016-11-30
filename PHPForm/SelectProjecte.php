<?php
include("../rao/EstabulariForm_con.php");
session_start();
 
$resultado =  '<option value="0">--------</option>';

$SQL = "
	SELECT DISTINCT PR.* 
	FROM Projecte PR
	INNER JOIN (Investigador I
		INNER JOIN (Procediment P 
			INNER JOIN 	ProcedimentUser PU
			ON 			P.IdProcediment = PU.IdProcediment)
		ON P.IdInvestigador = I.IdInvestigador)	
	ON PR.IdInvestigador = I.IdInvestigador
	WHERE
		PR.Actiu = 0
	AND PU.IdUser = ". $_SESSION["IdUser"]."
	";

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$resultado =  $resultado .  '<option value="'.$row["IdProjecte"].'">'.$row["Projecte"].'</option>'; 
}

echo $_GET["form"]."|".$resultado;
?>