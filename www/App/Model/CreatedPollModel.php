<?php
namespace App\Model;

use Core\Database;

class CreatedPollModel extends Database{
    // Get the poll the user just created 
    public function getPoll($pollId) {
        $LastPoll = $this->query("SELECT * FROM polls WHERE poll_id = '$pollId'");
       return ($LastPoll);
    }
    // Vote for first answer in the poll
    public function voteAnswer1($pollId, $newPollFirstAnswerVotes) {
        $voteAnswer1 = $this->query("UPDATE polls SET poll_answer1_votes = '$newPollFirstAnswerVotes' WHERE poll_id = '$pollId'");
        return ($voteAnswer1);
    }
    // Vote for second answer in the poll
    public function voteAnswer2($pollId, $newPollFirstAnswerVotes) {
        $voteAnswer2 = $this->query("UPDATE polls SET poll_answer2_votes = '$newPollFirstAnswerVotes' WHERE poll_id = '$pollId'");
        return ($voteAnswer2);
    }
    // Get the poll result 
    public function getPollResult($pollId) {
        $getPollResult = $this->query("SELECT * FROM polls WHERE poll_id = '$pollId'");
        return ($getPollResult);
    }
    // Update who has voted for a poll
    function vote($pollId, $userId){
        $whohasVoted = $this->pdo->prepare("INSERT INTO polls_answered (poll_id, user_id) 
        VALUES (?,?)");
        $whohasVoted->execute(array($pollId,$userId));
    }
    // Get who has voted for a poll 
    public function whohasVoted($pollId, $userId) {
        $whohasVoted = $this->query("SELECT * FROM polls_answered WHERE poll_id = '$pollId' AND user_id = $userId");
        return ($whohasVoted);
    }
    // Get the friends's list 
    public function getFriendsList($me){
        $reqfriendList = $this->query("SELECT friend_id FROM friends WHERE user_id = '$me'");
        return ($reqfriendList);
    }
    // get friends's email 
    public function getFriendsEmail($friendId){
        $getFriendsEmail = $this->query("SELECT user_email FROM users WHERE user_id = '$friendId'");
        return ($getFriendsEmail);
    }
    // Get usernames of friends 
    public function getUserName($userId){
        $getUserName = $this->query("SELECT user_name FROM users WHERE user_id = '$userId'");
        return ($getUserName);
    }
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

    public function getUserScore($userId){
        $getUserScore = $this->query("SELECT user_score FROM users WHERE user_id = '$userId'");
        return ($getUserScore);
    } 
    public function updateUserScore($newUserScore, $userId){
        $updateUserScore = $this->query("UPDATE users SET user_score = '$newUserScore' WHERE user_id = '$userId'");
        return ($updateUserScore);
    }

}



