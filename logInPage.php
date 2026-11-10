<?php
require "database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <h1>Log in</h1><br>

    <?php include "head.php"; ?>
</head>

<body>


    <form action="logInPage.php" method="post">


        <label>username</label><br>
        <input type="text" name="username"> <br>

        <label>password</label><br>
        <input type="password" name="password"> <br>

        <input type="submit" value="Log in">

        <a href="signInPage.php"> sign in </a>
    </form>
</body>

</html>

<?php

if (isset($_POST["username"])) {
    $stmtSelect->execute([$_POST["username"]]);
    $userData = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        if ($userData["username"] == $_POST["username"] && $userData["password"] == $_POST["password"]) {
            $_SESSION['username'] = $_POST["username"];
            $_SESSION['password'] = $_POST["password"];
            
            header("Location: " . "index.php");

            echo "login success";
        }else {
            echo "login fail wrong password";
        }
    }else {
        echo "login fail no user data";
    }
}
?>