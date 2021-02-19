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
    // public function selectOne($nomTable, $colonne, $value)
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



}
?>