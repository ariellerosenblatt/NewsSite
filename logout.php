<?php
//logout backend
session_start();
session_destroy(); //destroying session
header("Location: loginregister.php");
?>