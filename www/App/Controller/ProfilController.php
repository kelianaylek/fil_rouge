<?php 
namespace App\Controller;
use App\Model\ProfilModel;
class ProfilController{
    public function __construct()
    {
        $this->model = new ProfilModel();
    }


    public function profil(){

        // Get all user polls 
        $allMyPolls = $this->model->myPolls($_SESSION['id']);

        require ROOT."/App/View/ProfilView.php";

    }

    
}


?>