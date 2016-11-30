<?php
function MostraComandes()
{
?>	
<div id="DIVComandes" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
<table width="100%" cellpadding="0" cellspacing="0" border="0">
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
                    	<?php CarregaTotComades(); ?>
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

function CarregaTotComades()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td  height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	CONTROL DE COMANDES
        </td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg"><input type="button" class="TancarButton" onClick="TancaComandes();"></td>  
	</tr>
    <tr>
    	<td colspan="2">
        	<div id="DIVAlcadaAmpladaGestioComandes" style="overflow:auto;">
			<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td align="center"><div id="DIVCabTaulaComanda" style="background:#FFF;"></div></td>
                </tr>
                <tr>
                    <td valign="top" align="center"><div id="DIVCosTaulaComanda" style="background:#FFF;"></div></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td align="right"><div id="DIVBotoneraEstatComanda"></div></td>
                </tr> 
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td align="center"><div id="DIVDadesEconComanda" class="DIVDetallsComanda"></div></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td align="center"><div id="DIVDetallComanda"></div></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td align="center"><div id="DIVObservacionsComanda" class="DIVDetallsComanda"></div></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
			</table>
            </div>
        </td>
    </tr>
</table>	

<script>
	//x = $(window).width();	
	y = $(window).height();	
	//$("#DIVAlcadaAmpladaGestioComandes").css('width', x - 100);
	$("#DIVAlcadaAmpladaGestioComandes").css('width', 900);
	$("#DIVAlcadaAmpladaGestioComandes").css('height', y - 100);
</script>

<?php
}
?>
