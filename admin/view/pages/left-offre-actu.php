<?php

$resultat = $pdo->query("SELECT * FROM offre_actu ORDER BY `offre_actu_id` DESC LIMIT 1");

while ($offres = $resultat->fetch(PDO::FETCH_ASSOC)) {
?>


			<section id="left">
				<h2 class="leftTitre">L'offre du moment</h2>
				<p class="leftDescr">Apparait en gros sur la page d’accueil de votre site.</p>
				<h3 class="leftInfosTitle">Titre :</h3>
				<p class="leftInfos"><?php echo $offres['titre']; ?></p>
				<h3 class="leftInfosTitle">Sous-Titre :</h3>
				<p class="leftInfos"><?php echo $offres['soustitre']; ?></p>
				<h3 class="leftInfosTitle">Prix / Promotion :</h3>
				<p class="leftInfos"><?php echo $offres['prix_promo']; ?></p>
				<h3 class="leftInfosTitle">PDF :</h3>
				<p class="leftInfos"><a href="../upload-img/<?php echo $offres['image']; ?>" target="_blank"><?php echo $offres['pdf']; ?></a></p>
				<h3 class="leftInfosTitle">Grande Image :</h3>
				<img src="../upload-img/<?php echo $offres['image']; ?>">
			</section>

			<?php
		}
		?>