<?php
//Deleting comment
require "database.php"; 
 $idd = $_GET['id'];


$stmt = $mysqli->prepare("DELETE FROM comments WHERE comment_id=?"); //deleting comments 
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('i', $idd);

$stmt->execute();

$stmt->close();

header("Location: index.php");

?>

  