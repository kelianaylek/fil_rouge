<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/created.css">
</head>
<body>

<h2>Résultats :</h2>

<h3><?=$getPollFirstAnswer?> : <?=$votesAnswer1Percents?>%</h3>

<h3><?=$getPollSecondAnswer?> : <?=$votesAnswer2Percents?>%</h3>

<h3>Total votes : <?=$totalVotes?></h3>



<div id="messages"></div>

    <form method="POST">
        <input class="message" type="text" name="message" id="">
        <button class="sendMessage" type="submit" name="sendMessage">Envoyer</button>
    </form>

 

</body>
</html>