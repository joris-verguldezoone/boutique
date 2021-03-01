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
    public function selectAllWhere($nomTable,$colonne,$value)
    { // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

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
        var_dump($sql);
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
            $result = $this->pdo->prepare($sql);
            $result->execute([$value1,$value2,$value3]);
        }
        public function deleteOneWhereId($nomTable, $id){
            $sql = "DELETE FROM $nomTable WHERE id = :id";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
        }
    // GENERIC UPDATE 
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
    public function like($id_utilisateur, $element ,$likedislike){
        
        $existArticle = alreadyTakenCheck('likedislike','id',$id_article);
        // $existArticle = alreadyTakenCheck('likedislike','id',$id_commentaire);

        $sql = "INSERT INTO likedislike (id_article, id_utilisateur, like) VALUES (:id_article, :id_utilisateur, 1)";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
        $result->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);

        $result->execute();
        
        $sql2 = "INSERT INTO likedislike (id_article, id_utilisateur, like) VALUES (:id_article, :id_utilisateur, 1)";
        $result2 = $this->pdo->prepare($sql2);
        $result2->bindValue(':id_article',$id_article,\PDO::PARAM_INT);
        $result2->bindValue(':id_utilisateur',$id_utilisateur,\PDO::PARAM_INT);

        $result2->execute();

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