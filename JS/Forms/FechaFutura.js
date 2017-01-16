function FechaFutura(fecha, motiu, dies)
{
	$.post("PHPForm/FechaRecogidaControl.php",{fecha:fecha, motiu:motiu, dies:dies},function (data){
		if (data){
			alert(data);
			return false;
		}
		else return true;

	});
}