function MostraAccesSE()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa92").hide();
		$("#DIVFitxa93").hide();
		$("#DIVFitxa94").hide();
		$("#DIVFitxa9").fadeIn("slow");
		$("#DIVFitxa91").fadeIn("slow");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}

function MostraAccesoPuntual()
{
	$("#DIVFitxa91").fadeOut(1000);
	$("#DIVFitxa92").delay(1001).fadeIn(1000);
	
	InicialitzaDadesPersonaAccedir('AccesPuntual');
	InicialitzaCheckboxArea('AccesPuntual');
	$("#NoSeAreaAccesPuntual").attr('checked',false);
	$("#TAOtrasZonasAccesPuntual").val("");
	$("#DIVTAOtrasZonasAccesPuntual").hide();
	
	InicialitzaContacteAnimals('AccesPuntual');
	InicialitzaAcreditacioPersona('AccesPuntual');
	
	$("#TAMotivoAccesoAccesPuntual").val("");
	
	var filas = $("#nFrangHorAccesPuntual").val();
	
	var rowAcual = parseInt($("#RowActualAccesPuntual").val());

	EliminaFilaFranjHor(rowAcual, 'AccesPuntual');
	CreaFilaFranjHor(0,'AccesPuntual');
	$("#nFrangHorAccesPuntual").val(0);
}

function InicialitzaDadesPersonaAccedir(form)
{
	$("#Nombre"+form).val("");	
	$("#NIF"+form).val("");	
	$("#Telefono"+form).val("");	
	$("#Email"+form).val("");	
	
	if (form =='AccesPuntual')	$("#CentroEmpresa"+form).val("");	
	
	$(" :radio").attr('checked',false);

	$("#Obs"+form).val("");

}

function InicialitzaContacteAnimals(form)
{
	$("#ContactoAnimales0"+form).attr("checked",false);	

	for (i=1;i<5;i++)
	{
		$("#ContactoAnimales"+i+form).attr("checked",false);	
		$("#DIVContacto"+i+form).hide();
		$("#ContactoTA"+i+form).val("");
		$("#FechaContacto"+i+form).val("");
		DefineCalendario("FechaContacto"+i+form);
	}

}

function InicialitzaAcreditacioPersona(form)
{
	for (i=0;i<4;i++)
	{
		$("#TipoAcredit"+form+i).attr("checked",false);
	}
}

function InicialitzaCheckboxArea(form)
{
	$("#CadenaArea").val("");

	for (i=0;i<20;i++)
	{
		$("#AreaAcceso"+i+form).attr("checked",false);
	}

	$("#OtrasZonas"+form).attr('checked',false);
}

function NoSeArea(form)
{
	InicialitzaCheckboxArea(form);
	
	if ($("#NoSeArea"+form).attr("checked") == true) $("#CadenaArea").val("Nolose");
	else $("#CadenaArea").val("");
}


function CadenaAreas(area, form)
{
	$("#NoSeArea"+form).attr("checked",false);
	
	var cadenaArea = $("#CadenaArea").val();
	if (cadenaArea == "Nolose") cadenaArea ="";
	
	var aux = 0;
	
	var cadena = cadenaArea.split("|");
	var cadenaR = "";
	for (i=0;i<cadena.length;i++)
	{
		if (cadena[i] == area) aux = 1;
		else 
		{
			if (cadenaR == "") cadenaR = cadena[i];
			else cadenaR = cadenaR + "|" + cadena[i];
		}		
	}
	if (aux == 0)
	{
		if (cadenaR == "") cadenaR = area;
		else cadenaR = cadenaR + "|" + area;
	} 

	$("#CadenaArea").val(cadenaR);
}

function MostraAccesoAutorizacion()
{
	$("#DIVFitxa91").fadeOut(1000);
	$("#DIVFitxa94").delay(1001).fadeIn(1000);

	InicialitzaDadesPersonaAccedir('AutoEntrada');
	InicialitzaCheckboxArea('AutoEntrada');
	InicialitzaAcreditacioPersona('AutoEntrada');
	$("#NoSeAreaAutoEntrada").attr('checked',false);
	$("#TAOtrasZonasAutoEntrada").val("");
	$("#DIVTAOtrasZonasAutoEntrada").hide();
	
	InicialitzaContacteAnimals('AutoEntrada');
	
	$("#TAMotivoAccesoAutoEntrada").val("");
}

