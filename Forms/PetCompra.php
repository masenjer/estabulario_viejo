<?php
function MostraCompra()
{
?>
<div id="DIVFitxa4" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none; " >
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
                    <td bgcolor="#FFFFFF">
                    	
                            <div id="DIVFitxa41" style="text-align:center; vertical-align:middle; background-color:#FFF;"><?php CarregaOpcionsCompra(); ?></div>
                            <div id="DIVFitxa42" style="display:none"><?php CarregaDIVCompraAnimT(); ?></div>
                            <div id="DIVFitxa43" style="display:none"><?php CarregaDIVCompraDietasT(); ?></div>
                            <div id="DIVFitxa44" style="display:none"><?php CarregaDIVCompraFarmacsT(); ?></div>
                        
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

function CarregaOpcionsCompra()
{
?>

	<table width="100%"  cellpadding="2" cellspacing="0" border="0">
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td  align="center"><b>Sel&middot;leccioni una opci&oacute; de compra</b></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
        <tr>
        	<td height="41px" onClick="MostraCompraAnim();" align="center">					
				<?php CreaDestacatButton("#19616f|#ffffff|Compra d' animals"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraCompraDietas();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Compra de dietes, ja&ccedil;os i caixes de transport"); ?>
			</td>
        </tr>
    	<tr>
        	<td height="41px" onClick="MostraCompraFarmacs();" align="center">						
				<?php CreaDestacatButton("#19616f|#ffffff|Compra de f&agrave;rmacs, desinfectants i fungibles"); ?>
			</td>
        </tr>
        <tr>
        	<td height="50px"></td>
        </tr>
        <tr>
        	<td align="center"><input type="button" value="Cancel&middot;lar" onclick="TancaCompra();"  /></td>
        </tr>
        <tr>
        	<td height="30px"></td>
        </tr>
	</table>
<?php	
}
?>
