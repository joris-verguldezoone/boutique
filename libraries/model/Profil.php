<?php

namespace Model;

require_once("Model.php");

class Profil extends Model
{
    public function update($login, $password, $id)
    { //
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

    public function updateInfoPersonnel($id, $nom, $prenom, $anniversaire, $email)
    {
        $dateTime = new \DateTime();
        $dateTime = \DateTime::createFromFormat('d/m/Y', $anniversaire);

        $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, anniversaire = :anniversaire, email = :email WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id', $id, \PDO::PARAM_INT);
        $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
        $result->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
        $result->bindValue(':anniversaire', $anniversaire, \PDO::PARAM_STR);
        $result->bindValue(':email', $email, \PDO::PARAM_STR);
        $result->execute();


    }

    public function updateCarteBleu($type_carte, $titulaire, $numero, $code, $date)
    {

        $id_utilisateur = $_SESSION['utilisateur']['id'];

        $dateTime = new \DateTime();
        $dateTime = \DateTime::createFromFormat('d/m/Y', $date);

        $sql = "UPDATE carte_bleu SET type_carte = :type_carte, nom = :nom, numero = :numero, code = :code, date = :date WHERE id_utilisateur = :id_utilisateur";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_INT);
        $result->bindValue(':type_carte', $type_carte, \PDO::PARAM_STR);
        $result->bindValue(':titulaire', $titulaire, \PDO::PARAM_STR);
        $result->bindValue(':numero', $numero, \PDO::PARAM_INT);
        $result->bindValue(':code', $code, \PDO::PARAM_INT);
        $result->bindValue(':date', $date, \PDO::PARAM_STR);
        $result->execute();
    }

    public function InsertCarteBleu($type_carte, $titulaire, $numero, $code, $date)
    {

        $id_utilisateur = $_SESSION['utilisateur']['id'];

        $dateTime = new \DateTime();
        $dateTime = \DateTime::createFromFormat('d/m/Y', $date);

        $sql = "INSERT INTO carte_bleu (type_carte, titulaire, numero, code, date, id_utilisateur) VALUES (:type_carte, :titulaire, :numero, :code, :date, :id_utilisateur)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_INT);
        $result->bindValue(':type_carte', $type_carte, \PDO::PARAM_STR);
        $result->bindValue(':titulaire', $titulaire, \PDO::PARAM_STR);
        $result->bindValue(':numero', $numero, \PDO::PARAM_INT); // ?
        $result->bindValue(':code', $code, \PDO::PARAM_INT); // ?
        $result->bindValue(':date', $date, \PDO::PARAM_STR);
        $result->execute();

        var_dump($sql);
    }

    public function updateAdresse($nom, $prenom, $batiment, $rue, $code_postal, $ville, $pays, $info_sup, $telephone)
    {
        $sql = "UPDATE adresse SET nom = :nom, prenom = :prenom, batiment = :batiment, rue = :rue, code_postal = :code_postal, ville = :ville, pays = :pays, info_sup = :info_sup, telephone = :telephone";

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
        $result->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
        $result->bindValue(':batiment', $batiment, \PDO::PARAM_STR);
        $result->bindValue(':rue', $rue, \PDO::PARAM_STR);
        $result->bindValue(':code_postal', $code_postal, \PDO::PARAM_INT);
        $result->bindValue(':ville', $ville, \PDO::PARAM_STR);
        $result->bindValue(':pays', $pays, \PDO::PARAM_STR);
        $result->bindValue(':info_sup', $info_sup, \PDO::PARAM_STR);
        $result->bindValue(':telephone', $telephone, \PDO::PARAM_INT);
        $result->execute();

    }
    // id	id_utilisateur	batiment	rue	code_postal	pays	ville	info_sup	tel

public function adresseInsert($nom, $prenom,$batiment, $rue , $code_postal, $pays, $ville, $info_sup, $tel){
    $id_utilisateur = $_SESSION['utilisateur']['id'];

    $sql = "INSERT INTO adresse (id_utilisateur,nom, prenom, batiment, rue , code_postal, pays, ville , info_sup, tel) VALUES (:id_utilisateur ,:nom ,:prenom ,:batiment, :rue, :code_postal, :pays, :ville, :info_sup, :tel)";
    $result = $this->pdo->prepare($sql);
    $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_INT);
    $result->bindValue(':nom', $nom, \PDO::PARAM_STR);
    $result->bindValue(':prenom', $prenom, \PDO::PARAM_STR);
    $result->bindValue(':batiment', $batiment, \PDO::PARAM_STR);
    $result->bindValue(':rue', $rue, \PDO::PARAM_STR);
    $result->bindValue(':code_postal', $code_postal, \PDO::PARAM_INT);
    $result->bindValue(':pays', $pays, \PDO::PARAM_STR);
    $result->bindValue(':ville', $ville, \PDO::PARAM_STR);
    $result->bindValue(':info_sup', $info_sup, \PDO::PARAM_STR);
    $result->bindValue(':tel', $tel, \PDO::PARAM_INT);
    var_dump($sql);
    $result->execute();
}



}
