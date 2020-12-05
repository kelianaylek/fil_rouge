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
        <h1>Ecran d'inscription</h1>
        <form method="POST">
        <label for="username">username</label>    
        <input type="text" name="username">
        <!-- mail -->
        <label for="mail">Votre mail</label>    
        <input type="email" name="mail">
        <!-- password -->
        <label for="pass">Votre password</label>    
        <input type="password" name="pass">
        <label for="confirmPassword">Confirm password</label>    
        <input type="password" name="confirmPass">
        <input type="submit" name="submit_signUp" value="Se connecter" />
    </form>
 
    <p>Already have an account ?</p>
    <a href="../public/index.php?page=signIn">Se connecter</a>
    
    </div>
</body>
</html>