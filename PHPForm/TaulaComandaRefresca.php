<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CercaClientCarregaDIV.php");
include("CercaTipusComandaCarregaDIV.php");
include("CercaFinalitzatCarregaDIV.php");
include("CadenaFiltres.php");

$i = 0;
$Filtre= "";

$FiltreText = FiltreText($_POST["filtre"]);

$SelectedRow = $_POST["SelectedRow"];

if ($_POST["Ordre"])
{
	$Ordre2 = $_POST["Ordre"];

	$Ordre = explode("|",$Ordre2);
	
	if ($Ordre[1] == '0') $ASCDESC = " ASC";
	else $ASCDESC = " DESC";
	
	$OrdreT = " ORDER BY CC.AvisT DESC, " .$Ordre[0]. $ASCDESC;
}
else
{
	$OrdreT = " Order by CC.AvisT DESC, CC.Facturada ASC, CC.IdComandaCap DESC	";
}
if(!$_POST["CodiClient"])$FiltreClient = "vacia";
else $FiltreClient = $_POST["CodiClient"];

if(!$_POST["TipusComanda"]) $FiltreComanda = "vacia";
else $FiltreComanda = $_POST["TipusComanda"];

//echo "1:".$_POST["TipusComanda"]."<br>";

if(!$_POST["Finalitzat"]) $FiltreFinalitzat = "vacia";
else $FiltreFinalitzat = $_POST["Finalitzat"];

//list($DIVClient,$InputCodiClient) = explode("###",CarregaCercaDIVClient($_FiltreClient));
//list($DIVTipusComanda,$InputTipusComanda) = explode("###",CarregaCercaDIVTipusComanda($_FiltreComanda));
//list($DIVFinalitzat,$InputFinalitzat) = explode("###",CarregaCercaDIVFinalitzat($FiltreFinalitzat));
//
$FiltreCodiClient = CreaCadenaFiltreNum($_POST["CodiClient"],"CC.IdUsuari");
$FiltreTipusComanda = CreaCadenaFiltreNum($_POST["TipusComanda"],"CC.TipusForm");
$FiltreFinalitzat = CreaCadenaFiltreNum($_POST["Finalitzat"],"CC.Facturada");

//echo "2:".$FiltreTipusComanda."<br>";


if ($FiltreCodiClient != "")
{
	$Filtre	= " AND ".$FiltreCodiClient;
	if ($FiltreTipusComanda != "")
	{
		$Filtre	= $Filtre . " AND ".$FiltreTipusComanda;	
		if($FiltreFinalitzat != "")
		{
			$Filtre	= $Filtre . " AND ".$FiltreFinalitzat;
		}
	}
	else
	{
		if($FiltreFinalitzat != "")
		{
			$Filtre	= $Filtre . " AND ".$FiltreFinalitzat;
		}	
	}
}
else
{
	if ($FiltreTipusComanda != "")
	{
		$Filtre	= " AND ".$FiltreTipusComanda;	
		if($FiltreFinalitzat != "")
		{
			$Filtre	= $Filtre . " AND ".$FiltreFinalitzat;
		}
	}
	else
	{
		if($FiltreFinalitzat != "")
		{
			$Filtre	= " AND ".$FiltreFinalitzat;
		}	
	}
}

if (($Filtre != "")&&($FiltreText != ""))
{
	$Coletilla = " AND ";
}
 
  ////Barra de filtradores
  
  $valorFT = explode("|",$_POST["filtre"]);
  
  echo
  ' 
<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';
$SQL = "SELECT TC.TipusComanda, P.NumProc, CC.Fecha, CC.IdComandaCap, CC.TipusForm, CC.IdProcediment, CC.Facturada, U.Nom, U.Cognoms, CC.AvisT 
		FROM  Users U,ComandaCap CC 
		LEFT JOIN Procediment P ON (P.IdProcediment = CC.IdProcediment) 
		INNER JOIN TipusComanda TC ON (TC.IdTipusComanda = TipusForm)
		WHERE U.IdUser = CC.IdUsuari " . $Filtre . $Coletilla . $FiltreText . $OrdreT;

//echo "													Filtre:".$Filtre."<br><br><br>";
//echo "													Coletilla:".$Coletilla."<br><br><br>";
//echo "													FiltreText:".$FiltreText."<br><br><br>";
//echo "													OrdreT:".$OrdreT."<br><br><br>";
//echo "                                                              SQL: ".$SQL ."<br><br><br>";  
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
	
	if($row["IdComandaCap"]== $SelectedRow) $styleTR = " background-color:orange;";
	else $styleTR = "";
			
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
echo '<tr><td height="100%"></td></tr></table>';

?>

