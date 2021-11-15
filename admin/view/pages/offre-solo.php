<div class="englobeOffreSolo">
<?php

$message = '';

// debug($_GET);
// 4- Modification statut :
	if(isset($_GET['action']) && $_GET['action'] == "modifier_actif" && isset($_GET['offres_id']) && isset($_GET['actif']))
	{
			$actif = ($_GET['actif'] == 0) ? 1 : 0;
			
			$resultat = executeRequete("UPDATE offres SET actif = '$actif' WHERE offres_id=:offres_id", array(':offres_id' => $_GET['offres_id']));
	
			if ($resultat->rowCount() == 1) {
				$message .= '<div class="errorSuppr">L\'offre a bien été supprimée.</div>';
			}
		}

echo $message;


$offres = $pdo->query("SELECT * FROM offres");

while ($offreDivers = $offres->fetch(PDO::FETCH_ASSOC)) {
	if($offreDivers['actif'] == 1){
		echo '<div class="offreSolo">';
		echo	'<h3 class="leftInfosTitle">Type :</h3>';
		echo	'<p class="leftInfos">'. $offreDivers['titre'] .'</p>';
		echo	'<h3 class="leftInfosTitle"> Titre :</h3>';
		echo	'<p class="leftInfos">'. $offreDivers['titre'] .'</p>';
		echo	'<h3 class="leftInfosTitle">Description :</h3>';
		echo	'<p class="leftInfos">'. $offreDivers['description'] .'</p>';
		echo	'<h3 class="leftInfosTitle">Prix / Promo :</h3>';
		echo	'<p class="leftInfos">'. $offreDivers['prix_promo'] .'</p>';
		echo	'<h3 class="leftInfosTitle">PDF :</h3>';
		echo	'<p class="leftInfos"><a href="../upload-pdf/'. $offreDivers['pdf'] .'" target="_blank">'. $offreDivers['pdf'] .'</a></p>';
		echo	'<h3 class="leftInfosTitle">Image :</h3>';
		echo	'<img src="../upload-img/'.$offreDivers['image'].'">';
		echo	'<a class="btnSuppr" href="?action=modifier_actif&offres_id=' . $offreDivers['offres_id'] . '&actif='. $offreDivers['actif'] .'">Supprimer</a>';
		echo	'</div>';
		}
	};
?>
</div>
