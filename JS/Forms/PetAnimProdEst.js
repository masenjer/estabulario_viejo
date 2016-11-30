
function MostraPetAnimProdEst()
{
	if ($("#InOut").val()  == 1)
	{
		InicializaPetAnimProdEst();
		$("#DIVFitxa2").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	

}

function TancaPetAnimProdEst()
{
	$("#DIVFitxa2").fadeOut("slow");
}

function SeleccionaEspecieAnimSolicitat(id,form)
{
	//alert($("#RowActual").val());
	if ((id==1)&&($("#RowActual").val()>0))
	{
		var r = eval(parseInt($("#RowActual").val())+1);
		for (i=2;i< r;i++)
		{
			//alert("#auxPetAnimProd"+i);
			$("#auxPetAnimProd"+i).val($("#Especie1PetAnimProd option[value='"+$("#Especie1PetAnimProd").val()+"']").text());
			$('#Especie'+i + form).val($("#Especie1"+form).val());
			OmpleCepas(i,form);
		}
		
	}
	
	OmpleCepas(id,form);
	//CreaFilaAnimSolicitat(id,form);
	$("#FechaNac" + id + form).val("");
}

function InicializaPetAnimProdEst()
{
	
	EliminaFilaPetAnimProdEst();
	
	CreaFilaAnimSolicitat(0,'PetAnimProd');

	NumProcCarregaSelect('PetAnimProd');
	CarregaSelectProjecte('PetAnimProd');
	
	DefineCalendario('FechaRecogidaPetAnimProd');
	//DefineCalendario('FechaNac1PetAnimProd');

	$("#RespCostPetAnimProd").val("");
	$("#CentreCostPetAnimProd").val("");
	$("#ResCreditPetAnimProd").val("");
	$("#NumProcPetAnimProd").val("");
	$("#ObsPetAnimProd").val("");
	
	InicialitzaRecollida('PetAnimProd');
}

function EliminaFilaPetAnimProdEst()
{
	//alert("rowAcual:"+rowAcual+", tabla:"+tabla);
	$("#tablePetAnimProd tr").remove();
	$("#RowActual").val(0);
}

function CreaFilaNuevaPetAnimProdxSoca(id,form){
	if ($("#RowActual").val() == id) CreaFilaAnimSolicitat(id,form);		
}

function CreaFilaAnimSolicitat(id, form)
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
					'<tr valign="top">'+
					 '  <td align="left" colspan="2">'+ MostraAnimalsSolicitatsI(id,form)+'</td>'+
					  //' <td align="left">'+ MostraAnimalsSolicitatsD(id,form) +'</td>'+
					'</tr>'+
					
					'<tr>'+
						'<td align="left">Sexe: '+
						//'<input type="radio" name="Sexo'+id+form+'" id="Sexo'+id+form+'" value="-" class="fuenteForm"/> Sexe indiferent  '+
	'                    <input type="radio" name="Sexo'+id+form+'" id="Sexo'+id+form+'" value="M" class="fuenteForm" /> Mascles'+
						'<input type="radio" name="Sexo'+id+form+'" id="Sexo'+id+form+'" value="F" class="fuenteForm" /> Femelles</td>'+

						'<td  align="right">'+
							'<div id="DIVInfoStock'+id+form+'" style="display:none;">'+
								'<table>'+
									'<tr>'+
										'<td style=" font-weight:bold;">Inventari:</td>'+
										'<td><input type="text" id="InfoMascles'+id+form+'" class="inputSenseCaixa" readonly /> Mascles</td>'+
									'</tr>'+
									'<tr>'+
										'<td></td>'+
										'<td><input type="text" id="InfoFemelles'+id+form+'" class="inputSenseCaixa" readonly/> Femelles</td>'+
									'</tr>'+
								'</table>'+
							'</div>'+
						'</td>'+
					'</tr>'+
				'</table>';
		
	
		var elmTBODY = document.getElementById('table'+form);
		var elmTR;
		var elmTD;
		var elmText;
		
		elmTR = elmTBODY.insertRow(rowAcual);
		
		elmTD = elmTR.insertCell(0);
		elmText = document.createElement('div');
		elmText.id = "idDIVFilaAnim"+id;
		elmTD.appendChild(elmText);
		$("#idDIVFilaAnim"+id).html(cadenaTD);
		
		if (id != "1")OmpleCepas(id,form);
		else OmpleEspecies(id,form);
		
		$("#RowActual").val(rowAcual+1);
	}
}

