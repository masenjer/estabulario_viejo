function MostraCompra()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa42").hide();
		$("#DIVFitxa43").hide();
		$("#DIVFitxa44").hide();
		$("#DIVFitxa4").fadeIn("slow");
		$("#DIVFitxa41").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");			
}

function MostraCompraAnim()
{
	InicializaCompraAnim();
	$("#DIVFitxa41").fadeOut(1000);
	$("#DIVFitxa42").delay(1001).fadeIn(1000);
}

function InicializaCompraAnim()
{
	EliminaFilaCompraAnim();
	
	CreaFilaCompraAnim(0,'CompraAnim');

	NumProcCarregaSelect('CompraAnim');
	CarregaSelectProjecte('CompraAnim');

	DefineCalendario('FechaRecogidaCompraAnim');

	$("#RespCostCompraAnim").val("");
	$("#CentreCostCompraAnim").val("");
	$("#ResCreditCompraAnim").val("");
	$("#NumProcCompraAnim").val("");
	$("#ObsCompraAnim").val("");
	
	InicialitzaRecollida('CompraAnim');

}

function EliminaFilaCompraAnim()
{
	//alert("rowAcual:"+rowAcual+", tabla:"+tabla);
	$("#tableanimCompraAnim tr").remove();
	$("#RowActual").val(0);
}

function TancaCompra()
{
	$("#DIVFitxa4").fadeOut("slow");
}

function SeleccionaEspecieCompraAnim(id,form)
{
	if (id=="1")
	{
		OmpleCepas(id,form);
		$('#Especie1'+form).attr('disabled',true);
	}
	CreaFilaCompraAnim(id,form);
}


function CreaFilaCompraAnim(id, form)
{
	var idV = id;
	if (id>=$("#RowActual").val())
	{
		if (id == 0) var imp = '<font class="ast">*</font>';	
		else var imp = '';	
		
		if (id > 1)
		{
			//Selecciona el proveidor
			CarregaProveidorsCepaSeleccionada(id,form);
		}
		
		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		var cadenaTD = ''+
				'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
				 '   <tr>'+
				  '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+imp+'</td>'+
				   ' </tr>'+
					'<tr valign="top">'+
					 '  <td align="left">'+ MostraCompraAnimSI(id,form)+'</td>'+
					  ' <td align="left">'+ MostraCompraAnimSD(id,form) +'</td>'+
					'</tr>'+
					'<tr>'+
					 '  <td align="left">'+ MostraCompraAnimII(id,form)+'</td>'+
					  ' <td align="left">'+ MostraCompraAnimID(id,form) +'</td>'+
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
		
		$("#SemGramM"+id+form).html(SelectSP());
		$("#SemGramF"+id+form).html(SelectSP());
		
		CarregaSelectProveidor("ProvHab"+id + form,"3");
		//CarregaSelectProveidor("ProvTrans"+id + form,"1");
		
		$("#RowActual").val(rowAcual+1);
	}
}

