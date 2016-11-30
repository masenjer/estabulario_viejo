<?php
function MostraImpoAnimales($form)
{
	if ($form == "Impo"){
		$impoMessage = "Animals que s'han d'importar";
		$button = '<div align="right"><input type="button" id="PlusImpoButton" class="ButtonPlus" onclick="CreaFilaImpo(1,'.$form.');" title="Afegir nova l&iacute;nia d\'importació"/></div>';
	}
	else $impoMessage = "Animals que s'han d'exportar";
	
?>	
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="2"><?php echo $impoMessage; ?></td>
    </tr>
    <tr>
    	<td>
            <table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm"  id="table<?php echo $form;?>">
                
            </table>
             <?php echo $button;  ?>

        </td>
    </tr>
</table>
<?php
}
?>