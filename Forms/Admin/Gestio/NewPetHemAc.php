<?php
function MostraNewPetHemAc()
{
?>	
<div id="DIVNewPetHemAc" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaNewPetHemAc(); ?>
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

function CarregaNewPetHemAc()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de Petició de Femelles Acoblades
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%"><?php MostraNewPetHemAcI();?></td>
                   <td align="left"><?php MostraNewPetHemAcD();?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewPetHemAc" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewPetHemAc();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewPetHemAcI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewPetHemAc" onchange="OmpleCepas(0,'NewPetHemAc');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewPetHemAc" class="fuenteForm">				
            </td>
        </tr>
    </table>
<?php
}

function MostraNewPetHemAcD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Quantitat</td>
            <td align="left"><input type="text" id="Cantidad0NewPetHemAc"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Data d' acoblament</td>
            <td align="left">
				<input type="text" id="Fecha0NewPetHemAc" class="fuenteForm"  style="width:115px"  disabled="disabled"/>
		   </td>
        </tr>
    </table>
<?php
}
?>
