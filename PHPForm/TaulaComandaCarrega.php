<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CercaClientCarregaDIV.php");
include("CercaTipusComandaCarregaDIV.php");
include("CercaFinalitzatCarregaDIV.php");

error_reporting(0);

$i = 0;

list($DIVClient,$InputCodiClient) = explode("###",CarregaCercaDIVClient(""));
list($DIVTipusComanda,$InputTipusComanda) = explode("###",CarregaCercaDIVTipusComanda(""));
list($DIVFinalitzat,$InputFinalitzat) = explode("###",CarregaCercaDIVFinalitzat(""));

$Ordre = "CC.Fecha|1";
//
echo '


<table width="100%" id="TableCapAssignatures" cellpadding="0" cellspacing="0">
  <tr class="CapcaGrid" valign="bottom">
	  <td class="CapcaGrid" width="35px"> 
	  </td>
	  <td width="100px" class="CapcaGrid" valign="middle"id="OrdenaFecha" onclick="OrdenaComandes(\'CC.Fecha\',1);"> 
	  	  Data
	  </td>
	  <td width="100px" class="CapcaGrid" valign="middle" id="OrdenaNumComanda" onclick="OrdenaComandes(\'CC.IdComandaCap\',1);" >
		  Comanda
	  </td>
	  <td width="200px" class="CapcaGrid" valign="middle" id="OrdenaClient" onclick="OrdenaComandes(\'U.Cognoms, U.Nom\',0);" >
		 Client
	  </td>
	  
	  <td width="100px" class="CapcaGrid" valign="middle" id="OrdenaProcediment" onclick="OrdenaComandes(\'P.NumProc\',0);">
		  Procediment
	  </td>
	  
	  <td width="260px" class="CapcaGrid" valign="middle" id="OrdenaTipusComanda" onclick="OrdenaComandes(\'TC.TipusComanda\',0);">
		  Tipus de Comanda
	  </td>

 	  <td width="90px" class="CapcaGrid" valign="middle" id="OrdenaFinalitzat" onclick="OrdenaComandes(\'CC.Facturada\',0);">
		  Estat
	  </td>

  </tr>
';
 
 
  ////Barra de filtradores
  echo
  ' 
  <tr class="CercaGrid" valign="bottom">
	   <td class="CercaGrid"></td>
	   <td class="CercaGrid">
	      <input type="text" id="FiltraData" class="txtSearch" value="">
	      <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaComandes();">
	  </td>	  
	  <td class="CercaGrid">
		  <input type="text" id="FiltraComanda" class="txtSearch" value="">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaComandes();">
	  </td>	
	  <td class="CercaGrid" align="right" style="padding-right:10px" onclick="$(\'#DIVClient\').slideDown(\'slow\');"">
	  	<img src="img/Grid/FlechaCombo.png" align="right">
	  </td>	  
	  <td class="CercaGrid">
		  <input type="text" id="FiltraProcediment" class="txtSearch" value="">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaComandes();">
	  </td>	  
	  <td class="CercaGrid" align="right" style="padding-right:10px" onclick="$(\'#DIVTipusComanda\').slideDown(\'slow\');"">
	  	<img src="img/Grid/FlechaCombo.png" align="right">
	  </td>	  
	  <td class="CercaGrid" align="right" style="padding-right:10px" onclick="$(\'#DIVFacturada\').slideDown(\'slow\');"">
	  	<img src="img/Grid/FlechaCombo.png" align="right">
	  </td>	  
  </tr>
  <tr>
  	<td></td>
  	<td></td>
  	<td align="left">'.$DIVClient.'</td>
  	<td></td>
  	<td align="left">'.$DIVTipusComanda.'</td>
  	<td align="left">'.$DIVFinalitzat.'</td>
  </tr>
</table>
  $%&#<table width="100%" cellpadding="0" cellspacing="0">';

$SQL = "SELECT TC.TipusComanda, P.NumProc, CC.Fecha, CC.IdComandaCap, CC.TipusForm, CC.IdProcediment, CC.Facturada, U.Nom, U.Cognoms,CC.AvisT 
		FROM  Users U,ComandaCap CC 
			LEFT JOIN Procediment P ON (P.IdProcediment = CC.IdProcediment) 
			INNER JOIN TipusComanda TC ON (TC.IdTipusComanda = TipusForm) 
		WHERE U.IdUser = CC.IdUsuari 
		AND CC.Facturada <> 2 
		ORDER BY CC.AvisT DESC, CC.Facturada ASC, CC.IdComandaCap DESC LIMIT 500";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($row["AvisT"]== 1) $AvisM = '<img src="img/sobre.png" style="width:22px;">';
	else $AvisM = '<div style="width:22px;"></div>';
	
	switch($row["Facturada"])
	{
		case "0":	$facturada = "Pendent";
					$class = "ButtonComandesEstatSel0";
					break;	
		case "1":	$facturada = "En Curs";
					$class = "ButtonComandesEstatSel1";
					break;	
		case "2":	$facturada = "Finalitzat";
					$class = "ButtonComandesEstatSel2";
					break;	
	}
			
  echo'
  <tr>	
	  <td id="TDRowComandes'.$row["IdComandaCap"].'"  onclick="SelectRowComanda('.$row["IdComandaCap"].');" style="cursor:pointer;'.$styleTR.'" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
		  	  <td width="22px" class="GridLine'.$i.'">'.$AvisM.'</td>
			  <td class="GridLine'.$i.'"><div style="width:80px" >'.SelectFecha($row["Fecha"]).'</div></td>
			  <td class="GridLine'.$i.'"><div style="width:90px">'.$row["IdComandaCap"].'</div></td>
			  <td class="GridLine'.$i.'"><div style="width:170px">'.$row["Cognoms"].', '.$row["Nom"].'</div></td>
			  
			  <td class="GridLine'.$i.'"><div style="width:80px">'.$row["NumProc"].'</div></td>
			  <td class="GridLine'.$i.'"><div style="width:220px">'.$row["TipusComanda"].'</div></td>
			  
			  <td class="GridLine'.$i.'"><div style="width:60px"><input type="button" class="'.$class.'" value="'.$facturada.'"></div></td>
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>$%&#'.$InputCodiClient.'$%&#'.$InputTipusComanda.'$%&#'.$InputFinalitzat;//.'$%&#'.$Ordre;

?>