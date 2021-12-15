<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="loginregister.php">Make Account</a></li>
    </ul>
  </div>
</nav>

</body>
</html>
<style>
    .box {
        padding: 10px;
        border: 5px solid gray;
        margin: 0;
}
.boxarticle{
  width:1300; 
  background:#add8e6; 
}
    </style>
    
<?php
//Guest login
session_start();
require "database.php";

?>
<div class = "header">
    <h2> Home Page </h2>
</div>
<?php

// Check connection

error_reporting(E_ALL);

$stmt = $mysqli->query("Select * from posts");
?> 
    <?php
    while ($row = $stmt->fetch_assoc()) { //iterate through all rows in posts
        
        ?>
        <br> 
        <?php
        $rid = $row['id'];        
        echo "<h3>" .$row['title']. "</h3>";
        ?>
        <div class="boxarticle">
        <?php
        echo "<b> Body: <br> </b>";
        echo $row['body']. "<br> <br> <br>";
        
        if(!$row['links']=="")
        {
            echo "<b> Link: <br> </b>";
            echo("<a href = '" . $row['links']."'>".$row['links']."</a><br>");
        }
       ?>
        <?php

        $com = $mysqli->query("Select * from comments WHERE post_id=" . $rid); //getting rows from comments ?> 
        </div>

            <?php
        while ($row = $com->fetch_assoc()) { //comments
            echo "<br>" .$row['content'];
            echo "<b> -".$row['username']."</b> </b>";

           
        }
        //social media buttons:
?>

        <a
        href="http://www.facebook.com/sharer.php?u=http://www.pontikis.net"
        target="_blank"
        title="Click to share"><img src="https://1000logos.net/wp-content/uploads/2016/11/Facebook-logo.png"
        height="6%" width="4%">
        </a>

        <a
        href="http://twitter.com/share?text=An%20intersting%20blog&amp;url=http://www.pontikis.net"
        target="_blank"
        title="Click to post to Twitter"><img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/twitter_circle-512.png"
        height="4.2%" width=2.8%>
        </a>
        </div>
        <br>
        <?php
    }
    $stmt->close();
?>
    
<html>
  <head>
    <style>
      .button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: white;
        background-color: blue;
        border-radius: 6px;
        outline: none;
      }
      .button1 {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: white;
        background-color: green;
        border-radius: 6px;
        outline: none;
      }
    </style>
  </head>
  <body>
  <br>
  <br>
    <a class="button" href="addpost.php">Add Post</a>
    </br>
    </br>
  </body>
</html>

<?php
$mysqli->close();

?>

<html>
<head>
    <title> HOME </title>
</head>
<body>

<div class="content">
    <?php if (isset($_SESSION['success'])) : ?>

                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>

    <?php endif ?>

    <?php if (isset($_SESSION['username'])) : ?>
     <strong><?php //echo($_SESSION['username']);?></strong></p>
        <p> <a href="loginregister.php" style="color:red;">Want to make your own account?</a></p>
    <?php endif ?>
</div>

</body>
</html>