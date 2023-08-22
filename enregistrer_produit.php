<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Enregistrer un produit</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Enregistrer un produit</h2>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="nom_produit" class="form-label">Nom du produit:</label>
                        <input type="text" class="form-control" id="nom_produit" name="nom_produit" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité:</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
                <p class="mt-3"><a href="session.php">Retour à la session</a></p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once "config.php";  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_produit = $_POST["nom_produit"];
    $quantite = $_POST["quantite"];

    $stmt = $pdo->prepare("INSERT INTO stocks (nom_produit, quantite) VALUES (?, ?)");
    $stmt->execute([$nom_produit, $quantite]);
    echo "Enregistrement du produit Réussi!";
}
?>

