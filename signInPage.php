<?php
require "database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <h1>Sign in</h1><br>

    <?php include "head.php"; ?>
</head>

<body>
    <form action="signInPage.php" method="post">
        <label>username</label><br>
        <input type="text" name="signUsername"> <br>

        <label>password</label><br>
        <input type="password" name="signPassword"> <br>

        <input type="submit" value="Sign in">

        <a href="logInPage.php"> log in </a>
    </form>
</body>

</html>
<?php


if (isset($_POST["signUsername"])) {

    $stmtSelect->execute([$_POST["signUsername"]]);
    $userData = $stmtSelect->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        echo "already use name";
    } else {

        if (strlen($_POST["signUsername"]) > 1 && strlen($_POST["signPassword"] > 4)) {

            try {
                $stmtInsert->execute([$_POST["signUsername"], $_POST["signPassword"]]);

                $_SESSION['username'] = $_POST["signUsername"];
                $_SESSION['password'] = $_POST["signPassword"];
            } catch (PDOException $error) {
                echo $error;
            }
        }else {
            echo "username or password is inValid";
        };
    };
}

?>