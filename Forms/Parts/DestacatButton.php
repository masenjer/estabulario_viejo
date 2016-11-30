<?php

function CreaDestacatButton($cadena)
{
	$c = explode("|",$cadena);
	
	echo '

	<table cellspacing="0" cellpadding="0" border="0" style="cursor:pointer">
	  <tr>
		  <td colspan="3" height="1px" style=" background-color:'.$c[0].';"></td>
	  <tr>
	  <tr valign="middle">
		  <td style=" background-color:'.$c[0].'; width:1px;"></td>
		  <td>
			  <div style="width:400px;height:41px; background-color:'.$c[0].';">
				  <div style="width:100%;height:41px;background:URL(img/MaskButton.png);">
					  <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
						  <tr valign="middle">
							  <td width="100%" height="100%" valign="middle" align="center">
								  <div class="DivTextButtonProva" style="color:'.$c[1].';">'.$c[2].'</div>
							  </td>
						  </tr>
					  </table>
			  </div></div>
		  </td>
		  <td style=" background-color:'.$c[0].'; width:1px;"></td>
	  </tr>	
	  <tr>
		  <td height="1px" colspan="3" style=" background-color:'.$c[0].';"></td>
	  <tr>
  </table> 
';	
}
?>
