<?php
function MostraMenuCapcalera()
{
?>
<table width="100%" cellpadding="0" cellspacing="5" border="0">
	<tr> 
    	<td width="10px"></td>
    	<td><a rel="styles1" class="styleswitch"><div class="APeca"><font color="#d7d8da">A</font></div></a></td>
    	<td><a rel="styles2" class="styleswitch"><div class="AMidi"><font color="#d7d8da">A</font></div></a></td>
    	<td><a rel="styles3" class="styleswitch"><div class="AGran"><font color="#d7d8da">A</font></div></a></td>
        <td width="10px"></td>
        <td id="Contrast" class="APeca" onClick="TreuEstils();"><font color="#d7d8da">Contrast + / -</font></td>
        <td></td>
        <td class="APeca"></td>
        <td width="1px"></td>
        <td class="APeca"></td>
        <td width="1px"></td>
        <td class="APeca"></td>
        <td width="94px"></td>
        <td class="APeca" onclick="MostraMapaWeb();"><font color="#d7d8da">Mapa web</font></td>
        <td width="10px"></td>
        <td class="APeca" ><a href="http://intranet.uab.es" target="_blank"><font color="#d7d8da">Intranet</font></a></td>
        <td width="10px"></td>
        <td class="APeca"><a href="http://sia.uab.es:8757/cde/control/iniciop?BuscadorOpciones=1&entradaPublica=true&entidad=500&palabras=&query=&idioma=ca&pais=ES&TextCerca=&x=5&y=9" target="_blank"><font color="#d7d8da">Directori</font></a></td>
        <td width="20px"></td>
        <td class="APeca" align="left"><font color="#d7d8da">CERCADOR</font><div id="ResultatCerca" style="position:fixed; width:300px; height:90%; overflow:auto; z-index:1000; display:none" align="left" ></div></td>
        <td class="APeca" width="20px"><input type="text" class="fuenteContingut" id="TextCerca" onkeyup="Cercador();" onblur= "$('#ResultatCerca').hide('slow')"/></td>
        <td width="20px"><img src="img/lupa.png" /></td>
        <td width="3px"></td>
        
    </tr>
</table>
<?php
}
?>
