<?php
//adding comment
session_start();
require("database.php");
$contents = $_POST['postCont'];
$postid = $_POST['id'];
$username = $_SESSION['username']; 
echo($username);
echo($contents);

$query = "INSERT INTO comments (post_id, content, username) VALUES (?, ?, ?)"; //inserting into comments table
error_reporting(E_ALL);

echo($postid);
if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param('iss', $_POST['id'], $_POST['postCont'], $_SESSION['username']); //binding parameters together
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
} else {
    echo "failed to insert data\n";
}



