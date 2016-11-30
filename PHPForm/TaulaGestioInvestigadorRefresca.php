<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");

$i = 0;

$SelectedRow = $_POST["SelectedRow"];

$Ordre2 = $_POST["Ordre"];
$Ordre = explode("|",$Ordre2);

if ($Ordre[1] == '0') $ASCDESC = " ASC";
else $ASCDESC = " DESC";

$OrdreT = " ORDER BY " .$Ordre[0]. $ASCDESC;




  echo
  ' 
<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';
$SQL = "SELECT U.IdInvestigador, U.Nom, U.Cognoms, U.Departament from Investigador U ". $OrdreT;

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	
			
  echo'
  <tr>	
	  <td id="TDRowInvestigador'.$row["IdInvestigador"].'"  onclick="SelectRowInvestigador('.$row["IdInvestigador"].');" style="cursor:pointer;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="140px" class="GridLine'.$i.'">'.$row["Nom"].'</td>
			  <td width="310px" class="GridLine'.$i.'">'.$row["Cognoms"].'</td>			  
			  <td width="220px" class="GridLine'.$i.'">'.$row["Departament"].'</td>		  
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>';

?>

