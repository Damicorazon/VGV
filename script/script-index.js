// ------- map leaf-----------

var mymap = L.map("map").setView([ 48.56300,2.34268], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidGVzdGlidXp6IiwiYSI6ImNra3BsdGFwcTJmOXAydnRkdjRsbWQ4b2sifQ.BJJVO7rCoMtxYPVOUioQxw', {
		maxZoom: 18,
		attribution: 'TestiBuzz',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([48.56300, 2.34268]).addTo(mymap);




// ------------ envoie form si click accepte  -------------

var nom = document.getElementById('nom')
var prenom = document.getElementById('prenom')
var email2 = document.getElementById('email2')
var tel = document.getElementById('tel')



document.getElementById('field5').addEventListener('click', checkForm);
nom.addEventListener('change', checkForm);
prenom.addEventListener('change', checkForm);
tel.addEventListener('change', checkForm);
email2.addEventListener('change', checkForm);



function checkForm() {
	var checkbox = document.getElementById("field5");
	// console.log(checkbox);
	if (checkbox.checked == true && prenom.value.length > 2 && nom.value.length  > 2 && email2.value.length >= 6  && tel.value.length >= 10  )
	{
		document.getElementById("envoyerForm").disabled = false;
	} else {
		document.getElementById("envoyerForm").disabled = true;
	}
}





//----------- Verification formulaire ------------------ 

nom.addEventListener('change', nomRouge);
prenom.addEventListener('change', prenomRouge);
email2.addEventListener('change', email2Rouge);
tel.addEventListener('change', telRouge);

function nomRouge(){
    if( nom.value.length < 3){
        nom.style.border = "1px solid #EE4724";
        nom.style.background = "#EE4724";
    } else{
        nom.style.background = "#C2FFC2";
        nom.style.border = "1px solid #00e300";
    }
}

function prenomRouge(){
    if( prenom.value.length < 3){
        prenom.style.background = "#EE4724";
        prenom.style.border = "1px solid #EE4724";
    } else{
        prenom.style.background = "#C2FFC2";
        prenom.style.border = "1px solid #00e300";
    }
}

function telRouge(){
    if( tel.value.length < 10 ){
        tel.style.background = "#EE4724";
        tel.style.border = "1px solid #EE4724";
    } else{
        tel.style.background = "#C2FFC2";
        tel.style.border = "1px solid #00e300";
    }
}

function email2Rouge(){
    if( email2.value.length < 6){
        email2.style.background = "#EE4724";
        email2.style.border = "1px solid #EE4724";
    } else{
        email2.style.background = "#C2FFC2";
        email2.style.border = "1px solid #00e300";
    }
}



// ------------ menu burger responsive -------------



var burger = document.getElementById('burger');
var menu = document.getElementById('menu');
 

 burger.addEventListener('click', apparitionMenu);

 function apparitionMenu() {


	if (menu.style.display === 'block') {
 		menu.style.display = 'none';
 		burger.src = 'img/burger.png';
	} else {
		menu.style.display = 'block';
		burger.src = 'img/cross.png';
	}
}

