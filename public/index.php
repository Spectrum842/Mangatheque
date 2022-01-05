<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="/public/css/style.css"></link> 
            <script src="https://kit.fontawesome.com/1608cf58a8.js" crossorigin="anonymous"></script>
            <script type="module" src="/public/js/main.js"></script>
            <title>Mangathèque</title>
        </head>

        <body>
            <img id="background-index" src='/public/src/images/MangaLibrary.jpg' alt="background-index"/> 
                    
            <div id="divIndex">
                <h1 id="mainTitle" class="title">La Mangathèque</h1>
                
                <main class="container">
                    <p id="introIndex">Votre site de collection de manga personnelle ! </p>
                    <button onclick="location.href='/app/controllers/Connexion.php'" class="button otherButton">Connectez-vous</button>
                    <button onclick="location.href='/app/controllers/Inscription.php'" class="button otherButton">Inscrivez-vous</button>
                </main>

                <footer class="footer">
                    <p>
                        Create with <i class="fab fa-gratipay"></i> by Lakshmy
                    </p>
                </footer>
                
            
            </div>
    </body>
</html>
