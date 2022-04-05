<?php

require '../../app/models/config/config.php';
require '../../app/models/database/Database.php';

require '../../app/models/User.php';
require '../../app/models/Manga.php';
require '../../app/models/Collection.php';

session_start();
// On vérifie que la session est bien initialisé sinon on redirige sur la connexion
if(isset($_SESSION['id_user'])){
    // On stocke l'id_user
    $id_user = $_SESSION['id_user'];

    // Instanciation de la classe user pour vérifier si user est admin
    $user = new User($id_user);
    $name = $user->getName();
    $role = $user->isAdmin();
    $role = $role[0]['role'];
    include '../../pages/header.php';

    // Instanciation classe Manga
    $instanceManga = new Manga();
    $allManga = $instanceManga->getMangas();

    // Instanciation classe Collection
    $instanceCollection = new Collection($id_user);
    $allCollection = $instanceCollection->getAllCollection();
    $countCollection = count($allCollection);

    //Création du tableau d'erreurs
    $errors = array();

    foreach($allCollection as $collection){
        if($collection['id_manga'] != 0){
            $mangaDetails = $instanceManga->getManga($collection['id_manga']);
            if($mangaDetails[0]['date_end'] === null){
                $date_end = 'En cours';
            }else{
                $date_end = $mangaDetails[0]['date_end'];
            }
            $tabMangaDetails[$collection['id_manga']] = ['author' => $mangaDetails[0]['author'], 'date_start' =>$mangaDetails[0]['date_start'], 'date_end' =>$date_end, 'type' =>$mangaDetails[0]['type'], 'category' =>$mangaDetails[0]['category']    ];
        }
        
    }

    // Conditions pour ajouter une collection
    if($_POST['action'] === 'addCollection'){
        try{
            $addCollection = $instanceCollection->addCollection($_POST['id_user'], $_POST['id_manga'], $_POST['name'], trim($_POST['image']), $_POST['description']);
            header('Location: /app/controllers/Dashboard.php');
            exit;
        }catch(PDOException $e){
            if($e->getMessage() == "SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'image' at row 1"){
                $errors['update'] = "L'url de l'image est trop long";
            }else if($e->getMessage()){
                $errors['image'] = "Url de l'image non valide";
            }

            // Reharder doc PDO pour getError()
            echo 'Erreur PDO : '.$e->getMessage();
            
            
        }
        
        
    }

    // Conditions pour update une collection
    if($_POST['action'] === 'updateCollection'){
        
        try{
            $updateManga = $instanceCollection->updateCollection($_POST['idCollection'], $_POST['updateName'], trim($_POST['updateImage']), $_POST['updateDescription'] );
            header('Location: /app/controllers/Dashboard.php');
            exit;
        }catch(PDOException $e){
            if($e->getMessage() == "SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'image' at row 1"){
                $errors['update'] = "L'url de l'image est trop long";
            }
        }
    }

    // Conditions pour delete une collection
    if($_POST['action'] === 'deleteCollection'){
        if($_POST['confirmation'] == 'yes'){
            try{
                $deleteCollection = $instanceCollection->deleteCollection($_POST['idCollection']);
                header('Location: /app/controllers/Dashboard.php');
                exit;
            }catch(PDOException $e){
                $errors['delete'] = 'Une Erreur durant la suppression est survenue.';
                echo $e->getMessage();
            }
        }
    }
    include '../../../Mangatheque/pages/dashboard.php';
    
    
}else{
    header('Location: /app/controllers/Connexion.php');
    exit;
}

include '../../../Mangatheque/pages/footer.php';