<?php
include("../rao/EstabulariForm_con.php");
session_start();

if ($_SESSION["IdUser"])echo 1;
else echo 2;
   
?>