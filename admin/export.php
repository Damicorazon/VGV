<?php

  $chemin = 'csv/newsletter.csv';

			$chiffreLead = $pdo->query("SELECT * FROM newsletter");


				while($nbCountLead = $chiffreLead->fetch(PDO::FETCH_ASSOC))
          {
            
            if ($nbCountLead['email'] > 0) {
              // Paramétrage de l'écriture du futur fichier CSV
              $delimiteur = ','; // Pour une tabulation, utiliser $delimiteur = "t";

              // Création du fichier csv (le fichier est vide pour le moment)
              // w+ : consulter http://php.net/manual/fr/function.fopen.php
              $fichier_csv = fopen($chemin, 'w+');

              // Si votre fichier a vocation a être importé dans Excel,
              // vous devez impérativement utiliser la ligne ci-dessous pour corriger
              // les problèmes d'affichage des caractères internationaux (les accents par exemple)
              fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

              // Boucle foreach sur chaque ligne du tableau
              foreach($toutEmail as $ligne){
                // chaque ligne en cours de lecture est insérée dans le fichier
                // les valeurs présentes dans chaque ligne seront séparées par $delimiteur
                fputcsv($fichier_csv, $ligne, $delimiteur);
              }

              // fermeture du fichier csv
              fclose($fichier_csv);
              echo '<a class="btn" href="' . $chemin . '">Télécharger un export excel</a>';
            }
          }
			?>