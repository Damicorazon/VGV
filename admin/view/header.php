		<?php
			include('inc/init.php');

		// debug($_SESSION);


			// 2- Déconnexion du membre
			
			if (isset($_GET['logout']) && $_GET['logout'] == 'deconnexion') {
				session_destroy();
				header('location:connexion.php');
			}

		?>
		
		
		<header>
			<img src="img/logo.png">
			<img src="img/burger.png" alt="Menu" id="burger" class="mobile">
			<?php
				include('view/nav.php');
			?>
			<div class="clear"></div>
		</header>