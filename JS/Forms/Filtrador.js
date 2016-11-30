function MarcaTots(taula)
{
	$("#Filtra"+taula).val("");
	var cadena = $("#Tot"+taula).val().split("|");
	
	for (i=0; i<cadena.length;i++){
		

		MarcaDesmarca(taula, 1, cadena[i], i);
	}
	//alert($("#Filtra"+taula).val());
}

function DesmarcaTots(taula)
{
	
	var cadenaL = $("#Tot"+taula).val().split("|");
	
	//alert("cadenaL ="+ cadenaL);
	
	for (r=0; r<cadenaL.length;r++) 
	{				
		MarcaDesmarca(taula, 0, cadenaL[r], r);
	}
	
	//alert($("#Filtra"+taula).val());
} 


function MarcaDesmarca(taula, accio, valor, id)
{	
	//alert("Taula:" + taula + ", accio:" + accio + ", valor:" + valor + ", id:" + id);
	
	$("#Img"+taula+id).html('<img src="img/Grid/CuadradoCheck'+accio+'.jpg">');	
	
	if (accio == 0) Desmarca(taula, valor);
	else Marca(taula, valor);	
	
//	alert("accio1:"+accio);
	accio = (accio + 1)%2;
	//alert("accio2:"+accio);

	document.getElementById("TR"+taula+id).onclick =  function (){ MarcaDesmarca(taula, accio, valor, id)};
}

function Marca(taula, valor)
{
	
	//if (taula=="TipusComanda") valor = parseInt(valor)+1;

//	alert("Taula:" + taula + ", valor:" + valor);
	var cadena = $("#Filtra"+taula).val();
	if (cadena == "") cadena =valor ;  
	else cadena = cadena +"|"+ valor ; 
//	alert(cadena);
	$("#Filtra"+taula).val(cadena);
	//alert("Marca: "+$("#Filtra"+taula).val());
//	alert($("#Filtra"+taula).val());
}

function Desmarca(taula, valor)
{
	//if (taula=="TipusComanda") valor = parseInt(valor)+1;

	var cadena = $("#Filtra"+taula).val().split("|");
	
	//alert("#Filtra"+taula);
//	alert(cadena);
	var cadena2 = "";
	var aux=0;
	//alert(cadena);
	for (i=0; i<cadena.length; i++)
	{
		if (cadena[i] != valor )
		{
			if (aux == 0) 
			{	
				cadena2 = cadena[i]; 
				aux = 1;
			}
			else cadena2 = cadena2 + "|" + cadena[i];
		}
	}
	//alert(cadena2);
	$("#Filtra"+taula).val(cadena2);
	//alert("Desmarca: "+$("#Filtra"+taula).val());
	//alert($("#Filtra"+taula).val());
}

