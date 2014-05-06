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
	$ime = null;
	$vrsta = null;
	$vrsta_hrane = null;
	$opis = null;
	$cena = null;
	$slika = null;
	$success = false;

	function image_upload($name, $size, $tmp) {
		$errors = array();
		$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');

		$file_name = $name;

		$file_ext = end( explode('.', $file_name) );

		$file_size = $size; 
		$file_tmp = $tmp;

		if ( ! in_array($file_ext, $allowed_ext) ) {
			$errors[] = 'Nedovoljena končnica';

		}

		if ( $file_size > 5242880 ) {
			$errors[] = 'Velikost datoteke mora biti pod 5MB';

		}

		if ( empty($errors) ) {
			move_uploaded_file($file_tmp, 'images/' . $file_name);
		}

		return $errors;
	}

	if (isset($_POST['submit'])) {
		$ime = $_POST['name'];
		$vrsta = $_POST['foodvsdrink'];
		$vrsta_hrane = $_POST['category'];
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

		if (empty($slika)) {
			$image_error = 'Prosim naložite sliko';
			$valid = false;
		} else if (image_upload($_FILES['image']['name'], $_FILES['image']['size'], $_FILES['image']['tmp_name'])) {
			$image_error = 'Napaka pri nalaganju slike';
			$valid = false;
		}

		if ($valid) {			
			if ($vrsta == "hrana") {
				$success = mysqli_query($connection, "INSERT INTO hrana (Ime, VrstaHrane, Opis, Cena, Slika) VALUES ('$ime', '$vrsta_hrane', '$opis', '$cena', 'images/$slika')");
			} else {
				$success = mysqli_query($connection, "INSERT INTO pijaca (Ime, VrstaPijace, Opis, Cena, Slika) VALUES ('$ime', 'alkoholna', '$opis', '$cena', 'images/$slika')");
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dodajanje - 日本ByTheWay</title>
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
			<div class="add-product center">
				<?php if ($success): ?>
					<h3 class="green">Izdelek je bil uspešno dodan</h3>
				<?php else: ?>
					<h2>Dodaj hrano/pijačo</h2>
					<form action="" method="post" enctype="multipart/form-data">
						<?php if (!empty($name_error)): ?>
							<span><?php echo $name_error; ?></span>
						<?php endif; ?>
						<p>
							<label>Ime:</label>
							<input type="text" name="name" value="<?php echo $ime; ?>" />
						</p>

						<p>
							<label>Vrsta:</label>
							<select name="foodvsdrink" class="isfood">
								<option value="hrana">Hrana</option>
								<option value="pijaca">Pijača</option>
							</select>
						</p>

						<p class="isvisible">
							<label>Vrsta hrane:</label>
							<select name="category">
								<option value="Juhe">Juhe</option>
								<option value="Sushi">Sushi</option>
								<option value="Sladice">Sladice</option>
								<option value="Ostalo">Ostale jedi</option>
							</select>
						</p>
						
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
						<button class="big-red" type="submit" name="submit">Dodaj</button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>

	<script>
		$('.isfood').change(function() {
			if ($(this).val() == "pijaca") {
				$('.isvisible').css('display', 'none');
			} else {
				$('.isvisible').css('display', 'block');
			}
		})
	</script>
</body>
</html>
<?php mysqli_close($connection); ?>