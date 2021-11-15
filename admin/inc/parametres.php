<?php

/*Variables :*/

$client = 'Vert-Galant Voyages';

// Fonction debug

function debug($variable) {
  echo '<div style="border: 1px solid orange; margin: 100px">';
    echo '<pre>';
      print_r($variable);
    echo '</pre>';
  echo '</div>';
  }

// Fonction qui indique si l'internaute est connecté

function estConnecte() {
  if (isset($_SESSION['admin'])) { // si "admin" existe dans la session, c'est que l'internaute est passé par la page connection avec les bons mail et mdp. Il est donc connecté. (cf connexion.php).
    return true; // connecté
  }else{
    return false; //pas connecté
  }
}

// Fonction qui exécute une requête à notre place

function executeRequete($requete, $marqueurs = array()) { 

  // Echapper les données de $marqueurs car elles proviennent de l'internaute : 
  foreach($marqueurs as $indice => $valeur) {
    $marqueurs[$indice] = htmlspecialchars($valeur, ENT_QUOTES); 
  } 

  // requête préparée :
  global $pdo;
  $resultat=$pdo->prepare($requete);
  $succes = $resultat->execute($marqueurs);

  if($succes) {   
    return $resultat;
  } else {
    die('Une erreur est survenue...'); 
  }
}


?>


