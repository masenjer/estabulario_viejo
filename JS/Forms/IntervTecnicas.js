function DefineCalendarioH2(Calendario)
{
	$("#"+Calendario).datepicker({
		showOn: 'both',
   		buttonImage: 'img/Calendario.png',
        buttonImageOnly: true,
	    changeYear: true,
		numberOfMonths: 1,
		onSelect: function(){
			$("#FechaCruceIntTecHormoyCruce").val($("#FechaHormo2IntTecHormoyCruce").val());
		   }
		}); 	
}


function MostraIntervTecnicas()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa52").hide();
		$("#DIVFitxa53").hide();
		$("#DIVFitxa54").hide();
		$("#DIVFitxa5").fadeIn("slow");
		$("#DIVFitxa51").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}
function TancaIntervTecnicas()
{
	$("#DIVFitxa5").fadeOut("slow");
}

function MostraIntHormonacion()
{
	InicializaIntTec('IntTecHormoyCruce');
	$("#DIVFitxa51").fadeOut(1000);
	$("#DIVFitxa52").delay(1001).fadeIn(1000);
}

function InicializaIntTec(form)
{
	$("#Obs"+form).val("");

	NumProcCarregaSelect(form);
	CarregaSelectProjecte(form);
	
	DefineCalendario("FechaHormo1"+form);
	DefineCalendarioH2("FechaHormo2"+form);
	DefineCalendario("FechaCruce"+form);
	DefineCalendario("FechaTaponesDesde"+form);
	DefineCalendario("FechaTaponesHasta"+form);
	DefineCalendario("FechaFechasSeparar"+form);
	DefineCalendario("FechaRecogida"+form);

//	$("#RespCost"+form).val("");
//	$("#CentreCost"+form).val("");
//	$("#ResCredit"+form).val("");
//	$("#NumProc"+form).val("");
//	$("#FechaRecogida"+form).val("");
//	$("#HoraRecogida"+form).val("");
	
	OmpleEspecies('','Hembra'+form);
	OmpleEspecies('','Macho'+form);
	
	$("#VolumenHormo1"+form).val("");
	$("#FechaHormo1"+form).val("");
	$("#HoraHormo1"+form).val("");
	$("#VolumenHormo2"+form).val("");
	$("#FechaHormo2"+form).val("");
	$("#HoraHormo2"+form).val("");	
	
	$("#EdadHembra"+form).val("");
	$("#SemGramHembra"+form).val("");
	$("#CantidadHembra"+form).val("");
	$("#CepaHembra"+form).html("");
	$("#CepaMacho"+form).html("");
	$("#EdadMacho"+form).val("");
	$("#SemGramMacho"+form).val("");
	$("#FechaCruce"+form).val("");
	$("#HoraCruce"+form).val("");
	$("#Tapones"+form).val("");
	$("#FechaTaponesDesde"+form).val("");
	$("#FechaTaponesHasta"+form).val("");
	$("#Separar"+form).val("");
	$("FechaFechasSeparar"+form).val("");
	$("#CantidadHxM"+form).val("");
	
	if (form == 'IntTecCruce')
	{
		 $("#RowActual").val(0);
		 $("#table"+form+" tr").remove();
		 CreaFilaCruces(0,form);
	}
	else $("#RowActual").val("");
	
	///Resetear Radios
	$('input:radio[name=radioVasec'+form+']').attr('checked',false); 
	$('input:radio[name=Tapones'+form+']').attr('checked',false); 
	$('input:radio[name=Separar'+form+']').attr('checked',false); 
	$('input:radio[name=RecogidaRadio'+form+']').attr('checked',false); 
	$('input:radio[name=Vivos'+form+']').attr('checked',false); 
	
	///Amaga divs flexibles
	$("#FechasTapones"+form).hide();
	$("#FechasSeparar"+form).hide();

	InicialitzaRecollida(form);
	
}

function GuardaIntTec(form)
{
	var prov, aux;
	
	var CC = $("#CentreCost"+form).val();
	var NumProc = $("#NProc"+form).val();
	var FR = $("#FechaRecogida"+form).val();
	var HR = $("#HoraRecogida"+form).val();
	var LR = $('input[name=RecogidaRadio'+form+']:checked').val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();
	
	var Obs = $("#Obs"+form).val();

	var EsH = $("#EspecieHembra"+form).val();
	var CeH = $("#CepaHembra"+form).val();
	var EsM = $("#EspecieMacho"+form).val();
	var CeM = $("#CepaMacho"+form).val();
	var VH1 = $("#VolumenHormo1"+form).val();
	var FH1 = $("#FechaHormo1"+form).val();
	var HH1 = $("#HoraHormo1"+form).val();
	var EH = $("#EdadHembra"+form).val();
	var SGH = $("#SemGramHembra"+form).val();
	var CaH = $("#CantidadHembra"+form).val();
	var VH2 = $("#VolumenHormo2"+form).val();
	var FH2 = $("#FechaHormo2"+form).val();
	var HH2 = $("#HoraHormo2"+form).val();
	var EM = $("#EdadMacho"+form).val();
	var SGM = $("#SemGramMacho"+form).val();
	var FC = $("#FechaCruce"+form).val();
	var HC = $("#HoraCruce"+form).val();
	var rV = $('input[name=radioVasec'+form+']:checked').val();
	var T = $('input[name=Tapones'+form+']:checked').val();
	var FTD = $("#FechaTaponesDesde"+form).val();
	var FTH = $("#FechaTaponesHasta"+form).val();
	var S = $('input[name=Separar'+form+']:checked').val();
	var FS = $("#FechaFechasSeparar"+form).val();
	var CHM = $("#CantidadHxM"+form).val();
		
	if (ValidaIntTec(CC,NumProc,FR,HR,LR,EsH,CeH,EsM,CeM,VH1,FH1,HH1,EH,SGH,CaH,VH2,FH2,HH2,EM,SGM,FC,HC,T,FTD,FTH,S,FS,CHM,rV,VM, Sacrifici, form))
	{
		$.post("PHPForm/"+form+"Guarda.php",{NumProc:NumProc,CC:CC,FR:FR,HR:HR,LR:LR,EsH:EsH,CeH:CeH,EsM:EsM,CeM:CeM,VH1:VH1,FH1:FH1,HH1:HH1,EH:EH,SGH:SGH,CaH:CaH,VH2:VH2,FH2:FH2,HH2:HH2,EM:EM,SGM:SGM,FC:FC,HC:HC,T:T,FTD:FTD,FTH:FTH,S:S,FS:FS,CHM:CHM,rV:rV,VM:VM,Sacrifici:Sacrifici,Obs:Obs},LlegadaGuardaIntTec);	
	}
}

