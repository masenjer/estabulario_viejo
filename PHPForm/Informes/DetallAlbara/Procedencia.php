<?php
function CarregaProcedencia($id)
{
	include("../../rao/EstabulariForm_con.php");
		
	$SQL = "SELECT P1.IdProcedencia, P1.Fecha, P2.IdProveidor
			FROM Procedencia P1, Proveidor P2
			WHERE P2.IdProveidor = P1.IdCentre AND P1.IdComandaCap = ".$id; 
	$result = mysql_query($SQL,$oConn);
	
	$resultado = '<table cellpadding="5" cellspacing="0" border="0"  style="border:1px solid #9e9885">';
	while ($row = mysql_fetch_array($result))
	{
			$resultado .= ' 
			<tr class="CapcaGrid" align="left" style="text-align:left;">
				<td colspan="2"><b>Dades de proced&egrave;ncia</b></td>
			</tr>
			<tr class="GridLine0">
				<td><b>Proveidor</b></td>
				<td><select id="SelectEditProveidor" disabled>'.CarregaSelectProveidor($row["IdProveidor"]).'</select></td>
			</tr>
			<tr class="GridLine1">
				<td><b>Data</b></td>
				<td><input type="text" id="FechaEditProcedencia"  value="'.SelectFecha($row["Fecha"]).'" readonly="readonly" class="inputSenseCaixa" style="width:82px;" ></td>
			</tr>
			';
	}
	$resultado .= "</table>";
	
	return $resultado;
}

function CarregaSelectProveidor($id)
{
	include("../../rao/EstabulariForm_con.php");
	 
	$SQL = "SELECT * FROM Proveidor Where Actiu = 0 Order by NomProveidor ASC";
	$result = mysql_query($SQL,$oConn);

	while ($row = mysql_fetch_array($result))
	{
		if ($row["IdProveidor"] == $id) $s = " selected";
		else $s="";
		
		$r.= '<option value="'.$row["IdProveidor"].'" '.$s.'>'.$row["NomProveidor"].'</option>'; 
	}
	
	return $r;
}
?>