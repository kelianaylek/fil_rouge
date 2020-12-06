<?php 
namespace App\Controller;
use App\Model\DeconnexionModel;
class DeconnexionController{
    public function __construct()
    {
        $this->model = new DeconnexionModel();
    }

    public function deconnexion(){
        // Session is destroyed when user id disconnected 
        session_destroy();
        // user go offline
        $isOnline = 0;
        $goOffline = $this->model->isOnline($_SESSION['id'], $isOnline); 

        header("Location: ../public/index.php?page=signIn");

    }

    
}


?>