function MostraAnimalsSolicitatsI(id,form)
{
	if (id != "1")
	{
		especie ='<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left" width="400px">'+
				'<input type="text" id="auxPetAnimProd'+id+'" class="fuenteForm" value="'+$("#Especie1"+form+" option[value='"+$("#Especie1"+form).val()+"']").text()+'" readonly="readonly">'+
				'<input type="hidden" id="Especie'+id + form+'" value="'+$("#Especie1"+form).val()+'">'+
            '</td>'+
        '</tr>';

		
	}
	else 
	{
		especie =  ''+		
		'<tr>'+
        	'<td align="left" width="55px">Esp&egrave;cie</td>'+
            '<td align="left"  width="400px">'+
				'<select id="Especie'+id + form+'" onchange="SeleccionaEspecieAnimSolicitat(\''+id+'\',\''+form+'\');" class="fuenteForm">'+
			'</select>'+
            '</td>'+
        '</tr>';	
		
	}
		cepa = '<select id="Cepa'+id + form+'" class="fuenteForm" onchange="CreaFilaNuevaPetAnimProdxSoca(\''+id+'\',\''+form+'\');" style="width:100%">';
	
	return '<table width="100%" cellspacing="0" cellpadding="2" border="0">' + especie +            	
    	'<tr>'+
        	'<td align="left" >Soca</td>'+
            '<td align="left">'+ cepa +				
            '</td>'+
        '</tr>'+
		'<tr>'+
        	'<td align="left" >Naixement/Arribada</td>'+
            '<td align="left"><input type="text" id="FechaNac'+id + form+'" class="fuenteForm"  style="width:115px"  readonly onfocus="MostraTaulaSeleccioDNStock(\''+id+'\',\''+form+'\');"  /><img class="ui-datepicker-trigger" src="img/Calendario.png" alt="..." title="..." onclick="MostraTaulaSeleccioDNStock(\''+id+'\',\''+form+'\');">'+			
            '</td>'+
        '</tr>'+
		'<tr>'+
        	'<td align="left" >Cries</td>'+
            '<td align="left">'+
				'<select id="Cries'+id + form+'" onchange=QuitaDataAmbStock(\''+id+'\',\''+form+'\')>'+			
				'	<option value="">----------------</option>'+			
				//'	<option value="1">0 dies</option>'+			
				'	<option value="1">1 dia</option>'+			
				'	<option value="2">2 dies</option>'+			
				'	<option value="3">1-2 dies</option>'+					
				'</select>'+			
            '</td>'+
        '</tr>'+
		'<tr>'+
        	'<td align="left">Quantitat</td>'+
            '<td align="left"><input type="text" id="Cantidad'+id + form+'"  class="fuenteForm"/>'
				
			+'</td>'+
        '</tr>'+
    	'<tr>'+        	
            '<td align="left">'
				
				+'<input type="hidden" id="UniMas'+id + form+'"/>'
				+'<input type="hidden" id="UniFam'+id + form+'"/>'
				+'<input type="hidden" id="NProc'+id + form+'"/>'
		   +'</td>'+
        '</tr>'+
    '</table>';
}

function MostraAnimalsSolicitatsD(id,form)
{
	return ''+
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	
    '</table>';
}	

function MostraTaulaSeleccioDNStock(id, form)
{

	var idS = $("#Cepa" + id + form).val();
	$("#FechaNac" + id + form).val("");
	var NumProc = $("#NProcPetAnimProd").val();
	//var n = parseInt ($("#RowActual").val());
	//var aux = "";
//	for (i=1;i<n;i++)
//	{
//		if (i==1) aux = $("#IdCepa"+i+form).val();
//		else aux += "|" + $("#IdCepa"+i+form).val();
//	}
	if (idS != null && idS){
		 
		$(".loadingImage").show();
		$("#DIVTaulaSeleccioSoca").html("");
		$("#DIVFitxaSeleccioSoca").fadeIn("slow");
		$.get("PHPForm/TaulaSeleccioDNStock.php",{idS:idS, form:form, id:id, NumProc:NumProc},LlegadaMostraTaulaSeleccioDNStock);	
	}
	else {
		
		//alert("Has de seleccionar una especie i una soca");
	}
}

function LlegadaMostraTaulaSeleccioDNStock(data)
{
	//alert(data);
	$(".loadingImage").hide();
	$("#DIVTaulaSeleccioSoca").html(data);
	//$("#DIVFitxaSeleccioSoca").fadeIn("slow");	
}

function TancaTablaSeleccioSoca()
{
	$("#DIVFitxaSeleccioSoca").fadeOut("slow");	
}

