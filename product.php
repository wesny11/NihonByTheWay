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
			$id = $data[0];
			$ime = $data[1];
			$opis = $data[3];
			$cena = $data[4];
			$slika = $data[5];
		} else {
			die();
		}
	}

	if (isset($_POST['submit-comment'])) {
		$text = $_POST['comment'];
		$user_id = $_SESSION['user_id'];
		if ($izbira >= 0 && $izbira < 5) {			
			$new_comment = mysqli_query($connection, "INSERT INTO komentarhrana (Hrana_HranaID, Uporabnik_UporabnikID, Vsebina, Ocena) VALUES('$posamezna', '$user_id', '$text', '5')");
		} else if ($izbira == 5) {
			$new_comment = mysqli_query($connection, "INSERT INTO komentarpijaca (Pijaca_PijacaID, Uporabnik_UporabnikID, Vsebina, Ocena) VALUES('$posamezna', '$user_id', '$text', '5')");
		}

		if (!$new_comment) {
			echo '<p class="red">Prišlo je do napake</p>';
		} else {
			echo '<script>location.reload()</script>';
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Izdelek - 日本ByTheWay</title>
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
							 			<a href="edit-product.php?'.($izbira!=5?"hranaid=".$id:"pijacaid=".$id).'" class="edit">Uredi</a>
							 			<a href="delete-product.php?izbira='.$izbira.'&'.($izbira!=5?"hranaid=".$id:"pijacaid=".$id).'" class="delete">Izbriši</a>
							 		</div>';
							}
						?>
						<span class="price"><?php echo $cena.',00 €'; ?></span>
					</div>
					<div class="order">
						<label for="quantity">Količina:</label>
						<input id="quantity" type="text" name="quantity" value="" onkeyup="getValue(this.value)">
						<?php
							$pid = $id;
							$pcat = $_GET['izbira']!=5?'h':'p';
							//$qt = echo '<script>var x = document.getElementById("quantity").value;</script>';
							if (isset($_SESSION['user']) || isset($_SESSION['admin'])){
								echo '<a class="big-red" href="basket.php?a=0&pid='.$pid.'&pcat='.$pcat.'&qt=1">Dodaj v naročilo</a>';
							} else {
								echo '<a class="big-red" href="login.php">Dodaj v naročilo</a>';
							}
						?>						
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
								if (isset($_SESSION['admin'])) {
									echo'<div class="admin-buttons2">
											<a href="delete-comment.php?id='.$vrstica[0].'&'.($izbira!=5?"hranaid=".$id:"pijacaid=".$id).'&izbira='.$izbira.'" class="delete">Izbriši</a>
										</div>';
								}			
							}
						} else {
							echo '<div class="single-comment">';						
							echo '<div class="text"><p>Ni komentarjev</p></div>';
							echo '</div>';
						}						
					?>
					<?php if(isset($_SESSION['user'])): ?>
						<form class="comment-form" method="post">
							<p>
								<textarea rows="10" name="comment" class="comment" placeholder="Komentar"></textarea>
							</p>
							<button class="big-red" type="submit" name="submit-comment">Oddaj komentar</button>					
						</form>
					<?php endif; ?>
				</div>
			</div>
		</div>		
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>

	<script>
		$(getValue(var val) {
		});
	</script>
</body>
</html>
<?php mysqli_close($connection); ?>