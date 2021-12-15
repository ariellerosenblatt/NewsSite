<?php 
//registration backend
session_start();
$regusername = "";
require "database.php"; 


if (isset($_POST['reg_user']))
{
    echo "LOGIN AGAIN WITH YOUR NEW USERNAME!";
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $regusername = $_POST['regusername'];
    
    if (empty($regusername)) //checking if places are empty 
    {
        array_push($errors, "username REQUIRED!");
        echo("username REQUIRED"); 
        header("Location: redirect.php");

        die();
    }
    if (empty($password_1))
    {
        array_push($errors, "PASSWORD REQUIRED!");
        echo("PASSWORD REQUIRED"); 
        header("Location: redirect.php");
        die();
    }
    if (empty($password_2))
    {
        array_push($errors, "CONFIRM PASSWORD REQUIRED!");
        echo("CONFIRM PASSWORD REQUIRED"); 
        header("Location: redirect.php");

        die();
    }
    if ($password_1 != $password_2)
    {
        array_push($errors, "PASSWORDS DON'T MATCH!");
        echo("PASSWORDS DON'T MATCH"); 
        header("Location: redirect.php");

        die(); 
    }


    $query = "Select * from users WHERE `username` = '" . $regusername . "';"; //looking to see if there is user
    $regusername = mysqli_real_escape_string($mysqli, $_POST['regusername']);
    $results = mysqli_query($mysqli, $query);
    

    if(mysqli_num_rows($results) > 0)
    {
        echo("regusername taken!");
        header("Location: redirect.php");
        die();
    }
    else //object doesnt exist (no rows)
    {
        $password = password_hash($password_1,PASSWORD_DEFAULT);  //hashing password
        $query = "INSERT INTO users(username, password) VALUES('$regusername', '$password')"; //inserting user info into database
        $results = mysqli_query($mysqli, $query);
        $_SESSION['regusername'] = $regusername;
        $_SESSION['username'] = $username; ?>
        <label> TRY LOGGING IN WITH NEW LOGIN! </label> 
        <?php
        echo "LOGIN AGAIN WITH YOUR NEW USERNAME!";
        ?>
        <p> <a href="loginregister.php" style="color:red;">Log Out</a></p>

        <?php
        header("location: loginregister.php");
        echo("USER LOGGED IN");
    }

   
}

?>