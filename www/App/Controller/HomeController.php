<?php 
namespace App\Controller;
use App\Model\HomeModel;
class HomeController{
    public function __construct()
    {
        $this->model = new HomeModel();
    }


    public function userPolls(){
        require ROOT."/App/View/HomeView.php";

    }

    
}


?>