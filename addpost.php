<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!DOCTYPE html>
<html lang="en">
<style>
.boxarticle{
  width:1300px; 
	/* height:100px;   */
  /* border: solid .5px black; */
  background:#add8e6; 
}
    </style>
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
      <li class="active"><a href="addpost.php">Add Post</a></li>
      <li><a href="loginregister.php">Log Out</a></li>
      <li><a href="subscription.php">Find Friends!</a></li>
      <li><a href="yourposts.php">Your Posts</a></li>
    </ul>
  </div>
</nav>

<div class="boxarticle">
<form action='' method='post'>

    <p><label>Title</label><br />
    <input type='text' name='postTitle' value='<?php if (isset($error)) {echo $_POST['postTitle'];}?>'></p>

    <p><label>Content</label><br />
    <textarea name='postCont' cols='60' rows='10'><?php if (isset($error)) {echo $_POST['postCont'];
}?></textarea></p>

    <p><label>Link?</label><br />
    <textarea name='link' cols='30' rows='3'><?php echo "http://www."?></textarea></p>

    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    <p><input type='submit' name='submit' value='submit'></p>

</form>
</div>

<?php
//adding post
require("database.php");
session_start();
$title = $_POST['postTitle'];
$content = $_POST['postCont'];
$user = $_SESSION['username'];
$links = "";

$conn = new mysqli('localhost', 'root', '18Arielle', 'newswebsite');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['submit'] == 'submit') { //button pressed
    if ($title != '' && $content != '') { //not empty
        $sql = "INSERT INTO posts(title, body, username, links) VALUES ('" . $title . "', '" . $content . "', '" . $user . "', '" . $links . "')";

        if ($conn->query($sql) === true) { //success?
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "ERROR! Missing field!";
    }
}
$conn->close();

?>
<p> <a href="index.php" style="color:blue;">Go Back</a></p>
<p> <a href="loginregister.php" style="color:red;">Log Out</a></p>

</body>
</html>
