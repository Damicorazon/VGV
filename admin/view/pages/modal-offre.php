<?php

// Contrôle données formulaire et on les insère en BDD

$message = '';
$extention = '';
$extentionImg = '';
$pdf = '';
$image = '';

// tableau de données
$tabExt = array('jpg', 'png', 'gif', 'jpeg', 'pdf'); 

// debug($_POST);
// debug($_FILES);

if(!empty($_POST)) {

		if(!isset($_POST['type']) || ($_POST['type'] != 'lm' && $_POST['type'] != 'lc' && $_POST['type'] != 'mc' && $_POST['type'] != 'cc' && $_POST['type'] != 'd') ) {
			$message .= '<div class="offreActu">Le type est invalide.</div>';
		}
    if (!isset($_POST['titre']) || strlen($_POST['titre']) < 1 || strlen($_POST['titre']) > 25) {
      $message .= '<div class="offreActu">Le titre doit comporter entre 1 et 25 caractères.</div>';
    }
    if (!isset($_POST['description']) || strlen($_POST['description']) < 1 || strlen($_POST['description']) > 20) {
      $message .= '<div class="offreActu">La description doit comporter entre 1 et 20 caractères.</div>';
    }
    if (!isset($_POST['prix_promo']) || strlen($_POST['prix_promo']) <1 || strlen($_POST['prix_promo']) > 15) {
      $message .= '<div class="offreActu">Le prix doit comporter entre 1 et 10 caractères.</div>';
    }
		if (!isset($_FILES['pdf']) || $_FILES['pdf']['size'] > 5500000) {
			$message .= '<div class="offreActuError">Le poids de le pdf est trop volumineuse.</div>';
		}
		if (!isset($_FILES['image']) || $_FILES['image']['size'] > 5500000) {
			$message .= '<div class="offreActuError">Le poids de l\'image est trop volumineuse.</div>';
		}

        if(empty($message)) { // si $message est vide c'est qu'il n'y a pas d'erreur

					// pdf à insérer en BDD :
						// debug($_FILES);
						if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name'])) {

							$extention = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
							$extentionImg = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

							if(in_array(strtolower($extention), $tabExt)) {
							
								$pdf = uniqid() . '.' . $extention;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['pdf']['tmp_name'], '../upload-pdf/' . basename($pdf));
							}
          
							if(in_array(strtolower($extentionImg), $tabExt)) {

							// image à insérer en BDD :											
									$image = uniqid() . '.' . $extention; 
		
									move_uploaded_file($_FILES['image']['tmp_name'], '../upload-img/' . basename($image));  
							}

							// On échappe les données de $_POST avant l'insertion :
							foreach ($_POST as $indice => $valeur) {
								$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
							}


							// Insertion en BDD :
							$resultat = $pdo->prepare("INSERT INTO offres (type, titre, description, prix_promo, pdf, image, actif) VALUES (:type, :titre, :description, :prix_promo, :pdf, :image, :actif)");

							$succes = $resultat->execute(array(
								':type' => $_POST['type'],
								':titre' => $_POST['titre'],
								':description' => $_POST['description'],
								':prix_promo' => $_POST['prix_promo'],
								':pdf' => $pdf,
								':image' => $image,
								':actif' => 1
							));

							//5- on affiche un message de réussite ou d'échec :
							if ($succes) { //execute() retourne true si la requête a marché, sinon false. Si $succes contient true, alors on affiche le message de réussite.
								$message .= '<div  class="offreActu">L\'offre a bien été ajouté.</div>';
							}else { // $succes contient false : la requête n'a pas marché.
								$message .= '<div  class="offreActu">Une erreur est survenue...</div>';
							}
						} //if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name']))
        } //if(empty($message))
 } // fin de if(!empty($_POST))
			
	?>
	
	
	<div class="modif modal">
		<h2 class="rightTitre">Ajouter une offre</h2>
		<p class="rightDescr">Veuillez remplir les champs ci-dessous et cliquer sur «Ajouter» pour ajouter une offre.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="titre">Type :</label>
			<select name="type">
				<option value="lc">Long Courrier</option>
				<option value="mc">Moyen Courrier</option>
				<option value="cc">Circuit/Croisière</option>
				<option value="d">Divers</option>
				<option value="lm">Dernière Minute</option>
			</select>
			<label for="titre">Titre (max. 25 caractères) :</label>
			<input type="text" maxlength="25" id="titre" name="titre">
			<label for="soustitre">Description (max. 20 caractères) :</label>
			<input type="text" maxlength="20" id="description" name="description">
			<label for="prix">Prix / Promotion (max. 15 caractères) :</label>
			<input type="text" maxlength="10" id="prix" name="prix_promo">
			<label for="pdf">PDF de l’offre :</label>
			<input type="file" id="pdf" name="pdf">
			<label for="image">Image :</label>
			<input type="file" id="image" name="image">
			<input type="submit" value="Ajouter l'offre" id="validerOffre" disabled>
	</div>

	<div class="filtreModal"></div>