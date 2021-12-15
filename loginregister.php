<!DOCTYPE HTML>
<!-- opening page with login/register -->
<html lang="en">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.box{
  width:1500px; 
  border: solid .5px black;
  background:#add8e6; 
}
.box2{
  width:1500px; 
  border: solid .5px black;
  background:#deffe4; 
}
</style>
    <title> Registration </title>


<body>
<div class="box2">
    <div class="header">
        <h2> Register Here: </h2>
    </div>
    <?php
    
    if (isset($_GET['status'])) { //getting status to see if error
        echo("<p> ERROR! Error is " . $_GET['status'] . " </p>");
    }
            if (isset($_POST['reg_user'])) {
                echo("LOGIN WITH NEW USER LOGIN!");
            }
    

    ?>
    <!-- register form -->
    <form method="POST" action="register.php"> 
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username </label>
            <input type="text" name="regusername">
        </div>
        <br></br>

        <div class="input-group">
            <label>Password </label>
            <input type="password" name="password_1">
        </div>
        <br></br>

        <div class="input-group">
            <label>Confirm password </label>
            <input type="password" name="password_2">
        </div>
        <br></br>
        <div class="input-group">
            <input type="submit" class="btn" name="reg_user"></button> 
        </div>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <p>
        </p>

    </form>
    </div>

    <!-- existing/created user login form  -->
    <div class="box">
    <div class="header">
        <h2> Recently Created Users/Existing Users </h2>
    </div>

    <form method="POST" action="login.php">
        <?php include('errors.php');?>
        <div class="input-group">
            <label>Username      </label>
            <input type="text" name="loginusername">
        </div>
        <br></br>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <br></br>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user" value="login">Login</button>
        </div>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" /> 
        </p>
        </div>
            </form>
        <a href="guest.php?>" >or continue as guest...</a>
        <style>
            a:link {
            color: green;
            size: 60px;
            }
            </style>
</body>
</html>
