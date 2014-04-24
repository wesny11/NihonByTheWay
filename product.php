<!doctype html>

<?php 
	$connection_db = mysql_connect("localhost", "root");
	if (!$connection_db) {
		die("Povezava ni uspela!" . mysql_error());
	}
	$db_select = mysql_select_db("Restavracija_baza", $connection_db);
	if (!$db_select) {
		die("Izbira baze ni uspela!" . mysql_error());
	}
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product - 日本ByTheWay</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="row clearfix">
			<a class="" href="#"><h1>日本ByTheWay</h1></a>
			<nav class="left">
				<ul class="inline-list">
					<li><a href="#">DOMOV</a></li>
					<li><a href="#">HRANA</a>
						<ul>
							<li><a href="#">VSE</a></li>
							<li><a href="#">JUHE</a></li>
							<li><a href="#">SUSHI</a></li>
							<li><a href="#">SLADICE</a></li>
							<li><a href="#">OSTALE JEDI</a></li>
						</ul>
					</li>
					<li><a href="#">PIJAČA</a></li>
					<li><a href="#">O NAS</a></li>
				</ul>
			</nav>
			<nav class="right">
				<ul class="inline-list">
					<li class="user"><a href="#">
						<span>User</span></a>
						<ul>
							<li><a href="#">PRIJAVA</a></li>
							<li><a href="#">REGISTRACIJA</a></li>
						</ul>
					</li>
					<li class="shopping-cart"><a href="#"><span>Shopping cart</span></a></li>
				</ul>
			</nav>			
		</div>		
	</header> <!-- /Header -->

	<div class="breadcrumbs">
		<div class="row clearfix">
			<ul class="inline-list">
				<li class="home"><a href="#">DOMOV</a></li>			
				<li class="triangle"></li>
				<li><a href="#">HRANA</a></li>
				<li class="triangle"></li>
				<li><a href="#">SUSHI</a></li>
				<li class="triangle"></li>
				<li class="current"><a href="#">TEMPURA SUSHI</a></li>
			</ul>
		</div>
	</div> <!-- /Breadcrumbs -->

	<div class="content">
		<div class="row clearfix">
			<div class="product">
				<div class="product-image">
					<img src="images/sushi-big.png" alt="A big picture of sushi">
				</div>				
				<div class="product-information">
					<div class="name-and-price">
						<!--<h2>Tempura sushi</h2>-->
						<h2><?php 
							$ime = mysql_query("SELECT ime FROM hrana", $connection_db);
							if (!$ime) {
								die("Imena ni našlo!" . mysql_error());
							}
							echo $ime;
						?></h2>
						<div class="admin-buttons">
							<a href="#" class="edit">Uredi</a>
							<a href="#" class="delete">Izbriši</a>
						</div>
						<span class="price">5,00 €</span>
					</div>
					<div class="order">
						<label for="quantity">Količina:</label>
						<input type="text" name="quantity" value="">
						<button type="submit">Dodaj v naročilo</button>
					</div>
					<div class="description">
						<h4>Opis</h4>
						<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi dolores quos amet deleniti. Nobis, aut eum expedita consequatur eaque optio velit maiores incidunt quae fuga laudantium tenetur cum rerum eius. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, ipsa, ut placeat accusantium quae aperiam consectetur nesciunt excepturi in voluptatem illum officiis minus. Consectetur, voluptatibus animi nihil ad quasi totam!</p>
					</div>					
				</div> <!-- /Product-information -->
				<div class="comments">
					<h2>Komentarji</h2>
					<div class="single-comment">
						<div class="author">
							<span>Matej Urh</span>
						</div>
						<div class="text">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel, quidem ipsam officiis natus nostrum quis quo optio dolore reprehenderit libero ad repellendus corporis modi unde tenetur laudantium magnam a.</p>
						</div>
					</div>
					<div class="single-comment">
						<div class="author">
							<span>Matej Urh</span>
						</div>
						<div class="text">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel, quidem ipsam officiis natus nostrum quis quo optio dolore reprehenderit libero ad repellendus corporis modi unde tenetur laudantium magnam a.</p>
						</div>
					</div>
					<div class="single-comment">
						<div class="author">
							<span>Matej Urh</span>
						</div>
						<div class="text">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, vel, quidem ipsam officiis natus nostrum quis quo optio dolore reprehenderit libero ad repellendus corporis modi unde tenetur laudantium magnam a.</p>
						</div>
					</div>
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
		<div class="row clearfix">
			<div class="center">				
				<ul class="inline-list">
					<li><span>©2014 日本ByTheWay</span></li>
					<li><a href="#">Domov</a></li>
					<li><a href="#">Hrana</a></li>
					<li><a href="#">Pijača</a></li>
					<li><a href="#">O Nas</a></li>
				</ul>
			</div>			
		</div>
	</footer> <!-- /Footer -->
</body>
</html>

<?php mysql_close($connection_db); ?>