<?php
function MostraFormulariEmail()
{
?>
<div id="DIVFormulariEmail" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;" >
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
                    <td width="522px"  bgcolor="#FFFFFF" align="center">
                    	<?php CarregaDIVEmail(); ?>
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

function CarregaDIVEmail()
{
?>
<table  width="522px"  height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteCapcaForm" colspan="2"> Per enviar a un amic, omple aquest formulari </td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="right" class="LabelForm">El teu nom</td>
    	<td align="left" style="padding:5px"><input type="text" id="NomEmailContingut" class="TextEmailContingut" /></td>
    </tr>
    <tr>
    	<td align="right" class="LabelForm">El teu Correu electr&ograve;nic</td>
    	<td align="left" style="padding:5px"><input type="text" id="OrigenEmailContingut" class="TextEmailContingut" /></td>
    </tr>
    <tr>
    	<td align="right" class="LabelForm">Correu elect&ograve;nic del destinatari</td>
    	<td align="left" style="padding:5px"><input type="text" id="DestinatariEmailContingut" class="TextEmailContingut" /></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="2" class="LabelForm">Comentaris</td>
    </tr>
    <tr>
    	<td colspan="2" style="padding:5px"><textarea id="TAEmailcontingut"></textarea></td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="right" colspan="2" style="padding:10px">
        	<input type="button" value="Enviar" onClick="EnviaEmailcontingut();" class="fuenteGestionNoticia">
        	<input type="button" value="Cancelar" onClick="TancaFormEmail();" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php
}
?>
