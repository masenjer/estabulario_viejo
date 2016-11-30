function MostraGestioFungibles()
{
	$("#DIVGestioFungibles").fadeIn("slow");	
	CarregaTaulaGestioFungiblesHab();
	CarregaTaulaGestioFungiblesTrans();
	//InicialitzaProcediment();
}

function TancaGestioFungibles()
{
	$("#DIVGestioFungibles").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioFungiblesHab()
{
	$.get("PHPForm/TaulaGestioFungibles.php",{op:0},LlegadaCarregaTaulaGestioFungiblesHab);	
}
function LlegadaCarregaTaulaGestioFungiblesHab(data)
{
	$("#FungiblesHabFitxa").html(data);	
}

function CarregaTaulaGestioFungiblesTrans()
{
	$.get("PHPForm/TaulaGestioFungibles.php",{op:1},LlegadaCarregaTaulaGestioFungiblesTrans);	
}
function LlegadaCarregaTaulaGestioFungiblesTrans(data)
{
	$("#FungiblesTransFitxa").html(data);	
}

function CanviaVisibilitatProveidor(id,actiu,op)
{
	$.post("PHPForm/ProveidorCanviaVisibilitat.php",{id:id,actiu:actiu,op:op},LlegadaCanviaVisibilitatProveidor);	
}
function LlegadaCanviaVisibilitatProveidor(data)
{
	if (data == "0") CarregaTaulaGestioFungiblesHab();
	else CarregaTaulaGestioFungiblesTrans();
	
	InicialitzaNewProveidor();
}

function SaveNewProveidor()
{
	var N = $("#NomNewProveidor").val();	
	var T = $("#TipusNewProveidor").val();	
	
	if (N&& (T!="-")) $.post("PHPForm/FungiblesaveNew.php",{N:N,T:T},LlegadaCanviaVisibilitatProveidor);
	else alert("Has d'omplir tots els camps");
	
}

function InicialitzaNewProveidor()
{
	$("#NomNewProveidor").val("");
	$("#TipusNewProveidor option[value=-]").attr("selected",true);
}