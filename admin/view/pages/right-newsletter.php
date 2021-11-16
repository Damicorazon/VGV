<?php

// Contrôle données formulaire et on les insère en BDD

$message = '';
$extention = '';
$extentionImg = '';
$pdf = '';
$image = '';
$image1 = '';
$image2 = '';

// tableau de données
$tabExt = array('jpg', 'png', 'gif', 'jpeg', 'pdf'); 

if (isset($_POST['demandeNewsletter'])){

	if(!empty($_POST)) {

			if (!isset($_POST['prix']) || strlen($_POST['prix']) < 1) {
				$message .= '<div class="offreActu">Le prix doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titre']) || strlen($_POST['titre']) < 1) {
				$message .= '<div class="offreActu">Le titre doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image']) || $_FILES['image']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image est trop volumineuse.</div>';
			}
			if (!isset($_FILES['image1']) || $_FILES['image1']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image offre 1 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre1']) || strlen($_POST['destinationOffre1']) < 1) {
				$message .= '<div class="offreActu">La destination Offre 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre1']) || strlen($_POST['titreOffre1']) < 1) {
				$message .= '<div class="offreActu">Le titre Offre 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo1']) || strlen($_POST['prixPromo1']) < 1) {
				$message .= '<div class="offreActu">Le prix promo 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image2']) || $_FILES['image2']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image offre 2 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre2']) || strlen($_POST['destinationOffre2']) < 1) {
				$message .= '<div class="offreActu">La destination Offre 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre2']) || strlen($_POST['titreOffre2']) < 1) {
				$message .= '<div class="offreActu">Le titre Offre 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo2']) || strlen($_POST['prixPromo2']) < 1) {
				$message .= '<div class="offreActu">Le prix promo 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image3']) || $_FILES['image3']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image offre 3 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre3']) || strlen($_POST['destinationOffre3']) < 1) {
				$message .= '<div class="offreActu">La destination Offre 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre3']) || strlen($_POST['titreOffre3']) < 1) {
				$message .= '<div class="offreActu">Le titre Offre 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo3']) || strlen($_POST['prixPromo3']) < 1) {
				$message .= '<div class="offreActu">Le prix promo 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image4']) || $_FILES['image4']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image NOUVEAUTES offre 1 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre4']) || strlen($_POST['destinationOffre4']) < 1) {
				$message .= '<div class="offreActu">La destination NOUVEAUTES Offre 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre4']) || strlen($_POST['titreOffre4']) < 1) {
				$message .= '<div class="offreActu">Le titre NOUVEAUTES Offre 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo4']) || strlen($_POST['prixPromo4']) < 1) {
				$message .= '<div class="offreActu">Le prix/promo NOUVEAUTES offre 1 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image5']) || $_FILES['image5']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image NOUVEAUTES offre 2 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre5']) || strlen($_POST['destinationOffre5']) < 1) {
				$message .= '<div class="offreActu">La destination NOUVEAUTES Offre 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre5']) || strlen($_POST['titreOffre5']) < 1) {
				$message .= '<div class="offreActu">Le titre NOUVEAUTES Offre 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo5']) || strlen($_POST['prixPromo5']) < 1) {
				$message .= '<div class="offreActu">Le prix/promo NOUVEAUTES offre 2 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image6']) || $_FILES['image6']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image NOUVEAUTES offre 3 est trop volumineuse.</div>';
			}
			if (!isset($_POST['destinationOffre6']) || strlen($_POST['destinationOffre6']) < 1) {
				$message .= '<div class="offreActu">La destination NOUVEAUTES Offre 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['titreOffre6']) || strlen($_POST['titreOffre6']) < 1) {
				$message .= '<div class="offreActu">Le titre NOUVEAUTES Offre 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_POST['prixPromo6']) || strlen($_POST['prixPromo6']) < 1) {
				$message .= '<div class="offreActu">Le prix/promo NOUVEAUTES offre 3 doit comporter au moins 1 caractère</div>';
			}
			if (!isset($_FILES['image7']) || $_FILES['image7']['size'] > 5500000) {
				$message .= '<div class="offreActuError">Le poids de l\'image BILLET DE L\'AGENCE est trop volumineuse.</div>';
			}

					if(empty($message)) { // si $message est vide c'est qu'il n'y a pas d'erreur
// debug($_FILES);
						if (!empty($_FILES['image']['name']) && !empty($_FILES['image1']['name']) && !empty($_FILES['image2']['name']) && !empty($_FILES['image3']['name']) && !empty($_FILES['image4']['name']) && !empty($_FILES['image5']['name']) && !empty($_FILES['image6']['name']) && !empty($_FILES['image7']['name'])) {

							$extention = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
							$extention1 = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
							$extention2 = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
							$extention3 = pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
							$extention4 = pathinfo($_FILES['image4']['name'], PATHINFO_EXTENSION);
							$extention5 = pathinfo($_FILES['image5']['name'], PATHINFO_EXTENSION);
							$extention6 = pathinfo($_FILES['image6']['name'], PATHINFO_EXTENSION);
							$extention7 = pathinfo($_FILES['image7']['name'], PATHINFO_EXTENSION);


							if(in_array(strtolower($extention), $tabExt)) {
								
								$image = uniqid() . '.' . $extention;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image']['tmp_name'], '../nl-img/' . basename($image));
																
								$image1 = uniqid() . '.' . $extention1;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image1']['tmp_name'], '../nl-img/' . basename($image1));
							
								
								$image2 = uniqid() . '.' . $extention2;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image2']['tmp_name'], '../nl-img/' . basename($image2));
								
								$image3 = '';
									
								$image3 = uniqid() . '.' . $extention3;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image3']['tmp_name'], '../nl-img/' . basename($image3));
								
								$image4 = '';
									
								$image4 = uniqid() . '.' . $extention4;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image4']['tmp_name'], '../nl-img/' . basename($image4));
								
								$image5 = '';
									
								$image5 = uniqid() . '.' . $extention5;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image5']['tmp_name'], '../nl-img/' . basename($image5));
								
								$image6 = '';
									
								$image6 = uniqid() . '.' . $extention6;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image6']['tmp_name'], '../nl-img/' . basename($image6));
								
								$image7 = '';
									
								$image7 = uniqid() . '.' . $extention7;

								// On peut valider le fichier et le stocker définitivement
								move_uploaded_file($_FILES['image7']['tmp_name'], '../nl-img/' . basename($image7));

							}	//if(in_array(strtolower($extention), $tabExt)) {
						}	//if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name'])) {
					} //if(empty($message))
				} // fin de if(!empty($_POST))
			} // if (isset($_POST['demandeNewsletter']))
			
	?>

