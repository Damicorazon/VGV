<?php

include('inc/init.inc.php');

$contenu = '';


// Contrôle mail newsletter et insertion en BDD newsletter

if (isset($_POST['inscriptionNewsletter'])){

    if(!empty($_POST)) {

        if (!isset($_POST['email']) || strlen($_POST['email']) < 1 || strlen($_POST['email']) > 50) {
        $contenu .= '<div class="newsletterError">L\'email doit comporter entre 1 et 50 caractères.</div>';
        }

            if(empty($contenu)) { // si $contenu est vide c'est qu'il n'y a pas d'erreur

                $verifMail = executeRequete("SELECT * FROM newsletter WHERE email = :email", array(':email' => $_POST['email'])); // appel de la BDD pour voir tous les email présent.
                $verifMail2 = baseTestibuzz("SELECT * FROM liste_email WHERE email = :email", array(':email' => $_POST['email'])); // appel de la BDD pour voir tous les email présent.


                // debug($verifMail);

                if($verifMail->rowCount() > 0) { // si la requête contient 1 ou plusieurs lignes, c'est que l'email est déjà en BDD
                    $contenu .= '<div class="newsletterError">Vous êtes déjà inscrit à la newsletter</div>';
                } else {

                    $date = new DateTime();

                    $date_traitee = $date->format('Y-m-d');
                    // die($date_traitee);

                    $_POST['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES);

                    // Insertion en BDD :
                    $resultat = $pdo->prepare("INSERT INTO newsletter (email, date) VALUES (:email, :date)");
                    $resultat2 = $pdo2->prepare("INSERT INTO liste_email (email, date, source) VALUES (:email, :date, :source)");


                    // debug($resultat);

                    $succes = $resultat->execute(array(
                    ':email' => $_POST['email'],
                    ':date' => $date_traitee
                    ));

                    $succes2 = $resultat2->execute(array(
                        ':email' => $_POST['email'],
                        ':date' => $date_traitee,
                        ':source' => 'vgv'
                        ));

                    // die($succes);

                    //5- on affiche un contenu de réussite ou d'échec :
                    if ($succes) { //execute() retourne true si la requête a marché, sinon false. Si $succes contient true, alors on affiche le contenu de réussite.
                    $contenu .= '<div  class="newsletter">Votre email a bien été enregistré</div>';
                    }else { // $succes contient false : la requête n'a pas marché.
                    $contenu .= '<div  class="newsletterError">Une erreur est survenue...</div>';
                    }
                } // else

            } //if(empty($contenu))
 } // fin de if(!empty($_POST))
}			


	?>


<?php require_once "inc/header.inc.php"; ?>

<section id="banniere-page-index"> 

<?php
// debug($_POST);
echo $contenu;
?>

    <div class="ligne-banniere-page-index">
        <div class="deuxCadres">
            <?php
                $resultat = $pdo->query("SELECT * FROM offre_actu ORDER BY `offre_actu_id` DESC LIMIT 1");

                while ($offre = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="carte-cap" style="background-image: url(upload-img/'.$offre['image'].');">';
                                echo '<h1 style="word-break: break-all">' . $offre['titre'] . '</h1>';
                            echo '<p style="word-break: break-all">' . $offre['soustitre'] .'<br> <strong> '. $offre['prix_promo'] .' </strong></p>';
                            echo '<a class="button-cap" target="_blank" href="upload-pdf/'. $offre['pdf'] .'">En savoir +</a>';
                        echo '</div>';
                };
            ?>
        </div>
        <div class="deuxCadres"> 
            <div class="carte-offre">
                <h2>Faites vous plaisir !</h2>
                <a class="button-offre" href="offres.php">Découvrir les offres</a>       
            </div>
        </div>
    </div>


 </section>
 
 <section id="dernieres_offres">

<h3>Découvrez les dernières offres</h3>

<div class="zoneCarte">
<?php

$dernieresOffres = $pdo->query("SELECT * FROM offres WHERE actif = 1 ORDER BY `offres_id` DESC LIMIT 4");

while ($quatreOffres = $dernieresOffres->fetch(PDO::FETCH_ASSOC)) {
    if($quatreOffres['actif'] == 1){
        echo '<div class="carte">';
            echo  '<div class="image-carte" style="background-image: url(upload-img/'.$quatreOffres['image'].');"></div>';
                echo '<div class="description">';
                    echo '<h4 style="word-break: break-all">' . $quatreOffres['titre'] . '</h4>';
                        echo '<p style="word-break: break-all">' .  $quatreOffres['description'] . '</p>';

                            echo '<a href="upload-pdf/'.$quatreOffres['pdf'].'" target="_blank" class="bouton_voir">Voir</a>';

                            echo '<div class="prix">';
                            echo '<p>' . $quatreOffres['prix_promo'] . '</p>';
                        echo '</div>';
                echo '</div>';
        echo '</div>';
    }
};
?>

</div>

    <div class="clear"></div>

    <a href="offres.php" class="bouton_voir_tout">Voir tous nos voyages</a>
            

<div class="clear"></div>

</section>


<section id="choisir">
    <h3>Pourquoi nous choisir</h3>
        <div class="icons">

            <div class="content-icon">

                  <img src="img/icons/world2.png" alt="Un logo représentant un avion faisant le tour du monde" >
                
                     <p>Voyages <strong> 
                        forfaitaire </strong><br> ou  <strong> à la  
                        carte,</strong> <br>  
                    train, avion, bateau, <br>
                    hotel, location de voiture </p> 
                     </div>
              

                    <div class="content-icon">
                         <img src="img/icons/comm2.png" alt="Un logo représentant deux personnes qui communique">
                         <p>Des <strong>conseils <br> 
                            personnalisés <br></strong>
                            et adaptés à<br>
                             chaque pays</p>
                    </div>

                <div class="content-icon">
                         <img src="img/icons/money2.png" alt="Un logo représentant une forme de billet de banque">
                     <p>Facilités de paiement : <br>
                        réglez en <strong>chèques <br>
                            vacances</strong>  <br>
                          en <strong>3 fois</strong></p>
                </div>

                
                    <div class="content-icon">
                         <img src="img/icons/insurance2.png" alt="Un logo représentant un bouclier avec à l'intérieur un V pour validation">
                     <p>Un problème 
                        d’<strong>assurance</strong>,<br>
                         de bagages ?<br>
                        L’agence  <br><strong>s’occupe de 
                            tout</strong><br> à distance</p>
                </div>

          </div>
        <!-- </div> -->


    </section>


<section id="newsletter">
    <h3>Newsletter</h3>
    <p>Ne tardez plus pour vous évader, recevez nos dernières offres</p>
        <form method="post" action="" id="barre">
            <!-- message Votre inscription a ete prise en compte-->
            <div id="blocMail">
                <input type="email" id="email" placeholder="Votre mail" name="email">
                <input id="validate" type="submit" value="S'inscrire" name="inscriptionNewsletter">  
            <!-- <a href="#" id="validate">S'inscrire</a>  -->
            </div>
        </form>
</section>
 


<section id="qui">

    <h3>Qui sommes-nous ?</h3>

    <div class="ligne"> 

            <div id="bloc-gauche">

                    <div id="image-agence">
                    <img src="img/portrait.png" alt="portrait du gérant Maurice Di Domenico à son bureau et face à une cliente">
                    </div>
            </div>


         <div id="bloc-droit"> 
             <div id="bloc-bio">
                 <p>
                    Passionné de <strong>voyages </strong>et découvertes,  
                    Maurice Di Domenico tenait à faire de sa  
                    passion,  son métier.   <br>
                    Fort de 25 ans d’expérience dans les  
                    voyages et le <strong>tourisme</strong>,  et après un long  
                    séjour en Suisse où il a dirigé plusieurs  
                    agences entre Genève et Lausanne, il est  
                    revenu à <strong>Tremblay en France</strong>, pour fonder  
                    <strong> « VERT-GALANT VOYAGES » </strong>dans le quartier 
                    qui l'a vu naître.
                </p>
            </div>
        </div>
            
    </div>

</section>


<section id="contact">

    <h3>Contactez-nous</h3>

    <div id="infos-pratique">


        <div class="content-info"> 

                <p> <span> VERT-GALANT VOYAGES </span> <br>
                        24, avenue Pasteur <br>
                        93290 Tremblay en France<br>
                        <span>01 49 63 08 71</span> 
                        <br><br>

                    <strong> Horaire d'ouverture </strong>:<br>
                        Lundi : 14h00 - 19h00 <br>
                        Mardi à samedi : 09h30 - 13h00 et 14h00 - 19h00<br><br>

                    <strong> vert-galant-voyages@orange.fr </strong>
                </p>

                <div id="facebook-et-map"> 
            <!-- icone facebook -->
                <a href="https://www.facebook.com/vertgalantvoyages" target="blank">
                <i class="fab fa-facebook"> </i></a> 
            <!-- carte leaflet    -->
                <div id="map"></div>
                </div>
            
        </div>


  
        <div id="bloc-form"> 

  <?php 

  // Contrôle mail "contactez-nous (page index.php)" et insertion en BDD base_testibuzz"

  if (isset($_POST['submitContact'])){
    if(!empty($_POST)) {

        if (!isset($_POST['email2']) || strlen($_POST['email2']) < 1 || strlen($_POST['email2']) > 50) {
        $contenu .= '<div class="newsletterError">L\'email doit comporter entre 1 et 50 caractères.</div>';
        }

            if(empty($contenu)) { // si $contenu est vide c'est qu'il n'y a pas d'erreur

                $verifMail = executeRequete("SELECT * FROM newsletter WHERE email = :email", array(':email' => $_POST['email2'])); // appel de la BDD pour voir tous les email présent.
                $verifMail2 = baseTestibuzz("SELECT * FROM liste_email WHERE email = :email", array(':email' => $_POST['email2'])); // appel de la BDD pour voir tous les email présent.

                // debug($verifMail);

                if($verifMail->rowCount() > 0) { // si la requête contient 1 ou plusieurs lignes, c'est que l'email est déjà en BDD
                    $contenu .= 'déjà inscrit';
                } else {

                    $date = new DateTime();

                    $date_traitee = $date->format('Y-m-d');
                    // die($date_traitee);

                    $_POST['email2'] = htmlspecialchars($_POST['email2'], ENT_QUOTES);

                    // Insertion en BDD :
                    $resultat = $pdo->prepare("INSERT INTO newsletter (email, date) VALUES (:email, :date)");
                    $resultat2 = $pdo2->prepare("INSERT INTO liste_email (email, date, source) VALUES (:email, :date, :source)");

                    // debug($resultat);

                    $succes = $resultat->execute(array(
                        ':email' => $_POST['email2'],
                        ':date' => $date_traitee
                        ));

                    $succes2 = $resultat2->execute(array(
                    ':email' => $_POST['email2'],
                    ':date' => $date_traitee,
                    ':source' => 'vgv'
                    ));



                    // die($succes);

                    //5- on affiche un contenu de réussite ou d'échec :
                    if ($succes) { //execute() retourne true si la requête a marché, sinon false. Si $succes contient true, alors on affiche le contenu de réussite.
                    $contenu .= '';
                    }else { // $succes contient false : la requête n'a pas marché.
                    $contenu .= '<div  class="newsletterError">Une erreur est survenue...</div>';
                    }
                } // else

            } //if(empty($contenu))
    } // fin de if(!empty($_POST))
  } // fin de if (isset($_POST['inscriptionNewsletter']))
 ?>

 <?php

  // Envoi information par mail du contact

    if(isset($_POST['submitContact'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email2'];
      $tel = $_POST['tel'];
      $message = $_POST['message'];

      $to = 'damien.lebihanoff@gmail.com';
      $subject = 'Message de site VGV "contactez-nous';
      $message = 
      'Nom : ' . $nom . " \r\n" .
      'Prenom : ' . $prenom . " \r\n" .
      'Email : ' . $email . " \r\n" .
      'Telephone : ' . $tel . " \r\n" .
      'Message : ' . $message . " \r\n" .
      $headers = 'From: damien.lebihanoff@gmail.com' . "\r\n" .
      'Reply-To: ' . $email . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    //   mail($to, $subject, $message, $headers); Le site n'est pas ligne

    ?>
    <div id="merci" class="newsletter">
      <p><span>Merci</span> pour votre message.<br>
        Nos équipes reviendront vers vous<br>
        dans les 48h.
      </p>
    </div>
    <?php
      } else {
    ?>
            <form id="formulaire" method="post" action="#contact">
                <div class="form-style-1">
                        <input type="text" id="nom" name="nom" class="field-divided" placeholder="Nom" minlength="2" title="minimum 2 caractères" required /> 
                        <input type="text" id="prenom" name="prenom" class="field-divided" placeholder="Prenom" minlength="2" title="minimum 2 caractères" required/>
                        
                        <input type="email" id="email2"  name="email2" class="field-divided" placeholder="Email" minlength="6" required/>
                        <input type="tel" id="tel" name="tel" class="field-divided" placeholder="Telephone" minlength="10" title="minimum 10 caractères" maxlength="13" required/>
    
                    <textarea name="message" id="message" class="field-long field-textarea" placeholder="Votre message" ></textarea>
                    
                        <input type="checkbox" id="field5" name="field5"> <label for="field5"> J’accepte d’être recontacté.e par Vert-Galant Voyages et ses partenaires.</label> 
            
                        <input id="envoyerForm" type="submit" name="submitContact" value="envoyer" disabled/>
                </div>  

            </form>
    <?php
      }
    ?>   

        </div>
    </div>
               
</section>

     <?php require_once "inc/footer.inc.php";?>
     <script src="script/script-index.js"></script>

</body>

</html>