<?php
 session_start();
 if (!isset($_SESSION['Users'])) { //if session is not set already, redirect to login page
  header("Location: index.php");
 }
 
  unset($_SESSION['Users']); //if its already set, unset and destroy the session and then redirect to the login page
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
  
 ?>