function TancaAccesSE()
{
	$("#DIVFitxa9").fadeOut("slow");
}

function MostraamagaDIVContacto(id, form)
{
	$("#ContactoAnimales0"+form).attr('checked',false);

	if ($("#ContactoAnimales"+id+form).attr("checked")==true)
	{
		$("#DIVContacto"+id+form).show("slow");
	}
	else
	{
		$("#DIVContacto"+id+form).hide("slow");
	}
}

function AnulaContactoAnimales(form)
{
	for (i=1;i<5;i++)
	{
		$("#ContactoAnimales"+i+form).attr("checked",false);	
		$("#DIVContacto"+i+form).hide();
	}
}
function MostraamagaDIVOtrasZonas(form)
{
	if ($("#OtrasZonas"+form).attr("checked")==true)
	{
		$("#DIVTAOtrasZonas"+form).slideDown("slow");
	}
	else
	{
		$("#DIVTAOtrasZonas"+form).slideUp("slow");
	}
}

function GuardaAccesEstabulari(form)
{
	var Nom = $("#Nombre"+form).val();	
	var NIF = $("#NIF"+form).val();	
	var Tel = $("#Telefono"+form).val();	
	var Email = $("#Email"+form).val();	
	
	var AC = "";
	
	for (i=0;i<4;i++)
	{
		if (i==0) 
		{
			if($('input[name=TipoAcredit'+form+i+']:checked').val())
				var AC = $('input[name=TipoAcredit'+form+i+']:checked').val();
			else var AC ="";
		}			
		else 
		{
			if($('input[name=TipoAcredit'+form+i+']:checked').val())
				AC += "|"+ $('input[name=TipoAcredit'+form+i+']:checked').val();
			else AC +="|";
		}

	}

	

	var CE = "";
	
	var Obs = $("#Obs"+form).val();

	var Area = $("#CadenaArea").val();
	var OZ = $("#TAOtrasZonas"+form).val();
	
	var Motiu = $("#TAMotivoAcceso"+form).val();

	var CA = CreaCadenaContactoAnimales(form);
	
	//alert(CA);
	
	var n = "";	
	var Horari = "";

	if (form =='AccesPuntual')
	{
		CE = $("#CentroEmpresa"+form).val();	
			
	
		Horari = "";	
		n = "";
		
		var n = parseInt($("#nFrangHor"+form).val());

		for (i=1;i<eval(n+2);i++)
		{
			if (($("#FechaFranjHor"+form+i).val())||($("#DesdeFranjHor"+form+i).val())||($("#HastaFranjHor"+form+i).val()))
			Horari = Horari + "#" + $("#FechaFranjHor"+form+i).val() + "|" + $("#DesdeFranjHor"+form+i).val() + "|" + $("#HastaFranjHor"+form+i).val()+"|"+i;
		}
	}
	if (ComprovaAccesEstabulari(form,Nom,NIF,Tel,Email,AC,CE,Area,OZ,Motiu,CA,Horari))
	{
//		alert("Nom: "+ Nom+", NIF:"+NIF+" ,Tel:"+Tel+" ,Email:"+Email+" ,AC:"+AC+" ,CE:"+CE+" ,Area:"+Area+" ,OZ:"+OZ+" +,Motiu:"+Motiu+" ,CA:"+CA+" ,Horari:"+Horari);
		$.post("PHPForm/"+form+"Guarda.php",{Nom:Nom,NIF:NIF,Tel:Tel,Email:Email,AC:AC,CE:CE,Area:Area,OZ:OZ,Motiu:Motiu,CA:CA,Horari:Horari,Obs:Obs},LlegadaGuardaAccesEstabulari);		
	}
}

