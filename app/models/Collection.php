<?php

class Collection
{
    public function __construct($id_user, $id_manga = ''){
        $this->id_user = $id_user;
        $this->id_manga = $id_manga;
    }

    public function getCollection(){
        $db = new Database();
        if($this->id_manga != ''){
            $sql = "SELECT * FROM collection WHERE id_user = :id_user AND id_manga = :id_manga";
            $det = $db->select($sql, ['id_user'=> $this->id_user, 'id_manga'=> $this->id_manga]);
        }else{
            $sql = "SELECT * FROM collection WHERE id_user = :id_user";
            $det = $db->select($sql, ['id_user'=> $this->id_user]);
        }
        return $det;
    }

    public function addCollection($id_user, $id_manga, $name, $image, $description){
        $db = new Database();
        $sql = "INSERT INTO `collection` (`ID`, `id_user`, `id_manga`, `name`, `image`, `description`) VALUES (NULL, :id_user, :id_manga, :name, :image, :description)";
        $det = $db->execute($sql, ['id_user' => $id_user, 'id_manga'=> $id_manga, 'name' => $name, 'image'=> $image, 'description' => $description]);
        return $det;
    }

    public function updateCollection($idCollection, $name, $image, $description){
        $db = new Database();
        $sql = "UPDATE `collection` SET `name` = :name, `image` = :image, `description` = :description WHERE `collection`.`ID` = :ID";
        $det = $db->execute($sql, ['ID'=>$idCollection, 'name'=> $name, 'image' => $image, 'description' => $description ]);
        return $det;
    }

    public function deleteCollection($idCollection){
        $db = new Database();
        $sql = "DELETE FROM `collection` WHERE `collection`.`ID` = :ID";
         $det = $db->execute($sql, ['ID'=>$idCollection]);
         return $det;
    }
}