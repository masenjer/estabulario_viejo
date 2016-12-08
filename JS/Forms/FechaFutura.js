function FechaFutura(fecha)
{
	var f = new Date();
	var hoy = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
	
	///Calculo para que haya un mínimo de 2 días laborables entre el pedido y la fecha de recogida
	var diaSemana = dia_semana(hoy);
	
	//console.log("diaSemana",diaSemana);
	switch (diaSemana) 
	{
		case "Lunes": 	
		case "Martes": 	
		case "Miércoles":	f = f.addDays(1);
							break; 	
		
		case "Jueves":		f = f.addDays(4);//cambiar a 3 
							break; 
		case "Viernes":		f = f.addDays(3);
							break; 
		case "Sábado":		f = f.addDays(2);
							break; 	
		
		case "Domingo":		f = f.addDays(1);
							break; 	
	}
/*
	switch (diaSemana) 
	{
		case "Lunes": 	
		case "Martes": 	
		case "Miércoles":	f = f.addDays(1);
							break; 	
		
		case "Jueves":
		case "Viernes":
		case "Sábado":		f = f.addDays(3);
							break; 	
		
		case "Domingo":		f = f.addDays(2);
							break; 	
	}
*/	
	var FS = (f.getDate()) + "/" + (f.getMonth() +1) + "/" + f.getFullYear();	
//	console.log("fecha",fecha+"-----"+FS);

	return RestaFechas(fecha,FS);
	
	//alert(fecha+"|"+hoy);
//	if (RestaFechas(fecha,hoy)) return true;
//	else return false;
}