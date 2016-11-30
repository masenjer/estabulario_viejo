<?php
function MostraSolicitutEspai()
{
?>
<div id="DIVFitxa7" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaDIVSolicitutEspaiT(); ?>
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

function CarregaDIVSolicitutEspaiT()
{
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">SOL&middot;LICITUD D' ESPAI PER A L' ALLOTJAMENT D' ANIMALS</td>    
        <td align="right" background="img/FonsCapcaFinestra.jpg">
        	<input type="button" class="TancarButton" onClick="TancaSolicitutEspai();">
        </td>  
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF" align="center" colspan="2">
        	<div id="DIVContSolicitutEspai" style="overflow:auto;">
			<table width="800px" cellpadding="0" cellspacing="10" border="0" align="center" class="fuenteGestionNoticia"> 
                <tr>
                    <td colspan="2" style="padding-right:10px;">
                    	<?php MuestraTextoEntrada(); ?>
                    
                    </td>
                </tr>
                <tr>
                    <td valign="top"><?php CarregaDIVSolicitutEspaiE(); ?></td>
                    <td valign="top"><?php CarregaDIVSolicitutEspaiD(); ?></td>
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

function CarregaDIVSolicitutEspaiE()
{
?>
<table width="520px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraNumProcediment','SolicitutEspai'); ?> </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraDatosProcedencia','SolicitutEspai'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td align="center"><?php MontaCuadreVerd('MostraAnimalesJaula','SolicitutEspai'); ?></td>
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
function CarregaDIVSolicitutEspaiD()
{
?>
<table width="300px" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr valign="top">
    	<td align="center"><?php MontaCuadreVerd('MostraObservacions','SolicitutEspai|270|270'); ?></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="3" align="right"> 
        	<input type="button" value="Fer la Comanda" onClick="GuardaSolicitutEspais('SolicitutEspai');" class="fuenteGestionNoticia">
        </td>
    </tr>
</table>
<?php  
}

function MuestraTextoEntrada()
{
?>
<table width="100%">
    <tr>
        <td style="text-align:justify;">
            <b>Instruccions</b>
            <ol>
                <li value="1">Es recorda a tots els investigadors, que no es podr&agrave; comen&ccedil;ar el procediment experimental fins a, com a m&iacute;nim, 6 dies despr&eacute;s de la recepci&oacute; dels animals al Servei Estabulari, una vegada que aquests hagin passat el per&iacute;ode d'aclimataci&oacute;-quarentena.</li>
                <li value="2">Enviar aquest formulari emplenat, com a m&iacute;nim 7 dies abans de l'arribada dels animals.</li>
                <li value="3">Si durant el transcurs del procediment &eacute;s necessari canviar la distribuci&oacute; dels animals en grups diferents, cal avisar, com a m&iacute;nim, 4 dies laborals abans del canvi, mitjan&ccedil;ant un correu electr&ograve;nic dirigit a   <a href= "mailto:Jordi.Canto@uab.cat?cc=se.suport.veterinari@uab.cat&amp;cc=s.estabulari@uab.cat" >aquestes adreces</a> </li>
                <li value="4">Si la seva "Proced&egrave;ncia dels animals" (Prove&iuml;dor), "Esp&egrave;cie" o "Soca", no es troben entre els llistats, serveixi's posar-se en contacte amb el Servei Estabulari.</li>
            </ol>
        </td>
    </tr>
</table>
<?php
}
?>
