<?php

function MostraInformeDiari()
{
?>
<table>
	<tr>
    	<td colspan="3" style="padding-bottom:20px"><b>Informe d'agenda di&agrave;ria</b></td>
    </tr>
	<tr>
    	<td style="padding-left:20px;">Data</td>
        <td><input type="text" id="FechaInformeDiari" readonly /></td>
        <td><input type="button" id="InformeDiariButton" value="Imprimir informe" onClick="ImprimeixInformeDiari();" /></td>
    </tr>
    <tr>
    	<td colspan="3" style="padding-top:20px">
        	<?php MostratablaChecksInformeDiari(); ?>
        </td>
    </tr>
</table>	
<?php    
}
function MostratablaChecksInformeDiari()
{
?>
<table cellspacing="5" border="0">
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari0" /></td>
        <td>Reserva d'espais i equips al SE</td>
    	<td><input type="checkbox" id="checkInformeDiari1" /></td>
        <td>Animals estabulats al SE</td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari2" /></td>
        <td>Petici&oacute; de femelles acoblades</td>
    	<td><input type="checkbox" id="checkInformeDiari3" /></td>
        <td>Compra d'animals</td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari4" /></td>
        <td>Compra de fungibles</td>
    	<td><input type="checkbox" id="checkInformeDiari5" /></td>
        <td>Hormonaci&oacute; i encreuaments</td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari6" /></td>
        <td>Encreuaments</td>
    	<td><input type="checkbox" id="checkInformeDiari7" /></td>
        <td>Gàbies i animals</td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari8" /></td>
        <td>Sol·licitud d' espai per a l'allotjament d'animals</td>
    	<td><input type="checkbox" id="checkInformeDiari9" /></td>
        <td>Arribada de paqueteria</td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari10" /></td>
        <td>Entrada de materials a la planta baixa</td>
    </tr>
	<tr>
    	<td height="15px"></td>
    </tr>
	<tr>
    	<td><input type="checkbox" id="checkInformeDiari11" /></td>
        <td>Acc&eacute;s puntual al SE</td>
    	<td><input type="checkbox" id="checkInformeDiari12" /></td>
        <td>Acc&eacute;s fora horari</td>
    </tr>
</table>
<?php	
}
?>