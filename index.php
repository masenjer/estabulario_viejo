<?php 
session_start(); ?>

<?php include("DIVS/Aplicacio.php");?>	
<?php include("DIVS/MenuLateralAdmin.php");?>	
<?php include("DIVS/ImatgesCapcalera.php");?>	
<?php include("DIVS/ColumnaEsquerra.php");?>	
<?php include("DIVS/ColumnaCentral.php");?>
<?php include("DIVS/ColumnaDreta.php");?>
<?php include("DIVS/Llibreries.php");?>
<?php include("DIVS/PujaImatge.php");?>
<?php include("DIVS/GestioNoticies.php");?>
<?php include("DIVS/GestioDestacats.php");?>
<?php include("DIVS/GestioEnDir.php");?>
<?php include("DIVS/GestioContacte.php");?>
<?php include("DIVS/MostraGU.php");?>
<?php include("DIVS/MenuCapcalera.php");?>
<?php include("DIVS/home.php");?>
<?php include("DIVS/ContingutPages.php");?>
<?php include("DIVS/Eliminar.php");?>
<?php include("DIVS/Email.php");?>
<?php include("VAR/var.php");?>
<?php include("PHP/PermisosEdicion.php");?>
<?php include("Includes/includes.php");?>
<?php include("Includes/includesJS.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="Page-Enter" content="RevealTrans(Duration=3.0,Transition=10)">
    <meta http-equiv="Page-Exit" content="RevealTrans(Duration=2.0,Transition=7)">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">

	<meta http-equiv="Expires" content="0"> 
	<meta http-equiv="Last-Modified" content="0"> 
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate"> 
	<meta http-equiv="Pragma" content="no-cache"> 
    
<?php MostraIncludesJS(); ?>

    
    

<title>Servei d'Estabulari UAB</title>
</head>

<body onLoad="CarregaPagina();" class="FondoBody">
<?php include "AvisoCookies.php"; ?>
<script>
/*	if (location.protocol != "https:") 
	{
	   location.protocol = "https";
	}    	//document.location = "https://estabulari.uab.cat/";
*/</script>


<?php
if (!$_SESSION["IdA"])
{
?>
	<script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'ca',
        autoDisplay: false,
        floatPosition: google.translate.TranslateElement.FloatPosition.TOP_RIGHT
      });
    }
    </script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php 
}



	if ($_SESSION["WebUsers"])
	{
		?><script>ComprovaSiUserWebNoValidat();</script><?php
	}

	CarregaVariables(); 
	MostraMenuLateralDerecho();
?>

	<script type="text/javascript">
		setTimeout("ComprovaSiLogin()",1000);
		if (!window.location.hash) HomeCarrega();
		//document.getElementById('jscontent').style.display='';
		//$(document).ready(launch);
	</script>   

<input type="hidden" id="primerDIV" value="0" />

<table width="921px" id="TableOmbres" cellpadding="0" cellspacing="0" border="0" align="center">
    <tr>
    	<td class="TOTALOmbraSupEsq"></td>
    	<td class="TOTALOmbraSupCentral"></td> 
    	<td class="TOTALOmbraSupDreta"></td>
    </tr>
	<tr>
    	<td class="TOTALOmbraEsquerra"></td>
    	<td style="border:1px solid #666;"><?php CarregaAplicacio(); ?></td>
    	<td class="TOTALOmbraDreta"></td>
    </tr>
	<tr>
    	<td class="TOTALOmbraInfEsq"></td>
    	<td class="TOTALOmbraInfCentral"></td>
    	<td class="TOTALOmbraInfDreta"></td>
    </tr>
    <tr>
    	<td colspan="6" align="center" valign="middle" class="fontPeuPagina">
        	<table>
            	<tr>
                	<td align="center" class="fontPeuPagina">
                    	<table>
                        	<tr>
                            	<td style="cursor:pointer" onClick="HomeCarrega();" class="fontPeuPagina"> 
                                	Inici
                                </td>
                                <td class="fontPeuPagina">|</td>
                            	<td style="cursor:pointer" onClick="MostraMapaWeb();" class="fontPeuPagina"> 
                                	Mapa del web
                                </td>
                                <td class="fontPeuPagina">|</td>
                                <td>
                                	<a href="http://crd.uab.cat" class="fontPeuPagina" target="_blank">Sobre el web</a>
                                </td>
                            </tr>
                        </table>                    	
                    </td>
                </tr>
            	<tr>
                	<td center="right" valign="middle" class="fontPeuPagina" > 2013 <b>Centre de Recursos Docents - UAB</b></td>                	
                </tr>
                <tr>
                	<td height="15px"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<?php
	CompruebaPermisosEdicion();
	
	MostraGU(); 
	if ($_SESSION["Noticias"]=="1"){ MostraGestioNoticies();} 
	MostraGestioDestacats();
	MostraGestioEnDir();
	MostraGestioContacte();
	MostraGestioLoginUsers();
	MostraGestioPasswordUsersWeb();
	MostraFormulariEmail();

	/////Forms
	MostraReservaEspais();
	MostraPetAnimProdEst();
	MostraPetHemAc();
	MostraCompra();
	MostraIntervTecnicas();
	MostraImpoExpo();
	MostraSolicitutEspai();
	MostraPaqueteria();
	MostraAccesSE();
	MostraEntradaMaterials();
	

	MostraComandes(); //Tant el control de comandes de admin com de user public

	
	////Admin
	if ($_SESSION["PEmail"]){
		MostraGestioMailing();
		MostraGestioFestiu();	
	}
	if ($_SESSION["Proveidors"])		MostraGestioProveidors();
	if ($_SESSION["Fungibles"])	MostraGestioConsumibles();
	if (($_SESSION["InformeDiari"])||($_SESSION["InformeFacturacio"]))		MostraGestioInformes();
	if ($_SESSION["Stock"])		MostraStock();
	if ($_SESSION["Procediments"])		MostraGestioProcediment();
	if ($_SESSION["WebUsers"])		MostraGestioUsersWeb();
	if ($_SESSION["Investigadors"])		MostraGestioInvestigador();	
	if ($_SESSION["Procediments"])		MostraTaulaSeleccioUsers(); //Taula selecció d'usuaris a dmin proc
	
	
	
	////Forms NewAdmin
	if ($_SESSION["Comandes"]){
		MostraFormSeleccioSeleccioUnitats();//TPetAnimProd seleccio unitats per sexe indiferent
		MostraNewPetAnimProd();
		MostraNewPetHemAc();
		MostraNewPetCompraAnim();
		MostraNewCompraDietaoFarmac();
		MostraNewJaulasAnim();
		MostraNewJaulasJaula();
		MostraNewEspaiAnimals();
		MostraNewCaixes();
	}
	
	////Forms Auxiliars
	MostraTaulaSeleccioSoca();
		
	////Form eliminar
	MostraEliminar();
	MostraEliminarAdmin();

?>


</body>
</html>
