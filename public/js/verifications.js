let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let mail = document.getElementById("mail");
let motDePasse = document.getElementById("motdepasse");
let motDePasse_bis = document.getElementById("motdepasse_bis");

let verifnom = /[0-9]+/;
let verifmail = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;

nom.addEventListener('blur', verificationNom);
prenom.addEventListener('blur', verificationPrenom);
mail.addEventListener('blur', verifMail);
motDePasse_bis.addEventListener('input', confirmation_MotDePasse);


function verificationNom() {
	if (verifnom.test(nom.value)) {
		alert("Le nom comporte un ou plusieurs chiffres");
		nom.style.color = "red";
	}
	else{
		nom.style.color = "green";
	}
}

function verificationPrenom() {
	if (verifnom.test(prenom.value)) {
		alert("Le prénom comporte un ou plusieurs chiffres");
		prenom.style.color = "red";
	}
	else{
		prenom.style.color = "green";
	}
}

function verifMail() {
	if (!verifmail.test(mail.value)) {
		mail.style.color = "red";
		alert("Le format de votre adresse mail est invalide");
	}
	else{
		mail.style.color = "green";
	}
}

function confirmation_MotDePasse() {
	if (motDePasse_bis.value == motDePasse.value) {
		motDePasse_bis.style.color = "green";
	}
	else{
		motDePasse_bis.style.color = "red";
	}
}