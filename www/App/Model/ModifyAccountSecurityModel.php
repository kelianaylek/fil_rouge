<?php
namespace App\Model;

use Core\Database;

class ModifyAccountSecurityModel extends Database{

     // Select all user's informations 
     public function getUserInfos($userPassword, $userId){
        $reqUserInfos = $this->query("SELECT * FROM users WHERE user_password = '$userPassword' AND user_id = '$userId'");
        return ($reqUserInfos);
    }
  
}



