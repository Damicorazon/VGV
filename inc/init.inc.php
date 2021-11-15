<?php
// Connection à la BDD

$pdo = new PDO('mysql:host=localhost;dbname=vgv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$pdo2 = new PDO('mysql:host=localhost;dbname=base-testibuzz', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Création d'une session ou ouverture si elle existe déjà :
if(session_id() == '') {
  session_start();
 }

// Initialisation d'une variable d'affichage de HTML :
$contenu = '';

// J'appel les fonctions dans toutes les pages, je les intègres dans le init.
require_once 'fonction.inc.php';