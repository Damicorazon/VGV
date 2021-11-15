<?php

 // Fonction debug

function debug($variable) {
  echo '<div style="border: 1px solid orange; margin: 100px">';
    echo '<pre>';
      print_r($variable);
    echo '</pre>';
  echo '</div>';
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

// Fonction qui exécute une requête à notre place pour la BDD "base-testibuzz"

function baseTestibuzz($requete, $marqueurs = array()) { 

  // Echapper les données de $marqueurs car elles proviennent de l'internaute : 
  foreach($marqueurs as $indice => $valeur) {
    $marqueurs[$indice] = htmlspecialchars($valeur, ENT_QUOTES); 
  } 

  // requête préparée :
  global $pdo2;
  $resultat=$pdo2->prepare($requete);
  $succes = $resultat->execute($marqueurs);

  if($succes) {   
    return $resultat;
  } else {
    die('Une erreur est survenue...'); 
  }
}