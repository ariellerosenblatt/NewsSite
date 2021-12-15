<!DOCTYPE html>
<!-- showing just your posts -->
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
      <li><a href="index.php">Home</a></li>
      <li><a href="addpost.php">Add Post</a></li>
      <li><a href="loginregister.php">Log Out</a></li>
      <li><a href="subscription.php">Find Friends!</a></li>
      <li class="active"><a href="yourposts.php">Your Posts</a></li>

    </ul>
  </div>
</nav>

<style>
    .box {
        /* width: 320px; */
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
session_start();
require "database.php";



?>
<div class = "header">
    <h2> Your Page </h2>
    <h6> Welcome to your own individualized page! See all your posts here! </h6>
</div>
<?php

$stmt = $mysqli->query("Select * from posts");
    while ($row = $stmt->fetch_assoc()) { //iterate through all rows in emails
        if ($row['username'] == $_SESSION['username']) {
            echo "<h3>" .$row['title']. "</h3>"; ?>
        <div class="boxarticle">
        <?php
        // echo "<b> Body: <br> </b>";
            echo $row['body']. "<br> <br> <br>";
        
            if (!$row['links']=="") {
                echo "<b> Link: <br> </b>";
                echo("<a href = '" . $row['links']."'>".$row['links']."</a><br>"); //printing link  
            } ?>
            </div>
        <a href="edit.php?id=<?=$row['id']?>">Edit Post</a>
        <br>
        <a href="update.php?id=<?=$row['id']?>">Delete Post</a>
        </br>

        <?php
        }
        
    }
    $commentDB = $mysqli->query("Select * from comments");
    $stmt->close();
?>
