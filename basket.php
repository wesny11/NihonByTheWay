<?php include('mysql-connection.php'); ?>

<?php 
	$pid=$_GET['pid'];
	$pcat=$_GET['pcat'];
	$qt=$_GET['qt'];
	$skupnaCena=0;
	
	if($pcat == 'h'){
		$product_result = mysqli_query($connection, "SELECT * FROM hrana WHERE HranaID='$pid'");
	} else if($pcat == 'p'){
		$product_result = mysqli_query($connection, "SELECT * FROM pijaca WHERE PijacaID='$pid'");
	}
	
	while($data = mysqli_fetch_array($product_result)){
	$ime=$data['Ime'];
	$cena=$data['Cena'];
	}
	
	$skupnaCena += $cena*$qt;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Košarica</title>
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
		<div class="even">
			<div class="text">
				<h3>NAKUPOVALNA KOŠARICA</h3>
				<p><span class="red"><?php echo $ime ?></span></p>
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


	
	<script type="text/javascript">
		//var ul = document.getElementById("seznam");
		//var li = document.createElement("li");
		//li.appendChild(document.createTextNode("TEST"));
		//ul.appendChild(li);	
	</script>;
	
<?php //	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>