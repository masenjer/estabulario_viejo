function MostraUsersWeb()
{
	alert("entro");
	$("#DIVGestioUsersWeb").fadeIn("slow");	
	//CarregaTaulaProcediment();
	//InicialitzaProcediment();
}

function TancaUsersWeb()
{
	$("#DIVGestioUsersWeb").fadeOut("slow");	
}

//function CarregaTaulaProcediment()
//{
//	$.get("PHPForm/TaulaProcedimentCarrega.php",{},LlegadaCarregaTaulaProcediment);
//}
//
//function LlegadaCarregaTaulaProcediment(data)
//{
//	$("#DIVGridProcediments").html(data);
//}
//
//function MarcaLineaGridProcediment(id)
//{
//	$("#GridProc"+$("#IdProcActiu").val()).animate({ background: "" }, 1);
//	$("#GridProc"+id).animate({ backgroundColor: "#d9e5e7" }, 200);
//	$("#IdProcActiu").val(id);
//}
//
//
//function CarregaFitxaProc(id)
//{
//	MarcaLineaGridProcediment(id);
//	$.get("PHPForm/ProcedimentFitxaCarrega.php",{id:id},LlegadaCarregaFitxaProc);	
//}
//
//function LlegadaCarregaFitxaProc(data)
//{
//	var c = data.split("|");
//
//	$("#NIUInvesGestio").val(c[0]);
//	$("#InvesGestio").val(c[1]);
//	$("#NProcGestio").val(c[2]);
//	$("#NOrdenGestio").val(c[3]);
//	$("#EstatProcGestio").val(c[4]);
//	CarregaTaulaProcedimentUsers(c[5]);
//}
//
//function UpdateProc()
//{
//	var NIUInves = $("#NIUInvesGestio").val();
//	var Inves = $("#InvesGestio").val();
//	var NProc = $("#NProcGestio").val();
//	var NOrden = $("#NOrdenGestio").val();
//	var Estat = $("#EstatProcGestio").val();
//	var id = $("#IdProcActiu").val();
//	
//	if (NProc && Inves)
//	{
//		if (validarEntero(NProc))
//		{
//			$.get("PHPForm/ProcUpdate.php",{NIUInves:NIUInves,Inves:Inves,NProc:NProc,NOrden:NOrden,Estat:Estat,id:id},LlegadaUpdateProc);	
//		}else alert("El n\úmero de procedimiento ha de ser un n\úmero entero");
//	}
//	else alert("Has de rellenar los campos investigador y n\úmero de procedimiento");
//	
//}
//
//function LlegadaUpdateProc(data)
//{
//	if (data == 1) CarregaTaulaProcediment();
//	else alert(data);
//}
//
//function InicialitzaProcediment()
//{
//	$("#NIUInvesGestio").val("");
//	$("#InvesGestio").val("");
//	$("#NProcGestio").val("");
//	$("#NOrdenGestio").val("");
//	$("#EstatProcGestio").val("");
//	
//	MarcaLineaGridProcediment("");
//}
//
//function CarregaTaulaProcedimentUsers(id)
//{
//	//alert(id);
//	$.get("PHPForm/TaulaProcedimentUserCarrega.php",{id:id},LlegadaCarregaTaulaProcedimentUsers);	
//}
//
//function LlegadaCarregaTaulaProcedimentUsers(data)
//{
//	//alert(data);
//	$("#DIVTaulaProcedimentUsers").html(data);
//}
//
//function MostraTablaUsuarisProc(id)
//{
//	$.get("PHPForm/TaulaSeleccioUsers.php",{id:id},LlegadaMostraTablaUsuarisProc);	
//}
//
//function LlegadaMostraTablaUsuarisProc(data)
//{
//	$("#DIVTaulaSeleccioUsers").html(data);
//	$("#DIVFitxaSeleccioUsers").fadeIn("slow");
//}
//
//function TancaTablaUsuarisProc()
//{
//	$("#DIVFitxaSeleccioUsers").fadeOut("slow");
//}
//
//function AfegeixUseraProc(idP,IdU)
//{
//	$.get("PHPForm/UseraProcAdd.php",{idP:idP,IdU:IdU},LlegadaAfegeixUseraProc)	;
//}
//
//function LlegadaAfegeixUseraProc(data)
//{
//	CarregaTaulaProcedimentUsers(data);
//}
//
//function DeleteUsuarisProc(id,idP)
//{
//	$('#DIVEliminaTOT').fadeOut("slow");
//	$.get("PHPForm/UseraProcDelete.php",{id:id,idP:idP},LlegadaAfegeixUseraProc);	
//}
