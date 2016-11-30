function DeleteCaixes(id,idCC){
	if (confirm("Estàs segur que vols eliminar aquesta línia de caixes de l'albarà?")){
		//alert("estoy en ello pero todavía no lo tengo montado del todo");
		$.post("PHPForm/DetallComanda/lib/Delete/CaixesDelete.php",{id:id,idCC:idCC},LlegadaDeleteCaixes);	
	}	
}

function LlegadaDeleteCaixes(data){
	CarregaGestioComandes(data);	
}