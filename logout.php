<?php
session_start();
unset($_SESSION['UName']);session_unset();

// destroy the session
session_destroy();
header("location: login.php");

?>