function MostraImpoExpo()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa62").hide();
		$("#DIVFitxa63").hide();
		$("#DIVFitxa6").fadeIn("slow");
		$("#DIVFitxa61").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}

function MostraImpo()
{
	$("#DIVFitxa61").fadeOut(1000);
	$("#DIVFitxa62").delay(1001).fadeIn(1000);
	InicializaImpoExpo('Impo');}

function MostraExpo()
{
	$("#DIVFitxa61").fadeOut(1000);
	$("#DIVFitxa63").delay(1001).fadeIn(1000);
	InicializaImpoExpo('Expo');
}

function InicializaImpoExpo(form)
{
	NumProcCarregaSelect(form);
	CarregaSelectProjecte(form);

	$("#Obs"+form).val("");
	
	$("#RespCost"+form).val("");
	$("#CentreCost"+form).val("");
	$("#ResCredit"+form).val("");
	$("#NumProc"+form).val("");
	
	$("#NomCentre"+form).val("");
	$("#DirCentre"+form).val("");
	$("#PaisCentre"+form).val("");
	$("#PersCentre"+form).val("");
	$("#TelCentre"+form).val("");
	$("#EmailCentre"+form).val("");

	$("#RowActual").val(0);
	$("#table"+form+" tr").remove();
	CreaFilaImpo(0,form);
	
	if (form== "Expo") $("#NReg"+form).val("");

}



function TancaImpoExpo()
{
	$("#DIVFitxa6").fadeOut("slow");
}


function SeleccionaEspecieImpoExpo(id,form)
{
	if ((id==1)&&($("#RowActual").val()>0))
	{
		var r = eval(parseInt($("#RowActual").val())+1);
		for (i=2;i< r;i++)
		{
			//alert("#auxImpoExpo"+i+form);
			$("#auxImpoExpo"+i+form).val($("#Especie1" + form + " option[value='"+$("#Especie1"+form).val()+"']").text());
			$('#Especie'+i + form).val($("#Especie1" + form).val());
			OmpleCepas(i,form);
		}
		
	}

	OmpleCepas(id,form);
	CreaFilaImpo(id,form);
}


function CreaFilaImpo(id, form)
{
	var idV = id;
	if (id>=$("#RowActual").val())
	{
		
		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		if (form == "Impo")
		{
			var cadenaTD = MostraTDImpo(id,form);
		}
		else
		{
			var cadenaTD = MostraTDExpo(id,form);
		}
		
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
		
		OmpleEspecies(id,form);
		if (id != "1")OmpleCepas(id,form);

		
		if (form == "Expo")
		{
			DefineCalendario("Fecha"+id+form);
			$("#Sexo"+id+form).html(SelectSexo());
		}else{
			document.getElementById("PlusImpoButton").onclick = function (){CreaFilaImpo(id, form);}
		}
		
		OmpleEspecies(id,form);
		$("#RowActual").val(id)	
		
	}
}



function MostraTDImpo(id, form)
{
	if (id == 1) var imp = '<font class="ast">*</font>';	
	else var imp = '';	

	return''+
			'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
             '   <tr>'+
              '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+imp+'</td>'+
               ' </tr>'+
                '<tr>'+
                 '  <td align="left">'+ MostraTDImpoI(id,form)+'</td>'+
                  ' <td align="left">'+ MostraTDImpoD(id,form) +'</td>'+
                '</tr>'+
            '</table>';
}

function MostraTDImpoI(id,form)
{
	if (id == 0) var imp = '<font class="ast">*</font>';	
	else var imp = '';	
	
	if (id != "1")
	{


		
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" class="fuenteForm" id="auxImpoExpo'+id+form+'" value="'+$("#Especie1"+form+" option[value='"+$("#Especie1"+form).val()+"']").text()+'" readonly="readonly">'+
            '</td>'+
        '</tr>';
		cepa = 	'<input type="hidden" id="Especie'+id + form+'" value = "'+$("#Especie1"+form).val()+'">'+
				'<input type="text" id="NombreCepa'+id + form+'">'
				//'<select id="Cepa'+id + form+'"  onchange="CreaFilaImpo(\''+id+'\',\''+form+'\');" class="fuenteForm"></select>';
	}
	else 
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie'+id + form+'" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		cepa = '<input type="text" id="NombreCepa'+id + form+'">';
	}


	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	especie+
    	'<tr>'+
        	'<td align="left">Soca</td>'+
            '<td>'+cepa+'</td>'+
        '</tr>'+
    '</table>';
}

