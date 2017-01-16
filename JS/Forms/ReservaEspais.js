
function DefineCalendarioRE(Calendario,id,form)
{
	$("#"+Calendario).datepicker({
		showOn: 'both',
   		buttonImage: 'img/Calendario.png',
        buttonImageOnly: true,
	    changeYear: true,
		numberOfMonths: 1,
		onSelect: function(textoFecha, objDatepicker){
			CreaFilaFranjHor(id, form);
			//$("#mensaje").html("<p>Has seleccionado: " + textoFecha + "</p>");
		   }
		}); 	
}

function TancaReservaEspais()
{
	$("#DIVFitxa1").fadeOut("slow");
}

function CargaReservaEspais()
{
	if ($("#InOut").val()  == 1)
	{
		InicializaReservaEspais();
		$("#DIVFitxa1").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}

function InicializaReservaEspais()
{
	NumProcCarregaSelect('ResEsp');
	CarregaSelectProjecte('ResEsp');
	$("#nFrangHorResEsp").val(0);
	DefineCalendarioRE('FechaFranjHorResEsp0',0,'ResEsp');
	
//	$("#RespCostResEsp").val("");
//	$("#CentreCostResEsp").val("");
//	$("#ResCreditResEsp").val("");
	$(':radio').attr("checked",false);
	$("#NumProcResEsp").val("");
	
	var filas = $("#nFrangHorResEsp").val();
	
	var rowAcual = parseInt($("#RowActualResEsp").val());

	EliminaFilaFranjHor(rowAcual, 'ResEsp');
	CreaFilaFranjHor(0,'ResEsp');
	$("#nFrangHorResEsp").val(0);
	
	$("#ObsResEsp").val("");
}

function EliminaFilaFranjHor(rowAcual, tabla)
{
	//alert("rowAcual:"+rowAcual+", tabla:"+tabla);
	$("#table"+tabla + " tr").remove();
	$("#RowActual"+tabla).val(0);
	//alert($("#RowActual"+tabla).val())
}


function CreaFilaFranjHor(id, form)
{
	//alert("id:"+id+", form:"+form);
	$("#nFrangHor"+form).val(parseInt($("#nFrangHor"+form).val())+1);
	//alert($("#nFrangHor").val());
	
	var rowAcual = $("#RowActual"+form).val();
		rowAcual =  parseInt(rowAcual);
		
	if (id == 0){ var imp = '<font class="ast">*</font>'; var button="";}	
	else {
		var imp = '';	
		var button = '<button class="BorrarFechaButton" onclick="BorrarFechaFranjHor(\''+form+eval(id+1)+'\');" title="Esborrar data"></button>';
	}		
	
	$("#FechaFranjHor"+form+id).datepicker( "option", "onSelect", "" ); 		
	id = id+1;

	var cadenaTD = new Array();
	cadenaTD[0] = '<input type="text" id="FechaFranjHor'+form+id+'" class="fuenteForm" readonly="readonly">'+imp+button;
	cadenaTD[1] = 'De les';
	cadenaTD[2] = '<select id="DesdeFranjHor'+form+id+'" class="fuenteForm">'+SelectHoras()+'</select>'+imp;                    	
	cadenaTD[3] = 'a les';
	cadenaTD[4] = '<select id="HastaFranjHor'+form+id+'" class="fuenteForm">'+SelectHoras()+'</select>'+imp;
	cadenaTD[5] = 'hores';
	
	var elmTBODY = document.getElementById('table'+form);
	var elmTR;
	var elmTD;
	var elmText;

	elmTR = elmTBODY.insertRow(rowAcual);
	
	for (var i=0; i<6; i++) 
	{
		elmTD = elmTR.insertCell(i);
		elmText = document.createElement('div');
		elmText.id = "idmolona"+form+id+i;
		elmTD.appendChild(elmText);
		$("#idmolona"+form+id+i).html(cadenaTD[i]);
	}

	DefineCalendarioRE('FechaFranjHor'+form+id,id,form);

	$("#RowActual"+form).val(rowAcual+1);
}

function BorrarFechaFranjHor(camp)
{
	$("#FechaFranjHor"+camp).val("");
	$("#DesdeFranjHor"+camp).val("");
	$("#HastaFranjHor"+camp).val("");
}


function ValidaReservaEspais(CC,NProc,Eq1,Horari)
{
	var buit = 0;
	
	var f = new Date();	
	var hoy = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();

	var error = ValidaDadesEcon(CC,NumProc)

	if (!Eq1)
	{
		alert("Has de triar un equip o espai per a reservar");
		error = false;	
	}
	
	var v = Horari.split("#");
	for (i=1;i<v.length;i++)
	{
	//alert("v["+i+"]:"+v[i]);
		var cadena = v[i].split("|");
	//var cadena = Horari.split("|");
		if (!cadena[0])
		{
			alert("Falta un valor a la data del bloc " + cadena[3]);
			error = false;
		}
		if (!cadena[1])
		{
			alert("Falta un valor a la hora inicial del bloc " + cadena[3]);
			error = false;
		}
		if (!cadena[2])
		{
			alert("Falta un valor a la hora final del bloc " + cadena[3]);
			error = false;
		}
		if ((cadena[1])&&(cadena[2])&&(timeInHours(cadena[1]) >=  timeInHours(cadena[2])))
		{
			alert("L' hora d' entrada ha de ser inferior a l' hora de sortida al bloc " + cadena[3]);	
			error = false;
		}
//			alert("Hoy:" + hoy+", sel:"+cadena[(i*3)+1]);
		if ((cadena[0])&&(!RestaFechas(cadena[0],hoy)))
		{
			alert("La data ha de ser superior a la data actual al bloc " + cadena[3]);
			error = false;
		}
		if ((cadena[0])&&(!FechaFutura(cadena[0],"de la reserva"))){
			error = false;
		}
		
		buit ++;
	}
		
	if (buit<1)
	{	
		alert("Has d'indicar com a m"+String.fromCharCode(237)+"nim una franja hor"+ String.fromCharCode(224) +"ria");	
		error = false;
	}		
	return error; 
	
}


function GuardaReservaEspais(form)
{
//	var Resp = $("#RespCost"+form).val();
	var CC = $("#CentreCost"+form).val();
	//var RC = $("#ResCredit"+form).val();
	var Eq1 = $('input[name=Eq1]:checked').val();
	var NumProc = $("#NProc"+form).val();

	var Obs = $("#Obs"+form).val();
	
	Horari = "";	
	n = "";
	
	var n = parseInt($("#nFrangHor"+form).val());
	for (i=1;i<eval(n+2);i++)
	{
		if (($("#FechaFranjHor"+form+i).val())||($("#DesdeFranjHor"+form+i).val())||($("#HastaFranjHor"+form+i).val()))
		Horari = Horari + "#" + $("#FechaFranjHor"+form+i).val() + "|" + $("#DesdeFranjHor"+form+i).val() + "|" + $("#HastaFranjHor"+form+i).val()+"|"+i;
	}
	
	if (ValidaReservaEspais(CC,NumProc,Eq1,Horari))
		$.post("PHPForm/ReservaEspaisGuarda.php",{CC:CC,Eq1:Eq1,Horari:Horari,NumProc:NumProc,Obs:Obs},LlegadaGuardaReservaEspais);	
}

function LlegadaGuardaReservaEspais(data) 
{
	if (data)
	{
		alert("Reserva cursada correctament. Pot veure l'estat de la seva reserva al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaReservaEspais();
	}else alert("Hi ha hagut algun error, possi's en contacte amb el servei d'estabulari");
}