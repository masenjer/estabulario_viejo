<?php
function MostraNewJaulasJaula()
{
?>	
<div id="DIVNewJaulasJaula" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaNewJaulasJaula(); ?>
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

function CarregaNewJaulasJaula()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de G&agrave;vies
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%" valign="top"><?php MostraNewJaulasJaulaI();?></td>
                   <td align="left"><?php MostraNewJaulasJaulaD();?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" style="padding:10px;">
        	<input type="button" id="SaveNewJaulasJaula" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewJaulasJaula();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewJaulasJaulaI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewJaulasJaula" onchange="OmpleCepas(0,'NewJaulasJaula');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewJaulasJaula" class="fuenteForm">				
            </td>
        </tr>
    </table>
<?php
}

function MostraNewJaulasJaulaD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tr>
        	<td align="left">Sala</td>
        	<td align="left"><select id="SalaNewJaulasJaula" class="fuenteForm"/></select></td>
        </tr>
        <tr>
        	<td align="left">Posici&oacute;</td>
            <td align="left"><input type="text" id="PosicionNewJaulasJaula"  class="fuenteForm"/></td>
        </tr>
        <tr>
        	<td align="left">N&deg; G&agrave;via</td>
            <td align="left"><input type="text" id="NJaulaNewJaulasJaula" class="fuenteForm" /></td>   
        </tr>
 </table>
<?php
}
?>
