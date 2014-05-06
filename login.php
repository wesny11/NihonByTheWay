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
	if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
		header('Location: index.php');
		die();		
	}

	$email = null;
	$geslo = null;

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$geslo = $_POST['password'];

		$valid = true;

		if (empty($email)) {
			$email_error = 'Prosim vnesite email';
			$valid = false;
		}

		if (empty($geslo)) {
			$pass_error = 'Prosim vnesite geslo';
			$valid = false;
		}

		if ($valid) {
			$result = mysqli_query($connection, "SELECT * FROM uporabniki WHERE Email='$email'");
			if (mysqli_num_rows($result) != 0) {
				$vrstica = mysqli_fetch_array($result);
				if ($vrstica['Geslo'] == $geslo) {					
					if ($vrstica['JeAdmin'] == 1) {
						$_SESSION['admin'] = $vrstica['Ime'];					
					} else {
						$_SESSION['user'] = $vrstica['Ime'];
					}

					header('Location: index.php');
					exit;
				} else {
					$pass_error = 'Vnesli ste napačno geslo';
				}
			} else {
				$email_error = 'Uporabnik s tem emailom ne obstaja';
			}
		}
	}	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prijava - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<div class="login center">
				<h2>Prijava</h2>
				<form action="" method="post">
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
					<button class="big-red" type="submit" name="submit">Prijavi se</button>
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