<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier Contacts</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 400px;
                margin: 0 auto;
                padding: 70px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            label {
                display: block;
                font-weight: bold;
            }

            input[type="text"],
            input[type="tel"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            label[for="favori"] {
                font-weight: normal;
            }

            select {
                width: 100%;
                padding: 10px;
            }

            .btn {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Modifier Contact</h2>
            <form action="../controller/modifier.php" method="post">
                <?php
                // require_once("../model/classContact.php");
                require_once("../model/classdb.php");
                $db = new DataBase();
                $pdo = $db->connect();
                $query = "SELECT * FROM contact WHERE id = ?";
                $statement = $pdo->prepare($query);
                $statement->execute(
                    [
                        $_POST['contact_id']
                    ]
                );
                $contact = $statement->fetch(PDO::FETCH_ASSOC); // fetch pour obtenir un seul enregistrement
                if ($contact) { // Vérifiez s'il y a un enregistrement
                    ?>
                    <div class="form-group">
                        <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $contact['nom']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $contact['prenom']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="numero_telephone">Numéro de Téléphone :</label>
                        <input type="tel" id="numero_telephone" name="numero_telephone"
                            value="<?php echo $contact['numero_telephone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="favori">Favori :</label>
                        <select id="favori" name="favori">
                            <option value="oui" <?php if ($contact["favori"] == 'oui')
                                echo 'selected'; ?>>Oui</option>
                            <option value="non" <?php if ($contact["favori"] == 'non')
                                echo 'selected'; ?>>Non</option>
                        </select>
                    </div>


                    <button class="btn" type="submit" name="modifier">Enregistrer les modifications</button>

                    <?php
                } else {
                    echo "Aucun contact trouvé.";
                }
                ?>
            </form>
        </div>
    </body>

</html>