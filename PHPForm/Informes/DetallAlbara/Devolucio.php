<?php
function CarregaDevolucio($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM Devolucio
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	//return $SQL;
	$resultado = '';
	
	if ( mysql_num_rows($result) > 0)		
	{		
		while ($row = mysql_fetch_array($result))
		{
			$resultado = ' <b>Data de Devolucio '.SelectFecha($row["Fecha"]).' a les <b>'.$row["Hora"].'</b> ';
		}
	}

	return $resultado;
}
?>