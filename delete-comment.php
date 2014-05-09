<?php
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>
<?php
	session_start();
	include('mysql-connection.php');
?>
<?php
	$result = null;
	if (isset($_GET['hranaid'])) {
		$result = mysqli_query($connection, 'DELETE FROM komentarhrana WHERE KomentarHranaID='.$_GET['id']);
	} else if (isset($_GET['pijacaid'])) {
		$result = mysqli_query($connection, 'DELETE FROM komentarpijaca WHERE KomentarPijacaID='.$_GET['id']);
	}

	if ($result) {
		Header('Location: products-grid.php?izbira='.$_GET['izbira'].'&k=true');
	} else {
		Header('Location: products-grid.php?izbira='.$_GET['izbira'].'&k=false');
	}
?>
<?php mysqli_close($connection); ?>