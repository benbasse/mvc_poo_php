<?php
include_once("../model/classContact.php");
include_once("../model/classdb.php");
ini_set('display_errors', 'On');

class contactController 
{
    public function insertContact() 
    {
        if (empty($_POST["nom"]) && empty($_POST["prenom"]) && empty($_POST["numero_telephone"]))
        {
            echo "<p style = color:red>All fields are mandatory</p>";
        } 

        if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["numero_telephone"]) && isset($_POST['favori'])) 
        {
            // Les expresions réguliers
            $nom = htmlspecialchars($_POST['nom']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) 
            {
                echo "<p style = color:red>Only letters and white space allowed</p>";
                return;
            } 

            $prenom = htmlspecialchars($_POST['prenom']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) 
            {
                echo "<p style = color:red>Only letters and white space allowed</p>";
                return;
            } 

            $numero_telephone = htmlspecialchars($_POST['numero_telephone']);
            if (strlen($numero_telephone) < 9)
            {
                echo '<p style = color:red>Your number is incorrect</p>';
                return;
            } 

            if ($_POST['favori'] == 'oui' || $_POST['favori'] == 'non') 
            {
                $favori = $_POST['favori'];
            }

                $userContact = new Contact();
                $userContact->insertContact($nom, $prenom, $numero_telephone, $favori);
                header("location: ../view/listeContact.php");
            
        }
    }

}

$Usercontact = new contactController();
$Usercontact->insertContact();
