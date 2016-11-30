<?php
	include("../../../rao/EstabulariForm_con.php");
	include("../../../rao/PonQuita.php");
	session_start();
	
	$IdCC = $_POST["id"];
	$Obs = $_POST["Obs"];
	
	$SQL = "INSERT INTO Obs(IdComandaCap, Obs, IdTecnic, Fecha, Hora)VALUES($IdCC,'".Pon($Obs)."',".$_SESSION["IdA"].",CURDATE(), CURTIME())";
	$result = mysql_query($SQL,$oConn);
	
	$SQL = "UPDATE ComandaCap SET AvisU = 1 WHERE IdComandaCap =".$IdCC;
	$result = mysql_query($SQL,$oConn);	
	
	$SQL = "SELECT U.Email FROM Users U, ComandaCap CC WHERE U.IdUser = CC.IdUsuari AND IdComandaCap =".$IdCC;
	$result = mysql_query($SQL,$oConn);
	
	while ($row = mysql_fetch_array($result))
	{
			$A = "Nou missatge a la web del Servei d'Estabulari";
			$C = "Té un nou missatge a la web del Servei d'Estabulari referent a la comanda ".$IdCC;
			
			$sheader="From:s.estabulari@uab.cat\nReply-To:s.estabulari@uab.cat\n";
			$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
			$sheader=$sheader."Mime-Version: 1.0\n";
			$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
			
			mail($row["Email"],$A,$C,$sheader);	
			
			//echo ($row["Email"].",".$A.",".$C.",".$sheader);
	}
	
	echo $IdCC;
?>