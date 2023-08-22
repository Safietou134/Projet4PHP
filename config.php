<?php
session_start();

try {
    
    $dsn = "mysql:host=localhost;dbname=projet4;charset=utf8";
    $username_db = "root";
    $password_db = "";
    
        $pdo = new PDO($dsn, $username_db, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
?>