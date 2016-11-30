<?php
function CreaCadenaFiltre($cadenaT,$taula)
{
	$cadena = explode("|",$cadenaT);
	$aux = 0;
	$resultat = "";
	
	if ($cadena != "")
	{	
		foreach ($cadena as $row)
		{
			if ($aux == 0)
			{
				$resultat = " (".$taula ." like '".Pon($row)."' ";
				$aux = 1;
			}
			else
			{
				$resultat = $resultat." OR ".$taula ." like '".Pon($row)."' ";
			}
		}
		if ($aux == 1)	return $resultat . ") ";
		else return "";
	}
	else
	{
		return "";
	}
		
}
?>
<?php
function FiltreText($Filtre)
{
	$cadena = explode("|",$Filtre);
	
	$Titol = array("CC.Fecha","CC.IdComandaCap","P.NumProc");
	
	$resultat = "";
	$aux=0;
	
	for ($i=0;$i<3;$i++)
	{
		if ((isset($cadena[$i]))&&($cadena[$i]!=""))
		{
			if ($aux == 0)
			{
				$resultat = $Titol[$i] . " like '%" . Pon($cadena[$i]) . "%' "; 	
				$aux = 1;
			}
			else
			{
				$resultat = $resultat . " AND " . $Titol[$i] . " like '%" . Pon($cadena[$i]) . "%' "; 	
			}
		}
	}
	
	return $resultat;
}
?>
<?php
function CreaCadenaFiltreNum($cadenaT,$taula)
{
	$cadena = explode("|",$cadenaT);
	$aux = 0;
	$resultat = "";
	
	if ($cadena != "")
	{	
		foreach ($cadena as $row)
		{
			if ($aux == 0)
			{
				$resultat = " (".$taula ." = ".Pon($row)." ";
				$aux = 1;
			}
			else
			{
				$resultat = $resultat." OR ".$taula ." = ".Pon($row)." ";
			}
		}
		if ($aux == 1)	return $resultat . ") ";
		else return "";
	}
	else
	{
		return "";
	}
		
}
?>
<?php
function FiltreTextUsersWeb($Filtre)
{
	
	$cadena = explode("|",$Filtre);
	
	$Titol = array("U.NIU","U.Nom","U.Cognoms","U.Centro");
	
	$resultat = "";
	$aux=0;
	
	for ($i=0;$i<4;$i++)
	{
		if ((isset($cadena[$i]))&&($cadena[$i]!=""))
		{
			if ($aux == 0)
			{
				$resultat = $Titol[$i] . " like '%" . Pon($cadena[$i]) . "%' "; 	
				$aux = 1;
			}
			else
			{
				$resultat = $resultat . " AND " . $Titol[$i] . " like '%" . Pon($cadena[$i]) . "%' "; 	
			}
		}
	}
	
	return $resultat;
}
?>