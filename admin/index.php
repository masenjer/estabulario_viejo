<?php include("lib/lib.php");
session_start();



if ($_SESSION["IdA"])	header("Location: ../index.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Page-Enter" content="RevealTrans(Duration=3.0,Transition=10)">
<meta http-equiv="Page-Exit" content="RevealTrans(Duration=2.0,Transition=7)">
<?php 
	MostraLib();
?>

<title>:: Administraci&oacute; ::</title>
</head>

<body>

<img src="../img/FondoAdmin.jpg" style="width:100%; height:100%; position:absolute; top:0; left:0; z-index:-111" />
<table width="100%" height="600px" cellpadding="0" cellspacing="0" border="0">
	<tr valign="middle"> 
    	<td align="center" valign="middle">
            <table cellpadding="0" cellspacing="0" border="0" align="center">
                <tr>
                    <td width="11px" background="../img/MarcSupEsq.png"></td>
                    <td height="11px" background="../img/MarcSupC.png"></td>
                    <td width="11px" background="../img/MarcSupDret.png"></td>
                </tr>
                <tr valign="middle">
                    <td width="11px" background="../img/MarcCEsq.png"></td>
                    <td valign="middle" align="center" >
                    	<?php MostraLogin(); ?>
                    </td>
                    <td width="11px" background="../img/MarcCDret.png"></td>
                </tr>
                <tr>
                    <td width="11px" background="../img/MarcInfEsq.png"></td>
                    <td height="10px" background="../img/MarcInfC.png"></td>
                    <td width="11px" background="../img/MarcInfDret.png"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>




</body>
</html>


<?php 
function MostraLogin()
{
?>
<form id="loginAdmin" action="index.php" method="post"  background="../img/BlancoTrans.png" style="display:none"></form>
<table width="300px" cellpadding="0" cellspacing="10" border="0" align="center" background="../img/BlancoTrans.png">
	<tr>
    	<td height="10px"></td>
    </tr>
    <tr>
    	<td>Usuario</td>
        <td><input type="text" id="LGUsuario" class=""  onKeyPress="submitenter(2,event,'')" /></td>
    </tr>
    <tr>
    	<td>Password</td>
        <td><input type="password" id="LGPassword" class=""  onKeyPress="submitenter(2,event,'')"/></td>
    </tr>   
    <tr>
    	<td colspan="2" align="center"><input type="button" value="Login" onclick="ComprovaLogin();" /></td>
    </tr>
</table>

<?php
}
?>