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
	<title>Login - 日本ByTheWay</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
<<<<<<< HEAD
		<?php include("header.php"); ?>	
	</header> <!-- /Header -->
	
	<?php
		//če je uporabnik ze logiran, preusmeri na index
		if (isset($_SESSION['email'])) {
			header("location:index.php");
			die();
		//uporabnik še ni logiran
		} else {
			$email = "";
			$obstaja = true;
			if (isset($_POST['login'])) {
				$email = $_POST['email'];
				$poizvedba = mysql_query("SELECT * FROM uporabniki WHERE Email=$username", $connection);
				//uporabnik ne obstaja - napačen email
				if (mysql_num_rows($poizvedba) == 0) {
					$obstaja = false;
				} else {
					$password = $_POST['password'];
					$password = hash("sha512", $password);
					$uporabnik = mysql_fetch_array($poizvedba);
					if ($password == $uporabnik['Geslo']) {
						//začni sejo
						$_SESSION['email'] = $email;
						//preusmeri na login2
						header("location:login2.php");
						die();
					//uporabnik ne obstaja - napačno geslo
					} else {
						$obstaja = false;
					}
				}
			}
			if (!isset($_POST['login']) || !$obstaja) {
				echo '<div class="content">
					<div class="row">
						<div class="login">
							<h2>Prijava</h2>
							<form action="" method="post">
								<p>
									<label for="Email">Email:</label>
									<input type="text" name="email" value="" />
								</p>
								<p>
									<label for="Geslo">Geslo:</label>
									<input type="password" name="password" value="" />';
									if (!$obstaja) {
										echo "Napačen email ali geslo!";
									}
								echo '</p>
								<button type="submit" name="submit">Prijavi se</button>
							</form>
						</div>
					</div>
				</div> <!-- /Content -->';				
			}
=======
		<?php include("header.php"); ?>		
	</header> <!-- /Header -->

	<div class="breadcrumbs">
		<div class="row clearfix">
			<ul class="inline-list">
				<li class="home"><a href="#">DOMOV</a></li>			
				<li class="triangle"></li>
				<li class="current"><a href="#">VPIS</a></li>
			</ul>
		</div>
	</div> <!-- /Breadcrumbs -->

	<div class="content">
		<div class="row">
			<div class="login">
				<h2>Vpis</h2>
				<form action="" method="post">
					<p>
						<label for="email">Email:</label>
						<input type="text" name="email" value="" />
					</p>
					<p>
						<label for="password">Geslo:</label>
						<input type="password" name="password" value="" />
					</p>
					<button type="submit" name="submit">Vpiši se</button>
				</form>
			</div>
		</div>
	</div>
	
	<?php 
		//pogledamo če seja že obstaja
		if (isset($_SESSION['email'])){
			header("location:products-grid.php?izbira=0"); 	//če obstaja redirectamo: ko bo končano lahko na domačo stran
			die();
		}else{
			if (isset($_POST['submit'])){  //ob kliku "vpiši se":
				$email=$_POST['email'];
				$geslo=$_POST['password'];
				
				$uporabnik=mysql_query("SELECT * FROM uporabniki WHERE Email='$email'");

				if(mysql_num_rows($uporabnik) == 0){   //preverimo če uporabnik z določenim emailom obstaja
					echo "Uporabnik s tem emailom ne obstaja";
				} else{  							   //če obstaja:
					$vrstica=mysql_fetch_array($uporabnik);
					if($vrstica['Geslo'] == $geslo){  //preverimo ali se geslo ujema 
						// set session
						$_SESSION['email'] = $email;  //vzpostavimo sejo
						// isAdmin?
						$jeAdmin = $vrstica['JeAdmin'];
						$_SESSION['JeAdmin'] = $jeAdmin;
						
						$podatki = $vrstica['Ime']. " " .$vrstica['Priimek'];
						setcookie("uporabnik", $podatki, time() + 24 * 60 * 60 ); // v cookie shranimo ime in priimek uporabnika, da kasneje izpišemo
						
						// redirect to index
						header("location:products-grid.php?izbira=0");
						die();
					}else{
						echo "Email in geslo se ne ujemata!";
					}
				}
			}
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
		}
	?>
	
	<footer>
<<<<<<< HEAD
		<?php include("footer.php"); ?>
=======
		<?php include("footer.php");?>
>>>>>>> 85b3443f3c26dede33a7cdcc31d4772264c20659
	</footer> <!-- /Footer -->
</body>
</html>