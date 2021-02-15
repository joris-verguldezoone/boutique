<?php

if(!isset($_SESSION)){ // on met des session la ou y'en a pas
    session_start();
}


/**
 * Chargement automatiques des instances de Class
 */
spl_autoload_register(function ($className)
{
    $className = str_replace("\\", "/", $className);

    require ("$className.php");
});