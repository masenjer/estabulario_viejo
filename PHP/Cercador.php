<?php
include("../rao/sas_con.php"); 

session_start();

$texto = $_GET["texto"];

if ($texto != "")
{
$i= 0;

$cadena = explode(" ", $texto);


foreach($cadena as &$row)
{
	//////////////////Cerca per MSup
	if ($i != 0)	
	{
		$cond1 = $cond1 . " AND ";
	}

	$cond1 = $cond1 . "	
	Titol LIKE '%".$row."%' 	
	";
	
	///////////////////////////////////
	//////////////////Cerca per Linmenu
	if ($i != 0)	
	{
		$cond2 = $cond2 . " AND ";	
	}

	$cond2 = $cond2 . "  
	(
		LinMenu.Titol LIKE '%".$row."%' OR
		LinMenu.Contingut LIKE '%".$row."%'
	)";
	
	///////////////////////////////////
	//////////////////Cerca per LinMD
	if ($i != 0)	
	{
		$cond3 = $cond3 . " AND "	;	
	}

	$cond3 = $cond3 . "
	(
		CapMenu.IdCapMenu = LinMD.IdCapMenu AND
		LinMD.Titol LIKE '%".$row."%' OR
		LinMD.Contingut LIKE '%".$row."%'
	)";
	
	$i++;	
	
	///////////////////////////////////
	
}

$cond1 = "(" . $cond1 . ")";
$cond2 = "(" . $cond2 . ")";
$cond3 = "(" . $cond3 . ")";

$SQL1 = "SELECT IdCapMenu, Titol FROM CapMenu WHERE " . $cond1;	
$result1 = mysql_query($SQL1,$oConn);

echo '
<table cellpadding="5" width="280px" bgcolor="#000000">
	<tr>
    	<td bgcolor="#FFFFFF">
			<table cellpadding="0" cellspacing="0" border="0" class="fuenteCercador">';	

while ($row = mysql_fetch_array($result1))
{
	////////Resultados del capMenu
	echo '
		<tr>
			<td onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].',\'\',\'\')">'.$row["Titol"].'</td>
		</tr>
		<tr>
			<td height="5px"></td>
		</tr>	
		<tr>
			<td height="1px" bgcolor="#CCCCCC"></td>
		</tr>
		<tr>
			<td height="10px"></td>
		</tr>				
	';
}


$SQL2 = "SELECT CapMenu.IdCapMenu, LinMenu.IdLinMenu, LinMenu.Titol as TitolL, CapMenu.Titol as TitolC, LinMenu.Contingut FROM CapMenu, LinMenu  WHERE CapMenu.IdCapMenu = LinMenu.IdCapMenu AND" . $cond2;	 
$result2 = mysql_query($SQL2,$oConn);

while ($row = mysql_fetch_array($result2))
{
	////////Resultados del LinMenu
	echo '
		<tr>
			<td class="RutaCercador" onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].','.$row["IdLinMenu"].',1);">'.$row["TitolC"].' > '.$row["TitolL"].'</td>
		</tr>
		<tr>
			<td onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].','.$row["IdLinMenu"].',1);">'.TrobaContingut($row["Contingut"],$texto).'</td>
		</tr>
		<tr>
			<td height="5px"></td>
		</tr>	
		<tr>
			<td height="1px" bgcolor="#CCCCCC"></td>
		</tr>
		<tr>
			<td height="10px"></td>
		</tr>	
	';
}


$SQL3 = "SELECT CapMenu.IdCapMenu, LinMD.IdLinMD, LinMD.Titol as TitolM, CapMenu.Titol as TitolC, LinMD.Contingut FROM CapMenu, LinMD  WHERE " . $cond3;	 
$result3 = mysql_query($SQL3,$oConn);

while ($row = mysql_fetch_array($result3))
{
	////////Resultados del LinMenu
	echo '
		<tr>
			<td class="RutaCercador" onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].','.$row["IdLinMD"].',2)">'.$row["TitolC"].' > '.$row["TitolM"].'</td>
		</tr>
		<tr>
			<td onclick="CarregaPaginaiMenus('.$row["IdCapMenu"].','.$row["IdLinMD"].',2)">'.TrobaContingut($row["Contingut"],$texto).'</td>
		</tr>
		<tr>
			<td height="5px"></td>
		</tr>	
		<tr>
			<td height="1px" bgcolor="#CCCCCC"></td>
		</tr>
		<tr>
			<td height="10px"></td>
		</tr>	
	';
}

mysql_close($oConn);

echo '</table></td></tr></table>';	 
}

function TrobaContingut($Contingut, $texto)
{
	$Contingut = strip_tags($Contingut);

	$CCadena = explode(" ", $Contingut);
	$CCadena2 = explode(" ", strtoupper($Contingut));
	
	$cadena = explode(" ", strtoupper($texto));
	
	
	 $pos = array_search($cadena[0], $CCadena2);
	  
	  if ($pos > 3)
	  {
		  $pos = $pos -3;
	  }
	  for ($i=0;$i<7;$i++)
	  {
		  $res = $res." " . $CCadena[$pos + $i];
		  
	  }
	  
	  return "... ". $res . " ...";
	  break;			
	  
		
}
?>