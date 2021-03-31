<?php
namespace Model;

require_once($bdd);

abstract class Model{
    //à revoir les attributs
    protected $pdo = 'NULL';

    public function __construct() //Connexion bdd
    {
        $this->pdo = connect();
    }
// GENRERIC SELECT
    public function selectOneColumn($nomTable, $colonne1){
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
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){

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
    public function selectAllWhere($nomTable,$colonne,$value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function selectAllWhereFetchAll($nomTable,$colonne,$value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function FetchAllselectAllWhere($nomTable,$colonne,$value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();

        return $fetch;
    }
    public function FetchAllselectAllWhereTypeAndBrandOrGamme($colonne,$colonne2,$value1,$value2)
    { // select * where value = value
        $sql = "SELECT * FROM articles WHERE $colonne= :value1 AND $colonne2 = :value2";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1,\PDO::PARAM_INT);
        $result->bindValue(":value2",$value2,\PDO::PARAM_INT);
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
    public function selectOne($nomTable, $colonne,$colonne2, $value){ // peut etre utilisé pour selection tous les articles d'un seul type
        // articles', '*', 'id',$id
        // SELECT * FROM articles WHERE id = id
        $sql = "SELECT $colonne FROM $nomTable WHERE $colonne2 = ? ";
        // var_dump($sql);
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetchAll();
        return $fetch;    
    }
    // GENERIC INSERT
        public function insertOneValue($nomTable, $colonne, $value){
            $sql = "INSERT INTO $nomTable ($colonne) VALUES (?)";
            $result = $this->pdo->prepare($sql);
            $result->execute([$value]);
        }
        public function insertTwoValue($nomTable, $colonne,$colonne2, $value1, $value2){
            $sql = "INSERT INTO $nomTable ($colonne,$colonne2) VALUES (?, ?)";
            $result = $this->pdo->prepare($sql);
            $result->execute([$value1, $value2]);
        }
        public function insertThreeValue($nomTable,$colonne1,$colonne2,$colonne3,$value1,$value2,$value3){
            $sql = "INSERT INTO $nomTable ($colonne1,$colonne2,$colonne3) VALUES (?,?,?)";
            var_dump($sql);
            $result = $this->pdo->prepare($sql);
            $result->execute([$value1,$value2,$value3]);
        }

        public function insertFourValue($nomTable, $colonne1,$colonne2,$colonne3,$colonne4,$value1, $value2, $value3,$value4){
            $sql = "INSERT INTO $nomTable ($colonne1,$colonne2,$colonne3,$colonne4) VALUES (?,?,?,?)";
            var_dump($sql);
            $result = $this->pdo->prepare($sql);
            $result->execute([$value1,$value2,$value3,$value4]);
        }
        public function deleteOneWhereId($nomTable, $id){
            $sql = "DELETE FROM $nomTable WHERE id = :id";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
        }
    // GENERIC UPDATE 
    // utilisateurs', 'login','id', $login, $_SESSION['utilisateur']['id']
    public function updateOneValue($nomTable, $colonne1,$colonne2, $value1,$value2){
        
        $sql = "UPDATE $nomTable SET $colonne1 = :value1 WHERE $colonne2= :value2";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1,\PDO::PARAM_STR);  
        $result->bindValue(":value2",$value2,\PDO::PARAM_INT);  
        $result->execute();
        var_dump($sql);
    }
    public function updateThreeValue($nomTable,$colonne1,$colonne2,$colonne3,$value1,$value2,$value3){ // STR
        $sql = "UPDATE $nomTable SET $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1,\PDO::PARAM_INT);
        $result->bindValue(":value2",$value2,\PDO::PARAM_STR);
        $result->bindValue(":value3",$value3,\PDO::PARAM_STR);
        $result->execute();
    }
    public function updateFourValueStr($nomTable,$colonne1,$colonne2,$colonne3,$colonne4,$value1,$value2,$value3,$value4){ // STR
        $sql = "UPDATE $nomTable SET  $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3, $colonne4 = :value4 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1,\PDO::PARAM_INT);
        $result->bindValue(":value2",$value2,\PDO::PARAM_STR);
        $result->bindValue(":value3",$value3,\PDO::PARAM_STR);
        $result->bindValue(":value4",$value4,\PDO::PARAM_STR);
        $result->execute();
    }
    public function updateFourValueInt($nomTable,$colonne1,$colonne2,$colonne3,$colonne4,$value1,$value2,$value3,$value4){ // INT
        $sql = "UPDATE $nomTable SET  $colonne1 = :value1,$colonne2 = :value2,$colonne3 = :value3, $colonne4 = :value4 WHERE id= :value1";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1,\PDO::PARAM_INT);
        $result->bindValue(":value2",$value2,\PDO::PARAM_STR);
        $result->bindValue(":value3",$value3,\PDO::PARAM_INT);
        $result->bindValue(":value4",$value4,\PDO::PARAM_INT);
        $result->execute();
    }
    public function rowCount($nomTable, $value1, $value2){
        $sql ="SELECT COUNT(*) FROM $nomTable WHERE $value1 = ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value2]);
        
        $fetch = $result->fetchAll();
        return $fetch;  
    }
    public function likeCheck($nomTable, $colonne1, $colonne2,$value1, $value2){
        $sql = "SELECT * FROM $nomTable WHERE $colonne1 = :value1 AND $colonne2 = :value2 ";
        // var_dump($sql);
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":value1",$value1);
        $result->bindValue(":value2",$value2);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;

    }
    public function detectLike($id_utilisateur, $id_article){
        $sql = "SELECT id FROM likey WHERE id_utilisateur = :id_utilisateur AND id_article = :id_article";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_utilisateur', $id_utilisateur,\PDO::PARAM_INT);
        $result->bindValue(':id_article', $id_article,\PDO::PARAM_INT);

        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }
    public function like($id_article, $id_utilisateur){
        $modelLike = new \Model\Article();

        // var_dump($id_article);
        $existArticle = $modelLike->likeCheck('likey','id_article', 'id_utilisateur',$id_article, $id_utilisateur);
        // var_dump($existArticle);
        if(!$existArticle){

           $sql = "INSERT INTO likey (id_article, id_utilisateur) VALUES (:id_article, :id_utilisateur)";
            $result = $this->pdo->prepare($sql);
            $result->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
            $result->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);
    
            $result->execute();
        }
        else{
            $sql = "DELETE FROM likey WHERE id_article = :id_article AND id_utilisateur = :id_utilisateur";
            $result = $this->pdo->prepare($sql);
            $result->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
            $result->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);
    
            $result->execute();        
        }
        $sql3 = "SELECT COUNT(id) FROM likey WHERE id_article = :id_article";
        $result3 = $this->pdo->prepare($sql3);
        $result3->bindValue(':id_article',$id_article,\PDO::PARAM_INT);

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
}
?>