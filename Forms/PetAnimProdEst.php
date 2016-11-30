<?php
function MostraPetAnimProdEst()
{
?>
<div id="DIVFitxa2" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaDIVPetAnimProdEstT(); ?>
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

function CarregaDIVPetAnimProdEstT()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; D'ANIMALS ESTABULATS AL SERVEI D' ESTABULARI</td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaPetAnimProdEst();">
        </td>  
  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContPetAnimProd" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                   <tr>
                        <td valign="top"><?php CarregaDIVPetAnimProdEstE(); ?></td>
                        <td valign="top" ><?php CarregaDIVPetAnimProdEstD(); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContPetAnimProd").css('max-width', x - 100);
	$("#DIVContPetAnimProd").css('max-height', y - 100);
</script>
<?php  
}

function CarregaDIVPetAnimProdEstE()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','PetAnimProd'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
<!--    <tr valign="top">
    	<td align="center"><?php //MontaCuadreVerd('MostraDadesEcon','PetAnimProd'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
--> <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraAnimalsSolicitats','PetAnimProd'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogida','PetAnimProd'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
<tr>
    	<td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
    </tr>
    <!--<tr>
    	<td style="padding-left:10px"><font class="ast">** La sol&middot;licitud ha de realitzar-se abans de les 14:00h <br />del dia laborable anterior al previst de recollida o utilitzaci&oacute;</font></td>
    </tr>-->
</table>
<?php  
}
function CarregaDIVPetAnimProdEstD()
{
?>
<table width="230px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','PetAnimProd|200|337'); ?></td>
    </tr>
    
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaPetAnimProdEst('PetAnimProd');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
