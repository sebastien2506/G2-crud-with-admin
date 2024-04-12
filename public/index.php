<?php

// chargement du fichier de configuration
require_once('../config.php');

// Connexion
try{
    $connect = new PDO(
        DB_DRIVER.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_LOGIN,
        DB_MDP,
        [PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC]
);
}catch(Exception $e){
    die($e->getMessage());
}