<?php

// Contrôle données formulaire et on les insère en BDD

$message = '';
$extention = '';
$extentionImg = '';
$pdf = '';
$image = '';

// tableau de données
$tabExt = array('jpg', 'png', 'gif', 'jpeg', 'pdf'); 

// debug($_FILES);

if(!empty($_POST)) {
	// debug($_FILES);	
	
	if (!isset($_POST['titre']) || strlen($_POST['titre']) < 1 || strlen($_POST['titre']) > 25) {
		$message .= '<div class="offreActuError">Le titre doit comporter entre 1 et 25 caractères.</div>';
	}
	if (!isset($_POST['soustitre']) || strlen($_POST['soustitre']) < 1 || strlen($_POST['soustitre']) > 20) {
		$message .= '<div class="offreActuError">Le soustitre doit comporter entre 1 et 20 caractères.</div>';
	}
	if (!isset($_POST['prix_promo']) || strlen($_POST['prix_promo']) <1 || strlen($_POST['prix_promo']) > 15) {
		$message .= '<div class="offreActuError">Le prix doit comporter entre 1 et 10 caractères.</div>';
	}
	if (!isset($_FILES['pdf']) || $_FILES['pdf']['size'] > 5500000) {
		$message .= '<div class="offreActuError">Le poids du pdf est trop volumineuse.</div>';
	}
	if (!isset($_FILES['image']) || $_FILES['image']['size'] > 5500000) {
		$message .= '<div class="offreActuError">Le poids de l\'image est trop volumineuse.</div>';
	}
	

        if(empty($message)) { // si $message est vide c'est qu'il n'y a pas d'erreur

					// pdf à insérer en BDD :
						// debug($_FILES);
						if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name'])) {

							// pathinfo permet de récupérer l'extension d'un fichier
							$extention = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
							$extentionImg = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

							if(in_array(strtolower($extention), $tabExt)) {
							
								$pdf = uniqid() . '.' . $extention;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['pdf']['tmp_name'], '../upload-pdf/' . basename($pdf));

								}
							
								// image à insérer en BDD :
							if(in_array(strtolower($extentionImg), $tabExt)) {
										
								$image = uniqid() . '.' . $extentionImg; 
		
								move_uploaded_file($_FILES['image']['tmp_name'], '../upload-img/' . basename($image));  
							}

							// On échappe les données de $_POST avant l'insertion :
							foreach ($_POST as $indice => $valeur) {
								$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
							}


							// Insertion en BDD :
							$resultat = $pdo->prepare("INSERT INTO offre_actu (titre, soustitre, prix_promo, pdf, image) VALUES (:titre, :soustitre, :prix_promo, :pdf, :image)");

							$succes = $resultat->execute(array(
								':titre' => $_POST['titre'],
								':soustitre' => $_POST['soustitre'],
								':prix_promo' => $_POST['prix_promo'],
								':pdf' => $pdf,
								':image' => $image
							));

							//5- on affiche un message de réussite ou d'échec :
							if ($succes) { //execute() retourne true si la requête a marché, sinon false. Si $succes contient true, alors on affiche le message de réussite.
								$message .= '<div  class="offreActu">L\'offre a bien été ajouté.</div>';
							}else { // $succes contient false : la requête n'a pas marché.
								$message .= '<div  class="offreActuError">Une erreur est survenue...</div>';
							}
							} //if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name']))
        } //if(empty($message))
 } // fin de if(!empty($_POST))
			
	?>			
			
			<section id="right">
				<?php
				echo $message;
				?>
				<div class="modif">
					<h2 class="rightTitre">Mettre à jour l’offre du moment</h2>
					<p class="rightDescr">Veuillez modifier les champs ci-dessous et cliquer sur «VALIDER»<br>pour mettre à jour l’offre du moment.</p>
					<form action="" method="post" enctype="multipart/form-data">
						<label for="titre">Titre (max. 25 caractères) :</label>
						<input type="text" maxlength="25" id="titre" name="titre">
						<label for="soustitre">Sous-titre (max. 20 caractères) :</label>
						<input type="text" maxlength="20" id="sousTitre" name="soustitre">
						<label for="prix">Prix / Promotion (max. 15 caractères) :</label>
						<input type="text" maxlength="10" id="prix" name="prix_promo">
						<label for="pdf">PDF de l’offre :</label>
						<input type="file" id="pdf" name="pdf">
						<label for="image">Grande image :</label>
						<input type="file" id="image" value="defaut2" name="image">
						<input type="submit" value="Valider l'offre" id="ValiderOffre" disabled>
					</form>
				</div>
			</section>
