function RestaFechas(f1,f2)
{
	//console.log("restafechas1",f1+":"+f2);
	var c1 = f1.split("/");
	var c2 = f2.split("/");
	
	//alert(parseInt(c1[2])+"|"+ parseInt(c2[2]));	
	
	if (c1[2].lenght == 1) c1[2] = "0"+c1[2];
	if (c2[2].lenght == 1) c2[2] = "0"+c2[2];
	
	var dia1 = parseInt(c1[0]);
	if (dia1 == 0) c1[0]=c1[0].replace("0","");
	var dia2 = parseInt(c2[0]);
	if (dia2 == 0) c2[0]=c2[0].replace("0","");
	var mes1 = parseInt(c1[1]);
	if (mes1 == 0) c1[1]=c1[1].replace("0","");
	var mes2 = parseInt(c2[1]);
	if (mes2 == 0) c2[1]=c2[1].replace("0","");
	
	//alert(parseInt(c1[2])+"|"+ parseInt(c2[2]));	
	if (parseInt(c1[2]) > parseInt(c2[2]))  return true;
	else
	{
		if (parseInt(c1[2]) == parseInt(c2[2]))
		{
			//alert(parseInt(c1[1])+"|"+ parseInt(c2[1]));	
			if (parseInt(mes1) > parseInt(mes2)) return true;
			else
			{
				if 	(parseInt(mes1) == parseInt(mes2))
				{
					//alert(parseInt(c1[0])+"|"+ parseInt(c2[0]));	
					if (parseInt(dia1) > parseInt(dia2)) {
						//alert(dia1+"/"+mes1+"/"+c1[2]+":"+dia2+"/"+mes2+"/"+c2[2]+", true"); 
						return true;
					}
					else{ 
						//alert(dia1+"/"+mes1+"/"+c1[2]+":"+dia2+"/"+mes2+"/"+c2[2]+", false"); 
						return false;
					}
				}
				else return false;
			}
		}
		else return false;
	}
	
	
}