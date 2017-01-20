/*function FechaFutura(fecha, motiu, dies)
{
	var retorno;

	$.post("PHPForm/FechaRecogidaControl.php",{fecha:fecha, motiu:motiu, dies:dies},function (data){
		if (data){
			alert(data);
			retorno = false;
		}
		retorno = true;
	});


}*/




function FechaFutura(fecha, motiu, dies)
{
	var esto = this;
	this.retorno = false;

	$.ajax({
	    type: "POST",
	    url: "PHPForm/FechaRecogidaControl.php",
	    async:false,
	    data: { 
	       fecha:fecha, 
	       motiu:motiu, 
	       dies:dies
	    },
	    success: function (res){
	//	console.log("res:"+res);
			//	console.log(res.data);
			    if (res){
					alert(res);
					esto.retorno =  false;
				}
				else esto.retorno = true;
			}
    
	});

	return this.retorno;

	//return $.post("PHPForm/FechaRecogidaControl.php",{fecha:fecha, motiu:motiu, dies:dies}).success(handleSuccess);
}



