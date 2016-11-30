function ObreLoginUsers()
{
	$("#DIVGestioLoginUsers").fadeIn("slow");
	InicialitzaLoginUsers();
}


function InicialitzaLoginUsers()
{
		
	$("#URUsuari").val("");
	$("#URPassword").val("");
	$("#UNNiu").val("");
	$("#UNUsuari").val("");
	$("#UNPass1").val("");
	$("#UNPass2").val("");
	$("#UNNom").val("");
	$("#UNCognoms").val("");
	$("#UNEmail").val("");
	$("#UNTelefon").val("");
	$("#UNInvesResp").val("");
	$("#UNEmailResp").val("");
	$("#UNDep").val("");
	$("#OblidatEmail").val("");
	Recaptcha.reload(""); //t
	$("#URUsuari").focus();
}
function TancaLoginUsers()
{
	$("#DIVGestioLoginUsers").fadeOut("slow");
}

function ValidaNewUser()
{
		var Niu,U,P1,P2,N,C,E,I;
	var error = 0;
	
	//alert("entro");
	
	
//	if ((isNaN($("#UNNiu").val()))||($("#UNNiu").val()==""))
//	{
//		alert("Has d'introdu\ïr un Niu correcte");
//		error = 1;	
//	}
//	else
//	{
		Niu = $("#UNNiu").val();
//	}	


	if ($("#UNUsuari").val() != "")
	{
		U = $("#UNUsuari").val();
	}
	else
	{
		alert("Has d'introdu\ïr un nom d'usuari correcte");
		error = 1;		
	}	
	
		
		
			
	if ($("#UNPass1").val() != "")
	{
		P1 = $("#UNPass1").val();
	}
	else
	{
		alert("Has d'introdu\ïr un Password correcte");
		error = 1;	
	}	
			
			
	if ($("#UNPass2").val() != "")
	{
		P2 = $("#UNPass2").val();
	}
	else
	{
		alert("Has d'introdu\ïr un Password correcte");
		error = 1;	
	}	
			
	
	if ($("#UNPass2").val() != $("#UNPass1").val())
	{
		alert("Els Passwords introdu\ïts no son iguals");
		error = 1;	
	}	
			
	
	if ($("#UNNom").val() != "")
	{
		N = $("#UNNom").val();
	}
	else
	{
		alert("Has d'introdu\ïr un Nom correcte");
		error = 1;	
	}	
			

	if ($("#UNCognoms").val() != "")
	{
		C = $("#UNCognoms").val();
	}
	else
	{
		alert("Has d'introdu\ïr els Cognoms");
		error = 1;	
	}
		
//	if (!ValidaExtensioTelefon($("#UNTelefon").val()))
//	{
//		alert('El n'+String.fromCharCode(250)+'mero de tel'+String.fromCharCode(232)+'fon/ extensi'+String.fromCharCode(243)+'  introdu'+String.fromCharCode(239)+'t no '+String.fromCharCode(233)+'s correcte');
//		error = 1;
//	}
	
	if ($("#UNEmail").val() != "")
	{
		E = $("#UNEmail").val();
	}
	else
	{
		alert("Has d'introdu"+String.fromCharCode(239)+"r un email correcte");
		error = 1;	
	}	
	
	if (ValidarEmail(E))
	{
		alert('L\'email introdu'+String.fromCharCode(239)+'t no '+String.fromCharCode(233)+'s correcte');
		error = 1;
	}

		
	if ($("#UNInvesResp").val() != "")
	{
		I = $("#UNInvesResp").val();
	}
	else
	{
		alert('Has d\'introdu'+String.fromCharCode(239)+'r un nom d\'investigador o responsable correcte');
		error = 1;	
	}	
	
	if ($("#UNEmailResp").val() != "")
	{
		ER = $("#UNEmailResp").val();
	}
	else
	{
		alert('L\'email del responsable introdu'+String.fromCharCode(239)+'t no '+String.fromCharCode(233)+'s correcte');
		error = 1;	
	}	
	
	if ( ER && ValidarEmail(ER))
	{
		alert('L\'email del responsable introdu'+String.fromCharCode(239)+'t no '+String.fromCharCode(233)+'s correcte');
		error = 1;
	}

	if (!$("#UNDep").val())
	{
		alert('Has d\'introdu'+String.fromCharCode(239)+'r un Departament / Facultat / Centre v'+String.fromCharCode(224)+'lid');
		error = 1;	
	}	

		
		
	if (error == 0)
	{
		ValidaRecaptcha('CreaNewUser');
	}else Recaptcha.reload();
	
}

