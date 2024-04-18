<?php
// Sélectionnez toutes les données
function getAllOurdatas(PDO $db): array|string
{
    $sql ="SELECT * FROM ourdatas ORDER BY idourdatas DESC;";
    try{
        $query = $db->query($sql);
        if($query->rowCount()===0) return "Pas encore de datas";
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;

    }catch(Exception $e){
        return ['error'=>$e->getMessage()];
    }
}

// ajoutez avec une requête préparée la nouvelle data
function addOurdatas(PDO $db, 
                    string $titre, 
                    string $description, 
                    float $latitude,
                    float $longitude
                    ) : bool|string
{
    // création d'une variable contenant la requête SQL préparée avec les ?
    $sql = "INSERT INTO `ourdatas` (`title`, `ourdesc`, `latitude`,`longitude`) 
            VALUES(?,?,?,?);";
    // préparation de la requête
    $prepare = $db->prepare($sql);

    try{
        $prepare->execute([$titre, $description, $latitude, $longitude]);
        $prepare->closeCursor();
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }

    
}