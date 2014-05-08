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
	if (isset($_GET['a']) && isset($_GET['pid']) && isset($_GET['pcat']) && isset($_GET['qt'])) {
		$action = $_GET['a'];
		$id = $_GET['pid'];
		$category = $_GET['pcat'];
		$quantity = $_GET['qt'];

		if (!isset($_SESSION['cart'.$id])) {
			$_SESSION['cart'.$id] = $id." ".$category." ".$quantity;
		} else {
			if ($action == '0') {
				$_SESSION['cart'.$id] = $id." ".$category." ".(explode(" ", $_SESSION['cart'])[2] + $quantity);
			} else if ($action == '1') {
				$_SESSION['cart'.$id] = $id." ".$category." ".(explode(" ", $_SESSION['cart'])[2] - $quantity);
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Košarica - 日本ByTheWay</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<header class="main-header">
		<?php include('main-header.php'); ?>
	</header>

	<div class="main-content">
		<div class="row">
			<table>
				<tr>
					<th>Ime</th>
					<th>Količina</th>
					<th>Cena</th>
					<th>Akcija</th>
				</tr>
				<?php
					foreach ($_SESSION as $key => $value) {
						if (substr($key, 0, 4) == 'cart') {
							$cart_data = explode(" ", $key);
							$id = $cart_data[0];
							$category = $cart_data[1];
							$quantity = $cart_data[2];

							if ($category == 'h') {
								$result = mysqli_query($connection, 'SELECT * FROM hrana WHERE HranaID='.$id);
							} else {
								$result = mysqli_query($connection, 'SELECT * FROM pijaca WHERE PijacaID='.$id);
							}

							while ($vrstica = mysqli_fetch_array($result)) {
								echo '<tr>';
								echo '<td>'.$vrstica['Ime'].'</td>';
								echo '<td>'.$quantity.'</td>';
								echo '<td>'.$vrstica['Cena']*$quantity.'€</td>';
								echo '<td><a href="basket.php?a=1&pid='.$id.'&pcat='.$category.'&qt=1">[-]</a>&nbsp;<a href="basket.php?a=0&pid='.$id.'&pcat='.$category.'&qt=1">[+]</a></td>';
								echo '</tr>';
							}
						}
					}
				?>		
			</table>
		</div>		
	</div>

	<footer class="main-footer">
		<?php include('main-footer.php'); ?>
	</footer>
</body>
</html>
<?php mysqli_close($connection); ?>