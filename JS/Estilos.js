
function TreuEstils()
{
	$("#CapcaSuperiorPage").removeClass("CapcaSuperiorPage");
	$("#TOTALOmbraDretaCentral").removeClass("TOTALOmbraDretaCentral");
	$("#PeuPagina").removeClass("PeuPagina");
	$("#TOTALOmbraInfEsq").removeClass("TOTALOmbraInfEsq");
	$("#TOTALOmbraInfCentral").removeClass("TOTALOmbraInfCentral");
	$("#TOTALOmbraInfDreta").removeClass("TOTALOmbraInfDreta");
	$("#TOTALOmbraDretaCentral").removeClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaCentral2").removeClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaCentral3").removeClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaSup").removeClass("TOTALOmbraDretaSup");


//	$("div .DIVMenuS").removeClass("DIVMenuS");
//	$("div .fuenteMS").removeClass("fuenteMS");
//	//$("div .fuenteML").removeClass("fuenteML");
//	$("div .fuenteML").addClass("fuenteML_Contrast");
	$("#FonsMenuSupInterButtonGris").removeClass("FonsMenuSupInterButtonGris");
	$("#RayaGris").removeClass("RayaGris");
	$("#FonsMenuEsquerre").removeClass("FonsMenuEsquerre");
	$('body').removeClass("FondoBody");
	
	document.getElementById("Contrast").onclick =  function (){PosaEstils()};
	
}

function PosaEstils()
{
	$("#CapcaSuperiorPage").addClass("CapcaSuperiorPage");
	$("#TOTALOmbraDretaCentral").addClass("TOTALOmbraDretaCentral");
	$("#PeuPagina").addClass("PeuPagina");
	$("#TOTALOmbraInfEsq").addClass("TOTALOmbraInfEsq");
	$("#TOTALOmbraInfCentral").addClass("TOTALOmbraInfCentral");
	$("#TOTALOmbraInfDreta").addClass("TOTALOmbraInfDreta");
	$("#TOTALOmbraDretaCentral").addClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaCentral2").addClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaCentral3").addClass("TOTALOmbraDretaCentral");
	$("#TOTALOmbraDretaSup").addClass("TOTALOmbraDretaSup");
//	for (var i=0;i<20;i++)
//	{
//		$("#FonsMenuSupButton"+i).addClass("fuenteMS");
//	}
	//$("div .DIVMenuS").addClass("DIVMenuS");
//	$("div .fuenteMS").addClass("fuenteMS");
//	//$("div .fuenteML").addClass("fuenteML");
//	$("div .fuenteML_Contrast").addClass("fuenteML_Contrast");
	$("#FonsMenuSupInterButtonGris").addClass("FonsMenuSupInterButtonGris");
	$("#RayaGris").addClass("RayaGris");
	$("#FonsMenuEsquerre").addClass("FonsMenuEsquerre");
	$('body').addClass("FondoBody");
	
	document.getElementById("Contrast").onclick =  function (){TreuEstils()};
}

