function MostraPetHemAc()
{
	if ($("#InOut").val()  == 1)
	{
		InicializaPetHemAc();
		$("#DIVFitxa3").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
	
}

function TancaPetHemAc()
{
	$("#DIVFitxa3").fadeOut("slow");
}

function InicializaPetHemAc()
{
	EliminaFilaPetHemAc();
	
	CreaFilaPetHemAc(0,'PetHemAc');

	NumProcCarregaSelect('PetHemAc');
	CarregaSelectProjecte('PetHemAc');

	DefineCalendario('FechaRecogidaPetHemAc');
	DefineCalendario('Fecha1PetHemAc');

	$("#RespCostPetHemAc").val("");
	$("#CentreCostPetHemAc").val("");
	$("#ResCreditPetHemAc").val("");
	$("#NumProcPetHemAc").val("");
	$("#ObsPetHemAc").val("");
	
	InicialitzaRecollida('PetHemAc');

}

function EliminaFilaPetHemAc()
{
	$("#tableanimPetHemAc tr").remove();
	$("#RowActual").val(0);
}

function SeleccionaEspeciePetHemAc(id,form)
{
	if (id=="1")
	{
		OmpleCepas(id,form);
		$('#Especie1PetHemAc').attr('disabled',true);
	}
	CreaFilaPetHemAc(id,form);
}


function CreaFilaPetHemAc(id, form)
{
	var idV = id;
	
	if (id>=$("#RowActual").val())
	{
		if (id == 0) var imp = '<font class="ast">*</font>';	
		else var imp = '';	
	
		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		var cadenaTD = ''+
				'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
				 '   <tr>'+
				  '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+imp+'</td>'+
				   ' </tr>'+
					'<tr>'+
					 '  <td align="left">'+ MostraHemAcoplI(id,form)+'</td>'+
					  ' <td align="left">'+ MostraHemAcoplD(id,form) +'</td>'+
					'</tr>'+
				'</table>';
		
	
		var elmTBODY = document.getElementById('tableanim'+form);
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
		
		
		DefineCalendario('Fecha'+id + form);
	
		$("#RowActual").val(rowAcual+1);
	//	document.getElementById('Especie'+idV + form).onchange = function (){};
	}
}

function MostraHemAcoplI(id,form)
{
	if (id != "1")
	{
		especie = '';
		cepa = '<input type="hidden" id="Especie'+id + form+'" value = "'+$("#Especie1"+form).val()+'">'+
				'<select id="Cepa'+id + form+'"  onchange="SeleccionaEspeciePetHemAc(\''+id+'\',\''+form+'\');" class="fuenteForm"></select>';
		
	}
	else 
	{
		especie =  '' +		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie'+id + form+'" onchange="SeleccionaEspeciePetHemAc(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		cepa = '<select id="Cepa'+id + form+'" class="fuenteForm"></select>';
	}

	
	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
		especie+
	  	'<tr>'+
        	'<td align="left">Soca</td>'+
            '<td align="left">'+cepa+
            '</td>'+
        '</tr>'+
    '</table>';
}


function MostraHemAcoplD(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left" width="150px" >Quantitat</td>'+
            '<td align="left"><input type="text" id="Cantidad'+id + form+'"  class="fuenteForm"/></td>'+
        '</tr>'+
    	'<tr>'+
        	'<td align="left">Data d\' acoblament</td>'+
            '<td align="left"><input type="text" id="Fecha'+id + form+'" class="fuenteForm"  style="width:115px" readonly="readonly"/></td>'+
        '</tr>'+
    '</table>';
}	



function GuardaPetHemAc(form)
{
	//var Resp = $("#RespCost"+form).val();
	var CC = $("#CentreCost"+form).val();
	//var RC = $("#ResCredit"+form).val();
	var NumProc = $("#NProc"+form).val();
	var FR = $("#FechaRecogida"+form).val();
	var HR = $("#HoraRecogida"+form).val();
	//var LR = $('input[name=RecogidaRadio'+form+']:checked').val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();

	var Obs = $("#Obs"+form).val();	
	
	var n = parseInt ($("#RowActual").val());
	
	var aux = n;
	for (i=1;i<n;i++)
	{
		//alert("Sexo" + i + ": "+$('input[name=Sexo'+i+form+']:checked').val());
		aux = aux + "|" + $("#Especie"+i+form).val() + "|" + $("#Cepa"+i+form).val() + "|" + $("#Cantidad"+i+form).val() + "|" + $("#Fecha"+i+form).val();
	}
	
	if (ValidaPetHemAc(CC,NumProc,FR,HR,VM,Sacrifici,aux))
	{
		$.post("PHPForm/PetHemAcGuarda.php",{CC:CC,FR:FR,HR:HR,VM:VM,Sacrifici:Sacrifici,aux:aux,NumProc:NumProc,Obs:Obs},LlegadaGuardaPetHemAc);	
	}
}

function LlegadaGuardaPetHemAc(data)
{
	if (data)
	{
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaPetHemAc();
	}
}

function ValidaPetHemAc(CC,NumProc,FR,HR,VM,Sacrifici,aux)
{
	var z = 0;

	var error = ValidaDadesEcon(CC,NumProc);
	if (error) error = ValidaRecollida(FR,HR,1,VM,Sacrifici);

	if ( String(aux).length == 1){
		 alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim una esp"+String.fromCharCode(232)+"cie");
		 error = false;
		 }
	else
	{
		var c = aux.split("|");
		for (i=0;i<c[0];i++)
		{			 
			z = i*4;
			
			if ((c[z+1])&&(!c[z+2]))
			{
				alert("Has de seleccionar una soca en el bloc " + eval(i+1)); 
				error = false;
			}
			if ((c[z+1])&&(!c[z+3]))
			{	
				alert("Has d' indicar una quantitat al bloc " + eval(i+1)); 
				error = false;
			}
			if (c[z+1])
			{
				if (!ValidaEnteroRegExp(c[z+3]))
				{
					alert("La quantitat al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
					error = false;
				} 
			}
			if ((c[z+1])&&(!c[z+4]))
			{ 
				alert("Has de seleccionar la data d' acoblament al bloc " + eval(i+1));	
				error = false;
			}
			
			//alert("Fecha Futura:" +FechaFutura(c[z+4]) );
			if ((c[z+1])&&!FechaFutura(c[z+4]))
			{
				alert ("La data d'acoblament del bloc " + eval(i+1)+ " ha de ser posterior a la data indicada");
				error = false;
			}
			
			//alert("Resta Fechas: "+ RestaFechas(FR,c[z+4]));
			if ((c[z+1])&&!RestaFechas(FR,c[z+4])) 
			{
				alert ("La data d'acoblament del bloc " + eval(i+1)+ " " + String.fromCharCode(233) +"s posterior a la data de recollida / utilitcaci"+ String.fromCharCode(243));
				error = false;
			}
			
			if ((c[z+1])&&((!c[z+2])||(!c[z+3])||(!c[z+4]))) error = false;	
		}
	}
	return error;
}