function CarregaTaulaInvesProjecte(id)
{
	//alert(id);
	$.get("PHPForm/TaulaInvesProjectes.php",{id:id},LlegadaCarregaTaulaInvesProjecte);	
}

function LlegadaCarregaTaulaInvesProjecte(data)
{
	//alert(data);
	$("#DIVTaulaInvesProjectes").html(data);	
}

function CarregaFitxaProjecte(idI,idP)
{
	if (!idP)
	{
		$("#DIVNouProjecte").show("slow");
		$("#TInvesProjecte").val("");
	}
	else
	{
		$("#DIVLabelProjecte"+idP).hide();
		$("#DIVEditProjecte"+idP).show();
		$("#ButtonEditInvesProjecte"+idP).show();
		//$("#TEditInvesProjecte"+idP).val("");			
	}
	//$("#TInvesProjecte").val(P);
	//document.getElementById("ButtonSaveInvesProjecte").onclick=function (){UpdateInvesProjecte(idI,idP);}	
}

function UpdateInvesProjecte(idI, idP)
{
	
	var P = $("#TInvesProjecte"+idP).val();
	if (P) $.post("PHPForm/ProjecteUpdate.php",{idI:idI,idP:idP,P:P},LlegadaUpdateInvesProjecte);
	else alert("El projecte no pot estar buit");
}

function LlegadaUpdateInvesProjecte(data)
{
	//alert(data);
	CarregaTaulaInvesProjecte(data);
}


function CanviaVisibilitatInvesProjecte(id,actiu)
{
	$.post("PHPForm/ProjecteCanviaVisibilitat.php",{id:id,actiu:actiu},LlegadaCanviaVisibilitatInvesProjecte);	
}

function LlegadaCanviaVisibilitatInvesProjecte(data)
{
	var cadena = data.split("|");
	if (cadena[0] == "0") alert ("Has reactivat aquest preojecte");
	else alert ("has fet invisible aquest projecte");
	
	LlegadaUpdateInvesProjecte(cadena[1]);
	
	
}