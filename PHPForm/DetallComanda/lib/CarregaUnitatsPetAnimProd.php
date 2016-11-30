<?php
include("../../../rao/EstabulariForm_con.php");
include("ComprovaStock.php"); 
include("../../../PHP/Fechas.php"); 

//id:id,cant:cant,idSoca:idSoca,DN:DN

$id = $_POST["id"];

$SQL = "SELECT S.NomSoca, PA.IdSoca, E.NomEspecie_ca, PA.IdProcediment, NumProc, FechaNac, Cantidad FROM PetAnimProd PA, Procediment P, Soca S, Especie E WHERE S.IdSoca = PA.IdSoca and E.IdEspecie = S.IdEspecie AND P.IdProcediment = PA.IdProcediment AND PA.IdPetAnimProd = ".$id;
$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	$NomSoca = $row["NomSoca"];
	$idSoca = $row["IdSoca"];
	$NomEspecie = $row["NomEspecie_ca"];
	$IdProc = $row["IdProcediment"];
	$NumProc = $row["NumProc"];
	$DN = $row["FechaNac"]; 
	$cant = $row["Cantidad"];
}

///////////Escriu Especie, Soca i Data de naixement
echo 
'<table class="fuenteForm">
	<tr>
		<td class="RecuadreAdmin">
			<table>
				<tr>
					<td>Especie: '.$NomEspecie.'</td>
				</tr>
				<tr>
					<td>Soca: '.$NomSoca.'</td>
				</tr>
				<tr>
					<td>Data de naixement/arribada: '.SelectFecha($DN).'</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td id="TDCant" class="RecuadreAdmin" align="right" style="background-color:#FAA">
			<table>
				<tr>
					<td align="right"> Queden <input id="UnitatsTotalsPetAnimProd" type="text" class="inputSenseCaixa" value="'.$cant.'" readonly="readonly"> pendents d\' assignar d\'un total de '.$cant.' unitats</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>';
			

	$data =  ComprovaStock($idSoca, $IdProc, $DN, 0);
	$cadena = explode ("|",$data);


echo  '
	<tr>
		<td class="RecuadreAdmin">
			<table>
				<tr>
					<td>Animals a l\'estoc del procediment '.$NumProc.'</td>
				</tr>
				<tr>
					<td height="10px"></td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari0" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de <input id="UnitatsPetAnimProdEstabulari0" type="text" class="inputSenseCaixa" value="'.$cadena[0].'" readonly="readonly"> mascles</td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari1" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de <input id="UnitatsTotalsPetAnimProd1" type="text" class="inputSenseCaixa" value="'.$cadena[1].'" readonly="readonly"> femelles</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td align="center">
			<input type="button" id="ButtonCarregaUnitatsPetAnimProd" onclick="CanviaUnitatsTramitaLiniesNovesPetAnimProd('.$id.');" value="Crear noves l&iacute;nies d\'albar&agrave;" style="display:none;">
		</td>
	</tr>	
</table>
';

?>