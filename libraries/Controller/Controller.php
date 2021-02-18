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
    // articles
    // protected $id_type;
    // protected $id_generation;
    // protected $id_gamme;
    // protected $id_marque;


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

        // $this->id_type;
        // $this->var ;
        // $this->id_gamme;
        // $this->id_marque;

    }
    
    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }

}

















?>