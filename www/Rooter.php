<?php

use App\Controller\SignUpController;
use App\Controller\SignInController;
use App\Controller\DeconnexionController;
use App\Controller\HomeController;
use App\Controller\ProfilController;
use App\Controller\FriendsController;
use App\Controller\CreatePollController;
use App\Controller\CreatedPollController;
use App\Controller\ModifyAccountSecurityController;
use App\Controller\ModifyAccountController;
use App\Controller\SportController;
use App\Controller\StreamingController;
use App\Controller\TvController;
use App\Controller\LeaderbordController;
use App\Controller\ChatController;



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

        case 'modifyAccountSecurity':
            $controller = new ModifyAccountSecurityController();
            $controller->modifyAccountSecurity();
            break;

        case 'modifyAccount':
            $controller = new ModifyAccountController();
            $controller->modifyAccount();
            break;

        case 'home':
            $controller = new HomeController();
            $controller->userAndFriendsPolls();
            break;

        case 'sport':
            $controller = new SportController();
            $controller->userAndFriendsPolls();
            break; 

        case 'streaming':
            $controller = new StreamingController();
            $controller->userAndFriendsPolls();
            break; 
            
        case 'tv':
            $controller = new TvController();
            $controller->userAndFriendsPolls();
            break;

        case 'createPoll':
            $controller = new CreatePollController();
            $controller->createPoll();
            break;

        case 'createdPoll':
            $controller = new CreatedPollController();
            $controller->createdPoll();   
     
            break;

        case 'profil':
            $controller = new ProfilController();
            $controller->profil();
            break;

        case 'friends':
            $controller = new FriendsController();
            $controller->friends();
            break;

        case 'leaderbord':
            $controller = new LeaderbordController();
            $controller->leaderbord();
            break;  

        case 'chat':
            $controller = new ChatController();
            $controller->sendMessage();
            break;  
    }

} else {
    $controller = new SignUpController();
}


if (array_key_exists("action", $_GET)){
    switch ($_GET["action"]){
     
        case 'getMessagesFromPoll':
            $controller = new ChatController();
            $controller->getMessagesFromPoll();
            break;  
        case 'getOnlineFriends':
            $controller = new FriendsController();
            $controller->getOnlineFriends();
            break;  
    }
}