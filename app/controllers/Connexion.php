<?php

require '../../app/models/config/config.php';
require '../../app/models/database/Database.php';
require '../../app/models/Authentification.php';

// On initialise et détruit la session a chaque passage sur la page connexion
session_start();
session_destroy();
require '../../pages/header.php';
// On vérifie le post formulaire
if($_POST['action'] === 'connexion'){
    // Création du tableau de gestion des erreurs
    $errors = [];
    
     // On vérifie que l'user existe en base de données grâce a l'email
    $authentification = new Authentification();
    $id_user = $authentification->getUserId($_POST['email']);
    if($id_user){
        $_SESSION['email'] = $_POST['email'];
        // verif password
        $password =$authentification->getPassword($id_user);
        if(sha1($_POST['password']) === $password){
            session_start();
            setcookie('session', 'ok');
            $_SESSION['id_user'] = $id_user;
            header('Location: /app/controllers/Dashboard.php');
            exit();
        }else{
            $errors['password'] = 'Le mot de passe est erroné.';
        }
    }else{
        $errors['email'] = "Cet email n'existe pas";
    }

}

include '../../pages/authentification/connexion.php';

 require '../../Mangatheque/pages/footer.php';