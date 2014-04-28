<div class="row clearfix">
	<ul class="inline-list">
		<li class="home"><a href="#">DOMOV</a></li>			
		<li class="triangle"></li>
		<?php 		
			if($izbiraHeader == 0){
				echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
					  <li class="triangle"></li>
					  <li><a href="products-grid.php?izbira=0">VSE</a></li>';
			}
			if($izbiraHeader == 1){
				echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
					  <li class="triangle"></li>
					  <li><a href="products-grid.php?izbira=1">JUHE</a></li>';
			}
			if($izbiraHeader == 2){
				echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
					  <li class="triangle"></li>
					  <li><a href="products-grid.php?izbira=2">SUSHI</a></li>';
			}
			if($izbiraHeader == 3){
				echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
					  <li class="triangle"></li>
					  <li><a href="products-grid.php?izbira=3">SLADICE</a></li>';
			}
			if($izbiraHeader == 4){
				echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
					  <li class="triangle"></li>
					  <li><a href="products-grid.php?izbira=4">OSTALO</a></li>';
			}
			if($izbiraHeader == 5){
				echo '<li><a href="products-grid.php?izbira=5">PIJAČA</a></li>';
			}
			if($izbiraHeader == 6){
				echo '<li><a href="products-grid.php?izbira=6">O NAS</a></li>';
			}
		?>		
	</ul>
</div>	