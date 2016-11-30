function MostraSolicitutEspai()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa7").fadeIn("slow");
		InicialitzaSolicitutEspai('SolicitutEspai');
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}

function InicialitzaSolicitutEspai(form)
{
	NumProcCarregaSelect(form);
	CarregaSelectProjecte(form);

	$("#Obs"+form).val("");

	$("#RespCost"+form).val("");
	$("#CentreCost"+form).val("");
	$("#ResCredit"+form).val("");
	$("#NumProc"+form).val("");
	$("#FechaLlegada"+form).val("");
	
	CarregaSelectProveidor("Procedencia"+form,"3");	
	DefineCalendario("FechaLlegada"+form);
	
	$("#RowActual").val(0);
	$("#tableSolicitutEspai tr").remove();
	CreaFilaSolicitutEspai(0, 'SolicitutEspai');
}
function TancaSolicitutEspai()
{
	$("#DIVFitxa7").fadeOut("slow");
}

function SeleccionaEspecieSolicitutEspai(id,form)
{
	if ((id==1)&&($("#RowActual").val()>0))
	{
		var r = eval(parseInt($("#RowActual").val())+1);
		for (i=2;i< r;i++)
		{
			//alert("#auxImpoExpo"+i+form);
			$("#auxEspecie"+i+form).val($("#Especie1" + form + " option[value='"+$("#Especie1"+form).val()+"']").text());
			$('#Especie'+i + form).val($("#Especie1" + form).val());
			OmpleCepas(i,form);
		}
		
	}

	OmpleCepas(id,form);
	CreaFilaSolicitutEspai(id,form);
}


function CreaFilaSolicitutEspai(id, form)
{
	var idV = id;
	if (id>=$("#RowActual").val())
	{
		
		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
	
		var cadenaTD = MostraTDSolicitutEspai(id,form);
		
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
		
//		OmpleEspecies(id,form);
//		OmpleCepas(idV,form);
		$("#Sexo"+id+form).html(SelectSexo());
		$("#SemGram"+id+form).html(SelectSP());
	
		$("#RowActual").val(id)	
	}
}

