function MostraStock()
{
	$("#DIVStock").fadeIn("slow");	
	InicialitzaStock();
}

function InicialitzaStock()
{
	$(":radio").attr("checked", false);

	$("#NStockMachos").val("");
	$("#NStockHembras").val("");
	//$("#NStockDataNaix").val(SelectFecha($("#DataNaixementStock").val()));
	//$("#NStockClient").html("");
	$("#NStockNProc").html("");
	$("#NStockComanda").val("");
	$("#NStockNAlbara").val("");

	DefineCalendario('NStockDataNaix');
	CarregaSelectStocNProc();
}

function CarregaSelectStocNProc()
{
	$.get("PHPForm/CarregaSelectStocNProc.php",{},LlegadaCarregaSelectStocNProc);
}

function LlegadaCarregaSelectStocNProc(data)
{
	$("#NStockNProc").html(data);
}

function InicialitzaCampAlbaraNStock(valor)
{
	$('#NStockNAlbara').val('');
	$('#NStockNAlbara').attr('disabled', valor);	
}

function TancaStock()
{
	$("#DIVStock").fadeOut("slow");	
}

function MostraGEspecies()
{
	$("#DIVGestioEspecies").show("slow");
	$("#TextExpecieCA").val("");	
}

function TancaGEspecies()
{
	$("#DIVGestioEspecies").hide("slow");
}

function MostraGCepas()
{
	if ($("#Especie1Stock").val())
	{
		$("#DIVGestioCepas").show("slow");
		$("#DIVGestioEditCepas").hide("slow");
		CarregaSelectProveidor("idProvCepa",3)
	}
	else alert("Has de seleccionar primero la especie a la que pertenecer\á la cepa")
	$("#TextCepa").val("");	

}
function TancaGCepas()
{
	$("#DIVGestioCepas").hide("slow");
}

function SeleccionaEspecieGest()
{
	OmpleCepas('1','Stock');
	$("#DIVGestioEspecies").hide("slow");
	$("#DIVGestioCepas").hide("slow");
	$("#DIVGridStocks").html("");
	$("#DIVTotalGridStocks").html("");	
}

function SeleccionaCepaGest()
{
	$("#DIVGestioEspecies").hide("slow");
	$("#DIVGestioCepas").hide("slow");
	OmpleSelectDataNaixStock();
	$("#DIVGridStocks").html("");
	$("#DIVTotalGridStocks").html("");	
	//CarregaTaulaStock();
}

function SeleccionaDataNaixGest()
{
	$("#DIVGestioEspecies").hide("slow");
	$("#DIVGestioCepas").hide("slow");
	CarregaTaulaStock();
	$("#NStockDataNaix").val(SelectFecha($("#DataNaixementStock").val()));
}

function OmpleSelectDataNaixStock(f)
{
	var id = $("#Cepa1Stock").val();
	$.get("PHPForm/CarregaSelectDataNaixStock.php",{id:id,f:f},LlegadaOmpleSelectDataNaixStock);
}

function LlegadaOmpleSelectDataNaixStock(data)
{
	$("#DataNaixementStock").html(data);	
}

function GuardaEspecies()
{
	var CA = $("#TextExpecieCA").val();	
//	var ES = $("#TextExpecieES").val();	
//	var EN = $("#TextExpecieEN").val();	
	
	$.get("PHPForm/GuardaEspecies.php",{CA:CA},LlegadaGuardaEspecies)	
//	$.get("PHPForm/GuardaEspecies.php",{CA:CA,ES:ES,EN:EN},LlegadaGuardaEspecies)	
}

function LlegadaGuardaEspecies(data)
{
	alert(data);
	OmpleEspecies('1','Stock');
	$("#Cepa1Stock").html("");	
	$("#DIVGestioEspecies").hide("slow");
	$("#DIVGestioCepas").hide("slow");

	$("#TextExpecieCA").val("");	
//	$("#TextExpecieES").val("");	
//	$("#TextExpecieEN").val("");	
}

function GuardaCepas()
{
	var id = $("#Especie1Stock").val();
	var T = $("#TextCepa").val();
	var idP = $("#idProvCepa").val();
		
	$.get("PHPForm/GuardaCepas.php",{id:id,T:T,idP:idP},LlegadaGuardaCepas)	
}

function LlegadaGuardaCepas(data)
{
	var cadena = data.split("|");
	alert(cadena[0]);
	OmpleCepas('1','Stock');
	$("#DIVGestioEspecies").hide("slow");
	$("#DIVGestioCepas").hide("slow");
	TancaEditaCepas();
	$("#TextCepa").val("");	
	if (cadena[1]) $("#Cepa1Stock ").val(cadena[1])
}

