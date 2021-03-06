<?php

namespace Model {

    require_once("Model.php");

    class Inscription extends Model
    {
        public function insert($login, $cryptedpass, $email, $id_droits) //insertion dans la bdd
        {
            DEFINE('IMG_USER_START', 'https://www.labicok.com/wp-content/uploads/2020/04/default-user-image.png');
            $image = IMG_USER_START;

            $sql = "INSERT INTO utilisateurs (login, password, email, id_droits, image) VALUES (:login, :password, :email, :id_droits, :image)";
            $result = $this->pdo->prepare($sql);

            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password', $cryptedpass, \PDO::PARAM_STR);
            $result->bindvalue(':email', $email, \PDO::PARAM_STR);
            $result->bindvalue(':id_droits', $id_droits, \PDO::PARAM_INT);
            $result->bindvalue(':image', $image, \PDO::PARAM_STR);

            $result->execute();
        }
    }
}
