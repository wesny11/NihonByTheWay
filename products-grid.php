<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Products grid - 日本ByTheWay</title>
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
			<ul class="products-grid inline-list">
				<?php 
				$izbiraHeader = $_GET['izbira'];
				if($izbiraHeader == 0){
					$vse = mysql_query("SELECT * FROM hrana", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vseJedi = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vseJedi["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vseJedi["HranaID"].'&zivilo=hrana">
									<h4>' .$vseJedi["Ime"]. '</h4></a>
									<h5>' .$vseJedi["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 1){
					$vse = mysql_query("SELECT * FROM hrana WHERE VrstaHrane='Juhe'", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vseJedi = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vseJedi["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vseJedi["HranaID"].'&zivilo=hrana">
									<h4>' .$vseJedi["Ime"]. '</h4></a>
									<h5>' .$vseJedi["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 2){
					$vse = mysql_query("SELECT * FROM hrana WHERE VrstaHrane='Sushi'", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vseJedi = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vseJedi["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vseJedi["HranaID"].'&zivilo=hrana">
									<h4>' .$vseJedi["Ime"]. '</h4></a>
									<h5>' .$vseJedi["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 3){
					$vse = mysql_query("SELECT * FROM hrana WHERE VrstaHrane='Sladice'", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vseJedi = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vseJedi["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vseJedi["HranaID"].'&zivilo=hrana">
									<h4>' .$vseJedi["Ime"]. '</h4></a>
									<h5>' .$vseJedi["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 4){
					$vse = mysql_query("SELECT * FROM hrana WHERE VrstaHrane='Ostalo'", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vseJedi = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vseJedi["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vseJedi["HranaID"].'&zivilo=hrana">
									<h4>' .$vseJedi["Ime"]. '</h4></a>
									<h5>' .$vseJedi["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 5){
					$vse = mysql_query("SELECT * FROM pijaca", $connection);
					if (!$vse) {
						die("Ni našlo!" . mysql_error());
					}
					while($vsePijace = mysql_fetch_array($vse)){
						echo '<li>
							<div class="inner">
								<div class="product-picture">
									<img src='.$vsePijace["Slika"].' alt="">
								</div>
								<div class="product-information">
									<a href="product.php?posamezna='.$vsePijace["PijacaID"].'&zivilo=pijaca">
									<h4>' .$vsePijace["Ime"]. '</h4></a>
									<h5>' .$vsePijace["Cena"].",00 €". '</h5>
								</div>
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
				}
				if($izbiraHeader == 6){
					//O nas - prestavitev restavracije in osebja
				}
				?>
			</ul> <!-- /Product-grid -->			
		</div>
	</div> <!-- /Content -->	

	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->	
</body>
</html>