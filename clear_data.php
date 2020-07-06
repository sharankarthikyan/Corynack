<?php

session_start();

require 'dbconnect.php';
   
$sql = "DELETE FROM scores";
if ($scon->query($sql) === TRUE) {
    echo "Record deleted successfully";
}
sleep(5);
header('Location: adminpage.php');
exit;
?>
