<?php
	include('inc/init.php');

	// SI le membre connecté il ne voit plus la page connection
	if(!estConnecte()){
		header('location:connexion.php');
		exit;
	}

?>
<!DOCTYPE html>
<html>
	<?php
		include('view/head.php');
	?>

	<body>

		<?php
			include('view/header.php');
		?>

		<main>

			<h2 class="leftTitre">Nos Offres</h2>
			<p class="leftDescr">Voici les différents offres présentes sur votre site.</p>
			<a class="btn" id="ajoutOffre">Ajouter une offre</a>

			<?php
				include('view/pages/modal-offre.php');
				include('view/pages/offre-solo.php');
			?>

			<div class="clear"></div>
			
		</main>

		<?php
			include('view/footer.php');
		?>
		
		<script type="text/javascript" src="script/burger.js"></script>
		<script type="text/javascript" src="script/scriptOffres.js"></script>
		<script type="text/javascript" src="script/modal.js"></script>
	</body>
</html>