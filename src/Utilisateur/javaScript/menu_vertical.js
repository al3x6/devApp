var btn = document.querySelector('.toggle_btn');
var nav = document.querySelector('.nav_vertical');
btn.onclick = function() {
	nav.classList.toggle('nav_vertical_open');
}