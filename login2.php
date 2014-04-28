<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - 日本ByTheWay</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<?php include("header.php"); ?>	
	</header> <!-- /Header -->

	<div class="content">
		<div class="row">
			<div class="login2">
				<?php 
				$ime = mysql_query("SELECT Ime FROM uporabniki WHERE Email=$email", $connection);
				if (!$ime) {
					die("Imena ni našlo!" . mysql_error());
				}
				$vrstica = mysql_fetch_array($ime);
				echo '<h2>Konnichiwa '.$vrstica[0].'-san!</h2>';
				header("refresh:3; url=index.php");
				die();
				?>
			</div>
		</div>
	</div> <!-- /Content -->

	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>