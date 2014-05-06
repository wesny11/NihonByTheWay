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

	$connection = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die("Povezava na mysql ni uspela!");
?>