<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Projet fil rouge</title>
</head>

<body>
    <!-- HEADER -->
    <?php
        include "inc/header.inc.php"
    ?>

<br><br><br>
        <!-- formulaire de création du sondage -->
    <h1>Créer un nouveau sondage</h1>

<form method="POST">

    <input type="text" name="poll_title" placeholder="Choisir une question">
    <input type="text" name="poll_answer1" placeholder="Choix numéro 1">
    <input type="text" name="poll_answer2" placeholder="Choix numéro 2">

    <p>Catégorie</p>
    <select name="pollType">
       <option value="sport">Sport</option>
       <option value="streaming">Streaming</option>
       <option value="tv">TV</option>
    ?>
    </select>

    <div class="date">

        <p>year :</p>
        <select name="poll_limit_years">
            <?php for($i = 2020; $i<=2030;$i++) 
            echo("
                <option value='$i'>$i</option>")     
        ?>
        </select>

        <p>month :</p>
        <select name="poll_limit_months">
            <?php for($i = 1; $i<=12;$i++) 
            if($i<10){
                echo("
                <option value='0$i'>0$i</option>");   
            }else{
                echo("
                <option value='$i'>$i</option>");  
            }
        ?>
        </select>
        <p>day :</p>
        <select name="poll_limit_days">
            <?php for($i = 1; $i<=31;$i++) 
            if($i<10){
                echo("
                <option value='0$i'>0$i</option>");   
            }else{
                echo("
                <option value='$i'>$i</option>");  
            }     
        ?>
        </select>
        <p>hour :</p>
        <select name="poll_limit_hours">
            <?php for($i = 1; $i<=24;$i++) 
                if($i<10){
                    echo("
                    <option value='0$i'>0$i</option>");   
                }else{
                    if($i == 24){
                        echo("
                    <option value='00'>00</option>");
                    }else{
                        echo("
                    <option value='$i'>$i</option>");
                    }
                }    
        ?>
        </select>
        <p>min :</p>
        <select name="poll_limit_min">
            <?php for($i = 0; $i<=59;$i++) 
            if($i<10){
                echo("
                <option value='0$i'>0$i</option>");   
            }else{
                echo("
                <option value='$i'>$i</option>");  
            }      
        ?>
        </select>
        <p>sec :</p>
        <select name="poll_limit_sec">
            <?php for($i = 0; $i<=59;$i++) 
             if($i<10){
                echo("
                <option value='0$i'>0$i</option>");   
            }else{
                echo("
                <option value='$i'>$i</option>");  
            }      
        ?>
        </select>

    </div>
    <br>
    <br>
    <!-- Bouton d'envoie du formulaire  -->
    <input name="sendPollToDb" type="submit" placehoder="Créer le sondage">
</form>

        <a href="?page=home">Home page</a>

    <?php
        include "inc/footer.inc.php"
    ?>
    
    <!-- <script src="js/index.js"></script> -->
</body>

</html>