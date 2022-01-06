<?php

class User
{
    public function __construct(int $id_user){
        $this->id_user = $id_user;
    }
    public function getName(){
        $database = new Database();
        $sql = 'SELECT pseudo FROM users WHERE ID = :ID';
        $det = $database->select($sql, ['ID'=>$this->id_user]);
        $name = $det[0]['pseudo'];
        
        return $name;
    }

    public function isAdmin(){
        $database = new Database();
        $sql = 'SELECT role FROM users WHERE ID = :ID';
        $det = $database->select($sql, ['ID'=>$this->id_user]);
        return $det;
    }

    public function getUsers(){
        $database = new Database();
        $sql = 'SELECT ID, pseudo, email, datebirth, role FROM users';
        $det = $database->select($sql);
        return $det;
    }

}