function MostraGestioConsumibles()
{
	//alert("si");
	$("#DIVGestioConsumibles").fadeIn("slow");	

	CarregaTaulaGestioConsumibles();
}

function TancaGestioConsumibles()
{
	$("#DIVGestioConsumibles").fadeOut("slow");
	//HomeCarrega();	
}


function CarregaTaulaGestioConsumibles()
{
	var t = $("#FiltreGestioConsumibles").val();
	$.get("PHPForm/TaulaGestioConsumibles.php",{t:t},LlegadaCarregaTaulaGestioConsumibles);	
}
function LlegadaCarregaTaulaGestioConsumibles(data)
{
	$("#ConsumiblesTaula").html(data);	
}

function CarregaFitxaConsumible(id,taula)
{
	if (!id)
	{
		$("#DIVNouConsumible"+taula).show("slow");
		$("#TConsumible"+taula).val("");
	}
	else
	{
		$("#DIVLabelConsumible"+id+taula).hide();
		$("#DIVEditConsumible"+id+taula).show();
		$("#ButtonSaveConsumible"+id+taula).show();
		//$("#TEditInvesProjecte"+idP).val("");			
	}
	//$("#TInvesProjecte").val(P);
	//document.getElementById("ButtonSaveInvesProjecte").onclick=function (){UpdateInvesProjecte(idI,idP);}	
}

function UpdateConsumible(id, taula)
{
	//alert(id+","+taula);
	
	var C = $("#TConsumible"+id+taula).val();
	if (C) $.post("PHPForm/ConsumibleUpdate.php",{taula:taula,id:id,C:C},LlegadaUpdateConsumible);
	else alert("El consumible no pot estar buit");
}

function LlegadaUpdateConsumible(data)
{
	//alert(data);
	CarregaTaulaGestioConsumibles();
}


function CanviaVisibilitatConsumible(id, taula, actiu)
{
	$.post("PHPForm/ConsumibleCanviaVisibilitat.php",{id:id,actiu:actiu,taula:taula},LlegadaCanviaVisibilitatConsumible);	
}
function LlegadaCanviaVisibilitatConsumible(data)
{	
	if (data == "0") alert ("Has reactivat aquest consumible/fungible");
	else alert ("has fet invisible aquest consumible/fungible");

	CarregaTaulaGestioConsumibles();
}






