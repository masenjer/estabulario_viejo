<?php
error_reporting(0);

include("../rao/EstabulariForm_con.php");
include("../rao/Ponquita.php");
include("../PHP/Fechas.php");

$motiu = $_POST["motiu"];
$fc = InsertFecha($_POST["fecha"]);
if (isset($_POST["dies"])) $dies = $_POST["dies"];
else $dies = 2;



$hoy = date('Y-m-d');
//$hoy = new DateTime($hoy); // Lo convierto a la clase DateTime para poder sumar días
$festivos = array();

$SQL = "SELECT * FROM Festiu  ORDER BY diaFestiu ASC";

$result = mysql_query($SQL,$oConn);
while ($row = mysql_fetch_array($result)){
	$festivos[] = $row["diaFestiu"];
}

//print_r($festivos);

//Controlo que la fecha no caiga en festivo 
foreach ($festivos as $festivo){
	if ($festivo == $fc) {
		echo "La data ".$motiu." coincideix amb una data festiva";
		return false;
	}
}

$cuenta = 0;

while ($cuenta <$dies ){

	$salto = false;

	$hoy = date('Y-m-d', strtotime('+1 day', strtotime($hoy)));
	$N = date('N', strtotime($hoy));

	//echo $cuenta.":".$hoy.':'.$N;
	

	if ($N>5){ //Es sábado ni domingo -> No cuentan como dia laboral
		//echo "fin de semana <br>";
		$salto = true;
	}

	foreach ($festivos as $festivo){
		if ($festivo == $hoy) {
			//echo "festivo <br>";
			$salto = true;
		}
	}

	if ($salto == true) continue;

	//echo '<br>';

	$cuenta ++;
}

if ($hoy > $fc){
	echo "La data ".$motiu." ha de ser posterior a ".$dies." dies laborals a partir del dia actual";
}


?>