function AfegeixDataAmbStock(DN,form,id, UniMas, UniFam, NProc)
{
	
	$('#FechaNac'+id + form).val(DN);
	$('#Cries'+id + form).val("");
	
	$('#UniMas'+id + form).val(UniMas);
	$('#UniFam'+id + form).val(UniFam);
	$('#NProc'+id + form).val(NProc);
	
	$('#InfoMascles'+id + form).val(UniMas);
	$('#InfoFemelles'+id + form).val(UniFam);
	$("#DIVInfoStock"+id+form).show("slow");
	
	//if ($("#RowActual").val() == id) CreaFilaAnimSolicitat(id,form);
	$("#DIVFitxaSeleccioSoca").fadeOut("slow");	

	
}

function QuitaDataAmbStock(id,form){
	$('#FechaNac'+id + form).val("");
	
	$('#UniMas'+id + form).val("");
	$('#UniFam'+id + form).val("");
	$('#NProc'+id + form).val("");
	
	$('#InfoMascles'+id + form).val("");
	$('#InfoFemelles'+id + form).val("");
	$("#DIVInfoStock"+id+form).hide("slow");
	
}

function GuardaPetAnimProdEst(form)
{
	//alert(form);
	//var Resp = $("#RespCostPetAnimProd").val();
	var CC = $("#CentreCostPetAnimProd").val();
	//var RC = $("#ResCreditPetAnimProd").val();
	var NumProc = $("#NProcPetAnimProd").val();
	var FR = $("#FechaRecogidaPetAnimProd").val();
	var HR = $("#HoraRecogidaPetAnimProd").val();
	var LR = $('input[name=RecogidaRadioPetAnimProd]:checked').val();
	var Obs = $("#Obs"+form).val();
	var VM = $('input[name=Vivos'+form+']:checked').val();
	var Sacrifici = $("#SacrificiRecogida"+form).val();
	
	var n = parseInt ($("#RowActual").val());
	
	var aux = "";

	for (i=1;i<n;i++)
	{
		//alert("Sexo" + i + ": "+$('input[name=Sexo'+i+form+']:checked').val());
		if (aux) aux += "#";
		aux += $("#Cepa"+i+form).val() + "|" + $("#Cantidad"+i+form).val() + "|" + $("#FechaNac"+i+form).val() + "|" + $('input[name=Sexo'+i+form+']:checked').val() + "|" + $('#NProc'+i + form).val()+ "|" + $('#Cries'+i + form).val();
;
	}
	//console.log(aux);
	
  if (ValidaPetAnimProd(CC,NumProc,FR,HR,LR,VM,Sacrifici,aux, form))
	{
		//alert("entro");
		$.post("PHPForm/PetAnimProdGuarda.php",{CC:CC,FR:FR,HR:HR,LR:LR,aux:aux,NumProc:NumProc,VM:VM,Sacrifici:Sacrifici,Obs:Obs},LlegadaGuardaPetAnimProdEst);	
	}
}

function LlegadaGuardaPetAnimProdEst(data)
{
	//alert(data);
	if (data == 0)
	{
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaPetAnimProdEst();	
	}
	else
	{
		alert(data);	
	}
}

