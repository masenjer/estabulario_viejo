
Date.prototype.addDays = function (dias){
	    var fecha1 = new Date(2011, 1,20);
	    var fecha2 = new Date(2011, 1,21);
	    var diferencia = fecha2.getTime() - fecha1.getTime();
	    var luego = new Date();
	    luego.setTime( this.getTime() + (dias * diferencia )  );
	    return luego;
	}            