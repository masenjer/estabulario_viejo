<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");

$i = 0;

$Ordre = "U.Cognoms|0";
//
echo '


<table width="700px" id="TableCapAssignatures" cellpadding="0" cellspacing="0">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="150px" class="CapcaGrid" valign="middle" id="OrdenaNomInvestigador" onclick="OrdenaTaulaInvestigador(\'U.Nom\',0);" >
		  Nom
	  </td>
	  <td width="320px" class="CapcaGrid" valign="middle" id="OrdenaCognomsInvestigador" onclick="OrdenaTaulaInvestigador(\'U.Cognoms, U.Nom\',0);" >
		 Cognoms
	  </td>
	  <td width="230px" class="CapcaGrid" valign="middle" id="OrdenaDepartamentInvestigador" onclick="OrdenaTaulaInvestigador(\'U.Departament\',0);">
		  Centre
	  </td>

  </tr>
';
 
 
  ////Barra de filtradores
  echo
  ' 
  $%&#<table width="100%" id="TableInvestigador" cellpadding="0" cellspacing="0">';

$SQL = "SELECT U.IdInvestigador, U.Nom, U.Cognoms, U.Departament from Investigador U Order by U.Cognoms, U.Nom ASC";
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
echo '<tr><td height="100%"></td></tr></table>$%&#'.$Ordre;

?>