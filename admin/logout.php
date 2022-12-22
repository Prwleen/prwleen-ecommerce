<?php
session_start();
unset($_SESSION['username']);
header('location:http://localhost/Project/index1.php');
die();
?>