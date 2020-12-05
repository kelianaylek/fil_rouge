<?php 
namespace App\Controller;
use App\Model\FriendsModel;
class FriendsController{
    public function __construct()
    {
        $this->model = new FriendsModel();
    }


    public function friends(){
        require ROOT."/App/View/FriendsView.php";

    }

    
}


?>