function CreaNewUser() 
{
	var Niu,U,P1,P2,N,C,T,E,I,ER,UC,D;
	var error = 0;

	Niu = $("#UNNiu").val();
	U = $("#UNUsuari").val();
	P1 = SHA1($("#UNPass1").val());
	P2 = SHA1($("#UNPass2").val());
	N = $("#UNNom").val();
	C = $("#UNCognoms").val();
	T = $("#UNTelefon").val();
	E = $("#UNEmail").val();
	I = $("#UNInvesResp").val();
	ER = $("#UNEmailResp").val();
	D = $("#UNDep").val();
	
//	alert("entro");
//	alert("Niu: "+Niu+", U:"+U+", P:"+P1+", N:"+N+", C:"+C+", E:"+E+", I:"+I);
	
	$.post("PHPForm/NewUserPublic.php",{Niu:Niu,U:U,P:P1,N:N,C:C,T:T,E:E,I:I,ER:ER,D:D},LlegadaCreaNewUser);	
}

function LlegadaCreaNewUser(data)
{
	//alert(data);
	var cadena = data.split("|");
	
	switch (cadena[0])
	{
		case "0":	$("#IdUser").val(cadena[1]);
					alert("La seva petici"+String.fromCharCode(243)+" est"+String.fromCharCode(224)+" en curs. Rebr"+String.fromCharCode(224)+" un correu electr"+String.fromCharCode(242)+"nic de confirmaci"+String.fromCharCode(243)+" un cop el proc"+String.fromCharCode(233)+"s sigui validat pels nostres t"+String.fromCharCode(232)+"cnics.");
					//UsuariValidat(cadena[2],"1");
					TancaLoginUsers();
					break;			
		case "1": 	alert('El nom d\'usuari introdu'+String.fromCharCode(239)+'t ja existeix a la base de dades, introdueix un altre');
					break;
		case "2":	alert('L\'email d\'usuari introdu'+String.fromCharCode(239)+'t ja existeix a la base de dades, introdueix un altre');
					break;
	}
}

function UsuariValidat(Nom,Mailing)
{
	InicialitzaLoginUsers();
	
	if (Mailing == "1") var Coletilla = "Desa";
	else var Coletilla = "A";
	
	$("#DIVGestioLoginUsers").fadeOut("slow");
//	$("#DIVGUMenu").html('<input type="button" id="ButtonTancaSessio" value="Tancar Sessi&oacute;" onclick="TancaSessioUsuariPublic();">');
	
	var codigo = ''+
'	<table cellpadding="0" cellspacing="0" border="0" class="FondoMenuGUPublic">'+
'		<tr>'+
'			<td style="padding:2px">'+Nom+'</td>'+
'			<td style="padding:2px;"><input type="button" id="ButtonGestioUserPublic" onclick="MostraUserComandes();" title = "Gesti&oacute; de les meves comandes"/></td>'+
/*'			<td style="padding:2px;">'+<input type="button" id="ButtonSobreUserPublic" class="ButtonSobreUserPublic'+Mailing+'" onclick="ModificaMailing('+Mailing+');" title = "'+Coletilla+'ctivar suscripci&oacute; a llista de correu de distribuci&oacute;"/></td>'+*/
'			<td style="padding-top:2px;padding-bottom:2px"><input type="button" id="ButtonGestioPasswordUserPublic" onclick="MostraGestioPasswordUsersWeb();" title="Canviar password"/></td>'+
'			<td style="padding:2px"><input type="button" id="ButtonGestioUserExit" onclick="TancaSessioUsuariPublic();" title="Tancar la sessi&oacute;"/></td>'+
'		</tr>'+
'	</table>';
	
	$("#DIVGUMenu").html(codigo);
}

