<?php

namespace Controller; // sisi le boss

Class Controller{ // spoiler il controlle tout
    protected $id;
    public $nom = "";
    public $prenom = "";
    public $login = "";
    public $email = "";
    public $password = "";
    public $id_droits;
    public $anniversaire ="";
    public $id_adresse = "";

    public function __construct()
    {
        $this->id;
        $this->nom = "";
        $this->prenom = "";
        $this->login = "";
        $this->email = "";
        $this->password = "";
        $this->id_droits;
        $this->anniversaire ="";
        $this->id_adresse = "";
    }
    
    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }

}

















?>