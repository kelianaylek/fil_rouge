<?php 
namespace App\Controller;
use App\Model\CreatedPollModel;
class CreatedPollController{
    public function __construct()
    {
        $this->model = new CreatedPollModel();
    }


    public function createdPoll(){
        require ROOT."/App/View/CreatedPollView.php";

    }

    
}


?>  