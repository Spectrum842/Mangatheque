<?php
require '../../app/models/config/config.php';
require '../../app/models/database/Database.php';
require '../../app/models/Authentification.php';
// On initialise et détruit la session a chaque passage sur la page inscription
session_start();
session_destroy();
require '../../pages/header.php';

// On crée le tableau d'erreurs et data dont aura besoin la vue
$errors =  array();
$datas = array();
// On vérifie le post formulaire
if($_POST['action']=== 'inscription'){
    try{
        $inscription = new Authentification();
        $getUsersInfo = $inscription->getUsersInfo();
        
        // Vérif email valide
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            // Nettoyage variable
            $pseudo =  trim($_POST['pseudo']);
            $password = $_POST['password'];
            $passwordBis = $_POST['passwordBis'];
            $email =  trim($_POST['email']);
            $dateBirth =  trim($_POST['dateBirth']);
            

            // Verif sécurité password
            if( !preg_match( '~[A-Z]~', $password) ||
                !preg_match( '~[a-z]~', $password) ||
                !preg_match( '~\d~', $password) ||
                (strlen( $password) < 7) ){
                    $errors['password'] =  "Le mot de passe doit contenir au minimum 7 caractères dont une majuscule et un chiffre.";
            } 
            
            // Vérif password  = confirmer password
            if($password === '' || $password != $passwordBis){
                $errors['passwordBis'] = "Le mot de passe ou sa confirmation sont incorrectes.";
            }
            
            // Création des tableaux de vérifications de doublons d'adresse email/pseudo
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

            // On vérifie qu'on a  aucune erreur avant d'ajouter en base de données
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


include '../../pages/authentification/inscription.php';

require '../../pages/footer.php';