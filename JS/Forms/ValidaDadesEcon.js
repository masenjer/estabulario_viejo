function ValidaDadesEcon(CC,NumProc)
{
	var error = true;
	
	if ((NumProc == 0)||(!NumProc)){
		alert("Has d' indicar un n"+String.fromCharCode(250)+"mero de procediment");
		error = false;
	}
	if ((CC == 0)||(!CC)){
		alert("Has d' indicar un n"+String.fromCharCode(250)+"mero de Centre de Cost o Projecte");
		error = false;
	}
	
	return error;
}