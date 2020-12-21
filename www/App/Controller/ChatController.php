<?php 
namespace App\Controller;
use App\Model\ChatModel;
class ChatController{
    public function __construct()
    {
        $this->model = new ChatModel();
    }





    public function chat(){
        $message = (String) trim($_GET["message"]);

        $poll_id = (String) trim($_GET["poll_id"]);

        $messageDate = (String) trim($_GET["messageDate"]);

        $getUsername = $this->model->sendMessage($poll_id, $_SESSION["id"], $_SESSION["user_name"], $message);
        $getMessages = $this->model->getMessages($poll_id);


        echo($_SESSION["user_name"] . " : " . $message . " (" . $messageDate . ")" . "<br>" );
        // return $this->getMessages($poll_id);
        // return $this->saveMessage($poll_id);
        // require ROOT."/App/View/ChatView.php";
    }   
}


?>  