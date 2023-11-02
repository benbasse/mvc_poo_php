<?php
if (isset($_POST['contact_id'])) {
    $contactId = $_POST['contact_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numeroTelephone = $_POST['numero_telephone'];
    $favori = $_POST['favori'];
    
    // Connectez-vous à la base de données et effectuez la mise à jour
    require_once("../model/classdb.php");
    $db = new DataBase();
    $pdo = $db->connect();
    $query = "UPDATE contact SET nom = :nom, prenom = :prenom, numero_telephone = :numero_telephone, favori = :favori WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $contactId);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':prenom', $prenom);
    $statement->bindParam(':numero_telephone', $numeroTelephone);
    $statement->bindParam(':favori', $favori);
    $result = $statement->execute();

    if ($result) {
        echo "Contact modifié avec succès.";
    } else {
        echo "Échec de la modification du contact.";
    }
}
// Redirigez l'utilisateur vers la page de liste des contacts après la modification
header("Location: liste_contacts.php");
?>