function LlegadaGuardaIntTec(data)
{
	//alert(data);
	if (!data){
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");

	TancaIntervTecnicas(); 
	}
	else{alert("Ha ocorregut un error al realitzar la comanda");}

}


function ValidaIntTec(CC,NumProc,FR,HR,LR,EsH,CeH,EsM,CeM,VH1,FH1,HH1,EH,SGH,CaH,VH2,FH2,HH2,EM,SGM,FC,HC,T,FTD,FTH,S,FS,CHM,rV,VM, Sacrifici, form)
{

	var z = 0;
	
	//alert(FS);
	var error = ValidaDadesEcon(CC,NumProc);
	if (error) error = ValidaRecollida(FR,HR,LR,VM,Sacrifici);
	
	if (!EsH){alert("Has d' indicar una esp"+String.fromCharCode(232)+"cie de femella");error=false;}
	if (!CeH){alert("Has d' indicar una soca de femella");error=false;}
	if (!EH){alert("Has d' indicar l' Edat/Pes de la femella");error=false;}
	if (EH == "0"){alert("L'Edat/Pes de la femella ha de ser superior a 0");error = false;}
	if (!ValidaEnteroRegExp(EH)){alert("L'Edat/Pes de la femella ha de ser un n"+String.fromCharCode(250)+"mero enter");error = false;} 
	if (!SGH){alert("Has d' indicar la unitat d' edat / pes de la femella");error=false;}
	if (!CaH){alert("Has d' indicar la quantitat de femelles");error=false;}
	if (CaH == "0"){alert("La quantitat de femelles ha de ser superior a 0");error = false;}
	if (!ValidaEnteroRegExp(CaH)){alert("La quantitat de femelles ha de ser un n"+String.fromCharCode(250)+"mero enter");error = false;} 
	if (!EM){alert("Has d' indicar l' Edat/Pes del mascle");error=false;}
	if (EM == "0"){alert("L'Edat/Pes del mascle ha de ser superior a 0");error = false;}
	if (!ValidaEnteroRegExp(EM)){alert("L'Edat/Pes del mascle ha de ser un n"+String.fromCharCode(250)+"mero enter");error = false;} 

	if (!SGM){alert("Has d' indicar la unitat d' edat / pes del mascle");error=false;}
	if (!FC){alert("Has d' indicar una data d' encreuament");error=false;}
	if ((FC)&&!FechaFutura(FC, "d'encreuament" )){error = false;}
	
	if ((RestaFechas(FH2,FC))&&(FH2!=FC)){alert("La data d'encreuament ha de ser superior o igual a la data d'hormonaci"+String.fromCharCode(243)+" de l'hormona 2");error=false;}

	
		if (!CHM){alert("Has d' indicar una quantitat de femelles per mascle");error=false;}
	if (CHM == "0"){alert("La quantitat de femelles per mascle ha de ser superior a 0");error = false;}
	if (!ValidaEnteroRegExp(CHM)){alert("La quantitat de femelles per mascle ha de ser un n"+String.fromCharCode(250)+"mero enter");error = false;} 
	if (!rV){alert("Has de seleccionar si els mascles han de ser vasectomitzats o no");	error = false;}
	
	if (!VH1){alert("Has d' indicar un volum per a l' Hormona 1 (PMSG)");error=false;}
	if (VH1 == "0"){alert("El volum per a l' Hormona 1 (PMSG) ha de ser superior a 0");	error = false;}
//	if (!ValidaEnteroRegExp(VH1))
//	{
//		alert("El volum per a l' Hormona 1 (PMSG) ha de ser un n"+String.fromCharCode(250)+"mero enter");
//		error = false;
//	} 

	if (!FH1){alert("Has d' indicar una data per a l' Hormona 1 (PMSG)");error=false;}
	if ((FH1)&&!FechaFutura(FH1,"per a l' Hormona 1 (PMSG)")){error = false;}
	if (!HH1){alert("Has d' indicar una hora per a l' Hormona 1 (PMSG)");error=false;}
	if (!VH2){alert("Has d' indicar un volum per a l' Hormona 2 (HCG)");error=false;}
	if (VH2 == "0"){alert("El volum per a l' Hormona 2 (HCG) ha de ser superior a 0");error = false;}
//	if (!ValidaEnteroRegExp(VH2))
//	{
//		alert("El volum per a l' Hormona 2 (HCG) ha de ser un n"+String.fromCharCode(250)+"mero enter");
//		error = false;
//	} 
	if (!FH2){alert("Has d' indicar una data per a l' Hormona 2 (HCG)");error=false;}
	if ((FH2)&&!FechaFutura(FH2,"per a l' Hormona 2 (HCG)")){error = false;}
	if (!HH2){alert("Has d' indicar una hora per a l' Hormona 2 (HCG)");error=false;}
	if (RestaFechas(FH1,FH2)){alert("La data per tal d'aplicar la hormona 1 ha de ser anterior a la de la hormona 2");error=false;}
	if (FC&&FR&&RestaFechas(FC,FR)){alert("La data d'encreuament ha de ser inferior a la data de recollida");error=false;}
	
	if (!HC){alert("Has d' incicar una hora d' encreuament");error=false;}
	if (!T){alert("Has d' indicar si vols que es mirin els taps vaginals");error=false;}
	if ((T==1)&&(!FTD)){alert("Has de indicar una data inicial per mirar els taps vaginals");error=false;};
	if ((FTD)&&!FechaFutura(FTD,"d'inici per mirar els taps vaginals")){error=false;}
	if ((T==1)&&(!FTH)){alert("Has d' indicar una data final per mirar els taps vaginals");error=false;};
	if ((FTH)&&!FechaFutura(FTH,"final per mirar els taps vaginals")){error=false;}
	
	if ((T==1)&&RestaFechas(FC,FTD)){alert("La data inicial per mirar els taps vaginals ha de ser superior a la data d'encreuament");error=false;}
	
	if ((T==1)&&RestaFechas(FTD,FTH)){alert("La data final per mirar els taps vaginals ha de ser superior a la data inicial");error=false;}
	if (!S){ alert("Has d' indicar si vols separar als animals");error=false;};
	if ((S==1)&&(!FS)){alert("Has d' indicar una data per separar");error=false;};
	if ((FS)&&!FechaFutura(FS,"per separar")){error = false;}
	if ((S==1)&&(T==1)&&FTH&&FS&&RestaFechas(FTH,FS)){alert("La data de separaci"+String.fromCharCode(243)+" ha de ser superior o igual a la data final per mirar els taps vaginals");error=false;}
	
	if ((S==1)&&(T==0)&&FS&&RestaFechas(FC,FS)){alert("La data de separaci"+String.fromCharCode(243)+" ha de ser superior a la data d'encreuament");error=false;}

	
	if ((S==1)&&FS&&RestaFechas(FS,FR)){alert("La data de recollida ha de ser superior a la data de separaci"+String.fromCharCode(243));error=false;}
	
	if ((T==1)&&(S==0)&&FTH&&FR&&RestaFechas(FTH,FR)){alert("La data de recollida ha de ser superior a la data final per mirar els taps vaginals");error=false;}
	
//	if ((T==0)&&(S==0)&&FC&&FR&&RestaFechas(FC,FR)){alert("La data d'encreuament ha de ser inferior a la data de recollida");error=false;alert(2);}
	
	if((!VH1)||(!FH1)||(!HH1)||(!EsH)||(!CeH)||(!EH)||(!SGH)||(!CaH)||(!VH2)||(!FH2)||(!EM)||(!SGM)||(!FC)||(!HC)) error = false;

return error;
}


