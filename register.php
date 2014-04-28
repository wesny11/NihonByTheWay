<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register - 日本ByTheWay</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<?php include("header.php"); ?>		
	</header> <!-- /Header -->
	
	<div class="content">
		<div class="row">
			<div class="registration">
				<h2>Registracija</h2>
				<form action="" method="post">
					<p>
						<label for="name">Ime:</label>
						<input type="text" name="name" value="" />
					</p>
					<p>
						<label for="surname">Priimek:</label>
						<input type="text" name="surname" value="" />
					</p>
					<p>
						<label for="email">Email:</label>
						<input type="text" name="email" value="" />
					</p>
					<p>
						<label for="password">Geslo:</label>
						<input type="password" name="password" value="" />
					</p>
					<p>
						<label for="address">Naslov:</label>
						<input type="text" name="address" value="" />
					</p>

					<p>
						<label for="city">Mesto:</label>
						<input type="text" name="city" value="" />
					</p>

					<p>
						<label for="zip">Poštna številka:</label>
						<input type="text" name="zip" value="" />
					</p>
					<!-- /Pri registraciji uporabniku vpišemo še vrednost jeAdmin = 0 -->
					<button type="submit" name="submit">Registriraj se</button>
				</form>
			</div>
		</div>
	</div> <!-- /Content -->

	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>