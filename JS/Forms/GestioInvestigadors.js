function MostraGestioInvestigador()
{
	$("#DIVGestioInvestigador").fadeIn("slow");	
	CarregaTaulaGestioInvestigador();
	InicialitzaNewInvestigador(1);
	//InicialitzaProcediment();
}

function TancaGestioInvestigador()
{
	$("#DIVGestioInvestigador").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioInvestigador()
{
	$.get("PHPForm/TaulaGestioInvestigador.php",{},LlegadaCarregaTaulaGestioInvestigador)	
}

function LlegadaCarregaTaulaGestioInvestigador(data)
{
	//alert(data);
	//$("#DIVTaulaGraella").css("background-image","URL(img/FondoDIV.jpg)");
	
	var cadena = data.split("$%&#");
	
	$("#DIVCabTaulaGestioInvestigador").html(cadena[0]);
	$("#DIVCosTaulaGestioInvestigador").html(cadena[1]);

	$("#OrdreInvestigador").val(cadena[2]);
	
	var Ordre = cadena[2].split("|");
	
	$("#FlechaCapca"+Ordre[0]).html('<img src="img/Grid/FlechaCombo.png">');
}

function ResfrescaTaulaGestioInvestigador()
{

	$("#DIVInvestigadorValidat").slideUp("slow");	
	
	
	var Ordre =  $("#OrdreInvestigador").val();
	
	//alert("CodiClient:"+CodiClient+", TipusComanda:"+TipusComanda+", Finalitzat:"+Finalitzat+", Ordre:"+Ordre+", filtre:"+filtre);
	var SelectedRow = $("#InvestigadorSelectedRow").val();
	
	$.post("PHPForm/TaulaGestioInvestigadorRefresca.php",{Ordre:Ordre,SelectedRow:SelectedRow},LlegadaResfrescaTaulaGestioInvestigador);
}

function LlegadaResfrescaTaulaGestioInvestigador(data)
{
	$("#DIVCosTaulaGestioInvestigador").html(data);
}

function OrdenaTaulaInvestigador(Taula, Ordre)
{
	$("#OrdreInvestigador").val(Taula + "|" + Ordre);
	
	//alert($("#OrdreInvestigador").val());
	Ordre = (Ordre + 1)%2;
	
	ResfrescaTaulaGestioInvestigador();

	//document.getElementById("Ordena"+Taula).onclick =  function (){ Ordena(Taula,Ordre )};
	
}

function SelectRowInvestigador(id)
{
	$("#TDRowInvestigador"+$("#InvestigadorSelectedRow").val()).animate({ background: "" }, 1);
	$("#TDRowInvestigador"+id).animate({ backgroundColor: "orange" }, 200);
	$("#InvestigadorSelectedRow").val(id);
	
	CarregaInvestigadorFitxa(id);
	$("#DIVTaulaInvesProjectes").show();
	CarregaTaulaInvesProjecte(id);
}

function CarregaInvestigadorFitxa(id)
{
	$.get("PHPForm/InvestigadorCarregaFitxa.php",{id:id},LlegadaCarregaInvestigadorFitxa)	
}

function LlegadaCarregaInvestigadorFitxa(data)
{
	var cadena = data.split("|");

	$("#NomInvestigador").val(cadena[0]);
	$("#CognomsInvestigador").val(cadena[1]);
	$("#TelefonInvestigador").val(cadena[2]);
	$("#EmailInvestigador").val(cadena[3]);
	$("#DepInvestigador").val(cadena[4]);
	
	$("#InvestigadorSelectedRow").val(cadena[5]);
	//document.getElementById("UpdateInvestigadorButton").onclick =  function (){ UpdateInvestigador(cadena[5])};

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

function InicialitzaNewInvestigador(a)
{
	$("#NomInvestigador").val("");
	$("#CognomsInvestigador").val("");
	$("#TelefonInvestigador").val("");
	$("#EmailInvestigador").val("");
	$("#DepInvestigador").val("");
	
	$("#InvestigadorSelectedRow").val("");
	if (a!=1)ResfrescaTaulaGestioInvestigador();
	$("#DIVTaulaInvesProjectes").hide();
}

function UpdateInvestigador()
{
	var N,C,T,E,D;

	N = $("#NomInvestigador").val();
	C = $("#CognomsInvestigador").val();
	T = $("#TelefonInvestigador").val();
	E = $("#EmailInvestigador").val();
	D = $("#DepInvestigador").val();
	
	var id = $("#InvestigadorSelectedRow").val();
	
	if (N&&C&&T&&E&&D)
		$.get("PHPForm/InvestigadorUpdate.php",{N:N,C:C,T:T,E:E,D:D,id:id},LlegadaUpdateInvestigador);	
	else alert("No pots deixar camps en blanc, en cas de voler deixar un camp en blanc fes un espai");
}

function LlegadaUpdateInvestigador(data)
{
	//alert(data);
	if (data) alert("Investigador guardat correctament");	
	ResfrescaTaulaGestioInvestigador();
	SelectRowInvestigador(data);
}


function CanviaFormatBotoEstatInvestigador(estat)
{
	for (i=0;i<2;i++)
	{
		//$("#ButtonEstatInvestigador"+i);
		
		if (i==estat) 
		   $("#ButtonEstatInvestigador"+i).removeClass("ButtonInvestigadorEstat").addClass("ButtonInvestigadorEstatSel"+i)	;
		else 
		   $("#ButtonEstatInvestigador"+i).removeClass("ButtonInvestigadorEstatSel"+i).addClass("ButtonInvestigadorEstat")	;
	}	
}

function ModificaEstatInvestigador(id, estat)
{
	CanviaFormatBotoEstatInvestigador(estat);
	
	$.post("PHPForm/InvestigadorActualitzaEstat.php",{id:id,estat:estat},LlegadaModificaEstatInvestigador);	
}

function LlegadaModificaEstatInvestigador(data)
{
	//alert(data);
	ResfrescaTaulaGestioInvestigador();
}