function CubreCepasHormoyCruce(form)
{
	OmpleCepas('','Hembra'+form);
	
	$("#EspecieMacho"+form).val($("#EspecieHembra"+form).val());
	OmpleCepas('','Macho'+form);
}


function SeleccionaEspecieHormoyCruce(id,form)
{
	OmpleCepas(id,form);
	//CreaFilaPetHemAc(id,form);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function MostraIntCruces()
{
	InicializaIntTec('IntTecCruce');
	$("#DIVFitxa51").fadeOut(1000);
	$("#DIVFitxa53").delay(1001).fadeIn(1000);
}


function TancaIntervTecnicas()
{
	$("#DIVFitxa5").fadeOut("slow");
}

function CreaFilaCruces(id, form)
{
	var idV = id;
	var rowAcual = id;
		rowAcual =  parseInt(rowAcual);
	id = parseInt(id)+1;	
	
	var cadenaTD = MostraTDCruces(id,form);
	
	var elmTBODY = document.getElementById('table'+form);
	var elmTR;
	var elmTD;
	var elmText;
	elmTR = elmTBODY.insertRow(rowAcual);
	elmTD = elmTR.insertCell(0);
	elmText = document.createElement('div');
	elmText.id = "idDIV"+form+id;
	elmTD.appendChild(elmText);
	$("#idDIV"+form+id).html(cadenaTD);
	
	//OmpleSelectConsumible(op+id+form,op);
	DefineCalendario("FechaCruce"+id+form);
	document.getElementById("PlusCruceButton").onclick = function (){CreaFilaCruces(id,form);};

	$("#RowActual").val(rowAcual+1);
}



function MostraTDCruces(id,form)
{
	return ''+
'	<table cellpadding="2" width="100%" cellspacing="0" border="0">'+
'		<tr>'+
'        	<td colspan="2" align="left"><b>Encreuament '+id+'</b></td>'+
'       </tr>'+
'    	<tr>'+
'        	<td align="left">'+
'            	IdMascle'+
'            </td>'+
'            <td>'+
'            	<input type="text" id="IdMacho'+id+form+'" class="fuenteForm" />'+
'            </td>'+
'        	<td align="left">'+
'            	IdFemella1'+
'            </td>'+
'            <td>'+
'            	<input type="text" id="IdHembra1'+id+form+'" class="fuenteForm" />'+
'            </td>'+
'        </tr>'+
'        <tr>'+
'        	<td align="left">'+
'            	IdFemella2'+
'            </td>'+
'            <td>'+
'            	<input type="text" id="IdHembra2'+id+form+'" class="fuenteForm" />'+
'            </td>'+
/*'        	<td align="left">'+
'            	IdFemella3'+
'            </td>'+
'            <td>'+
'            	<input type="text" id="IdHembra3'+id+form+'" class="fuenteForm" />'+
'            </td>'+*/
'        </tr>'+
'        <tr>'+
'        	<td align="left">Data</td>'+
'            <td>'+
'            	<input type="text" id="FechaCruce'+id+form+'" class="fuenteForm" style="width:80px" readonly="readonly" >'+
'            </td>'+
'            <td align="left">Hora</td>'+
'            <td align="left">'+
'            	<select id="HoraCruce'+id+form+'" class="fuenteForm">'+SelectHoras()+'</select>'+
'            </td>'+
'        </tr>'+
'        <tr>'+
'        	<td height="10px"></td>'+
'        </tr>'+
'    </table>';            	
}	

function GuardaIntTecCruce(form)
{
	var prov, aux, n;
	
	var CC = $("#CentreCost"+form).val();
	var NumProc = $("#NProc"+form).val();
	var FR = $("#FechaRecogida"+form).val();
	var HR = $("#HoraRecogida"+form).val();
	var LR = $('input[name=RecogidaRadio'+form+']:checked').val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();

	var EsH = $("#EspecieHembra"+form).val();
	var CeH = $("#CepaHembra"+form).val();
	var EsM = $("#EspecieMacho"+form).val();
	var CeM = $("#CepaMacho"+form).val();
	var EH = $("#EdadHembra"+form).val();
	var SGH = $("#SemGramHembra"+form).val();
	//var CaH = $("#CantidadHembra"+form).val();
	var EM = $("#EdadMacho"+form).val();
	var SGM = $("#SemGramMacho"+form).val();
	var FC = $("#FechaCruce"+form).val();
	var HC = $("#HoraCruce"+form).val();
	var rV = $('input[name=radioVasec'+form+']:checked').val();
	var T = $('input[name=Tapones'+form+']:checked').val();
	var FTD = $("#FechaTaponesDesde"+form).val();
	var FTH = $("#FechaTaponesHasta"+form).val();
	var S = $('input[name=Separar'+form+']:checked').val();
	var FS = $("#FechaFechasSeparar"+form).val();
	//var CHM = $("#CantidadHxM"+form).val();
	
	var Obs = $("#Obs"+form).val();

	
	aux = "";	
//	n = "";
	
	var n = parseInt ($("#RowActual").val())+1;
//	aux = n;
	for (i=1;i<n;i++)
	{
		if(($("#IdMacho"+i+form).val()||($("#IdHembra1"+i+form).val())||($("#IdHembra2"+i+form).val())||($("#IdHembra3"+i+form).val())||(i==1)))
		{
			aux = aux + "#" + $("#IdMacho"+i+form).val() + "|" + $("#IdHembra1"+i+form).val() + "|" + $("#IdHembra2"+i+form).val() + "|" + $("#IdHembra3"+i+form).val() + "|" + $("#FechaCruce"+i+form).val() + "|" + $("#HoraCruce"+i+form).val()+"|"+i;
		}
	}
	
	if (ValidaIntTecCruce(CC,NumProc,FR,HR,LR,VM,Sacrifici,EsH,CeH,EsM,CeM,EH,SGH,EM,SGM,FC,HC,T,FTD,FTH,S,FS,rV,aux,form))
	{
		if (confirm("Has sol·licitat un encreuament continuo al no especificar una data de recollida/utilització. Estàs segur/a de voler continuar amb la sol·licitud?")){
			$.post("PHPForm/"+form+"Guarda.php",{NumProc:NumProc,CC:CC,FR:FR,HR:HR,LR:LR,VM:VM,Sacrifici:Sacrifici,EsH:EsH,CeH:CeH,EsM:EsM,CeM:CeM,EH:EH,SGH:SGH,EM:EM,SGM:SGM,FC:FC,HC:HC,T:T,FTD:FTD,FTH:FTH,S:S,FS:FS,rV:rV,aux:aux,Obs:Obs},LlegadaGuardaIntTec);	
		}
		//alert("entro");
		
	}
}


function ValidaIntTecCruce(CC,NumProc,FR,HR,LR,VM,Sacrifici,EsH,CeH,EsM,CeM,EH,SGH,EM,SGM,FC,HC,T,FTD,FTH,S,FS,rV,aux,form)
{
	var z = 0;
	
	//alert(FS);
	var error = ValidaDadesEcon(CC,NumProc);
	if (error && FR) error = ValidaRecollida(FR,HR,LR,VM,Sacrifici);

	if (!EsH){alert("Has d' indicar una esp"+String.fromCharCode(232)+"cie de femella");error = false;}
	if (!CeH){alert("Has d' indicar una soca de femella");error = false;}
	if (!EH){alert("Has d' indicar la Edat/Pes de la femella");error = false;}
	if (EH=="0")
	{
		alert("La edat o pes de la femella no pot ser 0");	
		error = false;
	}
	if (!ValidaEnteroRegExp(EH))
	{
		alert("L' edat/pes de les femelles ha de ser un n"+String.fromCharCode(250)+"mero enter");
		error = false;
	} 				
	if (!SGH){alert("Has d' indicar la unitat de edat / pes de la femella");error = false;}
	//if (!CaH) alert("Has d' indicar la quantitat de femelles");
	if (!CeM){alert("Has d' indicar una soca de mascle");error = false;}
	if (!EM){alert("Has d' indicar la Edat/Pes del mascle");error = false;}
	if (EM=="0")
	{
		alert("La edat o pes del mascle no pot ser 0");	
		error = false;
	}
	if (!ValidaEnteroRegExp(EM))
	{
		alert("L' edat/pes de mascles ha de ser un n"+String.fromCharCode(250)+"mero enter");
		error = false;
	} 	
	if (!SGM){alert("Has d' indicar la unitat d' edat / pes del mascle");error = false;}
	if (!T){alert("Has d' indicar si vols que es mirin els taps vaginals");error = false;}
	if ((T==1)&&(!FTD)){ alert("Has de indicar una data inicial per mirar els taps vaginals");error=false;};
	if ((FTD)&&!FechaFutura(FTD,"d'inici per mirar els taps vaginals")){error=false;}
	if ((T==1)&&(!FTH)){ alert("Has d' indicar una data final per mirar els taps vaginals");error=false;};
	if ((FTH)&&!FechaFutura(FTH,"final per mirar els taps vaginals")){error=false;}
	if ((T==1)&&RestaFechas(FTD,FTH)){alert("La data final per mirar els taps vaginals ha de ser superior a la data inicial");error=false;}
	if (!S){ alert("Has d' indicar si vols separar als animals");error=false;};
	if ((S==1)&&(!FS)){ alert("Has d' indicar una data per separar");error=false;};
	if ((FS)&&!FechaFutura(FS,"per separar")){error = false;}
	//if (!CHM) alert("Has d' indicar una quantitat de femelles per mascle");

	if ((S==1)&&(T==1)&&FTH&&FS&&RestaFechas(FTH,FS)){alert("La data de separaci"+String.fromCharCode(243)+" ha de ser superior a la data d'extracci"+String.fromCharCode(243)+" de taps vaginals");error=false;}
	
	if ((T==1)&&(S==0)&&FTH&&FR&&RestaFechas(FTH,FR)){alert("La data de recollida ha de ser superior a la data final per mirar els taps vaginals");error=false;}

	if (FR&&(S==1)&&FS&&RestaFechas(FS,FR)){
		//console.log("FS-FR",FS+"-"+FR);
		alert("La data de recollida ha de ser superior a la data de separaci"+String.fromCharCode(243));error=false;}



	if (!rV){ alert("Has de seleccionar si els mascles han d'estar vasectomitzats o no");error=false;};
	if ( String(aux).length == 1){ alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim una esp"+String.fromCharCode(232)+"cie");error = false;}
	else
	{
		var v = aux.split("#");
		//alert("length:"+v.length);
		for (i=1;i<v.length;i++)
		{	
			//alert(v[i]);	
			var c = v[i].split("|");
			//z = i*5;
			//if ((i==1)&&(!c[0])){alert("Has d'indicar una ID de mascle al bloc 1"); error = false;}
			//if ((c[0])&&(!c[1])){alert("Indica la ID de la femella 1 al bloc "+(c[6])); error = false;}
			//if ((c[z+1])&&(!c[z+3])) alert("Indica la ID de la femella 2 al bloc " + eval(i)); 	
			//if ((c[z+1])&&(!c[z+4])) alert("Indica la ID de la femella 3 al bloc " + eval(i)); 	
			if ((!c[4])){alert("Has de seleccionar una data d' encreuament al bloc " +(c[6])); error = false;}
			//alert("----"+i+"---");
			//alert("c[4]:"+c[4]);
			//if (!c[0]&&(c[1]||c[2]||c[3]||c[4])&&(i!=1)){alert("Has de posar una ID pel mascle del bloc " +(c[6]));error = false;}
			if((c[4]))
			{
				//alert("Entro");
				if ((c[4])&&!FechaFutura(c[4],"d'encreuament al bloc "+(c[6]))){error=false;}
//	alert(7);
				if ((T==1)&&!RestaFechas(FTD,c[4])){alert("La data inicial per mirar els taps vaginals ha de ser superior a la data d'encreuament del bloc " +(c[6]));error=false;}
//	alert(8);
				if ((S==1)&&(T==0)&&FS&&!RestaFechas(FS,c[4])){alert("La data de separaci"+String.fromCharCode(243)+" ha de ser superior a la data d'encreuament del bloc "+(c[6]));error=false;}
//	alert(9);
				if (FR&&c[4]&&!RestaFechas(FR,c[4])){alert("La data de recollida ha de ser superior a la data d'encreuament al bloc"+(c[6]));error=false;} 
//	alert(10);	 
			}
			//if ((!c[5])){alert("Has de seleccionar una hora d' encreuament al bloc "+(c[6]));error = false;}

			//if ((c[0])&&((!c[1])||(!c[4])||(!c[5]))) error = false;	
		}
//		alert(11);
	}
	if((!EsH)||(!CeH)||(!EH)||(!SGH)||(!EM)||(!SGM)) error = false;
return error;
}


function MostraIntJaulas()
{
	InicialitzaJaulasAnimales('IntTecJaulasAnimales');
	$("#DIVFitxa51").fadeOut(1000);
	$("#DIVFitxa54").delay(1001).fadeIn(1000);
}

function InicialitzaJaulasAnimales(form)
{	
	NumProcCarregaSelect(form);
	CarregaSelectProjecte(form);

	$("#Obs"+form).val("");

	$("#RowActualAnim").val(0);
	$("#RowActualJaulas").val(0);
	
//	$("#RespCost"+form).val("");
//	$("#CentreCost"+form).val("");
//	$("#ResCredit"+form).val("");
//	$("#NumProc"+form).val("");
	
	 $("#tableAnimales"+form+" tr").remove();
	 $("#tableJaulas"+form+" tr").remove();
	
	CreaFilaIntTecAnimales (0,'IntTecJaulasAnimales')
	CreaFilaIntTecJaulas (0,'IntTecJaulasAnimales')

	DefineCalendario("FechaRecogida"+form);
	$("#FechaRecogida"+form).val("");
	$("#HoraRecogida"+form).val("");

	DefineCalendario("FechaDev"+form);
	$("#FechaDev"+form).val("");
	$("#HoraDev"+form).val("");
	
	$('input[name=RadioDevJaula'+form+']:checked').attr('checked',false); 
	$("#DIVDevJaulas"+form).hide();
	
	InicialitzaRecollida('IntTecJaulasAnimales');


}

function SeleccionaEspecieIntecAnimales(id,form)
{
	OmpleCepas(id,"Anim"+form);
	CreaFilaIntTecAnimales(id,form);
}

function CreaFilaIntTecAnimales(id, form)
{
	var idV = id;
	if (id>=$("#RowActualAnim").val())
	{
		$("#Especie1Anim"+ form).attr("disabled",true);

		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		var cadenaTD = MostraTDIntTecAnimales(id,form);
		
		var elmTBODY = document.getElementById('tableAnimales'+form);
		var elmTR;
		var elmTD;
		var elmText;
		elmTR = elmTBODY.insertRow(rowAcual);
		elmTD = elmTR.insertCell(0);
		elmText = document.createElement('div');
		elmText.id = "idDIVAnimales"+form+id;
		elmTD.appendChild(elmText);
		$("#idDIVAnimales"+form+id).html(cadenaTD);
		
		//OmpleCepas(idV,'AnimIntTecJaulasAnimales');
		//OmpleEspecies(id,'AnimIntTecJaulasAnimales');
		
			if (id != "1")OmpleCepas(id,'AnimIntTecJaulasAnimales');
		else OmpleEspecies(id,'AnimIntTecJaulasAnimales');

	
		//OmpleSelectConsumible(op+id+form,op);
		DefineCalendario("FechaCruce"+id+form);
		//document.getElementById('Especie'+idV + 'Anim'+ form).onchange = function (){};

	
		$("#RowActualAnim").val(rowAcual+1);

		setTimeout(quitaSDJaulaAnim, 1000);
		setTimeout(function (){setHelpDialog(id,form)}, 1000);
	}
}


function MostraTDIntTecAnimales(id, form)
{
	return''+
			'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
             '   <tr>'+
              '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+'</td>'+
               ' </tr>'+
                '<tr>'+
                 '  <td align="left">'+ MostraTDIntTecAnimalesI(id,form)+'</td>'+
                  ' <td align="left">'+ MostraTDIntTecAnimalesD(id,form) +'</td>'+
                '</tr>'+
            '</table>';
}

function MostraTDIntTecAnimalesI(id,form)
{
	if (id != "1")
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" class="fuenteForm" value="'+$("#Especie1Anim"+form+" option[value='"+$("#Especie1Anim"+form).val()+"']").text()+'" readonly="readonly">'+
			'</select>'+
            '</td>'+
        '</tr>';
		cepa = '<input type="hidden" id="Especie'+id +"Anim"+ form+'" value = "'+$("#Especie1Anim"+form).val()+'">'+
				'<select id="Cepa'+id +'Anim'+  form+'"  onchange="CreaFilaIntTecAnimales(\''+id+'\',\''+form+'\');" class="fuenteForm selectJaulasAnim"></select>';
	}
	else 
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie1Anim'+ form+'" onchange="SeleccionaEspecieIntecAnimales(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		cepa = '<select id="Cepa'+id +'Anim'+ form+'" class="fuenteForm selectJaulasAnim"></select>';
	}

	
	return '<table>' +
		especie+
    	'<tr>'+
        	'<td align="left">Soca</td>'+
            '<td align="left">'+cepa+
            '</td>'+
        '</tr>'+
    '</table>';
}

function MostraTDIntTecAnimalesD(id,form)
{
	var mensaje = 	"Formats acceptats: </br>"+
					"<ul>"+
						"<li>Enumeració d'animals ID: a,z,c,x,k (separats per ,) </li>"+
						"<li>Rangs d'animals ID (ambdós inclosos): b-n (fent servir -) </li>"+
						"<li>Es pot introduir un rang en una enumeració: e,x,a-j,n </li>"+					
						"<li>*Nota: el número d'animals ha de coincidir amb el camp quantitat del bloc "+id+" </li>"+					
					"<ul>"+
					"</ul>";					

	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
     	'<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="Cantidad'+id + form+'" class="fuenteForm"   style="width:115px"/></td>'+
        '</tr>'+
      	'<tr>'+
        	'<td align="left">Animal ID'+
        		'<div id="helpMessage'+id + form+'" class="helparrow_box">'+mensaje+'</div>'+
            '</td>'+
            '<td align="left"><textarea id="RatonID'+id + form+'"  class="fuenteForm" style="width:115px" /></td>'+            	
        '</tr>'+

    '</table>';
}	

function SeleccionaEspecieIntecJaulas(id,form)
{
	OmpleCepas(id,"Jaula"+form);
	CreaFilaIntTecJaulas(id,form);
}



function CreaFilaIntTecJaulas(id, form)
{
	var idV = id;
	
	if (id>=$("#RowActualJaulas").val())
	{
		$("#Especie1Jaula"+ form).attr("disabled",true);
				
		var rowAcual = id;
		rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		var cadenaTD = MostraTDIntTecJaulas(id,form);
		
		var elmTBODY = document.getElementById('tableJaulas'+form);
		var elmTR;
		var elmTD;
		var elmText;
		elmTR = elmTBODY.insertRow(rowAcual);
		elmTD = elmTR.insertCell(0);
		elmText = document.createElement('div');
		elmText.id = "idDIVJaulas"+form+id;
		elmTD.appendChild(elmText);
		$("#idDIVJaulas"+form+id).html(cadenaTD);
		
		if (id != "1")OmpleCepas(id,'JaulaIntTecJaulasAnimales');
		else OmpleEspecies(id,'JaulaIntTecJaulasAnimales');
		//OmpleSelectConsumible(op+id+form,op);
		//DefineCalendario("FechaCruce"+id+form);
		//document.getElementById('Especie'+idV + 'Jaula'+ form).onchange = function (){};
		
		$("#RowActualJaulas").val(rowAcual+1);
		
		setTimeout(quitaSDJaulaAnim, 1000);
		
	}
}

function quitaSDJaulaAnim (){
	$( ".selectJaulasAnim option[value='27']" ).remove();	
}

function setHelpDialog(id, form){

	$('#RatonID'+id + form).focusin(function(){
		//alert(id);
		$("#helpMessage"+id + form).show();
	});

	$('#RatonID'+id + form).focusout(function(){
		$("#helpMessage"+id + form).hide();
	});
}

function MostraTDIntTecJaulas(id,form)
{
	return ''+
			'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
             '   <tr>'+
              '      <td class="fuenteFormTitol" align="left">Bloc '+id+'</td>'+
               ' </tr>'+
                '<tr>'+
                 '  <td align="left">'+ MostraTDIntTecJaulasS(id,form)+'</td>'+
               ' </tr>'+
                '<tr>'+
                  ' <td align="left">'+ MostraTDIntTecJaulasI(id,form) +'</td>'+
                '</tr>'+
            '</table>';
}

function MostraTDIntTecJaulasS(id,form)
{
	if (id != "1")
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" class="fuenteForm" value="'+$("#Especie1Jaula"+form+" option[value='"+$("#Especie1Jaula"+form).val()+"']").text()+'" readonly="readonly">'+
			'</select>'+
            '</td>'+
        '</tr>';
		cepa = '<input type="hidden" id="Especie'+id +"Jaula"+ form+'" value = "'+$("#Especie1Jaula"+form).val()+'">'+
				'<select id="Cepa'+id +'Jaula'+  form+'"  onchange="CreaFilaIntTecJaulas(\''+id+'\',\''+form+'\');" class="fuenteForm selectJaulasAnim"></select>';
	}
	else 
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie1Jaula'+ form+'" onchange="SeleccionaEspecieIntecJaulas(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		cepa = '<select id="Cepa'+id +'Jaula'+ form+'" class="fuenteForm selectJaulasAnim"></select>';
	}
	
	return especie+
    	'<tr>'+
        	'<td align="left">Soca</td>'+
            '<td align="left">'+cepa+
            '</td>'+
        '</tr>'+
    '</table>';
}

