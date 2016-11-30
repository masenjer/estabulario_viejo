<?php
	session_start();
	
	include("../../../rao/EstabulariForm_con.php");
	include("../../../PHP/Fechas.php"); 
	
	$id = $_POST["id"];
	$hoy = date("Y-m-d");
	
	$SQL = "SELECT PP.IdPetAnimProd, PP.IdSoca, E.IdEspecie, CC.IdProcediment, PP.FechaNac, PP.Cantidad, PP.Sexo 
			FROM PetAnimProd PP, Especie E, Soca S, ComandaCap CC  
			WHERE CC.IdComandaCap = PP.IdComandaCap AND E.IdEspecie = S.IdEspecie AND S.IdSoca = PP.IdSoca AND PP.Estado = 1 AND PP.GestionVenta = 0 AND PP.IdComandaCap = ".$id; 
	
	echo $SQL."----------<br>";
	
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result)){
		
		$UniMas = 0;
		$UniFam = 0;
		
		switch ($row["Sexo"])
		{
			case "M": 	$UniMas = $row["Cantidad"];
						break;
			case "F":	$UniFam = $row["Cantidad"];	
						break;
		}
		
		$SQL2 = "INSERT INTO AnimalMOVCap
				(IdComandaCap, IdProcediment, IdSoca, FechaNacimiento, UniMas, UniFam, Fecha, TipusMOV, IdUser )
				VALUES
				(".$id.",".$row["IdProcediment"].",".$row["IdSoca"].",'".$row["FechaNac"]."',".$UniMas.",".$UniFam.",'".$hoy."',5,".$_SESSION["IdA"].")";
		
		echo $SQL2."----------<br>";
		$result2 = mysql_query($SQL2,$oConn);
			
		$SQL3 = "UPDATE PetAnimProd SET GestionVenta = 1 WHERE IdPetAnimProd = ".$row["IdPetAnimProd"];
		$result3 = mysql_query($SQL3,$oConn);
		echo $SQL3."----------<br>";
				
	} 
	
	mysql_free_result($result);
	mysql_close();
	
	echo $id;
	
?>