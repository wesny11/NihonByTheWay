<!doctype html>

<?php session_start(); ?>
<?php include("scripts/connect_to_mysql.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - 日本ByTheWay</title>
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
			<div class="login">
				<h2>Prijava</h2>
				<form action="" method="post">
					<p>
						<label for="email">Email:</label>
						<input type="text" name="email" value="" />
					</p>
					<p>
						<label for="password">Geslo:</label>
						<input type="password" name="password" value="" />
					</p>
					<button type="submit" name="submit">Prijavi se</button>
				</form>
			</div>
		</div>
	</div>
	
	<?php 
		//pogledamo če seja že obstaja
		if (isset($_SESSION['email'])) {
			header("location: index.php");
			die();
		} else {
			if (isset($_POST['submit'])) {  //ob kliku "Prijavi se":
				$email = $_POST['email'];
				$geslo = $_POST['password'];
				
				$uporabnik = mysql_query("SELECT * FROM uporabniki WHERE Email='$email'");

				if(mysql_num_rows($uporabnik) == 0) {   //preverimo če uporabnik z določenim emailom obstaja
					echo "Uporabnik s tem emailom ne obstaja!";
				} else {  							   //če obstaja:
					$vrstica = mysql_fetch_array($uporabnik);
					if($vrstica['Geslo'] == $geslo) {   //preverimo ali se geslo ujema 
						// set session
						$_SESSION['email'] = $email;   //vzpostavimo sejo
						// isAdmin?
						$jeAdmin = $vrstica['JeAdmin'];
						$_SESSION['JeAdmin'] = $jeAdmin;
						
						setcookie("admin", $jeAdmin, time() + 24 * 60 * 60 );
						setcookie("uporabnik", $vrstica['Ime'], time() + 24 * 60 * 60 );
						
						if ($jeAdmin == 1) {
							header("location: index.php");
						} else {
							header("location: login2.php");
						}
						die();
					} else {
						echo "Email in geslo se ne ujemata!";
					}
				}
			}
		}
	?>
	
	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>