function MostraTDIntTecJaulasI(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left">Sala</td>'+
            '<td align="left"><select id="Sala'+id + form+'" class="fuenteForm">'+SelectSalas()+'</select></td>'+
        	'<td align="left">Posici&oacute;</td>'+
            '<td align="left"><input type="text" id="Posicion'+id + form+'"  class="fuenteForm"/></td>'+
        	'<td align="left">N&deg; G&agrave;bia</td>'+
            '<td align="left"><input type="text" id="NJaula'+id + form+'" class="fuenteForm"  style="width:115px"/></td>'+
        '</tr>'+
    '</table>';
}	


function GuardaJaulasAnimales(form)
{
	var prov, aux1, n1, aux2, n2;
	
	//var Resp = $("#RespCost"+form).val();
	var CC = $("#CentreCost"+form).val();
	//var RC = $("#ResCredit"+form).val();
	var NumProc = $("#NProc"+form).val();

	var FR = $("#FechaRecogida"+form).val();
	var HR = $("#HoraRecogida"+form).val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();

	
	var RD = $('input[name=RadioDevJaula'+form+']:checked').val();
	
	if (RD == "1")
	{
		FD = $("#FechaDev"+form).val();
		HD = $("#HoraDev"+form).val();
	}
	else
	{
		FD = "";
		HD = "";
	}

	var Obs = $("#Obs"+form).val();
	
	aux1 = "";	
	n1 = "";
	
	var n = parseInt ($("#RowActualAnim").val());
//	aux = n;
//	if (n!=1) 
	//{
		//alert("n:"+n);
		for (i=1;i<eval(n+1);i++)
		{
			//alert($('#Cepa'+i + 'Anim'+ form).val()+","+$("#RatonID"+i+form).val()+","+$("#Cantidad"+i+form).val());
			if (($('#Cepa'+i + 'Anim'+ form).val())||($("#RatonID"+i+form).val())||($("#Cantidad"+i+form).val()))
			aux1 = aux1 + "#" + $('#Especie'+i + 'Anim'+ form).val() + "|" + $('#Cepa'+i + 'Anim'+ form).val() + "|" + $("#RatonID"+i+form).val() + "|" + $("#Cantidad"+i+form).val();
		}
	//}
	aux2 = "";	
	n = "";
	
	var n = parseInt ($("#RowActualJaulas").val());

	//if (n!=1) 
	//{
		//alert("n:"+n);
		for (i=1;i<eval(n+1);i++)
		{
			if (($('#Cepa'+i + 'Jaula'+ form).val())||($("#Posicion"+i+form).val())||($("#NJaula"+i+form).val()))
			aux2 = aux2 + "#" + $('#Especie'+i + 'Jaula'+ form).val() + "|" + $('#Cepa'+i + 'Jaula'+ form).val() + "|" + $("#Sala"+i+form).val() + "|" + $("#Posicion"+i+form).val() + "|" + $("#NJaula"+i+form).val();
		}
	//}
	
	//alert("aux1:"+aux1);
	//alert("aux2:"+aux2);
	
	if (ValidaJaulasAnimales(CC,NumProc,FR,HR,VM,Sacrifici,RD,FD,HD,aux1,aux2))
	{
		$.post("PHPForm/"+form+"Guarda.php",{NumProc:NumProc,CC:CC,aux1:aux1,aux2:aux2,FR:FR,HR:HR,VM:VM,Sacrifici:Sacrifici,FD:FD,HD:HD,Obs:Obs},LlegadaGuardaIntTec);	
	}
}


