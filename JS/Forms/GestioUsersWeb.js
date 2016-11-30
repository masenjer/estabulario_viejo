function MostraGestioUsersWeb()
{
	$("#DIVGestioUsersWeb").fadeIn("slow");	
	CarregaTaulaGestioUsersWeb();
	InicialitzaGestioUsersWeb();
}

function InicialitzaGestioUsersWeb()
{
	$("#UsuariUsersWeb").val("");
	$("#Pass1UsersWeb").val("");
	$("#Pass2UsersWeb").val("");
	//$("#Pass1UsersWeb").val(cadena[1]);
	//$("#Pass2UsersWeb").val(cadena[1]);
	$("#NiuUsersWeb").val("");
	$("#NomUsersWeb").val("");
	$("#CognomsUsersWeb").val("");
	$("#EmailUsersWeb").val("");
	$("#TelefonUsersWeb").val("");
	$("#DepUsersWeb").val("");
	$("#InvesRespUsersWeb").val("");
	$("#EmailRespUsersWeb").val("");

	$("#ButtonEstatGestioUsersWeb").html("");
}

function TancaGestioUsersWeb()
{
	$("#DIVGestioUsersWeb").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioUsersWeb()
{
	$.get("PHPForm/TaulaGestioUsersWeb.php",{},LlegadaCarregaTaulaGestioUsersWeb)	
}

function LlegadaCarregaTaulaGestioUsersWeb(data)
{
	//alert(data);
	//$("#DIVTaulaGraella").css("background-image","URL(img/FondoDIV.jpg)");
	
	var cadena = data.split("$%&#");
	
	$("#DIVCabTaulaGestioUsersWeb").html(cadena[0]);
	$("#DIVCosTaulaGestioUsersWeb").html(cadena[1]);

	$("#TOTValidado").val(cadena[2]);
	$("#FiltraValidado").val(cadena[2]);

	$("#OrdreUsersWeb").val(cadena[3]);
	
	var Ordre = cadena[3].split("|");
	
	$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
}

function ResfrescaTaulaGestioUsersWeb()
{
	$("#Loading").show();

	$("#DIVUsersWebValidat").slideUp("slow");	
	
	var Validado = $("#FiltraValidado").val();
	
	var filtre = $("#FiltraNIUUsersWeb").val() +"|"+ $("#FiltraNomUsersWeb").val() +"|"+ $("#FiltraCognomsUsersWeb").val() +"|"+ $("#FiltraDepartamentUsersWeb").val();
	
	var Ordre =  $("#OrdreUsersWeb").val();
	
	//alert("CodiClient:"+CodiClient+", TipusComanda:"+TipusComanda+", Finalitzat:"+Finalitzat+", Ordre:"+Ordre+", filtre:"+filtre);
	var SelectedRow = $("#UsersWebSelectedRow").val();
		
	$.post("PHPForm/TaulaGestioUsersWebRefresca.php",{Validado:Validado,Ordre:Ordre,filtre:filtre,SelectedRow:SelectedRow},LlegadaResfrescaTaulaGestioUsersWeb);
}

function LlegadaResfrescaTaulaGestioUsersWeb(data)
{
	$("#DIVCosTaulaGestioUsersWeb").html(data);
}

function OrdenaTaulaUsersWeb(Taula, Ordre)
{
	$("#OrdreUsersWeb").val(Taula + "|" + Ordre);
	
	Ordre = (Ordre + 1)%2;
	
	ResfrescaTaulaGestioUsersWeb();
}

function SelectRowUsersWeb(id)
{
	$("#TDRowUsersWeb"+$("#UsersWebSelectedRow").val()).animate({ background: "" }, 1);
	$("#TDRowUsersWeb"+id).animate({ backgroundColor: "orange" }, 200);
	$("#UsersWebSelectedRow").val(id);
	
	CarregaUsersWebFitxa(id);
	CarregaTaulaProcedimentInves(id);
}

function CarregaUsersWebFitxa(id)
{
	$.get("PHPForm/UsersWebCarregaFitxa.php",{id:id},LlegadaCarregaUsersWebFitxa)	
}

function LlegadaCarregaUsersWebFitxa(data)
{
	var cadena = data.split("|");
	
	$("#UsuariUsersWeb").val(cadena[0]);
	$("#Pass1UsersWeb").val("");
	$("#Pass2UsersWeb").val("");
	//$("#Pass1UsersWeb").val(cadena[1]);
	//$("#Pass2UsersWeb").val(cadena[1]);
	$("#NiuUsersWeb").val(cadena[2]);
	$("#NomUsersWeb").val(cadena[3]);
	$("#CognomsUsersWeb").val(cadena[4]);
	$("#EmailUsersWeb").val(cadena[5]);
	$("#TelefonUsersWeb").val(cadena[6]);
	$("#DepUsersWeb").val(cadena[7]);
	$("#InvesRespUsersWeb").val(cadena[8]);
	$("#EmailRespUsersWeb").val(cadena[9]);

	$("#ButtonEstatGestioUsersWeb").html(cadena[10]);
}


function CarregaTaulaProcedimentInves(id)
{
	$.get("PHPForm/TaulaProcedimentInvesCarrega.php",{id:id},LlegadaCarregaTaulaProcedimentInves);	
}

function LlegadaCarregaTaulaProcedimentInves(data)
{
	$("#DIVTaulaProcedimentInves").html(data);
}

function ValidaUpdateUsersWeb(U,P1,P2,N,C,T,E,I,ER,D)
{
	var error = true;
	
	if (!U) alert("Has d'introduïr un nom d'usuari d'accés vàlid"); 
	if (!P1||!P2) alert("Has d'omplir els dos camps de password i han de ser iguals");
	if (P1!=P2) alert("El password introduït no és igual als dos camps");
	if (!N) alert("Has d'introduïr el teu nom");
	if (!C) alert("Has d'introduïr els teus cognoms");
	if (!T) alert("Has d'introduïr un telèfon vàlid");
	if (!E) alert("Has d'introduïr un email vàlid");
	if (ValidarEmail(E)) alert("L'Email introduït no és vàlid");
	if (!I) alert("Has d'introduïr el nom d'un investigador responsable vàlid de la UAB");
	if (!ER) alert("Has d'introduïr un email vàlid d'un investigador responsable vàlid de la UAB");
	if (!D) alert("Has d'introduïr el nom del Departament, Facultat i/o centre al que pertanys");	
	
	if((!U)||(!P1||!P2)||(P1!=P2)||(!N)||(!C)||(!T)||(!E)||(ValidarEmail(E))||(!I)||(!ER)||(!D))
		return false
	else return true;
}

function UpdateUsersWeb()
{
	var Niu,U,P1,P2,N,C,T,E,I,ER,UC,D;

	Niu = $("#NiuUsersWeb").val();
	U = $("#UsuariUsersWeb").val();
	if ($("#Pass1UsersWeb").val())P1 = SHA1($("#Pass1UsersWeb").val());
	if ($("#Pass2UsersWeb").val())P2 = SHA1($("#Pass2UsersWeb").val());
	N = $("#NomUsersWeb").val();
	C = $("#CognomsUsersWeb").val();
	T = $("#TelefonUsersWeb").val();
	E = $("#EmailUsersWeb").val();
	I = $("#InvesRespUsersWeb").val();
	ER = $("#EmailRespUsersWeb").val();
	D = $("#DepUsersWeb").val();
	
	var id = $("#UsersWebSelectedRow").val();
	
	if (P1==P2)
		$.get("PHPForm/UsersWebUpdate.php",{Niu:Niu,U:U,P:P1,N:N,C:C,T:T,E:E,I:I,ER:ER,D:D,id:id},LlegadaUpdateUsersWeb);	
	else  alert("El password introduït no és igual als dos camps");
}

function LlegadaUpdateUsersWeb(data)
{
	//alert(data);
	if (data == "1") alert("Ja existeix un usuari amb aquest User, si us plau escriu-ne un altre");
	else alert("Usuari guardat correctament");	
	ResfrescaTaulaGestioUsersWeb();
}

function CanviaFormatBotoEstatUsersWeb(estat)
{
	for (i=0;i<3;i++)
	{		
		if (i==estat) 
		   $("#ButtonEstatUsersWeb"+i).removeClass("ButtonUsersWebEstat").addClass("ButtonUsersWebEstatSel"+i)	;
		else 
		   $("#ButtonEstatUsersWeb"+i).removeClass("ButtonUsersWebEstatSel"+i).addClass("ButtonUsersWebEstat")	;
	}	
}

function ModificaEstatUsersWeb(id, estat)
{
	CanviaFormatBotoEstatUsersWeb(estat);
	$.post("PHPForm/UsersWebActualitzaEstat.php",{id:id,estat:estat},LlegadaModificaEstatUsersWeb);	
}

function LlegadaModificaEstatUsersWeb(data)
{
	//alert(data);
	ResfrescaTaulaGestioUsersWeb();
}

function ComprovaSiUserWebNoValidat()
{
	//alert("llego");
	$.post("PHPForm/ComprovaSiUserWebNoValidat.php",{},LlegadaComprovaSiUserWebNoValidat);	
}

function LlegadaComprovaSiUserWebNoValidat(data)
{
	//alert(data);
	if (data > 0) alert("Hi han "+data+" usuaris pendents de validar");	
}