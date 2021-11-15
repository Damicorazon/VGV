			<nav>
			<?php

			if(estConnecte()) {
			echo '<a href="offre-actu.php">L\'offre du moment</a>';
			echo '<a href="offres.php">Nos offres</a>';
			echo '<a href="membres-newsletter.php">Membres newsletter</a>';
			echo '<a href="newsletter.php">Demander ma newsletter mensuelle</a>';
			echo '<a href="?logout=deconnexion" id="logout"><i class="fas fa-power-off"></i></a>';
			}
				?>
			</nav>