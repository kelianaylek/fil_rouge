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


        <h2>Tous mes sondages</h2>

        <table>
        <thead>
            <tr>
                <th>Titre du sondage</th>
                <th>Choix numéro 1</th>
                <th>Choix numéro 2</th>
                <th>Date</th>
                <th>Date de fin</th>
                <th>Résultats</th>

            </tr>
        </thead>
        <tbody>
    <pre>
    </pre>
    <?php
    foreach($allMyPolls as $user_poll) : ?>
        <tr>
            <td><?= $user_poll->poll_title ?></td>
            <td><?= $user_poll->poll_answer1 ?></td>
            <td><?= $user_poll->poll_answer2 ?></td>
            <td><?= $user_poll->created_at ?></td>
            <td><?= $user_poll->poll_limit ?></td>
            <td><a href="?page=createdPoll&poll_id=<?= $user_poll->poll_id ?>">Voir</a></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>

        <a href="?page=modifyAccountSecurity">Changer mes infos persos</a>

        <a href="?page=deconnexion">Se déconnecter</a>

    <?php
        include "inc/footer.inc.php"
    ?>
    

    <!-- <script src="js/index.js"></script> -->
</body>

</html>