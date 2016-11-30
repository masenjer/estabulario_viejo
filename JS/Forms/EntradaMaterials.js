var NumEM; 

function MostraEntradaMaterials()
{
	if ($("#InOut").val()  == 1)
	{
		$("#DIVFitxa10").fadeIn("slow");
		//DefineCalendario("Fecha1EntradaMaterials");
		
		$("#tablePAEntradaMaterials tr").remove();
		
		NumEM = 0;
		CreaFilaEntradaMateriales(0,'EntradaMaterials');
		$("#ObsEntradaMaterials").val("");
	}else alert("Has d'estar donat d'alta com a usuari per accedir als formularis");	
}

function TancaEntradaMaterials()
{
	$("#DIVFitxa10").fadeOut("slow");
}

function CreaFilaEntradaMateriales(id, form)
{
	var idV = id;
	var rowAcual = id;

	
	var cadenaTD = MostraTDEntradaMateriales(id,form);
	
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

	DefineCalendario("Fecha"+id+form);
	
	id = parseInt(id)+1;
	NumEM = id;	

	document.getElementById("PlusEmButton").onclick = function (){CreaFilaEntradaMateriales(id,form);};

}

function MostraTDEntradaMateriales(id,form)
{
	if (id == 0) var imp = '<font class="ast">*</font><br>';	
	else var imp = '';
	
	return '' +
	'<table width="100%" cellspacing="0" cellpadding="2" border="0">'+
    	'<tr>'+
        	'<td align="left">'+imp+'<input type="text" id="Fecha'+id + form+'" class="fuenteForm" style="width:100px;"/></td>'+
        	'<td align="left">'+imp+'<textarea id="Materiales'+id + form+'" class="fuenteForm" style="width:180px"/></textarea></td>'+
        '</tr>'+
 '</table>';
}


function GuardaEntradaMateriales(form)
{
	var EM = "";
	var Obs = $("#ObsEntradaMaterials").val();
	
	for (i=0;i<NumEM;i++)
	{
		if (($("#Fecha"+i+form).val())||$("#Materiales"+i+form).val())
		{
			if(EM == "") EM = $("#Fecha"+i+form).val()+"|"+$("#Materiales"+i+form).val()+"|"+eval(i+1);
			else  EM = EM+"#"+$("#Fecha"+i+form).val()+"|"+$("#Materiales"+i+form).val()+"|"+eval(i+1);
		}
	}
	if (ValidaEntradaMateriales(EM)) $.post("PHPForm/"+form+"Guarda.php",{EM:EM,Obs:Obs},LlegadaGuardaEntradaMateriales);		
}

function LlegadaGuardaEntradaMateriales(data)
{
	//alert('Petici'+String.fromCharCode(243)+' cursada amb '+String.fromCharCode(232)+'xit');
	alert("La seva petici"+ String.fromCharCode(243) +" ha estat cursada correctament. Pot veure l'estat de la seva comanda al gestor de comandes, polsant el bot"+ String.fromCharCode(243) +" groc situat a la dreta del men"+ String.fromCharCode(250) +" superior d'aquesta mateixa plana");
	$("#DIVFitxa10").fadeOut("slow");
}

function ValidaEntradaMateriales(EM)
{
	var aux = true;
	
	var cadena1 = EM.split("#");
	var c;
	var d = 0;
		
	if (cadena1.length > 0)
	{
	for (i=0;i<cadena1.length;i++)
		{
			c = cadena1[i].split("|");
			
			if((c[0])||(c[1])||(c[2])) 
			{
				if(!c[0]){alert("Has d'omplir el camp data de la fila " + c[2]);aux = false;}
				if(!c[1]){alert("Has d'omplir el camp Materials de la fila " + c[2]);aux = false;}
				if (!FechaFutura(c[0])){alert("La data de la fila " + c[2] + " ha de ser superior a l\'actual");aux = false;}
				d=d+1;
			}
		}
	}
	if (d==0){alert("Has d'indicar com a mínim un material d'entrada");aux=false;}
	
	
	
	
	return aux;
	
}