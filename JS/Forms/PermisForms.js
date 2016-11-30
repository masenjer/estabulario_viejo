function ComprovaSiMostraForm()
{
	$.get("PHPForm/ComprovaSiMostraForm.php",{},LlegadaComprovaSiMostraForm);	
}

function ComprovaSiMostraForm(data)
{
	if (data=="1") return true;
	else return false;	
}