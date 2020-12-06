<?php

use App\Controller\SignUpController;
use App\Controller\SignInController;
use App\Controller\DeconnexionController;
use App\Controller\HomeController;
use App\Controller\ProfilController;
use App\Controller\FriendsController;
use App\Controller\CreatePollController;
use App\Controller\CreatedPollController;


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

        case 'deconnexion':
            $controller = new DeconnexionController();
            $controller->deconnexion();
            break;

        case 'home':
            $controller = new HomeController();
            $controller->userAndFriendsPolls();
            break;

        case 'createPoll':
            $controller = new CreatePollController();
            $controller->createPoll();
            break;

        case 'createdPoll':
            $controller = new CreatedPollController();
            $controller->createdPoll();   
            $controller->saveMessage();
            $controller->getMessages();  
            break;

        case 'profil':
            $controller = new ProfilController();
            $controller->profil();
            break;

        case 'friends':
            $controller = new FriendsController();
            $controller->friends();
            break;
        
        
    }
} else {
    $controller = new SignUpController();
}
