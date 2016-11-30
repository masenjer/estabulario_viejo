<?php
function MostraNewPetCompraAnim()
{
?>	
<div id="DIVNewPetCompraAnim" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaNewPetCompraAnim(); ?>
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

function CarregaNewPetCompraAnim()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de Petició de Compra d' Animals
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%"><?php MostraNewPetCompraAnimI();?></td>
                   <td align="left"><?php MostraNewPetCompraAnimD();?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewPetCompraAnim" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewPetCompraAnim();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewPetCompraAnimI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewPetCompraAnim" onchange="OmpleCepas(0,'NewPetCompraAnim');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewPetCompraAnim" class="fuenteForm">				
            </td>
        </tr>		
        <tr>
        	<td><b>Mascles</b></td>
        </tr>
        <tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="CantidadM0NewPetCompraAnim"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Edat/Pes<font class="astV">*</font></td>
            <td align="left">
            	<input type="text" id="EdadM0NewPetCompraAnim"  class="fuenteForm" style="width:50px">
            	<select id="SemGramM0NewPetCompraAnim" class="fuenteForm"/>
                </select>
            </td>
        </tr>
    </table>
<?php
}

function MostraNewPetCompraAnimD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Prove&iuml;dors</td>
            <td align="left"><select id="ProvHab0NewPetCompraAnim" class="fuenteForm" onchange="CanviProveidor('ProvTrans','0NewPetCompraAnim')"></select>
            </td>
        </tr>
    	<tr>
        	<td align="left">Prov Trans.</td>
            <td align="left"><select id="ProvTrans0NewPetCompraAnim" class="fuenteForm" onchange="CanviProveidor('ProvHab','0NewPetCompraAnim')"></select>
            </td>
        </tr>
        <tr>
        	<td><b>Femelles</b></td>
        </tr>
        <tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="CantidadF0NewPetCompraAnim"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Edat/Pes<font class="astV">*</font></td>
            <td align="left">
            	<input type="text" id="EdadF0NewPetCompraAnim"  class="fuenteForm" style="width:50px">
            	<select id="SemGramF0NewPetCompraAnim" class="fuenteForm"/>
                </select>
            </td>
        </tr>
    </table>
<?php
}
?>
