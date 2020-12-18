<?php 
namespace App\Controller;
use App\Model\LeaderbordModel;
class LeaderbordController{
    public function __construct()
    {
        $this->model = new LeaderbordModel();
    }


    public function leaderbord(){
      

        $getUsersInfos = $this->model->getUsersInfos();




        require ROOT."/App/View/LeaderbordView.php";
    }

    
}


?>