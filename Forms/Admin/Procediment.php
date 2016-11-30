<?php
function MostraGestioProcediment()
{
?>	
<div id="DIVGestioProcediment" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF">
                    	<?php MostraTOTGestioProcediment(); ?>
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

function MostraTOTGestioProcediment()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; DE PROCEDIMENTS
        </td>  
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaProcediment();">
        </td>    
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="ScrollProcediments" style=" overflow:auto;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr>
                        <td valign="top" align="right" style="padding-right:15px;"><input type="button" class="ButtonAdd24" onclick="InicialitzaProcediment();" title="Nuevo Procedimiento" /></td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-left:15px;padding-right:15px"><div id="DIVCabTaulaGestioProcediment"></div></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding-left:15px;padding-right:15px"><div id="DIVCosTaulaGestioProcediment"></div></td>
                    </tr>
                    <tr>
                        <td valign="top" align="center" style="padding:20px;"><?php  MontaCuadreVerd('MostraProcediment','Gestio'); ?></td>
                    </tr>
                    <tr>
                        <td align="center"> <div id="DIVTaulaProcedimentUsers" style="width:317px;max-height:240px;overflow-y:scroll; overflow-style:marquee-line; border:solid; border-color:#b2b4b4; border-width:1px;"></div></td>
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
	$("#ScrollProcediments").css('max-width', x);
	$("#ScrollProcediments").css('height', y - 100);
</script>
<?php
}
?>
