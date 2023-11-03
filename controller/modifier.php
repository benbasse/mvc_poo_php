<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['contact_id'])) 
    {

        $contactId = $_POST['contact_id'];
        // Les expresions réguliers
        $nom = htmlspecialchars($_POST['nom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) 
        {
            echo "<p style = color:red>Only letters and white space allowed</p>";
            return;
        }

        $prenom = htmlspecialchars($_POST['prenom']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $prenom)) 
        {
            echo "<p style = color:red>Only letters and white space allowed</p>";
            return;
        }

        $numeroTelephone = htmlspecialchars($_POST['numero_telephone']);
        if (strlen($numeroTelephone) < 9) 
        {
            echo "<p style = color:red>Your number is incorrect</p>";
            return;
        }

        if ($_POST['favori'] == 'oui' || $_POST['favori'] == 'non') 
        {
            $favori = $_POST['favori'];
        }

        // Connectez-vous à la base de données et effectuez la mise à jour
        require_once("../model/classdb.php");
        require_once("../model/classContact.php");
        $db = new DataBase();
        $pdo = $db->connect();
        $result = new Contact();
        $result->updateContact($contactId, $nom, $prenom, $numeroTelephone, $favori);
        // Redirigez l'utilisateur vers la page de liste des contacts après la modification
        header("Location: ../view/listeContact.php");
    }
}
