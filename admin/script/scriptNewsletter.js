/* CHANGEMENT IMAGE GAUCHE */

var prix = document.getElementById('prix')
var titre = document.getElementById('titre')
var image = document.getElementById('image')
var image1 = document.getElementById('image1')
var destinationOffre1 = document.getElementById('destinationOffre1')
var titreOffre1 = document.getElementById('titreOffre1')
var prixPromo1 = document.getElementById('prixPromo1')
var image2 = document.getElementById('image2')
var destinationOffre2 = document.getElementById('destinationOffre2')
var titreOffre2 = document.getElementById('titreOffre2')
var prixPromo2 = document.getElementById('prixPromo2')
var image3 = document.getElementById('image3')
var destinationOffre3 = document.getElementById('destinationOffre3')
var titreOffre3 = document.getElementById('titreOffre3')
var prixPromo3 = document.getElementById('prixPromo3')
var image4 = document.getElementById('image4')
var destinationOffre4 = document.getElementById('destinationOffre4')
var titreOffre4 = document.getElementById('titreOffre4')
var prixPromo4 = document.getElementById('prixPromo4')
var image5 = document.getElementById('image5')
var destinationOffre5 = document.getElementById('destinationOffre5')
var titreOffre5 = document.getElementById('titreOffre5')
var prixPromo5 = document.getElementById('prixPromo5')
var image6 = document.getElementById('image6')
var destinationOffre6 = document.getElementById('destinationOffre6')
var titreOffre6 = document.getElementById('titreOffre6')
var prixPromo6 = document.getElementById('prixPromo6')
var image7 = document.getElementById('image7')
var message = document.getElementById('message')
var dateEnvoi = document.getElementById('dateEnvoi')
var horaire = document.getElementById('horaire')
var chgtImg = document.getElementById('chgtImg')


/* PREMIERE PARTIE */

prix.addEventListener('click', offreMoment);
titre.addEventListener('click', offreMoment);
image.addEventListener('click', offreMoment);

function offreMoment(){
  chgtImg.src = 'img/nl-actu.jpg';
}

/* DEUXIEME PARTIE */

image1.addEventListener('click', lastMinute);
destinationOffre1.addEventListener('click', lastMinute);
titreOffre1.addEventListener('click', lastMinute);
prixPromo1.addEventListener('click', lastMinute);
image2.addEventListener('click', lastMinute);
destinationOffre2.addEventListener('click', lastMinute);
titreOffre2.addEventListener('click', lastMinute);
prixPromo2.addEventListener('click', lastMinute);
image3.addEventListener('click', lastMinute);
destinationOffre3.addEventListener('click', lastMinute);
titreOffre3.addEventListener('click', lastMinute);
prixPromo3.addEventListener('click', lastMinute);

function lastMinute(){
  chgtImg.src = 'img/nl-lastminutes.jpg';
}


/* TROISIEME PARTIE */

image4.addEventListener('click', nouveautes);
destinationOffre4.addEventListener('click', nouveautes);
titreOffre4.addEventListener('click', nouveautes);
prixPromo4.addEventListener('click', nouveautes);
image5.addEventListener('click', nouveautes);
destinationOffre5.addEventListener('click', nouveautes);
titreOffre5.addEventListener('click', nouveautes);
prixPromo5.addEventListener('click', nouveautes);
image6.addEventListener('click', nouveautes);
destinationOffre6.addEventListener('click', nouveautes);
titreOffre6.addEventListener('click', nouveautes);
prixPromo6.addEventListener('click', nouveautes);

function nouveautes(){
  chgtImg.src = 'img/nl-nouveautes.jpg';
}

/* QUATRIEME PARTIE */

image7.addEventListener('click', billet);
message.addEventListener('click', billet);

function billet(){
  chgtImg.src = 'img/nl-billet.jpg';
}


/* BANDE VERTE SI VERIF OK */


prix.addEventListener('input', prixVert);
titre.addEventListener('input', titreVert);
destinationOffre1.addEventListener('input', destinationVert1);
titreOffre1.addEventListener('input', titreOffreVert1);
prixPromo1.addEventListener('input', prixOffreVert1);
destinationOffre2.addEventListener('input', destinationVert2);
titreOffre2.addEventListener('input', titreOffreVert2);
prixPromo2.addEventListener('input', prixOffreVert2);
destinationOffre3.addEventListener('input', destinationVert3);
titreOffre3.addEventListener('input', titreOffreVert3);
prixPromo3.addEventListener('input', prixOffreVert3);
destinationOffre4.addEventListener('input', destinationVert4);
titreOffre4.addEventListener('input', titreOffreVert4);
prixPromo4.addEventListener('input', prixOffreVert4);
destinationOffre5.addEventListener('input', destinationVert5);
titreOffre5.addEventListener('input', titreOffreVert5);
prixPromo5.addEventListener('input', prixOffreVert5);
destinationOffre6.addEventListener('input', destinationVert6);
titreOffre6.addEventListener('input', titreOffreVert6);
prixPromo6.addEventListener('input', prixOffreVert6);
message.addEventListener('input', messageVert);

