<?php
function MostraObservacions($id)
{
	include("../../../rao/EstabulariForm_con.php");
		
	$SQL = "
		SELECT Obs, CONCAT(T.Nom,' ',T.Cognoms) as Tecnic, CONCAT(U.Nom,' ',U.Cognoms) as Usuari, Fecha, Hora 
		FROM Obs O
			LEFT JOIN 	Tecnics T
			ON			T.IdTecnic = O.IdTecnic
			
			LEFT JOIN	Users	U
			ON			U.IdUser = O.IdUser
		WHERE IdComandaCap = ".$id."
		ORDER BY IdObs DESC	";
		
	$result = mysql_query($SQL,$oConn);

	while ($row = mysql_fetch_array($result))
	{
//		if ($row["Tecnic"]) $nom = '<td align="left"><b>'.$row["Tecnic"].'</b> ha escrit</td>';
//		else  $nom = '<td align="left"><b>'.$row["Usuari"].'</b> ha escrit:</td>';
//		
		echo'
		<table width="100%" cellpadding="5px" cellspacing="0" border="0">
			<tr>
				<td align="left" style="padding-top:15px"><b>'.$row["Tecnic"].$row["Usuari"].'</b> ha escrit el dia '.SelectFecha($row["Fecha"]).'  a les '.$row["Hora"].':</td>
			</tr>
			<tr><td style="padding-left:15px;">'.$row["Obs"].'</td></tr>
		</table>';
	}
	
}
?>