

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