<?php
namespace App\Model;

use Core\Database;

class FriendsModel extends Database{

    // Select all user form the website 
    public function usersList($me){
        $reqAllUsers = $this->query("SELECT * FROM users WHERE user_id != '$me'");
        return ($reqAllUsers);
    }
    // Select all the friends's id 
    public function findFriendId($friendChoosen){
        $findFriendId = $this->query("SELECT user_id FROM users WHERE user_name = '$friendChoosen'");
        return ($findFriendId);
    }
    // Add a friend 
    public function addFriend($myId, $friendId){
        $addFriend = $this->prepare("INSERT INTO friends (user_id, friend_id) 
        VALUES ('$myId','$friendId')");
    }
    // Select all user's friends 
    public function friendsList($me){
        $reqfriendList = $this->query("SELECT * FROM friends WHERE user_id = '$me'");
        return ($reqfriendList);
    }
    // Select usernames from user's friends 
    public function findFriendName($friendId){
        $reqfindFriendname = $this->query("SELECT user_name FROM users WHERE user_id = '$friendId'");
        return ($reqfindFriendname);
    }
    // Delete a friends in user's friends list 
    public function SupprFriend($userId, $friendId){
        $reqSupprFriend = $this->query("DELETE FROM friends WHERE user_id = '$userId' AND friend_id = '$friendId'");
        return ($reqSupprFriend);
    }
    // Select user's online friends 
    public function onlineFriends($userId, $currentFriend){
        $reqOnlineFriends = $this->query("SELECT user_name FROM users WHERE user_id ='$currentFriend' AND user_isOnline = 1");
        return ($reqOnlineFriends);
    }
}



