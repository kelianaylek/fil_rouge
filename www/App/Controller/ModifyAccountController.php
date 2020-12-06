<?php 
namespace App\Controller;
use App\Model\ModifyAccountModel;
class ModifyAccountController{
    public function __construct()
    {
        $this->model = new ModifyAccountModel();
    }


    // if user want to change his personnal informations 
    public function modifyAccount(){
        // user update his personnal informations
        if(isset($_POST['submitProfilChanges'])){
            $newUserName = htmlspecialchars($_POST['newUsername']);
            $newUserPassword = md5($_POST['newPassword']);
            $confirmedNewUserPassword = md5($_POST['newPasswordConfirmed']);
            // if user write a new username 
            if(!empty($newUserName)){
                // if user write a new password 
                if(!empty($_POST['newPassword'])){
                    // if the confirmed password macth with the password 
                    if($newUserPassword == $confirmedNewUserPassword){

                        $userUpt = $this->model->updateUserInfos($newUserName, $newUserPassword, $_SESSION['user_password'], $_SESSION['id']);
                        $user = $this->model->getUserInfos($_SESSION["id"]);
                        $_SESSION['user_password'] = $user[0]->user_password;
                        $_SESSION['user_name'] = $user[0]->user_name;
                    
                        header("Location: ../public/index.php?page=home");
                    }else{
                        echo('Les deux mots de passe sont différents');
                    }
                }else{
                    echo('Merci de choisir un nouveau password');
                }
            }else{
                echo('Merci de choisir un nouveau username');
            }
        }
        require ROOT."/App/View/ModifyAccountView.php";

    }
}


?>