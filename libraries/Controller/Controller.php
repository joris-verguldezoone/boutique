<?php

namespace Controller; // sisi le boss

Class Controller{ // spoiler il controlle tout
    
    protected $id;
    protected $nom = "";
    protected $prenom = "";
    protected $login = "";
    protected $email = "";
    protected $password = "";
    protected $id_droits;
    protected $anniversaire ="";
    protected $id_adresse = "";

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