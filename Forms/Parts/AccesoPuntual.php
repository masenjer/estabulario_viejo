<?php	
function CarregaDIVAccesoPuntual()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; D' ACC&Eacute;S PUNTUAL DE PERSONES AL SERVEI D' ESTABULARI</td>    
	    <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaAccesSE();">
        </td>  
	</tr> 
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVAccesPuntual" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="10" border="0">
                    <tr>
                        <td valign="top"><?php CarregaDIVAccesoPuntualI(); ?></td>
                        <td valign="top" ><?php CarregaDIVAccesoPuntualD(); ?></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVAccesPuntual").css('max-width', x - 100);
	$("#DIVAccesPuntual").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVAccesoPuntualI()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraDadesSolicitantEntrada','AccesPuntual'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraAreasAcceso','AccesPuntual'); ?></td>
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
function CarregaDIVAccesoPuntualD()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraMotivoAcceso','AccesPuntual'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraContactoAnimales','AccesPuntual'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraFranjaHoraria','AccesPuntual'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
        <td align="center"><?php MontaCuadreVerd('MostraObservacions','AccesPuntual|470|35'); ?></td>
    </tr>
    <tr>
        <td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaAccesEstabulari('AccesPuntual');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