function MostraTDImpoD(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left">Quantitat mascles</td>'+
            '<td align="left"><input type="text" id="CantidadMachos'+id + form+'"  class="fuenteForm"/></td>'+
        '</tr>'+
    	'<tr>'+
        	'<td align="left">Quantitat femelles</td>'+
            '<td align="left"><input type="text" id="CantidadHembras'+id + form+'" class="fuenteForm"/></td>'+
        '</tr>'+
    '</table>';
}




function MostraTDExpo(id, form)
{
	if (id == 1) var imp = '<font class="ast">*</font>';	
	else var imp = '';	

	return''+
			'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
             '   <tr>'+
              '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+imp+'</td>'+
               ' </tr>'+
                '<tr>'+
                 '  <td align="left">'+ MostraTDExpo1(id,form)+'</td>'+
                '</tr>'+
                '<tr>'+
                 '  <td align="left">'+ MostraTDExpo2(id,form)+'</td>'+
                '</tr>'+
            '</table>';
}

function MostraTDExpo1(id,form)
{
	if (id == 0) var imp = '<font class="ast">*</font>';	
	else var imp = '';	

	if (id != "1")
	{
		especie =  ''+		
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left">'+
				'<input type="text" id="auxImpoExpo'+id+form+'" class="fuenteForm" value="'+$("#Especie1"+form+" option[value='"+$("#Especie1"+form).val()+"']").text()+'" readonly="readonly" style="width:70px;">'+
			'</select>'+
            '</td>';
		cepa = '<input type="hidden" id="Especie'+id + form+'" value = "'+$("#Especie1"+form).val()+'">'+
				'<select id="Cepa'+id + form+'"  onchange="CreaFilaImpo(\''+id+'\',\''+form+'\');" class="fuenteForm"></select>';
	}
	else 
	{
		especie =  ''+		
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left">'+
				'<select id="Especie'+id + form+'" onchange="SeleccionaEspecieImpoExpo(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>';
		cepa = '<select id="Cepa'+id + form+'" class="fuenteForm"></select>';
	}



	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
			especie+
			'<td align="left">Soca</td>'+
            '<td align="left">'+ cepa +'</td>'+
        	'<td align="left">Genotip</td>'+
            '<td align="left"><input type="text" id="Genotipo'+id + form+'" class="fuenteForm" style="width:55px">'+
            '</td>'+
        '</tr>'+
		'<tr>'+        	
        	'<td align="left">Animal ID</td>'+
            '<td align="left"><input type="text" id="Identificacion'+id + form+'" class="fuenteForm" style="width:65px" onKeyPress="ModificaQuantitatExpo('+id+',\''+form+'\')" >'+
				'<input type="hidden" id="Marcaje'+id + form+'" class="fuenteForm">'+
			'</td>'+        
        	'<td align="left">Sala</td>'+
            '<td align="left"><select type="text" id="Sala'+id + form+'" class="fuenteForm" style="width:105px">'+SelectSalas()+'</select>'+
        	'<td align="left">Sexe</td>'+
            '<td align="left">'+
			'	<select id="Sexo'+id + form+'" class="fuenteForm">'+
            '	<select/>'+
            '</td>'+
        '</tr>'+
    '</table>';
}

function MostraTDExpo2(id,form)
{
	if (id == 0) var imp = '<font class="ast">*</font>';	
	else var imp = '';	

	return '' +
	'<table width="100%" cellspacing="0" border="0">'+
		'<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="Cantidad'+id + form+'" class="fuenteForm" style="width:80px;" onKeyPress="ModificaRatonIDExpo('+id+',\''+form+'\')"  >'+
        	'<td align="left">Data Naixement / Arribada</td>'+
            '<td align="left"><input type="text" id="Fecha'+id+form+'" class="fuenteForm" style="width:80px;" readonly="readonly" ></td>'+
        '</tr>'+
    '</table>';
}

