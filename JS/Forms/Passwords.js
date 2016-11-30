function MostraGestioPasswordUsersWeb()
{
	$("#DIVGestioPasswordUsersWeb").fadeIn("slow");	
}

function TancaGestioPasswordUsersWeb()
{
	$("#DIVGestioPasswordUsersWeb").fadeOut("slow");	
}

function InicialitzaPasswordUsersWeb()
{
	$("#PassVellUsuarisWeb").val("");
	$("#PassNou1UsuarisWeb").val("");
	$("#PassNou2UsuarisWeb").val("");
}

function CanviaPasswordUserWeb()
{
	var PV  = $("#PassVellUsuarisWeb").val();
	var PN1 = $("#PassNou1UsuarisWeb").val();	
	var PN2 = $("#PassNou2UsuarisWeb").val();
	
	if (ComprovaCanviaPasswordUserWeb(PV,PN1,PN2))	
	{
		$.post("PHPForm/CanviPasswordUserWeb.php",{PV:SHA1(PV),PN:SHA1(PN1)},LlegadaCanviaPasswordUserWeb);	
	}
}

function ComprovaCanviaPasswordUserWeb(PV,PN1,PN2)
{
	var error = true;
	
	if(!PV) alert("Has d'introdu"+String.fromCharCode(239)+"r la teva contrassenya actual");
	if(!PN1) alert("El camp de la contrassenya nova no pot estar buit");
	if(PN1!=PN2) alert("La contrasenya nova ha de ser igual als dos camps");
	
	if(!PV||!PN1||(PN1!=PN2)) error = false;
	
	return error;
}

function LlegadaCanviaPasswordUserWeb(data)
{
	if (data != 0)
	{
		alert("Constrasenya canviada correctamet");
		InicialitzaPasswordUsersWeb();
		TancaGestioPasswordUsersWeb();
	}else alert("La contrasenya actual introdu"+String.fromCharCode(239)+"da no "+String.fromCharCode(233)+"s correcta");
}