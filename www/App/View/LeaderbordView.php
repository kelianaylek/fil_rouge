<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../public/assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Projet fil rouge</title>
</head>

<body>

    <?php
        include "inc/header.inc.php"
    ?>

    <main class="mainPageLeaderbord">
        <div class="beyondLeaderbord"></div>
        <section>
            <div class="leaderbord container">
                <div>
                    <button>All</button>
                    <button>Sport</button>
                    <button>Streaming</button>
                    <button>TV</button>
                </div>
                
                <div>
                    <div>
                        <p>Player 1</p>
                        <div>
                            <p>5</p>
                            <i class="fa fa-star fa-lg" aria-hidden="true"></i>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="bellowLeaderbord"></div>

    </main>

    <?php
        include "inc/footer.inc.php"
    ?>

    <script src="js/index.js"></script>
</body>