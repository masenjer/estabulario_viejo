<?php 
function MostraGestioEspecies()
{
?>
<table width="98%" border="0" class="fuenteForm">
	<tr>
		<td align="left"><?php MostraGestioEspeciesI('Stock'); ?></td>
        <td align="left"><?php  if ($_SESSION["EspeciesiSoques"]) MostraGestioEspeciesD(); ?></td>               
    </tr>
</table>
<?php
}

function MostraGestioEspeciesI($form)
{
?>
	<table cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td width="60px" align="left">Esp&egrave;cie</td>
            <td  width="160px" align="left"><select id="Especie1<?php echo $form; ?>" onchange="SeleccionaEspecieGest();" style="width:150px;" class="fuenteForm"> 
            		<script>OmpleEspecies('1','<?php echo $form; ?>');</script>
            	</select>
            </td>
            <td width="48px" align="left"> <?php if ($_SESSION["EspeciesiSoques"]){?><input type="button" class="ButtonAdd24" onclick="MostraGEspecies();" /><?php }?></td>
            <td></td>
        </tr>
    	<tr>
        	<td width="60px" align="left">Soca</td>
            <td width="160px" align="left"><select id="Cepa1<?php echo $form; ?>" class="fuenteForm" onchange="SeleccionaCepaGest();" style="width:150px;"></select>
            </td>
            <td width="50px">
				<?php if ($_SESSION["EspeciesiSoques"]){?><input type="button" class="ButtonAdd24" onclick="MostraGCepas();" /><input type="button" class="ButtonEdit24" onclick="MostraEditCepas();" /><?php }?>
            </td>
            <td></td>
        </tr>
    	<tr>
        	<td align="left" colspan="4">Data Naixement / Arribada &nbsp;<select id="DataNaixement<?php echo $form; ?>" class="fuenteForm" onchange="SeleccionaDataNaixGest();"></select>
            </td>            
        </tr>
    </table>
<?php
}
function MostraGestioEspeciesD()
{
?>
	<table cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td>
            	<div id="DIVGestioEspecies" style="display:none;"><?php MostraDIVGEspecies(); ?></div>
            </td>
        </tr>
    	<tr>
        	<td>
            	<div id="DIVGestioCepas" style="display:none;"><?php MostraDIVGCepas(); ?></div>
            	<div id="DIVGestioEditCepas" style="display:none;"><?php MostraDIVEditaCepas(); ?></div>
            </td>
        </tr>
    </table>
<?php
}	
function MostraDIVGEspecies()
{
?>
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
        	<td colspan="8" class="fuenteFormTitol">Nova esp&egrave;cie</td>
        </tr>
        <tr>
        	
            <td align="left"><input type="text" id="TextExpecieCA" class="fuenteForm"></td>
<!--        	<td align="left">ES</td>
            <td align="left"><input type="text" id="TextExpecieES" class="fuenteForm"></td>
        	<td align="left">EN</td>
            <td align="left"><input type="text" id="TextExpecieEN" class="fuenteForm"></td>
-->            <td><input type="button" class="fuenteForm" onclick="GuardaEspecies();" value="Guardar" /></td>
            <td><input type="button" class="fuenteForm" onclick="TancaGEspecies();" value="Cancelar" /></td>
        </tr>
    </table>
<?php	
}
function MostraDIVGCepas()
{
?>
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
        	<td colspan="3" class="fuenteFormTitol">Nova Soca</td>
        </tr>
        <tr>
            <td align="left"><input type="text" id="TextCepa" class="fuenteForm"></td>
            <td align="left"><select id="idProvCepa" class="fuenteForm"></select></td>
            <td><input type="button" class="fuenteForm" onclick="GuardaCepas();" value="Guardar" /></td>
            <td><input type="button" class="fuenteForm" onclick="TancaGCepas();" value="Cancelar" /></td>
        </tr>
    </table>
<?php	
}
function MostraDIVEditaCepas()
{
?>
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
        	<td colspan="3" class="fuenteFormTitol">Edita Soca</td>
        </tr>
        <tr>
            <td align="left"><input type="text" id="TextEditCepa" class="fuenteForm"></td>
            <td align="left"><select id="idProvEditCepa" class="fuenteForm"></select></td>
            <td><input type="button" class="fuenteForm" onclick="UpdateCepas();" value="Guardar" /></td>
            <td><input type="button" class="fuenteForm" onclick="TancaEditaCepas();" value="Cancelar" /></td>
        </tr>
    </table>
<?php	
}
?>