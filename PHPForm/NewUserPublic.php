<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 

session_start();

$Niu = Pon($_POST["Niu"]);
$U 	 = Pon($_POST["U"]);
$P 	 = Pon($_POST["P"]);
$N 	 = Pon($_POST["N"]);
$C	 = Pon($_POST["C"]);
$T	 = Pon($_POST["T"]);
$E	 = Pon($_POST["E"]);
$I	 = Pon($_POST["I"]);
$ER	 = Pon($_POST["ER"]);
$D	 = Pon($_POST["D"]);

$P = sha1($P);
$P = sha1($P);

if (!$Niu) $Niu = "NULL";

//Niu,U,P1,P2,N,C,E,I

$SQL = "SELECT count(IdUser) as Cuenta  from Users WHERE User = '$U'"  ;

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($row["Cuenta"] >0) $Cuenta = "1"; else $Cuenta = "0";
}

$SQL = "SELECT count(IdUser) as Cuenta  from Users WHERE Email = '$E'"  ;

$result = mysql_query($SQL,$oConn);

while ($row = mysql_fetch_array($result))
{
	if ($row["Cuenta"] >0) $Cuenta = "2";
}

if ($Cuenta == 0)
{
	$SQL = "INSERT INTO Users( User, Password, NIU, Nom, Cognoms, Telefono, Email, Investigador, EmailInvestigador, Centro) VALUES ('$U', '$P', $Niu, '$N', '$C', '$T', '$E', '$I', '$ER', '$D')  ";
	$result = mysql_query($SQL,$oConn);
	
	//echo "\n////////////////////////////\n".$SQL."\n////////////////////////////\n";
	
	$SQL = "SELECT IdUser from Users WHERE User = '$U'";
	$result = mysql_query($SQL,$oConn);	

	while ($row = mysql_fetch_array($result))
	{
		$Id = $row["IdUser"];
		$_SESSION["IdUser"] = $row["IdUser"];
		
		EnviaEmailConfirmacioAltaUsuari($N,$C,$E);
		EnviaEmailConfirmacioAltaEstabulari($N,$C,$E,$I);
	}
}

echo $Cuenta."|".$Id."|".$N;


function EnviaEmailConfirmacioAltaUsuari($N,$C,$E)
{
	$mensaje = '
		<p>Benvingut/da, '.$N.' '.$C.'.</p>
		<p>La seva petició està en curs. Rebrà un correu electr&ograve;nic de confirmaci&oacute; un cop el procés sigui validat pels nostres t&egrave;cnics. </p>
		';
	
	$asunto = 'Sol·licitut d\'alta a la web del Servei d\'Estabulari';
	
	//$desti="rafael.alarcon@uab.cat";
	$desti = $E;
	
	//$sheader="From:s.estabulari@uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
	$sheader="From:s.estabulari@uab.cat \nReply-To:s.estabulari@uab.cat\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	
	mail($desti,$asunto,$mensaje,$sheader);
	
}

function EnviaEmailConfirmacioAltaEstabulari($N,$C,$E,$I)
{
	$mensaje = '
		<p>Un nuevo usuario se ha dado de alta en el sistema</p>
		<p>
			Nombre: '.$N.' '.$C.' <br>
			Email: '.$E.' <br>
			Investigador principal: '.$I.' <br>	
		</p>
		
		<p>Debes validarlo y asociarlo a algún número de procedimiento desde la administración:<a href="https://estabulari.uab.cat/admin"> Administracion</a> </p>';
	
	$asunto = 'Nueva solicitud de alta de usuario en la web';
	
	//$desti="rafael.alarcon@uab.cat";
	$desti = "se.suport.veterinari@uab.cat";
	
	//$sheader="From:importacions@estabulari.uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
	$sheader="From:s.estabulari@uab.cat \nReply-To:s.estabulari@uab.cat\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	
	mail($desti,$asunto,$mensaje,$sheader);
}


?>