<?php
require_once "config.php";

$query_stocks = "SELECT nom_produit, quantite FROM stocks";
$stmt_stocks = $pdo->query($query_stocks);

$query_produits_pris = "SELECT nom_produit, quantite FROM produits_pris";
$stmt_produits_pris = $pdo->query($query_produits_pris);
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vérifier le stock</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2>Stock des produits</h2>
                <table class="table table-bordered">  
                    <tr>
                        <th>Nom du produit</th>
                        <th>Quantité en stock</th>
                    </tr>
                    <?php while ($row = $stmt_stocks->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['nom_produit']; ?></td>
                            <td><?php echo $row['quantite']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="col">
                <h2>Produits pris</h2>
                <table class="table table-bordered">  
                    <tr>
                        <th>Nom du produit</th>
                        <th>Quantité prise</th>
                    </tr>
                    <?php while ($row = $stmt_produits_pris->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['nom_produit']; ?></td>
                            <td><?php echo $row['quantite']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <p class="mt-3"><a href="session.php">Retour à la session</a></p>
    </div>
</body>
</html>
