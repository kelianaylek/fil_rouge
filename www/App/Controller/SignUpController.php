<?php 
namespace App\Controller;
use App\Model\SignUpModel;
class SignUpController{
    public function __construct()
    {
        $this->model = new SignUpModel();
    }


    public function signUp(){
        // if user submit the account creation 
        if(isset($_POST["submit_signUp"])){
            $userName = htmlspecialchars($_POST['username']);
            $userMail = htmlspecialchars($_POST['mail']);
            $userPassword = md5($_POST['pass']);
            $userPasswordConfirmed = md5($_POST['confirmPass']);

           $usersMails =  $this->model->getUsersMails();

            $userAlreadyExist = false;
            foreach($usersMails as $user_mail) :
                $email = $user_mail->user_email;

                if($email !== $userMail){
                    if($userAlreadyExist == true){
                        $userAlreadyExist = true;
                    }else{
                        $userAlreadyExist = false;
                    }
                }else{
                    $userAlreadyExist = true;
                }
            endforeach;

            if($userAlreadyExist == false){
                // Check if user has choosen an username 
                if(!empty($_POST['username'])){
                    // Check if user has choosen a mail
                    if((!empty($userMail))){
                        // Check if user has choosen a password
                        if(!empty($userPassword)){
                            if($userPassword == $userPasswordConfirmed){
                                // The account is created and user is redirect to connexion view 
                                $this->model->reqCreateAccount($userName, $userMail, $userPassword);
                                // header("Location: ../public/index.php?page=signIn");
                            }else{
                                echo('password pas pareil');
                            }
                        }else{
                            echo('password pas défini');
                        }
                    }else{
                        echo('Email pas défini');
                    }
                }else{
                    echo('Username pas défini');
                } 
            }else{
                echo("Un compte lié à cette adresse mail existe déjà");
            }  
        }
        require ROOT."/App/View/SignUpView.php";
    }
}


?>