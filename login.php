<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Connexion</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="motPasse" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="motPasse" name="motPasse" required>
            </div>
            <button type="submit" class="btn btn-secondary">Se Connecter</button>
        </form>
    </div>
</body>
</html>

<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $motPasse = $_POST["motPasse"];
  
        $stmt = $pdo->prepare("SELECT id, motPasse FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row["motPasse"];

            if (password_verify($motPasse, $hashedPassword)) {
                $_SESSION["user_id"] = $row["id"];
                header("Location: session.php");
                exit();
            } else {
                echo "Login failed. Invalid credentials.";
            }
        } else {
            echo "Login failed. Invalid credentials.";
        }
}
?>
