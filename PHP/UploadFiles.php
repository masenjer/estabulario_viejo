<?php
$op = $_GET["op"];


switch ($op)
{
	case 1: $destino = "../Images/"; 
			break;	
					
	case 2: $destino = "../ImgNot/"; 
			break;	
					
	case 3: $destino = "../ImgDes/"; 
			break;	
					
	case 4: $destino = "../Documents/"; 
			break;	
					
}

if ($op == 1) move_uploaded_file ( $_FILES [ 'upload' ][ 'tmp_name' ], $destino . '/' . $_FILES [ 'upload' ][ 'name' ]); 
else move_uploaded_file ( $_FILES [ 'Imatge' ][ 'tmp_name' ], $destino . '/' . $_FILES [ 'Imatge' ][ 'name' ]); 

//echo $_FILES [ 'Imatge' ][ 'name' ];

echo  "Fichero subido correctamente";

?> 




