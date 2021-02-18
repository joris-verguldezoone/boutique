<?php

namespace Model {

    require_once("Model.php");

    class Inscription extends Model
    {
        public function insert($login, $cryptedpass, $email, $id_droits) //insertion dans la bdd
        {
            $sql = "INSERT INTO utilisateurs (login, password, email, id_droits) VALUES (:login, :password, :email, :id_droits)"; 
            $result = $this->pdo->prepare($sql);
    
            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password', $cryptedpass, \PDO::PARAM_STR);
            $result->bindvalue(':email', $email, \PDO::PARAM_STR);
            $result->bindvalue(':id_droits', $id_droits, \PDO::PARAM_INT);
    
            $result->execute();
            
        }
    }
}
