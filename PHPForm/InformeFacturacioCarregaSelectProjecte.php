<?php
include("../rao/EstabulariForm_con.php");
session_start();
 
$resultado =  '<option value="">-------------------</option>';

if ($_GET["IP"])
{
	$SQL = " 
		SELECT PR.IdProjecte, PR.Projecte 
		FROM Projecte PR
		INNER JOIN (Investigador I
			INNER JOIN (Procediment P 
				INNER JOIN 	ProcedimentUser PU
				ON 			P.IdProcediment = PU.IdProcediment)
			ON P.IdInvestigador = I.IdInvestigador)	
		ON PR.IdInvestigador = I.IdInvestigador
		WHERE I.IdInvestigador = ". $_GET["IP"] ."
		GROUP BY PR.IdPRojecte, PR.Projecte";
	
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
		$resultado =  $resultado .  '<option value="'.$row["IdProjecte"].'">'.$row["Projecte"].'</option>'; 
	}
}
echo $resultado;
?>