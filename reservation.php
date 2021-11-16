<?php
	include('inc/init.inc.php');

$contenu = '';
// debug($_POST);

// Contrôle input email "reservation" et insertion en BDD base_testibuzz"
if (isset($_POST['submitReservation'])){

  if(!empty($_POST)) {

      if (!isset($_POST['email']) || strlen($_POST['email']) < 1 || strlen($_POST['email']) > 50) {
        $contenu .= '<div class="newsletterError">L\'email doit comporter entre 1 et 50 caractères.</div>';
      }

          if(empty($contenu)) { // si $contenu est vide c'est qu'il n'y a pas d'erreur

            $verifMail = executeRequete("SELECT * FROM newsletter WHERE email = :email", array(':email' => $_POST['email'])); // appel de la BDD pour voir tous les email présent.
              $verifMail2 = baseTestibuzz("SELECT * FROM liste_email WHERE email = :email", array(':email' => $_POST['email'])); // appel de la BDD pour voir tous les email présent.

              // debug($verifMail);

              if($verifMail->rowCount() > 0) { // si la requête contient 1 ou plusieurs lignes, c'est que l'email est déjà en BDD
                  $contenu .= '';
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
} // fin de  if (isset($_POST['submitReservation']))


// Contrôle input email "contactez-nous" et insertion en BDD base_testibuzz"

if (isset($_POST['submitContact'])){

  if(!empty($_POST)) {

      if (!isset($_POST['email2']) || strlen($_POST['email2']) < 1 || strlen($_POST['email2']) > 50) {
        $contenu .= '<div class="newsletterError">L\'email doit comporter entre 1 et 50 caractères.</div>';
      }

          if(empty($contenu)) { // si $contenu est vide c'est qu'il n'y a pas d'erreur

              $verifMail = executeRequete("SELECT * FROM newsletter WHERE email = :email", array(':email' => $_POST['email2'])); // appel de la BDD pour voir tous les email présent.
              $verifMail2 = baseTestibuzz("SELECT * FROM liste_email WHERE email = :email", array(':email' => $_POST['email2'])); // appel de la BDD pour voir tous les email présent.

              // debug($verifMail2);

              if($verifMail->rowCount() > 0) { // si la requête contient 1 ou plusieurs lignes, c'est que l'email est déjà en BDD
                  $contenu .= '';
                } else {

                  $date2 = new DateTime();

                  $date_traitee2 = $date2->format('Y-m-d');
                  // die($date_traitee2);

                  $_POST['email2'] = htmlspecialchars($_POST['email2'], ENT_QUOTES);

                  // Insertion en BDD :
                  $resultat = $pdo->prepare("INSERT INTO newsletter (email, date) VALUES (:email, :date)");
                  $resultat2 = $pdo2->prepare("INSERT INTO liste_email (email, date, source) VALUES (:email, :date, :source)");

                  // die($resultat2);

                  $succes = $resultat->execute(array(
                    ':email' => $_POST['email2'],
                    ':date' => $date_traitee2
                    ));

                  $succes2 = $resultat2->execute(array(
                  ':email' => $_POST['email2'],
                  ':date' => $date_traitee2,
                  ':source' => 'vgv'
                  ));

                  // die($succes2);

                  //5- on affiche un contenu de réussite ou d'échec :
                  if ($succes) { //execute() retourne true si la requête a marché, sinon false. Si $succes contient true, alors on affiche le contenu de réussite.
                    $contenu .= '';
                    }else { // $succes contient false : la requête n'a pas marché.
                    $contenu .= '<div  class="newsletterError">Une erreur est survenue...</div>';
                    }
              } // else

          } //if(empty($contenu))
  } // fin de if(!empty($_POST))
} // fin de if (isset($_POST['submitContact']))

			
	?>


<?php require_once "inc/header.inc.php"; ?>

    <section id="banniere-page-reservation">
            <div id="rectangle-demande-reservation">
            <h1> Demande de réservation </h1> 
            </div>
    </section>

 
    <section id="demande-formulaire">

     <h2> Une envie ? Une question ? Une réservation ? Ecrivez-nous ! </h2>

     <?php 

// Envoi demande reservation par mail du contact

  if(isset($_POST['submitReservation'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $type = $_POST['type'];
    $pays = $_POST['pays'];
    $depart = $_POST['dateDepart'];
    $retour = $_POST['dateRetour'];
    $message = $_POST['message'];

    $to = 'damien.lebihanoff@gmail.com';
    $subject = 'Message de site VGV "contactez-nous';
    $message = 
    'Nom : ' . $nom . " \r\n" .
    'Prenom : ' . $prenom . " \r\n" .
    'Email : ' . $email . " \r\n" .
    'Telephone : ' . $tel . " \r\n" .
    'Type de voyage : ' . $type . " \r\n" .
    'Destination : ' . $pays . " \r\n" .
    'Date de départ : ' . $depart . " \r\n" .
    'Date de retour : ' . $retour . " \r\n" .
    'Message : ' . $message . " \r\n" .
    $headers = 'From: damien.lebihanoff@gmail.com' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    // mail($to, $subject, $message, $headers);  Actuellement bloqué car site pas en ligne.

  ?>
  <div id="merci" class="newsletter">
    <p><span>Merci</span> pour votre demande de réservation.<br>
      Nos équipes reviendront vers vous<br>
      dans les 48h.
    </p>
  </div>
  <?php
    } else {
  ?>
    <form id="form" method="post">
    <!-- <div id="form"> -->
    <div class="form-style-1">
        <input type="text" id="nomResa" name="nom" class="field-divided" placeholder="Nom" minlength="2" required /> 
        <input type="text" id="prenomResa" name="prenom" class="field-divided" placeholder="Prenom" minlength="2" required/>
              
        <input type="email" id="emailResa" name="email" class="field-divided" placeholder="Email" minlength="6"  required/>
        <input type="tel" id="telResa" name="tel" class="field-divided" placeholder="Telephone" minlength="10" maxlength="13" required/>
    
        <select name="type" class="field-divided">
            <option value="" disabled selected hidden>Type de voyage</option>
            <option value="last">Last minute </option>
            <option value="long">Long courrier </option>
            <option value="moyen">Moyen courrier </option>
            <option value="croisiere-circuit">Croisiere/Circuit </option>
            <option value="divers">Divers</option>
        </select>
       
      <select name="pays" class="field-divided" >
            <option value="" disabled selected hidden>Destination</option> 
            <option value="France"> France </option>
            <option value="Afghanistan">Afghanistan </option>
            <option value="Afrique_Centrale">Afrique_Centrale </option>
            <option value="Afrique_du_sud">Afrique_du_Sud </option>
            <option value="Albanie">Albanie </option>
            <option value="Algerie">Algerie </option>
            <option value="Allemagne">Allemagne </option>
            <option value="Andorre">Andorre </option>
            <option value="Angola">Angola </option>
            <option value="Anguilla">Anguilla </option>
            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
            <option value="Argentine">Argentine </option>
            <option value="Armenie">Armenie </option>
            <option value="Australie">Australie </option>
            <option value="Autriche">Autriche </option>
            <option value="Azerbaidjan">Azerbaidjan </option>

            <option value="Bahamas">Bahamas </option>
            <option value="Bangladesh">Bangladesh </option>
            <option value="Barbade">Barbade </option>
            <option value="Bahrein">Bahrein </option>
            <option value="Belgique">Belgique </option>
            <option value="Belize">Belize </option>
            <option value="Benin">Benin </option>
            <option value="Bermudes">Bermudes </option>
            <option value="Bielorussie">Bielorussie </option>
            <option value="Bolivie">Bolivie </option>
            <option value="Botswana">Botswana </option>
            <option value="Bhoutan">Bhoutan </option>
            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
            <option value="Bresil">Bresil </option>
            <option value="Brunei">Brunei </option>
            <option value="Bulgarie">Bulgarie </option>
            <option value="Burkina_Faso">Burkina_Faso </option>
            <option value="Burundi">Burundi </option>

            <option value="Caiman">Caiman </option>
            <option value="Cambodge">Cambodge </option>
            <option value="Cameroun">Cameroun </option>
            <option value="Canada">Canada </option>
            <option value="Canaries">Canaries </option>
            <option value="Cap_vert">Cap_Vert </option>
            <option value="Chili">Chili </option>
            <option value="Chine">Chine </option>
            <option value="Chypre">Chypre </option>
            <option value="Colombie">Colombie </option>
            <option value="Comores">Colombie </option>
            <option value="Congo">Congo </option>
            <option value="Congo_democratique">Congo_democratique </option>
            <option value="Cook">Cook </option>
            <option value="Coree_du_Nord">Coree_du_Nord </option>
            <option value="Coree_du_Sud">Coree_du_Sud </option>
            <option value="Costa_Rica">Costa_Rica </option>
            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
            <option value="Croatie">Croatie </option>
            <option value="Cuba">Cuba </option>

            <option value="Danemark">Danemark </option>
            <option value="Djibouti">Djibouti </option>
            <option value="Dominique">Dominique </option>

            <option value="Egypte">Egypte </option>
            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
            <option value="Equateur">Equateur </option>
            <option value="Erythree">Erythree </option>
            <option value="Espagne">Espagne </option>
            <option value="Estonie">Estonie </option>
            <option value="Etats_Unis">Etats_Unis </option>
            <option value="Ethiopie">Ethiopie </option>

            <option value="Falkland">Falkland </option>
            <option value="Feroe">Feroe </option>
            <option value="Fidji">Fidji </option>
            <option value="Finlande">Finlande </option>
            <option value="France">France </option>

            <option value="Gabon">Gabon </option>
            <option value="Gambie">Gambie </option>
            <option value="Georgie">Georgie </option>
            <option value="Ghana">Ghana </option>
            <option value="Gibraltar">Gibraltar </option>
            <option value="Grece">Grece </option>
            <option value="Grenade">Grenade </option>
            <option value="Groenland">Groenland </option>
            <option value="Guadeloupe">Guadeloupe </option>
            <option value="Guam">Guam </option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernesey">Guernesey </option>
            <option value="Guinee">Guinee </option>
            <option value="Guinee_Bissau">Guinee_Bissau </option>
            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
            <option value="Guyana">Guyana </option>
            <option value="Guyane_Francaise ">Guyane_Francaise </option>

            <option value="Haiti">Haiti </option>
            <option value="Hawaii">Hawaii </option>
            <option value="Honduras">Honduras </option>
            <option value="Hong_Kong">Hong_Kong </option>
            <option value="Hongrie">Hongrie </option>

            <option value="Inde">Inde </option>
            <option value="Indonesie">Indonesie </option>
            <option value="Iran">Iran </option>
            <option value="Iraq">Iraq </option>
            <option value="Irlande">Irlande </option>
            <option value="Islande">Islande </option>
            <option value="Israel">Israel </option>
            <option value="Italie">italie </option>

            <option value="Jamaique">Jamaique </option>
            <option value="Jan Mayen">Jan Mayen </option>
            <option value="Japon">Japon </option>
            <option value="Jersey">Jersey </option>
            <option value="Jordanie">Jordanie </option>

            <option value="Kazakhstan">Kazakhstan </option>
            <option value="Kenya">Kenya </option>
            <option value="Kirghizstan">Kirghizistan </option>
            <option value="Kiribati">Kiribati </option>
            <option value="Koweit">Koweit </option>

            <option value="Laos">Laos </option>
            <option value="Lesotho">Lesotho </option>
            <option value="Lettonie">Lettonie </option>
            <option value="Liban">Liban </option>
            <option value="Liberia">Liberia </option>
            <option value="Liechtenstein">Liechtenstein </option>
            <option value="Lituanie">Lituanie </option>
            <option value="Luxembourg">Luxembourg </option>
            <option value="Lybie">Lybie </option>

            <option value="Macao">Macao </option>
            <option value="Macedoine">Macedoine </option>
            <option value="Madagascar">Madagascar </option>
            <option value="Madère">Madère </option>
            <option value="Malaisie">Malaisie </option>
            <option value="Malawi">Malawi </option>
            <option value="Maldives">Maldives </option>
            <option value="Mali">Mali </option>
            <option value="Malte">Malte </option>
            <option value="Man">Man </option>
            <option value="Mariannes du Nord">Mariannes du Nord </option>
            <option value="Maroc">Maroc </option>
            <option value="Marshall">Marshall </option>
            <option value="Martinique">Martinique </option>
            <option value="Maurice">Maurice </option>
            <option value="Mauritanie">Mauritanie </option>
            <option value="Mayotte">Mayotte </option>
            <option value="Mexique">Mexique </option>
            <option value="Micronesie">Micronesie </option>
            <option value="Midway">Midway </option>
            <option value="Moldavie">Moldavie </option>
            <option value="Monaco">Monaco </option>
            <option value="Mongolie">Mongolie </option>
            <option value="Montserrat">Montserrat </option>
            <option value="Mozambique">Mozambique </option>

            <option value="Namibie">Namibie </option>
            <option value="Nauru">Nauru </option>
            <option value="Nepal">Nepal </option>
            <option value="Nicaragua">Nicaragua </option>
            <option value="Niger">Niger </option>
            <option value="Nigeria">Nigeria </option>
            <option value="Niue">Niue </option>
            <option value="Norfolk">Norfolk </option>
            <option value="Norvege">Norvege </option>
            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

            <option value="Oman">Oman </option>
            <option value="Ouganda">Ouganda </option>
            <option value="Ouzbekistan">Ouzbekistan </option>

            <option value="Pakistan">Pakistan </option>
            <option value="Palau">Palau </option>
            <option value="Palestine">Palestine </option>
            <option value="Panama">Panama </option>
            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
            <option value="Paraguay">Paraguay </option>
            <option value="Pays_Bas">Pays_Bas </option>
            <option value="Perou">Perou </option>
            <option value="Philippines">Philippines </option>
            <option value="Pologne">Pologne </option>
            <option value="Polynesie">Polynesie </option>
            <option value="Porto_Rico">Porto_Rico </option>
            <option value="Portugal">Portugal </option>

            <option value="Qatar">Qatar </option>

            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
            <option value="Republique_Tcheque">Republique_Tcheque </option>
            <option value="Reunion">Reunion </option>
            <option value="Roumanie">Roumanie </option>
            <option value="Royaume_Uni">Royaume_Uni </option>
            <option value="Russie">Russie </option>
            <option value="Rwanda">Rwanda </option>

            <option value="Sahara Occidental">Sahara Occidental </option>
            <option value="Sainte_Lucie">Sainte_Lucie </option>
            <option value="Saint_Marin">Saint_Marin </option>
            <option value="Salomon">Salomon </option>
            <option value="Salvador">Salvador </option>
            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
            <option value="Samoa_Americaine">Samoa_Americaine </option>
            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
            <option value="Senegal">Senegal </option>
            <option value="Seychelles">Seychelles </option>
            <option value="Sierra Leone">Sierra Leone </option>
            <option value="Singapour">Singapour </option>
            <option value="Slovaquie">Slovaquie </option>
            <option value="Slovenie">Slovenie</option>
            <option value="Somalie">Somalie </option>
            <option value="Soudan">Soudan </option>
            <option value="Sri_Lanka">Sri_Lanka </option>
            <option value="Suede">Suede </option>
            <option value="Suisse">Suisse </option>
            <option value="Surinam">Surinam </option>
            <option value="Swaziland">Swaziland </option>
            <option value="Syrie">Syrie </option>

            <option value="Tadjikistan">Tadjikistan </option>
            <option value="Taiwan">Taiwan </option>
            <option value="Tonga">Tonga </option>
            <option value="Tanzanie">Tanzanie </option>
            <option value="Tchad">Tchad </option>
            <option value="Thailande">Thailande </option>
            <option value="Tibet">Tibet </option>
            <option value="Timor_Oriental">Timor_Oriental </option>
            <option value="Togo">Togo </option>
            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
            <option value="Tristan da cunha">Tristan de cuncha </option>
            <option value="Tunisie">Tunisie </option>
            <option value="Turkmenistan">Turmenistan </option>
            <option value="Turquie">Turquie </option>

            <option value="Ukraine">Ukraine </option>
            <option value="Uruguay">Uruguay </option>

            <option value="Vanuatu">Vanuatu </option>
            <option value="Vatican">Vatican </option>
            <option value="Venezuela">Venezuela </option>
            <option value="Vierges_Americaines">Vierges_Americaines </option>
            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
            <option value="Vietnam">Vietnam </option>

            <option value="Wake">Wake </option>
            <option value="Wallis et Futuma">Wallis et Futuma </option>

            <option value="Yemen">Yemen </option>
            <option value="Yougoslavie">Yougoslavie </option>

            <option value="Zambie">Zambie </option>
            <option value="Zimbabwe">Zimbabwe </option>

                        

            </select>       

        <label for="dateDep" >Votre date de départ</label> 
    
        <input id="dateDep" class="field-divided" type="date" name="dateDepart"
            required>  
           <br>

           <label for="dateRet">Votre date de retour</label> 

        <input id="dateRet" class="field-divided" type="date" name="dateRetour"
             /> 
      
      <textarea name="message" id="message" class="field-long field-textarea" placeholder="Projet de séjour"></textarea>
      <input type="checkbox" id="field5Resa" class="field5" ><label for="field5Resa"> J’accepte d’être recontacté.e par Vert-Galant Voyages et ses partenaires. </label> 
      <input id="envoyerFormResa2" type="submit" value="envoyer" name="submitReservation" disabled /> 
   
   </form>

    <?php
    }
    ?>

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

// Envoi information par mail du contact

if(isset($_POST['submitContact'])) {
  $nom2 = $_POST['nom2'];
  $prenom2 = $_POST['prenom2'];
  $email2 = $_POST['email2'];
  $tel2 = $_POST['tel2'];
  $message2 = $_POST['message2'];

  $to = 'damien.lebihanoff@gmail.com';
  $subject = 'Message de site VGV "contactez-nous';
  $message = 
  'Nom : ' . $nom2 . " \r\n" .
  'Prenom : ' . $prenom2 . " \r\n" .
  'Email : ' . $email2 . " \r\n" .
  'Telephone : ' . $tel2 . " \r\n" .
  'Message : ' . $message2 . " \r\n" .
  $headers = 'From: damien.lebihanoff@gmail.com' . "\r\n" .
  'Reply-To: ' . $email2 . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
  // mail($to, $subject, $message, $headers); Site pas en lignee

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
                    <input type="text" id="nom" name="nom2" class="field-divided" placeholder="Nom" minlength="2" required /> 
                    <input type="text" id="prenom" name="prenom2" class="field-divided" placeholder="Prenom" minlength="2" required/>
                    
                    <input type="email" id="email2" name="email2" class="field-divided" placeholder="Email" minlength="6" required/>
                    <input type="tel" id="tel" name="tel2" class="field-divided" placeholder="Telephone"  minlength="10" maxlength="13" required/>

                <textarea name="message2" id="message2" class="field-long field-textarea" placeholder="Votre message"></textarea>
                
                
                    <input type="checkbox" id="field5Resa2" name="field5" ><label for="field5Resa2">  J’accepte d’être recontacté.e par Vert-Galant Voyages et ses partenaires. </label>

                    <input id="envoyerForm2" type="submit" value="envoyer" name="submitContact" disabled/>
                </div>

        </form>

    <?php
    }
    ?>          
        </div>
        </div>

</section>

  <?php require_once "inc/footer.inc.php";?>

  <script src="script/script-reservations.js"></script>


  <!-- <script type="text/javascript" src="script/script.js"></script> -->


</body>

</html>



















