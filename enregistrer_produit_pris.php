<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <title>Enregistrer un produit pris</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Enregistrer un produit pris</h2>
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
require_once "mise_a_jour_stocks.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_produit = $_POST['nom_produit'];
    $quantite = $_POST['quantite']; 
    try {
        $stmt = $pdo->prepare("SELECT quantite FROM stocks WHERE nom_produit = ?");
        $stmt->execute([$nom_produit]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $stock_actuel = $row["quantite"];

            if ($stock_actuel >= $quantite) {
                $insert_query = "INSERT INTO produits_pris (nom_produit, quantite) VALUES (?, ?)";
                $stmt = $pdo->prepare($insert_query);
                $stmt->execute([$nom_produit, $quantite]);

                mettreAJourStock($nom_produit, $quantite);

                echo "Produit pris enregistré avec succès. Stock mis à jour.";
            } else {
                echo "Stock insuffisant. Stock disponible : $stock_actuel";
            }
        } else {
            echo "Produit non trouvé dans le stock.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>