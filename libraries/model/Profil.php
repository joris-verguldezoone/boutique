<?php

namespace Model {

    use Controller\Controller;

    require_once("Model.php");

    class Profil extends Model
    {
        public function update($login,$password,$id)
        { // :)
            var_dump($_SESSION['utilisateur']['id']);
            $id = $_SESSION['utilisateur']['id'];
            $sql = "UPDATE utilisateurs SET login = :login, password = :password WHERE id =:id";
            var_dump($sql);
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password', $password, \PDO::PARAM_STR);
            $result->bindvalue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
        }

        public function SelectDonnees(){

        }

        public function ArticlesBuy(){

        }

        public function WishList(){

        }

        public function NotesArticles(){

        }
    }
}
