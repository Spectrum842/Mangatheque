<?php
require 'C://Dev/Mangatheque/app/models/config/config.php';
require 'C://Dev/Mangatheque/app/models/database/Database.php';
require 'C://Dev/Mangatheque/app/models/Authentification.php';
session_start();
session_destroy();
require 'C://Dev/Mangatheque/pages/header.php';



$errors =  array();
$datas = array();
if($_POST['action']=== 'inscription'){
    try{
        $inscription = new Authentification();
        $getUsersInfo = $inscription->getUsersInfo();
        
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $pseudo =  trim($_POST['pseudo']);
            $password = $_POST['password'];
            $passwordBis = $_POST['passwordBis'];
            $email =  trim($_POST['email']);
            $dateBirth =  trim($_POST['dateBirth']);
    
            if( !preg_match( '~[A-Z]~', $password) ||
                !preg_match( '~[a-z]~', $password) ||
                !preg_match( '~\d~', $password) ||
                (strlen( $password) < 7) ){
                    $errors['password'] =  "Le mot de passe doit contenir au minimum 7 caractères dont une majuscule et un chiffre.";
            } 
    
            if($password === '' || $password != $passwordBis){
                $errors['passwordBis'] = "Le mot de passe ou sa confirmation sont incorrectes.";
            }
            
            foreach($getUsersInfo as $element){
                $tabEmails[] = $element['email'];
            }
    
            foreach($getUsersInfo as $element){
                $tabPseudo[] = $element['pseudo'];
            }
    
            if(in_array($email, $tabEmails) === true){
                $errors['email'] = "L'adresse email renseigné existe déjà.";
            }else{
                if(in_array($pseudo, $tabPseudo) === true){
                    $errors['pseudo'] = "Le pseudonyme choisit existe déjà.";
                }
            }
            if(count($errors) == 0){
                $password = sha1($password);
                $id_user = $inscription->addUser($email, $password,$pseudo,$dateBirth);
                session_start();
                setcookie('session', 'ok');
                $_SESSION['id_user'] = $id_user;
                header('Location: /app/controllers/Dashboard.php');
                exit;
            }
        }else{
            $errors['email'] = "Le format de l'adresse email n'est pas valide.";
        }
        
            
           
    }catch(PDOException $e){
        echo 'Erreur PDO : '.$e->getMessage();
    }
}


include 'C://Dev/Mangatheque/pages/authentification/inscription.php';

require 'C://Dev/Mangatheque/pages/footer.php';