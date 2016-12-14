function MostraGestioInformes()
{
	$("#DIVGestioInformes").fadeIn("slow");	
	DefineCalendario('FechaInformeDiari');
	
	var today = new Date();
	var hoy = today.getDay()+"/"+today.getMonth()+"/"+ today.getFullYear();
	
	$("#FechaInformeDiari").val(hoy);
}

function TancaGestioInformes()
{
	$("#DIVGestioInformes").fadeOut("slow");	
}

function ImprimeixInformeDiari()
{
	$("#FechaInformeDiari").val();
	window.open('PHPForm/Informes/InformeDiari.php?data='+data);
}

function ImprimeixInformeStockq()
{
	//alert(1);
	window.open('PHPForm/Informes/InformeStock.php');
}

function ImprimeixLlistaDifusioEmails()
{
	//alert(1);
	window.open('PHPForm/Informes/ListaDifusion.php');
}

