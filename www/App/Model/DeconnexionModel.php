<?php
namespace App\Model;

use Core\Database;

class DeconnexionModel extends Database{

    public function isOnline($me, $isOnline){
        // When user is connected, user is set online 
        $poll = $this->pdo->query("UPDATE users SET user_isOnline = '$isOnline' WHERE user_id = '$me'");
    } 
 
}