function LlegadaGuardaAccesEstabulari(data)
{
	if (ComprovaSiSessioCaducada){
		alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
		TancaAccesSE();
	}
}

function CreaCadenaContactoAnimales(form)
{
	if ($("#ContactoAnimales0"+form).attr('checked') == false)
	{
		var cadena = "";
		for (i=1;i<5;i++)
		{
			if(i==1) cadena = $("#ContactoTA"+i+form).val()+"|"+$("#FechaContacto"+i+form).val();
			else  cadena = cadena +"#"+ $("#ContactoTA"+i+form).val()+"|"+$("#FechaContacto"+i+form).val();
		}
	}
	else cadena = "NO";
	
	return cadena;
}

function ComprovaAccesEstabulari(form,Nom,NIF,Tel,Email,AC,CE,Area,OZ,Motiu,CA,Horari)
{
	var error = true;
	var auxAC = false;
	var buit = 0;
	
	if (!Nom) alert("Has d' indicar el nom i cognoms de la persona que vol accedir");
	if (!NIF) alert("Has d' indicar el NIF de la persona que vol accedir");
	if (!Tel) alert("Has d' indicar el tel"+String.fromCharCode(232)+"fon de la persona que vol accedir");
	if (!Email) alert("Has d' indicar l' email de la persona que vol accedir");
	if (!CE && form=="AccesPuntual") alert("Has d' indicar el centre de la persona que vol accedir");
	
	var cadena  = AC.split("|");
	
	for (i=0;i<cadena.length;i++)
	{
		if (cadena[i] == "1") auxAC = true;
	}
	
	if (!auxAC) alert("Has d' indicar el tipus d'acreditaci"+String.fromCharCode(243)+" de la persona que vol accedir");
	if (!Motiu) alert("Has d' indicar el motiu pel que es vol accedir");
	
	if ((!Nom)||(!NIF)||(!Tel)||(!Email)||(!CE&&form=="AccesPuntual")||(!auxAC)||(!Motiu)) error=false;
	
	if (!Area && !OZ)
	{
		alert("Has de seleccionar les "+ String.fromCharCode(224) +"rees a les que vol accedir");
		error = false;
	}
	if (($("#OtrasZonasAccesPuntual").attr('checked') == true )&&(OZ==""))
	{
		alert("Has d'indicar les altres zones que vols accedir");
		error = false;
	}
	
	//if ((!Area && !OZ)||(($("#OtrasZonasAccesPuntual").attr('checked') == true )&&(OZ==""))) error = false;	
	var CadenaDataContacte = "";	
	var cadena1 = "";
	cadena = "";
	if (CA != "NO")
	{
		cadena = CA.split("#");
		var mensaje = ["mascotes","animals d' experimentaci"+String.fromCharCode(243)+"","animals salvatges","altres posibles situacions de risc"];
		
		for (i=0;i<4;i++)
		{
			cadena1 = cadena[i].split("|");
			if ($("#ContactoAnimales"+eval(i+1)+form).attr('checked') == true)
			{
				if (!cadena1[0]) {alert("Has d'indicar l'especie al grup de contacte amb " + mensaje[i]);error = false;}
				if (!cadena1[1]){ alert("Has d'indicar la data de l'"+String.fromCharCode(250)+"ltim contacte amb " + mensaje[i]);error = false;}
//				if((cadena1[1])&&FechaFutura(cadena1[1]))
//				{
//					alert("La data de l'"+String.fromCharCode(250)+"ltim contacte amb " + mensaje[i] + " ha de ser inferior a la data d")
//				}				
				CadenaDataContacte += "|"+cadena1[1];
			}
		}
		
		var cuenta =0;
		for (i=0;i<5;i++)
		{
			if ($("#ContactoAnimales"+i+form).attr('checked') == true) cuenta = cuenta + 1;
		}
				
		if (cuenta == 0){alert("Has d' indicar si la persona que vol accedir a l'estabulari ha tingut contacte o no amb altres animals");error=false;}	
		
	}
	
	
	if (form == "AccesPuntual" )
	{
	
		var f = new Date();	
		var hoy = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
	
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
			else
			{
				var CDC = CadenaDataContacte.split("|");
				for (j=1;j<CDC.length;j++)
				{
					//alert(CDC[j]);
					if (!RestaFechas(cadena[0],CDC[j]))
					{
						alert("La data del bloc "+cadena[3]+" ha de ser superior a la data de contacte amb qualsevol tipus d'animal" );
						error = false;
					}					
				}
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
			
			
			buit ++;
		}
			
		if (buit<1)
		{	
			alert("Has d'indicar com a m"+String.fromCharCode(237)+"nim una franja hor"+ String.fromCharCode(224) +"ria");	
			error = false;
		}		
	}
	else
	{
		if ($("#ComprometoAccesSE").attr("checked")==false){alert("Has d' acceptar el comprom"+String.fromCharCode(237)+"s d'actualitzaci"+String.fromCharCode(243)+" de les dades que consten en aquest document"); error = false;}
	
	}
	return error;
}