function MostraTDSolicitutEspai(id,form)
{
	if (id != "1")
	{
		especie =  ''+			
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" class="fuenteForm" id="auxEspecie'+id+form+'" value="'+$("#Especie1"+form+" option[value='"+$("#Especie1"+form).val()+"']").text()+'" readonly="readonly">'+
			'</select>'+
            '</td>';
		cepa = '<input type="hidden" id="Especie'+id + form+'" value = "'+$("#Especie1"+form).val()+'">'+
				'<select id="Cepa'+id + form+'"  onchange="CreaFilaSolicitutEspai(\''+id+'\',\''+form+'\');" class="fuenteForm"></select>';
	}
	else 
	{
		especie =  ''+		
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie'+id + form+'" onchange="SeleccionaEspecieSolicitutEspai(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>';	
		cepa = '<select id="Cepa'+id + form+'" class="fuenteForm"></select>';
	}

	
	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td class="fuenteFormTitol" colspan="4" align="left">Bloc '+id+'</td>'+
		'</tr>'+
		'<tr>'+especie+
        	'<td align="left" width="120px">Soca</td>'+
            '<td align="left">'+cepa+'</select>'+
            '</td>'+
        '</tr>'+
       	'<tr>'+
        	'<td align="left">Sexe</td>'+
            '<td align="left"><select id="Sexo'+id + form+'"  class="fuenteForm"/></select></td>'+
        	'<td align="left">N&ordm; animals</td>'+
            '<td align="left"><input type="text" id="NumAnimales'+id + form+'" class="fuenteForm"/></td>'+
        '</tr>'+
       	'<tr>'+
        	'<td align="left">Edat/Pes</td>'+
            '<td align="left">'+
            	'<input type="text" id="Edad'+id +form+'"  class="fuenteForm" style="width:50px">'+
            	'<select id="SemGram'+id +form+'" class="fuenteForm"/></select>'+
            '</td>'+
        	'<td align="left">N&deg; animals per g&agrave;bia</td>'+
            '<td align="left"><input type="text" id="AnimJaula'+id + form+'" class="fuenteForm"/></td>'+
        '</tr>'+
 '</table>';
}


function GuardaSolicitutEspais(form)
{
	var aux, n;
	
	var Resp = $("#RespCost"+form).val();
	var CC = $("#CentreCost"+form).val();
	var RC = $("#ResCredit"+form).val();
	var NumProc = $("#NProc"+form).val();

	var Procedencia = $("#Procedencia"+form).val();
	var FechaLlegada = $("#FechaLlegada"+form).val();
	
	aux = "";	
	n = "";

	var Obs = $("#Obs"+form).val();

	var n = parseInt ($("#RowActual").val());

	for (i=1;i<eval(n+1);i++)
	{
		if(($('#Cepa'+i+ form).val())||($("#Sexo"+i+form).val())||($("#NumAnimales"+i+form).val())||($("#Edad"+i+form).val())||($("#AnimJaula"+i+form).val()))
		
		aux = aux + "#" + $('#Especie'+i+ form).val() + "|" + $('#Cepa'+i+ form).val() + "|" + $("#Sexo"+i+form).val() + "|" + $("#NumAnimales"+i+form).val() + "|" + $("#Edad"+i+form).val() + "|" + $("#SemGram"+i+form).val() + "|" + $("#AnimJaula"+i+form).val() + "|" + i;
	}
	
	if (ValidaSolicitutEspais(CC,NumProc,aux,Procedencia,FechaLlegada))
	{
		$.post("PHPForm/"+form+"Guarda.php",{NumProc:NumProc,Resp:Resp,CC:CC,RC:RC,aux:aux,Procedencia:Procedencia,FechaLlegada:FechaLlegada,Obs:Obs},LlegadaGuardaSolicitutEspais);	
	}
}

function LlegadaGuardaSolicitutEspais(data)
{
	//alert(data);
	alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
	$("#DIVFitxa7").fadeOut("slow");
}

function ValidaSolicitutEspais(CC,NumProc,aux,Procedencia,FechaLlegada)
{
	var z = 0;
	var buit = 0;
	
	var error = ValidaDadesEcon(CC,NumProc);
	
	//alert("Procedencia"+Procedencia);
	
	if ((!Procedencia)||(Procedencia == 0)) alert("Has de seleccionar la proced"+ String.fromCharCode(232) +"ncia dels animals");
	if (!FechaLlegada) alert("Has de seleccionar la data d'arribada");

	if((!CC)||(!NumProc)||(!Procedencia)||(!FechaLlegada)||(NumProc == 0)) error = false;
	
	if ((FechaLlegada)&&!FechaFutura(FechaLlegada)){alert("La data d'arribada ha de ser superior a l\'actual");error = false;}
	
	var v = aux.split("#");
	//console.log("length:"+v.length);
	
	for (i=1;i<v.length;i++)
	{	
		//console.log(i+":");	
		//console.log(v[i]);	
			
		var c = v[i].split("|");	
	
		if (!c[0]) 
		{
			alert("Has de seleccionar una esp"+ String.fromCharCode(232) +"cie al bloc " +  c[7]  + " d' animals que s'han d' importar"); 	
			error = false;
		}
		if (!c[1]) 
		{
			alert("Has de seleccionar una soca al bloc " +  c[7]  + " d' animals que s'han d' importar"); 	
			error = false;
		}
		if (!c[2]) 
		{
			alert("Has de seleccionar el sexe al bloc " +  c[7] ); 	
			error = false;
		}
		if (!c[3]) 
		{
			alert("Has d' inidicar el n"+String.fromCharCode(250)+"mero d' animals al bloc " +  c[7] ); 	
			error = false;
		}
		else if (c[3] == "0")
		{
			alert("El n"+String.fromCharCode(250)+"mero d'animals al bloc " +  c[7] +" ha de ser superior a 0");
			error = false;
		}
		if ((c[3])&&!ValidaEnteroRegExp(c[3]))
		{
			alert("El n"+String.fromCharCode(250)+"mero d'animals al bloc " +  c[7] +" ha de ser un n"+String.fromCharCode(250)+"mero enter");
			error = false;
		}
		if (!c[4])
		{
			alert("Has d' indicar una edat o un pes al bloc " +  c[7] ); 	
			error = false;
		}
		else if (c[4] == "0")
		{
			alert("La edat/pes al bloc " +  c[7] +" ha de ser superior a 0");
			error = false;
		}
		if ((c[4])&&!ValidaEnteroRegExp(c[4]))
		{
			alert("La edat/pes al bloc " + c[7] + " ha de ser un n"+String.fromCharCode(250)+"mero enter");
			error = false;
		} 
		if (!c[6])
		{
			alert("Has d' indicar el n"+String.fromCharCode(250)+"mero d'animals per g"+String.fromCharCode(224)+"bia al bloc " + c[7] );
			error = false;
		}
		else if (c[6] == "0")
		{
			alert("El n"+String.fromCharCode(250)+"mero d'animals per g"+String.fromCharCode(224)+"bia al bloc " +  c[7] +" ha de ser superior a 0");
			error = false;
		}
		if ((c[6])&&!ValidaEnteroRegExp(c[6]))
		{
			alert("El n"+String.fromCharCode(250)+"mero d'animals per g"+String.fromCharCode(224)+"bia al bloc " +  c[7] + " ha de ser un n"+String.fromCharCode(250)+"mero enter");
			error = false;
		} 
		if (parseInt(c[3])<parseInt(c[6]))
		{
			////console.log(parseInt(c[3])+"<"+parseInt(c[6]))
			alert("El  n"+String.fromCharCode(250)+"mero d' animals al bloc " +  c[7] + " ha de ser major o igual al n"+String.fromCharCode(250)+"mero d'animals per g"+String.fromCharCode(224)+"bia");
			error = false;	
		} 	
		
//				if ((c[z+1])&&((!c[z+2])||(!c[z+3])||(!c[z+4])||(!c[z+5])||(!c[z+7]))) error = false;	
		if ((c[1])&&((!c[2])||(!c[3])||(!c[4])||(!c[6]))) error = false;	
		
		buit ++;
	}
	
	if (buit<1)
	{	
		alert("Has de triar com a m"+String.fromCharCode(237)+"nim un bloc d'animals que arribaran");	
		error = false;
	}

	
	return error;
}
