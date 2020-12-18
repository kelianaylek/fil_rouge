<?php
namespace App\Model;

use Core\Database;

class LeaderbordModel extends Database{

    public function getUsersInfos(){
        $getUsersInfos = $this->query("SELECT * FROM users ORDER BY user_score DESC");
        return ($getUsersInfos);
    } 
}



