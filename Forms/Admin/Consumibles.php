<?php
function MostraGestioConsumibles()
{
?>	
<div id="DIVGestioConsumibles" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td width="500px">
                    	<?php MostraTOTGestioConsumibles(); ?>
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

function MostraTOTGestioConsumibles()
{
?>	
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">
        	GESTI&Oacute; DE CONSUMIBLES
        </td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaGestioConsumibles();">
        </td>  
	</tr>
    <tr>
    	<td colspan="2" class="FondoForm" align="center">
        	<div id="ScrollConsumibles" style=" overflow:auto;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                    <tr>
                        <td height="10px"></td>
                    </tr>
                    <tr>
                    	<td colspan="2" style="padding:20px;"> Filtre de consumibles: 
                        	 <select id="FiltreGestioConsumibles" class="fuenteGestionNoticia" onchange="CarregaTaulaGestioConsumibles();">
                                <option value="0">Actius</option>
                                <option value="3">Tots</option>                             	
                                <option value="1">Inactius</option>
                             </select>
                        </td>
                    </tr>
                   <tr valign="top">
                    	<td colspan="2" style="padding:20px;" >
                        	<div id="ConsumiblesTaula" align="center"></div>
                        </td>                    	
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
	$("#ScrollConsumibles").css('width', 900);
	$("#ScrollConsumibles").css('max-height', y - 100);
	
	
</script>

<?php	
}
?>
