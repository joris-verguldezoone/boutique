<?php

namespace Model;

require_once('model.php');

class Commentaire extends model
{
    public function insertComment($titre, $contenu, $id_utilisateur, $id_article, $login)
    {

        $tz_object = new \DateTimeZone('Europe/Paris');

        $date = new \DateTime();
        $date->setTimezone($tz_object);
        $date = $date->format('Y-m-d H:i:s');

        $sql = "INSERT INTO commentaire (titre, contenu, id_utilisateur, id_article, login, date) VALUES (:titre, :contenu, :id_utilisateur, :id_article,:login ,:date)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":titre", $titre, \PDO::PARAM_STR);
        $result->bindValue(":contenu", $contenu, \PDO::PARAM_STR);
        $result->bindValue(":id_utilisateur", $id_utilisateur, \PDO::PARAM_STR);
        $result->bindValue(":id_article", $id_article, \PDO::PARAM_INT);
        $result->bindValue(":login", $login, \PDO::PARAM_STR);
        $result->bindValue(":date", $date, \PDO::PARAM_STR);

        $result->execute();
    }
    public function insertLike($id_utilisateur, $id_article, $id_commentaire)
    {
        $sql = "INSERT INTO likey (id_article, id_utilisateur, id_commentaire) VALUES (:id_article, :id_utilisateur, :id_commentaire )";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);
        $result->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_INT);

        $result->execute();

        $sql3 = "SELECT COUNT(id) FROM likey WHERE id_article = :id_article AND id_commentaire = :id_commentaire";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        $result3->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_INT);

        $result3->execute();

        $sumLike = $result3->fetchAll();

        $sql4 = "UPDATE commentaire SET sum_like = :likey WHERE id = :id_commentaire";
        $result4 = $this->pdo->prepare($sql4);
        $result4->bindValue(':likey', $sumLike[0]['COUNT(id)'], \PDO::PARAM_STR);
        $result4->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_INT);

        $result4->execute();

        return $sumLike;
    }
    public function deleteLike($id_utilisateur, $id_article, $id_commentaire)
    {
        $sql = "DELETE FROM likey WHERE id_article = :id_article AND id_commentaire = :id_commentaire AND id_utilisateur = :id_utilisateur";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        $result->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_STR);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);

        $result->execute();
        $sql3 = "SELECT COUNT(id) FROM likey WHERE id_article = :id_article AND id_commentaire = :id_commentaire";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        $result3->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_INT);

        $result3->execute();

        $sumLike = $result3->fetchAll();

        $sql4 = "UPDATE commentaire SET sum_like = :likey WHERE id = :id_commentaire";
        $result4 = $this->pdo->prepare($sql4);
        $result4->bindValue(':likey', $sumLike[0]['COUNT(id)'], \PDO::PARAM_STR);
        $result4->bindValue(':id_commentaire', $id_commentaire, \PDO::PARAM_INT);

        $result4->execute();

        return $sumLike;
    }
}
