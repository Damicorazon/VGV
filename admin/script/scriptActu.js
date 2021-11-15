/* Verification formulaire */

var titre = document.getElementById('titre');
var sousTitre = document.getElementById('sousTitre');
var prix = document.getElementById('prix');


titre.addEventListener('change', titreRouge);
titre.addEventListener('change', valideBtn);
sousTitre.addEventListener('change', soustitreRouge);
sousTitre.addEventListener('change', valideBtn);
prix.addEventListener('change', prixRouge);
prix.addEventListener('change', valideBtn);



function titreRouge(){
    if( titre.value.length > 0){
			titre.style.background = "rgba(106,219,90,0.5)";
			titre.style.border = "1px solid #6ADB5A";
    } else{
				titre.style.background = "rgba(238,71,36,0.5)";
        titre.style.border = "1px solid #EE4724";
    }

		if( titre.value.length === 0 ){
			titre.style.background = "#fff";
			titre.style.border = "1px solid #000";
		}
}

function soustitreRouge(){
	if( sousTitre.value.length > 0){
		sousTitre.style.background = "rgba(106,219,90,0.5)";
		sousTitre.style.border = "1px solid #6ADB5A";
	} else{
			sousTitre.style.background = "rgba(238,71,36,0.5)";
			sousTitre.style.border = "1px solid #EE4724";
	}

	if( sousTitre.value.length === 0 ){
		sousTitre.style.background = "#fff";
		sousTitre.style.border = "1px solid #000";
	}
}

function prixRouge(){
	if( prix.value.length > 0 ){
		prix.style.background = "rgba(106,219,90,0.5)";
		prix.style.border = "1px solid #6ADB5A";
	} else{
			prix.style.background = "rgba(238,71,36,0.5)";
			prix.style.border = "1px solid #EE4724";
	}

	if( prix.value.length === 0 ){
		prix.style.background = "#fff";
		prix.style.border = "1px solid #000";
	}

}


/* BOUTON VALIDER L'OFFRE */

var inputSubmit = document.getElementById('ValiderOffre')
var pdf = document.getElementById('pdf')
var image = document.getElementById('image')

pdf.addEventListener('change', valideBtn);
image.addEventListener('change', valideBtn);


function valideBtn() {
							 
	if ( titre.value.length > 0 && sousTitre.value.length > 0 && prix.value.length > 0 && pdf.value != '' && image.value != ''){
		inputSubmit.disabled = false;
	} else {
		inputSubmit.disabled = true;
	}
}