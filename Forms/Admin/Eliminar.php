<?php
function MostraEliminarAdmin()
{
?>
<div id="DIVEliminaAdmin" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; ">
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
                    <td width="350px" height="200px" background="img/BlancoTrans2.png" >
                    	<?php CarregaDIVEliminarAdmin(); ?>
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
function CarregaDIVEliminarAdmin()
{
?>
<table width="100%" height="100%"  cellpadding="0" cellspacing="0" border="0" align="center" class="fuenteGestionNoticia">
	<tr valign="middle">
        <td colspan="3" align="center"><img src="img/Alert.png" /></td>
	<tr valign="middle">
        <td colspan="3" align="center"><div id="AvisEliminarAdmin" style="padding:10px;"></div></td>
    </tr>
    <tr>
    	<td width="173" align="right"><input type="button" id="ButtonEliminaAdmin" value="S&iacute;" /></td>
        <td width="5px"></td>
    	<td width="172" align="left"><input type="button" id="ButtonCancelaAdmin" value="No" /></td>
    </tr>
</table>
<?php
}
?>


