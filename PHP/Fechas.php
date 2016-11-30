<?php
function InsertFecha($fecha)
{
	return $fecha[6].$fecha[7].$fecha[8].$fecha[9]."-".$fecha[3].$fecha[4]."-".$fecha[0].$fecha[1];
}
?>
<?php
function SelectFecha($fecha)
{
	return $fecha[8].$fecha[9]."/".$fecha[5].$fecha[6]."/".$fecha[0].$fecha[1].$fecha[2].$fecha[3];
}
?>