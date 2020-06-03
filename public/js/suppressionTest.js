let supprimer = document.getElementById("supprimer");
supprimer.addEventListener('click', confirmerSuppression);

function confirmerSuppression(event) {
	if(!confirm("Êtes-vous sûr de vouloir supprimer ce test ?")) {
		event.preventDefault();
	}
}
