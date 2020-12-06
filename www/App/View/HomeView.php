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

    <!-- Afficher le user name -->
    <h1>Bienvenue <?php echo($user[0]->user_name)?></h1>

    <h2>Mes sondages en cours :</h2>
    <table>
            <thead>
                <tr>
                    <th>Titre du sondage</th>
                    <th>Choix numéro 1</th>
                    <th>Choix numéro 2</th>
                    <th>Date de création</th>

                </tr>
            </thead>
            <tbody>
        <pre>
        </pre>
        <?php

        foreach($exeAllPolls as $user_poll) : ?>
            <tr>
                <td><?= $user_poll->poll_title ?></td>
                <td><?= $user_poll->poll_answer1 ?></td>
                <td><?= $user_poll->poll_answer2 ?></td>
                <td><?= $user_poll->created_at ?></td>
                <td><a href="?page=createdPoll&poll_id=<?= $user_poll->poll_id ?>">Voir le sondage</a></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>


        <h2>Les sondages en cours de mes amis :</h2>
    
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Titre du sondage</th>
                    <th>Choix numéro 1</th>
                    <th>Choix numéro 2</th>
                    <th>Date de fin</th>

                </tr>
            </thead>
            <tbody>
        <pre>
        </pre>
        <?php

        foreach($friendsPolls as $friendPolls) : ?>
            <?php
            foreach($friendPolls as $friendPoll) : ?>
                <tr>
                    <td><?= $friendPoll->poll_creator ?></td>
                    <td><?= $friendPoll->poll_title ?></td>
                    <td><?= $friendPoll->poll_answer1 ?></td>
                    <td><?= $friendPoll->poll_answer2 ?></td>
                    <td><?= $friendPoll->poll_limit ?></td>
                    <td><a href="?page=createdPoll&poll_id=<?= $friendPoll->poll_id?>">Voir le sondage</a></td>

                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
            </tbody>
        </table>


        <a href="?page=createPoll">Créer un sondage</a>

    </main>


    <?php
        include "inc/footer.inc.php"
    ?>
    

    <!-- <script src="js/index.js"></script> -->
</body>

</html>