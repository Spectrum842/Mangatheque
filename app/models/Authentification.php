<?php

class Authentification
{
    
    public function getUserId(string $email){
        $database = new Database();
        $sql = 'SELECT ID FROM users WHERE email = :email';
        $det = $database->select($sql, ['email'=>$email]);
        $id_user = $det[0]['ID'];
        
        return $id_user;
    }

    public function getPassword(int $id){
        $database = new Database();
        $sql = 'SELECT password FROM users WHERE ID = :ID';
        $det = $database->select($sql, ['ID'=>$id]);
        $password = $det[0]['password'];

        return $password;
    }

    public function addUser(string $email, string $password, string $pseudo, string $dateBirth, string $role = 'user'){
        $database = new Database();
        $sql = "INSERT INTO `users` (`ID`, `email`, `password`, `pseudo`, `datebirth`, `role`) VALUES (NULL, :email, :password, :pseudo, :dateBirth, :role)";
        $det = $database->execute($sql, ['email'=>$email, 'password' => $password, 'pseudo' => $pseudo, 'dateBirth' => $dateBirth, 'role'=> $role]);
        return $det;
    }

    public function getUsersInfo(){
        $database = new Database();
        $sql = "SELECT email, pseudo FROM users";
        $det = $database->select($sql);
        return $det;
    }

}
