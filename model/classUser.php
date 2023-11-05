<?php
require_once("../model/classdb.php");

class UserModel {
// Function pour inserer un nouveau utilisateur dans la base de donnée
    public function insertUser($nom, $prenom) 
    {
        $db = new DataBase();
        $pdo = $db->connect();

        $sql = "INSERT INTO users (nom, prenom) VALUES (?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$nom, $prenom]);

        if ($statement->rowCount() === 1) 
        {
            return true;
        } else {
            return false;
        }
    }

}
?>
