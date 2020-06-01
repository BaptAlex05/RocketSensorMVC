let supprimer = document.getElementsByClassName("supprimer");
supprimer.addEventListener('click', confirmerSupression);

function confirmerSuppression(event) {
	if(!confirm("Êtes-vous sûr de vouloir supprimer ce message ?")) {
		event.preventDefault();
	}
}
