<?php
namespace App\Model;

use Core\Database;

class StreamingModel extends Database{

    // Select all the polls created by the user 
    public function getAllUserPolls($userId, $currentTime){
        $reqAllPolls = $this->query("SELECT * FROM polls WHERE accepted_id = '$userId' AND poll_limit > '$currentTime' AND poll_type = 'streaming' ORDER BY poll_id DESC ");
        return ($reqAllPolls);
    }
    // Select the user's name 
    public function getUserName($userId){
        $reqUserName = $this->query("SELECT * FROM users WHERE user_id = '$userId'");
        return ($reqUserName);
    }
    // Select the user's friends's list 
    public function friendsIdList($me){
        $reqfriendsId = $this->query("SELECT friend_id FROM friends WHERE user_id = '$me'");
        return ($reqfriendsId);
    }   
    // Select all user's friends's name 
    public function friendName($friendId){
        $reqCurrentFriendName = $this->query("SELECT user_name FROM users WHERE user_id = '$friendId'");
        return ($reqCurrentFriendName);
    }
    // Select all friends's current polls 
    public function currentFriendsPolls($friendId, $currentDateTime){
        $reqCurrentFriendsPolls = $this->query("SELECT * FROM polls WHERE accepted_id = '$friendId' AND poll_limit > '$currentDateTime' AND poll_type = 'streaming' ORDER BY created_at DESC");
        return ($reqCurrentFriendsPolls);
    }
}



