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

			<h2 class="leftTitre">Membres Newsletter</h2>
			<p class="leftDescr">Voici la liste des personnes s'étant inscrites à votre newsletter depuis votre site :</p>

			<?php

$chemin = 'csv/newsletter.csv';



		$chiffreLead = $pdo->query("SELECT count(*) FROM newsletter");

			$nbCountLead = $chiffreLead->fetch(PDO::FETCH_ASSOC);
			if($nbCountLead['count(*)'] == 0){	
				echo "Vous n'avez aucune adresse mail enregistrée";
			} else {
				$result = $pdo->query("SELECT * FROM newsletter");

				while ($req = $result->fetch(PDO::FETCH_ASSOC)){
					$emailLead = $req['email'];
					$lignes[] = array($emailLead);
				}
						// Paramétrage de l'écriture du futur fichier CSV
						// $delimiteur = ','; // Pour une tabulation, utiliser $delimiteur = "t";

						// Création du fichier csv (le fichier est vide pour le moment)
						// w+ : consulter http://php.net/manual/fr/function.fopen.php
						$fichier_csv = fopen($chemin, 'w+');

						// Si votre fichier a vocation a être importé dans Excel,
						// vous devez impérativement utiliser la ligne ci-dessous pour corriger
						// les problèmes d'affichage des caractères internationaux (les accents par exemple)
						fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

						// Boucle foreach sur chaque ligne du tableau
						foreach($lignes as $ligne){
							// chaque ligne en cours de lecture est insérée dans le fichier
							// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
							fputcsv($fichier_csv, $ligne, $delimiteur);
						}

						// fermeture du fichier csv
						fclose($fichier_csv);
						// echo '<a class="btn" href="' . $chemin . '">Télécharger un export excel</a>';
						echo '<a class="btn" href="' . $chemin . '" >Télécharger un export excel</a>';
						?>
						
						
						<table class="tableau">
							<thead>
								<tr>
									<th>Adresse mail :</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$email = $pdo->query("SELECT * FROM newsletter");
								
								while ($toutEmail = $email->fetch(PDO::FETCH_ASSOC)) {
									echo '<tr>';
									echo '<td>'. $toutEmail['email'] .'</td>';
									echo '</tr>';
								}
								?>
			</tbody>
		</table>
	<?php
	} // } else { ligne 40
	?>		
		</main>

		<?php
			include('view/footer.php');
		?>

<script type="text/javascript" src="script/burger.js"></script>
	</body>
</html>