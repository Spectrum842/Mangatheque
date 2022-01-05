<?php

require 'C://Dev/Mangatheque/app/models/config/config.php';
require 'C://Dev/Mangatheque/app/models/database/Database.php';
require 'C://Dev/Mangatheque/app/models/Authentification.php';
session_start();
session_destroy();
require 'C://Dev/Mangatheque//pages/header.php';
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
            header('Location: /app/controllers/Dashboard.php');
            exit();
        }else{
            $errors['password'] = 'Le mot de passe est erroné.';
        }
    }else{
        $errors['email'] = "Cet email n'existe pas";
    }

}

include 'C://Dev/Mangatheque/pages/authentification/connexion.php';

 require 'C://Dev/Mangatheque/pages/footer.php';