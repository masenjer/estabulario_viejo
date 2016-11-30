<?php

	session_start();
	$cache_expire = session_cache_expire();	
	
	echo "Las páginas de sesión examinadas caducan después de $cache_expire minutos";
	
	if(isset($_SESSION["IdUser"])||isset($_SESSION["IdA"])) echo 1;
	session_cache_expire(1);
	
?>