<?php
function MostraPaqueteria()
{
?>
<div id="DIVFitxa8" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF" align="center">
                    	<?php CarregaDIVPaqueteriaT(); ?>
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

function CarregaDIVPaqueteriaT()
{
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="40px" background="img/CapcaFinestretaGran.png" class="fuenteFormCapca">AV&Iacute;S D' ARRIBADA DE PAQUETERIA DEMANADA AL PROVE&Iuml;DOR PELS USUARIS </td>
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaPaqueteria();">
        </td>  
    </tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContPaqueteria" style="overflow:auto;">
			<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td  align="left" style="padding-left:10px"><b>Aquest formulari es deur&agrave; omplir amb antelaci&oacute; suficient.</b></td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td valign="top" align="center"><?php MontaCuadreVerd('MostraPaqueteriaDatos','Paqueteria'); ?></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr valign="top">
                    <td align="center"><?php MontaCuadreVerd('MostraObservacions','Paqueteria|600|100'); ?></td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td style="padding-left:10px"><font class="ast">*</font>Camps Obligatoris</td>
                </tr>
                
                <tr>
                    <td colspan="3" align="right"> 
                        <input type="button" value="Fer la comanda" onClick="GuardaPaqueteria('Paqueteria');" class="fuenteGestionNoticia">
                    </td>
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
	$("#DIVContSolicitutEspai").css('max-width', x - 100);
	$("#DIVContSolicitutEspai").css('max-height', y - 100);
</script>

<?php  
}
?>
