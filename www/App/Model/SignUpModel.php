<?php
namespace App\Model;

use Core\Database;

class SignUpModel extends Database{
    // Check if user already exist 
    public function getUsersMails(){
        $getUsersMails = $this->query("SELECT user_email FROM users");
        return ($getUsersMails);
    }

    // Creation of the account 
    public function reqCreateAccount($userName, $userMail,$userPassword){
        $signUp = $this->prepare("INSERT INTO users (user_name, user_email, user_password) 
            VALUES ('$userName','$userMail','$userPassword')");
    }
}