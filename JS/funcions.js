

function ComprovaLogin()
{
	var u =  $('#LGUsuario').val();
	var p =  SHA1($('#LGPassword').val());
	
	//alert(p);
	antikfresPrivat(u,p);
}

function LlegadaComprovaLogin(data)
{
	//alert(data);
	$("#loginAdmin").submit();
}

function ValidarEmail(cadena)
{
 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 if(reg.test(cadena) == false) 
 	{
      return true;
	}
}

function submitenter(tipus,e,valor)
{
	
	var keycode;
	if (window.event) keycode = window.event.keyCode;
	else if (e.which) keycode = e.which;
	else return true;
	
	
	if (keycode == 13)
    {
	    switch (tipus)
	    {
			case 0: 	GuardaTitolMS(valor);
						break;
						
			case 1: 	GuardaTitolLin(valor);
						break;
						
			case 2:		ComprovaLogin();
						break;
			
			case 3:		GuardaTitolLinMD(valor);
						break;
						
			case 4:		GuardaDescripcioLinMD(valor);
						break;
						
			case 5:		GuardaRangLinMenu(valor);
						break;
						
			case 6:		GuardaRangMS(valor);
						break;
						
			case 7:		GuardaRangMD(valor);
						break;
			
			case 8:		GuardaTextDestacatButton();
						break;
		
			case 9:		GuardaRangDestacat(valor);
						break;

			case 10:	GuardaRangEnDir(valor);
						break;
						
			case 11: 	ComprovaLoginUsersPublic();
						break;
	    }
    } 
	
	if (keycode == 27)
    {
	    switch (tipus)
	    {
			case 0: 	CancelaTitolMS(valor);
						break;
						
			case 1: 	CancelaTitolLin(valor);
						break;
					
			case 3:		CancelaTitolLinMD(valor);
						break;
						
			case 4:		CancelaDescripcioLinMD(valor);
						break; 
									
			case 8:		CancelaTextDestacatButton();
						break;
		
	    }
    } 

}

function DefineCalendario(Calendario)
{
	$("#"+Calendario).datepicker({
		showOn: 'both',
   		buttonImage: 'img/Calendario.png',
        buttonImageOnly: true,
	    changeYear: true,
		numberOfMonths: 1,
		beforeShow: function (textbox, instance) {   
                instance.dpDiv.css({
                    marginTop: (-textbox.offsetHeight) + 'px',
                    marginLeft: textbox.offsetWidth + 'px'
                });
                },
		onSelect: function(textoFecha, objDatepicker){
			//$("#mensaje").html("<p>Has seleccionado: " + textoFecha + "</p>");
		   }
		}); 	
}

function CarregaPagina()
{
	MenuSCarrega();
	BannerHome();
	//HomeCarrega();
	
	
	
	DefineCalendario('FechaNoticia');
	DefineCalendario('FechaNoticiaIN');
	DefineCalendario('FechaNoticiaOUT');
	
	NoticiesCarregaContingut();
	MenuNoticiesCarrega();
	MenuDestacatCarrega();
	MenuEnDirCarrega();
	CargaNoticias('');	
	CarregaGridGU();
	InicialitzaUserGU();
	AnadirDestacado();
	AnadirEnDir(); 
		
	//SI.Files.stylizeById('ImatgeNoticia');
	
	if (!window.location.hash)
	{
		window.location.hash = "!/home";
		HomeCarrega();
	}

	ComprovaSiLogin();
}

function HomeCarrega()
{
	$('#ContingutPages').hide();
	$('#MapaWeb').hide();
	$("#DIVHome").fadeIn(1000);
	
	CarregaMenuDestacatsHome();
	CarregaMenuEnDirHome();
	CarregaMenuContacteHome();
	
	CarregaVideo();

	window.location.hash = "!/home";
}

function CarregaVideo()
{
	$('#VideoEnFicha').html('<a href="http://fmstream.uab.es/media/cr-med/Videohome/blabla.flv" style= "display:block ;width:188px;height:120px;"  id="player"> </a> <script>flowplayer("player", "flowplayer/flowplayer-3.2.7.swf", {clip:  { autoPlay: false, autoBuffering: true  }});</script>');
}

function MenuSCarrega()
{
	$.get("PHP/MenuSCarrega.php",{},LlegadaMenuSCarrega);
}

function LlegadaMenuSCarrega(data)
{
	$("#DIVMenuSuperior").html(data);
	CompruebaSiMenuGU();
}


function NovaMS(IdCap, IdLin)
{
	$.get("PHP/MenuSAdd.php",{IdCap:IdCap,IdLin:IdLin},LlegadaNovaMS);
}

function LlegadaNovaMS(data)
{
	MenuSCarrega();
	TancaEliminaTOT();
}

function DeleteMS(IdCap)
{
	$.get("PHP/MenuSDelete.php",{IdCap:IdCap},LlegadaNovaMS);
}


function EditaTitolMS(id)
{
	
	document.getElementById("tdMS"+id).ondblclick =  function (){};

	var titol = $('#DIVTitolMS'+id).html();
	var cadena = titol.split("<img ");
	
	var accions = ' onKeyUp="submitenter(0,event,'+id+')"';
	
	$('#DIVTitolMS'+id).html('<input type="text" id="TextTitolMS'+id+'" value="'+ cadena[0] +'" '+accions+' />');
}

function CancelaTitolMS(id)
{
	$('#DIVTitolMS'+id).html($('#tdMSAntic'+id).val());
	document.getElementById("tdMS"+id).ondblclick =  function (){EditaTitolMS(id)};
}

function GuardaTitolMS(id)
{
	var titol = $('#TextTitolMS'+id).val();
	$.get("PHP/MenuSGuardaTitol.php",{id:id,titol:titol},LlegadaGuardaTitolMS);
}

function LlegadaGuardaTitolMS(data)
{
	
	var cadena = data.split("|");
	$('#tdMSAntic'+cadena[0]).val(cadena[1]);
	$('#DIVTitolMS'+cadena[0]).html(cadena[1]);
	document.getElementById("tdMS"+cadena[0]).ondblclick =  function (){EditaTitolMS(cadena[0])};
}

