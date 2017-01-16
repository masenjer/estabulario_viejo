<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");

$i = 0;

$Ordre = "U.diaFestiu|0";
//
echo '

<table width="300px" id="TableCapAssignatures" cellpadding="0" cellspacing="0">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="150px" class="CapcaGrid" valign="middle" id="OrdenaNomFestiu" onclick="OrdenaTaulaFestiu(\'U.diaFestiu\',0);" >
		  Dia
	  </td>
	  

  </tr>
';
 
 
  ////Barra de filtradores
  echo
  ' 
  $%&#<table width="100%" id="TableFestiu" cellpadding="0" cellspacing="0">';

$SQL = "SELECT U.IdFestiu, U.diaFestiu from Festiu U Order by U.diaFestiu ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{	
  echo'
  <tr>	
	  <td id="TDRowFestiu'.$row["IdFestiu"].'"  onclick="SelectRowFestiu('.$row["IdFestiu"].');" style="cursor:pointer;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="140px" class="GridLine'.$i.'">'.SelectFecha($row["diaFestiu"]).'</td>
			  <td  class="GridLine'.$i.'" style="text-align:right"><button class="ButtonX" onclick="deleteFestiu('.$row["IdFestiu"].');" title="Eliminar festiu"></button></td>			    
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