<?php
function MostraStock()
{
?>	
<div id="DIVStock" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td width="900px" bgcolor="#FFFFFF">
                    	<?php CarregaTotStock(); ?>
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

function CarregaTotStock()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	CONTROL DE STOCK
        </td> 
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaStock();">
        </td>    
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContStock" style=" overflow:auto;">
                <table width="100%" cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td valign="top" align="center" colspan="2"  ><?php  MontaCuadreVerd('MostraGestioEspecies',''); ?></td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <div id="DIVGridStocks" style="max-height:220px;overflow:auto;"></div></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <div id="DIVTotalGridStocks"></div></td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" colspan="2" ><?php MontaCuadreVerd('MostraGestioInventari',''); ?></td>
                    </tr>
                </table>
                </div>
			</td>
		</tr>
	</table>

<script>
	x = $(window).width();	
	y = $(window).height();	
	$("#DIVContStock").css('max-width', x - 100);
	$("#DIVContStock").css('max-height', y - 100);
</script>
<?php
}
?>
