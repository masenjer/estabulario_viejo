function MostraGestioFestiu()
{
	$("#DIVGestioFestiu").fadeIn("slow");	
	CarregaTaulaGestioFestiu();
	InicialitzaNewFestiu(1);
	DefineCalendario('FechaFestiu');
	//InicialitzaProcediment();
}

function TancaGestioFestiu()
{
	$("#DIVGestioFestiu").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioFestiu()
{
	$.get("PHPForm/TaulaGestioFestiu.php",{},LlegadaCarregaTaulaGestioFestiu)	
}

function LlegadaCarregaTaulaGestioFestiu(data)
{
	//alert(data);
	//$("#DIVTaulaGraella").css("background-image","URL(img/FondoDIV.jpg)");
	
	var cadena = data.split("$%&#");
	
	$("#DIVCabTaulaGestioFestiu").html(cadena[0]);
	$("#DIVCosTaulaGestioFestiu").html(cadena[1]);

	$("#OrdreFestiu").val(cadena[2]);
	
	var Ordre = cadena[2].split("|");
	
	$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
}

function ResfrescaTaulaGestioFestiu()
{

	$("#DIVFestiuValidat").slideUp("slow");	
	
	
	var Ordre =  $("#OrdreFestiu").val();
	
	//alert("CodiClient:"+CodiClient+", TipusComanda:"+TipusComanda+", Finalitzat:"+Finalitzat+", Ordre:"+Ordre+", filtre:"+filtre);
	var SelectedRow = $("#FestiuSelectedRow").val();
	
	$.post("PHPForm/TaulaGestioFestiuRefresca.php",{Ordre:Ordre,SelectedRow:SelectedRow},LlegadaResfrescaTaulaGestioFestiu);
}

function LlegadaResfrescaTaulaGestioFestiu(data)
{
	$("#DIVCosTaulaGestioFestiu").html(data);
}

function OrdenaTaulaFestiu(Taula, Ordre)
{
	$("#OrdreFestiu").val(Taula + "|" + Ordre);
	
	//alert($("#OrdreFestiu").val());
	Ordre = (Ordre + 1)%2;
	
	ResfrescaTaulaGestioFestiu();

	//document.getElementById("Ordena"+Taula).onclick =  function (){ Ordena(Taula,Ordre )};
	
}

function SelectRowFestiu(id)
{
	//alert($("#FestiuSelectedRow").val());

	$("#TDRowFestiu"+$("#FestiuSelectedRow").val()).animate({ background: "" }, 1);
	if (id){
		$("#TDRowFestiu"+id).animate({ backgroundColor: "orange" }, 200);
		$("#FestiuSelectedRow").val(id);
		CarregaFestiuFitxa(id);
	}
	else{
		$("#FestiuSelectedRow").val("");
	}

	
	
	
}

function CarregaFestiuFitxa(id)
{
	$.get("PHPForm/FestiuCarregaFitxa.php",{id:id},LlegadaCarregaFestiuFitxa)	
}

function LlegadaCarregaFestiuFitxa(data)
{
	var cadena = data.split("|");

	$("#FechaFestiu").val(cadena[0]);
	
	$("#FestiuSelectedRow").val(cadena[1]);
	//document.getElementById("UpdateFestiuButton").onclick =  function (){ UpdateFestiu(cadena[5])};

}


//function CarregaTaulaProcedimentInves(id)
//{
//	$.get("PHPForm/TaulaProcedimentInvesCarrega.php",{id:id},LlegadaCarregaTaulaProcedimentInves);	
//}
//
//function LlegadaCarregaTaulaProcedimentInves(data)
//{
//	$("#DIVTaulaProcedimentInves").html(data);
//}

function InicialitzaNewFestiu(a)
{
	SelectRowFestiu("");

	$("#FechaFestiu").val("");
	
	
	$("#FestiuSelectedRow").val("");
	//if (a!=1)ResfrescaTaulaGestioFestiu();
	$("#DIVTaulaInvesProjectes").hide();
	
	
}

function UpdateFestiu()
{
	var F;

	F = $("#FechaFestiu").val();
	
	var id = $("#FestiuSelectedRow").val();
	
	if (F)
		$.get("PHPForm/FestiuUpdate.php",{F:F,id:id},LlegadaUpdateFestiu);	
	else alert("No pots deixar camps en blanc, en cas de voler deixar un camp en blanc fes un espai");
}

function LlegadaUpdateFestiu(data)
{
	//alert(data);
	if (data) alert("Festiu guardat correctament");	
	ResfrescaTaulaGestioFestiu();
	SelectRowFestiu(data);
}




function deleteFestiu(id)
{	
	$.post("PHPForm/FestiuDelete.php",{id:id},LlegadadeleteFestiu);	
}

function LlegadadeleteFestiu(data)
{
	//alert(data);
	InicialitzaNewFestiu();
	ResfrescaTaulaGestioFestiu();

}

