<?php
function MostraGestioNoticies()
{
?>
<input type="hidden" id="IdNoticia" />
<div id="DIVGestioNoticies" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;">
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
                    	<?php CarregaDIVNoticies(); ?>
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
function CarregaDIVNoticies()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia">
	<tr>
    	<td background="img/GrisTrans.png" width="220px" valign="top"><?php CarregaDIVNoticiesEsq(); ?></td>
        <td width="2px" bgcolor="#7e7e7e"></td>
        <td background="img/BlancoTrans2.png" width="600px"><?php CarregaDIVNoticiesDret(); ?></td>
    </tr>
</table>
<?php
}
?>


<?php
function CarregaDIVNoticiesEsq()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="6" border="0">
	<tr>
    	<td height="25px"></td>
    </tr>
    <tr>
    	<td><input type="button" id="ButtonNoticiaGuarda" onclick="CargaNoticias('');"></td>
    </tr>    
    <tr>
    	<td align="center"><input type="button" id="ButtonNoticiaElimina" onclick="MostraDIVEN();"><?php ConfirmaEliminaNot(); ?></td>
    </tr>
    <tr valign="top">
    	<td height="20px" align="center"></td>
    </tr>
    <tr valign="top">
    	<td>
        	<table cellpadding="0" cellspacing="0" border="0">
            	<tr valign="top">
                    <td background="img/CabHistoricoNoticias.png" width="209px" height="29px"></td>
                </tr>
                <tr valign="top">
                    <td height="498px">
                        <div id="ContListNoticias" style="height:100%; overflow-y:auto;"></div>
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
function CarregaDIVNoticiesDret()
{
?>
<table width="100%" height="100%" cellpadding="0" cellspacing="6" border="0" align="center" class="fuenteGestionNoticia"> 
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td class="fuenteTituloGestionNoticias" colspan="2" align="center"> Gesti&oacute;n de noticias</td>
    </tr>
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td width="160px" align="left">T&iacute;tulo de la noticia</td>
        <td width="600px" align="left"><input id="TituloNoticia" type="text" class="fuenteGestionNoticia" style="width:98%"></td>
    </tr>    
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td colspan="2"><?php FechasEImagenesNot();?></td>
    </tr>
    
    <tr>
    	<td height="20px"></td>
    </tr>
    <tr>
    	<td align="left">Contenido</td>
    </tr>
    <tr>
    	<td colspan="2" height="100px"><textarea id="TANoticia" class="fuenteGestionNoticia"></textarea></td>
    </tr>
    <tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td colspan="2" align="right"> 
        	<input type="button" value="Salir del gestor de noticias" onClick="TancaGestorNoticies();" class="fuenteGestionNoticia">
        	<input type="button" id="ButtonSaveNoticia" value="Guardar" class="fuenteGestionNoticia" onclick="SaveNoticia();">
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
function ConfirmaEliminaNot()
{
?>
<div id="DIVConfirmaEliminaNot">
	<table cellspacing="4" cellpadding="0" border="0">    	
        <tr valign="middle">
        	<td align="left" width="160px">¿Estás seguro?</td>
			<td align="left"><input type="button" id="ButtonAcceptElimina" onclick="EliminaNoticia();" /></td>
            <td align="right"><input type="button" id="ButtonCancelaElimina" onclick="$('#DIVConfirmaEliminaNot').slideUp();" /></td>
        </tr>

    </table>
</div>
<?php
}

function FechasEImagenesNot()
{
?>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
    	<td><?php FechasNoticias(); ?></td>
        <td width="10px"></td>
        <td><?php ImagenNoticias(); ?></td>
    </tr>
</table>


<?php 
}

function FechasNoticias()
{
?>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
    	<td align="left">Fecha de la noticia</td>
        <td height="22px" valign="bottom" align="left"><input type="text" id="FechaNoticia" class="fuenteGestionNoticia"></td>
    </tr>
    <tr>
    	<td align="left">Fecha Publicaci&oacute;n noticia</td>
        <td align="left"><input type="text" id="FechaNoticiaIN" class="fuenteGestionNoticia"></td>
    </tr>
    <tr>
    	<td align="left">Fecha Retirada noticia</td>
        <td align="left"><input type="text" id="FechaNoticiaOUT" class="fuenteGestionNoticia"></td>
    </tr>
</table>


<?php 
}

function ImagenNoticias()
{
?>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
	<tr valign="top">
	    <td width="100px" align="right">
        	<input type="hidden" id="NomImatgeNoticia" />
              <form  ENCTYPE="multipart/form-data" id="FormPujaImatgeNoticia" name="FormPujaImatgeNoticia" method="post" action="PHP/UploadFiles.php?op=2"  target="IframePujaImatgeNoticia">
                  <label class="cabinet">
                  		<input type="file" id="ImatgeNoticia" name="Imatge" onchange="CopiaNomImatgeNoticia(this.value)" class="file" />
                  </label>
              </form>   
         </td>
    </tr>
    <tr>
         <td align="center"><div id="DIVImatgeNoticia"></div></td>                                                
       </tr>                                                
    </table>  
        <iframe name="IframePujaImatgeNoticia" style="display:none"></iframe>  
<?php 
}
?>