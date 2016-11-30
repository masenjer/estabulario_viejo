function FechaFuturaPetCompra(fecha)
{
	var f = new Date();
	f = f.addDays(6);
	var hoy = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();

	//var hoy6dias = hoy.addDays(6);
	
	//alert("hoy:"+hoy);
	
	return RestaFechas(fecha,hoy)+"|"+hoy;
	
	//alert(fecha+"|"+hoy);
//	if (RestaFechas(fecha,hoy)) return true;
//	else return false;
}
