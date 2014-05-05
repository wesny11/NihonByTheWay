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
	$izbira = null;
	$posamezna = null;
	$product_result = null;
	$comment_result = null;
	$result = null;

	if (isset($_GET['izbira']) && isset($_GET['posamezna'])) {
		$izbira = intval($_GET['izbira']);
		$posamezna = intval($_GET['posamezna']);

		if ($izbira >= 0 && $izbira < 5) {
			$product_result = mysqli_query($connection, "SELECT * FROM hrana WHERE HranaID='$posamezna'");
			$comment_result = mysqli_query($connection, "SELECT * FROM komentarhrana WHERE Hrana_HranaID='$posamezna'");
		} else if ($izbira == 5) {
			$product_result = mysqli_query($connection, "SELECT * FROM pijaca WHERE PijacaID='$posamezna'");
			$comment_result = mysqli_query($connection, "SELECT * FROM komentarpijaca WHERE Pijaca_PijacaID='$posamezna'");
		} else {
			die();
		}

		if (mysqli_num_rows($product_result) != 0) {
			$data = mysqli_fetch_array($product_result);
			$ime = $data[1];
			$opis = $data[3];
			$cena = $data[4];
			$slika = $data[5];
		} else {
			die();
		}
	}
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
			<div class="product">				
				<div class="product-image">
					<img src="<?php echo $slika; ?>" alt="A big picture of sushi">
				</div>
				<div class="product-information">
					<div class="name-and-price">
						<h2><?php echo $ime; ?></h2>
						<?php
							if (isset($_SESSION['admin'])) {
								echo'<div class="admin-buttons">
									<a href="#" class="edit">Uredi</a>
									<a href="#" class="delete">Izbriši</a>
								</div>';
							}
						?>
						<span class="price"><?php echo $cena.',00 €'; ?></span>
					</div>
					<div class="order">
						<label for="quantity">Količina:</label>
						<input type="text" name="quantity" value="">
						<button class="big-red" type="submit">Dodaj v naročilo</button>
					</div>
					<div class="description">
						<h4>Opis</h4>
						<p class="description"><?php echo $opis; ?></p>
					</div>
				</div>
				<div class="row clearfix"></div>
				<div class="comments">
					<h2>Komentarji</h2>
					<?php
						if (mysqli_num_rows($comment_result) != 0) {
							while ($vrstica = mysqli_fetch_array($comment_result)) {
								$id = $vrstica['Uporabnik_UporabnikID'];
								$result = mysqli_query($connection, "SELECT Ime, Priimek FROM uporabniki WHERE UporabnikID=$id");
								if (mysqli_num_rows($result) != 0) {
									$user = mysqli_fetch_array($result);
									echo '<div class="single-comment">';
									echo '<div class="author"><span>'.$user[0]." ".$user[1].'</span></div>';
									echo '<div class="text"><p>'.$vrstica['Vsebina'].'</p></div>';
									echo '</div>';
								}				
							}
						} else {
							echo '<div class="single-comment">';						
							echo '<div class="text"><p>Ni komentarjev</p></div>';
							echo '</div>';
						}
					?>
					<?php if(isset($_SESSION['user'])): ?>
						<div class="comment-form">
							<div>
								<input type="text" name="name" class="name" value="" placeholder="Ime">
							</div>
							<div>
								<input type="email" name="email" class="email" value="" placeholder="Email">
							</div>
							<div>
								<textarea rows="10" name="comment" class="comment" placeholder="Komentar"></textarea>
							</div>
							<div>
								<input type="submit" name="submit" value="Oddaj komentar">
							</div>						
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>		
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>