<div class="row clearfix">
	<a class="" href="index.php"><h1>日本ByTheWay</h1></a>
	<nav class="left">
		<ul class="inline-list">
			<li><a href="index.php">DOMOV</a></li>
			<li><a href="products-grid.php?izbira=0">HRANA</a>
				<ul>
					<li><a href="products-grid.php?izbira=0">VSE</a></li>
					<li><a href="products-grid.php?izbira=1">JUHE</a></li>
					<li><a href="products-grid.php?izbira=2">SUSHI</a></li>
					<li><a href="products-grid.php?izbira=3">SLADICE</a></li>
					<li><a href="products-grid.php?izbira=4">OSTALE JEDI</a></li>
				</ul>
			</li>
			<li><a href="products-grid.php?izbira=5">PIJAČA</a></li>
			<li><a href="products-grid.php?izbira=6">O NAS</a></li>
			<?php 
				if (isset($_COOKIE["uporabnik"])) {
					$user = $_COOKIE["uporabnik"];
					echo '<li><a href="#">'.$user.'</a></li>';
				}
			?>	
		</ul>
	</nav>
	<nav class="right">
		<ul class="inline-list">
			<li class="user"><a href="#">
				<span>User</span></a>
				<ul><?php
					//Če je uporabnik prijavljen, se lahko le odjavi
					$user = "";
					if(isset($_COOKIE["uporabnik"])){
						echo '<li><a href="logout.php">ODJAVA</a></li>';
					} else {
					//Če je uporabnik gost, se lahko prijavi ali registrira
						echo '<li><a href="login.php">PRIJAVA</a></li>';
						echo '<li><a href="register.php">REGISTRACIJA</a></li>';
					}
				?></ul>
			</li>
			<li class="shopping-cart"><a href="#"><span>Shopping cart</span></a></li>
		</ul>
	</nav>			
</div>