function GuardaRangMS(id)
{
	var rang = $('#OrdenMS'+id).val();
	$.get("PHP/MenuSGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangMS);
}

function LlegadaGuardaRangMS(data)
{
	MenuSCarrega(); 
}


function MenuECarrega(n)
{
	$.get("PHP/MenuECarrega.php",{n:n},LlegadaMenuECarrega);
}

function LlegadaMenuECarrega(data) 
{
	$('#VideoEnFicha').html("");
	$('#ME').html("");	
	$('#ME').html(data);	 
}

function CanviaCPage(tipo)
{
	MenuECarrega(tipo);
	MenuMDCarrega(tipo);
	CercaPrimeraPagina(tipo);
}

function CercaPrimeraPagina(IdCap)
{
	$.get("PHP/CercaPrimeraPagina.php",{IdCap:IdCap},LlegadaCercaPrimeraPagina);
}

function LlegadaCercaPrimeraPagina(data)
{
	MostraPage(data,1);
}

function NovaLPage(IdCap, IdLin)
{
	$.get("PHP/LinPageAdd.php",{IdCap:IdCap,IdLin:IdLin},LlegadaNovaLPage);
}

function NovaLPageTitol(IdCap, IdLin)
{
	$.get("PHP/LinPageAddTitol.php",{IdCap:IdCap,IdLin:IdLin},LlegadaNovaLPage);
}

function LlegadaNovaLPage(data)
{
	MenuECarrega(data);
	TancaEliminaTOT();
}

function DeleteLPage(IdCap, IdLin)
{
	$.get("PHP/LinPageDelete.php",{IdCap:IdCap,IdLin:IdLin},LlegadaNovaLPage);
}


function EditaTitolLPage(id)
{
	document.getElementById("tdME"+id).ondblclick =  function (){};

	var titol = $('#DIVTitolLPage'+id).html();

	var accions = ' onKeyUp="submitenter(1,event,'+id+')"';
	
	$('#DIVTitolLPage'+id).html('<input type="text" id="TextTitolLpage'+id+'" value="'+ titol +'" '+accions+' />');
}
function CancelaTitolLin(id)
{
	$('#DIVTitolLPage'+id).html($('#tdMEAntic'+id).val());
	document.getElementById("tdME"+id).ondblclick =  function (){EditaTitolLPage(id)};
}

function GuardaTitolLin(id)
{
	var titol = $('#TextTitolLpage'+id).val();
	$.get("PHP/LinPageGuardaTitol.php",{id:id,titol:titol},LlegadaGuardaTitolLin);
}

function LlegadaGuardaTitolLin(data)
{
	var cadena = data.split("|");
	$('#DIVTitolLPage'+cadena[0]).html(cadena[1]);
	document.getElementById("tdME"+cadena[0]).ondblclick =  function (){EditaTitolLPage(cadena[0])};
	$('#tdMEAntic'+cadena[0]).val(cadena[1]);
}

function GuardaRangLinMenu(id)
{
	var rang = $('#OrdenME'+id).val();
	$.get("PHP/LinPageGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangLinMenu);
}

function LlegadaGuardaRangLinMenu(data)
{
	MenuECarrega(data); 
}

function MostraPageHash(id,op)
{
	$("#DIVHome").hide();	
	//window.location.hash = "!"+id+"_"+op;

	$.get("PHP/MostraPage.php",{id:id,op:op},LlegadaMostraPageHash);
}

function LlegadaMostraPageHash(data)
{
	var cadena = data.split("|");
	
	//alert(cadena[4]);

	MenuECarrega(cadena[4]);
	MenuMDCarrega(cadena[4]);
	
	$('#DIVTitolPage').html("");	
	$('#DIVTitolPage').html(cadena[0]);	 

	$('#TAContingut').html("");	
	$('#DIVContingutPage').html("");	
	$('#DIVContingutPage').html(cadena[1]);	 
	
	$('#DIVRutaPage').html("");	
	$('#DIVRutaPage').html(cadena[2]);
	
	$('#DIVEditaContingutPage').hide();
	$('#DIVContingutPage').fadeIn(500);	
	
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$("#ContingutPages").fadeIn(1000);
	
	//MEnuECarrega(cadena[5]);
	
	document.getElementById("ButtonEditContingut").onclick =  function (){MostreEditContingut(cadena[3])};
	document.getElementById("ButtonCancelaContingut").onclick =  function (){CancelaEditCont(cadena[3])};
	
 	//$("#DIVContingutPage").translate({original : 'ca'});

	var idop= cadena[3].split(",");	
	var TitolHash = cadena[0].replace(" ","-");
	window.location.hash = "!/"+TitolHash+"_"+idop[0]+"_"+idop[1];
	 
}


function MostraPage(id,op)
{
	$("#DIVHome").fadeOut(1000);

	$.get("PHP/MostraPage.php",{id:id,op:op},LlegadaMostraPage);
}

function LlegadaMostraPage(data)
{
	var cadena = data.split("|");
	
	$('#DIVTitolPage').html("");	
	$('#DIVTitolPage').html(cadena[0]);	 

	$('#TAContingut').html("");	
	$('#DIVContingutPage').html("");	
	$('#DIVContingutPage').html(cadena[1]);	 
	
	$('#DIVRutaPage').html("");	
	$('#DIVRutaPage').html(cadena[2]);
	
	$('#DIVEditaContingutPage').hide();
	$('#DIVContingutPage').fadeIn(500);	
	
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$("#ContingutPages").fadeIn(1000);
	
	//MEnuECarrega(cadena[5]);
	
	document.getElementById("ButtonEditContingut").onclick =  function (){MostreEditContingut(cadena[3])};
	document.getElementById("ButtonCancelaContingut").onclick =  function (){CancelaEditCont(cadena[3])};
	

	var idop= cadena[3].split(",");	
	var TitolHash = cadena[0].replace(" ","-");

	window.location.hash = "!/"+TitolHash+"_"+idop[0]+"_"+idop[1];
}


function MenuMDCarrega(id) 
{
	$.get("PHP/LinMDCarrega.php",{id:id},LlegadaMenuMDCarrega);
}

function LlegadaMenuMDCarrega(data) 
{
	$('#MD').html("");	
	$('#MD').html(data);	 
}

function NovaLinMD(id)
{
	//alert(id);
	$.get("PHP/LinMDAdd.php",{id:id},LlegadaNovaLinMD);
}

function LlegadaNovaLinMD(data)
{
	//alert(data);
	MenuMDCarrega(data);
	TancaEliminaTOT();
}

function DeleteLinMD(IdLinMD)
{
	$.get("PHP/LinMDDelete.php",{IdLinMD:IdLinMD},LlegadaNovaLinMD);
}


function EditaTitolLinMD(id)
{
	document.getElementById("tdLinMD"+id).ondblclick =  function (){};

	var titol = $('#DIVTitolLinMD'+id).html(); 

	var accions = ' onKeyUp="submitenter(3,event,'+id+')"';
	
	$('#DIVTitolLinMD'+id).html('<input type="text" id="TextTitolLinMD'+id+'" value="'+ titol +'" '+accions+' />');
}

function CancelaTitolLinMD(id)
{
	$('#DIVTitolLinMD'+id).html($('#tdLinMDAntic'+id).val());
	document.getElementById("tdLinMD"+id).ondblclick =  function (){EditaTitolLinMD(id);};
}

function GuardaTitolLinMD(id)
{
	var titol = $('#TextTitolLinMD'+id).val();
	$.get("PHP/LinMDGuardaTitol.php",{id:id,titol:titol},LlegadaGuardaTitolLinMD);
}

function LlegadaGuardaTitolLinMD(data)
{
	var cadena = data.split("|");
	$('#tdLinMDAntic'+cadena[0]).val(cadena[1]);
	$('#DIVTitolLinMD'+cadena[0]).html(cadena[1]);
	document.getElementById("tdLinMD"+cadena[0]).ondblclick =  function (){EditaTitolLinMD(cadena[0]);};
}

function EditaDescripcioLinMD(id)
{
	document.getElementById("tdLinDesMD"+id).ondblclick =  function (){};

	var titol = $('#DIVDescripcioLinMD'+id).html();

	var accions = ' onKeyUp="submitenter(4,event,'+id+')"';
	
	$('#DIVDescripcioLinMD'+id).html('<input type="text" id="TextDescripcioLinMD'+id+'" value="'+ titol +'" '+accions+' />');
}

function CancelaDescripcioLinMD(id)
{
	$('#DIVDescripcioLinMD'+id).html($('#tdLinDesMDAntic'+id).val());
	document.getElementById("tdLinDesMD"+id).ondblclick =  function (){EditaDescripcioLinMD(id)};
}

function GuardaDescripcioLinMD(id)
{
	var titol = $('#TextDescripcioLinMD'+id).val();
	$.get("PHP/LinMDGuardaDescripcio.php",{id:id,titol:titol},LlegadaGuardaDescripcioLinMD);
}

function LlegadaGuardaDescripcioLinMD(data)
{
	var cadena = data.split("|");
	$('#tdLinDesMDAntic'+cadena[0]).val(cadena[1]);

	$('#DIVDescripcioLinMD'+cadena[0]).html(cadena[1]);
	document.getElementById("tdLinDesMD"+cadena[0]).ondblclick =  function (){EditaDescripcioLinMD(cadena[0])};
}

function GuardaRangMD(id)
{
	var rang = $('#OrdenMD'+id).val();
	$.get("PHP/LinMDGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangMD);
}

function LlegadaGuardaRangMD(data)
{
	MenuMDCarrega(data); 
}

function MostraPageMD(idLinMD)
{
	//alert(idLinMD);
	$.get("PHP/LinMDMostraPage.php",{IdLinMD:idLinMD},LlegadaMostraPage);
}

function MostreEditContingut(id)
{
	var Contingut = $('#DIVContingutPage').html();
	
	
	$('#TAContingut').html("");

	 var config2 = {
     	filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
    };
		
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; 
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
    var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
	
	
	if ((!isiPad)&&(!isiPad)&&(!isAndroid))
	{
		$('#TAContingut').ckeditor(config2);
	}

	$('#DIVContingutPage').hide();
	$('#DIVEditaContingutPage').show();
	$('#TAContingut').val(Contingut);

	document.getElementById("ButtonTAContingut").onclick =  function (){GuardaContingut(id);};
}

function GuardaContingut(data)
{
	var cadena = data.split(",");
	//$("#FormContingut").submit();
	
	var contingut = $('#TAContingut').val();
	//alert(contingut);
	$.post("PHP/ContingutGuarda.php",{id:cadena[0], op:cadena[1], contingut:contingut},LlegadaGuardaContingut);
}

function LlegadaGuardaContingut(data)
{
	var cadena = data.split("|");
	MostraPage(cadena[0],cadena[1]);
	
//	$('#DIVContingutPage').html(data);
//	$('#DIVEditaContingutPage').hide();
//	$('#DIVContingutPage').show();
}

function CancelaEditCont(id)
{
	$('#DIVEditaContingutPage').hide();
	$('#DIVContingutPage').show();
	
	document.getElementById("ButtonEditContingut").onclick =  function (){MostreEditContingut(id)};

}


function CopiaNomImatge(IMG)
{
	IMG = IMG.split('\\');
		

	var name = "Images/"+IMG[IMG.length-1];
	
	$("#RutaImatge").html(name);
	$("#FormPujaImatge").submit();	
}

function CargaNoticias(id)
{
	$.get("PHP/NoticiesCarrega.php",{Id:id},LlegadaCargaNoticias);	
}

function LlegadaCargaNoticias(data)
{
	var cadena = data.split("|");
	
	$('#TituloNoticia').val(cadena[0]);
	$('#TANoticia').val(cadena[1]);
	$('#FechaNoticia').val(cadena[2]);
	$('#FechaNoticiaIN').val(cadena[3]);
	$('#FechaNoticiaOUT').val(cadena[4]);	
	$('#IdNoticia').val(cadena[5]);	
	
	if (cadena[6])
	{
		var imatge = '<img src = "ImgNot/'+cadena[6]+'" style=width:100px; height:100px >';
		$("#DIVImatgeNoticia").html(imatge);
	}
	$("#NomImatgeNoticia").val(cadena[6]);

	$('#DIVConfirmaEliminaNot').slideUp("slow");	
}


function SaveNoticia()
{
	var T,C,F,FP,FD,id;
	
	T = $('#TituloNoticia').val();
	C = $('#TANoticia').val();
	F = $('#FechaNoticia').val();
	FP = $('#FechaNoticiaIN').val();
	FD = $('#FechaNoticiaOUT').val();
	id = $('#IdNoticia').val();
	IMG = $('#NomImatgeNoticia').val();
	
	if((T!='')&&(C!='')&&(F!='')&&(FP!='')&&(FD!=''))
	{
		$.get("PHP/NoticiesSave.php",{T:T,C:C,F:F,FP:FP,FD:FD,IMG:IMG,id:id},LlegadaSaveNoticia);	
	}
	else
	{
		alert("Has de rellenar todos los campos");	
	}
}

function LlegadaSaveNoticia(data)
{
	if (data != "")
	{
		$('#IdNoticia').val(data);
		MenuNoticiesCarrega();
		alert("Noticia guardada correctamente");		
	}
	else
	{
		alert("Ha ocurrido un error");	
	}
}

function MenuNoticiesCarrega()
{
	$.get("PHP/MenuNoticiesCarrega.php",{},LlegadaMenuNoticiesCarrega);
}

function LlegadaMenuNoticiesCarrega(data)
{
	$('#ContListNoticias').html("");
	$('#ContListNoticias').html(data);
}


function MostraDIVEN()
{	
	if($('#IdNoticia').val() != "")
	{
		$('#DIVConfirmaEliminaNot').slideDown("slow");
	}
	else
	{
		alert("Has de seleccionar primero una noticia para eliminarla");	
	}
}	

function EliminaNoticia()
{
	var id= $('#IdNoticia').val();
	var IMG = $("#NomImatgeNoticia").val();

	if (id != "")
	{	
		$.get("PHP/NoticiesElimina.php",{id:id,IMG:IMG},LlegadaEliminaNoticia);
	}
	else
	{
		alert("Has de seleccionar primero una noticia para eliminarla");	
	}
}

function LlegadaEliminaNoticia(data)
{
	MenuNoticiesCarrega();
	CargaNoticias('');
	$('#DIVConfirmaEliminaNot').slideUp("slow");
	
}

function AbreGestorNoticias()
{
	$('#VideoEnFicha').html('');
	$('#DIVGestioNoticies').fadeIn(1000);
	
		 var config1 = {
        toolbar: [
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
            ['Image','Maximize'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
        ],
     	filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
    };

	
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; 
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
    var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
	
	
	if ((!isiPad)&&(!isiPad)&&(!isAndroid))
	{
		$('#TANoticia').ckeditor(config1);
	}
	

}

function NoticiesCarregaContingut()
{
	$.get("PHP/NoticiesCarregaContingut.php",{},LlegadaNoticiesCarregaContingut);
}

function LlegadaNoticiesCarregaContingut(data)
{
	$("#NOT").html("");
	$("#NOT").html(data);
}

function CopiaNomImatgeNoticia(IMG)
{
	IMG = IMG.split('\\');

	var name = IMG[IMG.length-1];
	
	$("#NomImatgeNoticia").val(name);

	//alert(name);
	$("#DIVImatgeNoticia").delay(3000).html(name);
	$("#FormPujaImatgeNoticia").submit();		
}

function TancaGestorNoticies()
{
	CarregaVideo();
	NoticiesCarregaContingut();
	$('#DIVGestioNoticies').fadeOut();
}




/////////////////////////////////////////////////Grid
function MostraGestioGU()
{
	$('#VideoEnFicha').html('');	
	$('#DIVGU').fadeIn('slow');
}

function TancaGestioUserGU()
{
	CarregaVideo();
	$('#DIVGU').fadeOut('slow');
}

function CarregaGridGU()
{
	$.get("PHP/CarregaGridGU.php",{},LlegadaCarregaGridGU);	
}

function LlegadaCarregaGridGU(data)
{
	$("#DIVGridGU").html(data);
}

/*function EncenLineaGrid(id)
{
	if($("#LineaGridActiu").val() != id)
	{
		$("#GridGU"+id).animate({ backgroundColor: "#e9e9e9" }, 200); 
	}
}

function ApagaLineaGrid(id)
{
	var color;
	
	if (id%2 != 0)
	{
		color = "";	
	}
	else
	{
		color = "URL(img/Grid/GrisTrans.png)";	
	}
	
	//alert(color)
	
	if($("#LineaGridActiu").val() != id)
	{
		document.getElementById("GridGU"+id).style.background="";
		//$("#GridGU"+id).animate({ background: "" }, 0);
		$("#GridGU"+id).animate({ background: color }, 200);
	}
} 
*/
function MarcaLineaGrid(id)
{
	var color;
	
//	if ($("#LineaGridActiu").val()%2 != 0)
//	{
//		color = "";	
//	}
//	else
//	{
//		color = "orange";
//		//color = "URL(img/Grid/GrisTrans.png)";	
//	}

	$("#GridGU"+$("#LineaGridActiu").val()).animate({ background: "" }, 1);
	$("#GridGU"+$("#LineaGridActiu").val()).animate({ background: color }, 200);
	$("#GridGU"+id).animate({ backgroundColor: "orange" }, 200);
	$("#LineaGridActiu").val(id);
}


function CarregaUserGU(id)
{
	MarcaLineaGrid(id);
	$.get("PHP/CarregaUserGU.php",{id:id},LlegadaCarregaUserGU);	
}

function LlegadaCarregaUserGU(data)
{
	var cadena = data.split("|");
	//$N."|".$C."|".$E."|".$U."|".$P."|".$R1."|".$R2."|".$R3."|".$R4."|".$id;
	$("#IdUserGU").val(cadena[20]);
	
	$("#Nombre").val(cadena[0]);
	$("#Apellidos").val(cadena[1]);
	$("#Email").val(cadena[2]);
	$("#UsuarioGU").val(cadena[3]);
	//$("#PasswordGU").val(cadena[4]);
	//$("#Password2GU").val(cadena[4]);
	$("#PasswordGU").val("");
	$("#Password2GU").val("");
	
	if (cadena[5] == 1)
	{
		$("#CheckUsuario").attr("checked",true) ;	
	}
	else
	{
		$("#CheckUsuario").attr("checked",false) ;	
	}
	if (cadena[6] == 1)
	{
		$("#CheckCreacion").attr("checked",true) ;	
	}
	else
	{
		$("#CheckCreacion").attr("checked",false) ;	
	}
	if (cadena[7] == 1)
	{
		$("#CheckEdicion").attr("checked",true) ;	
	}
	else
	{
		$("#CheckEdicion").attr("checked",false) ;	
	}
	
	if (cadena[8] == 1)
	{
		$("#CheckNoticias").attr("checked",true) ;	
	}
	else
	{
		$("#CheckNoticias").attr("checked",false) ;	
	}
	if (cadena[9] == 1)
	{
		$("#CheckWebUsers").attr("checked",true) ;	
	}
	else
	{
		$("#CheckWebUsers").attr("checked",false) ;	
	}
	if (cadena[10] == 1)
	{
		$("#CheckProveidors").attr("checked",true) ;	
	}
	else
	{
		$("#CheckProveidors").attr("checked",false) ;	
	}
	if (cadena[11] == 1)
	{
		$("#CheckInvestigadors").attr("checked",true) ;	
	}
	else
	{
		$("#CheckInvestigadors").attr("checked",false) ;	
	}
	if (cadena[12] == 1)
	{
		$("#CheckProcediments").attr("checked",true) ;	
	}
	else
	{
		$("#CheckProcediments").attr("checked",false) ;	
	}
	if (cadena[13] == 1)
	{
		$("#CheckStock").attr("checked",true) ;	
	}
	else
	{
		$("#CheckStock").attr("checked",false) ;	
	}
	if (cadena[14] == 1)
	{
		$("#CheckComandes").attr("checked",true) ;	
	}
	else
	{
		$("#CheckComandes").attr("checked",false) ;	
	}
	if (cadena[15] == 1)
	{
		$("#CheckEmail").attr("checked",true) ;	
	}
	else
	{
		$("#CheckEmail").attr("checked",false) ;	
	}
	if (cadena[16] == 1)
	{
		$("#CheckFungibles").attr("checked",true) ;	
	}
	else
	{
		$("#CheckFungibles").attr("checked",false) ;	
	}
	if (cadena[17] == 1)
	{
		$("#CheckEspeciesiSoques").attr("checked",true) ;	
	}
	else
	{
		$("#CheckEspeciesiSoques").attr("checked",false) ;	
	}
	if (cadena[18] == 1)
	{
		$("#CheckInformeFacturacio").attr("checked",true) ;	
	}
	else
	{
		$("#CheckInformeFacturacio").attr("checked",false) ;	
	}
	if (cadena[19] == 1)
	{
		$("#CheckInformeTecnic").attr("checked",true) ;	
	}
	else
	{
		$("#CheckInformeTecnic").attr("checked",false) ;	
	}
	
}


function InicialitzaUserGU()
{
	$("#IdUserGU").val("");
	
	$("#Nombre").val("");
	$("#Apellidos").val("");
	$("#Email").val("");
	$("#UsuarioGU").val("");
	$("#PasswordGU").val("");
	$("#Password2GU").val("");		
	$("#CheckUsuario").attr("checked",false) ;	
	$("#CheckCreacion").attr("checked",false) ;	
	$("#CheckEdicion").attr("checked",false) ;	
	$("#CheckNoticias").attr("checked",false) ;	
	$("#CheckWebUsers").attr("checked",false) ;	
	$("#CheckProveidors").attr("checked",false) ;	
	$("#CheckInvestigadors").attr("checked",false) ;	
	$("#CheckProcediments").attr("checked",false) ;	
	$("#CheckStock").attr("checked",false) ;	
	$("#CheckComandes").attr("checked",false) ;	
	$("#CheckEmail").attr("checked",false) ;	
	$("#CheckFungibles").attr("checked",false) ;	
	$("#CheckEspeciesiSoques").attr("checked",false) ;	
	$("#CheckInformeFacturacio").attr("checked",false) ;	
	$("#CheckInformeTecnic").attr("checked",false) ;	
}

function CompruebaSiChecked(nombre)
{
	if ($("#"+nombre).attr("checked"))
	{
		return 1; 
	}
	else
	{
		return 0;	
	}
}

function UpdateUserGU()
{
	var id = $("#IdUserGU").val();	
	
	var N = $("#Nombre").val();	
	var A = $("#Apellidos").val();	
	var E = $("#Email").val();	
	var U = $("#UsuarioGU").val();	
	if ($("#PasswordGU").val())var P = SHA1(($("#PasswordGU").val())); else var P = "";	
	var R1 = CompruebaSiChecked("CheckUsuario");	
	var R2 = CompruebaSiChecked("CheckCreacion");
	var R3 = CompruebaSiChecked("CheckEdicion");
	var R4 = CompruebaSiChecked("CheckNoticias");
	var R5 = CompruebaSiChecked("CheckWebUsers");
	var R6 = CompruebaSiChecked("CheckProveidors");
	var R7 = CompruebaSiChecked("CheckInvestigadors");
	var R8 = CompruebaSiChecked("CheckProcediments");
	var R9 = CompruebaSiChecked("CheckStock");
	var R10 = CompruebaSiChecked("CheckComandes");
	var R11 = CompruebaSiChecked("CheckEmail");//Email
	var R12 = CompruebaSiChecked("CheckFungibles");//Fungibles
	var R13 = CompruebaSiChecked("CheckEspeciesiSoques");
	var R14 = CompruebaSiChecked("CheckInformeFacturacio");
	var R15 = CompruebaSiChecked("CheckInformeTecnic");

	//alert("R14:"+R14+" ,R15:"+R15);

	if ( SHA1($("#PasswordGU").val()) ==  SHA1($("#Password2GU").val()))
	{		
		$.get("PHP/UserGUUpdate.php",{id:id,N:N,A:A,E:E,U:U,P:P,R1:R1,R2:R2,R3:R3,R4:R4,R5:R5,R6:R6,R7:R7,R8:R8,R9:R9,R10:R10,R11:R11,R12:R12,R13:R13,R14:R14,R15:R15},CarregaGridGU);
	}
	else
	{
		alert("El valor del password no es igual en los dos campos");
		$("#PasswordGU").val("");
		$("#Password2GU").val("");	
	}
}

function MostraDivEliminaUser()
{
	if($("#IdUserGU").val() != "")
	{
		$("#DIVEliminaUser").show(500);	
	}
}

function EliminaUser()
{
	var id = $("#IdUserGU").val();	
	
	$.get("PHP/UserGUUDelete.php",{id:id},LlegadaEliminarUser);
} 

function LlegadaEliminarUser(data)
{
	InicialitzaUserGU();
	$("#DIVEliminaUser").hide(500);	
	CarregaGridGU(data);
}

function CompruebaSiMenuGU()
{
	$.get("PHP/CompruebaPermisos.php",{},LlegadaCompruebaSiMenuGU);
}

function LlegadaCompruebaSiMenuGU(data)
{
	
	var cadena = data.split("|");
	
	if (cadena[0] == "1")
	{
		$("#DIVBotoGU").delay(3000).show();	
	}
	else
	{
		$("#DIVBotoGU").hide();	
	}
	
	
	if (cadena[1] == "1")
	{
		$("#MenuLateralAdmin").show();
		ComprovaSiSessioUser();	
	}
	else
	{
		$("#MenuLateralAdmin").hide();	
	}
	

}

function TancaSessio()
{
	$.get("PHP/TancaSessio.php",{},LlegadaTancaSessio);
}

function LlegadaTancaSessio()
{
	location.reload(true);
}

function MostraOpcionsBotoDestacats()
{
	var o = $("#SelectFormatBotoDest").val();
	
	for (i=1;i<3;i++)
	{
		if (i == o)
		{
			$("#DestacatOp"+i).show("slow");		
		}else
		{
			$("#DestacatOp"+i).hide("slow");
		}	
	}
}

function CanviaTextButtonDestacat()
{
	var texto = $("#DivTextButtonProva").html();
	
	$("#DivTextButtonProva").html('<input type="text" id="InputTextButtonProva" value="'+texto+'" onKeyPress="submitenter(8,event,0)">');
	
	document.getElementById("DivTextButtonProva").ondblclick =  function (){};
}

function GuardaTextDestacatButton()
{
	$("#DivTextButtonProva").html( $("#InputTextButtonProva").val());
	document.getElementById("DivTextButtonProva").ondblclick =  function (){CanviaTextButtonDestacat();};
}

function MostraOpcionsTipoEnlaceDest()
{
	var o = $("#SelectTipoEnlaceDest").val();
	
	for (i=1;i<4;i++)
	{
		if (i == o)
		{
			$("#DIVEnllac"+i).show("slow");		
		}else
		{
			$("#DIVEnllac"+i).hide("slow");
		}	
	}
	
	
}


function AnadirDestacado()
{
	//$("#TituloDestacado").val("");
	$("#IdDestacat").val("");
	$("#SelectFormatBotoDest").val("0");
	$("#SelectTipoEnlaceDest").val("0");

	MostraOpcionsTipoEnlaceDest();
	MostraOpcionsBotoDestacats();
	
	$('#colorFondoSelector div').css('backgroundColor', '#19616f');
	$('#colorTextSelector div').css('backgroundColor', '#ffffff');
	$('#DivFonsButtonProva').css('backgroundColor', '#19616f');
	$('#BordeSButton').css('backgroundColor', '#19616f');
	$('#BordeC1Button').css('backgroundColor', '#19616f');
	$('#BordeC2Button').css('backgroundColor', '#19616f');
	$('#BordeIButton').css('backgroundColor', '#19616f');
	$('#DivTextButtonProva').css('color', '#ffffff');
	$("#DivTextButtonProva").html("Texto del Botón");
	
	$("#NomImatgeDestacat").val("");		
	$("#DIVImatgeDestacat").html(""); 
	$('#EllacExternDest').val("");

	$('#NomDocumentDestacatAntic').val("");
	$('#DIVDocumentDestacat').html("");

	CarregaSelectCapMenu();	

}

function TancaGestorDestacats()
{
	CarregaVideo();
	CarregaMenuDestacatsHome();
	$('#DIVGestioDestacats').fadeOut();
}

function CarregaSelectCapMenu(sel)
{
	$.get("PHP/CarregaSelectCapMenu.php",{sel:sel},LlegadaCarregaSelectCapMenu);
}

function LlegadaCarregaSelectCapMenu(data)
{
	$('#EnllacCapMenuDest').html(data);	
}

function CarregaSelectLinsMenu(sel1, sel2,id)
{
	if (id == '')
	{
		id = $("#EnllacCapMenuDest").val();
	}
	$.get("PHP/CarregaSelectLinsMenu.php",{id:id,sel1:sel1,sel2:sel2},LlegadaCarregaSelectLinsMenu);
}

function LlegadaCarregaSelectLinsMenu(data)
{
	var cadena = data.split("|");

	$('#EnllacLinMenu0').html(cadena[0]);	
	$('#EnllacLinMenu1').html(cadena[1]);
	
}

function AbreGestorDestacats()
{
	$('#VideoEnFicha').html('');
	$('#DIVGestioDestacats').fadeIn(1000);
}

function CreaCadenaSelectsDestacats(op)
{
	for (i=0;i<2;i++)
	{
		if (i == op)
		{
			var cadena = $("#EnllacCapMenuDest").val()+"|"+ $("#EnllacLinMenu"+i).val()+"|"+op;	
		}
		else
		{
			$("#EnllacLinMenu"+i).val(0);	
		}	
	}
	$("#CadenaEnllacInternMenuDest").val(cadena);
}

function UpdateDestacat()
{ 
	var OldDoc;
	var id = $("#IdDestacat").val();
	var FB = $("#SelectFormatBotoDest").val();
	var TE = $("#SelectTipoEnlaceDest").val();
	
	if((FB != 0) && (TE != 0))
	{
		if (FB == 1) var IMG = $("#NomImatgeDestacat").val();
		else var IMG = $("#ColorBotoDestacat").val()+"|"+$("#ColorTextDestacat").val()+"|"+$("#DivTextButtonProva").html();
		
		switch(TE)
		{
			case "1": URL = $("#CadenaEnllacInternMenuDest").val();
					break;
			case "2": URL = $("#EllacExternDest").val();
					break;
			case "3": URL = $("#NomDocumentDestacat").val();
					  if( $('#NomDocumentDestacatAntic').val() != $("#NomDocumentDestacat").val()) OldDoc = $('#NomDocumentDestacatAntic').val();
					  $('#NomDocumentDestacatAntic').val(URL);
					break;
			
		}
		
		$.get("PHP/DestacatSave.php",{id:id, FB:FB, TE:TE, IMG:IMG, URL:URL, OldDoc:OldDoc},LlegadaUpdateDestacat);
	}
	else alert("Has de escoger el formato del botón y el tipo de enlace");	
}

function LlegadaUpdateDestacat(data)
{
	alert("Registro Guardado");
	$("#IdDestacat").val(data);	
	MenuDestacatCarrega();
}

function MenuDestacatCarrega()
{
	$.get("PHP/DestacatMenuCarrega.php",{},LlegadaMenuDestacatCarrega);
}

function LlegadaMenuDestacatCarrega(data)
{
	$('#ContListDestacats').html("");
	$('#ContListDestacats').html(data);
}

function CopiaNomImatgeDestacat(IMG)
{
	IMG = IMG.split('\\');

	var name = IMG[IMG.length-1];
	
	$("#NomImatgeDestacat").val(name);

	
	//alert(name);
	$("#DIVImatgeDestacat").delay(3000).html('<div style="width:208; height:41px; background:URL(ImgDes/'+name+')"></div>');
	$("#FormPujaImatgeDestacat").submit();		
}

function CopiaNomDocumentDestacat(IMG)
{
	IMG = IMG.split('\\');

	var name = IMG[IMG.length-1];
	
	$("#NomDocumentDestacat").val(name);
	//alert(name);
	$("#DIVDocumentDestacat").delay(3000).html(name);
	$("#FormPujaNomDocumentDestacat").submit();		
}

function GuardaRangDestacat(id)
{
	var rang = $('#OrdreDestatcat'+id).val();
	$.get("PHP/DestacatGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangDestacat);
}

function LlegadaGuardaRangDestacat(data)
{
	MenuDestacatCarrega(); 
}

function CargaDestacatFitxa(id)
{
	$('#DIVConfirmaEliminaDestacat').slideUp("slow");

	$.get("PHP/DestacatCarregaFitxa.php",{id:id},LlegadaCargaDestacatFitxa);
}

function LlegadaCargaDestacatFitxa(data)
{
	var cadena = data.split("*****");	
	
//	 $FB."|".$IMG."|".$TE."|".$URL."|".id;

	$("#IdDestacat").val(cadena[4]);
	$("#SelectFormatBotoDest").val(cadena[0]);
	$("#SelectTipoEnlaceDest").val(cadena[2]);

	MostraOpcionsTipoEnlaceDest();
	MostraOpcionsBotoDestacats();
	
	
	if (cadena[0] == "1")
	{
		//		Es una imagen
		$("#NomImatgeDestacat").val(cadena[1]);		
		$("#DIVImatgeDestacat").html('<div style="width:208px; height:41px; background:URL(ImgDes/'+cadena[1]+')"></div>');
	}
	else
	{
		
		var cadenaB = cadena[1].split("|");

		$('#colorFondoSelector div').css('backgroundColor', cadenaB[0]);
		$('#colorTextSelector div').css('backgroundColor', cadenaB[1]);
		$('#DivFonsButtonProva').css('backgroundColor', cadenaB[0]);
		$('#BordeSButton').css('backgroundColor', cadenaB[0]);
		$('#BordeC1Button').css('backgroundColor', cadenaB[0]);
		$('#BordeC2Button').css('backgroundColor', cadenaB[0]);
		$('#BordeIButton').css('backgroundColor', cadenaB[0]);
		$('#DivTextButtonProva').css('color',cadenaB[1]);
		$("#DivTextButtonProva").html(cadenaB[2]);
		$("#ColorBotoDestacat").val(cadenaB[0]);
		$("#ColorTextDestacat").val(cadenaB[1]);
	}
	
	switch (cadena[2])
	{
		case "1":
					
				var cadenaC = cadena[3].split("|");				
				$("#EnllacCapMenuDest").val(cadenaC[0]);				 				 
				CarregaSelectCapMenu(cadenaC[0]);
								
				if (cadenaC[2] == 0)
				{
					CarregaSelectLinsMenu(cadenaC[1],'',cadenaC[0] );
				}else
				{ 
					CarregaSelectLinsMenu('',cadenaC[1],cadenaC[0] );
				}
				$("#CadenaEnllacInternMenuDest").val(cadena[3]);
				break;	
				
		case "2": 
					$('#EllacExternDest').val(cadena[3]);
				break;

		case "3": 	
					$("#NomDocumentDestacat").val(cadena[3]);
					$('#DIVDocumentDestacat').html(cadena[3]);
					$('#NomDocumentDestacatAntic').val(cadena[3]);
				break;
	}
}

function MostraDIVDes()
{	
	if($('#IdDestacat').val() != "")
	{
		$('#DIVConfirmaEliminaDestacat').slideDown("slow");
	}
	else
	{
		alert("Has de seleccionar primero un destacado para eliminarlo");	
	}
}	

function EliminaDestacat()
{
	var id= $('#IdDestacat').val();
	
	
	if($("#SelectFormatBotoDest").val() == '1')
	{
		var IMG = $("#NomImatgeDestacat").val();
	}
	

	if (id != "")
	{	
		$.get("PHP/DestacatsElimina.php",{id:id,IMG:IMG},LlegadaEliminaDestacat);
	}
	else
	{
		alert("Has de seleccionar primero un destacado para eliminarlo");	
	}
}

function LlegadaEliminaDestacat(data)
{
	MenuDestacatCarrega();
	AnadirDestacado();
	$('#DIVConfirmaEliminaDestacat').slideUp("slow");
	
}

function CarregaMenuDestacatsHome()
{
	$.get("PHP/DestacatMenuCarrega.php",{h:'1'},LlegadaMenuDestacatHomeCarrega);
}

function LlegadaMenuDestacatHomeCarrega(data)
{
	$('#ContHomeListDestacats').html("");
	$('#ContHomeListDestacats').html(data);
}

function AnadirEnDir()
{
	$("#IdEnDir").val("");
	$("#TituloEnDir").val("");
	$("#SelectTipoEnlaceEnDir").val("0");
	$("#EllacExternEnDir").val("");

	MostraOpcionsTipoEnlaceDirecto();
	
	CarregaSelectCapMenuEnDir();	
}


function MostraOpcionsTipoEnlaceDirecto()
{
	var o = $("#SelectTipoEnlaceEnDir").val();
	
	for (i=1;i<4;i++)
	{
		if (i == o)
		{
			$("#DIVEnllacDir"+i).show("slow");		
		}else
		{
			$("#DIVEnllacDir"+i).hide("slow");
		}	
	}
	
	
}


function CreaCadenaSelectsEnDir(op)
{
	for (i=0;i<2;i++)
	{
		if (i == op)
		{
			var cadena = $("#EnllacCapMenuEnDir").val()+"|"+ $("#EnllacLinMenuEnDir"+i).val()+"|"+op;	
		}
		else
		{
			$("#EnllacLinMenuEnDir"+i).val(0);	
		}	
	}
	$("#CadenaEnllacInternMenuEnDir").val(cadena);
	
}

function CopiaNomDocumentEnDir(IMG)
{
	
	IMG = IMG.split('\\');

	var name = IMG[IMG.length-1];
	
	$("#NomDocumentEnDir").val(name);	//alert(name);
	
	$("#DIVDocumentEnDir").delay(3000).html(name);
	$("#FormPujaNomDocumentEnDir").submit();		
}



function UpdateEnDir()
{ 
	var id = $("#IdEnDir").val();
	var Titol = $("#TituloEnDir").val();
	var TE = $("#SelectTipoEnlaceEnDir").val();
	
	if ((TE != 0)&&(Titol != ""))
	{	
		
		switch(TE)
		{
			case "1": URL = $("#CadenaEnllacInternMenuEnDir").val();
					break;
			case "2": URL = $("#EllacExternEnDir").val();
					break;
			case "3": URL = $("#NomDocumentEnDir").val();
					  if( $('#NomDocumentEnDirAntic').val() != $("#NomDocumentEnDir").val()) OldDoc = $('#NomDocumentEnDirAntic').val();
					  $('#NomDocumentEnDirAntic').val(URL);
					break;
			
		}

		$.get("PHP/EnDirSave.php",{id:id, Titol:Titol, TE:TE, URL:URL},LlegadaUpdateEnDir);
	}
	else alert("Has de rellenar todos los campos");	
}

function LlegadaUpdateEnDir(data)
{
	alert("Registro Guardado");
	$("#IdEnDir").val(data);	
	MenuEnDirCarrega(); 
	
}


function CarregaSelectCapMenuEnDir(sel)
{
	$.get("PHP/CarregaSelectCapMenu.php",{sel:sel},LlegadaCarregaSelectCapMenuEnDir);
}

function LlegadaCarregaSelectCapMenuEnDir(data)
{
	$('#EnllacCapMenuEnDir').html(data);	
}

function CarregaSelectLinsMenuEnDir(sel1, sel2,id)
{
	if (id == '')
	{
		id = $("#EnllacCapMenuEnDir").val();
	}
	$.get("PHP/CarregaSelectLinsMenu.php",{id:id,sel1:sel1,sel2:sel2},LlegadaCarregaSelectLinsMenuEnDir);
}

function LlegadaCarregaSelectLinsMenuEnDir(data)
{
	var cadena = data.split("|");

	$('#EnllacLinMenuEnDir0').html(cadena[0]);	
	$('#EnllacLinMenuEnDir1').html(cadena[1]);
	
}

function MenuEnDirCarrega()
{
	$.get("PHP/EndirMenuCarrega.php",{},LlegadaMenuEnDirCarrega);
}

function LlegadaMenuEnDirCarrega(data)
{
	$('#ContListEnDir').html("");
	$('#ContListEnDir').html(data);
}

function GuardaRangEnDir(id)
{
	var rang = $('#OrdreEnDir'+id).val();
	$.get("PHP/EnDirGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangEnDir);
}

function LlegadaGuardaRangEnDir(data)
{
	MenuEnDirCarrega(); 
}


function CargaEnDirFitxa(id)
{
	$('#DIVConfirmaEliminaEnDir').slideUp("slow");
	$.get("PHP/EnDirCarregaFitxa.php",{id:id},LlegadaCargaEnDirFitxa);
}

function LlegadaCargaEnDirFitxa(data)
{
	var cadena = data.split("*****");	

	$("#IdEnDir").val(cadena[3]);
	$("#TituloEnDir").val(cadena[0]);	
	$("#SelectTipoEnlaceEnDir").val(cadena[1]);

	MostraOpcionsTipoEnlaceDirecto();
	
	
		switch (cadena[1])
	{
		case "1":
					
				var cadenaC = cadena[2].split("|");
				 $("#EnllacCapMenuEnDir").val(cadenaC[0]);
				 
				CarregaSelectCapMenuEnDir(cadenaC[0]);
			
				if (cadenaC[2] == 0)
				{
					CarregaSelectLinsMenuEnDir(cadenaC[1],'',cadenaC[0] );
				}
				
				else
				{ 
					CarregaSelectLinsMenuEnDir('',cadenaC[1],cadenaC[0] );
				}
				
				$("#CadenaEnllacInternMenuEnDir").val(cadena[2]);
				break;	
				
		case "2": 
				$('#EllacExternEnDir').val(cadena[2]);
				break;

		case "3": 	
				$("#NomDocumentEnDir").val(cadena[2]); 	
				$('#DIVDocumentEnDir').html(cadena[2]);
				$('#NomDocumentEnDirAntic').val(cadena[2]);
				break;
	}

	
	
	if (cadena[1] == 1)
	{
		
		var cadenaC = cadena[2].split("|");
		 $("#EnllacCapMenuEnDir").val(cadenaC[0]);
		 
		CarregaSelectCapMenuEnDir(cadenaC[0]);
		
		
		
		if (cadenaC[2] == 0)
		{
			CarregaSelectLinsMenuEnDir(cadenaC[1],'',cadenaC[0] );
		}
		
		else
		{ 
			CarregaSelectLinsMenuEnDir('',cadenaC[1],cadenaC[0] );
		}
		
		$("#CadenaEnllacInternMenuEnDir").val(cadena[2]);

	}else $('#EllacExternEnDir').val(cadena[2]);
}


function MostraDIVEnDirElimina()
{	
	if($('#IdEnDir').val() != "")
	{
		$('#DIVConfirmaEliminaEnDir').slideDown("slow");
	}
	else
	{
		alert("Has de seleccionar primero un Enlace Directo para eliminarlo");	
	}
}	


function AnadirEnDir()
{
	//$("#TituloDestacado").val("");
	$("#IdEnDir").val("");
	$("#TituloEnDir").val("");	
	$("#SelectTipoEnlaceEnDir").val("0");

	MostraOpcionsTipoEnlaceDirecto();

	CarregaSelectCapMenuEnDir();	

}

function EliminaEnDir()
{
	var id= $('#IdEnDir').val();
	
	if (id != "")
	{	
		$.get("PHP/EnDirElimina.php",{id:id},LlegadaEliminaEnDir);
	}
	else
	{
		alert("Has de seleccionar primero un enlace directo para eliminarlo");	
	}
}

function LlegadaEliminaEnDir(data)
{
	MenuEnDirCarrega();
	AnadirEnDir();
	$('#DIVConfirmaEliminaEnDir').slideUp("slow");
	
}


function CarregaMenuEnDirHome()
{
	$.get("PHP/EndirMenuHomeCarrega.php",{h:'1'},LlegadaCarregaMenuEnDirHome);
}

function LlegadaCarregaMenuEnDirHome(data)
{
	$('#ContHomeListEnDir').html("");
	$('#ContHomeListEnDir').html(data);
}

function AbreGestorEnDir()
{
	$('#VideoEnFicha').html('');
	$("#DIVGestioEnDir").fadeIn("slow");	
}

function CarregaEnllacIntern(URL)
{
	var cadena = URL.split("|");
	
	//CanviaCPage(cadena[0]);
	MenuECarrega(cadena[0]);
	MenuMDCarrega(cadena[0]);
	cadena[2] = parseInt(cadena[2]) + 1;
	
	MostraPage(cadena[1],cadena[2]);
}

function TancaGestorEnDir()
{
	CarregaVideo();
	CarregaMenuEnDirHome();
	$('#DIVGestioEnDir').fadeOut();
}

///////////////////////////////////////////////////////Contacte

function CarregaSelectCapMenuContacte(sel)
{
	$.get("PHP/CarregaSelectCapMenu.php",{sel:sel},LlegadaCarregaSelectCapMenuContacte);
}

function LlegadaCarregaSelectCapMenuContacte(data)
{
	$('#EnllacCapMenuContacte').html(data);	
}

function CarregaSelectLinsMenuContacte(sel1, sel2,id)
{
	if (id == '')
	{
		id = $("#EnllacCapMenuContacte").val();
	}
	$.get("PHP/CarregaSelectLinsMenu.php",{id:id,sel1:sel1,sel2:sel2},LlegadaCarregaSelectLinsMenuContacte);
}

function LlegadaCarregaSelectLinsMenuContacte(data)
{
	var cadena = data.split("|");

	$('#EnllacLinMenuContacte0').html(cadena[0]);	
	$('#EnllacLinMenuContacte1').html(cadena[1]);
	
}

function CarregaContacteEdicio()
{
	$.get("PHP/ContacteEdicioCarrega.php",{},LlegadaCarregaContacteEdicio);
}

function LlegadaCarregaContacteEdicio(data)
{
	var cadena = data.split("*****");
	
	$("#TituloContacte").val(cadena[0]);
	
	var config1 = {
        toolbar: [
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
            ['Image','Maximize'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
        ],
     	filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
    };

	
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1; 
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
    var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
	
	
	if ((!isiPad)&&(!isiPad)&&(!isAndroid))
	{
		$('#TAInfoContacte').ckeditor(config1);
	}
	
	$("#TAInfoContacte").val(cadena[1]);
	
	var cadenaC = cadena[2].split("|");
	
	 $("#EnllacCapMenuContacte").val(cadenaC[0]);
		 
		CarregaSelectCapMenuContacte(cadenaC[0]);
		
		if (cadenaC[2] == 0)
		{
			CarregaSelectLinsMenuContacte(cadenaC[1],'',cadenaC[0]);
		}
		else
		{ 
			CarregaSelectLinsMenuContacte('',cadenaC[1],cadenaC[0]);
		}
			
		$("#CadenaEnllacInternMenuContacte").val(cadena[2]);

		$('#DIVGestioContacte').fadeIn('slow');
		$('#VideoEnFicha').html('');

}

function CreaCadenaSelectsContacte(op)
{
	for (i=0;i<2;i++)
	{
		if (i == op)
		{
			var cadena = $("#EnllacCapMenuContacte").val()+"|"+ $("#EnllacLinMenuContacte"+i).val()+"|"+op;	
		}
		else
		{
			$("#EnllacLinMenuContacte"+i).val(0);	
		}	
	}
	$("#CadenaEnllacInternMenuContacte").val(cadena);
	
}


function UpdateContacteEdicio()
{ 
	var Titol = $("#TituloContacte").val();
	var TE = $("#TAInfoContacte").val();
	
	if ((TE != 0)&&(Titol != ""))
	{	
		var URL = $("#CadenaEnllacInternMenuContacte").val();

		$.get("PHP/ContacteSave.php",{ Titol:Titol, TE:TE, URL:URL},LlegadaUpdateContacteEdicio);
	}
	else alert("Has de rellenar todos los campos");	
}

function LlegadaUpdateContacteEdicio(data)
{
	CarregaVideo();

	CarregaMenuContacteHome();
	$("#DIVGestioContacte").fadeOut();
}


function CarregaMenuContacteHome()
{
	$.get("PHP/ContacteHomeCarrega.php",{},LlegadaCarregaMenuContactHome);
}

function LlegadaCarregaMenuContactHome(data)
{
	$('#ContHomeContacte').html("");
	$('#ContHomeContacte').html(data);
}

function TancaGestiocontacte()
{
	CarregaVideo();
	$('#DIVGestioContacte').fadeOut('slow');	
}



function CarregaPaginaiMenus(IdC,IdL,Costat)
{
//	alert("IdC: "+IdC+" IdL: "+IdL+" Costat: "+Costat)
	MenuECarrega(IdC);
	MenuMDCarrega(IdC);
	if (IdL == ""){CercaPrimeraPagina(IdC);}
	else {MostraPage(IdL,Costat);}
		
}

function MostraEliminaTOT(op,idC,idL)
{
	$('#VideoEnFicha').html('');
	
	
	switch(op)
	{
		case 0: document.getElementById("ButtonEliminaTOT").onclick =  function (){DeleteMS(idC);};
				break;	
		
		case 1: document.getElementById("ButtonEliminaTOT").onclick =  function (){DeleteLPage(idC,idL);};
				break;	
		
		case 2: document.getElementById("ButtonEliminaTOT").onclick =  function (){DeleteLinMD(idL);};
				break;			
		
		case 3: document.getElementById("ButtonEliminaTOT").onclick =  function (){DeleteUsuarisProc(idC, idL);};
				break;			
	}

	$('#DIVEliminaTOT').fadeIn("slow");	
}

function TancaEliminaTOT()
{
	document.getElementById("ButtonEliminaTOT").onclick =  function (){$('#DIVEliminaTOT').fadeOut("slow");};
	CarregaVideo();
	$('#DIVEliminaTOT').fadeOut("slow");
}


function ConvertiraPDF()
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	window.open('PHP/PDFCreate.php?id='+cadena[0]+'&op='+cadena[1]);
}

function LlegadaConvertiraPDF(data)
{
	alert(data);	
}


function ImprimirContingut()
{
	$("#Imprimible").printElement({printMode:'popup'});
}


function MostraFormulariEmail()
{
	$("#NomEmailContingut").val("");
	$("#OrigenEmailContingut").val("");
	$("#DestinatariEmailContingut").val("");
	
	$("#TAEmailcontingut").val("");
	
	$("#DIVFormulariEmail").fadeIn("slow");
}

function TancaFormEmail()
{
	$("#DIVFormulariEmail").fadeOut("slow");
}

function EnviaEmailcontingut()
{
	var data = 	window.location.hash;
	data = data.replace("#","");
	var cadena = data.split("_");
	
	var id = cadena[0];
	var op = cadena[1];
	
	var nom = $("#NomEmailContingut").val();
	var origen = $("#OrigenEmailContingut").val();
	var desti = $("#DestinatariEmailContingut").val();
	
	var TA = $("#TAEmailcontingut").val();
	
	if (ValidaEnviaEmailcontingut(nom,origen,desti))
	$.post("PHP/EmailContingutEnvia.php",{ id:id, op:op, nom:nom, origen:origen, desti:desti, TA:TA},LlegadaEnviaEmailcontingut);
}

function LlegadaEnviaEmailcontingut(data)
{
	alert(data);
	TancaFormEmail();	
}

function ValidaEnviaEmailcontingut(nom,origen,desti)
{
	if (!nom) alert("Has d'introduir el teu nom");
	
	if (ValidarEmail(origen)) alert('Revisa que el teu email tingui una forma correcte tal que "usuari@nomhost.dominivalid"');
		 
	if (ValidarEmail(desti)) alert('Revisa que el mail del teu amic tingui una forma correcte tal que "usuari@nomhost.dominivalid"'); 
	
	if((!nom)||(ValidarEmail(origen))||(ValidarEmail(desti))) return false;
	else return true;
}