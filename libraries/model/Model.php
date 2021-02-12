<?php
namespace Model;

class Model{
    //à revoir les attributs
    protected $pdo = 'NULL';

    public function __construct() //Connexion bdd
    {

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