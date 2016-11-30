function CarregaSelectInvestigador(sel,id)
{
	$.get("PHPForm/InvestigadorsCarregaSelect.php",{sel:sel,id:id},LlegadaSelectInvestigador);
}

function LlegadaSelectInvestigador(data)
{
	var cadena = data.split("|");
	$("#"+cadena[0]).html(cadena[1]);
}