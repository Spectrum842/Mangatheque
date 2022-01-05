<?php

class Manga
{
    public function getMangas(){
        $db = new Database();
        $sql = "SELECT * FROM manga";
        $det = $db->select($sql);

        return $det;
    }

    public function getManga($id){
        $db = new Database();
        $sql = "SELECT * FROM manga WHERE ID= :ID";
        $det = $db->select($sql, ['ID' => $id]);

        return $det;
    }

    public function getUnknowManga(){
        $db = new Database();
        $sql = "SELECT * FROM collection WHERE id_manga = 0";
        $det = $db->select($sql);
        return $det;
    }

    public function addManga($name, $author, $image, $date_start, $date_end, $type, $category){
        $db = new Database();
        $sql = "INSERT INTO `manga` (`ID`, `name`, `author`, `image`, `date_start`, `date_end`, `type`, `category`) VALUES (NULL, :name, :author, :image, :date_start, :date_end, :type, :category)";
        $det = $db->execute($sql, ['name'=>$name, 'author'=>$author, 'image'=>$image, 'date_start'=>$date_start, 'date_end'=>$date_end, 'type'=>$type, 'category'=>$category]);
        return $det;
    }

    public function deleteManga($id){
        $db = new Database();
        $sql = "DELETE FROM manga WHERE manga.ID = :ID";
        $det = $db->execute($sql, ['ID'=>$id]);
        return $det;
    }
    
    
}