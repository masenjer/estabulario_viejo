<?php	
function CarregaDIVCompraAnimT()
{
?>
<table width="700px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">PETICI&Oacute; DE COMPRA D' ANIMALS</td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaCompra();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContCompraAnim" style="overflow:auto;">
			<table cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td colspan="2" align="left" ><b>Instruccions</b></td>
                </tr>
                <tr>
                    <td colspan="2" align="left" style="text-align:justify">
                        Abans de sol&middot;licitar els animals, aconsellem que siguin consultades les diferents webs de les cases comercials. Si la requerida no est&agrave; a la llista inferior, per favor, indiqui'ns les dades de la mateixa per poder contactar:<br />
       		<ul>
          		<li><a href="http://www.criver.com/" target="_blank">Charles River Laboratories International</a></li>
          		<li><a href="http://www.harlan.com/" target="_blank">Harlan Laboratories</a></li>
          		<li>Janvier: <a href="mailto:service.export@elevage-janvier.fr" target="_blank">Servei Exportaci&oacute;</a> / <a href="mailto:service.commercial@elevage-janvier.fr" target="_blank">Servei Comercial</a></li>

        	</ul> 
        
          	  <font color="#FF0000">
NOTA IMPORTANT PER A COMANDES D'ANIMALS NO PRODU&Iuml;TS AL SE: els animals arriben els dimecres, tret de setmanes amb festius, que pot variar el dia d'arribada. El darrer dia per realitzar les sol&middot;licituds &eacute;s <b>dimarts a les 12h</b>, si es vol que els animals arribin la setmana seg&uuml;ent (excepte soques especials o animals tractats, que requeriran més antel&middot;laci&oacute;). Els animals estabulats es podran recollir a partir del primer dimarts despr&eacute;s de la seva arribada al SE.</font>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><?php CarregaDIVCompraAnimI(); ?></td>
                    <td valign="top" ><?php CarregaDIVCompraAnimD(); ?></td>
                </tr>
            </table>
            </div>
        </td>
    </tr>
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContCompraAnim").css('max-width', x - 100);
	$("#DIVContCompraAnim").css('max-height', y - 100);
</script>

<?php  
}

function CarregaDIVCompraAnimI()
{
?>
<table width="500px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
   <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','CompraAnim'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
<!--    <tr valign="top">
    	<td align="center"><?php //MontaCuadreVerd('MostraDadesEcon','CompraAnim'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
-->   
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraAnimCompraAnim','CompraAnim'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraRecogida','CompraAnim'); ?></td>
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
function CarregaDIVCompraAnimD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia">
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','CompraAnim|270|275'); ?></td>
    </tr>   
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td style="padding-left:10px"><font class="astV">*</font>S'ent&eacute;n que l'edat sol&middot;licitada dels animals, &eacute;s la que l'animal tindr&agrave; en arribar al Servei d' Estabulari, i que, els que siguin estabulats, han de passar com a m&iacute;nim, 5 dies de quarentena.<br />
          (Veure m&eacute;s informaci&oacute; al seg&uuml;ent enlla&ccedil;: <a href="http://estabulari.uab.cat/index.php#140_1" target="_blank">FAQS</a>)</td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la comanda" onClick="GuardaCompraAnim('CompraAnim');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}
?>
