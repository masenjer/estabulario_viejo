function EditArribadaProveidor(id)
{
	$("#EditaFechaArribadaProveidor").attr("readonly",false);
	
	$("#EditaFechaArribadaProveidor").removeClass("inputSenseCaixa");
	
	DefineCalendario('EditaFechaArribadaProveidor');
	
	$("#ButtonEditArribadaProveidor").removeClass("ButtonEdit24");
	$("#ButtonEditArribadaProveidor").addClass("ButtonSave24");
	
	document.getElementById('ButtonEditArribadaProveidor').onclick = function (){SaveArribadaProveidor(id)}
} 

function SaveArribadaProveidor(id)
{
	var error = true;
	
	var F = $("#EditaFechaArribadaProveidor").val();
	
	if (error)	
		$.post("PHPForm/DetallComanda/lib/ArribadaProveidorEdit.php",{id:id,F:F},LlegadaSaveArribadaProveidor);
}

function LlegadaSaveArribadaProveidor(data)
{
	//alert(data);
	$("#EditaFechaArribadaProveidor").datepicker("destroy");
	$("#EditaFechaArribadaProveidor").addClass("inputSenseCaixa");
	
	$("#EditaFechaArribadaProveidor").attr("readonly",true);

	$("#ButtonEditArribadaProveidor").removeClass("ButtonSave24");
	$("#ButtonEditArribadaProveidor").addClass("ButtonEdit24");
	
	document.getElementById('ButtonEditArribadaProveidor').onclick = function (){EditArribadaProveidor(data)}
}