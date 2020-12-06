<?php 
namespace App\Controller;
use App\Model\ModifyAccountSecurityModel;
class ModifyAccountSecurityController{
    public function __construct()
    {
        $this->model = new ModifyAccountSecurityModel();
    }


    // if user want to change his personnal informations 
    public function modifyAccountSecurity(){
        // get all user's infos 
        $user = $this->model->getUserInfos($_SESSION["user_password"], $_SESSION["id"]);
        $userPass = $user[0]->user_password;

        // if user click on the submit btn 
        if(isset($_POST['submitCurrentPassword'])){
            $passwordTried = $_POST['currentPassword'];
            $encryptedPasswordTried = md5($passwordTried);
            // if user write the correct password 
            if($encryptedPasswordTried == $userPass){
                header("Location: ../public/index.php?page=modifyAccount");
            // if the two password are different
            }else{
                echo('Password incorrect');
            }
        }

        require ROOT."/App/View/ModifyAccountSecurityView.php";

    }

    
}


?>