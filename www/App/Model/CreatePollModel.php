<?php
namespace App\Model;

use Core\Database;

class CreatePollModel extends Database{

      // User create a poll 
    function createPoll($pollCreator, $limitDate){
        $poll = $this->pdo->prepare("INSERT INTO polls (poll_title, poll_answer1, poll_answer2, poll_limit, accepted_id, poll_creator) 
        VALUES (?,?,?,?,?,?)");
        $poll->execute(array($_POST['poll_title'],$_POST['poll_answer1'],$_POST['poll_answer2'],$limitDate,$_SESSION['id'],$pollCreator));
    }
    // Find the poll just created
    function findPollId(){
        $pollId = $this->query("SELECT poll_id FROM polls ORDER BY poll_id DESC LIMIT 1 ");
        return ($pollId);
    }
}



