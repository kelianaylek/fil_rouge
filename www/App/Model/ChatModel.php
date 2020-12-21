<?php
namespace App\Model;

use Core\Database;

class ChatModel extends Database{
  // Send a message in a poll 
  public function sendMessage($pollId, $userId, $userName, $message){
    $sendMessageContent = $this->pdo->query("INSERT INTO messages (message_content, user_id, user_name, poll_id)
    VALUES ('$message', '$userId', '$userName', '$pollId')"); 
}


// get last message in the poll concerned 
public function getLastMessage($pollId){
    $getLastMessage = $this->query("SELECT message_content FROM messages WHERE poll_id = '$pollId' ORDER BY message_date DESC LIMIT 1");
    return ($getLastMessage);
}
// Get all messages send in a poll 
public function getMessages($pollId){
    $getMessages = $this->query("SELECT * FROM messages WHERE poll_id = '$pollId' ORDER BY message_date DESC");
    return ($getMessages);
} 

}



