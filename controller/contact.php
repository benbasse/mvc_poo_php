<?php
include_once("../model/classContact.php");
include_once("../model/classdb.php");

class contactController {
    public function insertContact() {
        if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["numero_telephone"]) && isset($_POST['favori'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $numero_telephone = $_POST['numero_telephone'];
            $favori = $_POST['favori'];
            $userContact = new Contact($nom, $prenom, $numero_telephone, $favori);
            
            if ($userContact->insertContact()) {
                echo "Insertion réussie";
                die();
            } else {
                echo "L'enregistrement n'a pas réussi";
            }
        }
    }
}

$Usercontact = new contactController();
$Usercontact->insertContact();
?>
