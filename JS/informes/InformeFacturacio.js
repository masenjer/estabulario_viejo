function CarregaSelectIPFacturacio()
{
	$.get("PHPForm/InformeFacturacioCarregaSelectIP.php",{},LlegadaCarregaSelectIPFacturacio);	
}

function LlegadaCarregaSelectIPFacturacio(data)
{
	$("#SelectIPFacturacio").html(data);
}

function CarregaSelectProjecteFacturacio()
{
	var IP = $("#SelectIPFacturacio").val();	
	$.get("PHPForm/InformeFacturacioCarregaSelectProjecte.php",{IP:IP},LlegadaCarregaSelectProjecteFacturacio);	
}

function LlegadaCarregaSelectProjecteFacturacio(data)
{
	$("#SelectProjecteFacturacio").html(data);
}

function ImprimeixInformeFacturacio()
{
	//alert("entro");	
	var f1 = $("#FechaInicialInformeFacturacio").val();
	var f2 = $("#FechaFinalInformeFacturacio").val();
	var IP = $("#SelectIPFacturacio").val();
	var PR = $("#SelectProjecteFacturacio").val();
	
	//alert('PHPForm/Informes/InformeFacturacio.php?f1='+f1+'&f2='+f2+'&IP='+IP+'&PR='+PR);
	
	if(f1&&f2) 	window.open('PHPForm/Informes/InformeFacturacio.php?f1='+f1+'&f2='+f2+'&IP='+IP+'&PR='+PR);
	else alert("Has d'indicar la data inicial i final del projecte");
}