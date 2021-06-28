<?php

namespace Model;

require_once("Model.php");

class Connexion extends Model
{
    public function existenceCheck($login) // si l'utilisateur n'existe pas déjà return true
    {
        $sql = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        if ($fetch) {
            return true;
        } else {
            echo "Ce compte n'existe pas";
            return false;
        }
    }
    public function passwordVerifySql($login)
    {
        $sql = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function registerGoogleUser($id_google, $login, $image)
    { // ce sera l'image en mignature 

        $sql = "INSERT INTO utilisateurs_google (id_google, name, picture) VALUES (:id_google, :login, :picture)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_google', $id_google, \PDO::PARAM_STR);
        $result->bindValue(':login', $login, \PDO::PARAM_STR);
        $result->bindValue(':picture', $image, \PDO::PARAM_STR);
        $result->execute();
    }
}
