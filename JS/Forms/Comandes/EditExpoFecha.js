function EditExpoFecha(id)
{
	$("#EditaFechaExpoFecha").attr("readonly",false);
	
	$("#EditaFechaExpoFecha").removeClass("inputSenseCaixa");
	
	DefineCalendario('EditaFechaExpoFecha');
	
	$("#ButtonEditExpoFecha").removeClass("ButtonEdit24");
	$("#ButtonEditExpoFecha").addClass("ButtonSave24");
	
	document.getElementById('ButtonEditExpoFecha').onclick = function (){SaveExpoFecha(id)}
} 

function SaveExpoFecha(id)
{
	var error = true;
	
	var F = $("#EditaFechaExpoFecha").val();
	
	if (error)	
		$.post("PHPForm/DetallComanda/lib/ExpoFechaEdit.php",{id:id,F:F},LlegadaSaveExpoFecha);
}

function LlegadaSaveExpoFecha(data)
{
	//alert(data);
	$("#EditaFechaExpoFecha").datepicker("destroy");
	$("#EditaFechaExpoFecha").addClass("inputSenseCaixa");
	
	$("#EditaFechaExpoFecha").attr("readonly",true);

	$("#ButtonEditExpoFecha").removeClass("ButtonSave24");
	$("#ButtonEditExpoFecha").addClass("ButtonEdit24");
	
	document.getElementById('ButtonEditExpoFecha').onclick = function (){EditExpoFecha(data)}
}