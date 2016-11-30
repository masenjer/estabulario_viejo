<?php
function ContacteAltresAnimals($IdCC,$CA)
{
	include("../rao/EstabulariForm_con.php"); 

	if ($CA != "NO")
	{	
		$cadena = explode("#",$CA);
		for ($i=0;$i<4;$i++)
		{
			$c = "";
			$c = explode("|",$cadena[$i]);
			if ($c[0])
			{
				if ($i != 3)
				 $SQL = "INSERT INTO ContactoOtrosAnimales(IdComandaCap, Tipus, Especies, Fecha) VALUES ($IdCC,$i,'$c[0]','".InsertFecha($c[1])."')"; 
				else $SQL = "INSERT INTO ContactoOtrosAnimales(IdComandaCap, Tipus, Especies, Fecha) VALUES ($IdCC,$i,'$c[0]',NULL)"; 
				
				//echo "i:".$i.", SQL:".$SQL;
			
			}
			$result = mysql_query($SQL,$oConn);
			$SQL = ""; 
		}
	}
}
?>