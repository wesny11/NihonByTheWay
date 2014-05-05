<?php
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>
<?php
	session_start();
	include('mysql-connection.php');
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
						<select class="isFood">
							<option value="hrana">Hrana</option>
							<option value="pijaca">Pijača</option>
						</select>
					</p>

					<p class="isVisible">
						<label>Vrsta hrane:</label>
						<select>
							<option value="juhe">Juhe</option>
							<option value="sushi">Sushi</option>
							<option value="sladice">Sladice</option>
							<option value="ostale-jedi">Ostale jedi</option>
						</select>
					</p>

					<p>
						<label>Opis:</label><br>
						<textarea></textarea>
					</p>

					<p>
						<label>Cena:</label>
						<input type="text" name="price" value="" />
					</p>

					<p>
						<label>Slika:</label>
					</p>
				</form>
			</div>
		</div>
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>

	<script>
		$('.isFood').change(function() {
			if ($(this).val() == "pijaca") {
				$('.isVisible').css('display', 'none');
			} else {
				$('.isVisible').css('display', 'block');
			}
		})
	</script>
</body>
</html>
<?php mysqli_close($connection); ?>