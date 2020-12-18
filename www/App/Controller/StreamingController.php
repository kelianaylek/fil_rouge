<?php 
namespace App\Controller;
use App\Model\StreamingModel;
class StreamingController{
    public function __construct()
    {
        $this->model = new StreamingModel();
    }


    public function userAndFriendsPolls(){
        // Set the current date 
        date_default_timezone_set("Europe/Paris");
        $currentDateTime = date('Y-m-d H:i:s');
        // Get all user's poll 
        $exeAllPolls = $this->model->getAlluserPolls($_SESSION['id'],$currentDateTime);
        // Get the user name 
        $user = $this->model->getUserName($_SESSION["id"]);
        // Get the user's friends list 
        $friendsId = $this->model->friendsIdList($_SESSION["id"]);
        $friendsPolls = [];

        // Friends polls
        for($i = 0; $i<count($friendsId); $i++){
            $currentFriend = $friendsId[$i]->friend_id;
            $friendCurrentName = $this->model->friendName($currentFriend);
            date_default_timezone_set("Europe/Paris");
            $currentDateTime = date('Y-m-d H:i:s');

            // Choose only polls form friends if the limit date of the poll isnt passed 
            $friendCurrentPolls = $this->model->currentFriendsPolls($currentFriend, $currentDateTime);
            array_push($friendsPolls, $friendCurrentPolls);
        }
        require ROOT."/App/View/SportView.php";
    }

    
}


?>