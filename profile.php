<?php
include_once("config.php");

session_start();
echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
?>
