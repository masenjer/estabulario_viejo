
function ImprimeixInformeAnualMoviments()
{
	//alert(1);
	var Any = $("#AnyInformeAnualStock").val();
	window.open('PHPForm/Informes/InformeAnimalsMOVXLS.php?Any='+Any);
}