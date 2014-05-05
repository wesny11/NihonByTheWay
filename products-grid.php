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
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row clearfix">
			<?php if (isset($_SESSION['admin'])): ?>
				<div class="add-product-button">
					<a class="big-red" href="add-product.php">Dodaj</a>
				</div>
			<?php endif; ?>
			<ul class="products-grid inline-list">
				<?php
					$result = null;

					if ($_GET['izbira'] == 0) {
						$result = mysqli_query($connection, "SELECT * FROM hrana");
					} else if ($_GET['izbira'] == 1) {
						$result = mysqli_query($connection, "SELECT * FROM hrana WHERE VrstaHrane='Juhe'");
					} else if ($_GET['izbira'] == 2) {
						$result = mysqli_query($connection, "SELECT * FROM hrana WHERE VrstaHrane='Sushi'");
					} else if ($_GET['izbira'] == 3) {
						$result = mysqli_query($connection, "SELECT * FROM hrana WHERE VrstaHrane='Sladice'");
					} else if ($_GET['izbira'] == 4) {
						$result = mysqli_query($connection, "SELECT * FROM hrana WHERE VrstaHrane='Ostalo'");
					} else if ($_GET['izbira'] == 5) {
						$result = mysqli_query($connection, "SELECT * FROM pijaca");
					}
					
					if (mysqli_num_rows($result) != 0) {
						while($vrstica = mysqli_fetch_array($result)) {
							echo '<li>';	
								echo '<div class="inner">';
									echo '<div class="product-picture"><img src='.$vrstica["Slika"].' alt=""></div>';
									echo '<div class="product-information">';
										echo '<a href="product.php?izbira='.$_GET['izbira'].'&posamezna='.(!empty($vrstica["HranaID"])?$vrstica["HranaID"]:$vrstica["PijacaID"]).'"><h4>'.$vrstica["Ime"].'</h4></a>';
										echo '<h5>'.$vrstica["Cena"].",00 €".'</h5>';
									echo '</div>';
								echo '</div>';
								if (isset($_SESSION['admin'])) {
									echo'<div class="admin-buttons">
								 			<a href="#" class="edit">Uredi</a>
								 			<a href="#" class="delete">Izbriši</a>
								 		</div>';
								}
							echo'</li>';
						}
					}
				?>
			</ul>
		</div>
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>