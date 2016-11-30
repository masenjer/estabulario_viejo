function MostraProcediment()
{
	$("#DIVGestioProcediment").fadeIn("slow");	
	CarregaTaulaProcediment();
	InicialitzaProcediment();
	CarregaSelectInvestigador("InvesGestio","");
	OmpleEspecies(0,'Gestio');
}

function TancaProcediment()
{
	$("#DIVGestioProcediment").fadeOut("slow");	
}

function CarregaTaulaProcediment()
{
	$.get("PHPForm/TaulaProcedimentCarrega.php",{},LlegadaCarregaTaulaProcediment);
}

function LlegadaCarregaTaulaProcediment(data)
{
	var cadena =  data.split("$%&·");
	
	$("#DIVCabTaulaGestioProcediment").html(cadena[0]);
	$("#DIVCosTaulaGestioProcediment").html(cadena[1]);
	if($("#IdProcActiu").val())	CarregaFitxaProc($("#IdProcActiu").val());
}

function MarcaLineaGridProcediment(id)
{
	//alert(id);
	$("#GridProc"+$("#IdProcActiu").val()).animate({ background: "" }, 1);
	$("#GridProc"+id).animate({ backgroundColor: "orange" }, 200);
	$("#IdProcActiu").val(id);
	$("#DIVTaulaProcedimentUsers").show();
}


function CarregaFitxaProc(id)
{
	MarcaLineaGridProcediment(id);
	$.get("PHPForm/ProcedimentFitxaCarrega.php",{id:id},LlegadaCarregaFitxaProc);	
}

function LlegadaCarregaFitxaProc(data)
{
	var c = data.split("|");

	//$("#NIUInvesGestio").val(c[0]);
	CarregaSelectInvestigador("InvesGestio",c[1]);//$("#InvesGestio").val(c[1]);
	$("#NProcGestio").val(c[2]);
	$("#NOrdenGestio").val(c[3]);
	$("#EstatProcGestio").val(c[4]);
	 $("#Especie0Gestio").val(c[5]);
	CarregaTaulaProcedimentUsers(c[6]);
}

function UpdateProc()
{
	//var NIUInves = $("#NIUInvesGestio").val();
	var Inves = $("#InvesGestio").val();
	var NProc = $("#NProcGestio").val();
	var NOrden = $("#NOrdenGestio").val();
	var Estat = $("#EstatProcGestio").val();
	var id = $("#IdProcActiu").val();
	var idE = $("#Especie0Gestio").val();
	
	if (NProc && Inves && idE)
	{
		$.get("PHPForm/ProcUpdate.php",{Inves:Inves,NProc:NProc,NOrden:NOrden,Estat:Estat,id:id,idE:idE},LlegadaUpdateProc);	
	}
	else alert("Has de rellenar los campos investigador y n\úmero de procedimiento");
	
}

function LlegadaUpdateProc(data)
{
//	alert(data);
	
	var cadena = data.split("|");
	
	if (cadena[0]!= 1) alert(cadena[0]);
	else 
	{
		$("#IdProcActiu").val(cadena[1]);
		CarregaTaulaProcediment();	
	}
}

function InicialitzaProcediment()
{
	//$("#NIUInvesGestio").val("");
	$("#InvesGestio").val("");
	$("#NProcGestio").val("");
	$("#NOrdenGestio").val("");
	$("#EstatProcGestio").val("");
	
	MarcaLineaGridProcediment("");
	$("#DIVTaulaProcedimentUsers").html("");
	$("#DIVTaulaProcedimentUsers").hide();
	$("#Especie0Gestio").val("");
}

function CarregaTaulaProcedimentUsers(id)
{
	//alert(id);
	$.get("PHPForm/TaulaProcedimentUserCarrega.php",{id:id},LlegadaCarregaTaulaProcedimentUsers);	
}

function LlegadaCarregaTaulaProcedimentUsers(data)
{
	//alert(data);
	$("#DIVTaulaProcedimentUsers").html(data);
}

function MostraTablaUsuarisProc(id)
{
	$.get("PHPForm/TaulaSeleccioUsers.php",{id:id},LlegadaMostraTablaUsuarisProc);	
}

function LlegadaMostraTablaUsuarisProc(data)
{
	$("#DIVTaulaSeleccioUsers").html(data);
	$("#DIVFitxaSeleccioUsers").fadeIn("slow");
}

function TancaTablaUsuarisProc()
{
	$("#DIVFitxaSeleccioUsers").fadeOut("slow");
}

function AfegeixUseraProc(idP,IdU)
{
	$.get("PHPForm/UseraProcAdd.php",{idP:idP,IdU:IdU},LlegadaAfegeixUseraProc)	;
}

function LlegadaAfegeixUseraProc(data)
{
	CarregaTaulaProcedimentUsers(data);
}

function DeleteUsuarisProc(id,idP)
{
	$('#DIVEliminaTOT').fadeOut("slow");
	$.get("PHPForm/UseraProcDelete.php",{id:id,idP:idP},LlegadaAfegeixUseraProc);	
}
