<?php
function MostraGestioEnDir()
{
?>
<input type="hidden" id="IdEnDir" />
<div id="DIVGestioEnDir" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;">
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
                    <td width="822px" height="400px">
                    	<?php CarregaDIVEnDir(); ?>
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
function CarregaDIVEnDir()
{
?>
<table width="100%" height="100%"  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia">
	<tr valign="top">
    	<td background="img/GrisTrans.png" width="220px" valign="top"><?php CarregaDIVEnDirEsq(); ?></td>
        <td width="2px" bgcolor="#7e7e7e"></td>
        <td background="img/BlancoTrans2.png" width="600px"><?php CarregaDIVEnDirDret(); ?></td>
    </tr>
</table>
<?php
}
?>


<?php
function CarregaDIVEnDirEsq()
{
?>
<table width="100%"  cellpadding="0" cellspacing="6" border="0">
	<tr>
    	<td height="25px"></td>
    </tr>
    <tr>
    	<td><input type="button" id="ButtonEnDirGuarda" onclick="AnadirEnDir();"></td>
    </tr>    
    <tr>
    	<td align="center"><input type="button" id="ButtonEnDirElimina" onclick="MostraDIVEnDirElimina();"><?php ConfirmaEliminaEnDir(); ?></td>
    </tr>
    <tr valign="top">
    	<td height="20px" align="center"></td>
    </tr>
    <tr valign="top">
    	<td>
        	<table cellpadding="0" cellspacing="0" border="0">
            	<tr valign="top">
                    <td background="img/CabHistoricoEnDir.png" width="209px" height="29px"></td>
                </tr>
                <tr valign="top">
                    <td height="200px">
                        <div id="ContListEnDir" style="height:100%; overflow-y:auto;"></div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>    
</table>
<?php
}
?>


<?php
function CarregaDIVEnDirDret()
{
?>
<table width="100%" cellpadding="0" cellspacing="6" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td class="fuenteTituloGestionEnDir" colspan="2" align="center"> Gesti&oacute;n de Enlaces Directos</td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td width="160px" align="left">T&iacute;tulo</td>
        <td width="600px" align="left"><input id="TituloEnDir" type="text" class="fuenteGestionNoticia" style="width:98%"></td>
    </tr>    
    <tr>
    	<td height="20px"></td>
    </tr>
    
    <tr>
    	<td align="left">Tipo de enlace</td>
        <td align="left"><select id="SelectTipoEnlaceEnDir" onchange="MostraOpcionsTipoEnlaceDirecto();">
        		<option value="0">------------</option>
                <option value="1">Interno</option>
                <option value="2">Externo</option>
                <option value="3">Document</option>
        	</select>
         </td>
    </tr> 
    <tr>
    	<td colspan="2">
        	<?php 
				MostraEnllacExternEnDir(); 
				MostraEnllacInternEnDir();
				MostraEnllacDocumentEnDir();			
			?>
        </td>
    </tr>    
  
    <tr>
    	<td colspan="2" align="right"> 
        	<input type="button" value="Cancelar" onClick="TancaGestorEnDir();" class="fuenteGestionNoticia">
        	<input type="button" id="ButtonSaveEnDir" value="Guardar" class="fuenteGestionNoticia" onclick="UpdateEnDir();">
        </td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
</table>
<?php  
}
?>

<?php
function ConfirmaEliminaEnDir()
{
?>
<div id="DIVConfirmaEliminaEnDir" style="display:none;">
	<table cellspacing="4" cellpadding="0" border="0">    	
        <tr valign="middle">
        	<td align="left" width="160px">¿Est&aacute;s seguro?</td>
			<td align="left"><input type="button" id="ButtonAcceptElimina" onclick="EliminaEnDir();" /></td>
            <td align="right"><input type="button" id="ButtonCancelaElimina" onclick="$('#DIVConfirmaEliminaEnDir').slideUp();" /></td>
        </tr>

    </table>
</div>
<?php
}



function MostraEnllacInternEnDir()
{
?>
<div id="DIVEnllacDir1" style="display:none;">
<input type="hidden" id="CadenaEnllacInternMenuEnDir" />
<table>
	<tr>
    	<td>Men&uacute; superior:</td>
        <td><select id="EnllacCapMenuEnDir" onchange="CarregaSelectLinsMenuEnDir('','','');"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; izquierdo:</td>
        <td><select id="EnllacLinMenuEnDir0" onchange="CreaCadenaSelectsEnDir(0);"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; derecho:</td>
        <td><select id="EnllacLinMenuEnDir1" onchange="CreaCadenaSelectsEnDir(1);"></select></td>
    </tr>	
</table>
</div>
<?php
}

function MostraEnllacExternEnDir()
{
?>
<div id="DIVEnllacDir2" style="display:none;" align="left">
URL: 	<input type="text" id="EllacExternEnDir"  style="width:300px"/>
</div>
<?php
}

function MostraEnllacDocumentEnDir()
{
?>
<div id="DIVEnllacDir3" style="display:none;" align="left">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tr valign="top">
        <td></td>
        <td width="100px" align="right">
            <input type="hidden" id="NomDocumentEnDir" />
            <input type="hidden" id="NomDocumentEnDirAntic" />
              <form  ENCTYPE="multipart/form-data" id="FormPujaNomDocumentEnDir" name="FormPujaNomDocumentEnDir" method="post" action="PHP/UploadFiles.php?op=4"  target="IframePujaDocumentEnDir">
                  <label class="cabinet">
                        <input type="file" id="DocumentEnDir" name="Imatge" onchange="CopiaNomDocumentEnDir(this.value)" class="file" />
                  </label>
              </form>   
         </td>
    </tr>
    <tr>
         <td colspan="2" align="center"><div id="DIVDocumentEnDir" style="width:208; height:41px;"></div></td>                                                
   </tr>                                                
</table>  
<iframe name="IframePujaDocumentEnDir" style="display:none"></iframe>
</div>
<?php
}
?>