function ValidaPetAnimProd(CC,NumProc,FR,HR,LR,VM,Sacrifici,aux, form)
{
	var z = 0;
	var l = 0;
	var c = "";
	
	var error = ValidaDadesEcon(CC,NumProc);	
	if (error) error = ValidaRecollida(FR,HR,LR,VM,Sacrifici);
	
	if ( String(aux).length == 1){
		alert("Has de seleccionar com a m"+String.fromCharCode(237)+"nim una esp"+String.fromCharCode(232)+"cie");
		error = false;
	}
	else
	{
		var cadena = aux.split("#");
		//console.log(cadena);
		for (i=0;i<cadena.length;i++)
		{
			c = cadena[i].split("|");
			//console.log(c);
			//console.log("i:"+i);
			z = i*5;
			
			if ((i==0)&&(!c[0]))
			{
				alert("Has d'indicar com a m"+String.fromCharCode(237)+"nim la soca del bloc 1");
				error = false;
			}

			if (((c[1])||(c[2]))&&(!c[0])) 
			{
				alert("Has de seleccionar una soca al bloc " + eval(i+1)); 
				error = false;	
			}
			//alert("Cepa:"+c[0]+", Cantidad:"+(c[1]))
			if ((c[0])&&(!c[1]))
			{
				alert("Has de seleccionar una quantitat al bloc " + eval(i+1)); 
				error = false;	  
			}
			else
			{
				if (c[0])
				{
					if (!ValidaEnteroRegExp(c[1]))
					{
						alert("La quantitat al bloc " + eval(i+1)+ " ha de ser un n"+ String.fromCharCode(250) +"mero enter");
						error = false;
					} 
				}			
			}
			if (c[1]=="0")
			{
				alert("La quantitat al bloc " + eval(i+1)+" ha de ser superior a 0");
				error = false;	
			}
			if ((c[0])&&(!c[2])&&(!c[5])) 
			{
				alert("Has d' indicar la data de naixement / arribada al bloc " + eval(i+1)) +" o la edat de les cries"; 
				error = false;	
			}
			
	//console.log(c[2]);		
			if (c[2]){
				if (FechaFutura(c[2]))
				{
					
					alert("La data de naixement / arribada dels animals del bloc "+eval(i+1)+" ha de ser igual o anterior al dia d'avui"); 
					error = false;
				}
				
				if (!RestaFechas(FR,c[2]))
				{
					alert("La data de naixement del bloc " + eval(i+1)+" ha de ser inferior a la data de recollida / utilització dels animals");	
					error = false;
				}
			}
			
			if ((c[0])&& ((!c[3])||c[3] == "undefined")) 
			{
				alert("Has de seleccionar el sexe al bloc " + eval(i+1));
				error = false;
			}
			
			if ((c[2])&&(c[1]))
			{
				l = eval(i+1);
				
				
					switch (c[3])
					{
						case "M": 	VCant = parseInt($("#UniMas"+l+"PetAnimProd").val());	
									break;
						case "F": 	VCant = parseInt($("#UniFam"+l+"PetAnimProd").val());	
									break;	
						default: 	//alert("Has de triar un sexe");
									error = false;
									break;																						
					}
					
					if((parseInt(c[1]) > VCant)&&(error))
					{
						alert("La quantitat del bloc "+ eval(i+1)+" ha de ser inferior a "+ VCant +" animals per aquest g"+ String.fromCharCode(232) +"nere");
						error = false;
					}
				}else
				{
					Cant = eval(parseInt($("#UniMas"+eval(i+1)+"PetAnimProd").val())+parseInt($("#UniFam"+eval(i+1)+"PetAnimProd").val()));
					if(parseInt(c[1]) > parseInt(Cant))
					{
						alert("La quantitat del bloc "+ eval(i+1)+" ha de ser inferior a "+ Cant +" animals");
						error = false;
					}
				}
			}
			if(!(c[3])&&(c[1]))
			{
				alert("Has de seleccionar el sexe al bloc " + eval(i+1));
				error = false;
			}
		}

///////Comprovació del sumatori d'unitats
	
	if (error)	
	{	z=0;
		
		for (i=0;i<cadena.length;i++)
		{
			c = cadena[i].split("|");
			var UnidadesMaximasGlobales = parseInt(c[1]);
			
			if (cadena[i+1]){
				for (j=i+1;j<cadena.length;j++)
				{ 
					w = cadena[j].split("|");	
					//w = j*5;
					if ((c[0]==w[0])&&(c[2]==w[2])&&(c[5]==w[5])) eval(UnidadesMaximasGlobales += parseInt(w[1]));
					//console.log("i:"+i+",j:"+j+",UnidadesMaximasGlobales:"+UnidadesMaximasGlobales);
				}
			}
			l = eval(i+1);	
			VCant = 0;
		
			switch (c[3])
			{
				case "M": 	VCant = parseInt($("#UniMas"+l+"PetAnimProd").val());	
							var genere = "mascul"+String.fromCharCode(237)+" ";
							break;
				case "F": 	VCant = parseInt($("#UniFam"+l+"PetAnimProd").val());	
							var genere = "femen"+String.fromCharCode(237)+" ";
							break;
				case "-":	VCant = eval(parseInt($("#UniMas"+eval(i+1)+"PetAnimProd").val())+parseInt($("#UniFam"+eval(i+1)+"PetAnimProd").val()));
							var genere = "indiferent ";
							break;														
			}
			
			if(UnidadesMaximasGlobales > VCant)
			{
				alert("El sumatori d'unitats de "+ $("#Especie"+eval(i+1)+form+" option[value="+$("#Especie"+eval(i+1)+form).val()+"]").text() +" "+ $("#Cepa"+eval(i+1)+form+" option[value="+$("#Cepa"+eval(i+1)+form).val()+"]").text() +" nascuts el dia "+c[2]+" amb g"+ String.fromCharCode(232) +"nere "+ genere+" "+ String.fromCharCode(233) +"s "+UnidadesMaximasGlobales+" i ha de ser inferior o igual a "+VCant);

				error = false;
			}
			
		}
	

	}
	
	return error;
}