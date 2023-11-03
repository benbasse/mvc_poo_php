<?php
include_once("../model/classContact.php");
include_once("../model/classdb.php");
ini_set('display_errors', 'On');

class contactController 
{
    public function insertContact() 
    {
        if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["numero_telephone"]) && isset($_POST['favori'])) 
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $numero_telephone = $_POST['numero_telephone'];
            $favori = $_POST['favori'];
            $userContact = new Contact();
            $userContact->insertContact($nom, $prenom, $numero_telephone, $favori);
            header("location: ../view/listeContact.php");
        }
    }

}

$Usercontact = new contactController();
$Usercontact->insertContact();
?>
