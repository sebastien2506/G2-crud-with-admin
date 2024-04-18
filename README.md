# G2-crud-with-admin

## Administration

- login : admin
- mdp : admin123

### Exercice 1

Dans `model/ourdatasModel.php` :

```php
// ajoutez avec une requête préparée la nouvelle data
function addOurdatas(PDO $db, 
                    string $titre, 
                    string $description, 
                    float $latitude,
                    float $longitude
                    ) : bool|string
{
    $connect = "INSERT INTO g2_crud (title,ourdesc,latitude,`longitude`) VALUES (?,?,?,?)";
     try {
        // on exécute la requête
        $p = $db->prepare($connect);
        $p->execute([$title,$ourdesc,$latitude,$longitude]);
        return true;
    } catch (Exception $e) {
        // sinon, on renvoie le message d'erreur
        return $e->getMessage();
                    }
}
``

Il faut une redirection si la donnée est insérée vers homepage de l'admin

if(isset($_POST['title'], $_POST['ourdesc'],$_POST['latitude'],$_POST['longitude'])){
    $valide = g2_crud($connect, $_POST['title'], $_POST['ourdesc'], $_POST['latitide'], $_POST['longitude']);
    $error = false;
    $message = "Merci le message à bien été réceptionné";
    if($valide !== true){
        $error = true;
        $message = "Le message n'a pas pu être envoyé";
           if(gettype($valide) === "string")
            $message = $valide;
}


Dans `view\private\admin.homepage.html.php`, créez le tableau avec les données réelles de la DB

 <?php foreach($g2_crud as $crud): ?>
                <td>$crud["idourdatas"]?</td>
                <td>$crud["title"]?</td>
                <td>$crud["ourdesc"]?</td>
                <td>$crud["longitude"]?</td>
                <td>$crud["altitude"]?</td>
                <td><img src="img/update.png" width="32" height="32" alt="update" /></td>
                <td><img src="img/delete.png" width="32" height="32" alt="delete" /></td>
 <?php endforeach; ?>

Bonus :

Pouvoir modifier une data en cliquant sur le bouton modifier (! + updateOurdatas).

Pouvoir supprimer une data en cliquant sur le bouton supprimer (! + deleteOurdatas) AVEC une confirmation avant de supprimer réellement.

