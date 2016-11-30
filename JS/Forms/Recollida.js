function InicialitzaRecollida(form)
{
	$("#FechaRecogida"+form).val("");
	$("#HoraRecogida"+form).val("");

	$('#DIVSacrificio'+form).hide();	
	$("#SacrificiRecogida"+form).val("0");
	
	$("#RecogidaRadio"+form).attr("checked","false");
	$("#Vivos"+form).attr("checked","false");
}