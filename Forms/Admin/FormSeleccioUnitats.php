<?php
function MostraFormSeleccioSeleccioUnitats()
{
?>
<div id="DIVFormSeleccioUnitats" style=" position:fixed; top:0; left:0; width:100%; height:100%;  background:url(img/NegroTrans.png); display:none;">

<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td align="center">

			<?php MaquetacioFormSeleccioUnitats();?>
        </td>
    </tr>
</table>
</div>
<?php
}
function MaquetacioFormSeleccioUnitats()
{
?>
<table cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle">
    	<td class="TancaTaulaDN" align="right" ><div id="DIVTancaSeleccioUnitats">Tanca finestra &nbsp; <img src="img/TancaGrid.png" /></div></td>
    </tr>
    <tr valign="middle">
    	<td align="center">
        <div id="ScrollSeleccioUnitats" style=" overflow:auto;">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="img/MarcSupEsq.png"></td>
                    <td height="11px" background="img/MarcSupC.png"></td>
                    <td width="11px" background="img/MarcSupDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcCEsq.png"></td>
                    <td bgcolor="#FFFFFF" style="padding:20px">
                    	<div id="DIVSeleccioUnitats"></div>
                    </td>
                    <td width="11px" background="img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="img/MarcInfEsq.png"></td>
                    <td height="10px" background="img/MarcInfC.png"></td>
                    <td width="11px" background="img/MarcInfDret.png"></td>
                </tr>
            </table>
        </div>
        </td>        
    </tr>
</table>
<script>
	//x = $(window).width();	
	y = $(window).height();	
	//$("#DIVAlcadaAmpladaGestioComandes").css('width', x - 100);
	//$("#ScrollSeleccioUnitats").css('width', 900);
	$("#ScrollSeleccioUnitats").css('height', y - 100);
</script>

<?php	
}
?>