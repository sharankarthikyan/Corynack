<?php
    session_start();
    require 'dbconnect.php';
    if (!isset($_SESSION['Users']) != "")
    {
        exit;
    }
    
    mysqli_query($scon, "TRUNCATE TABLE `prob3`");
    header("Location: adminpage.php");
 ?>