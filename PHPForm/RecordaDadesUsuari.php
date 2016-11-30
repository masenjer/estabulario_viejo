<?php
include("../rao/EstabulariForm_con.php");
$E = $_POST["E"];

$SQL = "SELECT IdUser, User FROM Users WHERE Email ='".$E."'";
$result = mysql_query($SQL,$oConn);

//echo $SQL;
$cuenta = 0;

while($row = @mysql_fetch_array($result))
{
	$cuenta = 1;
	
	$IdU = $row["IdUser"]; 	
	$U = $row["User"]; 	
	$P = CreaPassword();
	$P_sha = sha1(sha1(sha1($P)));
	
	$SQL2 = "UPDATE Users SET Password = '$P_sha' WHERE IdUser = $IdU";
	$result2 = mysql_query($SQL2,$oConn);
		
	$cuerpo='
		<p>Les dades d\'accés a la pàgina del servei d\'estabulari són les següents:</p>
		<p>	
			Usuari: '.$U.'<br>
			Contrasenya: '.$P.'
		</p>
		
		<p>
		Recordi que pot canviar la seva contrasenya per la que vostè vulgui des del seu espai de treball situat al menú superior de la pàgina web de l\'estabulari un cop i accedeixi amb aquests user i password.</p>
	';

	$sfrom="Servei d'Estabulari <s.estabulari@uab.com>"; //cuenta que envia
	$sdestinatario=$E; //cuenta destino
	$ssubject="Recordatori de dades d' accés"; //subject
	
	$sheader="From:".$sfrom."\nReply-To:".$sfrom."\n";
	$sheader=$sheader."X-Mailer:PHP/".phpversion()."\n";
	$sheader=$sheader."Mime-Version: 1.0\n";
	$sheader=$sheader."Content-Type: text/html;  charset=utf-8";
	mail($sdestinatario,$ssubject,$cuerpo,$sheader); 

	//echo "sdestinatario:".$sdestinatario.",ssubject:".$ssubject.",cuerpo:".$cuerpo.",sheader:".$sheader;

}

echo $cuenta;


function CreaPassword($min=4, $max=8){
        $vocales = array("a", "e", "i", "o", "u","1","2","3","4","5","6","7","8","9","0");
        $consonantes = array("b", "c", "d", "f", "g", "j", "l", "m", "n", "p", "r", "s", "t");
        $random_nombre = rand($min, $max);//largo de la palabra
        $random = rand(0,1);//si empieza por vocal o consonante
        for($j=0;$j<$random_nombre;$j++){//palabra
                switch($random){
                        case 0: $random_vocales = rand(0, count($vocales)-1); $nombre.= $vocales[$random_vocales]; $random = 1; break;
                        case 1: $random_consonantes = rand(0, count($consonantes)-1); $nombre.= $consonantes[$random_consonantes]; $random = 0; break;
                }
        }
		
		///Pasa el nnombre por MD5 y Sha1
		
		return $nombre;
}
?>