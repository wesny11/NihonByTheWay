<?php
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(E_ALL ^ E_STRICT);
?>
<?php
	session_start();
	include('mysql-connection.php');
?>
<?php
	$result = null;
	$success = false;

	function image_upload($name, $size, $tmp) {
		$errors = array();
		$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');

		$file_name = $name;

		$file_ext = end( explode('.', $file_name) );

		$file_size = $size; 
		$file_tmp = $tmp;

		if ( ! in_array($file_ext, $allowed_ext) ) {
			$errors[] = 'Nedovoljena kratica';

		}

		if ( $file_size > 5242880 ) {
			$errors[] = 'Velikost datoteke mora biti pod 5MB';

		}

		if ( empty($errors) ) {
			move_uploaded_file($file_tmp, 'images/' . $file_name);
		}

		return $errors;
	}

	// Prvo nalaganje strani
	if (!isset($_POST['submit'])) {
		if (isset($_GET['hranaid'])) {
			$result = mysqli_query($connection, 'SELECT * FROM hrana WHERE HranaId='.$_GET['hranaid']);
		} else if (isset($_GET['pijacaid'])) {
			$result = mysqli_query($connection, 'SELECT * FROM pijaca WHERE PijacaId='.$_GET['pijacaid']);
		}

		if ($result) {
			$product = mysqli_fetch_array($result);
			$ime = $product['Ime'];
			$vrsta = !empty($product['VrstaHrane'])?$product['VrstaHrane']:null;
			$opis = $product['Opis'];
			$cena = $product['Cena'];		
		} else {
			die();
		}
	} else {
		// Kliknen gumb shrani
		$ime = $_POST['name'];
		$vrsta = $_POST['category'];
		$opis = $_POST['description'];
		$cena = $_POST['price'];
		$slika = $_FILES['image']['name'];
		$valid = true;

		if (empty($ime)) {
			$name_error = 'Prosim vnesite ime';
			$valid = false;
		}

		if (empty($opis)) {
			$description_error = 'Prosim vnesite opis';
			$valid = false;
		}

		if (empty($cena)) {
			$price_error = 'Prosim vnesite ceno';
			$valid = false;
		}

		if (!empty($slika) && image_upload($_FILES['image']['name'], $_FILES['image']['size'], $_FILES['image']['tmp_name'])) {
			$image_error = 'Napaka pri nalaganju slike';
			$valid = false;
		}

		if ($valid) {			
			if (isset($_GET['hranaid'])) {
				$success = mysqli_query($connection, "UPDATE hrana SET Ime='$ime', VrstaHrane='$vrsta', Opis='$opis', Cena='$cena'".(!empty($slika)?", Slika='images/$slika'":"")." WHERE HranaId=".$_GET['hranaid']);
			} else {
				$success = mysqli_query($connection, "UPDATE pijaca SET Ime='$ime', VrstaHrane='$vrsta', Opis='$opis', Cena='$cena'".(!empty($slika)?", Slika='images/$slika'":"")." WHERE PijacaId=".$_GET['pijacaid']);
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Urejanje - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">

	<script src="scripts/jquery-1.11.1.min.js"></script>
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<div class="edit-product center">
				<?php if ($success): ?>
					<h3 class="green">Izdelek je bil uspešno posodobljen</h3>
				<?php else: ?>
					<h2>Uredi hrano/pijačo</h2>
					<form action="" method="post" enctype="multipart/form-data">
						<?php if (!empty($name_error)): ?>
							<span><?php echo $name_error; ?></span>
						<?php endif; ?>
						<p>
							<label>Ime:</label>
							<input type="text" name="name" value="<?php echo $ime; ?>" />
						</p>
						
						<?php if (isset($_GET['hranaid'])): ?>
							<p>
								<label>Vrsta hrane:</label>
								<select name="category">
									<option value="Juhe" <?php if ($vrsta=="Juhe") echo "selected" ?>>Juhe</option>
									<option value="Sushi" <?php if ($vrsta=="Sushi") echo "selected" ?>>Sushi</option>
									<option value="Sladice" <?php if ($vrsta=="Sladice") echo "selected" ?>>Sladice</option>
									<option value="Ostalo" <?php if ($vrsta=="Ostalo") echo "selected" ?>>Ostale jedi</option>
								</select>
							</p>
						<?php endif; ?>
						
						<?php if (!empty($description_error)): ?>
							<span><?php echo $description_error; ?></span>
						<?php endif; ?>
						<p>
							<label class="fix-align">Opis:</label><br>
							<textarea name="description" rows="10"><?php echo $opis; ?></textarea>
						</p>

						<?php if (!empty($price_error)): ?>
							<span><?php echo $price_error; ?></span>
						<?php endif; ?>
						<p>
							<label>Cena:</label>
							<input type="text" name="price" value="<?php echo $cena; ?>" />
						</p>

						<?php if (!empty($image_error)): ?>
							<span><?php echo $image_error; ?></span>
						<?php endif; ?>
						<p>
							<label>Slika:</label>
							<input type="file" name="image" />
						</p>
						<button class="big-red" type="submit" name="submit">Shrani</button>
					</form>
				<?php endif; ?>
			</div>
		</div>		
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>