function ValidaRecollida(FR,HR,LR,VM,Sacrifici)
{
	var error = true;

	if (!FR) alert("Has d' indicar una data de recollida");
	if (!HR) alert("Has d' indicar una hora de recollida");
	if (!LR) alert("Has d' indicar si els animals seran recollits o fets servir al Servei d'Estabulari");

	if((!FR)||(!HR)||(!LR)) error = false;
	
	if ((FR)&&(!FechaFutura(FR))){alert("La data de recollida/utilitzaci"+String.fromCharCode(243)+" ha de ser igual o posterior a dos dies laborables des del dia de la comanda");error = false;}

	if (!VM){
		alert("Has d' indicar si recollir"+String.fromCharCode(224)+"s els animals vius o morts");
		error = false;
	}

	if ((VM=="0")&&(Sacrifici=="0"))
	{
		alert("Has de triar un métode de sacrifici");
		error = false;
	}
	
	return error;
}