<!doctype html>

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
		}
	?>
	
	<footer>
		<?php include("footer.php"); ?>
	</footer> <!-- /Footer -->
</body>
</html>