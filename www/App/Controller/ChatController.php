<?php 
namespace App\Controller;
use App\Model\ChatModel;
class ChatController{
    public function __construct()
    {
        $this->model = new ChatModel();
    }


    

    public function getMessagesFromPoll(){
        $poll_id = (String) trim($_GET["poll_id"]);

        $getMessages = $this->model->getMessages($poll_id);

        foreach($getMessages as $getMessage) : ?>
            <tr>
                <br>
                <td><?= $getMessage->user_name ?> : </td>
                <td><?= $getMessage->message_content ?> </td>
                <td>(<?= $getMessage->message_date ?>)</td>
                <br>
            </tr>
        <?php endforeach;
    }



    public function sendMessage(){
        $message = (String) trim($_GET["message"]);
        $poll_id = (String) trim($_GET["poll_id"]);

        $getUsername = $this->model->sendMessage($poll_id, $_SESSION["id"], $_SESSION["user_name"], $message);

        $getMessages = $this->model->getMessages($poll_id);
        foreach($getMessages as $getMessage) : ?>
            <tr>
                <br>
                <td><?= $getMessage->user_name ?> : </td>
                <td><?= $getMessage->message_content ?> </td>
                <td>(<?= $getMessage->message_date ?>)</td>
                <br>
            </tr>
        <?php endforeach;

    }   

}


?>  