function GuardaImpoExpo(form)
{
	var aux, n;
	
	//var Resp = $("#RespCost"+form).val();
	var CC = $("#CentreCost"+form).val();
	//var RC = $("#ResCredit"+form).val();
	var NumProc = $("#NProc"+form).val();

	var NomCentre = $("#NomCentre"+form).val();
	var DirCentre = $("#DirCentre"+form).val();
	var PaisCentre = $("#PaisCentre"+form).val();
	var PersCentre = $("#PersCentre"+form).val();
	var TelCentre = $("#TelCentre"+form).val();
		TelCentre = TelCentre.replace(/ /gi,"");
	var EmailCentre = $("#EmailCentre"+form).val();

	var Obs = $("#Obs"+form).val();
	
//	aux = "";	
//	n = "";
//
//	var n = parseInt ($("#RowActual").val());
//	aux = n;
	
	aux = "";	
//	n = "";
	
	var n = parseInt ($("#RowActual").val())+1;
//	aux = n;
	if (form == "Impo") 
	{
		NReg = "";
		for (i=1;i<n;i++)
		{	
			//console.log("("+$('#NombreCepa'+i+ form).val()+")&&(("+$("#CantidadMachos"+i+form).val()+")||("+$("#CantidadHembras"+i+form).val()+"))");		
			if (($('#NombreCepa'+i+ form).val())&&(($("#CantidadMachos"+i+form).val())||($("#CantidadHembras"+i+form).val())))
			//console.log("antes",aux);
			aux = aux + "#" + $('#Especie'+i+ form).val() + "|" +  $('#NombreCepa'+i+ form).val() + "|" + $("#CantidadMachos"+i+form).val() + "|" + $("#CantidadHembras"+i+form).val()+"|"+i;
			//console.log("despues",aux);

			//alert("i:"+i);
		}
	}else
	{
		NReg = $("#NReg"+form).val();
		
		for (i=1;i<n;i++)
		{
			if(($('#Cepa'+i+ form).val())||($("#Genotipo"+i+form).val())||($("#Marcaje"+i+form).val())||($("#Identificacion"+i+form).val())||($("#Sexo"+i+form).val())||($("#Cantidad"+i+form).val() )||($("#Fecha"+i+form).val()))	
		
			//alert(($('#Cepa'+i+ form).val())+"|"+($("#Genotipo"+i+form).val())+"|"+($("#Marcaje"+i+form).val() + "|" + $("#Identificacion"+i+form).val() + "|" + $("#Sala"+i+form).val() + "|" + $("#Sexo"+i+form).val() + "|" + $("#Cantidad"+i+form).val() + "|" + $("#Fecha"+i+form).val()));
			
			aux = aux + "#" + $('#Especie'+i+ form).val() + "|" + $('#Cepa'+i+ form).val() + "|" + $("#Genotipo"+i+form).val() + "|" + $("#Marcaje"+i+form).val() + "|" + $("#Identificacion"+i+form).val() + "|" + $("#Sala"+i+form).val() + "|" + $("#Sexo"+i+form).val() + "|" + $("#Cantidad"+i+form).val() + "|" + $("#Fecha"+i+form).val()+"|"+i;
		}
	
	}
	
	if (ValidaImpoExpo(CC,NumProc,aux,NomCentre,DirCentre,PaisCentre,PersCentre,TelCentre,EmailCentre,form))
	{
		//console.log(aux);
		//alert("entro");
		$.post("PHPForm/"+form+"Guarda.php",{NumProc:NumProc,CC:CC,aux:aux,NomCentre:NomCentre,DirCentre:DirCentre,PaisCentre:PaisCentre,PersCentre:PersCentre,TelCentre:TelCentre,EmailCentre:EmailCentre,NReg:NReg,Obs:Obs},LlegadaGuardaImpoExpo);	
	}
}

function LlegadaGuardaImpoExpo(data)
{
	//alert(data);
	
	alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
	$("#DIVFitxa6").fadeOut("slow");

}

