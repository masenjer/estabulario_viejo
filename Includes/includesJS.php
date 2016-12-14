<?php

function MostraIncludesJS()
{
?>
	<link rel="shortcut icon" href="img/CRDico.png" />
	<link rel="stylesheet" type="text/css" href="CSS/SASa.css" title="styles1" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="CSS/SASaa.css" title="styles2" media="screen" />
	<link rel="alternate stylesheet" type="text/css" href="CSS/SASaaa.css" title="styles3" media="screen" />	
    <link rel="stylesheet" type="text/css" href="CSS/ui-lightness/jquery-ui-1.8.7.custom.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/Buttons.css" title="styles1" media="screen" />
	<link rel="stylesheet" type="text/css" href="CSS/Form.css" title="styles1" media="screen" />
	<link rel="stylesheet" type="text/css" href="CSS/Taula.css" title="styles1" media="screen" />
	<link rel="stylesheet" type="text/css" href="CSS/Vanadium.css" title="styles1" media="screen" />

	<script src="JQuery/jquery-1.4.4.min.js" type="text/javascript"> </script>
    <script src="JQuery/jquery-ui-1.8.7.custom.min.js" type="text/javascript"> </script>
    <script src="JQuery/jquery.ui.datepicker-es.js" type="text/javascript"> </script>
    <script src="JQuery/colorpicker.js" type="text/javascript"> </script>
    <script src="JQuery/eye.js" type="text/javascript"> </script>
    <script src="JQuery/utils.js" type="text/javascript"> </script>
    <script src="JQuery/jquery.history.js" type="text/javascript"> </script>
    <script src="JQuery/stylesheetToggle.js" type="text/javascript"> </script>
    <script src="JQuery/si.files.js" type="text/javascript"> </script>
    <script src="JQuery/jquery.innerfade.js" type="text/javascript"> </script>

    <script src="JQuery/jquery.printElement.js" type="text/javascript"> </script>

    <script src="JS/p.js" type="text/javascript"> </script>
    <script src="JS/kf.js" type="text/javascript"> </script>

    <script src="JS/funcions.js" type="text/javascript"> </script>
    <script src="JS/Estilos.js" type="text/javascript"> </script>
    <script src="JS/layout.js" type="text/javascript"> </script>
    <script src="JS/PasaImagesHome.js" type="text/javascript"> </script>
    <script src="JS/MapaWeb.js" type="text/javascript"> </script>
    <script src="JS/Cercador.js" type="text/javascript"> </script>
    <script src="JS/Validacions.js" type="text/javascript"> </script>
    <script src="JS/SessioCaducada.js" type="text/javascript"> </script>
    <script src="JS/Fechas.js" type="text/javascript"> </script>
    <script src="JS/session.js" type="text/javascript"> </script>

    <script src="JS/Recaptcha/Recaptcha.js" type="text/javascript"> </script>

    <script src="JS/Forms/RestaHoras.js" type="text/javascript"> </script>
    <script src="JS/Forms/DiasSemana.js" type="text/javascript"> </script>
    <script src="JS/Forms/AddDays.js" type="text/javascript"> </script>
    <script src="JS/Forms/RestaFechas.js" type="text/javascript"> </script>
    <script src="JS/Forms/FechaFutura.js" type="text/javascript"> </script>
    <script src="JS/Forms/FechaFuturaPetCompra.js" type="text/javascript"> </script>
    <script src="JS/Forms/ContralaReservaCredit.js" type="text/javascript"> </script>

    <script src="JS/Forms/ValidaDadesEcon.js" type="text/javascript"> </script>
    <script src="JS/Forms/ValidaRecollida.js" type="text/javascript"> </script>
    <script src="JS/Forms/ValidaRecollidaPetCompra.js" type="text/javascript"> </script>
    <script src="JS/Forms/LoginUsers.js" type="text/javascript"> </script>
    <script src="JS/Forms/Passwords.js" type="text/javascript"> </script>
    <script src="JS/Forms/ReservaEspais.js" type="text/javascript"> </script>
    <script src="JS/Forms/PetAnimProdEst.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectHoras.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectSalas.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectProveedores.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectInvestigador.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectCaixa.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectSexo.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectSP.js" type="text/javascript"> </script>
    <script src="JS/Forms/Especie.js" type="text/javascript"> </script>
    <script src="JS/Forms/Cepa.js" type="text/javascript"> </script>
    <script src="JS/Forms/PetHemAcopladas.js" type="text/javascript"> </script>
    <script src="JS/Forms/PetCompra.js" type="text/javascript"> </script>
    <script src="JS/Forms/IntervTecnicas.js" type="text/javascript"> </script>
    <script src="JS/Forms/ImpoExpo.js" type="text/javascript"> </script>
    <script src="JS/Forms/SolicitutEspai.js" type="text/javascript"> </script>
    <script src="JS/Forms/Paqueteria.js" type="text/javascript"> </script>
    <script src="JS/Forms/AccesSE.js" type="text/javascript"> </script>
    <script src="JS/Forms/EntradaMaterials.js" type="text/javascript"> </script>
    <script src="JS/Forms/Recollida.js" type="text/javascript"> </script>
    <script src="JS/Forms/MissatgeriaUser.js" type="text/javascript"> </script>
    <?php if ($_SESSION["Comandes"]) ?> <script src="JS/Forms/Comandes.js" type="text/javascript"> </script>
    <?php if ($_SESSION["Stock"]){ ?> 
		<script src="JS/Forms/Stock.js" type="text/javascript"> </script>
		<script src="JQuery/jQueryRotate.js" type="text/javascript"> </script>
    <?php
	}
		if ($_SESSION["Procediments"]) ?> <script src="JS/Forms/Procediment.js" type="text/javascript"> </script>
    <?php if ($_SESSION["WebUsers"]) ?> <script src="JS/Forms/GestioUsersWeb.js" type="text/javascript"> </script>
    <?php if ($_SESSION["Investigadors"]) { ?> 
		<script src="JS/Forms/GestioInvestigadors.js" type="text/javascript"> </script>
		<script src="JS/Forms/GestioProjectes.js" type="text/javascript"> </script>
    <?php 
	}
	if ($_SESSION["Proveidors"]) ?> <script src="JS/Forms/GestioProveidors.js" type="text/javascript"> </script>
    <?php if ($_SESSION["Fungibles"]) ?> <script src="JS/Forms/GestioConsumibles.js" type="text/javascript"> </script>
    <?php if ($_SESSION["PEmail"]) ?> <script src="JS/Forms/GestioMailing.js" type="text/javascript"> </script>
    <script src="JS/Forms/Filtrador.js" type="text/javascript"> </script>
    <script src="JS/Forms/CompruebaSiExisteNumProc.js" type="text/javascript"> </script>
    <script src="JS/Forms/NumProcCarregaSelect.js" type="text/javascript"> </script>
    <script src="JS/Forms/SelectProjecte.js" type="text/javascript"> </script>
    <script src="JS/Forms/EliminaFilasTabla.js" type="text/javascript"> </script>
	<script src="JS/Forms/UserComandes.js" type="text/javascript"> </script>
    <script src="JS/Forms/PermisForms.js" type="text/javascript"> </script>

<?php if ($_SESSION["Comandes"]) 
{?>
    <script src="JS/admin/NewPetAnimProd.js" type="text/javascript"> </script>
    <script src="JS/admin/NewPetHemAc.js" type="text/javascript"> </script>
    <script src="JS/admin/NewPetCompraAnim.js" type="text/javascript"> </script>
    <script src="JS/admin/NewCompraDietaoFarmac.js" type="text/javascript"> </script>
    <script src="JS/admin/NewJaulasAnim.js" type="text/javascript"> </script>
    <script src="JS/admin/NewJaulasJaula.js" type="text/javascript"> </script>
    <script src="JS/admin/NewEspaiAnimals.js" type="text/javascript"> </script>
    <script src="JS/admin/NewCaixes.js" type="text/javascript"> </script>
    <script src="JS/admin/DeleteCaixes.js" type="text/javascript"> </script>
    <script src="JS/admin/MissatgeriaTecnic.js" type="text/javascript"> </script>

    <script src="JS/Forms/Comandes/SelectEstatLinies.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/00.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/01.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/EditRecollida.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/EditArribadaProveidor.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/EditExpoFecha.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/EditDevolucio.js" type="text/javascript"> </script>
    <script src="JS/Forms/Comandes/EditProcedencia.js" type="text/javascript"> </script>
    
	<script src="JS/Informes/Albarans.js" type="text/javascript"> </script>
	<script src="JS/Informes/AutoEntrada.js" type="text/javascript"> </script>
	<script src="JS/Informes/Etiquetes.js" type="text/javascript"> </script>
<?php 
}
if (($_SESSION["InformeDiari"])||($_SESSION["InformeFacturacio"])) 
{
?>
    <script src="JS/Informes/Informes.js" type="text/javascript"> </script>
    <script src="JS/Informes/InformeFacturacio.js" type="text/javascript"> </script>
    <script src="JS/Informes/InformeDiari.js" type="text/javascript"> </script>
    <script src="JS/Informes/InformeStock.js" type="text/javascript"> </script>
    <script src="JS/Informes/InformeAnualMoviments.js" type="text/javascript"> </script>
    <script src="JS/Informes/InformeDifusio.js" type="text/javascript"> </script>
<?php 
}
?>    
    <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
	<script type="text/javascript" src="ckeditor/adapters/jquery.js"> </script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script> 
	<script type="text/javascript" src="flowplayer/flowplayer-3.2.6.min.js"></script>
        
	<link rel="stylesheet" type="text/css" href="CSS/colorpicker/colorpicker.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="CSS/colorpicker/layout.css" media="screen" />
<!--	<link rel="stylesheet" type="text/css" href="CSS/jq_fade.css" media="screen" />
-->
<?php 
}
?>