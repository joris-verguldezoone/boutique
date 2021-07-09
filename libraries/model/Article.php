<?php

namespace Model;

require_once($bdd);
require_once('Model.php');

class Article extends Model
{

    public function IncrementView($id_article, $id_utilisateur)
    {

        // var_dump($id_utilisateur);
        $sql = "INSERT INTO vues (id_article, id_utilisateur) VALUES (:id_article, :id_utilisateur)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);
        $result->execute();

        $sql2 = "SELECT COUNT(id) FROM vues WHERE id_article = :id_article";
        $result2 = $this->pdo->prepare($sql2);
        $result2->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        $result2->execute();

        $vues = $result2->fetchAll();
        // var_dump($vues);

        $sql3 = "UPDATE articles SET vues = :vues WHERE id = :id_article";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':vues', $vues[0]['COUNT(id)'], \PDO::PARAM_STR);
        $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        $result3->execute();
    }
    public function findFivePopularArticles()
    {

        $sql = "SELECT * FROM articles ORDER BY vues";
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
        while ($i <= 4) {
            $fetch = $result->fetch(\PDO::FETCH_ASSOC);

            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['titre'];
            $tableau[$i][] = $fetch['presentation'];
            $tableau[$i][] = $fetch['description'];
            $tableau[$i][] = $fetch['image'];
            $tableau[$i][] = $fetch['image_2'];
            $tableau[$i][] = $fetch['image_3'];
            $tableau[$i][] = $fetch['note'];
            $tableau[$i][] = $fetch['prix'];
            $tableau[$i][] = $fetch['id_utilisateur'];
            $tableau[$i][] = $fetch['id_type'];
            $tableau[$i][] = $fetch['id_gamme'];
            $tableau[$i][] = $fetch['id_marque'];
            $tableau[$i][] = $fetch['id_generation'];
            $tableau[$i][] = $fetch['promo'];
            $tableau[$i][] = $fetch['date'];
            $tableau[$i][] = $fetch['id_editeur'];

            $i++;
        }
        return $tableau;
    }
}