var NumPH;

function MostraAccesoFueraHorario()
{
	//$("#tableForaHorari tr").remove();

	
	$("#DIVFitxa91").fadeOut(1000);
	$("#DIVFitxa93").delay(1001).fadeIn(1000);

	
	
	$("#tablePAForaHorari tr").remove();
		
	NumPH = 0;
	CreaFilaPersonasAcceso(0,'ForaHorari');
	
	$("#ObsForaHorari").val("");
	
	var filas = $("#nFrangHorForaHorari").val();
	
	var rowAcual = parseInt($("#RowActualForaHorari").val());

	EliminaFilaFranjHor(rowAcual, 'ForaHorari');
	CreaFilaFranjHorFH(0,'ForaHorari');
	$("#nFrangHorForaHorari").val(0);
	

	
	
	
	

	
}

function CreaFilaPersonasAcceso(id, form)
{
	var rowAcual = id;
	
	var cadenaTD = MostraTDPersonasAcceso(id,form);
	
	var elmTBODY = document.getElementById('tablePA'+form);
	var elmTR;
	var elmTD;
	var elmText;
	elmTR = elmTBODY.insertRow(rowAcual);
	elmTD = elmTR.insertCell(0);
	elmText = document.createElement('div');
	elmText.id = "idDIV"+form+id;
	elmTD.appendChild(elmText);
	$("#idDIV"+form+id).html(cadenaTD);

	id = parseInt(id) + 1;
	NumPH = id;
	
	document.getElementById('PlusAccesoFHButton').onclick = function (){CreaFilaPersonasAcceso(id,form);};
}


function MostraTDPersonasAcceso(id,form)
{
	return '' +
	'<table width="90%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left"><input type="text" id="Nombre'+id+form+'" class="fuenteForm" style="width:120px;"/></td>'+
        	'<td align="left"><input type="text" id="Apellidos'+id+form+'" class="fuenteForm" style="width:220px;"/></td>'+
        	'<td align="left"><input type="text" id="NIF'+id+form+'" class="fuenteForm" style="width:80px;"/></td>'+
        '</tr>'+
 '</table>';
}


function GuardaForaHorari(form)
{
	//alert("entro");
	var PH = "";

	var Obs = $("#ObsForaHorari").val();
	
	Horari = "";	
	n = "";
		
	var n = parseInt($("#nFrangHor"+form).val());
	
	for (i=1;i<eval(n+2);i++)
	{
		if (($("#FechaFranjHor"+form+i).val())||($("#DesdeFranjHor"+form+i).val())||($("#HastaFranjHor"+form+i).val()))
		Horari = Horari + "#" + $("#FechaFranjHor"+form+i).val() + "|" + $("#DesdeFranjHor"+form+i).val() + "|" + $("#HastaFranjHor"+form+i).val()+"|"+i;
	}

	for (i=0;i<NumPH;i++)
	{
		if (($("#Nombre"+i+form).val())||$("#Apellidos"+i+form).val()||$("#NIF"+i+form).val())
		{
			if(PH == "") PH = $("#Nombre"+i+form).val()+"|"+$("#Apellidos"+i+form).val()+"|"+$("#NIF"+i+form).val()+"|"+eval(i+1);
			else  PH = PH+"#"+$("#Nombre"+i+form).val()+"|"+$("#Apellidos"+i+form).val()+"|"+$("#NIF"+i+form).val()+"|"+eval(i+1);
		}
	}
		
	if (ValidaForaHorari(form, Horari, PH))
	{
		$.post("PHPForm/"+form+"Guarda.php",{PH:PH,Horari:Horari,Obs:Obs},LlegadaGuardaAccesEstabulari);		
	}
}

