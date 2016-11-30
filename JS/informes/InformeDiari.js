function ImprimeixInformeDiari()
{
	var r = "";
	
	for (i=0;i<12;i++) 
	{
		if($("#checkInformeDiari"+i).attr("checked")==true)
		{
			if (r) r += "|"+i;
			else r = i;
		}
	}
	
	//alert(r);
	
	var data = $("#FechaInformeDiari").val();
	window.open('PHPForm/Informes/InformeDiari.php?data='+data+'&r='+r);
}