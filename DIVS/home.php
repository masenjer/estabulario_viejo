<?php
function MostraHome()
{
?>
<div id="DIVHome">
    <table width="100%" height="100%" cellpadding="0" cellspacing="15">
        <tr valign="top">
            <td height="100%"><?php MostraPartEsquerraHome();?></td>
            <td width="200px" valign="top"><?php MostraPartDretaHome ();?></td>
        </tr>
        
    </table>
</div>
<?php
}
?>

<?php
function MostraPartEsquerraHome()
{
?>
<table cellpadding="0" cellspacing="0">
    <tr  valign="top">
    	<td height="25px" id="CapcaNoticies" class="CapcaNoticies" colspan="3"></td>
    </tr>
    <tr>
    	<td height="15px" colspan="2"></td>
    </tr>
    <tr>
        <td height="230px" valign="top"><div id="NOT" style="vertical-align:top; width:384px"></div></td>
        <td width="15px"></td>
        <td width="248px" valign="top" align="right">
            <table height="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
                	<td valign="top" height="185px"><div id="ContHomeListEnDir" align="right"></div></td>
                </tr>               
                <tr>
                	<td height="10px"></td>
                </tr> 
            </table>
        </td>
    </tr>
    <tr>
    	<td></td>
    </tr>
</table>
<?php
}
?>

<?php
function MostraPartDretaHome()
{
?>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
      <td width="200px" valign="top"><div id="ContHomeListDestacats"></div></td>
  </tr>
  <tr>
  	<td valign="bottom">
    	<div id="ContHomeContacte"></div>
    </td>
  </tr>
  <tr>
  	<td height="10px"></td>
  </tr>
  <tr>
      <td class="fuenteGestionNoticia" style="text-align:justify"><font class="ast" style="text-align:justify;"><b>Per tal de garantir un correcte servei, les peticions ens hauran d' arribar amb una antelaci&oacute; de 2 dies laborables. Per exemple, si voleu la comanda per al dilluns, s'hauria de demanar el dijous anterior</b></font></td>
  </tr>         
</table>
<?php
}

