<?php

namespace Model;

class Article extends Model{

    public function IncrementView($id_article, $id_utilisateur){

        $sql = "INSERT INTO vues (id_article, id_utilisateur) VALUES (:id_article, :id_utilisateur)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
        $result->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);

        $result->execute();

        $sql2 = "SELECT COUNT(id) FROM vues WHERE id_article = :id_article";
        $result2 = $this->pdo->prepare($sql2);
        $result2->bindValue(':id_article',$id_article,\PDO::PARAM_INT);

        $result2->execute();

        $vues = $result2->fetchAll();
        var_dump($vues);

        $sql3 = "UPDATE articles SET vues = :vues WHERE id = :id_article";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':vues', $vues[0]['COUNT(id)'], \PDO::PARAM_STR);
        $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
        
        $result3->execute();
        

    }

}
?>