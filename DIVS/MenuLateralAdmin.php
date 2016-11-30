<?php
function MostraMenuLateralDerecho()
{
?>

<div id="MenuLateralAdmin" style="position:fixed; display:none; ">
<table width="73px" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td background="img/MenuAdmin/TaulaSup.jpg" height="7px" width="73px"></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonExit" onClick="TancaSessio();" title="Tancar sesi&oacute; administrador" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php

if ($_SESSION["PEmail"])
{
?>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonSobre" onClick="MostraGestioMailing();" title="Enviament d'emails massius" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Proveidors"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonProveidor" onclick="MostraGestioProveidors();" title="Gesti&oacute; de prove&iuml;dors" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Fungibles"])
{

?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonFungibles" onclick="MostraGestioConsumibles();" title="Gesti&oacute; de fungibles" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["WebUsers"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonUsers" onclick="MostraGestioUsersWeb();" title="Gesti&oacute; d'usuaris web" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Investigadors"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonInvestigador" onclick="MostraGestioInvestigador();" title="Gesti&oacute; d' investigadors" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Procediments"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonNProc" onclick="MostraProcediment();" title="Gesti&oacute; de procediments" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Stock"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonRata" onclick="MostraStock();" title="Stock y moviments d' animals" /></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>
<?php
}
if ($_SESSION["Comandes"])
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonPedido" onclick="MostraComandes();" title=" Gesti&oacute; de Comandes"/></td>
    </tr>
    <tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" height="5px"></td>
    </tr>

<?php
}
if (($_SESSION["InformeDiari"])||($_SESSION["InformeFacturacio"]))
{
?>
	<tr>
    	<td background="img/MenuAdmin/TaulaC.jpg" align="center"><input type="button" id="ButtonInforme" onclick="MostraGestioInformes();" title="Llistat d'Informes"/></td>
    </tr>

    <tr>
    	<td background="img/MenuAdmin/TaulaInf.jpg" height="9px" width="73px"></td>
    </tr>
<?php
}
?>
</table>
</div>
<script>
var pos = $(window).width() - 72;

$("#MenuLateralAdmin").css("left",pos);
$("#MenuLateralAdmin").css("top","0px");

$(window).scroll(function() { 
	$("#MenuLateralAdmin").css("left",$(window).width() - 72);
	$("#MenuLateralAdmin").css("top","0px");
}); 


$(window).resize(function() {
	$("#MenuLateralAdmin").css("left",$(window).width() - 72);
	$("#MenuLateralAdmin").css("top","0px");
});	


//var pos = $(window).width() - 92;
//
//$("#MenuLateralAdmin").css("left",pos);
//$("#MenuLateralAdmin").css("top","25px");
</script>
<?php
}
?>