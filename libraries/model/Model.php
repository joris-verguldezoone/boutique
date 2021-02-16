<?php
namespace Model;

require_once($bdd);

class Model{
    //à revoir les attributs
    protected $pdo = 'NULL';

    public function __construct() //Connexion bdd
    {
        $this->pdo = connect();
    }
// GENRERIC SELECT
    public function selectAllWhere($nomTable,$colonne,$value){ // select * where value = value
        $sql = "SELECT * FROM $nomTable WHERE $colonne= ?";
        echo $sql;
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
// GENERIC INSERT
    public function insertOneValue($nomTable, $colonne, $value){
        $sql = "INSERT INTO $nomTable ($colonne) VALUES (?)";
        $result = $this->pdo->prepare($sql);
        $result->execute([$value]);
    }

    // protected update
    // protected delete
    //


}
?>