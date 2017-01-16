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

$OrdreT = " ORDER BY U.diaFestiu " . $ASCDESC;




  echo
  ' 
<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';
$SQL = "SELECT U.IdFestiu, U.diaFestiu from Festiu U ". $OrdreT;

$result = mysql_query($SQL,$oConn);



while ($row = mysql_fetch_array($result))
{
	
			
  echo'
  <tr>	
	  <td id="TDRowFestiu'.$row["IdFestiu"].'"  onclick="SelectRowFestiu('.$row["IdFestiu"].');" style="cursor:pointer;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="140px" class="GridLine'.$i.'">'.SelectFecha($row["diaFestiu"]).'</td>
			  <td align="right" class="GridLine'.$i.'"><button class="ButtonX" onclick="deleteFestiu('.$row["IdFestiu"].');" title="Eliminar festiu"></button></td>	
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

