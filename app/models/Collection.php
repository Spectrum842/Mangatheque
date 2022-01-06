<?php

class Collection
{
    public function __construct(int $id_user = null, int $id_manga = null){
        $this->id_user = $id_user;
        $this->id_manga = $id_manga;
    }

    public function getCollection(int $id){
        $db = new Database();
        $sql = "SELECT * FROM collection WHERE ID = :ID";
        $det = $db->select($sql, ['ID'=> $id]);
        
        return $det;
    }
    public function getAllCollection(){
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

    public function addCollection(int $id_user, int $id_manga, string $name, string $image, string $description){
        $db = new Database();
        $sql = "INSERT INTO `collection` (`ID`, `id_user`, `id_manga`, `name`, `image`, `description`) VALUES (NULL, :id_user, :id_manga, :name, :image, :description)";
        $det = $db->execute($sql, ['id_user' => $id_user, 'id_manga'=> $id_manga, 'name' => $name, 'image'=> $image, 'description' => $description]);
        return $det;
    }

    public function updateCollection(int $idCollection, string $name, string $image, string $description){
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