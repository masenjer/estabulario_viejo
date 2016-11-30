<?php
include("../rao/EstabulariForm_con.php");

$id = $_POST["id"];
$val = $_POST["estat"];

$SQL = "UPDATE Users SET Validado = ".$val." where IdUser = ".$id;
$result = mysql_query($SQL,$oConn);

$SQL = "SELECT * FROM Users WHERE IdUser = ".$id;
$result = mysql_query($SQL,$oConn);

while($row = mysql_fetch_array($result))
{
	switch ($val)
	{
		case "1":	EnviaEmailValidacioNegada($row["Email"]);	
					break;
		case "2":	EnviaEmailValidacioAcceptada($row["Email"]);	
					break;	
	}
}

echo $SQL;

function EnviaEmailValidacioNegada($E)
{
	$mensaje = '<p>La seva petició d\'alta d\'usuari ha estat denegada pels t&egrave;cnics del Servei d\'Estabulari. Per a qualsevol consulta, possi\'s en contacte amb nosaltres.</p>';
	
	$asunto = 'Usuari denegat per a accedir al Servei d\'Estabulari';
	
	//$desti="rafael.alarcon@uab.cat";
	$desti = $E;
	
	//$sheader="From:s.estabulari@uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
	$sheader="From:s.estabulari@uab.cat \nReply-To:s.estabulari@uab.cat\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	
	mail($desti,$asunto,$mensaje,$sheader);
}


function EnviaEmailValidacioAcceptada($E)
{
	$mensaje = '
		<p>El seu usuari ha estat validat correctament pels t&egrave;cnics del Servei d\'Estabulari. Ja pot accedir i realitzar comandes.</p>
		';
	
	$asunto = 'Usuari validat per a accedir al Servei d\'Estabulari';
	
	//$desti="rafael.alarcon@uab.cat";
	$desti = $E;
	
	//$sheader="From:s.estabulari@uab.cat \nReply-To:rafael.alarcon@uab.cat\n";
	$sheader="From:s.estabulari@uab.cat \nReply-To:s.estabulari@uab.cat\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	
	mail($desti,$asunto,$mensaje,$sheader);
}
?>