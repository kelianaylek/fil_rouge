<?php 
namespace App\Controller;
use App\Model\SignInModel;
class signInController{
    public function __construct()
    {
        $this->model = new SignInModel();
    }


    public function signIn(){
        // User is offline 
        $isOnline = 0;

        // If user send the form 
        if(!empty($_POST['submit_connexion'])){
            $mailConnect = htmlspecialchars($_POST['mail']);
            $passwordConnect = md5($_POST['pass']);
            // Check user mail 
            if((!empty($_POST['mail']))){
                // Check user password 
                if(!empty($_POST['pass'])){
                    $reqLogin = $this->model->signIn($mailConnect, $passwordConnect);
                    $reqLoginCount = count($reqLogin);
                    if($reqLoginCount >= 1){
                        // When user is connected 
                        $_SESSION['id'] = $reqLogin[0]->user_id;
                        $_SESSION['user_name'] = $reqLogin[0]->user_name;
                        $_SESSION['user_mail'] = $reqLogin[0]->user_email;
                        $_SESSION['user_password'] = $reqLogin[0]->user_password;
                        $_SESSION['user_score'] = $reqLogin[0]->user_score;
                        // User is now online 
                        $isOnline = 1;

                        $goOnline = $this->model->isOnline($_SESSION['id'], $isOnline);  
                                  
                        // When user is online, display main View 
                        header("Location: ../public/index.php?page=home");
                    }else{
                        echo('Echec de la connexion');
                    }
                }else{
                    echo('rentre un password');
                } 
            }else{
                echo('rentre un mail correct');
            }
        }
        require ROOT."/App/View/SignInView.php";
        }
    
}


?>