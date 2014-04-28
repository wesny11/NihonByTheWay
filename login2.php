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

	<div class="breadcrumbs">
		<div class="row clearfix">
		</div>
	</div> <!-- /Breadcrumbs -->
	
	<div class="content">
		<div class="row">
			<div class="login2">
				<?php
				$user = $_COOKIE["uporabnik"];
				echo '<h2>Konnichiwa '.$user.'-san!</h2>';
				header("refresh:2; url=index.php");
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