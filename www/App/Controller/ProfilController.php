<?php 
namespace App\Controller;
use App\Model\ProfilModel;
class ProfilController{
    public function __construct()
    {
        $this->model = new ProfilModel();
    }


    public function profil(){
        require ROOT."/App/View/ProfilView.php";

    }

    
}


?>