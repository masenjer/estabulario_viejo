<?php
function MostraInformeFacturacio()
{
?>
<table>
	<tr>
        <td colspan="2" style="padding-bottom:20px"><b>Informe de facturaci&oacute; entre dates (ambdues incloses)</b></td>
    </tr>
	<tr valign="top">
    	<td>
            <table>
                
                <tr>
                    <td style="padding-left:20px;">Data inicial</td>
                    <td><input type="text" id="FechaInicialInformeFacturacio" readonly="readonly" /></td>
                </tr>
                <tr>
                    <td style="padding-left:20px;">Data final</td>
                    <td><input type="text" id="FechaFinalInformeFacturacio" readonly="readonly"  /></td>
                </tr>
                <tr>
                	<td style="padding-left:20px;">Investigador Principal</td>
                    <td><Select id="SelectIPFacturacio" class="fuenteGestionNoticia" onchange="CarregaSelectProjecteFacturacio();">
                    		<option value="">-------------------</option>
                        </Select>
                    </td>
                </tr>
                <tr>
                	<td style="padding-left:20px;">Projecte</td>
                    <td><select id="SelectProjecteFacturacio" class="fuenteGestionNoticia">
                    		<option value="">-------------------</option>
                    	</select>
                    </td>
                </tr>
            </table>	
        </td>
        <td align="right" style="padding-left:40px"><input type="button" id="InformeFacturacioButton" value="Imprimir informe" onclick="ImprimeixInformeFacturacio();" /></td>
    </tr>
</table>
    
<?php
}
?>
