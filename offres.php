<?php require_once "inc/header.inc.php"; ?>


<section id="accueil-offres">

             <div class="rect-blanc">
                <h1>Découvrez nos dernières offres </h1>
                </div> 


                <div id="choixVoyage">

                    <a class="btnVoyage" id="toutesButton">Toutes les offres</a>
                    <a class="btnVoyage" id="lastButton">Last minute</a>
                    <a class="btnVoyage" id="longButton">Long courrier</a>
                    <a class="btnVoyage" id="moyenButton">Moyen courrier</a>
                    <a class="btnVoyage" id="ccButton">Croisières/Circuits</a>
                    <a class="btnVoyage" id="diversButton">Divers</a>
                   
                    </div>


</section>


<section id="dernieres-offres">

<?php
$offre = $pdo->query("SELECT * FROM offres");

while ($toutOffres = $offre->fetch(PDO::FETCH_ASSOC)) {
    if($toutOffres['actif'] == 1){
    echo  '<div class="carte '. $toutOffres['type'] .'">';
      echo  '<div class="image-carte" style="background-image: url(upload-img/'.$toutOffres['image'].');"></div>';
      echo  '<div class="description">';  
          echo  '<h4 style="word-break: break-all">'. $toutOffres['type'] .'</h4>';
          echo  '<p style="word-break: break-all">'. $toutOffres['description'] .'</p>';
          echo  '<a href="upload-pdf/'. $toutOffres['pdf'] .'" class="bouton_voir" target="_blank">Voir</a>';
          echo  '<div class="prix">';
            echo  '<p>'. $toutOffres['prix_promo'] .'</p>';
          echo  '</div>';
        echo  '</div>';
      echo  '</div>';
    }
  }
?>

             <div class="clear"></div>

</section>
                   
                            

    <?php require_once "inc/footer.inc.php";?>

    <script src="script/offre-filtre.js"></script>

</body>

</html>
















