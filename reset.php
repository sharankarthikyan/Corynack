<?php
    session_start();
    require 'dbconnect.php';
    
$query1   = mysqli_query($scon, "UPDATE details SET AandP='0' WHERE 1");
$query2   = mysqli_query($scon, "UPDATE details SET JAVA='0' WHERE 1");
$query3   = mysqli_query($scon, "UPDATE details SET CPP='0' WHERE 1");
if(($query1 && $query2 && $query3) === TRUE)
{
    echo "MCQ tests are enabled again";
}
header('Location: adminpage.php');
exit;
?>