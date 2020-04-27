<?php

// Routeur principal

require('controller/controller.php');

// Selon le paramètre renseigné dans l'url, le traitement est effectué par un routeur spécifique
try {
	if (isset($_GET['consulter'])) {
		require('router/routerConsulter.php');
	}
	elseif (isset($_GET['entity'])) {
		if ($_GET['entity'] == 'commune') {
			require('router/routerCommune.php');
        }
        elseif ($_GET['entity'] == 'employe') {
			require('router/routerEmploye.php');
        }
        elseif ($_GET['entity'] == 'client') {
			require('router/routerClient.php');
        }
        elseif ($_GET['entity'] == 'voiture') {
			require('router/routerVoiture.php');
        }
        elseif ($_GET['entity'] == 'reparation') {
			require('router/routerReparation.php');
        }
        elseif ($_GET['entity'] == 'forfait') {
			require('router/routerForfait.php');
		}
	}
	else {
		home();
	}
} 
catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}

?>