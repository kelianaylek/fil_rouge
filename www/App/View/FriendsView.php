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

    <h1>Mes amis :</h1>

    <?php
    foreach($arrayOfFriendsNameArrays as $user_friend) : ?>
        <tr>
            <td><?= $user_friend[0]->user_name ?></td>
        </tr>
    <?php endforeach; ?>
    <h3>Amis en ligne :</h3>
    <?php
    foreach($arrayOnlineFriends as $onlineFriend) : ?>
        <tr>
            <td><?= $onlineFriend[0]->user_name ?></td>

        </tr>
    <?php endforeach; ?>

    <h3>Ajouter un ami</h3>

    <form  action="" method="POST">
    <input type="text" name="researchedFriend" placeholder="Rechercher un utilisateur">
    <button type="submit" name="addFriend">Ajouter comme ami</button>
    </form>

    <h2>Retirer un ami</h2>

    <form action="" method="POST">
    <input type="text" name="deletedFriend" placeholder="Rechercher un ami">
    <button type="submit" name="supprFriend">Supprimer cet ami</button>
    </form>

    <a href="?page=home">Home page</a>


    <?php
        include "inc/footer.inc.php"
    ?>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../public/assets/js/friends.js"></script>
</body>

</html>