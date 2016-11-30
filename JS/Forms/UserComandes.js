// JavaScript Document

function MostraUserComandes()
{
	$("#DIVComandes").fadeIn("slow");
	
	CarregaGridUsercomandaCap();
	$("#DIVDadesEconComanda").html("");
	$("#DIVDetallComanda").html("");
	$("#DIVObservacionsComanda").html("");
	
}

function TancaUserComandes()
{
	$("#DIVComandes").fadeOut("slow");	
}

function CarregaGridUsercomandaCap()
{
	//alert(1);
	$.get("PHPForm/AdminPublic/TaulaUserComandaCarrega.php",{},LlegadaCarregaGridUserComandaCap)	
}


function LlegadaCarregaGridUserComandaCap(data)
{

	$("#DIVTaulaGraella").css("background-image","URL(img/FondoDIV.jpg)");
	
	var cadena = data.split("$%&#");
	
	$("#DIVCabTaulaComanda").html(cadena[0]);
	$("#DIVCosTaulaComanda").html(cadena[1]);

	$("#TotIdUser").val(cadena[2]);
	$("#FiltraIdUser").val(cadena[2]);
	
	$("#TotTipusComanda").val(cadena[3]);
	$("#FiltraTipusComanda").val(cadena[3]);
	
	$("#TotFacturada").val(cadena[4]);
	$("#FiltraFacturada").val(cadena[4]);

	$("#Ordre").val(cadena[5]);
	
	var Ordre = cadena[5].split("|");
	
	$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
}

function ResfrescaTaulaUserComandes()
{
	$("#Loading").show();

	$("#DIVClient").slideUp("slow");	
	$("#DIVTipusComanda").slideUp("slow");
	$("#DIVFacturada").slideUp("slow");

	
	var CodiClient = $("#FiltraIdUser").val();
	var TipusComanda = $("#FiltraTipusComanda").val();
	var Finalitzat = $("#FiltraFacturada").val();
	
	var filtre = $("#FiltraData").val() +"|"+ $("#FiltraComanda").val() +"|"+$("#FiltraProcediment").val();
	
	var Ordre =  $("#Ordre").val();
	
	//alert("CodiClient:"+CodiClient+", TipusComanda:"+TipusComanda+", Finalitzat:"+Finalitzat+", Ordre:"+Ordre+", filtre:"+filtre);
	var SelectedRow = $("#ComandaSelectedRow").val();
	
	$.post("PHPForm/AdminPublic/TaulaUserComandaRefresca.php",{CodiClient:CodiClient,TipusComanda:TipusComanda,Finalitzat:Finalitzat,Ordre:Ordre,filtre:filtre,SelectedRow:SelectedRow},LlegadaResfrescaTaulaUserComandes);
}

function LlegadaResfrescaTaulaUserComandes(data)
{
//	var cadena = data.split("$%&#");
//	//alert(cadena[1]);
//	
//	$("#DIVCabTaulaComanda").html(cadena[0]);
//	$("#DIVTaulaGraella").html("");
	$("#DIVCosTaulaComanda").html(data);
	
	var Ordre = $("#Ordre").val().split("|");
	
	//$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
}



function OrdenaUserComandes(Taula, Ordre)
{
	$("#Ordre").val(Taula + "|" + Ordre);
	
	Ordre = (Ordre + 1)%2;
	
	ResfrescaTaulaUserComandes();

	//document.getElementById("Ordena"+Taula).onclick =  function (){ Ordena(Taula,Ordre )};
	
}

function SelectRowUserComanda(id)
{
	$("#TDRowComandes"+$("#ComandaSelectedRow").val()).animate({ background: "" }, 1);
	$("#TDRowComandes"+id).animate({ backgroundColor: "orange" }, 200);
	$("#ComandaSelectedRow").val(id);
	CarregaGestioUserComandes(id);			
}

function CarregaGestioUserComandes(id)
{
	$.get("PHPForm/AdminPublic/DetallComanda/GestioUserComandesCarrega.php",{id:id},LlegadaCarregaGestioUserComandes);
}

function LlegadaCarregaGestioUserComandes(data)
{
	if (data == "Caducada"){
		ComprovaSiSessioCaducada();
	}
	else{
		var cadena = data.split("#o#o#");
	
		if (cadena[0])
		{
			$("#DIVDadesEconComanda").html(cadena[0]);
			$("#DIVDadesEconComanda").show();
		}
		else
		{
			$("#DIVDadesEconComanda").html("");
			$("#DIVDadesEconComanda").hide();
		}
		$("#DIVDetallComanda").html(cadena[1]);
	
		if (cadena[2])
		{
			$("#DIVObservacionsComanda").html(cadena[2]);
			$("#DIVObservacionsComanda").show();
		}
		else
		{
			$("#DIVObservacionsComanda").html("");
			$("#DIVObservacionsComanda").hide();
		}	
		if (cadena[4])
		{
			//alert(cadena[4]);
			MissatgeVistUser(cadena[4]);
		}
	}
}

function ImprimeFormAccesSE()
{
	window.open('PHP/PDFCreate.php?id='+cadena[0]+'&op='+cadena[1]);	
}


function MissatgeVistUser(id)
{
	$.post("PHPForm/AdminPublic/DetallComanda/lib/MissatgeVistUser.php",{id:id},LlegadaMissatgeVistUser);	
}

function LlegadaMissatgeVistUser(data)
{
	//alert(data);
	ResfrescaTaulaUserComandes();
}

