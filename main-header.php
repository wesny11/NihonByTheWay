<div class="row clearfix">
	<a href="index.php"><h1 class="logo">日本ByTheWay</h1></a>
	<nav class="main-nav left">
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
			<li><a href="about-us.php">O NAS</a></li>
		</ul>
	</nav>
	<nav class="user-nav right">
		<ul class="inline-list">			
			<?php
				$username = null;
				if (isset($_SESSION['user'])) {
					$username = $_SESSION['user'];					
					echo '<li class="welcome"><p>Konnichiwa <span class="red">' . $username . '</span></p></li>';
				} else if (isset($_SESSION['admin'])) {
					$username = $_SESSION['admin'];
					echo '<li class="welcome"><p>Welcome <span class="red">administrator</span></p></li>';
				}
			?>
			<li class="user"><a href=""><span>User</span></a>
				<ul>
					<?php
						if(!$username) {
							echo'<li><a href="login.php">PRIJAVA</a></li>';
							echo'<li><a href="register.php">REGISTRACIJA</a></li>';
						} else {
							echo'<li><a href="logout.php">ODJAVA</a></li>';
						}
					?>
				</ul>
			</li>
			<li class="shopping-cart"><a href="basket.php"><span>Shopping cart</span></a></li>
		</ul>
	</nav>
</div>