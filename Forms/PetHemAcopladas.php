<?php
function MostraPetHemAc()
{
?>
<div id="DIVFitxa3" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td>
                    	<?php CarregaDIVPetHemAcT(); ?>
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

function CarregaDIVPetHemAcT()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; DE 	FEMELLES ACOBLADES
</td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaPetHemAc();">
        </td>  
  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" colspan="2">
        	<div id="DIVContPetHemAc"  style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
               <tr>
                    <td valign="top"><?php CarregaDIVPetHemAcE(); ?></td>
                    <td valign="top" ><?php CarregaDIVPetHemAcD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContPetHemAc").css('max-width', x - 100);
	$("#DIVContPetHemAc").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVPetHemAcE()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','PetHemAc'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
<!--    <tr valign="top">
    	<td align="center"><?php //MontaCuadreVerd('MostraDadesEcon','PetHemAc'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
-->    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraHemAcopl','PetHemAc'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogida','PetHemAc'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
    </tr>
</table>
<?php  
}

function CarregaDIVPetHemAcD()
{
?>
<table width="230px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','PetHemAc|200|275'); ?></td>
    </tr>
    
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaPetHemAc('PetHemAc');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
