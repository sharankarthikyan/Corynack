<?php
session_start();
require 'dbconnect.php';
if (!isset($_SESSION['Users']) != "")
{
exit;
}
if (!isset($_SESSION['prob'])) {
    $_SESSION['prob'] = NULL;
}
if (!isset($name)) {
    $name = NULL;
}
if($_SESSION['prob']==1)    
    {
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
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$s   = $row['score'];
$pt  = $p1+$p2+$p3;
$us   = $row['username'];
if($p1==0)
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $_SESSION['pscore'] . "','" . $p2 . "','" . $p3 . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $_SESSION['pscore'] . "','" . $p2 . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query2); 

}
else if (($p1!=0) && ($_SESSION['pscore']>$p1))
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $_SESSION['pscore'] . "','" . $p2 . "','" . $p3 . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $_SESSION['pscore'] . "','" . $p2 . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query2); 
}
else if (($p1!=0) && ($_SESSION['pscore']<$p1))
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query); 
}
}
else //putham pudhu row set panradhuku
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $_SESSION['Users'] . "','0','" . $_SESSION['pscore'] . "','0','0','" . $_SESSION['pscore'] . "');";
mysqli_query($scon, $query);
}
unset($_SESSION['pscore']);
}
    elseif($_SESSION['prob']==2)
    {
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
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$s   = $row['score'];
$pt  = $p1+$p2+$p3;
$us   = $row['username'];
if($p2==0)
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $_SESSION['pscore'] . "','" . $p3 . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $_SESSION['pscore'] . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query2); 

}
else if (($p2!=0) && ($_SESSION['pscore']>$p2))
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $_SESSION['pscore'] . "','" . $p3 . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $_SESSION['pscore'] . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query2); 
}
else if (($p2!=0) && ($_SESSION['pscore']<$p2))
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query); 
}
}
else //putham pudhu row set panradhuku
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $_SESSION['Users'] . "','0','0','" . $_SESSION['pscore'] . "','0','" . $_SESSION['pscore'] . "');";
mysqli_query($scon, $query);
}
unset($_SESSION['pscore']);

    }
    elseif($_SESSION['prob']==3)
     {
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
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$s   = $row['score'];
$pt  = $p1+$p2+$p3;
$us   = $row['username'];
if($p3==0)
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $_SESSION['pscore'] . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $_SESSION['pscore'] . "','" . $pt . "');";
mysqli_query($scon, $query2); 

}
else if (($p3!=0) && ($_SESSION['pscore']>$p3))
{
$query1 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $_SESSION['pscore'] . "','0');";
mysqli_query($scon, $query1); 
$res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
$row  = mysqli_fetch_array($res);
$p1   = $row['prob1'];
$p2   = $row['prob2'];
$p3   = $row['prob3'];
$pt  = $p1+$p2+$p3;
$query2 = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $_SESSION['pscore'] . "','" . $pt . "');";
mysqli_query($scon, $query2); 
}
else if (($p3!=0) && ($_SESSION['pscore']<$p3))
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $us . "','" . $s . "','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $pt . "');";
mysqli_query($scon, $query); 
}
}
else //putham pudhu row set panradhuku
{
$query = "REPLACE INTO scores (username,score,prob1,prob2,prob3,progscore) VALUES('" . $_SESSION['Users'] . "','0','0','0','" . $_SESSION['pscore'] . "','" . $_SESSION['pscore'] . "');";
mysqli_query($scon, $query);
}
unset($_SESSION['pscore']);
    }
if($_SESSION['prob']==1)
        {
            $res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
            $row  = mysqli_fetch_array($res);
            $p1   = $row['prob1'];
            $_SESSION['currentscore']=$p1;
            
        }
        elseif($_SESSION['prob']==2)
        {
            $res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
            $row  = mysqli_fetch_array($res);
            $p1   = $row['prob2'];
            $_SESSION['currentscore']=$p1;
        }
        elseif($_SESSION['prob']==3)
        {
            $res  = mysqli_query($scon, "SELECT * FROM scores WHERE username='$name'");
            $row  = mysqli_fetch_array($res);
            $p1   = $row['prob3'];
            $_SESSION['currentscore']=$p1;
        }
unset($_SESSION['prob']);
?>