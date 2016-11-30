<?php
include("../rao/EstabulariForm_con.php");
include("../rao/PonQuita.php"); 
include("../PHP/Fechas.php"); 
include("DetallComanda/DetallComanda0.php"); 
include("DetallComanda/DetallComanda1.php"); 
include("DetallComanda/DetallComanda2.php"); 
include("DetallComanda/Obs.php");

session_start();

$id = $_GET["id"];

$SQL = "SELECT CC.TipusForm, DE.Responsable, DE.CentreCost, DE.ReservaCredit FROM ComandaCap CC, DadesEcon DE WHERE DE.IdComandaCap = CC.IdComandaCap AND CC.IdComandaCap=".$id ;
$result = mysql_query($SQL,$oConn);

echo '
<table width="100%" cellpadding="0" cellspacing="5" border="0">';
while ($row = mysql_fetch_array($result))
{
	echo '
	<tr>
		<td align="left"><b>Responsable: </b>'.$row["Responsable"].'</td>
		<td align="center"><b>Centre Gestor: </b>'.$row["CentreCost"].'</td>
		<td align="right"><b>Reserva de Crèdit</b>: '.$row["ReservaCredit"].'</td>
	</tr>	
	'; 
	$TP = $row["TipusForm"];
}
echo '</table>#o#o#';
switch ($TP)
{
	case "0":	CarregaDetallComanda0($id);
				break;
	case "1":	CarregaDetallComanda1($id);
				break;
	case "2":	CarregaDetallComanda2($id);
				break;
}

echo '#o#o#';

	MostraObservacions($id);
?>