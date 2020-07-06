<?php
session_start(); //Setting the required sessions if not set already
require 'dbconnect.php';

if (!isset($_SESSION['Users']) != "")
  {
    exit;
  }

//if session is not set already, redirect to home page
if (!isset($_SESSION['count']))
  {
    header("Location: index1.php");
  }
else
  {
    $percent = ($_SESSION['score'] / 10) * 100;
    $query   = mysqli_query($scon, "SELECT * FROM scores WHERE username='" . $_SESSION['Users'] . "'");
    
    if (!$query)    //row iruka illaya check
      {
        die('Error: ' . mysqli_error($con));
      }
    
    if (mysqli_num_rows($query) > 0) //already row exist aana change panradhuku
      {
        
        $name = $_SESSION['Users'];
        $res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
        $row  = mysqli_fetch_array($res);
        $ps   = $row['progscore'];
        $p1   = $row['prob1'];
        $p2   = $row['prob2'];
        $p3   = $row['prob3'];
        $total= $row['score'];
        $totalscore= $percent + $total;
      
        
        $query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $_SESSION['Users'] . "','" . $totalscore . "','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $ps . "');";
        mysqli_query($scon, $query);
        if($_SESSION['type']==1)
        {
        $query1 = "UPDATE details SET AandP='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
        elseif($_SESSION['type']==2)
        {
        $query1 = "UPDATE details SET CPP='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
        elseif($_SESSION['type']==3)
        {
        $query1 = "UPDATE details SET JAVA='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
        
      }
    else //putham pudhu row set panradhuku
      {
        
        $query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $_SESSION['Users'] . "','" . $percent . "','0','0','0','0');";
        mysqli_query($scon, $query);
        if($_SESSION['type']==1)
        {
        $query1 = "UPDATE details SET AandP='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
        elseif($_SESSION['type']==2)
        {
        $query1 = "UPDATE details SET CPP='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
        elseif($_SESSION['type']==3)
        {
        $query1 = "UPDATE details SET JAVA='1' WHERE username='" . $_SESSION['Users'] . "';";
        mysqli_query($scon, $query1);
        }
      }
    
  }
header("Location: index1.php");
?>

<?php

unset($_SESSION['score']);
unset($_SESSION['count']); //if its already set, unset it
unset($_SESSION['type']);
unset($_SESSION['totalNoOfQuestionsAvailableInDatabase']); //if its already set, unset it
unset($_SESSION['questionNumbersAskedSoFar']); //if its already set, unset it

?>

