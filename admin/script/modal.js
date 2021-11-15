var modal = document.getElementsByClassName('modal')[0];
var filtre = document.getElementsByClassName('filtreModal')[0];
var ajoutOffre = document.getElementById('ajoutOffre');

ajoutOffre.addEventListener('click', modalOn);
filtre.addEventListener('click', modalOn);

function modalOn() {
	if (filtre.style.display === 'block') {
		filtre.style.display = 'none';
		modal.style.display = 'none';
	} else {
		filtre.style.display = 'block';
		modal.style.display = 'block';
	}
}