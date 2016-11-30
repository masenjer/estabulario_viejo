function timeInHours(str) 
{ 
	var sp = str.split(":"); return parseInt(sp[0])*60 + parseInt(sp[1]);
} 
function hoursToString(h) 
{ 
	var hours = floor(h); 
	var minutes = (h - hours)*60; 
	return hours + ":" + minutes; 
} 