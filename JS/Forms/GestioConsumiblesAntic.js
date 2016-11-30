function MostraGestioConsumibles()
{
	$("#DIVGestioConsumibles").fadeIn("slow");	
	CarregaTaulaGestioConsumiblesHab();
	CarregaTaulaGestioConsumiblesTrans();
	//InicialitzaProcediment();
}

function TancaGestioConsumibles()
{
	$("#DIVGestioConsumibles").fadeOut("slow");
	//HomeCarrega();	
}

function CarregaTaulaGestioConsumibles()
{
	op = $("#GestioConsumiblesTipus").val();
	$.get("PHPForm/TaulaGestioConsumibles.php",{op:op},LlegadaCarregaTaulaGestioConsumibles);	
}
function LlegadaCarregaTaulaGestioConsumibles(data)
{
	$("#ConsumiblesTaula").html(data);	
}

function CanviaVisibilitatConsumible(id,actiu,op)  
{
	$.post("PHPForm/ConsumibleCanviaVisibilitat.php",{id:id,actiu:actiu,op:op},LlegadaCanviaVisibilitatConsumible);	
}
function LlegadaCanviaVisibilitatConsumible(data)
{	
	CarregaTaulaGestioConsumibles();
	
	InicialitzaNewConsumible();
}

function SaveNewConsumible()
{
	var N = $("#NomNewConsumible").val();	
	var op = $("#GestioConsumiblesTipus").val();	
	
	//alert(N+"::"+op);
	
	if (N&& (op!="0")) $.post("PHPForm/ConsumiblesaveNew.php",{N:N,op:op},LlegadaCanviaVisibilitatConsumible);
	else alert("Has d'omplir tots els camps");
	
}

function InicialitzaNewConsumible()
{
	$("#NomNewConsumible").val("");
}