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
	<title>Index - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">

	<script src="scripts/jquery-1.11.1.min.js"></script>
	<script src="scripts/jquery.slides.min.js"></script>
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<div class="slides-container center">
				<div id="slides">
					<img src="images/slideshow/slide3.jpg" />
					<img src="images/slideshow/slide4.jpg" />
					<img src="images/slideshow/slide7.jpg" />
				</div>
			</div>
		</div>	
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>

	<script>
		$(function() {
			$('#slides').slidesjs({
				width: 869,
				height: 350,
				navigation: { active: false },
				pagination: { active: false },
				play: {
					active: false,
					interval: 5000,
					auto: true,
					pauseOnHover: true,
					restartDelay: 2500
				}
			});
		});
	</script>
</body>
</html>
<?php mysqli_close($connection); ?>