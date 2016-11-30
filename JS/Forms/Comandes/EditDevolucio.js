function EditDevolucio(id)
{
	$("#EditaFechaDevolucio").attr("readonly",false);
	$("#EditaHoraDevolucio").attr("readonly",false);
	
	$("#EditaFechaDevolucio").removeClass("inputSenseCaixa");
	$("#EditaHoraDevolucio").removeClass("inputSenseCaixa");
	
	DefineCalendario('EditaFechaDevolucio');
	
	$("#ButtonEditDevolucio").removeClass("ButtonEdit24");
	$("#ButtonEditDevolucio").addClass("ButtonSave24");
	
	document.getElementById('ButtonEditDevolucio').onclick = function (){SaveDevolucio(id)}
} 

function SaveDevolucio(id)
{
	var error = true;
	
	var FR = $("#EditaFechaDevolucio").val();
	var HR = $("#EditaHoraDevolucio").val();
	
	if (!FechaFutura(FR)){alert("La data de Devolucio/utilitzaci"+String.fromCharCode(243)+" ha de ser superior a l\'actual");error = false;}
	
	if (error)	
		$.post("PHPForm/DetallComanda/lib/DevolucioEdit.php",{id:id,FR:FR,HR:HR},LlegadaSaveDevolucio); 
}

function LlegadaSaveDevolucio(data)
{
	//alert(data);
	$("#EditaFechaDevolucio").datepicker("destroy");
	$("#EditaFechaDevolucio").addClass("inputSenseCaixa");
	$("#EditaHoraDevolucio").addClass("inputSenseCaixa");	
	
	$("#EditaFechaDevolucio").attr("readonly",true);
	$("#EditaHoraDevolucio").attr("readonly",true);
		
	$("#ButtonEditDevolucio").removeClass("ButtonSave24");
	$("#ButtonEditDevolucio").addClass("ButtonEdit24");
	
	document.getElementById('ButtonEditDevolucio').onclick = function (){EditDevolucio(data)}


}