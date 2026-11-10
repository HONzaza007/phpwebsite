<?php
$host = "localHost";
$dbname = "websitedb";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    echo "Database connected!";

    $stmtSelect = $pdo->prepare(
        "SELECT * FROM user Where username = ?"
    );

    $stmtInsert = $pdo->prepare(
        "INSERT INTO user (username, password)
        VALUES (?, ?)"
    );
} catch (PDOException $error) {
    echo $error;
}

?>