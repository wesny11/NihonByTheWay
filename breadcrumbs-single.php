<div class="row clearfix">
	<ul class="inline-list">
		<li class="home"><a href="#">DOMOV</a></li>			
		<li class="triangle"></li>
		<?php 	
			if ($zivilo == 'hrana') {
				$ime = mysql_query("SELECT Ime, VrstaHrane FROM hrana WHERE HranaID='$posamezna'", $connection);
			}
			if ($zivilo == 'pijaca') {
				$ime = mysql_query("SELECT Ime FROM pijaca WHERE PijacaID='$posamezna'", $connection);
			}
			if (!$ime) {
				die("Imena ni našlo!" . mysql_error());
			}
			//naredila sem s switchom, ker je manj primerjamo, manj kode, saj je prvih pet izbir hrana, nato sem samo še dodala vrsto hrane, ki sem jo dobila iz zgornjega query-ja
			switch($izbiraHeader){
				case 0:
				case 1:
				case 2:
				case 3:
				case 4:
					while($vrstica = mysql_fetch_array($ime)){
					echo '<li><a href="products-grid.php?izbira=0">HRANA</a></li>
						  <li class="triangle"></li>
						  <li><a href="products-grid.php?izbira=0">'.strtoupper($vrstica['VrstaHrane']).'</a></li>
					      <li class="triangle"></li>
				          <li><a href="#">'.strtoupper($vrstica['Ime']).'</a></li>'; 	
					}
					break;
				case 5:
					echo '<li><a href="products-grid.php?izbira=5">PIJAČA</a></li>
						  <li class="triangle"></li>'; 
					while($vrstica = mysql_fetch_array($ime)){
						echo '<li><a href="#">'.strtoupper($vrstica[0]).'</a></li>'; 
					}
					break;
				case 6:
					echo '<li><a href="products-grid.php?izbira=6">O NAS</a></li>'; 
					break;
			}					
		?>				
	</ul>
</div>