function MostraEditCepas()
{
	if ($("#Cepa1Stock").val())
	{
		$("#DIVGestioCepas").hide("slow");
		$("#DIVGestioEditCepas").show("slow");
		
		CarregaProveidorsCepaaEditar();
		
		$("#TextEditCepa").val($("#Cepa1Stock option[value='"+$("#Cepa1Stock").val()+"']").text());
	}else alert("Has de seleccionar una soca abans d'editar-la");
}

function CarregaProveidorsCepaaEditar()
{
	var id = $("#Cepa1Stock").val();
	//alert(id);
	$.get("PHPForm/CarregaProveirdorsCepaaEditar.php",{id:id},LlegadaCarregaProveidorsCepaaEditar);	
}

function LlegadaCarregaProveidorsCepaaEditar(data)
{
	$("#idProvEditCepa").html(data);
}

function TancaEditaCepas()
{
	$("#DIVGestioEditCepas").hide("slow");
	$("#TextEditCepa").val("");
}

function UpdateCepas()
{
	var T = $("#TextEditCepa").val();
	var id = $("#Cepa1Stock").val();
	var idP = $("#idProvEditCepa").val();
	
	if (T) $.get("PHPForm/UpdateCepas.php",{id:id,T:T,idP:idP},LlegadaGuardaCepas)	
	else alert("Has de posar un nom vàlid per la soca");
}

function CarregaTaulaStock()
{
	var id = $("#Cepa1Stock").val();
	var f = $("#DataNaixementStock").val();
	$.get("PHPForm/TaulaStockCarrega.php",{id:id,f:f},LlegadaCarregaTaulaStock)	
}

function LlegadaCarregaTaulaStock(data)
{
	//alert(data);
	var cadena =  data.split("|");
	$("#DIVGridStocks").html(cadena[0]);
	$("#DIVTotalGridStocks").html(cadena[1]);
}

function GuardaMOVStock()
{
	var id  = $("#Cepa1Stock").val();
	var RT  = $('input[name=RTipusMov]:checked').val();
	var NSM = $("#NStockMachos").val();
	var NSH = $("#NStockHembras").val();
	var DN  = $("#NStockDataNaix").val();
	//var C 	= $("#NStockClient").val();
	var NProc = $("#NStockNProc").val();
	var Com = $("#NStockComanda").val();
	var A	= $("#NStockNAlbara").val();
	
	if (ComprovaCampsMOVStock(id,RT,NSM,NSH,DN,NProc)) 	
		$.get("PHPForm/MOVStockGuarda.php",{id:id,RT:RT,NSM:NSM,NSH:NSH,DN:DN,NProc:NProc,Com:Com,A:A},LlegadaGuardaMOVStock);
}

function LlegadaGuardaMOVStock(data)
{
	var cadena = data.split("|");
	if (cadena[0] == 1)
	{
		OmpleSelectDataNaixStock(cadena[1]);
		InicialitzaStock();
		CarregaTaulaStock();	
	}
	else alert(cadena[0]);
}

function ComprovaCampsMOVStock(id,RT,NSM,NSH,DN,NProc)
{
	if (!id) alert("Has de seleccionar una soca per crear un moviment");
	if (!RT) alert("Has de seleccionar un tipus de moviment");
	if (!NProc) alert("Has de seleccionar un numero de procediment");
	if(!(NSM) && !(NSH)) alert("Has de introduir un valor a les unitats de mascles i/o femelles");
	if(!DN) alert("Has d'introduir una data de naixement vàlida");
	
	if ((!id)||(!RT)||(!NProc)||(!DN)||(!(NSM)&&!(NSH))) return false;
	
	if ((NSM) && !(validarEntero(NSM))){ alert("El valor de les unitats de mascles ha de ser un número sencer");return false;}
	if ((NSH) && !(validarEntero(NSH))){ alert("El valor de les unitats de femelles ha de ser un número sencer");return false;}
	
	return true;			
}

function MostraAmagaDetallTaulaStock(NProc,accio)
{
	if (accio == 0)
	{
		$("#DIVTaulaSTock"+NProc).show("slow");
		if (!$.browser.msie)$("#FlechaCapcaGrid"+NProc).rotateAnimation(-180);
	}
	else 
	{
		$("#DIVTaulaSTock"+NProc).hide("slow");	
		if (!$.browser.msie)$("#FlechaCapcaGrid"+NProc).rotateAnimation(0);
	}
	accio = (accio + 1)%2;
	
	document.getElementById("TDCapTaulaStock"+NProc).onclick =  function (){ MostraAmagaDetallTaulaStock(NProc,accio);};
	
}