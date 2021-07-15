<?php

namespace Model;


abstract class Model
{
    //à revoir les attributs
    protected $pdo = 'NULL';

    public function __construct()
    {
        $pdo = new \PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '');

        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $this->pdo = $pdo;

        return $pdo;
    }
    // GENRERIC SELECT
    public function selectOneColumn($nomTable, $colonne1)
    {
        $sql = "SELECT $colonne1 FROM $nomTable ORDER BY $colonne1 DESC";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function selectAllNom($nomTable) // on fetch que le 'nom' de la table
    {
        $sql = "SELECT * FROM $nomTable";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        while ($fetch = $result->fetch(\PDO::FETCH_ASSOC)) {

            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $i++;
        }
        return $tableau;
    }
    public function selectAll($nomTable) // on fetch que le 'nom' de la table
    {
        $sql = "SELECT * FROM $nomTable";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function selectAllWhereTwoValue($nomTable, $colonne, $colonne2, $value, $value2)
    {
        $sql = "SELECT * FROM $nomTable WHERE $colonne = :value AND $colonne2 = :value2";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value", $value);
        $result->bindValue(":value2", $value2);
        $result->execute();

        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function selectAllWhere($nomTable, $colonne, $value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function selectAllWhereFetchAll($nomTable, $colonne, $value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function FetchAllselectAllWhere($nomTable, $colonne, $value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function FetchAllselectAllWhereTypeAndBrandOrGamme($colonne, $colonne2, $value1, $value2)
    { // select * where value = value
        $sql = "SELECT * FROM articles WHERE $colonne= :value1 AND $colonne2 = :value2";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1, \PDO::PARAM_INT);
        $result->bindValue(":value2", $value2, \PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function alreadyTakenCheck($nomTable, $colonne, $value) // Est ce que l'utilisateur existe ? 
    {                              // si oui alors on need un new pseudo
        $sql = "SELECT $colonne FROM $nomTable WHERE $colonne = ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
    public function selectOne($nomTable, $colonne, $colonne2, $value)
    { // peut etre utilisé pour selection tous les articles d'un seul type
        // articles', '*', 'id',$id
        // SELECT * FROM articles WHERE id = id
        $sql = "SELECT $colonne FROM $nomTable WHERE $colonne2 = ? ";
        // var_dump($sql);
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function checkThreeValue($nomTable, $colonne, $colonne2, $colonne3, $value, $value2, $value3)
    {

        $sql = "SELECT $colonne, $colonne2 FROM $nomTable WHERE $colonne = :value AND $colonne2 = :value2 AND $colonne3 = :value3";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':value', $value);
        $result->bindValue(':value2', $value2);
        $result->bindValue(':value3', $value3);
        $result->execute();

        $fetch = $result->fetchAll();
        // echo json_encode($fetch);
        return $fetch;
    }
    // GENERIC INSERT
    public function insertOneValue($nomTable, $colonne, $value)
    {
        $sql = "INSERT INTO $nomTable ($colonne) VALUES (?)";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
    }
    public function insertTwoValue($nomTable, $colonne, $colonne2, $value1, $value2)
    {
        $sql = "INSERT INTO $nomTable ($colonne,$colonne2) VALUES (?, ?)";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value1, $value2]);
    }
    public function insertThreeValue($nomTable, $colonne1, $colonne2, $colonne3, $value1, $value2, $value3)
    {
        $sql = "INSERT INTO $nomTable ($colonne1,$colonne2,$colonne3) VALUES (?,?,?)";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value1, $value2, $value3]);
    }

    public function insertFourValue($nomTable, $colonne1, $colonne2, $colonne3, $colonne4, $value1, $value2, $value3, $value4)
    {
        $sql = "INSERT INTO $nomTable ($colonne1,$colonne2,$colonne3,$colonne4) VALUES (?,?,?,?)";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value1, $value2, $value3, $value4]);
    }
    public function deleteOneWhereId($nomTable, $id)
    {
        $sql = "DELETE FROM $nomTable WHERE id = :id";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':id', $id, \PDO::PARAM_INT);
        $result->execute();
    }
    public function deleteOneWhereValue($nomTable, $col, $value)
    {
        $sql = "DELETE FROM $nomTable WHERE $col = :value";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':value', $value, \PDO::PARAM_STR);
        $result->execute();
    }
    // GENERIC UPDATE 
    // utilisateurs', 'login','id', $login, $_SESSION['utilisateur']['id']
    public function updateOneValue($nomTable, $colonne1, $colonne2, $value1, $value2)
    {

        $sql = "UPDATE $nomTable SET $colonne1 = :value1 WHERE $colonne2= :value2";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1, \PDO::PARAM_STR);
        $result->bindValue(":value2", $value2, \PDO::PARAM_INT);
        $result->execute();
    }
    public function updateThreeValue($nomTable, $colonne1, $colonne2, $colonne3, $value1, $value2, $value3)
    { // STR
        $sql = "UPDATE $nomTable SET $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1, \PDO::PARAM_INT);
        $result->bindValue(":value2", $value2, \PDO::PARAM_STR);
        $result->bindValue(":value3", $value3, \PDO::PARAM_STR);
        $result->execute();
    }
    public function updateFourValueStr($nomTable, $colonne1, $colonne2, $colonne3, $colonne4, $value1, $value2, $value3, $value4)
    { // STR
        $sql = "UPDATE $nomTable SET  $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3, $colonne4 = :value4 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1, \PDO::PARAM_INT);
        $result->bindValue(":value2", $value2, \PDO::PARAM_STR);
        $result->bindValue(":value3", $value3, \PDO::PARAM_STR);
        $result->bindValue(":value4", $value4, \PDO::PARAM_STR);
        $result->execute();
    }
    public function updateFourValueInt($nomTable, $colonne1, $colonne2, $colonne3, $colonne4, $value1, $value2, $value3, $value4)
    { // INT
        $sql = "UPDATE $nomTable SET  $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3, $colonne4 = :value4 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1, \PDO::PARAM_INT);
        $result->bindValue(":value2", $value2, \PDO::PARAM_STR);
        $result->bindValue(":value3", $value3, \PDO::PARAM_INT);
        $result->bindValue(":value4", $value4, \PDO::PARAM_INT);
        $result->execute();
    }
    public function rowCount($nomTable, $col, $value)
    {
        $sql = "SELECT COUNT(*) FROM $nomTable WHERE $col = ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);

        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function fetchOneValueCol($table, $col, $value)
    {
        $sql = "SELECT * FROM $table WHERE $col = :value ";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':value', $value);
        $result->execute();
        $fetch = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function alreadyExist($table, $column, $value)
    {
        $query = $this->pdo->prepare('SELECT ' . $column . ' FROM ' . $table . ' WHERE ' . $column . ' = ?');
        $query->execute([$value]);

        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public function likeCheck($nomTable, $colonne1, $colonne2, $value1, $value2)
    {
        $sql = "SELECT * FROM $nomTable WHERE $colonne1 = :value1 AND $colonne2 = :value2 ";
        // var_dump($sql);
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1", $value1);
        $result->bindValue(":value2", $value2);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
    public function detectLike($id_utilisateur, $id_article)
    {
        $sql = "SELECT id FROM likey WHERE id_utilisateur = :id_utilisateur AND id_article = :id_article";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);
        $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function like($id_article, $id_utilisateur)
    {
        $modelLike = new \Model\Article();

        // var_dump($id_article);
        $existArticle = $modelLike->likeCheck('likey', 'id_article', 'id_utilisateur', $id_article, $id_utilisateur);
        // var_dump($existArticle);
        if (!$existArticle) {

            $sql = "INSERT INTO likey (id_article, id_utilisateur) VALUES (:id_article, :id_utilisateur)";
            $result = $this->pdo->prepare($sql);
            $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
            $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);

            $result->execute();
        } else {
            $sql = "DELETE FROM likey WHERE id_article = :id_article AND id_utilisateur = :id_utilisateur";
            $result = $this->pdo->prepare($sql);
            $result->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
            $result->bindValue(':id_utilisateur', $id_utilisateur, \PDO::PARAM_STR);

            $result->execute();
        }
        $sql3 = "SELECT COUNT(id) FROM likey WHERE id_article = :id_article";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        $result3->execute();

        $sumLike = $result3->fetchAll();

        $sql4 = "UPDATE articles SET likey = :likey WHERE id = :id_article";
        $result4 = $this->pdo->prepare($sql4);
        $result4->bindValue(':likey', $sumLike[0]['COUNT(id)'], \PDO::PARAM_STR);
        $result4->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        $result4->execute();

        return $sumLike;

        //     $sql2 = "SELECT COUNT(id) FROM vues WHERE id_article = :id_article";
        //     $result2 = $this->pdo->prepare($sql2);
        //     $result2->bindValue(':id_article',$id_article,\PDO::PARAM_INT);

        //     $result2->execute();

        //     $vues = $result2->fetchAll();
        //     var_dump($vues);

        //     $sql3 = "UPDATE articles SET vues = :vues WHERE id = :id_article";
        //     $result3 = $this->pdo->prepare($sql3);
        //     $result3->bindValue(':vues', $vues[0]['COUNT(id)'], \PDO::PARAM_STR);
        //     $result3->bindValue(':id_article', $id_article, \PDO::PARAM_INT);

        //     $result3->execute();
        // }
    }
    public function searchWord($word)
    {
        $keyword = htmlspecialchars($word);
        $sql = "SELECT * FROM articles WHERE LOCATE(:word, `titre`) OR LOCATE(:word, `description`)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":word", $keyword);
        $result->execute();
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function selectCount($table, $colonne, $value)
    {
        $sql = "SELECT COUNT(*) FROM $table WHERE $colonne = ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);

        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function multipleSelect($tab, $table, $colonne)
    {
        // tab c'est un tableau 
        if ($tab != null) {
            // je remplace les valeurs de tab par des ? pour les binder
            $in  = str_repeat('?,', count($tab) - 1) . '?';
            // je donne un tableau de ? 
            $sql = "SELECT * FROM $table WHERE $colonne IN ($in)";
            $result = $this->pdo->prepare($sql);
            // je donne le bind 
            $result->execute($tab);
            $data = $result->fetchAll();

            return $data;
        } else {
            return $data = "Ne correspond à aucun élément , il ne doit plus y avoir de stock ou l'article n'existe plus";
        }
    }
    public function insertNotif($id_google, $id_group, $name, $type)
    {
        $sql = "INSERT INTO notification (id_google, id_group, name, type) VALUES (:id_google, :id_group, :name, :type)";
        $result = $this->pdo->prepare($sql);

        $result->bindValue(":id_google", $id_google, \PDO::PARAM_STR);
        $result->bindValue(":id_group", $id_group, \PDO::PARAM_STR);
        $result->bindValue(":name", $name, \PDO::PARAM_STR);
        $result->bindValue(":type", $type, \PDO::PARAM_STR);
        var_dump($id_google);
        var_dump($id_group);
        var_dump($name);
        var_dump($type);
        $result->execute();
    }
}