function MostraCompraAnimSI(id,form)
{
	if (id != "1")
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" class="fuenteForm" value="'+$("#Especie1"+form+" option[value='"+$("#Especie1"+form).val()+"']").text()+'" readonly="readonly">'+
			'</select>'+
            '</td>'+
        '</tr>';
		cepa = '<input type="hidden" id="Especie'+id + form+'" value = "'+$("#Especie1"+form).val()+'">'+
				'<select id="Cepa'+id + form+'"  onchange="CreaFilaCompraAnim(\''+id+'\',\''+form+'\');" class="fuenteForm"></select>';
	}
	else 
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<select id="Especie'+id + form+'" onchange="SeleccionaEspecieCompraAnim(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		cepa = '<select id="Cepa'+id + form+'" class="fuenteForm" onchange="CarregaProveidorsCepaSeleccionada(\''+id+'\',\''+form+'\')"></select>';
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
function MostraCompraAnimSD(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left">Prove&iuml;dor</td>'+
            '<td align="left"><select id="ProvHab'+id + form+'" class="fuenteForm" disabled></select>'+
            '</td>'+
        '</tr>'+
    '</table>';
}

function MostraCompraAnimII(id,form)
{	
	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
		'<tr>'+
        	'<td><b>Mascles</b></td>'+
        '</tr>'+
        '<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="CantidadM'+id + form+'"  class="fuenteForm"/></td>'+
        '</tr>'+
    	'<tr>'+
        	'<td align="left">Edat/Pes<font class="astV">*</font></td>'+
           ' <td align="left">'+
            	'<input type="text" id="EdadM'+id+form+'"  class="fuenteForm" style="width:50px">'+
            	'<select id="SemGramM'+id+form+'" class="fuenteForm"/>'+
              '  </select>'+
            '</td>'+
        '</tr>'+
    '</table>';
}
function MostraCompraAnimID(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
        '<tr>'+
        	'<td><b>Femelles</b></td>'+
        '</tr>'+
        '<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="CantidadF'+id + form+'"  class="fuenteForm"/></td>'+
        '</tr>'+
    	'<tr>'+
        	'<td align="left">Edat/Pes<font class="astV">*</font></td>'+
           ' <td align="left">'+
            	'<input type="text" id="EdadF'+id+form+'"  class="fuenteForm" style="width:50px">'+
            	'<select id="SemGramF'+id+form+'" class="fuenteForm"/>'+
              '  </select>'+
            '</td>'+
        '</tr>'+
    '</table>';
}

function CarregaProveidorsCepaSeleccionada(id,form)
{
	var idS = $("#Cepa"+id + form).val();

	$.get("PHPForm/CarregaProveidorsCepaSeleccionada.php",{idS:idS,id:id,form:form},LlegadaCarregaProveidorsCepaSeleccionada);	
}

function LlegadaCarregaProveidorsCepaSeleccionada(data)
{
	var cadena = data.split("|");
	$("#ProvHab"+cadena[0]).html(cadena[1]);
}



function GuardaCompraAnim(form)
{
	var prov;
	
	var CC = $("#CentreCost"+form).val();
	var NumProc = $("#NProc"+form).val();
	var FR = $("#FechaRecogida"+form).val();
	var HR = $("#HoraRecogida"+form).val();
	var LR = $('input[name=RecogidaRadio'+form+']:checked').val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();

	var Obs = $("#Obs"+form).val();
	
	var n = parseInt ($("#RowActual").val());
	
	var aux = n;
	for (i=1;i<n;i++)
	{
		if ($("#ProvHab"+i+form).val() == 0) prov = $("#ProvTrans"+i+form).val();
		else prov = $("#ProvHab"+i+form).val() ;
		
		if ($("#CantidadM"+i+form).val()=="0")$("#CantidadM"+i+form).val("");
		if ($("#CantidadF"+i+form).val()=="0")$("#CantidadF"+i+form).val("");
		if ($("#EdadM"+i+form).val()=="0")$("#EdadM"+i+form).val("");
		if ($("#EdadF"+i+form).val()=="0")$("#EdadF"+i+form).val("");
		
		//alert("Sexo" + i + ": "+$('input[name=Sexo'+i+form+']:checked').val());
		aux = aux + "|" + $("#Especie"+i+form).val() + "|" + $("#Cepa"+i+form).val() + "|" + prov + "|" + $("#CantidadM"+i+form).val() + "|" + $("#EdadM"+i+form).val() + "|" + $("#SemGramM"+i+form).val() + "|" + $("#CantidadF"+i+form).val() + "|" + $("#EdadF"+i+form).val() + "|" + $("#SemGramF"+i+form).val();
	}
	
	if (ValidaCompraAnim(CC,NumProc,FR,HR,LR,VM,Sacrifici, aux))
	{
		$.post("PHPForm/CompraAnimGuarda.php",{CC:CC,FR:FR,HR:HR,LR:LR,aux:aux,NumProc:NumProc,VM:VM,Sacrifici:Sacrifici,Obs:Obs},LlegadaGuardaCompraAnim);	
	}
}

function LlegadaGuardaCompraAnim(data)
{
	if (data)
	{
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaCompra();
	}
}

function ValidaCompraAnim(CC,NumProc,FR,HR,LR,VM,Sacrifici,aux)
{
	var z = 0;
	
	var error = ValidaDadesEcon(CC,NumProc);
	if (error) error = ValidaRecollidaPetCompra(FR,HR,LR,VM,Sacrifici);
	
		
	if ( String(aux).length == 1)
	{
		alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim una esp"+String.fromCharCode(232)+"cie");
		error = false;
	}
	else
	{
		var c = aux.split("|");
		for (i=0;i<c[0];i++)
		{			
			z = i*9;
			
			if (i==0)
			{
				if (!c[z+2])
				{
					alert("Has de triar una soca al bloc 1");
					error = false;
				}	
			}

			//if ((c[z+1])&&(!c[z+2])) alert("Has de seleccionar una soca al bloc " + eval(i+1)); 	
			if ((c[z+2])&&((!c[z+3])||(c[z+3] == 0)))
			{
				alert("Has de seleccionar un prove"+ String.fromCharCode(239) +"dor al bloc " + eval(i+1)); 	
				error = false;
			}
			
			if (
				(c[z+2])&&(
					(
						(!c[z+4])&&(!c[z+7]))
						||
						((c[z+4] == "0")&&(!c[z+7]))
						||
						((!c[z+4])&&(c[z+7]=="0"))
						||
						((c[z+4]=="0")&&(c[z+7]=="0"))
					)
				)
			{
				alert("Has d'indicar una quantitat m"+String.fromCharCode(237)+"nima d'un mascle i/o femella per demanar a la compra al bloc " + eval(i+1));
				error = false;
			}			
//			if ((c[z+2])&&(!c[z+4])) alert("Has d' indicar la quantitat de mascles al bloc " + eval(i+1)); 	
//			else if (c[z+4] == "0")
//				{
//					alert("La quantitat de mascles al bloc " + eval(i+1)+" ha de ser superior a 0");
//					error = false;
//				}

			if ((c[z+2])&&(!c[z+4])&&(c[z+5]))
			{
				alert("Has de posar una quantitat de mascles vàlida o eliminar l'edat pes al bloc " + eval(i+1)); 	
				error = false;
			}
			if ((c[z+2])&&(c[z+4])&&(!c[z+5]))
			{
				alert("Has d' indicar la edat o el pes dels mascles al bloc " + eval(i+1)); 	
				error = false;
			}
//			if ((c[z+2])&&(!c[z+7])) alert("Has d' indicar la quantitat de femelles al bloc " + eval(i+1)); 	
//			else if (c[z+7] == "0")
//				{
//					alert("La quantitat de famelles al bloc " + eval(i+1)+" ha de ser superior a 0");
//					error = false;
//				}
			if ((c[z+6])&&(!c[z+7])&&(c[z+8]))
			{
				alert("Has de posar una quantitat de femelles vàlida o eliminar l'edat pes al bloc " + eval(i+1)); 	
				error = false;
			}
			
			if ((c[z+6])&&(c[z+7])&&(!c[z+8]))
			{
				alert("Has d' indicar l' edat o el pes de les femelles al bloc " + eval(i+1)); 	
				error = false;
			}
			
			if ((c[z+2])&&(c[z+4])&&(c[z+5]=="0"))
			{
				alert("L' edat o pes dels mascles del bloc " + eval(i+1)+ " no pot ser 0");	
				error = false;
			}
			if ((c[z+5])&&(c[z+7])&&(c[z+8]=="0"))
			{
				alert("L' edat o pes de les femelles del bloc " + eval(i+1)+ " no pot ser 0");	
				error = false;
			}
			
			if ((c[z+4])&&(!ValidaEnteroRegExp(c[z+4])))
			{
				alert("La quantitat de mascles al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
				error = false;
			}
			if ((c[z+5])&&(!ValidaEnteroRegExp(c[z+5])))
			{
				alert("L' edat/pes de mascles al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
				error = false;
			}  

				
			if ((c[z+7])&&(!ValidaEnteroRegExp(c[z+7])))
			{
				alert("La quantitat de femelles al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
				error = false;
			}
			
			if ((c[z+8])&&(!ValidaEnteroRegExp(c[z+8])))
			{
				alert("L' edat/pes de femelles al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
				error = false;
			} 
			//if (((!c[z+2])||(!c[z+3])||(!c[z+4])||(!c[z+5])||(!c[z+6])||(!c[z+7])||(!c[z+8])||(!c[z+9]))) error = false;	
		}
	}
	return error;
}

function CanviProveidor (n,id)
{
	$("#"+n+id).val(0);
}	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function MostraCompraDietas()
{
	InicializaConsumibles('CompraDietas','Dietes');
	InicializaConsumibles('CompraDietas','Lecho');
	InicializaConsumibles('CompraDietas','CajaTrans');
	$("#DIVFitxa41").fadeOut(1000);
	$("#DIVFitxa43").delay(1001).fadeIn(1000);
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function MostraCompraFarmacs()
{
	InicializaConsumibles('CompraFarmacs','Farmac');
	InicializaConsumibles('CompraFarmacs','Desinfectante');
	InicializaConsumibles('CompraFarmacs','Fungible');
	$("#DIVFitxa41").fadeOut(1000);
	$("#DIVFitxa44").delay(1001).fadeIn(1000);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function InicializaConsumibles(form, op)
{
	//alert("rowAcual:"+rowAcual+", tabla:"+tabla);
	$("#table"+op+form+" tr").remove();
	$("#RowActual"+op).val(0);

	//EliminaFilaConsumible();
	NovaFilaConsumible(0, form, op)
	//CreaFilaCompraAnim(0,'CompraAnim');

	if (form == "CompraDietas") NumProcCarregaSelect(form);
	CarregaSelectProjecte(form);
	//DefineCalendario('FechaRecogidaCompraAnim');

	$("#RespCost"+form).val("");
	$("#CentreCost"+form).val("");
	$("#ResCredit"+form).val("");
	$("#NumProc"+form).val("");
	$("#FechaRecogida"+form).val("");
	$("#HoraRecogida"+form).val("");
	$("#Obs"+form).val("");	
}




function OmpleSelectConsumible(div, t)
{
	$.get("PHPForm/SelectConsumible.php",{div:div, t:t},LlegadaOmpleSelectConsumible)	
}

function LlegadaOmpleSelectConsumible(data)
{
	var cadena = data.split("|");
	
	$("#Select"+cadena[0]).html(cadena[1]);
}

function NovaFilaConsumible(id, form, op)
{
	var idV = id;
	if (id>=$("#RowActual"+op).val())
	{	
		var rowAcual = id;
			rowAcual =  parseInt(rowAcual);
		id = parseInt(id)+1;	
		
		switch (op)
		{
			case "CajaTrans":	var Titol = "Caixes";
								break;
			case "Lecho": 		var Titol = "Ja&ccedil;os";
								break;
			case "Farmac": 		var Titol = "F&agrave;rmac";
								break;
			case "Desinfectante": 		var Titol = "Desinfectant";
								break;
								
			default: 			var Titol = op;
			
		}
		

		var cadenaTD = ''+
				'<table cellpadding="5" width="100%" cellspacing="0" border="0" class="fuenteForm" >'+
				 '   <tr>'+
				  '      <td class="fuenteFormTitol" colspan="2" align="left">Bloc '+id+'</td>'+
				   ' </tr>'+
					'<tr>'+
					 '   <td align="left" colspan="2">'+Titol+' <select id="Select'+op+id+form+'" onchange="NovaFilaConsumible('+id+',\''+form+'\',\''+op+'\');" class="fuenteForm"></select>'+
					   ' </td>'+
					'</tr>'+
					'<tr>'+
					 '  <td align="left">'+ MostraConsumibleI(id,form,op)+'</td>'+
					  ' <td align="left">'+ MostraConsumibleD(id,form,op)+'</td>'+
					'</tr>'+
				'</table>';
		
		var elmTBODY = document.getElementById('table'+op+form);
		var elmTR;
		var elmTD;
		var elmText;
		
		elmTR = elmTBODY.insertRow(rowAcual);
		
		elmTD = elmTR.insertCell(0);
		elmText = document.createElement('div');
		elmText.id = "idDIV"+op+form+id;
		elmTD.appendChild(elmText);
		$("#idDIV"+op+form+id).html(cadenaTD);
		
		OmpleSelectConsumible(op+id+form,op);
		DefineCalendario("Fecha"+op+id+form);
		
		$("#RowActual"+op).val(rowAcual+1);
		//document.getElementById("Select"+op+idV+form).onchange = function (){};
	}
}

function MostraConsumibleI(id,form,op)
{
	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
        '<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="Cantidad'+op+id+form+'"  class="fuenteForm"/></td>'+
        '</tr>'+
    '</table>';
}
function MostraConsumibleD(id,form,op)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left">Data</td>'+
            '<td align="left"><input type="text" id="Fecha'+op+id+form+'" class="fuenteForm" readonly="readonly"/></td>'+
        '</tr>'+
    '</table>';
}	


function GuardaCompraConsumibles(form)
{
	var prov, t, aux;
	
	var CC = $("#CentreCost"+form).val();
	var NumProc = $("#NProc"+form).val();
	var Obs = $("#Obs"+form).val();

	switch (form)
	{
		case "CompraDietas":	t = ["Dietes","Lecho","CajaTrans"];
								f = 5;
								break;	
	
		case "CompraFarmacs":	t = ["Farmac","Desinfectante","Fungible"];
								f = 6;
								break;	
	}
	aux = "";
	
	for (j=0;j<3;j++)
	{
		n = "";
		if (j!=0) aux = aux + "#";
		
		var n = parseInt ($("#RowActual"+t[j]).val());
		aux = aux + n;
		for (i=1;i<n;i++)
		{
//			alert("Especie "+t[j]+": "+$("#Select"+t[j]+i+form).val());			
//			alert("Cantidad "+t[j]+": "+$("#Cantidad"+t[j]+i+form).val());			
//			alert("Fecha "+t[j]+": "+$("#Fecha"+t[j]+i+form).val());			
			if (($("#Select"+t[j]+i+form).val())||($("#Cantidad"+t[j]+i+form).val())||($("#Fecha"+t[j]+i+form).val()))
			{
				aux = aux + "|" + $("#Select"+t[j]+i+form).val() + "|" + $("#Cantidad"+t[j]+i+form).val() + "|" + $("#Fecha"+t[j]+i+form).val();
				
			}
		}
	}
	
	//alert(aux);
	if (ValidaConsumibles(CC,NumProc,aux,form))
	{
		//alert("entro");
		$.post("PHPForm/ConsumiblesGuarda.php",{CC:CC,aux:aux,NumProc:NumProc,f:f,Obs:Obs},LlegadaGuardaCompraConsumibles);	
	}
}

function LlegadaGuardaCompraConsumibles(data)
{
	if (data)
	{
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaCompra();
	}
}

function ValidaConsumibles(CC,NumProc,aux,form)
{
	var z = 0;
	if (form == "CompraDietas") var error = ValidaDadesEcon(CC,NumProc);
	else var error = ValidaDadesEcon(CC,99);

	//if (((NumProc == 0)||(!NumProc))&&(form != "CompraFarmacs")) alert("Has d' indicar un número de procediment");
	
	//if((!Resp)||(!CC)||(!NumProc)||(NumProc == 0)) error = false;
		
	switch (form)
	{
		case "CompraDietas":	t = ["dietes","lla"+ String.fromCharCode(231) +"os","caixes de transport"];
								f = 4;
								break;	
	
		case "CompraFarmacs":	t = ["f"+ String.fromCharCode(224) +"rmacs","fesinfectants","fungibles"];
								f = 5;
								break;	
	}	
	
	var v = aux.split("#");
	
	var raa = 0;	
	for (j=0;j<3;j++)
	{
		
		var c = v[j].split("|");
		for (i=0;i<c[0];i++)
		{
			z = i*3;

			if ((c[z+1])&&(!c[z+2])) alert("Has de seleccionar una quantitat al bloc " + eval(i+1) + " de " + t[j]); 
			else if (c[z+2] == "0")
				{
					alert("La quantitat al bloc " + eval(i+1) + " de " + t[j]+" ha de ser superior a 0");
					error = false;
				}
			if (c[z+1])
			{
				if (c[z+2]&&!ValidaEnteroRegExp(c[z+2]))
				{
					alert("La quantitat al bloc " + eval(i+1)+ " de " + t[j]+" ha de ser un número enter");
					error = false;
				}
			}
			if ((c[z+1])&&(!c[z+3])) alert("Has de seleccionar una data al bloc " + eval(i+1) + " de " + t[j]); 	
			else 
				if (c[z+1])
					if ((c[z+3])&&(!FechaFutura(c[z+3],"de recollida/utilitzaci"+String.fromCharCode(243)+" al bloc " + eval(i+1)))){error = false;}

			if ((c[z+1])&&((!c[z+2])||(!c[z+3]))) error = false;	
			
			//alert(t[j]+": "+(c[z+1])+", "+(c[z+2])+", "+(c[z+3]));
			if ((c[z+1])||(c[z+2])||(c[z+3])) raa=raa+1;
		}
	}
	if (raa==0){alert("Has de demanar alguna cosa");error = false;}
	
	return error;
}

