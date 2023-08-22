<?php
function mettreAJourStock($nom_produit, $quantite) {
    global $pdo;

    $update_query = "UPDATE stocks SET quantite = quantite - ? WHERE nom_produit = ?";
    $stmt = $pdo->prepare($update_query);
    $stmt->execute([$quantite, $nom_produit]);
}
?>