function ValidaJaulasAnimales(CC,NumProc,FR,HR,VM,Sacrifici,RD,FD,HD,aux1,aux2)
{
	var z = 0;	
	var error = ValidaDadesEcon(CC,NumProc);
	if (error) error = ValidaRecollida(FR,HR,1,VM,Sacrifici);

	var buit = 0;

	var animenum = [];
	var rango = [];
	var inicio = 0;
	var final = 0;

	var numAnimBloc = 0;

	if(!RD){
		alert("Has d'indicar si hi haur"+String.fromCharCode(224)+" o no devoluci"+String.fromCharCode(243)+" d' animals i/o g"+String.fromCharCode(224)+"bies");	
		error = 1;
	}
	if ((RD == "1")&&(!FD)){
		alert("Has d' indicar una data de devoluci"+String.fromCharCode(243)+"");
		error = 1;
	}
	if ((RD == "1")&&(!HD))
	{
		alert("Has d' indicar una hora de devoluci"+String.fromCharCode(243)+"");
		error = 1;
	}
	if ((RD == "1")&&!FechaFutura(FD,"de devoluci"+String.fromCharCode(243))){error = false;}
	if ((RD == "1")&&RestaFechas(FR,FD)){alert("La data de recollida ha de ser superior a la data de devoluci"+String.fromCharCode(243));error=false;}

	var v = aux1.split("#");
	for (i=1;i<v.length;i++)
	{
		//alert("v["+i+"]:"+v[i]);
		var c = v[i].split("|");
		
		//alert("c["+1+"]:"+c[1]);
		if ((!c[1])||(c[1]==null)||(c[1]=="null"))
		{
			alert("Has de seleccionar una soca al bloc " + eval(i) + " d' animals");error = false;
		}
		if ((!c[2])&&(!c[3]))
		{ 
			alert("Indica la ID del animal o una quantitat al bloc " + eval(i) + " d' animals"); 
			error = false;
		} 	
		if (c[3] == "0"||(!c[3]))
		{
			alert("La quantitat al bloc " + eval(i) + " ha de ser superior a 0");
			error = false;
		}
		if (c[3]&&!ValidaEnteroRegExp(c[3]))
		{
			alert("La quantitat al bloc " + eval(i) + " ha de ser un n"+String.fromCharCode(250)+"mero enter");
			error = false;
		}

		///c[2] => Numeracion de los animales
		animenums = c[2].split(",");

		numAnimBloc = 0;
		animenums.forEach(function (animenum){
			
			if (animenum){ //Para asegurarnos de que no dejan un espacio entre comas vacío
				rango = animenum.split("-");
				//console.log("longitud:"+rango.length  )
				if (rango.length > 2){ //Existe más de un guión -> error
					alert("El format text introduït al camp Animal ID del bloc "+eval(i)+" no compleix el format permés perque hi ha un interval incorrecte amb dos guions");
					return false;
				}else if(rango.length > 1){//Hay un rango con formato correcto
					inicio  = rango[0];
					final = rango[1];

					if (!isNaN(inicio)&&!isNaN(final)&&(inicio%1==0)&&(final%1==0)){
						numAnimBloc += Math.abs(final - inicio) +1;
					}
					else{ //O no es un número o no es entero
						alert("El format text introduït al camp Animal ID del bloc "+eval(i)+" no compleix el format permés perque en el interval apareixen dades que no son números enters");
						return  false;
					}
				}else if(rango.length == 1){
					//console.log(rango[0]);
					if (!isNaN(rango[0])&&(rango[0]%1==0)){
						numAnimBloc ++; // es un elemento en la enumeración y suma 1
					}
					else{ //O no es un número o no es entero
						alert("El format text introduït al camp Animal ID del bloc "+eval(i)+" no compleix el format permés perque apareixen dades que no son números enters");
						return false;
					}
				}
			} 

			//console.log("numAnimBloc:"+numAnimBloc+", cant"+c[3]);

			

		});

		if(numAnimBloc != c[3]){
			alert("Error al bloc "+eval(i)+": El número d'animals introduït al camp Animal ID no coincideix amb el número introduït al camp quantitat");
			error = false;
		}
		

		//if ((c[1])&&(!c[2])&&((!c[3]))) error = false;	

		buit ++;				
	}
	
	c="";
	z="";

	var v = aux2.split("#");
	for (i=1;i<v.length;i++)
	{	
		var c = v[i].split("|");
			
		if (!c[1]||(c[1]==null)||(c[1]=="null"))
		{
			alert("Has de seleccionar una soca al bloc " + eval(i) + " de g"+String.fromCharCode(224)+"bies"); 	
			error= false;
		}
		if (!c[2])
		{
			alert("Has de seleccionar una sala al bloc " + eval(i) + " de g"+String.fromCharCode(224)+"bies"); 
			error = false;	
		}
		//if ((c[0])&&(!c[3])) alert("Indica una posici"+String.fromCharCode(243)+" al bloc " + eval(i+1) + " de g"+String.fromCharCode(224)+"bies"); 	
		if (!c[4])
		{
			alert("Indica un n"+String.fromCharCode(250)+"mero de g"+String.fromCharCode(224)+"bia al bloc " + eval(i) + " de g"+String.fromCharCode(224)+"bies"); 	
			error = false;
		}
		
		//if ((!c[1])&&((!c[2])||(!c[4]))) error = false;	

		buit ++;				
	}
	//alert(buit);
	if (buit<1)
	{	
		alert("Has de triar com a m"+String.fromCharCode(237)+"nim un bloc d'animals o g"+String.fromCharCode(224)+"bies");	
		error = false;
	}

return error;
}



function ModificaQuantitatAnimalsIntecGabies(id)
{
	$("#Cantidad"+id+"IntTecJaulasAnimales").val("1");
}

function ModificaRatonIDAnimalsIntecGabies(id)
{
	$("#RatonID"+id+"IntTecJaulasAnimales").val("");
}




function OcultaSeparar(form){
	$("#FechaFechasSeparar"+form).val("");
	$('#FechasSeparar'+form).hide('slow');
}

function OcultaTapones(form){
	$("#FechaTaponesDesde"+form).val("");
	$("#FechaTaponesHasta"+form).val("");
	$('#FechasTapones'+form).hide('slow');
}

