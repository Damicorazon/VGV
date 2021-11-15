/*MENU BURGER :*/
var burger = document.getElementById('burger');

burger.addEventListener('click', menuMobile);

function menuMobile() {
	if (document.getElementsByTagName('nav')[0].style.display === 'block') {
		document.getElementsByTagName('nav')[0].style.display = 'none';
		burger.src = 'img/burger.png';
	} else {
		document.getElementsByTagName('nav')[0].style.display = 'block';
		burger.src = 'img/close.png'
	}
}