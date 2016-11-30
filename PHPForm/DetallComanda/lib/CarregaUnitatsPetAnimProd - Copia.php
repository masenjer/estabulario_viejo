<?php
include("../../../rao/EstabulariForm_con.php");
include("ComprovaStock.php"); 
include("../../../PHP/Fechas.php"); 

//id:id,cant:cant,idSoca:idSoca,DN:DN

$id = $_POST["id"];
$cant = $_POST["cant"];
$idSoca = $_POST["idSoca"];
$DN = $_POST["DN"];

$SQL = "SELECT S.NomSoca, E.NomEspecie_ca FROM Soca S, Especie E WHERE S.IdSoca = ".$idSoca." and E.IdEspecie = S.IdEspecie";
$result = mysql_query($SQL,$oConn);

//echo $SQL.'<br>';

while ($row = mysql_fetch_array($result))
{
	$NomSoca = $row["NomSoca"];
	$NomEspecie = $row["NomEspecie_ca"];	
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
			
/*			/////Comprova unitats per NProc estabulari (12)
			$data =  ComprovaStock($idSoca, 12, $DN, 0);
			$cadena = explode ("|",$data);
			
			echo  '
	<tr>
		<td class="RecuadreAdmin">
			<table>
				<tr>
					<td>Animals a l\'estoc de l\'estabulari</td>
				</tr>
				<tr>
					<td height="10px"></td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari0" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de  <input id="UnitatsTotalsPetAnimProd0" type="text" class="inputSenseCaixa" value="'.$cadena[0].'" readonly="readonly"> mascles</td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari1" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de  <input id="UnitatsTotalsPetAnimProd1" type="text" class="inputSenseCaixa" value="'.$cadena[1].'" readonly="readonly"> femelles</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td align="center">
			<input type="button" id="ButtonCarregaUnitatsPetAnimProd" onclick="TramitaLiniesNovesPetAnimProd('.$cant.','.$row["NumProc"].','.$id.');" value="Crear noves l&iacute;nies d\'albar&agrave;" style="display:none;">
		</td>
	</tr>	
</table>
';*/



/////Comprova unitats per NProc de l'albarà
$SQL = "SELECT CC.IdProcediment, P.NumProc FROM ComandaCap CC, PetAnimProd PA, Procediment P WHERE P.IdProcediment = CC.IdProcediment AND CC.IdComandaCap = PA.IdComandaCap AND PA.IdPetAnimProd = ".$id;
$result = mysql_query($SQL,$oConn);

//echo $SQL.'<br>';

while ($row = mysql_fetch_array($result))
{
	$data =  ComprovaStock($idSoca, $row["IdProcediment"], $DN, 0);
	$cadena = explode ("|",$data);

echo  '
	<tr>
		<td class="RecuadreAdmin">
			<table>
				<tr>
					<td>Animals a l\'estoc del procediment '.$row["NumProc"].'</td>
				</tr>
				<tr>
					<td height="10px"></td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari2" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de <input id="UnitatsTotalsPetAnimProd2" type="text" class="inputSenseCaixa" value="'.$cadena[0].'" readonly="readonly"> mascles</td>
				</tr>
				<tr>
					<td>Sel&middot;leccionar <input type="text" id="UnitatsPetAnimProdEstabulari3" onkeyup="CanviaUnitatsTotalsPetAnimProd('.$cant.');" value="0"> de <input id="UnitatsTotalsPetAnimProd3" type="text" class="inputSenseCaixa" value="'.$cadena[1].'" readonly="readonly"> femelles</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="20px"></td>
	</tr>
	<tr>
		<td align="center">
			<input type="button" id="ButtonCarregaUnitatsPetAnimProd" onclick="TramitaLiniesNovesPetAnimProd('.$cant.','.$row["NumProc"].','.$id.');" value="Crear noves l&iacute;nies d\'albar&agrave;" style="display:none;">
		</td>
	</tr>	
</table>
';
}

?>