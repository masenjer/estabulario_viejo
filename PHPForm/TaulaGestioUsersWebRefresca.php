<?php
include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");
include("CadenaFiltres.php");

$i = 0;
$Filtre= "";

$FiltreText = FiltreTextUsersWeb($_POST["filtre"]);

$SelectedRow = $_POST["SelectedRow"];

$Ordre2 = $_POST["Ordre"];
$Ordre = explode("|",$Ordre2);

if ($Ordre[1] == '0') $ASCDESC = " ASC";
else $ASCDESC = " DESC";

$OrdreT = " ORDER BY " .$Ordre[0]. $ASCDESC;


$FiltreValidado = CreaCadenaFiltreNum($_POST["Validado"],"U.Validado");

if ($FiltreValidado != "")$Filtre	= " WHERE ".$FiltreValidado;
else $FiltreValidado = "";

if (($Filtre != "")&&($FiltreText != ""))
{
	$Coletilla = " AND ";
}
  
  echo
  ' 
<table width="100%" id="TableAssignatures" cellpadding="0" cellspacing="0">';
$SQL = "SELECT U.IdUser, U.NIU, U.Nom, U.Cognoms, U.Centro, U.Validado from Users U " . $Filtre. $Coletilla . $FiltreText . $OrdreT;

//
//echo "													Filtre:".$Filtre;
//echo "													Coletilla:".$Coletilla;
//echo "													FiltreText:".$FiltreText;
//echo "													OrdreT:".$OrdreT;
//echo "                                                              SQL: ".$SQL ."

//echo '</br></br></br></br></br></br>'.$SQL.'</br></br></br></br></br></br>';
//                                                                                    ";
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

	if($row["IdUser"]== $SelectedRow) $styleTR = " background-color:orange;";
	else $styleTR = "";

  echo'
  <tr>	
	  <td id="TDRowUsersWeb'.$row["IdUser"].'"  onclick="SelectRowUsersWeb('.$row["IdUser"].');" style="cursor:pointer;'.$styleTR.'" >
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
		  <tr >
			  <td width="90px" class="GridLine'.$i.'">'.$row["NIU"].'</td>
			  <td width="140px" class="GridLine'.$i.'">'.$row["Nom"].'</td>
			  <td class="GridLine'.$i.'">'.$row["Cognoms"].'</td>			  
			  <td width="230px" class="GridLine'.$i.'">'.$row["Centro"].'</td>		  
			  <td width="60px" class="GridLine'.$i.'"><input type="button" class="'.$class.'" value="'.$facturada.'"></td>
		  </tr>	
		</table>
	  </td>
  </tr>
';
  
  if ($i == 0) $i =1;
  else $i=0;
}
echo '<tr><td height="100%"></td></tr></table>';
//echo $SQL;

?>