function prixVert(){
  if( prix.value.length > 0){
    prix.style.background = "rgba(106,219,90,0.5)";
    prix.style.border = "1px solid #6ADB5A";
  } else{
      prix.style.background = "rgba(238,71,36,0.5)";
      prix.style.border = "1px solid #EE4724";
  }
}

function titreVert(){
  if( titre.value.length > 0){
    titre.style.background = "rgba(106,219,90,0.5)";
    titre.style.border = "1px solid #6ADB5A";
  } else{
      titre.style.background = "rgba(238,71,36,0.5)";
      titre.style.border = "1px solid #EE4724";
  }
}

function destinationVert1(){
  if( destinationOffre1.value.length > 0){
    destinationOffre1.style.background = "rgba(106,219,90,0.5)";
    destinationOffre1.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre1.style.background = "rgba(238,71,36,0.5)";
      destinationOffre1.style.border = "1px solid #EE4724";
  }
}

function destinationVert2(){
  if( destinationOffre2.value.length > 0){
    destinationOffre2.style.background = "rgba(106,219,90,0.5)";
    destinationOffre2.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre2.style.background = "rgba(238,71,36,0.5)";
      destinationOffre2.style.border = "1px solid #EE4724";
  }
}

function destinationVert3(){
  if( destinationOffre3.value.length > 0){
    destinationOffre3.style.background = "rgba(106,219,90,0.5)";
    destinationOffre3.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre3.style.background = "rgba(238,71,36,0.5)";
      destinationOffre3.style.border = "1px solid #EE4724";
  }
}

function destinationVert4(){
  if( destinationOffre4.value.length > 0){
    destinationOffre4.style.background = "rgba(106,219,90,0.5)";
    destinationOffre4.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre4.style.background = "rgba(238,71,36,0.5)";
      destinationOffre4.style.border = "1px solid #EE4724";
  }
}

function destinationVert5(){
  if( destinationOffre5.value.length > 0){
    destinationOffre5.style.background = "rgba(106,219,90,0.5)";
    destinationOffre5.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre5.style.background = "rgba(238,71,36,0.5)";
      destinationOffre5.style.border = "1px solid #EE4724";
  }
}

