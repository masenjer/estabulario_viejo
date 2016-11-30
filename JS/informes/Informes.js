function MostraGestioInformes()
{
	$("#DIVGestioInformes").fadeIn("slow");	

	DefineCalendario('FechaInformeDiari');
	
	var f = new Date();
	
	var dia = (f.getDate()).toString();
	if(dia.length<2) dia = "0"+dia;
	var mes = (f.getMonth()+1).toString();
	if(mes.length<2) mes = "0"+mes;
	
	var hoy = dia + "/" + mes + "/" + f.getFullYear();
	
	$("#FechaInformeDiari").val(hoy);
	
	for (i=0;i<11;i++) $("#checkInformeDiari"+i).attr("checked","checked");

	/////Informe Facturacio
	DefineCalendario('FechaInicialInformeFacturacio');
	DefineCalendario('FechaFinalInformeFacturacio');
	
	$("#FechaInicialInformeFacturacio").val("");
	$("#FechaFinalInformeFacturacio").val("");
	
	CarregaSelectIPFacturacio();
	CarregaSelectProjecteFacturacio();
}

function TancaGestioInformes()
{
	$("#DIVGestioInformes").fadeOut("slow");	
}

