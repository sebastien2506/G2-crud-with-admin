<?php

/*
Connexion de l'administrateur
*/

function administratorConnect(PDO $connectDB, string $login, string $password): bool|string
{
    // récupération de tous les champs de la table administrator quand le username match : 
    $sql= "SELECT * FROM administrator WHERE username = ?";
    $prepare = $connectDB->prepare($sql);
    
    try{
        // on essaye de charger l'utilisateur
        $prepare->execute([$login]);
        // Si l'utilisateur n'existe pas, on s'arrête là
        if($prepare->rowCount()==0) return "Utilisateur inconnu";

        // l'utilisateur existe, on va vérifier son mot de passe
        // récupération des données
        $result = $prepare->fetch();

        // si le mot de passe entré est valide avec le mot de passe dans le base de donnée (créée avec password_hash())
        if(password_verify($password, $result['passwd'])){

            // création de la session valide
            $_SESSION['myID'] = session_id();
            $_SESSION['idadministrator '] = $result['idadministrator'];
            $_SESSION['login'] = $login;
            return true;
        }else{
            return false;
        }

    }catch(Exception $e){
        return $e->getMessage();
    }
    
}