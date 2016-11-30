<?php
function MostraContingutPages()
{
?>
<div id="ContingutPages" style="display:none;">
    <table width="890px" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" >
      <tr valign="top">
          <td width="13px"></td>
          <td height="100%" width="180px" align="center"><?php MostraColumnaEsquerra(); ?></td> <!--espacio para la columna izquierda --> 
          <td width="10px"></td>
          <td height="100%"><div id="Imprimible"><?php MostraColumnaCentral(); ?></div></td> <!--espacio para la central -->
          <td width="10px"></td>
          <td width="190px" height="100%"><?php MostraColumnaDreta(); ?> </td><!--espacio para la columna derecha -->
          <td width="10px"></td> 
      </tr>
  </table>
</div>
<?php
}
?>