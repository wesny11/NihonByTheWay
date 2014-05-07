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
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div id="gallery">
			<a href="#" class="show">
				<img src="images/slideshow/slide3.jpg" width="580" height="360"/>
			</a>
			<a href="#">
				<img src="images/slideshow/slide4.jpg" width="580" height="360"/>
			</a>
			<a href="#">
				<img src="images/slideshow/slide7.jpg" width="580" height="360"/>
			</a>
			<div class="caption"></div>
			<div class="clear"></div>
		</div>
	</div>
	
	<script>
		$(document).ready(function() {        
			//Execute the slideShow
			slideShow();
		});
		function slideShow() {
			//Set the opacity of all images to 0
			$('#gallery a').css({opacity: 0.0});
			
			//Get the first image and display it (set it to full opacity)
			$('#gallery a:first').css({opacity: 1.0});
			
			//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
			setInterval('gallery()',6000);	
		}
		function gallery() {
			//if no IMGs have the show class, grab the first image
			var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));
			//Get next image, if it reached the end of the slideshow, rotate it back to the first image
			var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));    
					
			//Set the fade in effect for the next image, show class has higher z-index
			next.css({opacity: 0.0})
			.addClass('show')
			.animate({opacity: 1.0}, 1000);
			//Hide the current image
			current.animate({opacity: 0.0}, 1000)
			.removeClass('show');	
		}
	</script>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>