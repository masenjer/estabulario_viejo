<?php include ("Recaptcha/recaptchalib.php")?>
<?php include("Forms/Parts/SelectHoras.php");?>
<?php include("Forms/Parts/ReservaEquips.php");?>
<?php include("Forms/Parts/FranjaHoraria.php");?>
<?php include("Forms/Parts/CuadreVerd.php");?>
<?php include("Forms/Parts/DadesEcon.php");?>
<?php include("Forms/Parts/Procediment.php");?>
<?php include("Forms/Parts/NumProcediment.php");?>
<?php include("Forms/Parts/AnimSolicitats.php");?>
<?php include("Forms/Parts/Recogida.php");?>
<?php include("Forms/Parts/HemAcopl.php");?>
<?php include("Forms/Parts/AnimCompraAnim.php");?>
<?php include("Forms/Parts/DestacatButton.php");?>
<?php include("Forms/Parts/PetCompraAnimales.php");?>
<?php include("Forms/Parts/PetCompraDietas.php");?>
<?php include("Forms/Parts/PetCompraFarmacs.php");?>
<?php include("Forms/Parts/Consumibles.php");?>
<?php include("Forms/Parts/IntTecHormoyCruce.php");?>
<?php include("Forms/Parts/IntTecCruce.php");?>
<?php include("Forms/Parts/IntTecJaulasAnimales.php");?>
<?php include("Forms/Parts/JaulasAnimales.php");?>
<?php include("Forms/Parts/HomronacionyCruces.php");?>
<?php include("Forms/Parts/RecogidaJaulas.php");?>
<?php include("Forms/Parts/DevolucionJaulas.php");?>
<?php include("Forms/Parts/ImpoExpoImpo.php");?>
<?php include("Forms/Parts/ImpoExpoExpo.php");?>
<?php include("Forms/Parts/OrigenDestino.php");?>
<?php include("Forms/Parts/ImpoAnimales.php");?>
<?php include("Forms/Parts/DatosProcedencia.php");?>
<?php include("Forms/Parts/AnimalesJaula.php");?>
<?php include("Forms/Parts/PaqueteriaDatos.php");?>
<?php include("Forms/Parts/AccesoPuntual.php");?>
<?php include("Forms/Parts/DadesSolicitantEntrada.php");?>
<?php include("Forms/Parts/ContactoAnimales.php");?>
<?php include("Forms/Parts/AreasAcceso.php");?>
<?php include("Forms/Parts/MotivoAcceso.php");?>
<?php include("Forms/Parts/AccesoFueraHorario.php");?>
<?php include("Forms/Parts/PersonasAccesoFH.php");?>
<?php include("Forms/Parts/AutoritzacioEntradaSE.php");?>
<?php include("Forms/Parts/CompromisoActualizacionDatos.php");?>
<?php include("Forms/Parts/EntradaMaterialsDia.php");?>
<?php include("Forms/Parts/GestioEspecies.php");?>
<?php include("Forms/Parts/GestioInventari.php");?>
<?php include("Forms/Parts/TaulaSeleccioUsers.php");?>
<?php include("Forms/Parts/TaulaSeleccioSoca.php");?>
<?php include("Forms/Parts/Observacions.php");?>
<?php include("Forms/Parts/UsersWebFitxa.php");?>
<?php include("Forms/Parts/InvestigadorFitxa.php");?>

<?php
	/////S'utilitzen com a user public
	include("Forms/Admin/Comandes.php");
	include("Forms/Admin/Eliminar.php");
?>
<?php 
if ($_SESSION["Comandes"])
{
	include("Forms/Admin/Gestio/NewPetAnimProd.php");
	include("Forms/Admin/Gestio/NewPetHemAc.php");
	include("Forms/Admin/Gestio/NewPetCompraAnim.php");
	include("Forms/Admin/Gestio/NewCompraDietaoFarmac.php");
	include("Forms/Admin/Gestio/NewJaulasAnim.php");
	include("Forms/Admin/Gestio/NewJaulasJaula.php");
	include("Forms/Admin/Gestio/NewEspaiAnimals.php");
	include("Forms/Admin/Gestio/NewCaixes.php");

	include("Forms/Admin/FormSeleccioUnitats.php");
}
if (($_SESSION["InformeDiari"])||($_SESSION["InformeFacturacio"]))
{
	include("Forms/Admin/Informes.php");
	include("Forms/Parts/InformeDiari.php");
	include("Forms/Parts/InformeFacturacio.php");
	include("Forms/Parts/InformeStock.php");
	include("Forms/Parts/InformeAnualStock.php");
} 
if ($_SESSION["PEmail"])
{
	include("Forms/Admin/Mailing.php");
} 
if ($_SESSION["Stock"])
{
	include("Forms/Admin/Stock.php");
}
 
if ($_SESSION["Procediments"])
{
	include("Forms/Admin/Procediment.php");
}
if ($_SESSION["Proveidors"])
{
	include("Forms/Admin/Proveidors.php");
}
if ($_SESSION["Fungibles"])
{
	include("Forms/Admin/Consumibles.php");
}
if ($_SESSION["WebUsers"])
{
	include("Forms/Admin/UsersWeb.php");
}
if ($_SESSION["Investigadors"])
{
	 include("Forms/Admin/Investigador.php");
}
?>

<?php include("Forms/GestioLoginUsers.php");?>
<?php include("Forms/ReservaEspais.php");?>
<?php include("Forms/PetAnimProdEst.php");?>
<?php include("Forms/PetHemAcopladas.php");?>
<?php include("Forms/PetCompra.php");?>
<?php include("Forms/IntervTecnicas.php");?>
<?php include("Forms/ImpoExpo.php");?>
<?php include("Forms/SolicitutEspai.php");?>
<?php include("Forms/Paqueteria.php");?>
<?php include("Forms/AccesSE.php");?>
<?php include("Forms/EntradaMaterials.php");?>
<?php include("Forms/GestioPasswordUsersWeb.php");?>
