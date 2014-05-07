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
				<img src="images/slideshow/slide1-crop.jpg" />
				<img src="images/slideshow/slide2-crop.jpg" />
				<img src="images/slideshow/slide3-crop.jpg" />
			</div>
		</div>
		<div class="row">
			<div class="index-content">
				<div class="even">
					<div class="text">
						<h3>Spoznajte sushi na <span class="red">spletu</span>.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quos, quisquam, sunt aliquid voluptatem eum aut nesciunt consequatur aspernatur unde recusandae facilis neque ipsam ipsum iste voluptatum culpa incidunt voluptatibus.</p>
					</div>					
					<img src="images/spring.jpg" alt="">
				</div>
				<div class="odd clearfix">
					<div class="text">
						<h3>Enostavno naročanje in hitra dostava.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, expedita dolorum perferendis incidunt blanditiis molestias laborum asperiores! Molestias, fuga vitae earum quae suscipit modi dolor nulla tenetur impedit laborum hic.</p>
					</div>
					<img src="images/pande.JPEG" alt="">				
				</div>
				<div class="even clearfix">
					<div class="text">
						<h3>Svežina in kakovost.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, debitis, tempora, quibusdam, ipsam iste sunt quae necessitatibus autem molestiae pariatur quod porro nihil magnam molestias possimus reprehenderit repellendus laboriosam iure.</p>
					</div>
					<img src="images/microsoft.jpg" alt="">
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