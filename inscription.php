<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Inscription</h2>
        <form action="inscription.php" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="motPasse" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="motPasse" name="motPasse" required>
            </div>
            <button type="submit" class="btn btn-success">Valider</button>
        </form>
        <p class="mt-3">Déjà inscrit? <a href="login.php">Se connecter</a></p>
    </div>
</body>
</html>

<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $motPasse = password_hash($_POST["motPasse"], PASSWORD_DEFAULT);

    
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (login, motPasse) VALUES (?, ?)");
    $stmt->execute([$login, $motPasse]);
    echo "Inscription Réussie!";
}
?>
