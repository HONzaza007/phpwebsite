<?php
require "database.php";
?>

<?php
    session_start();

    if (!isset($_SESSION['page'])) {
        $_SESSION['page'] = "LOGIN";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "index.php" method="post">
        <h1>
            <?php
            if (isset($_SESSION['username'])) {
                echo "login username " . $_SESSION['username'];
            }else {
                echo "no account";
            }
            ?>
        </h1>

        <a href="logInPage.php"> log in </a><br>
        <a href="signInPage.php"> sign in </a><br>
        
    </form>
</body>
</html>