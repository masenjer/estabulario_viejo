<?php
function MostraInformeAnualStock()
{
?>
<table>
	<tr valign="middle">
        <td><b>Informe d' utilizació/recollida d' animals durant un any</b></td>
        <td align="right" style="padding-left:40px">Any: 
        	<select id="AnyInformeAnualStock" class="fuenteGestionNoticia">
            	<option value="2014">2014</option>
            	<option value="2015">2015</option>
            	<option value="2016">2016</option>
            	<option value="2017">2017</option>
            	<option value="2018">2018</option>
            	<option value="2019">2019</option>
            	<option value="2020">2020</option>
            	<option value="2021">2021</option>
            	<option value="2022">2022</option>
            	<option value="2023">2023</option>
            	<option value="2024">2024</option>
            	<option value="2025">2025</option>
            	<option value="2026">2026</option>
            	<option value="2027">2027</option>
            	<option value="2028">2028</option>
            	<option value="2029">2029</option>
            </select>
        </td>
        <td align="right" style="padding-left:40px"><input type="button" value="Format Excel" onclick="ImprimeixInformeAnualMoviments();" /></td>
    </tr>
</table>
    
<?php
}
?>
