<?php
function MostraNewJaulasAnim()
{
?>	
<div id="DIVNewJaulasAnim" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaNewJaulasAnim(); ?>
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

function CarregaNewJaulasAnim()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de Animals
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                   <td align="left" width="50%"><?php MostraNewJaulasAnimI();?></td>
                   <td align="left"><?php MostraNewJaulasAnimD();?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewJaulasAnim" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewJaulasAnim();" />
        </td>
    </tr>
</table>	
<?php
}

function MostraNewJaulasAnimI()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left" width="55px">Esp&egrave;cie</td>
            <td align="left" width="400px">
				<select id="Especie0NewJaulasAnim" onchange="OmpleCepas(0,'NewJaulasAnim');" class="fuenteForm"></select>
            </td>
        </tr>          	
    	<tr>
        	<td align="left" width="45px">Soca</td>
            <td align="left">
            	<select id="Cepa0NewJaulasAnim" class="fuenteForm">				
            </td>
        </tr>
    </table>
<?php
}

function MostraNewJaulasAnimD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td align="left">Unitats</td>
            <td align="left"><input type="text" id="CantidadNewJaulasAnim"  class="fuenteForm"/></td>
        </tr>
    	<tr>
        	<td align="left">Raton ID</td>
            <td align="left"><input type="text" id="RatonIDNewJaulasAnim" class="fuenteForm"/></td>
        </tr>
    </table>
<?php
}
?>
