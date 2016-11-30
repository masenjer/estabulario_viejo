function ControlaReservaCredit(RC)
{
    if(RC.length < 9 || RC.length > 9){  
		alert('La reserva de cr'+String.fromCharCode(232)+'dit ha de tenir 9 xifres de longitut');
        return false;  
    }  
    else
	{
		if(!RC.match(/^[0-9a-zA-Z]+$/))
		{  
			alert('La reserva de cr'+String.fromCharCode(232)+'dit no pot tenir car'+String.fromCharCode(224)+'cters especials, nom'+String.fromCharCode(233)+'s poden haber'+String.fromCharCode(45)+'hi n'+String.fromCharCode(250)+'meros sencers i lletres');
	    	return false;
		}
    	else return true;      	 
	}
}