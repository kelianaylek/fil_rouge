<?php 
namespace App\Controller;
use App\Model\FriendsModel;
class FriendsController{
    public function __construct()
    {
        $this->model = new FriendsModel();
    }


    public function friends(){

        //Find user's friend's id(s)
        $friendsList = $this->model->friendsList($_SESSION["id"]);
         
        //Find friends usernames
        $friendsList = $this->model->friendsList($_SESSION["id"]);
        $friendsListlength = count($friendsList);
        $arrayOfFriendsNameArrays = [];
        for($i = 0; $i<$friendsListlength; $i++){
            $friendId= $friendsList[$i]->friend_id;

            $friendsNameArray = $this->model->findFriendName($friendId);

            array_push($arrayOfFriendsNameArrays, $friendsNameArray);
        }


        // Add a friend
        if(isset($_POST["addFriend"])){
            // Check if user have write a username
            if(!empty($_POST["researchedFriend"])){
                $allUsers = $this->model->usersList($_SESSION["id"]);
                $allUsersLength = count($allUsers);
                $message = "";
                for($i = 0; $i<$allUsersLength; $i++){
                    $userFound = $allUsers[$i]->user_name;
                    // If user exist
                    if($_POST["researchedFriend"] == $userFound){

                        //Find the id of the friend user want to add
                        $friendAdded = $userFound;
                        $addFriend = $this->model->findFriendId($friendAdded);
                        $addedFriendId = $addFriend[0]->user_id;

                        //Find id(s) of the friend(s) user want to add 
                        $friendArray = $this->model->friendsList($_SESSION["id"]);
                        $friendArrayLength = count($friendArray);

                        $alreadyAFriend = false;

                        // Check if they are already friends are not 
                        for($j = 0; $j<=$friendArrayLength; $j++){
                            if($friendArray[$j]->friend_id !== $addedFriendId){
                                if($alreadyAFriend == true){
                                    $alreadyAFriend = true;
                                }else{
                                    $alreadyAFriend = false;
                                }
                            }else{
                                $alreadyAFriend = true;
                            }
                        }  
                        // If they are not friends yet, add the friend 
                        if($alreadyAFriend == false){
                            $addFriend = $this->model->addFriend($_SESSION["id"], $addedFriendId);
                            $addFriend = $this->model->addFriend($addedFriendId, $_SESSION["id"]);
                            $message = "Ami ajouté";
                            header("Location: ../public/index.php?page=friends");
                        // Else, user cannot had this friend again 
                        }else{
                            header("Location: ../public/index.php?page=friends");
                            echo("<br><br><br>Vous êtes déjà ami avec cet utilisateur");
                        }
                    }else{
                        if($message == "Ami ajouté"){
                            $message = "Ami ajouté";
                        // User does not exist 
                        }else{
                            $message = "Utilisateur introuvable";
                        }
                    }
                }
                echo($message);
            }else{
                echo("<br><br><br>Merci de chosir un nom d\'utilisateur");
            }
        }


        // Delete a friend
        if(isset($_POST["supprFriend"])){
            // If user has wrote a username 
            if(!empty($_POST["deletedFriend"])){
                // Check if user is friend with this user 
                $areFriends = false;
                for($i = 0; $i<count($arrayOfFriendsNameArrays); $i++){
                    if($_POST["deletedFriend"] == $arrayOfFriendsNameArrays[$i][0]->user_name){
                        if($areFriends == false){
                            $areFriends = true;
                            $friendId = $i;
                        }else{
                            $areFriends = true;
                            $friendId = $i;
                        }
                    }else{
                        $areFriend = false;
                    }
                }
                // If they are friends 
                if($areFriends == true){
                    // Delete the friend form the user's friend's list 
                    $findFriend = $this->model->findFriendId($_POST["deletedFriend"]);
                    $friendId = $findFriend[0]->user_id;
                    $supprFriend = $this->model->SupprFriend($_SESSION["id"], $friendId);
                    $supprFriend = $this->model->SupprFriend($friendId, $_SESSION["id"]);
                    header("Location: ../public/index.php?page=friends");
                    echo("<br><br><br>ami  existant");
                }else{
                    echo("<br><br><br>ami non existant");
                    header("Location: ../public/index.php?page=friends");
                }
            }else{
                echo("<br><br><br>Choisissez un ami à supprimer");
            }
        }

        // Find online friends
        $friendsList = $this->model->friendsList($_SESSION["id"]);

        $arrayOnlineFriends = [];

        // Check for every friend if he is online 
        for($i = 0; $i<count($friendsList); $i++){
            $currentFriend = $friendsList[$i]->friend_id;
            $onlineFriends = $this->model->onlineFriends($_SESSION["id"], $currentFriend);
            // If he is online, display his name in user's friends list 
            if(count($onlineFriends) !== 0){
                array_push($arrayOnlineFriends, $onlineFriends);
            }
        }
        require ROOT."/App/View/FriendsView.php";
    }

    
}


?>