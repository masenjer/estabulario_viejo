function EliminaFilasTabla(fini,ftotal, tabla)
{
	alert("fini:"+fini+", total:"+ftotal+", tabla:"+tabla);
	tab = document.getElementById(tabla);
	for (i=fini-1; i<ftotal+1; i++)
	{
		tab.deleteRow(i);
	}
}