function ComprovaLoginUsersPublic()
{
	var u = $("#URUsuari").val();
	var p = SHA1($("#URPassword").val());
	
	if (u!= "" && p !="")
	{
		antikfres(u,p);	
	}
	else
	{
		alert("Has d'omplir els camps usuari i password per continuar");
	}
}

function LlegadaComprovaLoginUsersPublic(data)
{
//alert(data);
	var cadena = data.split("|");
	
	$("#InOut").val(cadena[0]);
	
	
	if (cadena[0] != "2" && cadena[0] != "")
	{
		if (cadena[0] == "1")
		{
			UsuariValidat(cadena[1], cadena[2]);
			ComprovaSiSessioUser();			
		}
		else
		{
			if(cadena[0] == "3") alert("El seu usuari encara no ha estat validat pels tècnics del Servei d'Estabulari. Disculpi les molèsties, en breu ens possarem en contacte amb vostè");
			else
			if(cadena[0] == "4") alert("L'accés del seu usuari a la web de l'estabulari ha estat denegat. Posis en contacte amb nosaltres per obtenir més informació a través del nostre email de contacte que apareix a la home de la nostra plana web.");
			else alert("L'usuari i/o password introduïts no son correctes");	
		}
	}
}

function ComprovaSiLogin()
{
	$.get("PHPForm/ComprovaSiLogin.php",{},LlegadaComprovaLoginUsersPublic);	
}

function TancaSessioUsuariPublic()
{
	$.get("PHPForm/TancaSessioUsuariPublic.php",{},LlegadaTancaSessioUsuariPublic);	
	$("#InOut").val("");//HomeCarrega();
}

function LlegadaTancaSessioUsuariPublic()
{
	$("#DIVGUMenu").html('<input type="button" id="ButtonAccesUsuaris" value="Acc&eacute;s d\'Usuaris" onclick="ObreLoginUsers();">');
}

function ModificaMailing(m)
{
	$.get("PHPForm/MailingModifica.php",{m:m},LlegadaModificaMailing);	
}

function LlegadaModificaMailing(data)
{
	if (data == "0") alert("Vost"+String.fromCharCode(232)+" ha estat eliminat de la llista de distribuci"+String.fromCharCode(243));
	else alert("Vost"+String.fromCharCode(232)+" ha quedat inscrit a la llista de distribuci"+String.fromCharCode(243));
	
	m1 = data;
	m2 = (data + 1)%2;
	//var cadena =  data.split("|");
	$("#ButtonSobreUserPublic").removeClass("ButtonSobreUserPublic"+m2).addClass("ButtonSobreUserPublic"+m1)	;
	
	document.getElementById("ButtonSobreUserPublic").onclick =  function (){ModificaMailing(m1);};
}

function RecordaDadesUsuari()
{
	var E = $("#OblidatEmail").val();
	
	if (!E || ValidarEmail(E)) alert('L\'email introdu'+String.fromCharCode(239)+'t no '+String.fromCharCode(233)+'s correcte');
	else	$.post("PHPForm/RecordaDadesUsuari.php",{E:E},LlegadaRecordaDadesUsuari);
}

function LlegadaRecordaDadesUsuari(data)
{
	if (data == 0) alert("Aquest email no pertany a cap usuari del sistema");
	else alert("S'han enviat les dades correctament al seu compte de correu electr"+String.fromCharCode(242)+"nic");
	$("#OblidatEmail").val("");	
}

