<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CercaClientCarregaDIV.php");
include("CercaTipusComandaCarregaDIV.php");
include("CercaFinalitzatCarregaDIV.php");

session_start();


$i = 0;

list($DIVClient,$InputCodiClient) = explode("###",CarregaCercaDIVClient(""));
list($DIVTipusComanda,$InputTipusComanda) = explode("###",CarregaCercaDIVTipusComanda(""));
list($DIVFinalitzat,$InputFinalitzat) = explode("###",CarregaCercaDIVFinalitzat(""));

$Ordre = "CC.Fecha|0";
//
echo '


<table width="100%" id="TableCapAssignatures" cellpadding="0" cellspacing="0">
  <tr class="CapcaGrid" valign="bottom">
	  <td width="100px" class="CapcaGrid" valign="middle"id="OrdenaFecha" onclick="OrdenaUserComandes(\'CC.Fecha\',0);"> 
	  	  Data
	  </td>
	  <td width="100px" class="CapcaGrid" valign="middle" id="OrdenaNumComanda" onclick="OrdenaUserComandes(\'CC.IdComandaCap\',0);" >
		  Comanda
	  </td>	  
	  <td width="100px" class="CapcaGrid" valign="middle" id="OrdenaProcediment" onclick="OrdenaUserComandes(\'P.NumProc\',0);">
		  Procediment
	  </td>
	  
	  <td width="260px" class="CapcaGrid" valign="middle" id="OrdenaTipusComanda" onclick="OrdenaUserComandes(\'CC.TipusForm\',0);">
		  Tipus de Comanda
	  </td>
 	  <td width="90px" class="CapcaGrid" valign="middle" id="OrdenaFinalitzat" onclick="OrdenaUserComandes(\'CC.Facturada\',0);">
		  Finalitzat
	  </td>

  </tr>
';
 
 
  ////Barra de filtradores
  echo
  ' 
  <tr class="CercaGrid" valign="bottom">
	   <td class="CercaGrid">
	      <input type="text" id="FiltraData" class="txtSearch" value="">
	      <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaUserComandes();">
	  </td>	  
	  <td class="CercaGrid">
		  <input type="text" id="FiltraComanda" class="txtSearch" value="">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaUserComandes();">
	  </td>	
	  <td class="CercaGrid">
		  <input type="text" id="FiltraProcediment" class="txtSearch" value="">
		  <img src="img/Grid/lupa.png" onclick="ResfrescaTaulaUserComandes();">
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
  	<td></td>
  	<td align="left">'.$DIVTipusComanda.'</td>
  	<td align="left">'.$DIVFinalitzat.'</td>
  </tr>
</table>
  $%&#<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';

$SQL = "SELECT P.NumProc, CC.Fecha, CC.IdComandaCap, CC.TipusForm, CC.IdProcediment, CC.Facturada, U.Nom, U.Cognoms from ComandaCap CC, Users U, Procediment P WHERE U.IdUser = CC.IdUsuari AND P.IdProcediment = CC.IdProcediment AND CC.IdUsuari = ".$_SESSION["IdUser"]." Order by CC.IdComandaCap DESC";
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	switch($row["TipusForm"])
	{
		case "0": 	$TitolTipus = "Reserva d'espais i equips al SE";
					break;	
		case "1": 	$TitolTipus = "Petició d' Animals Produits al SE";
					break;	
		case "2": 	$TitolTipus = "Petició de famelles acoblades";
					break;	
		case "3": 	$TitolTipus = "Compra d'animals";
					break;	
		case "4": 	$TitolTipus = "Compra de dietes, jaços i caixes de transp";
					break;	
		case "5": 	$TitolTipus = "Compra de fàrmacs, desinfectats i fungibles";
					break;	
		case "6": 	$TitolTipus = "Hormonació i encreuaments";
					break;	
		case "7": 	$TitolTipus = "Encreuaments";
					break;	
		case "8": 	$TitolTipus = "Gàbies / Animals";
					break;	
		case "9": 	$TitolTipus = "Importació";
					break;	
		case "10": 	$TitolTipus = "Exportació";
					break;	
		case "11": 	$TitolTipus = "Sol·licitut d'espai per allotjament animals";
					break;	
		case "12": 	$TitolTipus = "Avís d'arribada paqueteria demanada proveidor";
					break;	
		case "13": 	$TitolTipus = "Accés puntual al SE";
					break;	
		case "14": 	$TitolTipus = "Accés fora horari al SE";
					break;	
		case "15": 	$TitolTipus = "Autorització entrada al SE";
					break;	
		case "16": 	$TitolTipus = "Entrada de materials a la planta baixa";
					break;	
					
	} 
			
  echo'
  <tr>	
	  <td id="TDRowComandes'.$row["IdComandaCap"].'"  onclick="SelectRowComanda('.$row["IdComandaCap"].');" style="cursor:pointer;" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="90px" class="GridLine'.$i.'">'.SelectFecha($row["Fecha"]).'</td>
			  <td width="100px" class="GridLine'.$i.'">'.$row["IdComandaCap"].'</td>
			  
			  <td width="90px" class="GridLine'.$i.'">'.$row["NumProc"].'</td>
			  <td width="280px" class="GridLine'.$i.'">'.$TitolTipus.'</td>
			  
			  <td width="60px" class="GridLine'.$i.'">'.$row["Facturada"].'</td>
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>$%&#'.$InputCodiClient.'$%&#'.$InputTipusComanda.'$%&#'.$InputFinalitzat.'$%&#'.$Ordre;

?>