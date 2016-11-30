<?php
function MostraNewCompraDietaoFarmac()
{
?>	
<div id="DIVNewCompraDietaoFarmac" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    	<?php CarregaNewCompraDietaoFarmac(); ?>
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

function CarregaNewCompraDietaoFarmac()
{
?>	
<table  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
		<td colspan="2" height="40px" background="img/CapcaFinestretaGran.jpg" class="fuenteFormCapca">
        	Nova línia de Petició de Consumibles
        </td>    
	</tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >
                <tr>
                    <td><input type="text" id="CantNewCompraDietaoFarmac" class="fuenteForm" style="width:20px;"  /></td>
                    <td> unitats de  </td>
                    <td><select id="SelectNewCompraDietaoFarmac" class="fuenteForm" ></select></td>
                    <td>per el dia</td>
                    <td><input type="text" id="FechaNewCompraDietaoFarmac" /></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="button" id="SaveNewCompraDietaoFarmac" value="Guardar" />
            <input type="button" value="Cerrar" onclick="TancaFitxaNewCompraDietaoFarmac();" />
        </td>
    </tr>
</table>	
<?php
}
?>
