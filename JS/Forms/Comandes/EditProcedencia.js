function EditProcedencia(id)
{
	$("#FechaEditProcedencia").attr("readonly",false);
	$("#SelectEditProveidor").attr("disabled",false);
	
	$("#FechaEditProcedencia").removeClass("inputSenseCaixa");
	
	DefineCalendario('FechaEditProcedencia');
	
	$("#ButtonEditProcedencia").removeClass("ButtonEdit24");
	$("#ButtonEditProcedencia").addClass("ButtonSave24");
	
	document.getElementById('ButtonEditProcedencia').onclick = function (){SaveProcedencia(id)}
} 

function SaveProcedencia(id)
{
	var error = true;
	
	var S = $("#SelectEditProveidor").val();
	var F = $("#FechaEditProcedencia").val();
	
	if (!FechaFutura(F)){alert("La data de Procedencia/utilitzaci"+String.fromCharCode(243)+" ha de ser superior a l\'actual");error = false;}
	
	if ((error)&&(F)&&(S))	
		$.post("PHPForm/DetallComanda/lib/ProcedenciaEdit.php",{id:id,S:S,F:F},LlegadaSaveProcedencia);
}

function LlegadaSaveProcedencia(data)
{
	//alert(data);
	$("#FechaEditProcedencia").datepicker("destroy");
	$("#FechaEditProcedencia").addClass("inputSenseCaixa");
	
	$("#FechaEditProcedencia").attr("readonly",true);
	$("#SelectEditProveidor").attr("disabled",true);

	$("#ButtonEditProcedencia").removeClass("ButtonSave24");
	$("#ButtonEditProcedencia").addClass("ButtonEdit24");
	
	document.getElementById('ButtonEditProcedencia').onclick = function (){EditProcedencia(data)}
}