<?php 
function MostraFranjaHoraria($form)
{
	switch ($form)
	{
		case "AccesPuntual":
		case "ForaHorari":
							$Titulo = "Dies pels que es sol&middot;licita l' acc&eacute;s";	
							break;
		default:
				$Titulo = "Dates i franges hor&agrave;ries de la reserva";
				break;	
	}
?>
<table width="100%" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="6"><?php echo $Titulo; ?></td>
    </tr>
    <tr>
    	<td height="15px"></td>
    </tr>
    <tr>
        <td class="fuenteFormTitol" align="left">Data</td>
        <td class="fuenteFormTitol" align="center">Franges Hor&agrave;ries</td>
    </tr>
    <tr>
    	<td colspan="6">
           		<table id="table<?php echo $form; ?>" width="100%" cellpadding="0" cellspacing="0" border="0" class="fuenteForm">
                <tr>
                	<td></td>
                </tr>
                </table>
        </td>
    </tr>
</table>
<?php
}
?>