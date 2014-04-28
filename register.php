<!doctype html>

<?php session_start(); ?>
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

	<div class="breadcrumbs">
		<div class="row clearfix">
		</div>
	</div> <!-- /Breadcrumbs -->

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
					<button type="submit" name="submit">Registriraj se</button>
				</form>
			</div>
		</div>
	</div> <!-- /Content -->
	
	<?php
		if (isset($_POST['submit'])){  //ob kliku na gumb "registriraj se":
			$email = $_POST['email'];

			$uporabnik = mysql_query("SELECT * FROM uporabniki WHERE Email='$email'");
			
			if(mysql_num_rows($uporabnik) != 0){  //preverimo ali uporabnik že obstaja
				echo "Uporabnik s tem emailom že obstaja!";
			}else{			
				$ime = $_POST['name'];
				$priimek = $_POST['surname'];
				$geslo = $_POST['password'];
				$naslov = $_POST['address'];
				$mesto = $_POST['city'];
				$posta = $_POST['zip'];
					
				$vstavi = "INSERT INTO uporabniki (Ime, Priimek, Geslo, Email, Naslov, Mesto, PostnaStevilka, JeAdmin)
						VALUES ('$ime', '$priimek', '$geslo', '$email', '$naslov', '$mesto', '$posta', 0)";

				if (!mysql_query($vstavi)) {
					die('Error: ' . mysql_error($connection));
				}
				header("location: login.php");
			}
		}
	?>

	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>

<?php mysql_close($connection); ?>