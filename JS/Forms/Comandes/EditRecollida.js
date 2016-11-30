function EditRecollida(id)
{
	$("#EditaLRRecollida").attr("disabled",false);
	$("#EditaFechaRecollida").attr("readonly",false);
	$("#EditaHoraRecollida").attr("disabled",false);
	$("#EditaEstatRecollida").attr("disabled",false);
	$("#EditaSacrificiRecollida").attr("disabled",false);
	
	$("#EditaLRRecollida").removeClass("selectSenseCaixa");
	$("#EditaFechaRecollida").removeClass("inputSenseCaixa");
	$("#EditaHoraRecollida").removeClass("selectSenseCaixa");
	$("#EditaEstatRecollida").removeClass("selectSenseCaixa");
	$("#EditaSacrificiRecollida").removeClass("selectSenseCaixa");
	
	DefineCalendario('EditaFechaRecollida');
	
	$("#ButtonEditRecollida").removeClass("ButtonEdit24");
	$("#ButtonEditRecollida").addClass("ButtonSave24");
	
	document.getElementById('ButtonEditRecollida').onclick = function (){SaveRecollida(id)}
} 

function SaveRecollida(id)
{
	var error = true;
	
	var FR = $("#EditaFechaRecollida").val();
	var HR = $("#EditaHoraRecollida").val();
	var LR = $("#EditaLRRecollida").val();
	var VM = $("#EditaEstatRecollida").val();
	var Sacrifici = $("#EditaSacrificiRecollida").val();

	//if (!FechaFutura(FR)){alert("La data de recollida/utilitzaci"+String.fromCharCode(243)+" ha de ser superior a l\'actual");error = false;}
	
	if (error)	
		$.post("PHPForm/DetallComanda/lib/RecollidaEdit.php",{id:id,FR:FR,HR:HR,LR:LR,VM:VM,Sacrifici:Sacrifici},LlegadaSaveRecollida);
}

function LlegadaSaveRecollida(data)
{
	//alert(data);
	$("#EditaLRRecollida").addClass("selectSenseCaixa");	
	$("#EditaFechaRecollida").datepicker("destroy");
	$("#EditaFechaRecollida").addClass("inputSenseCaixa");
	$("#EditaHoraRecollida").addClass("selectSenseCaixa");	
	$("#EditaEstatRecollida").addClass("selectSenseCaixa");	
	$("#EditaSacrificiRecollida").addClass("selectSenseCaixa");	
	
	$("#EditaLRRecollida").attr("disabled",false);
	$("#EditaFechaRecollida").attr("readonly",true);
	$("#EditaHoraRecollida").attr("disabled",false);
	$("#EditaEstatRecollida").attr("disabled",false);
	$("#EditaSacrificiRecollida").attr("disabled",false);

	$("#ButtonEditRecollida").removeClass("ButtonSave24");
	$("#ButtonEditRecollida").addClass("ButtonEdit24");
	
	document.getElementById('ButtonEditRecollida').onclick = function (){EditRecollida(data)}
}