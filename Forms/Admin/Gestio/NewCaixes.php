<?php
function MostraNewCaixes()
{
?>	
<div id="DIVNewCaixes" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF" valign="top">
                    	<?php CarregaNewCaixes(); ?>
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

function CarregaNewCaixes()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Gesti&oacute; de Nova Caixa
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left">Unitats</td>
                   <td align="left"><input type="text" id="NewCaixesUnitats" style="width:30px" class="fuenteForm" /></td>
                   <td align="left">Material</td>
                   <td align="left"><select id="NewCaixesMaterial" class="fuenteForm"></select></td>
                   <td align="left">Mida</td>
                   <td align="left"><select id="NewCaixesMida" class="fuenteForm"></select></td>
                   <td align="left">Menjar</td>
                   <td align="left">
                   		<select id="NewCaixesMenjar" class="fuenteForm"></select>
                   </td>
                   <td align="right">
                       <input type="button" id="SaveNewCaixes" value="Guardar" class="fuenteForm" />
                   </td>
                   <td>
                       <input type="button" value="Cerrar" onclick="TancaFitxaNewCaixes();" class="fuenteForm"/>
                   </td>                
            	</tr>
            </table>
        </td>
    </tr>
</table>	
<?php
}
?>
