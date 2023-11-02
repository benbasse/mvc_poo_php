<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Liste des Contacts</h2>
        <?php
        require_once("../model/classContact.php");
        require_once("../model/classdb.php");

        $db = new DataBase();
        $pdo = $db->connect();
        $query = "SELECT * FROM contact";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($contacts) > 0) {
            echo "<table>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Numéro de Téléphone</th><th>Favori</th><th>Actions</th></tr>";
            foreach ($contacts as $contact) {
                echo "<tr>";
                echo "<td>" . $contact['nom'] . "</td>";
                echo "<td>" . $contact['prenom'] . "</td>";
                echo "<td>" . $contact['numero_telephone'] . "</td>";
                echo "<td>" . ($contact['favori'] == 1 ? "Oui" : "Non") . "</td>";
                echo "<td>";
                
                // Bouton pour la modification
                echo "<a href='modifier_contact.php?id=" . $contact['id'] . "'><button>Modifier</button></a>";
                
                // Bouton pour la suppression
                echo "<form method='post' action='supprimer_contact.php'>";
                echo "<input type='hidden' name='contact_id' value='" . $contact['id'] . "'>";
                echo "<button type='submit' name='delete'>Supprimer</button>";
                echo "</form>";
                
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun contact enregistré.";
        }
        ?>
    </div>
</body>
</html>
