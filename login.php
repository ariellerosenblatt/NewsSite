<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<?php
//login page (backend)
session_start();
$username = "";
require "database.php"; 
    $stmt = $mysqli->prepare("Select * from users"); //looking in user table

    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $username = mysqli_real_escape_string($mysqli, $_POST['loginusername']);
    $stmt->execute();
    $stmt->bind_result($id, $dbusername, $dbpassword);
    $password = $_POST['password'];
    $username = $_POST['loginusername'];

    if (empty($_POST['loginusername']) || empty($_POST['password'])  ) //if username or password is empty
    {
        echo("Field empty! Try again!");
        ?>
        <p> <a href="loginregister.php" style="color:red;">logout</a></p>
        <?php
    }
    while ($stmt->fetch()) { //iterate through all rows in users
        echo(" ");
        if ($username == $dbusername && password_verify($password, $dbpassword)) {
            echo("SUCCESSFUL MATCHING");
            $_SESSION['username'] = $username;
            $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
            header("Location: index.php");
        } else {
            echo("LOGIN FAILED! MAKE SURE PASSWORD AND USERNAME ARE CORRECTLY TYPED!");
        }
    }
    $stmt->close();






?>
