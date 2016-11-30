<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");

$op = $_GET["op"];

if ($op == "0") $titol= "habituals";
else $titol = "transg&egrave;nics";
 
//
echo '


<table width="200px" id="TableCapAssignatures" cellpadding="0" cellspacing="0" style="border:1px solid #9e9885"">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="100px" class="CapcaGrid"> 
	  	  Prove&iuml;dors '.$titol.'
	  </td>
  </tr>
';
 

$SQL = "SELECT * FROM Proveidor Where Tipus = ".$op." Order by NomProveidor ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$aux = $row["Actiu"] + 3;
  echo'
  <tr  class="GridLine'.$aux.'">	
	  <td style="cursor:pointer; padding-left:10px;" onclick="CanviaVisibilitatProveidor('.$row["IdProveidor"].','.$row["Actiu"].','.$op.')">
	  	'.$row["NomProveidor"].'
	  </td>
  </tr>
';
  
}
echo '<tr><td height="100%"></td></tr></table>'; 

?>