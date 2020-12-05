<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="wrapper">
        <h1>Ecran de connexion</h1>
        <form method="POST">
        <!-- mail -->
        <label for="mail">Votre mail</label>    
        <input type="mail" name="mail">
        <!-- password -->
        <label for="pass">Votre password</label>    
        <input type="password" name="pass">
        <input type="submit" name="submit_connexion" value="Se connecter" />
    </form>
    
    <p>Pas encore de compte ?</p>
    <a href="../public/index.php?page=signUp">S'inscrire</a>

    </div>
</body>
</html>