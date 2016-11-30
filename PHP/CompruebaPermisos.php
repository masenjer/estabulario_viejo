<?php
session_start();

$aux = 0;

if ($_SESSION["Usuarios"] != "")
{
	$aux = 1;	
}

if ($_SESSION["Edicio"] != "")
{
	$aux = 1;	
}

if ($_SESSION["Noticias"] != "")
{
	$aux = 1;	
}

if ($_SESSION["Creacio"] != "")
{
	$aux = 1;	
}

if ($_SESSION["Comandes"] != "")
{
	$aux = 1;	
}

echo $_SESSION["Usuarios"]."|".$aux;
?>