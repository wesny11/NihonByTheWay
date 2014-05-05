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
	$vrsta = null;
	$vrsta_hrane = null;
	$opis = null;
	$cena = null;
	$slika = null;

	if (isset($_POST['submit'])) {
		$ime = $_POST['name'];
		$hranapjaca = $_POST['foodvsdrink'];
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index - 日本ByTheWay</title>
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
				<h2>Dodaj hrano/pijačo</h2>
				<form action="" method="post">
					<p>						
						<label>Ime:</label>
						<input type="text" name="name" value="" />
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
							<option value="juhe">Juhe</option>
							<option value="sushi">Sushi</option>
							<option value="sladice">Sladice</option>
							<option value="ostale-jedi">Ostale jedi</option>
						</select>
					</p>

					<p>
						<label class="fix-align">Opis:</label><br>
						<textarea></textarea>
					</p>

					<p>
						<label>Cena:</label>
						<input type="text" name="price" value="" />
					</p>

					<p>
						<label>Slika:</label>
						<input type="file" name="image" />
					</p>
					<button class="big-red" type="submit" name="submit">Dodaj</button>
				</form>
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