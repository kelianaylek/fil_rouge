<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Projet fil rouge</title>
</head>
<body>
    <div class="wrapper">
        <h1>Changez vos informations</h1>
        <form action="" method="POST">
            <label for="username">New username</label>
            <input type="text" name="newUsername" placeholder="<?= $_SESSION["user_name"];?>">
            <label for="password">New mdp</label>
            <input type="password" name="newPassword">
            <label for="confirmPassword">Confirm new mdp</label>
            <input type="password" name="newPasswordConfirmed" >

            <button type="submit" name="submitProfilChanges">Valider</button>
        </form>
        <a href="?page=home" class="returnhome">Retour à l'accueil</a>
    </div>
</body>
</html>