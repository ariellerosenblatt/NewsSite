<?php
//delete posts
require "database.php"; 
 $idd = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM posts WHERE id=?"); //deleting posts
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('i', $idd);

$stmt->execute();

$stmt->close();

header("Location: index.php");

?>

  