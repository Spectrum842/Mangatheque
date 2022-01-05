<?php

    require 'app/models/config/config.php';
    require 'app/models/database/Database.php';
    require 'app/models/User.php';
    require 'app/models/Manga.php';
    session_start();

    if($_SESSION['id_user']){
        try{

            $user = new User($_SESSION['id_user']);
            $isAdmin = $user->isAdmin();
            $role = $isAdmin[0]['role'];
            $name = $user->getName();
            if($role === 'admin'){
                include 'pages/header.php';
                $users = $user->getUsers();
                $manga = new Manga();
                $mangas = $manga->getMangas();
                include 'pages/admin/admin.php';
    
                if( $_POST['action'] === 'addManga'){
                   
                    if($_POST['date_end'] === ''){
                        $date_end = NULL;
                    }
                    try{
                        $addManga = $manga->addManga($_POST['name'],$_POST['author'],$_POST['image'],$_POST['date_start'],$date_end,$_POST['type'],$_POST['category']);
                        header('Location: http://localhost:3000/app/controllers/admin/Admin.php?listUnknowManga.php');
                        exit;
                    }catch(PDOexception $e){
                        echo ' ERREUR'.$e->getMessage();
                    }
                }
    
                if( $_POST['action'] === 'deleteManga' && $_POST['confirmation'] === 'yes'){
                    try{
                        $deleteManga = $manga->deleteManga($_POST['idManga']);
                        header('Location: http://localhost:3000/app/controllers/admin/Admin.php?view=listManga');
                        exit;
                    }catch(PDOexception $e){
                        echo ' ERREUR'.$e->getMessage();
                    }
                }
    
                if($_GET['view']){
                    include 'pages/admin/'.$_GET['view'].'.php';
                    if($_GET['view'] === 'addManga'){
                        $unknowManga = $manga->getUnknowManga();
                        include 'pages/admin/listUnknowManga.php';
                        
                    }
                }
                include 'pages/footer.php';
               
            }else{
                header('Location: http://localhost:3000/app/controllers/Dashboard.php');
                exit;
            }
        }catch(PDOexception $e){
            echo 'Erreur PDO : '.$e->getMessage();
        }
        
    }else{
        header('Location: http://localhost:3000/app/controllers/Connexion.php');
        exit;
    }
    
    
    

    