<?php
function MostraGestioInvestigador()
{
?>	
<div id="DIVGestioInvestigador" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td  bgcolor="#FFFFFF">
                    	<?php MostraTOTGestioInvestigador(); ?>
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

function MostraTOTGestioInvestigador()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; D' INVESTIGADORS
        </td> 
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioInvestigador();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="ScrollInvestigador" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr>
                    	<td align="right" style="padding-left:15px;padding-right:15px">
                        <input type="button" class="ButtonAdd24" title="Afegir nou investigador" onclick="InicialitzaNewInvestigador();" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-left:15px;padding-right:15px"><div id="DIVCabTaulaGestioInvestigador"></div></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding-left:15px;padding-right:15px"><div id="DIVCosTaulaGestioInvestigador"></div></td>
                    </tr>
                    <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding-left:15px;padding-right:15px"><?php  MontaCuadreVerd('MostraInvestigadorFitxa',''); ?></td>
                    </tr>
<!--                <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <div id="DIVTaulaProcedimentInves" style="width:400px;height:120px;overflow:auto; border:solid; border-color:#b2b4b4; border-width:1px;"></div></td>
                    </tr>
-->
	                <tr>
                        <td height="20px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><div id="DIVTaulaInvesProjectes" style="width:270px;max-height:120px;overflow-y:scroll; overflow-style:marquee-line; border:solid; border-color:#b2b4b4; border-width:1px;"></div></td>
                    </tr>
                    <tr>
                        <td height="10px"></td>
                    </tr>
                </table>
            </div>        	
        </td>
    </tr>   
</table>
<script>
	x = $(window).width();	
	y = $(window).height();	
	//$("#DIVAlcadaAmpladaGestioComandes").css('width', x - 100);
	$("#ScrollInvestigador").css('max-width', x);
	$("#ScrollInvestigador").css('height', y - 100);

</script>
	
<?php
}
?>
