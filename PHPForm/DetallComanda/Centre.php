<?php
function CarregaDadesCentre($id, $od)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT *
			FROM Centre
			WHERE IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	
	$resultado = '';
	
	if ( mysql_num_rows($result) > 0)		
	{	
		$resultado = '
			<table cellspacing="0" cellpadding="5" border="0" style="border:1px solid #9e9885">
				<tr class="CapcaGrid" align="left" style="text-align:left;">
					<td colspan="2"><b>Dades del Centre '.$od.'</b></td>
				</tr>';	
		while ($row = mysql_fetch_array($result))
		{
			$resultado .= '
				<tr class="GridLine0">
					<td>Nom del Centre</td>
					<td>'.$row["Nom"].'</td>
				</tr>				
				<tr class="GridLine1">
					<td>Adre&ccedil;a del Centre</td>
					<td>'.$row["Adreca"].'</td>
				</tr>				
				<tr class="GridLine0">
					<td>País '.$od.'</td>
					<td>'.$row["Pais"].'</td>
				</tr>				
				<tr class="GridLine1">
					<td>Nom persona contacte</td>
					<td>'.$row["Contacte"].'</td>
				</tr>				
				<tr class="GridLine0">
					<td>Tel&egrave;fon contacte</td>
					<td>'.$row["telefon"].'</td>
				</tr>				
				<tr class="GridLine1">
					<td>Adre&ccedil;a electr&ograve;nica</td>
					<td>'.$row["Email"].'</td>
				</tr>';
				
				if ($row["NumReg"])
					$resultado .= '				
				<tr class="GridLine0">
					<td>N&deg; Registre Centre '.$od.'</td>
					<td>'.$row["NumReg"].'</td>
				</tr>				
				';
		}
		$resultado .= '
			</table>';	
	}
	
	
	
	return $resultado;
}
?>