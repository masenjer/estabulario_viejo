<?php
function MostraGestioContacte()
{
?>
<input type="hidden" id="IdContacte" />
<div id="DIVGestioContacte" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;" >
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
                    <td width="522px" height="400px" background="img/BlancoTrans2.png">
                    	<?php CarregaDIVContacte(); ?>
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
?>




<?php
function CarregaDIVContacte()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="6" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td class="fuenteTituloGestionContacte" colspan="2" align="center"> Gesti&oacute;n de Contacto</td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td width="160px" align="left">T&iacute;tulo</td>
    </tr>
    <tr>
        <td width="600px" align="left"><input id="TituloContacte" type="text" class="fuenteGestionNoticia" style="width:98%"></td>
    </tr> 
    <tr>
    	<td align="left">Informaci&oacute;n</td>
    </tr>
    <tr>
    	<td><textarea id="TAInfoContacte" style="width:100%;"></textarea></td>
    </tr>   
    <tr>
    	<td height="20px"></td>
    </tr>
    
    <tr>
    	<td colspan="2">
        	<?php 
				MostraEnllacInternContacte();			
			?>
        </td>
    </tr>    
  
    <tr>
    	<td colspan="2" align="right"> 
        	<input type="button" value="Cancelar" onClick="TancaGestiocontacte();" class="fuenteGestionNoticia">
        	<input type="button" id="ButtonSaveContacte" value="Guardar" class="fuenteGestionNoticia" onclick="UpdateContacteEdicio();">
        </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
</table>
<?php  
}

function MostraEnllacInternContacte()
{
?>
<div id="DIVEnllacDir1">
<input type="hidden" id="CadenaEnllacInternMenuContacte" />
<table>
	<tr>
    	<td align="left">Men&uacute; superior:</td>
        <td align="left"><select id="EnllacCapMenuContacte" onchange="CarregaSelectLinsMenuContacte('','','');"></select></td>
    </tr>
    <tr>
    	<td align="left">Men&uacute; izquierdo:</td>
        <td align="left"><select id="EnllacLinMenuContacte0" onchange="CreaCadenaSelectsContacte(0);"></select></td>
    </tr>
    <tr>
    	<td align="left">Men&uacute; derecho:</td>
        <td align="left"><select id="EnllacLinMenuContacte1" onchange="CreaCadenaSelectsContacte(1);"></select></td>
    </tr>	
</table>
</div>
<?php
}

function MostraEnllacExternContacte()
{
?>
<div id="DIVEnllacDir2" style="display:none;" align="left">
URL: 	<input type="text" id="EllacExternContacte"  style="width:300px"/>
</div>
<?php
}
?>