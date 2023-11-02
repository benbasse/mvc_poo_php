<?php
if (isset($_POST['modify'])) 
{
    if (isset($_POST['contact_id'])) 
    {
        $contactId = $_POST['contact_id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $numeroTelephone = $_POST['numero_telephone'];
        $favori = $_POST['favori'];

        // Connectez-vous à la base de données et effectuez la mise à jour
        require_once("../model/classdb.php");
        require_once("../model/classContact.php");
        $db = new DataBase();
        $pdo = $db->connect();
        // $query = "UPDATE contact SET nom = :nom, prenom = :prenom, numero_telephone = :numero_telephone, favori = :favori WHERE id = :id";
        // $statement = $pdo->prepare($query);
        // $statement->bindParam(':id', $contactId);
        // $statement->bindParam(':nom', $nom);
        // $statement->bindParam(':prenom', $prenom);
        // $statement->bindParam(':numero_telephone', $numeroTelephone);
        // $statement->bindParam(':favori', $favori);
        // $result = $statement->execute();
        $result = new Contact();
        $result->updateContact($nom, $prenom, $numeroTelephone, $favori, $contactId);
    }
}
// Redirigez l'utilisateur vers la page de liste des contacts après la modification
header("Location: ../view/listeContact.php");
