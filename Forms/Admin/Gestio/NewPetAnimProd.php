<?php
function MostraNewPetAnimProd()
{
?>	
<div id="DIVNewPetAnimProd" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="img/MarcSupEsq.png"></td>
                    <td height="11px" background="img/MarcSupC.png"></td>
                    <td width="11px" background="img/MarcSupDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcCEsq.png"></td>
                    <td bgcolor="#FFFFFF" valign="top">
                    	<?php CarregaNewPetAnimProd(); ?>
                    </td>
                    <td width="11px" background="img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcInfEsq.png"></td>
                    <td height="10px" background="img/MarcInfC.png"></td>
                    <td width="11px" background="img/MarcInfDret.png"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<?php
}

function CarregaNewPetAnimProd()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de Petició d' Animals Produits al SE
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%"><?php MostraNewPetAnimProdI();?></td>
                   <td align="left"><?php MostraNewPetAnimProdD();?></td>
                </tr>
                <tr>
                    <td colspan="2" align="left">Sexe:                      
                    <input type="radio" name="Sexo0NewPetAnimProd" id="SexoNewPetAnimProd" value="M" class="fuenteForm" /> Mascles
                    <input type="radio" name="Sexo0NewPetAnimProd" id="SexoNewPetAnimProd" value="F" /> Femelles
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewPetAnimProd" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewPetAnimProd();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewPetAnimProdI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewPetAnimProd" onchange="OmpleCepas(0,'NewPetAnimProd');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewPetAnimProd" class="fuenteForm" onchange="MostraTaulaSeleccioDNStock(0,'NewPetAnimProd');"></select>				
            </td>
        </tr>
    </table>
<?php
}

function MostraNewPetAnimProdD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="Cantidad0NewPetAnimProd"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Naixement / Arribada</td>
            <td align="left">
				<input type="text" id="FechaNac0NewPetAnimProd" class="fuenteForm"  style="width:115px"  disabled="disabled"/>
				<input type="hidden" id="UniMas0NewPetAnimProd"/>
				<input type="hidden" id="UniFam0NewPetAnimProd"/>
				<input type="hidden" id="NProc0NewPetAnimProd"/>
		   </td>
        </tr>
    </table>
<?php
}
?>
