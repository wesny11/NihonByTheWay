<?php
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>
<?php
	session_start();
	include('mysql-connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>O nas - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<div class="about-us">
				<div class="big-image">
					<img src="images/ekipa2.jpg" alt="">
				</div>
				<h2>Spoznajte nas bolje!</h2>
				<p><span class="red">日本ByTheWay</span> je ena prvih japonskih restavracij v Sloveniji, ki ponuja zgolj dostavo na dom. Restavracija je opremljena v elegantnem ambientu in pri osebnem prevzemu jedi pričara edinstveno vzdušje. S pestrim izborom priljubljenih japonskih jedi, vas vabimo na popotovanje po okusih Daljnega vzhoda, spoznavanje japonske kulture in prijetno doživetje ‘nečesa drugačnega’.</p><br>
				<p>Restavracija se nahaja v mirnem okolišu ob Koseškem bajerju, na Kmečki poti 28 v Ljubljani.</p>
				<p>Telefon: <span class="red">01 234 567</span>, Email: <span class="red">nihonbytheway@gmail.com</span></p>
			</div>
		</div>		
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>