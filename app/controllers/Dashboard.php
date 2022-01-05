<?php

require 'C://Dev/Mangatheque/app/models/config/config.php';
require 'C://Dev/Mangatheque/app/models/database/Database.php';
require 'C://Dev/Mangatheque/app/models/User.php';
require 'C://Dev/Mangatheque/app/models/Manga.php';
require 'C://Dev/Mangatheque/app/models/Collection.php';
session_start();


if($_SESSION['id_user']){
    $id_user = $_SESSION['id_user'];
    $user = new User($id_user);
    $name = $user->getName();
    $role = $user->isAdmin();
    $role = $role[0]['role'];
    include 'C://Dev/Mangatheque/pages/header.php';
    $instanceManga = new Manga();
    $allManga = $instanceManga->getMangas();
    

    $instanceCollection = new Collection($id_user);
    $allCollection = $instanceCollection->getCollection();
    $countCollection = count($allCollection);
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

    if($_POST['action'] === 'addCollection'){
        try{
            $addCollection = $instanceCollection->addCollection($_POST['id_user'], $_POST['id_manga'], $_POST['name'], trim($_POST['image']), $_POST['description']);
            header('Location: C://Dev/Mangatheque/app/controllers/Dashboard.php');
            exit;
        }catch(PDOException $e){
            if($e->getMessage() == "SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'image' at row 1"){
                $errors['update'] = "L'url de l'image est trop long";
            }else if($e->getMessage()){
                $errors['image'] = "Url de l'image non valide";
            }
            echo 'Erreur PDO : '.$e->getMessage();
            
            
        }
        
        
    }

    if($_POST['action'] === 'updateCollection'){
        
        try{
            $updateManga = $instanceCollection->updateCollection($_POST['idCollection'], $_POST['updateName'], trim($_POST['updateImage']), $_POST['updateDescription'] );
            header('Location: C://Dev/Mangatheque/app/controllers/Dashboard.php');
            exit;
        }catch(PDOException $e){
            if($e->getMessage() == "SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'image' at row 1"){
                $errors['update'] = "L'url de l'image est trop long";
            }
        }
    }

    if($_POST['action'] === 'deleteCollection'){
        if($_POST['confirmation'] == 'yes'){
            try{
                $deleteCollection = $instanceCollection->deleteCollection($_POST['idCollection']);
                header('Location: C://Dev/Mangatheque/app/controllers/Dashboard.php');
                exit;
            }catch(PDOException $e){
                $errors['delete'] = 'Une Erreur durant la suppression est survenue.';
            }
        }
    }
    include 'C://Dev/Mangatheque/pages/dashboard.php';
    
    
}else{
    header('Location: /app/controllers/Connexion.php');
    exit;
}

include 'C://Dev/Mangatheque/pages/footer.php';