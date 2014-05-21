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
		<div class="slides-container center">
			<div id="slides">
				<img src="images/slideshow/slide1.jpg" />
				<img src="images/slideshow/slide2.jpg" />
				<img src="images/slideshow/slide3.jpg" />
			</div>
		</div>
		<div class="row">
			<div class="index-content">
				<div class="even">
					<div class="text">
						<h3>SPOMLADANSKI SUSHI</h3>
						<p>V mesecu maju vsa narava zacveti. V ta namen smo za vas pripravili posebno ponudbo –<span class="red"> Uramaki sushi</span> z okusom pomladi. Razvajajte svoje brbončice s harmonijo okusov.</p>
					</div>					
					<img src="images/spomladanski_sushi.JPG" alt="">
				</div>
				<div class="odd clearfix">
					<div class="text">
						<h3>PANDE</h3>
						<p>Pred kratkim je v Japonskem živalskem vrtu samička pande povrgla dva mladička. Ob tem dogodku smo za vas v mesecu aprilu pripravili okusni črnobeli sushii v obliki pande.</p>
					</div>
					<img src="images/pande.jpeg" alt="">				
				</div>
				<div class="even clearfix">
					<div class="text">
						<h3>MICROSOFTOVA NT KONFERENCA</h3>
						<p>Januarja je v Ljubljani potekala že druga Microsoftova NT konferenca. V čast nam je bilo, da smo tehnološke strokovnjake lahko postregli z edinstvenim Microsoftovim sushijem.</p>
					</div>
					<img src="images/microsoftova_konferenca.jpg" alt="">
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
					auto: true
				}
			});
		});
	</script>
</body>
</html>
<?php mysqli_close($connection); ?>