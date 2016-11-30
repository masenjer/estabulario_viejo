//////////////////////////////////01

function AccionsPetAnimProd(id,EA,sex,IdProc)
{

	var val = $("#EstatPetAnimProd"+id).val();
///val ha de ser el valor actual i s'ha de guardar l'estat anterior
	
	if (sex == "-")
	{
		if(val == 1)  DefineixUnitatsPetAnimProd(id,EA);
		else if (EA == 1) EliminaUnitatsPetAnimProd(id);
			 else GuardaEstatPetAnimProd(id,IdProc,EA);
	}else GuardaEstatPetAnimProd(id,IdProc,EA);
	
}

function GuardaEstatPetAnimProd(id,IdProc,EA)
{
	
//	alert("EA:"+EA);
	var val = $("#EstatPetAnimProd"+id).val();
	
	//alert(id+","+val);
//	if (val=="2") $("#DIVDenegat"+id).show(500);
//	else $("#DIVDenegat"+id).hide(500);


	
	$.post("PHPForm/DetallComanda/lib/GuardaEstatPetAnimProd.php",{id:id, val:val, IdProc:IdProc, EA:EA},LlegadaGuardaEstatPetAnimProd);	
}

function LlegadaGuardaEstatPetAnimProd(data)
{
	//alert(data);
	var cadena = data.split("|");
	if (cadena[0]) alert(cadena[0]);
	
	CarregaGestioComandes(cadena[1]);	
}

function CreaSalidaPetAnimProd(id){
	$.post("PHPForm/DetallComanda/lib/PetAnimProdCreaSalida.php",{id:id},LlegadaCreaSalidaPetAnimProd);
}

function LlegadaCreaSalidaPetAnimProd(data){
	CarregaGestioComandes(data);	
}

function SaveTADenegaReservaPetaAnimProd(id)
{
	var val = $("#TADeniegaPetaAnimProd"+id).val();	
	$.post("PHPForm/DetallComanda/lib/GuardaDeniegaPetaAnimProd.php",{id:id,val:val},function(){alert("Explicació guardada");});	
}

function DefineixUnitatsPetAnimProd(id,EA)
{
	document.getElementById("DIVTancaSeleccioUnitats").onclick = function(){TancaSeleccioUnitatsPetAnimProd(id,EA)};
	$.post("PHPForm/DetallComanda/lib/CarregaUnitatsPetAnimProd.php",{id:id},LlegadaDefineixUnitatsPetAnimProd);	
}

function LlegadaDefineixUnitatsPetAnimProd(data)
{
	//alert(data);
	$("#DIVSeleccioUnitats").html(data);
	$("#DIVFormSeleccioUnitats").fadeIn("slow");
}

function TancaSeleccioUnitatsPetAnimProd(id,EA)
{
	$("#EstatPetAnimProd"+id +" option[value="+EA+"]").attr("selected",true);
	$("#DIVFormSeleccioUnitats").fadeOut("slow");
}


function CanviaUnitatsTotalsPetAnimProd(cant)
{
	var error = false;	
	var valor = new Array();
	
	for (i=0;i<2;i++)
	{		
		valor[i] = $("#UnitatsPetAnimProdEstabulari"+i).val(); 

		if ((!valor[i])||(valor[i]=="")) valor[i] = "0";
		if ((valor[i].length >1)&&(valor[i][0])==0) valor[i]= valor[i].substring(1);
		else valor[i] = parseInt(valor[i].replace(".",""));	
		if (!valor[i]) valor[i] = "0";
		
		if (isNaN(valor[i]))
		{
			valor[i]= valor[i].slice(0,valor[i].lenght-1);
			error = true;
		}else
		{
			if ((valor[i].length >1)&&(valor[i][0])==0) valor[i]= valor[i].substring(1);
	
			if (parseInt(valor[i]) > parseInt($("#UnitatsTotalsPetAnimProd"+i).val()))
			{  
				valor[i]=$("#UnitatsTotalsPetAnimProd"+i).val();
			}
		}
		if (!valor[i]) valor[i] = "0";
		$("#UnitatsPetAnimProdEstabulari"+i).val(valor[i]);
		
	}
	
	c =eval(parseInt(cant)- eval(parseInt(valor[0]) + parseInt(valor[1]))); 
	
	if (!error)
	{
		$("#UnitatsTotalsPetAnimProd").val(c);
	
		if (c == 0)
		{
			$("#TDCant").css("background-color","#AFA");
			$("#ButtonCarregaUnitatsPetAnimProd").show("slow");		
		}else
		{
			$("#TDCant").css("background-color","#FAA");
			$("#ButtonCarregaUnitatsPetAnimProd").hide("slow");
		} 
	}
}

function CanviaUnitatsTramitaLiniesNovesPetAnimProd(id)
{
	
	/////////////////////////////Modificar, solo han de  entrar 2 
	
	var valor ="";
	
	for (i=0;i<2;i++)
	{
		valor += $("#UnitatsPetAnimProdEstabulari"+i).val()+"|"; 
	}
	
	//alert(valor)
	
	$.post("PHPForm/DetallComanda/lib/PetAnimProdCanviaUnitatsTramitaLinies.php",{valor:valor, id:id}, LlegadaCanviaUnitatsTramitaLiniesNovesPetAnimProd);			
}

function LlegadaCanviaUnitatsTramitaLiniesNovesPetAnimProd(data)
{
	//alert(data);
	
	var cadena = data.split("|");
	if (cadena[0]=="0")	{ 
		CarregaGestioComandes(cadena[1]);
		$("#DIVFormSeleccioUnitats").fadeOut("slow");}
	else alert("Ha ocurrido un error");
}

function EliminaUnitatsPetAnimProd(id,EA)
{
	$("#AvisEliminarAdmin").html("Aquesta l&iacute;nia de comanda ja va ser tramitada i al denegar-la s'esborraran les l&iacute;nies creades per tal de definir les unitats de cada sexe. Tamb&eacute; es possible que es modifiqui l'estoc. Est&agrave;s segur que vols continuar?");
	
	document.getElementById("ButtonEliminaAdmin").onclick = function (){ConfirmaEliminaUnitatsPetAnimProd(id)};
	document.getElementById("ButtonCancelaAdmin").onclick = function (){CancelaDenegaPetAnimProd(id);};
	
	$("#DIVEliminaAdmin").fadeIn("slow");
}

function ConfirmaEliminaUnitatsPetAnimProd(id)
{
	$.post("PHPForm/DetallComanda/lib/PetAnimProdConfirmaEliminaUnitats.php",{id:id}, LlegadaConfirmaEliminaUnitatsPetAnimProd);			
}

function LlegadaConfirmaEliminaUnitatsPetAnimProd(data)
{
	//alert(data);
	var cadena = data.split("|");
	if (cadena[0]=="0")	{ 
		CarregaGestioComandes(cadena[1]);
		$("#DIVEliminaAdmin").fadeOut("slow");}
	else alert("Ha ocurrido un error");
}

function CancelaDenegaPetAnimProd(id)
{
	$("#EstatPetAnimProd"+id +" option[value=1]").attr("selected",true);
	$("#DIVEliminaAdmin").fadeOut("slow");
}

function AfegirDataPetAnimProd(id){
	var fecha = $("#fechaPetAnimProd"+id).val();
	
	$.post("PHPForm/DetallComanda/lib/PetAnimProdAfegirData.php",{id:id, fecha:fecha}, LlegadaAfegirDataPetAnimProd);			
}

function LlegadaAfegirDataPetAnimProd(data){
	CarregaGestioComandes(data);	
}