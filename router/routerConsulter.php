<?php

// Routeur spécifique aux pages de consultation des réparations

if ($_GET['consulter'] == 'client') {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'choixClient') {
			choixClient();
		}
		elseif ($_GET['action'] == 'afficheReparations') {
			if (isset($_GET['id'])) {
				afficherReparationsClient((int) $_GET['id']);
			}
			else {
				echo 'Erreur : aucun identifiant de client envoyé';
			}
		}
	}
	else {
		choixClient();
	}
}
elseif ($_GET['consulter'] == 'technicien') {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'choixTechnicien') {
			choixTechnicien();
		}
		elseif ($_GET['action'] == 'afficheReparations') {
			if (isset($_GET['id'])) {
				afficherReparationsTechnicien((int) $_GET['id']);
			}
			else {
				echo 'Erreur : aucun identifiant de technicien envoyé';
			}
		}
	}
	else {
		choixTechnicien();
	}
}
else {
	choixTechnicien();
}

?>