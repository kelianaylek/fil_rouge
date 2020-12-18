<?php 
namespace App\Controller;
use App\Model\CreatePollModel;
class CreatePollController{
    public function __construct()
    {
        $this->model = new CreatePollModel();
    }


    public function createPoll(){
        // if user send the form 
        if(isset($_POST["sendPollToDb"])){
            // Check poll title
            if(!empty($_POST["poll_title"])){
                // Check poll first answer 
                if(!empty($_POST["poll_answer1"])){
                    // Check poll second answer 
                    if(!empty($_POST["poll_answer2"])){
                        if(!empty($_POST["pollType"])){
                            $pollType = $_POST["pollType"];
                            // Limit date choosen by user
                            $limitDate = $_POST['poll_limit_years'] ."-". $_POST['poll_limit_months'] ."-". $_POST['poll_limit_days'] ." ". $_POST['poll_limit_hours'] .":". $_POST['poll_limit_min'] .":". $_POST['poll_limit_sec'];
                            // Current date
                            date_default_timezone_set("Europe/Paris");
                            $currentDateTime = date('Y-m-d H:i:s');
                            $selectedDate = date_create($limitDate);
                            $currentDate = date_create($currentDateTime);
                            // Check if limit date is in the future
                            if($selectedDate > $currentDate){
                                $exeCreatePoll = $this->model->createPoll($_SESSION['user_name'], $limitDate, $pollType);
                                $exePollId = $this->model->findPollId();
                                $pollId = $exePollId[0]->poll_id;
                                // Redirect into the poll view 
                                header("Location: index.php?page=createdPoll&poll_id=$pollId");
                            }else{
                                echo("<br><br><br>Merci de choisir une date future");
                            }
                        }else{
                            echo("<br><br><br>Merci de choisir une catégorie");
                        }
                    
                    }else{
                        echo("<br><br><br>Merci de remplir votre second choix");
                    }
                }else{
                    echo("<br><br><br>Merci de remplir votre premier choix");
                }
            }else{
                echo("<br><br><br>Merci de donner un titre à votre sondage");
            }
        }
        require ROOT."/App/View/CreatePollView.php";
    }

    
}


?>  