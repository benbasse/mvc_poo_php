<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['contact_id'])) {
        $contactId = $_POST['contact_id'];
        
        // Connectez-vous à la base de données et exécutez la requête DELETE pour supprimer le contact
        require_once("model/classdb.php");
        $db = new DataBase();
        $pdo = $db->connect();
        $query = "DELETE FROM contact WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $contactId);
        $result = $statement->execute();

        if ($result) {
            echo "Contact supprimé avec succès.";
        } else {
            echo "Échec de la suppression du contact.";
        }
    }
}
// Redirigez l'utilisateur vers la page de liste des contacts après la suppression
header("Location: contact.php");
?>
