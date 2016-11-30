<?php 
function MostraObservacions($cadena)
{
	$c = explode("|",$cadena);
?>
<table width="<?php echo $c[1];?>px" border="0" class="fuenteForm">
	<tr>
    	<td class="fuenteFormTitol" colspan="2" align="left">
        	Observacions
        </td>
   	</tr>
   	<tr>
        <td>
        	<textarea id="Obs<?php echo $c[0]; ?>" class="inputForm" style="width:<?php echo $c[1] ;?>px; height:<?php echo $c[2];?>px;"></textarea>
        </td>
    </tr>
</table>
<?php
}
?>