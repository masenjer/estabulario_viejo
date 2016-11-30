<?php 
function MontaCuadreVerd($funcion, $arg)
{
?>

<!--<table width="100%" cellspacing="0" cellpadding="0" border="0">-->
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
    	<td width="7px" background="img/TaulacuadreVerd/ESI.png"></td>
    	<td height="7px" background="img/TaulacuadreVerd/ESC.png"></td>
    	<td width="9px" background="img/TaulacuadreVerd/ESD.png"></td>
    </tr>
	<tr>
    	<td background="img/TaulacuadreVerd/ECI.png"></td>
    	<td background="img/TaulacuadreVerd/ECC.png">
        	<div><?php $funcion ($arg); ?></div>
        </td>
    	<td background="img/TaulacuadreVerd/ECD.png"></td>
    </tr>
	<tr>
    	<td width="7px" background="img/TaulacuadreVerd/EII.png"></td>
    	<td height="7px" background="img/TaulacuadreVerd/EIC.png"></td>
    	<td width="9px" background="img/TaulacuadreVerd/EID.png"></td>
    </tr>
</table>

<?php
}
?>