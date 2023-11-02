<?php
require_once('../model/classdb.php');

class Contact 
{
    private $nom;
    private $prenom;
    private $numero_telephone;
    private $favori;
    private $id;
    // public function __construct($nom, $prenom, $numero_telephone, $favori) 
    // {
    //     $this->nom = $nom;
    //     $this->prenom = $prenom;
    //     $this->numero_telephone = $numero_telephone;
    //     $this->favori = $favori;
    //     // $this->id = $contactId;
    // }
// Function pour enregister un contact 
    public function insertContact($nom, $prenom, $numero_telephone, $favori) 
    {
        $db = new DataBase();
        $pdo = $db->connect();
        $query = "INSERT INTO contact (nom, prenom, numero_telephone, favori) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($query);
        $statement->execute([
            $this->nom = $nom, 
            $this->prenom = $prenom, 
            $this->numero_telephone = $numero_telephone, 
            $this->favori = $favori
        ]);
    }


// Function pour supprimer un contact
    public function deleteContact($id)
    {
        $db = new DataBase();
        $pdo = $db->connect();
        $query = "DELETE FROM contact WHERE id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([
            $this->id = $id
        ]);
    }
public function updateContact($id, $nom, $prenom, $numero_telephone, $favori){
    $db = new DataBase();
    $pdo = $db->connect();
    $query = "UPDATE contact SET nom = ?, prenom = ?, numero_telephone = ?, favori = ? WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([
        $this->nom = $nom,
        $this->prenom = $prenom,
        $this->numero_telephone = $numero_telephone,
        $this->favori = $favori,
        $this->id = $id
        ]);
}
}
?>
