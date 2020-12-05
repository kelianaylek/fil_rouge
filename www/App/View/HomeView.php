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
    <!-- body avec sondage correspondants a la page du type de sondage. Apperçu du pari le plus évident, d'autres paris quand on rentre dans le pari -->

    <main class="mainPagePrincipale">
        <!-- Bouton pour rechercher un pari -->

        <form class="recherche">
            <input type="search" placeholder="Rechercher" />
            <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

        <h2>Mes sondages en cours</h2>
        <div class="colonnesPagePrincipale">
            <section class="sondage container">
                <a href="?page=createdPoll">
                    <div class="sondageImage"></div>
                    <div class="sondageDetails">
                        <div>
                            <h1>Paris - Marseille</h1>
                            <h2>Après-demain 19:00</h2>
                        </div>
                        <div class="nombreDeSondages">
                            <h3>27 choix</h3>
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
                <!-- Ajout du sondage vers le panier  -->
                <!-- Bouton cliquable panier -->
                <div class="sondageResultats">
                    <!-- Les deux résultat au sondage le plus classique, poulaire -->
                    <button>Résultat 1</button>
                    <button>Résultat 2</button>
                </div>
            </section>
        </div>

        <h2>Les sondages en cours de mes amis</h2>

        <a href="?page=createPoll">Créer un sondage</a>

    </main>


    <?php
        include "inc/footer.inc.php"
    ?>
    

    <!-- <script src="js/index.js"></script> -->
</body>

</html>