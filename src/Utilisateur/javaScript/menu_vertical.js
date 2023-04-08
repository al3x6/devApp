var btn = document.querySelector('.toggle_btn');
var nav = document.querySelector('.nav_vertical');
btn.onclick = function() {
	<!-- * prend le bouton image du menu-->
	<!-- * prend la classe div du menu -->
	<!-- * lors du clique du bouton image du menu-->
	<!-- * Il prend la classe du div menu pour lui ajouter ou supprimer le css na_vertical_open-->
	nav.classList.toggle('nav_vertical_open');
}