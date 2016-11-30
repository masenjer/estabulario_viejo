function antikfresPrivat(u,p)
{
	//alert("u:"+u+",p:"+p);
	$.post("PHP/vk.php",{u:u,p:p},LlegadaantikfresPrivat);	
}
function LlegadaantikfresPrivat(data)
{
	//alert(1);
	//alert(data);
	$.post("PHP/ComprovaLogin.php",{data:data},LlegadaComprovaLogin);
}