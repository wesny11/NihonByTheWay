<?php
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>
<?php
	session_start();
	include('mysql-connection.php');
?>
<?php
	$ime = null;
	$priimek = null;
	$email = null;
	$geslo = null;
	$naslov = null;
	$mesto = null;
	$posta = null;

	if (isset($_POST['submit'])) {
		$ime = $_POST['name'];
		$priimek = $_POST['surname'];
		$email = $_POST['email'];
		$geslo = $_POST['password']; $geslo = hash('sha512', $geslo);
		$naslov = $_POST['address'];
		$mesto = $_POST['city'];
		$posta = $_POST['zip'];

		$valid = true;
		
		if (empty($ime)) {
			$name_error = 'Prosim vnesite ime';
			$valid = false;
		}

		if (empty($priimek)) {
			$surname_error = 'Prosim vnesite priimek';
			$valid = false;
		}

		if (empty($email)) {
			$email_error = 'Prosim vnesite email';
			$valid = false;
		}

		if (empty($geslo)) {
			$pass_error = 'Prosim vnesite geslo';
			$valid = false;
		}

		if (empty($naslov)) {
			$address_error = 'Prosim vnesite naslov';
			$valid = false;
		}

		if (empty($mesto)) {
			$city_error = 'Prosim vnesite mesto';
			$valid = false;
		}

		if (empty($posta)) {
			$zip_error = 'Prosim vnesite poštno št.';
			$valid = false;
		}

		if ($valid) {
			$result = mysqli_query($connection, "SELECT * FROM uporabniki WHERE Email='$email'");
			if (mysqli_num_rows($result) == 0) {
				$sql = "INSERT INTO uporabniki (Ime, Priimek, Geslo, Email, Naslov, Mesto, PostnaStevilka, JeAdmin)
						VALUES ('$ime', '$priimek', '$geslo', '$email', '$naslov', '$mesto', '$posta', 0)";

				if (!mysqli_query($connection, $sql)) {
					die('Error: ' . mysql_error($connection));
				}
				header('Location: login.php');
			} else {
				$email_error = 'Uporabnik s tem emailom že obstaja';
			}
		}		
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registracija - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<div class="register center">
				<h2>Registracija</h2>
				<form action="" method="post">
					<?php if (!empty($name_error)): ?>
						<span><?php echo $name_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="name">Ime:</label>
						<input type="text" name="name" value="<?php echo $ime; ?>" />
					</p>

					<?php if (!empty($surname_error)): ?>
						<span><?php echo $surname_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="surname">Priimek:</label>
						<input type="text" name="surname" value="<?php echo $priimek; ?>" />
					</p>

					<?php if (!empty($email_error)): ?>
						<span><?php echo $email_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="email">Email:</label>
						<input type="text" name="email" value="<?php echo $email; ?>" />
					</p>

					<?php if (!empty($pass_error)): ?>
						<span><?php echo $pass_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="password">Geslo:</label>
						<input type="password" name="password" value="" />
					</p>

					<?php if (!empty($address_error)): ?>
						<span><?php echo $address_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="address">Naslov:</label>
						<input type="text" name="address" value="<?php echo $naslov; ?>" />
					</p>
					
					<?php if (!empty($city_error)): ?>
						<span><?php echo $city_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="city">Mesto:</label>
						<input type="text" name="city" value="<?php echo $mesto; ?>" />
					</p>
					
					<?php if (!empty($zip_error)): ?>
						<span><?php echo $zip_error; ?></span>
					<?php endif; ?>
					<p>						
						<label for="zip">Poštna št.:</label>
						<input type="text" name="zip" value="<?php echo $posta; ?>" />
					</p>
					<button class="big-red" type="submit" name="submit">Registriraj se</button>
				</form>
			</div>
		</div>
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>