function ValidaForaHorari(form,Horari,PH)
{
	var error = true;
	var buit = 0;
		
	var f = new Date();	
	var hoy = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
	
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
		buit ++;
	}
		
	if (buit<1)
	{	
		alert("Has d'indicar com a m"+String.fromCharCode(237)+"nim una franja hor"+ String.fromCharCode(224) +"ria");	
		error = false;
	}		
	
	var cadena1 = PH.split("#");
	var c;
	var d = 0;
		
	if (cadena1.length > 0)
	{
	for (i=0;i<cadena1.length;i++)
		{
			c = cadena1[i].split("|");
			
			if((c[0])||(c[1])||(c[2])) 
			{
				if(!c[0]){alert("Has d'omplir el camp Nom de la fila " + c[3]);error = false;}
				if(!c[1]){alert("Has d'omplir el camp Cognoms de la fila " + c[3]);error = false;}
				if(!c[2]){alert("Has d'omplir el camp NIF de la fila " + c[3]);error = false;}
				d=d+1;
			}
		}
	}
	if (d==0){alert("Has d'indicar com a m"+String.fromCharCode(237)+"nim una persona per accedir a l'estabulari");error=false;}
	
	
	return error;
	
}

function  SeleccionaTipusAcreditacio(form)
{
	$("#TipoAcredit"+form+"3").attr("checked",false);
}

function DeseleccionaTipusAcreditacio(form)
{
	for (i=0;i<3;i++)
	{
		$("#TipoAcredit"+form+i).attr("checked",false);
	}
}

function CreaFilaFranjHorFH(id, form)
{
	//alert("id:"+id+", form:"+form);
	$("#nFrangHor"+form).val(parseInt($("#nFrangHor"+form).val())+1);
	//alert($("#nFrangHor").val());
	
	var rowAcual = $("#RowActual"+form).val();
		rowAcual =  parseInt(rowAcual);
		
	if (id == 0) var imp = '<font class="ast">*</font>';	
	else var imp = '';	
		
	
	$("#FechaFranjHor"+form+id).datepicker( "option", "onSelect", "" ); 		
	id = id+1;

	var cadenaTD = new Array();
	cadenaTD[0] = '<input type="text" id="FechaFranjHor'+form+id+'" class="fuenteForm" readonly="readonly">'+imp;
	cadenaTD[1] = 'De les';
	cadenaTD[2] = '<select id="DesdeFranjHor'+form+id+'" class="fuenteForm">'+SelectHorasFH()+'</select>'+imp;                    	
	cadenaTD[3] = 'a les';
	cadenaTD[4] = '<select id="HastaFranjHor'+form+id+'" class="fuenteForm">'+SelectHorasFH()+'</select>'+imp;
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

	DefineCalendarioREFH('FechaFranjHor'+form+id,id,form);

	$("#RowActual"+form).val(rowAcual+1);
}

function DefineCalendarioREFH(Calendario,id,form)
{
	$("#"+Calendario).datepicker({
		showOn: 'both',
   		buttonImage: 'img/Calendario.png',
        buttonImageOnly: true,
	    changeYear: true,
		numberOfMonths: 1,
		onSelect: function(textoFecha, objDatepicker){
			CreaFilaFranjHorFH(id, form);
			//$("#mensaje").html("<p>Has seleccionado: " + textoFecha + "</p>");
		   }
		}); 	
}