function destinationVert6(){
  if( destinationOffre6.value.length > 0){
    destinationOffre6.style.background = "rgba(106,219,90,0.5)";
    destinationOffre6.style.border = "1px solid #6ADB5A";
  } else{
      destinationOffre6.style.background = "rgba(238,71,36,0.5)";
      destinationOffre6.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert1(){
  if( titreOffre1.value.length > 0){
    titreOffre1.style.background = "rgba(106,219,90,0.5)";
    titreOffre1.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre1.style.background = "rgba(238,71,36,0.5)";
      titreOffre1.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert2(){
  if( titreOffre2.value.length > 0){
    titreOffre2.style.background = "rgba(106,219,90,0.5)";
    titreOffre2.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre2.style.background = "rgba(238,71,36,0.5)";
      titreOffre2.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert3(){
  if( titreOffre3.value.length > 0){
    titreOffre3.style.background = "rgba(106,219,90,0.5)";
    titreOffre3.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre3.style.background = "rgba(238,71,36,0.5)";
      titreOffre3.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert4(){
  if( titreOffre4.value.length > 0){
    titreOffre4.style.background = "rgba(106,219,90,0.5)";
    titreOffre4.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre4.style.background = "rgba(238,71,36,0.5)";
      titreOffre4.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert5(){
  if( titreOffre5.value.length > 0){
    titreOffre5.style.background = "rgba(106,219,90,0.5)";
    titreOffre5.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre5.style.background = "rgba(238,71,36,0.5)";
      titreOffre5.style.border = "1px solid #EE4724";
  }
}

function titreOffreVert6(){
  if( titreOffre6.value.length > 0){
    titreOffre6.style.background = "rgba(106,219,90,0.5)";
    titreOffre6.style.border = "1px solid #6ADB5A";
  } else{
      titreOffre6.style.background = "rgba(238,71,36,0.5)";
      titreOffre6.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert1(){
  if( prixPromo1.value.length > 0){
    prixPromo1.style.background = "rgba(106,219,90,0.5)";
    prixPromo1.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo1.style.background = "rgba(238,71,36,0.5)";
      prixPromo1.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert2(){
  if( prixPromo2.value.length > 0){
    prixPromo2.style.background = "rgba(106,219,90,0.5)";
    prixPromo2.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo2.style.background = "rgba(238,71,36,0.5)";
      prixPromo2.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert3(){
  if( prixPromo3.value.length > 0){
    prixPromo3.style.background = "rgba(106,219,90,0.5)";
    prixPromo3.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo3.style.background = "rgba(238,71,36,0.5)";
      prixPromo3.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert4(){
  if( prixPromo4.value.length > 0){
    prixPromo4.style.background = "rgba(106,219,90,0.5)";
    prixPromo4.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo4.style.background = "rgba(238,71,36,0.5)";
      prixPromo4.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert5(){
  if( prixPromo5.value.length > 0){
    prixPromo5.style.background = "rgba(106,219,90,0.5)";
    prixPromo5.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo5.style.background = "rgba(238,71,36,0.5)";
      prixPromo5.style.border = "1px solid #EE4724";
  }
}

function prixOffreVert6(){
  if( prixPromo6.value.length > 0){
    prixPromo6.style.background = "rgba(106,219,90,0.5)";
    prixPromo6.style.border = "1px solid #6ADB5A";
  } else{
      prixPromo6.style.background = "rgba(238,71,36,0.5)";
      prixPromo6.style.border = "1px solid #EE4724";
  }
}

function messageVert(){
  if( message.value.length > 0){
    message.style.background = "rgba(106,219,90,0.5)";
    message.style.border = "1px solid #6ADB5A";
  } else{
      message.style.background = "rgba(238,71,36,0.5)";
      message.style.border = "1px solid #EE4724";
  }
}


/* BOUTON ENVOYER DE RESERVATION */

var inputSubmit = document.getElementById('submitContact')
prix.addEventListener('input', boutonValider);
titre.addEventListener('input', boutonValider);
destinationOffre1.addEventListener('input', boutonValider);
titreOffre1.addEventListener('input', boutonValider);
prixPromo1.addEventListener('input', boutonValider);
destinationOffre2.addEventListener('input', boutonValider);
titreOffre2.addEventListener('input', boutonValider);
prixPromo2.addEventListener('input', boutonValider);
destinationOffre3.addEventListener('input', boutonValider);
titreOffre3.addEventListener('input', boutonValider);
prixPromo3.addEventListener('input', boutonValider);
destinationOffre4.addEventListener('input', boutonValider);
titreOffre4.addEventListener('input', boutonValider);
prixPromo4.addEventListener('input', boutonValider);
destinationOffre5.addEventListener('input', boutonValider);
titreOffre5.addEventListener('input', boutonValider);
prixPromo5.addEventListener('input', boutonValider);
destinationOffre6.addEventListener('input', boutonValider);
titreOffre6.addEventListener('input', boutonValider);
prixPromo6.addEventListener('input', boutonValider);
message.addEventListener('input', boutonValider);
image.addEventListener('change', boutonValider);
image1.addEventListener('change', boutonValider);
image2.addEventListener('change', boutonValider);
image3.addEventListener('change', boutonValider);
image4.addEventListener('change', boutonValider);
image5.addEventListener('change', boutonValider);
image6.addEventListener('change', boutonValider);
image7.addEventListener('change', boutonValider);
dateEnvoi.addEventListener('change', boutonValider);
horaire.addEventListener('change', boutonValider);


function boutonValider() {
	if (prix.value.length > 1 && titre.value.length > 1 && destinationOffre1.value.length > 1 && titreOffre1.value.length > 1 && prixPromo1.value.length > 1 && destinationOffre2.value.length > 1 && titreOffre2.value.length > 1 && prixPromo2.value.length > 1 && destinationOffre3.value.length > 1 && titreOffre3.value.length > 1 && prixPromo3.value.length > 1 && destinationOffre4.value.length > 1 && titreOffre4.value.length > 1 && prixPromo4.value.length > 1 && destinationOffre5.value.length > 1 && titreOffre5.value.length > 1 && prixPromo5.value.length > 1 && destinationOffre6.value.length > 1 && titreOffre6.value.length > 1 && prixPromo6.value.length > 1 && message.value.length > 1 && image.value != '' && image1.value != '' && image2.value != '' && image3.value != '' && image4.value != '' && image5.value != '' &&  image6.value != '' && image7.value != '' && dateEnvoi.value != '' && horaire.value != ''){
		inputSubmit.disabled = false;
	} else {
		inputSubmit.disabled = true;
	}
}