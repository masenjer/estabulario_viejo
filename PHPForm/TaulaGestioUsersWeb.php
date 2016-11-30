<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CercaUsersWebValidat.php");

$i = 0;

list($DIVFinalitzat,$InputFinalitzat) = explode("###",CarregaCercaUsersWebValidat(""));

$Ordre = "U.Cognoms|0";
//
echo '


<table width="840px" id="TableCapAssignatures" cellpadding="0" cellspacing="0">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="100px" class="CapcaGrid" valign="middle"id="OrdenaNIUUsersWeb" onclick="OrdenaTaulaUsersWeb(\'U.NIU\',0);"> 
	  	  NIU
	  </td>
	  <td width="150px" class="CapcaGrid" valign="middle" id="OrdenaNomUsersWeb" onclick="OrdenaTaulaUsersWeb(\'U.Nom\',0);" >
		  Nom
	  </td>
	  <td width="260px" class="CapcaGrid" valign="middle" id="OrdenaCognomsUsersWeb" onclick="OrdenaTaulaUsersWeb(\'U.Cognoms, U.Nom\',0);" >
		 Cognoms
	  </td>
	  <td width="230px" class="CapcaGrid" valign="middle" id="OrdenaDepartamentUsersWeb" onclick="OrdenaTaulaUsersWeb(\'U.Centro\',0);">
		  Centre
	  </td>
 	  <td width="110px" class="CapcaGrid" valign="middle" id="OrdenaEstatUsersWeb" onclick="OrdenaTaulaUsersWeb(\'U.Validado\',0);">
		  Estat
	  </td>

  </tr>
';
 
 
  ////Barra de filtradores
  echo
  ' 
  <tr class="CercaGrid" valign="bottom">
	   <td class="CercaGrid">
	      <input type="text" id="FiltraNIUUsersWeb" class="txtSearch" value="" style="width:75px">
	      <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaGestioUsersWeb();">
	  </td>	  
	  <td class="CercaGrid">
		  <input type="text" id="FiltraNomUsersWeb" class="txtSearch" value="" style="width:125px">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaGestioUsersWeb();">
	  </td>	
	  <td class="CercaGrid">
		  <input type="text" id="FiltraCognomsUsersWeb" class="txtSearch" value="" style="width:235px">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaGestioUsersWeb();">
	  </td>	
	  <td class="CercaGrid">
		  <input type="text" id="FiltraDepartamentUsersWeb" class="txtSearch" value="" style="width:200px">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaGestioUsersWeb();">
	  </td>	  
	  <td class="CercaGrid" align="right" style="padding-right:10px" onclick="$(\'#DIVUsersWebValidat\').slideDown(\'slow\');"">
	  	<img src="img/Grid/FlechaCombo.png" align="right">
	  </td>	  
  </tr>
  <tr>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td></td>
  	<td align="left">'.$DIVFinalitzat.'</td>
  </tr>
</table>
  $%&#<table width="100%" id="TableUsersWeb" cellpadding="0" cellspacing="0">';

$SQL = "SELECT U.IdUser, U.NIU, U.Nom, U.Cognoms, U.Centro, U.Validado from Users U Order by U.Cognoms, U.Nom ASC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	
	switch($row["Validado"])
	{
		case "0":	$facturada = "Pendent";
					$class = "ButtonComandesEstatSel1";
					break;	
		case "1":	$facturada = "Denegat";
					$class = "ButtonComandesEstatSel0";
					break;	
		case "2":	$facturada = "Validat";
					$class = "ButtonComandesEstatSel2";
					break;	
	}
			
  echo'
  <tr>	
	  <td id="TDRowUsersWeb'.$row["IdUser"].'"  onclick="SelectRowUsersWeb('.$row["IdUser"].');" style="cursor:pointer;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="90px" class="GridLine'.$i.'">'.$row["NIU"].'</td>
			  <td width="140px" class="GridLine'.$i.'">'.$row["Nom"].'</td>
			  <td class="GridLine'.$i.'">'.$row["Cognoms"].'</td>			  
			  <td width="220px" class="GridLine'.$i.'">'.$row["Centro"].'</td>		  
			  <td width="80px" class="GridLine'.$i.'"><input type="button" class="'.$class.'" value="'.$facturada.'"></td>
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>$%&#'.$InputFinalitzat.'$%&#'.$Ordre;

?>