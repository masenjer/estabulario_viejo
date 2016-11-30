<?php 
function MostraDIVConsumible($valor)
{
	$c = explode("|",$valor);
	$form = $c[0];
	$op = $c[1];

	switch($op)
	{
		case "CajaTrans": 	$Titol = "Caixes de transport";
							break;
		case "Farmac": 		$Titol = "F&agrave;rmacs";
							break;
		case "Lecho":		$Titol = "Ja&ccedil;os";	
							break;
		case "Desinfectante":$Titol = "Desinfectant";	
							break;			
		default: $Titol = $op;
		
	}
		
?>
	
<table border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" align="left" colspan="2"><?php echo $Titol; ?></td>
    </tr>
    <tr>
    	<td>
            <table cellpadding="5" cellspacing="0" border="0" class="fuenteForm" id="table<?php echo $op; ?><?php echo $form; ?>" >
            </table>
        </td>
    </tr>
</table>
<?php
}
?>