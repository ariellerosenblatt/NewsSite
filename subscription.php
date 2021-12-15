<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!DOCTYPE html>
<!-- subscription page (email with friends) -->
<html lang="en">
<head>
  <title>Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<style>
.box{
  width:500px; 
  border: solid .5px black;
  background:#add8e6; 
}
.boxborder{
  width:500px; 
  border: solid .5px black;
}
</style>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="addpost.php">Add Post</a></li>
      <li><a href="loginregister.php">Log Out</a></li>
      <li class="active"><a href="subscription.php">Find Friends!</a></li>
      <li><a href="yourposts.php">Your Posts</a></li>
    </ul>
  </div>
</nav>

<h2> <b> <u> Find some friends with common interests!</u> </b> </h2>
<h4> <b> Emails with usernames listed! Feel free to add yours below! </b> </h4>

</body>

</html>

<?php
session_start();
require "database.php";
$email = $_POST['email'];
$username = $_SESSION['username'];

?>
<?php
if ($_POST['submit'] == 'submit') {
    $query = "INSERT INTO emails (email, username) VALUES (?, ?)"; //inserting data into table
    error_reporting(E_ALL);

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ss', $_POST['email'], $_SESSION['username']);
        $stmt->execute();
    } else {
        // echo "failed to insert data\n";
    }
}

$stmt = $mysqli->query("Select * from emails");
    while ($row = $stmt->fetch_assoc()) { //iterate through all rows in emails
        ?> <br>
        <div class="box">
        <?php
        echo("<b> USER: </b>"); //printing users
        echo($row['username']);
        ?>
        </div>
        <?php
        ?>
        <div class="boxborder"> 
        <?php
        echo("<b> EMAIL: </b>"); //printing emails
        echo($row['email']);
        ?>
        </div>
        </br>
        <?php
    }

?>
<form method='POST'>
    <br>
    <p><label>Email</label><br />
    <input type='text' name='email'></p>
    <p><input type='submit' name='submit' value='submit'></p>

</form>

</body>
</html>

