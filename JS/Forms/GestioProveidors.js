function MostraGestioProveidors()
{
	$("#DIVGestioProveidors").fadeIn("slow");	
	CarregaTaulaGestioProveidorsHab();
	CarregaTaulaGestioProveidorsTrans();
	//InicialitzaProcediment();
}

function TancaGestioProveidors()
{
	$("#DIVGestioProveidors").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioProveidorsHab()
{
	$.get("PHPForm/TaulaGestioProveidors.php",{op:0},LlegadaCarregaTaulaGestioProveidorsHab);	
}
function LlegadaCarregaTaulaGestioProveidorsHab(data)
{
	$("#ProveidorsHabFitxa").html(data);	
}

function CarregaTaulaGestioProveidorsTrans()
{
	$.get("PHPForm/TaulaGestioProveidors.php",{op:1},LlegadaCarregaTaulaGestioProveidorsTrans);	
}
function LlegadaCarregaTaulaGestioProveidorsTrans(data)
{
	$("#ProveidorsTransFitxa").html(data);	
}

function CanviaVisibilitatProveidor(id,actiu,op)
{
	$.post("PHPForm/ProveidorCanviaVisibilitat.php",{id:id,actiu:actiu,op:op},LlegadaCanviaVisibilitatProveidor);	
}
function LlegadaCanviaVisibilitatProveidor(data)
{
	if (data == "0") CarregaTaulaGestioProveidorsHab();
	else CarregaTaulaGestioProveidorsTrans();
	
	InicialitzaNewProveidor();
}

function SaveNewProveidor()
{
	var N = $("#NomNewProveidor").val();	
	var T = $("#TipusNewProveidor").val();	
	
	if (N&& (T!="-")) $.post("PHPForm/ProveidorSaveNew.php",{N:N,T:T},LlegadaCanviaVisibilitatProveidor);
	else alert("Has d'omplir tots els camps");
	
}

function InicialitzaNewProveidor()
{
	$("#NomNewProveidor").val("");
	$("#TipusNewProveidor option[value=-]").attr("selected",true);
}