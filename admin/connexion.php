<?php
	include('inc/init.php');

// debug($_POST);

// SI le membre connecté il ne voit plus la page connection
	if(estConnecte()){
		header('location:offre-actu.php');
		exit;
	}

//Traitement du formulaire de connexion :

  if (!empty($_POST)) { // si le formulaire a été envoyé
    // Contrôle du formulaire :
      if (empty($_POST['mail']) || empty($_POST['mdp'])) { // si les champs sont vides ou non définis
        $contenu .= '<div class="error">Les identifiants sont obligatoires.</div>';
      }

      // Si les champs sont remplis, on vérifie le pseudo en BDD puis le mdp :
        if (empty($contenu)) { // si la variable est vide c'est qu'il n'y a pas d'erreur
          
          $resultat = executeRequete("SELECT * FROM admin WHERE mail = :mail", array(':mail' => $_POST['mail']));

          if ($resultat->rowCount() == 1 ) { 
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); 

            // On peut vérifier le mdp puisque le pseudo existe:
						// j'ai utilisé le hash par défaut de php qui est le 'bcrypt' plus sécure que le MD5 classifié comme obsolète.
              if (password_verify($_POST['mdp'],$membre['mdp'] )) { 

                $_SESSION['admin'] = $membre;

                // redirection vers la page profil du membre.
                header('location:offre-actu.php');
                exit;


              } else { 
                $contenu .= '<div class="error">Erreur sur les identifiants.</div>';
              }
              
          } else { // s'il y a 0 ligne dans $resultat, c'est que le pseudo n'est pas en BDD
            $contenu .= '<div class="error">Erreur sur les identifiants.</div>';
          }

        } //if (empty($contenu))

  } // if (!empty($_POST))

// debug($contenu);

?>
<!DOCTYPE html>
<html lang="fr">
	<?php
		include('view/head.php');
	?>

	<body>

		<?php
			include('view/header.php');
		?>

		<main class="connexion">
			<?php
				echo $contenu;
        include('view/pages/login.php');
			?>
		</main>

		<?php
			include('view/footerConnexion.php');
		?>



<script type="text/javascript" src="script/burger.js"></script>

	</body>
</html>