<?php
// debug($_POST);
// debug($_FILES);
echo $message;
?>

<section id="rightNewsletter">
				<div class="modif">
					<h2 class="rightTitre">Demander ma newsletter mensuelle</h2>
					<p class="rightDescr">Veuillez modifier les champs ci-dessous et cliquer sur «VALIDER»<br>pour demander votre newsletter mensuelle.</p>
					<h2 class="rightTitre">Offre du moment</h2>

<?php

if(isset($_POST['demandeNewsletter'])) {
    $prix = $_POST['prix'];
    $titre = $_POST['titre'];
    $destinationOffre1 = $_POST['destinationOffre1'];
    $titreOffre1 = $_POST['titreOffre1'];
    $prixPromo1 = $_POST['prixPromo1'];
    $destinationOffre2 = $_POST['destinationOffre2'];
    $titreOffre2 = $_POST['titreOffre2'];
    $prixPromo2 = $_POST['prixPromo2'];
    $destinationOffre3 = $_POST['destinationOffre3'];
    $titreOffre3 = $_POST['titreOffre3'];
    $prixPromo3 = $_POST['prixPromo3'];
    $destinationOffre4 = $_POST['destinationOffre4'];
    $titreOffre4 = $_POST['titreOffre4'];
    $prixPromo4 = $_POST['prixPromo4'];
    $destinationOffre5 = $_POST['destinationOffre5'];
    $titreOffre5 = $_POST['titreOffre5'];
    $prixPromo5 = $_POST['prixPromo5'];
    $destinationOffre6 = $_POST['destinationOffre6'];
    $titreOffre6 = $_POST['titreOffre6'];
    $prixPromo6 = $_POST['prixPromo6'];
    $message = $_POST['message'];
    $dateEnvoi = $_POST['dateEnvoi'];
    $horaire = $_POST['horaire'];

    $to = 'damien.lebihanoff@gmail.com';
    $subject = 'Message de site VGV "contactez-nous';
    $message = 
    'Prix : ' . $prix . " \r\n" .
    'titre : ' . $titre . " \r\n" .
    'destinationOffre1 : ' . $destinationOffre1 . " \r\n" .
    'titreOffre1 : ' . $titreOffre1 . " \r\n" .
    'prixPromo1 : ' . $prixPromo1 . " \r\n" .
    'destinationOffre2 : ' . $destinationOffre2 . " \r\n" .
    'titreOffre2 : ' . $titreOffre2 . " \r\n" .
    'prixPromo2 : ' . $prixPromo2 . " \r\n" .
    'destinationOffre3 : ' . $destinationOffre3 . " \r\n" .
    'titreOffre3 : ' . $titreOffre3 . " \r\n" .
    'prixPromo3 : ' . $prixPromo3 . " \r\n" .
    'destinationOffre4 : ' . $destinationOffre4 . " \r\n" .
    'titreOffre4 : ' . $titreOffre4 . " \r\n" .
    'prixPromo4 : ' . $prixPromo4 . " \r\n" .
    'destinationOffre5 : ' . $destinationOffre5 . " \r\n" .
    'titreOffre5 : ' . $titreOffre5 . " \r\n" .
    'prixPromo5 : ' . $prixPromo5 . " \r\n" .
    'destinationOffre6 : ' . $destinationOffre6 . " \r\n" .
    'titreOffre6 : ' . $titreOffre6 . " \r\n" .
    'prixPromo6 : ' . $prixPromo6 . " \r\n" .
    'Message : ' . $message . " \r\n" .
    'Date d\'envoi : ' . $dateEnvoi . " \r\n" .
    'Horaire : ' . $horaire . " \r\n" .
    $headers = 'From: damien.lebihanoff@gmail.com' . "\r\n" .
    //'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    // mail($to, $subject, $message, $headers); Le site n'est pas en ligne

  ?>
  <div id="merci" class="offreActu">
    <p><span>Merci</span> pour votre demande de réservation.<br>
      Nos équipes reviendront vers vous<br>
      dans les 48h.
    </p>
  </div>
  <?php
    } else {
  ?>
          <form method="post" enctype="multipart/form-data"> 
						<label for="prix">Prix/Promotion :</label>
						<input type="text" id="prix" name="prix">
						<label for="titre">Titre :</label>
						<input type="text" id="titre" name="titre">
						<label for="image">Image :</label>
						<input type="file" id="image" name="image" value="defaut">

            <h2 class="rightTitre">Last Minute</h2>
            <label for="image1">Image Offre 1</label>
						<input type="file" id="image1" name="image1" value="defaut">
            <label for="destinationOffre1">Destination Offre 1 :</label>
						<input type="text" id="destinationOffre1" name="destinationOffre1">
            <label for="titreOffre1">Titre Offre 1 :</label>
						<input type="text" id="titreOffre1" name="titreOffre1">
            <label for="prixPromo1">Prix/Promotion Offre 1 :</label>
						<input type="text" id="prixPromo1" name="prixPromo1">
            <label for="image2">Image Offre 2</label>
						<input type="file" id="image2" name="image2" value="defaut2">
            <label for="destinationOffre2">Destination Offre 2 :</label>
						<input type="text" id="destinationOffre2" name="destinationOffre2">
            <label for="titreOffre2">Titre Offre 2 :</label>
						<input type="text" id="titreOffre2" name="titreOffre2">
            <label for="prixPromo2">Prix/Promotion Offre 2 :</label>
						<input type="text" id="prixPromo2" name="prixPromo2">
            <label for="image3">Image Offre 3</label>
						<input type="file" id="image3" name="image3" value="defaut3">
            <label for="destinationOffre3">Destination Offre 3 :</label>
						<input type="text" id="destinationOffre3" name="destinationOffre3">
            <label for="titreOffre3">Titre Offre 3 :</label>
						<input type="text" id="titreOffre3" name="titreOffre3">
            <label for="prixPromo3">Prix/Promotion Offre 3 :</label>
						<input type="text" id="prixPromo3" name="prixPromo3">

            <h2 class="rightTitre">Nouveautes</h2>
            <label for="image4">Image Offre 1</label>
						<input type="file" id="image4" name="image4" value="defaut4">
            <label for="destinationOffre4">Destination Offre 1 :</label>
						<input type="text" id="destinationOffre4" name="destinationOffre4">
            <label for="titreOffre4">Titre Offre 1 :</label>
						<input type="text" id="titreOffre4" name="titreOffre4">
            <label for="prixPromo4">Prix/Promotion Offre 1 :</label>
						<input type="text" id="prixPromo4" name="prixPromo4">
            <label for="image5">Image Offre 2</label>
						<input type="file" id="image5" name="image5" value="defaut5">
            <label for="destinationOffre5">Destination Offre 2 :</label>
						<input type="text" id="destinationOffre5" name="destinationOffre5">
            <label for="titreOffre5">Titre Offre 2 :</label>
						<input type="text" id="titreOffre5" name="titreOffre5">
            <label for="prixPromo5">Prix/Promotion Offre 2 :</label>
						<input type="text" id="prixPromo5" name="prixPromo5">
            <label for="image6">Image Offre 3</label>
						<input type="file" id="image6" name="image6" value="defaut6">
            <label for="destinationOffre6">Destination Offre 3 :</label>
						<input type="text" id="destinationOffre6" name="destinationOffre6">
            <label for="titreOffre6">Titre Offre 3 :</label>
						<input type="text" id="titreOffre6" name="titreOffre6">
            <label for="prixPromo6">Prix/Promotion Offre 3 :</label>
						<input type="text" id="prixPromo6" name="prixPromo6">

            <h2 class="rightTitre">Le billet de l'agence</h2>
            <label for="image7">Image</label>
						<input type="file" id="image7" name="image7" value="defaut7">
            <label for="message">Message :</label>
						<textarea id="message"  name="message"></textarea>

            <h2 class="rightTitre">Date et heure d'envoi</h2>
            <label for="dateEnvoi">Date d'envoi (minimum 3 jours après la demande) :</label>
						<input type="date" id="dateEnvoi" name="dateEnvoi">
            <select name="horaire" id="horaire"  name="horaire">
							<option value="">Heure d'envoi</option>
							<option value="00h00">00h00</option>
							<option value="00h30">00h30</option>
							<option value="01h00">01h00</option>
							<option value="01h30">01h30</option>
							<option value="02h00">02h00</option>
							<option value="02h30">02h30</option>
							<option value="03h00">03h00</option>
							<option value="03h30">03h30</option>
							<option value="04h00">04h00</option>
							<option value="04h30">04h30</option>
							<option value="05h00">05h00</option>
							<option value="05h30">05h30</option>
							<option value="06h00">06h00</option>
							<option value="06h30">06h30</option>
							<option value="07h00">07h00</option>
							<option value="07h30">07h30</option>
							<option value="08h00">08h00</option>
							<option value="08h30">08h30</option>
							<option value="09h00">09h00</option>
							<option value="09h30">09h30</option>
							<option value="10h00">10h00</option>
							<option value="10h30">10h30</option>
							<option value="11h00">11h00</option>
							<option value="11h30">11h30</option>
							<option value="12h00">12h00</option>
							<option value="12h30">12h30</option>
							<option value="13h00">13h00</option>
							<option value="13h30">13h30</option>
							<option value="14h00">14h00</option>
							<option value="14h30">14h30</option>
							<option value="15h00">15h00</option>
							<option value="15h30">15h30</option>
							<option value="16h00">16h00</option>
							<option value="16h30">16h30</option>
							<option value="17h00">17h00</option>
							<option value="17h30">17h30</option>
							<option value="18h00">18h00</option>
							<option value="18h30">18h30</option>
							<option value="19h00">19h00</option>
							<option value="19h30">19h30</option>
							<option value="20h00">20h00</option>
							<option value="20h30">20h30</option>
							<option value="21h00">21h00</option>
							<option value="21h30">21h30</option>
							<option value="22h00">22h00</option>
							<option value="22h30">22h30</option>
							<option value="23h00">23h00</option>
							<option value="23h30">23h30</option>
						</select>

						<input type="submit" value="Demander ma newsletter" id="submitContact" name="demandeNewsletter" disabled>
					</form>

					<?php
    			}
    			?>
				</div>
			</section>