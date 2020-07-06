<?php
 session_start();
 require 'dbconnect.php';
 
?>
<html>
    <head>
        <title>Corynack</title>
      <link rel="icon" type="image/png" href="icons/fire.png">
        <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title> View All Scores</title>
        <style>
            body{
                background: url("images/newbg4.jpg");  /*Library background*/
                background-size:auto;
                overflow-x: hidden;
            }
            .btn-space {
               margin-left: 75%;
            }
        </style>
    </head>
    <body class="container"><br>
        <div class="text-left">
            
        </div>
		<div class="text-right">
                <a href="clear_data.php"><button class="btn pull-right btn-danger">Clear Data</button></a>  
            </div>
    <?php
        $query = "SELECT * FROM scores";
        $res = mysqli_query($scon,$query);
        if(mysqli_num_rows($res)==0)  
        {
            echo "Nobody has taken the test so far :( ";
        }
        else
        {
            $html ="<h1><center>Scores obtained so far</center></h1>";
            $html.="<table border='1' class='table table-bordered table-active'>";
            $html.="<tr>"
                . "<th>User</th>"
                . "<th>MCQ Score</th>"
                . "<th>Problem 1</th>"
                . "<th>Problem 2</th>"
                . "<th>Problem 3</th>"
                . "<th>Program Total Score</th>"
                . "</tr>";
          /* For Loop for all entries */
            while($row = mysqli_fetch_assoc($res))
            {
              $html.="<tr>";
              $html.="<td>".$row["username"]."</td>";
              $html.="<td>".$row["score"]."%</td>";
                $html.="<td>".$row["prob1"]." points</td>";
                $html.="<td>".$row["prob2"]." points</td>";
                $html.="<td>".$row["prob3"]." points</td>";
              $html.="<td>".$row["progscore"]." points</td>";
              $html.="</tr>";
            }
         $html.="</table>";
         echo $html;
        }    
    ?>
		<button type="button" name="Export" class="btn btn-block btn-success" onclick="window.location.href = 'export.php'">Download</button>
    </body>
</html>