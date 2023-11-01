<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Enregistrement de Contacts</title>
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
        input[type="text"], input[type="tel"] {
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
        <h2>Enregistrement de Contact</h2>
        <form action="../controller/contact.php" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="numero_telephone">Numéro de Téléphone :</label>
                <input type="tel" id="numero_telephone" name="numero_telephone" required>
            </div>
            <div class="form-group">
                <label for="favori">Favori :</label>
                <select id="favori" name="favori">
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
            <button class="btn" type="submit" nam="enregister">Enregistrer le Contact</button>
        </form>
    </div>
</body>
</html>
