<?php
// Content of database.php

$mysqli = new mysqli('localhost', 'root', '18Arielle', 'newswebsite');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
}


?>