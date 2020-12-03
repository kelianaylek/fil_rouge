<?php

use App\Controller\ConnexionController;


if (array_key_exists("page", $_GET)) {

    switch ($_GET["page"]) {
        case 'connexion':
            $controller = new ConnexionController();
            $controller->connexion();
            break;
        
        
    }
} else {
    $controller = new SignUpController();
}
