<?php
include("../rao/EstabulariForm_con.php");

$id = $_GET["id"];

$SQL = "SELECT ProcedimentUser.IdProcedimentUser, Users.Nom, Users.Cognoms 
		FROM Users, ProcedimentUser 
		WHERE ProcedimentUser.IdProcediment = ".$id." 
		AND Users.IdUser = ProcedimentUser.IdUser
		ORDER BY  Users.Cognoms, Users.Nom  ASC
";
$result = mysql_query($SQL,$oConn);

$resultado = '
	<table width="300px" cellpadding="0" cellspacing="0" border="0" >
		<tr class="CapGrid">
			<td height="27px" class="CapcaGrid">&nbsp;&nbsp;&nbsp;Usuaris assignats al procediment</td>
			<td width="23px" class="CapcaGrid"><input type="button" class="ButtonPlus" onclick="MostraTablaUsuarisProc('.$id.');" title="Nuevo Usuario de Procedimento" /></td>
		</tr>';


while ($row = mysql_fetch_array($result))
{
	$resultado = $resultado.'
		<tr>
			<td style=" padding:5px;">'.$row["Cognoms"].', '.$row["Nom"].'</td>
			<td><input type="button" class="ButtonX" onclick="MostraEliminaTOT(3,'.$row["IdProcedimentUser"].','.$id.');" title="Eliminar Usuario de Procedimento" /></td>
		</tr>
				
	';
}

$resultado = $resultado.'</table>';

mysql_close($oConn);

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>