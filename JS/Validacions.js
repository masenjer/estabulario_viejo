
function ValidaEntero(campo)
{
	var RegExPattern = 	"^(?:\+|-)?\d+$";
	//alert(campo);
	if ((campo.value.match(RegExPattern)) && (campo.value!='')) 
	{  
        return true;  
  	} 
	else 
	{  
        return false;  
    }   	
}

function validarEntero(valor){
      if (valor)
	  {
	  	if (isNaN(valor)) {
       	     //entonces (no es numero) devuelvo el valor cadena vacia
       	     return false;
      	}else{
       	     //En caso contrario (Si era un número) devuelvo el valor
       	     return true;
      	}
	  }else return true;
} 

function ValidaEnteroRegExp(c)
{
	var campo = c;
	var RegExPattern = /^\d+$/;  //	/^(?:\+|-)?\d+$/;    --------> Con signo
	
//	alert("Valida: "+RegExPattern.test(c));
//	
//	return (RegExPattern.test(c));
	if ((campo.match(RegExPattern)) && (campo!='')) 
	{  
        return true;  
  	} 
	else 
	{  
		//alert("campo:" + campo);
        return false;  
    }   	
}

function ValidaSoloLetra(c)
{
	var campo = c;
	var RegExPattern = 	/^[A-ZñÑa-záéíóú àèìòù ÁÉÍÓÚçÇ üï ]+$/;
	if ((campo.match(RegExPattern)) && (campo!='')) 
	{  
		//alert("si");
        return true;  
  	} 
	else 
	{  
		alert("Nom"+String.fromCharCode(233)+"s pots fer servir lletres al camp Responsable");
		//alert("no");
        return false;  
    }   	
}

function ValidaSoloLetraGeneral(c)
{
	var campo = c;
	var RegExPattern = 	/^[A-ZñÑa-záéíóú ÁÉÍÓÚçÇ ü ]+$/;
	if ((campo.match(RegExPattern)) && (campo!='')) 
	{  
		//alert("si");
        return true;  
  	} 
	else 
	{  
        return false;  
    }   	
}

function ValidaTelefon(campo)
{
	campo = campo.replace(/ /gi,"");
	
	if (campo.length != 9) 
	{
		alert("El n"+String.fromCharCode(250)+"mero de tel"+String.fromCharCode(232)+"fon introdu"+String.fromCharCode(239)+"t no "+String.fromCharCode(233)+"s correcte");
		return false;
	}
	else
	{
		var RegExpPattern = /^\d{9}$/g;
		
		if((campo.match(RegExpPattern))&&(campo!=''))
		{
			return true;	
		}
		else
		{
			alert("El n"+String.fromCharCode(250)+"mero de tel"+String.fromCharCode(232)+"fon introdu"+String.fromCharCode(239)+"t no "+String.fromCharCode(233)+"s correcte");
			return false;	
		}
	}
}


function ValidaExtensioTelefon(campo)
{
	campo = campo.replace(/ /gi,"");
	
	if ((campo.length != 9)&&(campo.length != 4)) 
	{
		return false;
	}
	else
	{
		var RegExpPattern = /^\d{9}$/g;
		var RegExpPattern2 = /^\d{4}$/g;
		
		if(((campo.match(RegExpPattern))||(campo.match(RegExpPattern2)))&&(campo!=''))return true;	
		else return false;	
	}
}



function ValidarEmailUAB(cadena)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@uab+\.([A-Za-z]{2,4})$/;
	if(reg.test(cadena) == false) 
 	{
      return true;
	}
}

function ValidaCentreCost(cadena)
{
	
	var reg1 = /^([A-Za-z]{1})+([0-9]{6})$/;

	if(!reg1.test(cadena))
		{
			return true;
		}else
		{
			return false;
		}
}

