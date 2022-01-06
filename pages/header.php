<!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="/public/css/style.css"></link>
            <script type="module" src="/public/js/main.js"></script>
            <script src="https://kit.fontawesome.com/1608cf58a8.js" crossorigin="anonymous"></script>
            
            <title>Mangathèque</title>
        </head>
        <body class="light">
            <header class="header">
                <section>
                    <div id="divTitleHeader">
                        <h1 id="mainTitle" onclick="location.href='/public/index.php'" class="title">La Mangathèque</h1>
                    </div>
                    <nav id="nav">
                        <ul>
                        <?php 
                        if(isset($_SESSION['id_user'])){
                            ?>
                            <li><a href="/app/controllers/Deconnexion.php" title="lien déconnexion">Deconnexion</a></li>
                            <?php
                        }else{
                            ?>
                            <li><a href="/app/controllers/Inscription.php" title="lien inscription">Inscrivez-vous</a></li>
                            <li><a href="/app/controllers/Connexion.php" title="lien connexion">Connectez-vous</a></li>
                            <?php
                        }
    
                        if(isset($role) && $role === 'admin'){
                            if($_SERVER['PHP_SELF'] === '/app/controllers/admin/Admin.php'){
                                ?>
                                <li><a href="/app/controllers/Dashboard.php" title="lien dashboard">Dashboard</a></li>
                                <?php
                                
                            }else{
                                ?>
                                <li><a href="/app/controllers/admin/Admin.php" title="lien admin">Admin</a></li>
                                <?php
                            }
                        }
                    ?>
                        
                        </ul>
                    </nav>
                </section>
            </header>
                    
            <main class="container">
                <i class="fas fa-adjust" id="nightMode"></i>