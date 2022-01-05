<?php

require 'app/models/config/config.php';
require 'app/models/database/Database.php';
require 'app/models/Authentification.php';
session_start();
session_destroy();
require 'pages/header.php';

if($_POST['action'] === 'connexion'){
    $errors = [];
    $authentification = new Authentification();
    $id_user = $authentification->getUserId($_POST['email']);
    
    if($id_user){
        $_SESSION['email'] = $_POST['email'];
        $password =$authentification->getPassword($id_user);
        if(sha1($_POST['password']) === $password){
            session_start();
            setcookie('session', 'ok');
            $_SESSION['id_user'] = $id_user;
            header('Location: http://localhost:3000/app/controllers/Dashboard.php');
            exit();
        }else{
            $errors['password'] = 'Le mot de passe est erroné.';
        }
    }else{
        $errors['email'] = "Cet email n'existe pas";
    }

}

include 'pages/authentification/connexion.php';

require 'pages/footer.php';