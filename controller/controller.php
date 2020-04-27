<?php

// Controller principal

require('model/model.php');

require('controllerCommune.php');
require('controllerEmploye.php');
require('controllerClient.php');
require('controllerVoiture.php');
require('controllerReparation.php');
require('controllerForfait.php');
require('controllerConsulter.php');

// Affichage de l'accueil
function home()
{
    require('view/home.php');
}

?>