function ValidaImpoExpo(CC,NumProc,aux,NomCentre,DirCentre,PaisCentre,PersCentre,TelCentre,EmailCentre,form)
{
	var z = 0;
	buit = 0;
	
	var error = ValidaDadesEcon(CC,NumProc);

	if (form == "Impo")
	{
		var v = aux.split("#");
		//alert("length:"+v.length);
		for (i=1;i<v.length;i++)
		{	
			var c = v[i].split("|");
			//alert("c[4]:"+c[4]);
		
			if (!c[0]) alert("Has de seleccionar una esp"+String.fromCharCode(232)+"cie al bloc " + c[4] +" d' animals que s'han d' importar"); 	
			if ((c[0])&&(!c[1])){ alert("Has de seleccionar una soca al bloc " + c[4] +" d' animals que s'han d' importar"); error = false;}	
			//if ((c[z+1])&&(!c[z+3])) alert("Has de seleccionar una quantitat de mascles al bloc " + eval(i+1)); 	
			if ((c[0])&&(c[2])&&!ValidaEnteroRegExp(c[2]))
			{
				alert("La quantitat de mascles al bloc " + c[4] +" ha de ser un n"+String.fromCharCode(250)+"mero enter");
				error = false;
			} 
			//if ((c[z+1])&&(!c[z+4])) alert("Has de seleccionar una quantitat de femelles al bloc " + eval(i+1)); 	
			if ((c[0])&&(c[3])&&!ValidaEnteroRegExp(c[3]))
			{
				alert("La quantitat de femelles al bloc " + c[4] +" ha de ser un n"+String.fromCharCode(250)+"mero enter");
				error = false;
			} 
			if (((!c[2])&&(!c[3]))||((c[2]=="0")&&(!c[3]))||((!c[2])&&(c[3]=="0"))||((c[2]=="0")&&(c[3]=="0")))
			{	alert("Has de triar una quantitat de mascles o femelles per importar al bloc " + c[4]);error=false;}
			buit ++;
		}
		if (buit<1)
		{
			alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim un animal per a importar");	
			error = false;
		}
	}
	else
	{
		var v = aux.split("#");
		//alert("length:"+v.length);
		for (i=1;i<v.length;i++)
		{	
			var c = v[i].split("|");
					
			if (!c[0]) alert("Has de seleccionar una esp"+String.fromCharCode(232)+"cie al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			if ((c[0])&&(!c[1])) alert("Has de seleccionar una soca al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			//if ((c[0])&&(!c[2])) alert("Has de seleccionar un genotip al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			//if ((c[0])&&(!c[3])) alert("Has de seleccionar un marcatge al bloc " + i +" d' animals que s'han d' exportar"); 	
			//if ((c[0])&&(!c[4])) alert("Has de seleccionar una identificaci"+String.fromCharCode(243)+" al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			//if ((c[0])&&(!c[5])) alert("Has de seleccionar una sala al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			if ((c[0])&&(!c[6])) alert("Has de seleccionar un sexe al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			if ((c[0])&&(!c[7])) alert("Has de seleccionar una quantitat al bloc " + c[9] +" d' animals que s'han d' exportar"); 	
			if ((c[0])&&(c[7])&&!ValidaEnteroRegExp(c[7]))
			{
				alert("La quantitat al bloc " + c[9] +" ha de ser un n"+String.fromCharCode(250)+"mero enter");
				error = false;
			} 
			if ((c[0])&&(!c[8])) alert("Has de seleccionar una data de naixement/ arribada al bloc " + c[9] +" d' animals que s'han d' exportar");					
			//if ((c[8])&&(!FechaFutura(c[8]))){alert("La data de naixement al bloc " + c[9] +" d' animals que s'han d' exportar ha de ser superior a l\'actual");error = false;} 	
			
			if ((c[0])&&((!c[1])||(!c[6])||(!c[7])||(!c[8]))) error = false;	
			
			buit ++;
		}
		if (buit<1)
		{
			alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim un animal per a exportar");	
			error = false;
		}
	}
	
	if (!NomCentre) alert("Has d' indicar el nom del centre");
	if (NomCentre && !ValidaSoloLetraGeneral(NomCentre)){alert("Nom"+String.fromCharCode(233)+"s pots fer servir lletres al camp nom de centre");error=false;}
	
	if (!DirCentre) alert("Has d' indicar l' adre\ça del centre");
	
	if (!PaisCentre) alert("Has d' indicar el pa"+String.fromCharCode(237)+"s del centre");
	if (PaisCentre && !ValidaSoloLetraGeneral(PaisCentre)){alert("Nom"+String.fromCharCode(233)+"s pots fer servir lletres al camp Pa"+String.fromCharCode(237)+"s dest"+String.fromCharCode(237)+"/origen");error=false;}
	
	if (!PersCentre) alert("Has d' indicar el nom de la persona de contacte del centre");
	if (PersCentre && !ValidaSoloLetraGeneral(PersCentre)){alert("Nom"+String.fromCharCode(233)+"s pots fer servir lletres al camp Nom de persona de contacte");error=false;}
	
	if (!TelCentre) alert("Has d' indicar el tel"+String.fromCharCode(232)+"fon del centre");
	//if (TelCentre && !ValidaTelefon(TelCentre)){error = false;}
	
	if (!EmailCentre) alert("Has d' indicar l' email del centre");
	if (EmailCentre && ValidarEmail(EmailCentre)){alert("L'email del centre no "+String.fromCharCode(233)+"s correcte");error = false;}
	
	if ((!NomCentre)||(!DirCentre)||(!PaisCentre)||(!PersCentre)||(!TelCentre)||(!EmailCentre)) error = false;
	
	return error;
}


function ModificaQuantitatExpo(id, form)
{
	$("#Cantidad"+id+form).val("1");
}

function ModificaRatonIDExpo(id, form)
{
	$("#Identificacion"+id +form).val("");
}