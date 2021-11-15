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
			<div class="flex">
			<?php
				include('view/pages/left-newsletter.php');

				include('view/pages/right-newsletter.php');
			?>
			</div>
		</main>

		<?php
			include('view/footer.php');
		?>

<script type="text/javascript" src="script/burger.js"></script>
<script type="text/javascript" src="script/scriptNewsletter.js"></script>

	</body>
</html>