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
		$any_comments = mysqli_query($connection, 'SELECT * FROM komentarhrana WHERE Hrana_HranaID='.$_GET['hranaid']);
		if (mysqli_num_rows($any_comments) > 0) {
			foreach ($any_comments as $comment) {
				$comment = mysqli_query($connection, 'DELETE FROM komentarhrana WHERE Hrana_HranaID='.$_GET['hranaid']);
			}
		}
		$result = mysqli_query($connection, 'DELETE FROM hrana WHERE HranaID='.$_GET['hranaid']);
	} else if (isset($_GET['pijacaid'])) {
		$any_comments = mysqli_query($connection, 'SELECT * FROM komentarpijaca WHERE Pijaca_PijacaID='.$_GET['pijacaid']);
		if (mysqli_num_rows($any_comments) > 0) {
			foreach ($any_comments as $comment) {
				$comment = mysqli_query($connection, 'DELETE FROM komentarpijaca WHERE Pijaca_PijacaID='.$_GET['pijacaid']);
			}
		}
		$result = mysqli_query($connection, 'DELETE FROM pijaca WHERE PijacaID='.$_GET['pijacaid']);
	}

	if ($result) {
		Header('Location: products-grid.php?izbira='.$_GET['izbira'].'&s=true');
	} else {
		Header('Location: products-grid.php?izbira='.$_GET['izbira'].'&s=false');
	}
?>
<?php mysqli_close($connection); ?>