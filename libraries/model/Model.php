<?php
namespace Model;

require_once('../config/bdd.php');

class Model{
    //à revoir les attributs
    protected $pdo = 'NULL';

    public function __construct() //Connexion bdd
    {
        $this->pdo = connect();
    }

    protected function genericSelect($nomTable){
        $sql = "SELECT * FROM '. $nomTable .'";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        // FetchAll ou While->Fetch
    }

    // protected update
    // protected delete
    //















}
?>