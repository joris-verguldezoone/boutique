<?php

function connect()
{
    
    $pdo = new \PDO('mysql:host=localhost;dbname=boutique;charset=utf8', 'root', '' );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 
    return $pdo;
}
