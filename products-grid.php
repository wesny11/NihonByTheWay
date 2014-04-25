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
						echo '<li>';
							echo '<div class="inner">';
								echo '<div class="product-picture">';
									echo '<img src='.$vseJedi["Slika"].' alt="">';
								echo '</div>';
								echo '<div class="product-information">';
									echo '<a href="product.php?posamezna='.$vseJedi["HranaID"].'"><h4>';
										echo $vseJedi["Ime"];
									echo '</h4></a>';
									echo '<h5>';
									echo $vseJedi["Cena"] . ",00 €";
									echo '</h5>
								</div>						
							</div>
							<div class="admin-buttons">
								<a href="#" class="edit">Uredi</a>
								<a href="#" class="delete">Izbriši</a>
							</div>				
						</li>';
					}
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