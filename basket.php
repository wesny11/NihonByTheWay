<?php include('mysql-connection.php'); ?>

<?php 
	$seznamZivil=array();
	$product_result = null;
						
	if(isset($_GET['pid'])){
		$pid=$_GET['pid'];
	}
	if(isset($_GET['pcat'])){
		$pcat=$_GET['pcat'];
	}
	if(isset($_GET['qt'])){
		$qt=$_GET['qt'];
	}
	$skupnaCenaZivila=0;
					
	if(isset($pid) && isset($pcat) && isset($qt)){
		if($pcat == 'h'){
			$product_result = mysqli_query($connection, "SELECT * FROM hrana WHERE HranaID='$pid'");
			$izbira=0;
		} else if($pcat == 'p'){
			$product_result = mysqli_query($connection, "SELECT * FROM pijaca WHERE PijacaID='$pid'");
			$izbira=5;
		}
						
		if (mysqli_num_rows($product_result) != 0) {
			while($data = mysqli_fetch_array($product_result)){
				$ime=$data['Ime'];
				$cena=$data['Cena'];
			}
			$skupnaCenaZivila += $cena*$qt;
			array_push($seznamZivil, array($ime, $qt, $cena));
			}
			//header("location: product.php?izbira='$izbira'&posamezna='$pid'");
			header("location: index.php");
		}				
?>

