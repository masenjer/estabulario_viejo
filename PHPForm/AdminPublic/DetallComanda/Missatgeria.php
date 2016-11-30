<?php
function MostraMissatgeria($id)
{
?>
<table width="100%">
	<tr>
    	<td style="padding-top:15px;"><b>Enviar un missatge nou relacionat amb aquesta comanda:</b></td>
    </tr>
    <tr>
    	<td>
        	<textarea id="TextMissatgeUserObs" class="TextAreaObs" ></textarea>
        </td>
    </tr>
    <tr>
    	<td align="right"><button onclick="EnviaMissatgeObsUser(<?php echo $id; ?>);" class="InputForm">Enviar missatge</button></td>
    </tr>
</table>
<?php
}
?>