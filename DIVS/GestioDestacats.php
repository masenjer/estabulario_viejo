<?php
function MostraGestioDestacats()
{
?>
<input type="hidden" id="IdDestacat" />
<div id="DIVGestioDestacats" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;">
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
                    	<?php CarregaDIVDestacats(); ?>
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
function CarregaDIVDestacats()
{
?>
<table width="100%" height="100%"   cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia">
	<tr valign="top">
    	<td background="img/GrisTrans.png" width="220px" valign="top"><?php CarregaDIVDestacatsEsq(); ?></td>
        <td width="2px" bgcolor="#7e7e7e"></td>
        <td background="img/BlancoTrans2.png" width="600px"><?php CarregaDIVDestacatsDret(); ?></td>
    </tr>
</table>
<?php
}
?>


<?php
function CarregaDIVDestacatsEsq()
{
?>
<table width="100%" cellpadding="0" cellspacing="6" border="0">
	<tr>
    	<td height="25px"></td>
    </tr>
    <tr>
    	<td><input type="button" id="ButtonDestacatGuarda" onclick="AnadirDestacado();"></td>
    </tr>    
    <tr>
    	<td align="center"><input type="button" id="ButtonDestacatElimina" onclick="MostraDIVDes();"><?php ConfirmaEliminaDestacat(); ?></td>
    </tr>
    <tr valign="top">
    	<td height="20px" align="center"></td>
    </tr>
    <tr valign="top">
    	<td>
        	<table cellpadding="0" cellspacing="0" border="0">
            	<tr valign="top">
                    <td background="img/CabHistoricoDestacats.png" width="209px" height="29px"></td>
                </tr>
                <tr valign="top">
                    <td height="200px">
                        <div id="ContListDestacats" style="height:100%"></div>
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
function CarregaDIVDestacatsDret()
{
?>
<table width="100%"  cellpadding="0" cellspacing="6" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td class="fuenteTituloGestionDestacats" colspan="2" align="center"> Gesti&oacute;n de Destacados</td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
<!--    <tr>
    	<td width="160px" align="left">T&iacute;tulo</td>
        <td width="600px" align="left"><input id="TituloDestacado" type="text" class="fuenteGestionNoticia" style="width:98%"></td>
    </tr>    
    <tr>
    	<td height="20px"></td>
    </tr>
-->    <tr>
    	<td align="left" width="110px">Formato del bot&oacute;n</td>
        <td align="left">
        	<select id="SelectFormatBotoDest" onchange="MostraOpcionsBotoDestacats();">
        		<option value="0">------------</option>
                <option value="1">Imagen</option>
                <option value="2">Bot&oacute;n</option>
        	</select>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        	<?php 
				MostraGestioBotoDestacats(); 
				MostraGestioImatgeDestacats();			
			?>
        </td>
    </tr>    
    <tr>
    	<td align="left">Tipo de enlace</td>
        <td align="left"><select id="SelectTipoEnlaceDest" onchange="MostraOpcionsTipoEnlaceDest();">
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
				MostraEnllacExternDestacats(); 
				MostraEnllacInternDestacats();			
				MostraEnllacDocumentDestacats();			
			?>
        </td>
    </tr>    
    <tr>
    	<td colspan="2" align="right"> 
        	<input type="button" value="Salir del gestor de Destacados" onClick="TancaGestorDestacats();" class="fuenteGestionNoticia">
        	<input type="button" id="ButtonSaveDestacat" value="Guardar" class="fuenteGestionNoticia" onclick="UpdateDestacat();">
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
function ConfirmaEliminaDestacat()
{
?>
<div id="DIVConfirmaEliminaDestacat" style="display:none;">
	<table cellspacing="4" cellpadding="0" border="0">    	
        <tr valign="middle">
        	<td align="left" width="160px">¿Est&aacute;s seguro?</td>
			<td align="left"><input type="button" id="ButtonAcceptElimina" onclick="EliminaDestacat();" /></td>
            <td align="right"><input type="button" id="ButtonCancelaElimina" onclick="$('#DIVConfirmaEliminaDestacat').slideUp();" /></td>
        </tr>

    </table>
</div>
<?php
}

function MostraGestioBotoDestacats()
{
?>
<div id="DestacatOp2" style="display:none;">
<input type="hidden" id="ColorBotoDestacat" value="#19616f" />
<input type="hidden" id="ColorTextDestacat" value="#ffffff" />
<table cellspacing="5" cellpadding="0" border="0">
	<tr>
    	<td>
            <table cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td colspan="3" height="1px" id="BordeSButton" style=" background-color:#19616f;"></td>
                <tr>
                <tr valign="middle">
                    <td id="BordeC1Button" style=" background-color:#19616f; width:1px;"></td>
                    <td>
                        <div id="DivFonsButtonProva" style="width:206px;height:41px; background-color:#19616f">
                            <div style="width:206px;height:41px;background:URL(img/MaskButton.png);">
                                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tr valign="middle">
                                        <td width="100%" height="100%" valign="middle" align="center">
                                        	<div id="DivTextButtonProva" class="DivTextButtonProva" ondblclick="CanviaTextButtonDestacat();">Texto del Bot&oacute;n</div>
                                        </td>
                                    </tr>
                                </table>
                        </div></div>
                    </td>
                    <td id="BordeC2Button" style=" background-color:#19616f; width:1px;"></td>
                </tr>	
                <tr>
                    <td height="1px" id="BordeIButton" colspan="3" style=" background-color:#19616f;"></td>
                <tr>
            </table>        
        </td>
        <td width="50px" align="center">Fondo<div id="colorFondoSelector" class="colorSelector"><div style="background-color: #19616f"></div></div></td>
        <td width="50px" align="center">Texto<div id="colorTextSelector" class="colorSelector"><div style="background-color: #ffffff"></div></div></td>	
        			
    </tr>
</table>
</div>
<?php 
}

function MostraGestioImatgeDestacats()
{
?>
<div id="DestacatOp1" style="display:none;">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tr valign="top">
        <td></td>
        <td width="100px" align="right">
            <input type="hidden" id="NomImatgeDestacat" />
              <form  ENCTYPE="multipart/form-data" id="FormPujaImatgeDestacat" name="FormPujaImatgeDestacat" method="post" action="PHP/UploadFiles.php?op=3"  target="IframePujaImatgeDestacat">
                  <label class="cabinet">
                        <input type="file" id="ImatgeDestacat" name="Imatge" onchange="CopiaNomImatgeDestacat(this.value)" class="file" />
                  </label>
              </form>   
         </td>
    </tr>
    <tr>
         <td colspan="2" align="center"><div id="DIVImatgeDestacat" style="width:208; height:41px;"></div></td>                                                
   </tr>                                                
</table>  
<iframe name="IframePujaImatgeDestacat" style="display:none"></iframe>
</div>
<?php
}

function MostraEnllacInternDestacats()
{
?>
<div id="DIVEnllac1" style="display:none;">
<input type="hidden" id="CadenaEnllacInternMenuDest" />
<table>
	<tr>
    	<td>Men&uacute; superior:</td>
        <td><select id="EnllacCapMenuDest" onchange="CarregaSelectLinsMenu('','','');"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; izquierdo:</td>
        <td><select id="EnllacLinMenu0" onchange="CreaCadenaSelectsDestacats(0);"></select></td>
    </tr>
    <tr>
    	<td>Men&uacute; derecho:</td>
        <td><select id="EnllacLinMenu1" onchange="CreaCadenaSelectsDestacats(1);"></select></td>
    </tr>	
</table>
</div>
<?php
}

function MostraEnllacExternDestacats()
{
?>
<div id="DIVEnllac2" style="display:none;" align="left">
URL: 	<input type="text" id="EllacExternDest"  style="width:300px"/>
</div>
<?php
}

function MostraEnllacDocumentDestacats()
{
?>
<div id="DIVEnllac3" style="display:none;" align="left">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
    <tr valign="top">
        <td></td>
        <td width="100px" align="right">
            <input type="hidden" id="NomDocumentDestacat" />
            <input type="hidden" id="NomDocumentDestacatAntic" />
              <form  ENCTYPE="multipart/form-data" id="FormPujaNomDocumentDestacat" name="FormPujaNomDocumentDestacat" method="post" action="PHP/UploadFiles.php?op=4"  target="IframePujaDocumentDestacat">
                  <label class="cabinet">
                        <input type="file" id="DocumentDestacat" name="Imatge" onchange="CopiaNomDocumentDestacat(this.value)" class="file" />
                  </label>
              </form>   
         </td>
    </tr>
    <tr>
         <td colspan="2" align="center"><div id="DIVDocumentDestacat" style="width:208; height:41px;"></div></td>                                                
   </tr>                                                
</table>  
<iframe name="IframePujaDocumentDestacat" style="display:none"></iframe>
</div>
<?php
}
?>