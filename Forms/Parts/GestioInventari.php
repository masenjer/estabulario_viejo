<?php 
function MostraGestioInventari()
{
?>
    <table width="98%" border="0" cellpadding="5" class="fuenteForm">
        <tr>
            <td align="left"><?php MostraGestioInventariI(); ?></td>
            <td align="left"><?php MostraGestioInventariD(); ?></td>               
        </tr>
    </table>
<?php
}

function MostraGestioInventariI()
{
?>
	<table cellspacing="0" cellpadding="2" border="0" class="fuenteForm">
    	<tr>
        	<td class="fuenteFormTitol" align="left">Tipus de moviment</td>
        </tr>
    	<tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="1" onclick="InicialitzaCampAlbaraNStock(true);" /> Inventari
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="2" onclick="InicialitzaCampAlbaraNStock(true);" />   
                	Naixement
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="3" onclick="InicialitzaCampAlbaraNStock(false);" /> Compra
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="4" onclick="InicialitzaCampAlbaraNStock(true);" /> Mort
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="5" onclick="InicialitzaCampAlbaraNStock(true);" /> Venda
            </td>
        </tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="8" onclick="InicialitzaCampAlbaraNStock(true);" /> Excedent
            </td>
        </tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="9" onclick="InicialitzaCampAlbaraNStock(true);" /> Sexat
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="6" onclick="InicialitzaCampAlbaraNStock(true);" /> Reserva
            </td>
        </tr>
        <tr>
        	<td align="left">
            	<input type="radio" id="RTipusMov" name="RTipusMov" value="7" onclick="InicialitzaCampAlbaraNStock(true);" /> Allibera
            </td>
        </tr>
    </table>
<?php
}
function MostraGestioInventariD()
{
?>
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
        	<td valign="top"><?php MostraGestioInventariD1(); ?></td>
        	<td valign="top"><?php MostraGestioInventariD2(); ?></td>
        </tr>
        <tr>
        	<td colspan="2" align="right"><input type="button" value="Guarda moviment d'estoc" class="fuenteForm" onclick="GuardaMOVStock();"/></td>
        </tr>
    </table>
<?php
}	
function MostraGestioInventariD1()
{
?>
	<table cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td>
            	Data Naix 
            </td>
            <td>
            	<input type="text" id="NStockDataNaix" class="fuenteForm" readonly="readonly" />
            </td>
        </tr>
    	<tr>
        	<td>
            	Mascles 
            </td>
            <td>
            	<input type="text" id="NStockMachos" class="fuenteForm" />
            </td>
        </tr>
    	<tr>
        	<td>
            	Femelles 
            </td>
            <td>
           		<input type="text" id="NStockHembras" class="fuenteForm" />
            </td>
        </tr>
    </table>
<?php
}	
function MostraGestioInventariD2()
{
?>
	<table cellspacing="0" cellpadding="2" border="0">
    	<tr>
        	<td>
            	N&deg;Proc 
            </td>
            <td>
            	<select id="NStockNProc" class="fuenteForm"/></select>
            </td>
        </tr>
    	<tr>
        	<td>
            	Comanda 
            </td>
            <td>
            	<input type="text" id="NStockComanda" class="fuenteForm" />
            </td>
        </tr>
    	<tr>
        	<td>
            	N&deg;Albar&agrave; 
            </td>
            <td>
           		<input type="text" id="NStockNAlbara" class="fuenteForm" disabled="disabled" />
            </td>
        </tr>
    </table>
<?php
}	
?>