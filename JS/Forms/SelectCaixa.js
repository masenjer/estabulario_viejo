function CarregaSelectCaixaMaterial()
{
	$.get("PHPForm/SelectCaixaMaterial.php",{},LlegadaCarregaSelectCaixaMaterial);
}

function LlegadaCarregaSelectCaixaMaterial(data)
{
	//alert(data);
	$("#NewCaixesMaterial").html(data);
}

function CarregaSelectCaixaMida()
{
	$.get("PHPForm/SelectCaixaMida.php",{},LlegadaCarregaSelectCaixaMida);
}

function LlegadaCarregaSelectCaixaMida(data)
{
	//alert(data);
	$("#NewCaixesMida").html(data);
}

function CarregaSelectCaixaMenjar()
{
		$("#NewCaixesMenjar").html(
		'<option value="-">----</option>'+
        '<option value="1">S&iacute;</option>'+
        '<option value="0">No</option>');
}
