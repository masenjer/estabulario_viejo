<?php
function MostraInformeStock()
{
?>
<table>
	<tr valign="middle">
        <td><b>Informe d'estoc per a la data actual</b></td>
        <td align="right" style="padding-left:40px"><input type="button" id="InformeStockButton" value="Format Excel" onclick="ImprimeixInformeStockXLS();" /></td>
        <td align="right" style="padding-left:40px"><input type="button" id="InformeStockButton" value="Format PDF" onclick="ImprimeixInformeStockPDF();" /></td>
    </tr>
</table>
    
<?php
}
?>
