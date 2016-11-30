<?php	
function CarregaDIVCompraDietasT()
{
?> 
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; DE COMPRA DE DIETES, JA&Ccedil;OS I CAIXES DE TRANSPORT</td>   
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaCompra();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContCompraDietas" style="overflow:auto;">
			<table width="760px" cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td colspan="2" align="left"><b>Instruccions</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left" style="text-align:justify">
                       <br> Abans de sol·licitar les dietes, ja&ccedil;os o caixes de transport, aconsellem que siguin consultades les diferents webs de les cases comercials. Si la requerida no est&agrave; en la llista inferior, per favor, indiqui'ns les dades de la mateixa per poder contactar:</br>
       		<ul>
          		<li><a href="http://www.criver.com/" target="_blank">Charles River Laboratories International</a></li>
          		<li><a href="http://www.harlan.com/" target="_blank">Harlan Laboratories</a></li>
          		<li>Janvier: <a href="mailto:service.export@elevage-janvier.fr" target="_blank">Servei Exportaci&oacute;</a> / <a href="mailto:service.commercial@elevage-janvier.fr" target="_blank">Servei Comercial</a></li>
          		<li><a href="http://www.taconic.com/" target="_blank">Taconic Farms Inc.</a></li>
          		<li><a href="http://jaxmice.jax.org" target="_blank">The Jackson Laboratory</a></li>
        	</ul> 
        </td>
    </tr>

                <tr>
                    <td valign="top"><?php CarregaDIVCompraDietasI(); ?></td>
                    <td valign="top"><?php CarregaDIVCompraDietasD(); ?></td>
                </tr>
            </table>
            </div>
		</td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContCompraDietas").css('max-width', 960);
	$("#DIVContCompraDietas").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVCompraDietasI()
{
?>
<table width="460px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','CompraDietas'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
	<tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraDietas|Dietes'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraDietas|Lecho'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraDIVConsumible','CompraDietas|CajaTrans'); ?></td>
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
function CarregaDIVCompraDietasD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','CompraDietas|270|472'); ?></td>
    </tr> <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaCompraConsumibles('CompraDietas');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
