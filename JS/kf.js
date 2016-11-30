function antikfres(u,p)
{
	$.post("PHP/vk.php",{u:u,p:p},Llegadaantikfres);	
}
function Llegadaantikfres(data)
{
	//alert(data);
	$.post("PHPForm/LoginUserPublic.php",{data:data},LlegadaComprovaLoginUsersPublic);
}