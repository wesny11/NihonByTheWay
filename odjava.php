<?php
session_start(); 
//uničimo sejo
$_SESSION = array();
session_destroy();
//uničimo cookie
setcookie("uporabnik", "", time()-3600);

header('Location: products-grid.php?izbira=0');
?>