<<<<<<< HEAD
<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>

=======
<?php session_start(); ?>

<!doctype html>

<?php include("scripts/connect_to_mysql.php"); ?>
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
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
<<<<<<< HEAD
	
=======

	<div class="breadcrumbs">
		<div class="row clearfix">
			<ul class="inline-list">
				<li class="home"><a href="#">DOMOV</a></li>			
				<li class="triangle"></li>
				<li class="current"><a href="#">REGISTRACIJA</a></li>
			</ul>
		</div>
	</div> <!-- /Breadcrumbs -->

>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
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
<<<<<<< HEAD
						<label for="zip">Poštna številka:</label>
						<input type="text" name="zip" value="" />
					</p>
					<!-- /Pri registraciji uporabniku vpišemo še vrednost jeAdmin = 0 -->
=======
						<label for="zip">Poštna:</label>
						<input type="text" name="zip" value="" />
					</p>
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
					<button type="submit" name="submit">Registriraj se</button>
				</form>
			</div>
		</div>
<<<<<<< HEAD
	</div> <!-- /Content -->

=======
	</div>
	
	<?php
		if (isset($_POST['submit'])){  //ob kliku na gumb "registriraj se":
			$email=$_POST['email'];

			$uporabnik=mysql_query("SELECT * FROM uporabniki WHERE Email='$email'");
			
			if(mysql_num_rows($uporabnik) != 0){  //preverimo ali uporabnik že obstaja
				echo "Uporabnik že obstaja";
			}else{			
				$ime=$_POST['name'];
				$priimek=$_POST['surname'];
				$geslo=$_POST['password'];
				$naslov=$_POST['address'];
				$mesto=$_POST['city'];
				$posta=$_POST['zip'];
					
				$vstavi="INSERT INTO uporabniki (Ime, Priimek, Geslo, Email, Naslov, Mesto, PostnaStevilka, JeAdmin)
						VALUES ('$ime', '$priimek', '$geslo', '$email', '$naslov', '$mesto', '$posta', 0)";

				if (!mysql_query($vstavi)) {
					die('Error: ' . mysql_error($connection));
				}
				echo "Uporabnik uspešno dodan!";
				header("location:products-grid.php?izbira=0"); //redirect na domačo	
			}
		}
	?>
	
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
<<<<<<< HEAD
</html>
=======
</html>
<?php mysql_close($connection); ?>
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
