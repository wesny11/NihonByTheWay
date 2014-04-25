<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product - 日本ByTheWay</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<?php include("header.php"); ?>		
	</header> <!-- /Header -->

	<div class="breadcrumbs">
		<?php include("breadcrumbs.php"); ?>
	</div> <!-- /Breadcrumbs -->

	<div class="content">
		<div class="row clearfix">
			<div class="product">
				<?php $izbiraProductsGrid = $_GET['posamezna']; ?>
				<div class="product-image">
					<?php
						$slika = mysql_query("SELECT Slika FROM hrana WHERE HranaID='$izbiraProductsGrid'", $connection);
						if (!$slika) {
							die("Slike ni našlo!" . mysql_error());
						}
						while($vrstica = mysql_fetch_array($slika)){
							echo '<img src='.$vrstica["Slika"].' alt="Slika ni na voljo!">';
						}
					?>
				</div>				
				<div class="product-information">
					<div class="name-and-price">
						<h2><?php 
							$ime = mysql_query("SELECT Ime FROM hrana WHERE HranaID='$izbiraProductsGrid'", $connection);
							if (!$ime) {
								die("Imena ni našlo!" . mysql_error());
							}
							while($vrstica = mysql_fetch_array($ime)){
								echo $vrstica[0];
							}
						?></h2>
						<div class="admin-buttons">
							<a href="#" class="edit">Uredi</a>
							<a href="#" class="delete">Izbriši</a>
						</div>
						<span class="price"><?php 
							$cena = mysql_query("SELECT Cena FROM hrana WHERE HranaID=$izbiraProductsGrid", $connection);
							if (!$cena) {
								die("Cene ni našlo!" . mysql_error());
							}
							while($vrstica = mysql_fetch_array($cena)){
								echo $vrstica[0] . ",00 €";
							}
						?></span>
					</div>
					<div class="order">
						<label for="quantity">Količina:</label>
						<input type="text" name="quantity" value="">
						<button type="submit">Dodaj v naročilo</button>
					</div>
					<div class="description">
						<h4>Opis</h4>
						<p class="description"><?php 
							$opis = mysql_query("SELECT Opis FROM hrana WHERE HranaID=$izbiraProductsGrid", $connection);
							if (!$opis) {
								die("Opisa ni našlo!" . mysql_error());
							}
							while($vrstica = mysql_fetch_array($opis)){
								echo $vrstica[0];
							}
						?></p>
					</div>					
				</div> <!-- /Product-information -->
				<div class="comments">
					<h2>Komentarji</h2><?php
						$komentarji = mysql_query("SELECT * FROM komentarhrana WHERE Hrana_HranaID=$izbiraProductsGrid", $connection);
						if (!$komentarji) {
							die("Komentarjev ni našlo!" . mysql_error());
						}
						while($komentar = mysql_fetch_array($komentarji)){
							echo '<div class="single-comment">
								<div class="author">';
									$idAvtor = $komentar["Uporabnik_UporabnikID"];
									$avtor = mysql_query("SELECT Ime,Priimek FROM uporabniki WHERE UporabnikID=$idAvtor", $connection);
									if (!$avtor) {
										die("Komentarja ni našlo!" . mysql_error());
									}
									while($vrstica = mysql_fetch_array($avtor)){
										echo '<span>'.$vrstica[0].'</span>';
									}
								echo '</div>
								<div class="text">
									<p>'.$komentar["Vsebina"].'</p>
								</div>
							</div>';
						}
					?>
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
				</div> <!-- /Comments -->
			</div>	
		</div>
	</div> <!-- /Content -->

	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>

<?php mysql_close($connection); ?>