<?php

use App\Controller\SignUpController;
use App\Controller\SignInController;



if (array_key_exists("page", $_GET)) {

    switch ($_GET["page"]) {
        case 'signUp':
            $controller = new SignUpController();
            $controller->signUp();
            break;

        case 'signIn':
            $controller = new signInController();
            $controller->signIn();
            break;
        
        
    }
} else {
    $controller = new SignUpController();
}
