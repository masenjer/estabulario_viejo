<?php
function CarregaAplicacio()
{
?>
<table width="891px" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0px;">
	<tr>
    	<td id="CapcaSuperiorPage" class="CapcaSuperiorPage" colspan="2">
        	<?php MostraMenuCapcalera(); ?>           
        </td> 
    </tr>
    <tr>
    	<td height="88px" width="151px"><a href="http://uab.cat" target="_blank"><img src="img/UAB.jpg" style="cursor:pointer;"  border="0"/></a> </td> <!--espacio para la columna izquierda --> 
    	<td width="742px" align="left" valign="top" ><?php MostraImatgesCapcalera(); ?></td> <!--espacio para la columna derecha -->
    </tr>
    <tr>
    	<td colspan="2" align="left" style="padding:0;"><div id="DIVMenuSuperior"></div></td>
    </tr>
    <tr valign="top"  style="padding:0;">
    	<td height="300px" colspan="2" bgcolor="#FFFFFF">
        	<?php 
				MostraHome();
				MostraContingutPages();								
			?>
            <div id="MapaWeb" style="display:none" align="center"></div>
        </td>
    	
    </tr>
    <tr>
    	<td id="PeuPagina" class="PeuPagina" colspan="2" height="175px"><div style="width:100%"></div></td>
    </tr>
</table>
<?php
}
?>