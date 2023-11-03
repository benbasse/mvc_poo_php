<?php
require_once('../model/classUser.php');

class UserController 
{
    public function insertUser() 
    {
        if (isset($_POST["nom"]) && isset($_POST["prenom"])) 
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $userModel = new UserModel();
            if ($userModel->insertUser($nom, $prenom)) 
            {
                echo 'Inscription réussie';
                die();
            } else {
                echo 'Échec de l\'inscription';
            }
        }
    }
}

$controller = new UserController();
$controller->insertUser();














