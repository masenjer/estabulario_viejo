function MostraComandes()
{
	$("#DIVComandes").fadeIn("slow");
	
	CarregaGridcomandaCap();
	$("#DIVDadesEconComanda").html("");
	$("#DIVDetallComanda").html("");
	$("#DIVObservacionsComanda").html("");
	
}

function TancaComandes()
{
	$("#DIVComandes").fadeOut("slow");	
}

function CarregaGridcomandaCap()
{
	InicialitzaFiltresTaulaGestioComanda();
	
	$.get("PHPForm/TaulaComandaCarrega.php",{},LlegadaCarregaGridcomandaCap)	
}

function InicialitzaFiltresTaulaGestioComanda()
{
	$("#FiltraIdUser").val("");
	$("#FiltraTipusComanda").val("");
	$("#FiltraFacturada").val("");
	
	$("#Ordre").val("");
}


function LlegadaCarregaGridcomandaCap(data)
{

	//$("#DIVTaulaGraella").css("background-image","URL(img/FondoDIV.jpg)");
	
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
	
	if (cadena[5])
	{
		var Ordre = cadena[5].split("|");
	
		$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
	}

	MarcaDesmarca('Facturada',0,'2',2); //Para que no muestre los pedidos finalizados al recargar
}

function ResfrescaTaulaComandes()
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
	
	$.post("PHPForm/TaulaComandaRefresca.php",{CodiClient:CodiClient,TipusComanda:TipusComanda,Finalitzat:Finalitzat,Ordre:Ordre,filtre:filtre,SelectedRow:SelectedRow},LlegadaResfrescaTaulaComandes);
}

function LlegadaResfrescaTaulaComandes(data)
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



function OrdenaComandes(Taula, Ordre)
{
	$("#Ordre").val(Taula + "|" + Ordre);
	
	Ordre = (Ordre + 1)%2;
	
	ResfrescaTaulaComandes();

	//document.getElementById("Ordena"+Taula).onclick =  function (){ Ordena(Taula,Ordre )};
	
}

function SelectRowComanda(id)
{
	$("#TDRowComandes"+$("#ComandaSelectedRow").val()).animate({ background: "" }, 1);
	$("#TDRowComandes"+id).animate({ backgroundColor: "orange" }, 200);
	$("#ComandaSelectedRow").val(id);
	
	CarregaGestioComandes(id);			
}

function CarregaGestioComandes(id)
{
	$.get("PHPForm/DetallComanda/GestioComandesCarrega.php",{id:id},LlegadaCarregaGestioComandes);
}

function LlegadaCarregaGestioComandes(data)
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
		
		$("#DIVBotoneraEstatComanda").html(cadena[3]);
	
		if (cadena[4])
		{
			ModificaEstatComanda(cadena[4],1);
		}
		
		if (cadena[5])
		{
			MissatgeVistTecnic(cadena[5]);
		}
	}
}

function ImprimeFormAccesSE()
{
	window.open('PHP/PDFCreate.php?id='+cadena[0]+'&op='+cadena[1]);	
}


/////////////////////////Canvi d'estat de la comanda

function CanviaFormatBotoEstat(estat)
{
	for (i=0;i<3;i++)
	{
		//$("#ButtonEstatComanda"+i);
		
		if (i==estat) 
		   $("#ButtonEstatComanda"+i).removeClass("ButtonComandesEstat").addClass("ButtonComandesEstatSel"+i)	;
		else 
		   $("#ButtonEstatComanda"+i).removeClass("ButtonComandesEstatSel"+i).addClass("ButtonComandesEstat")	;
	}	
}

function ModificaEstatComanda(id, estat)
{
	CanviaFormatBotoEstat(estat);
	//alert(estat);
	
	$.post("PHPForm/DetallComanda/lib/ActualitzaEstatComandes.php",{id:id,estat:estat},LlegadaModificaEstatComanda);	
}

function LlegadaModificaEstatComanda(data)
{
	//alert(data);
	ResfrescaTaulaComandes();
}

function MissatgeVistTecnic(id)
{
	$.post("PHPForm/DetallComanda/lib/MissatgeVistTecnic.php",{id:id},LlegadaMissatgeVistTecnic);	
}

function LlegadaMissatgeVistTecnic(data)
{
	//alert(data);
	ResfrescaTaulaComandes();
}

