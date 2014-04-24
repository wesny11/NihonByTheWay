<?php
// Pred prijavo na bazo lahko zaženemo tudi sejo

/// PRIJAVA NA BAZO
// Ime strežnika
$db_host = "localhost";
// Ime uporabnika
$db_username = "root"; 
// Koda
$db_pass = ""; 
// Ime baze
$db_name = "restavracija";

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("No database");             
?>