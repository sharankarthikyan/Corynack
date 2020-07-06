<?php
 
 session_start(); //Setting the required sessions if not set already
 require 'dbconnect.php';
 require 'setsessionfortest.php';
 $NUMBER_OF_QUESTIONS_TO_BE_ASKED=10;
 $qnoCopy=0;
 $_SESSION['type']=1;
 //$_SESSION['start']=(date("i"));
 //if( $_SESSION['start'] > $_SESSION['end'] )
   //{
    
      // if($_POST['selectedOpt']==($_SESSION['questionObject']->rightChoice))
      //     {
        //       $_SESSION['score']++;//right answer
        // }
   //     header("Location: myscore.php");
   //}
 class FetchQuestion
   {
        function FetchQuestion($receivedQuesNumber, mysqli $scon)
        {
            $result = mysqli_query($scon,"SELECT * FROM questions WHERE qno=".$receivedQuesNumber);
            $quesRow = mysqli_fetch_array($result);
            $this->question = $quesRow['question'];
            $this->op1 = $quesRow['ans1'];
            $this->op2 = $quesRow['ans2'];
            $this->op3 = $quesRow['ans3'];
            $this->op4 = $quesRow['ans4'];
            $this->rightChoice = $quesRow['rightans'];
        }
   }

 // if session is not set this will redirect to login page

if($_SESSION['count'] == 1)
{
if(!isset($_POST['submit']))
      {
          if($_SESSION['count'] == 1)
          $qnoCopy = rand(1,50);
            array_push($_SESSION['questionNumbersAskedSoFar'], $qnoCopy);
          $_SESSION['questionObject'] = new FetchQuestion($qnoCopy,$scon);
      }
}
 ?>


<html>
    <head>
    <title>Corynack</title>
    <link rel="icon" type="image/png" href="icons/fire.png">
        <meta charset="UTF-8">
   <meta name="viewport" -content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <link href='css/w3.css' rel='stylesheet' type='text/css'>
    <link href='css/w3-theme-blue.css' rel='stylesheet' type='text/css'>
    <style>
    body{
            background-size:auto;
            text-align: center;
        }
    .dabba{
            height:100%;
            width:80%;
            display: inline-block;
            top:25px;
            position: relative;
            text-align: center;
    }
       </style>
    </head>
	<span id="countdown" class="timer"></span>
<body class="w3-theme-d5">
    
    <div class="dabba w3-theme-l2 w3-round-xlarge w3-margin-top">
            <div class="w3-margin-top"><centre class="w3-card w3-padding w3-round-large w3-theme-d1">Choose the right option</centre></div>    
        <br>
        <br>
    <div class="w3-white w3-margin-top" style="text-align:left; padding:20px 10px;">
       <b> <?php echo $_SESSION['count'].'.  ';?>  </b>
        <?php echo $_SESSION['questionObject']->question ;?>
    </div>
    <div class="w3-theme-l4 w3-round-xlarge w3-padding" style="width:100%; display: inline-block; margin-top: 5%;">
            <form id="lol" action="actions.php" method="POST">
                <input class="w3-left w3-margin-top" type="radio" name="selectedOpt" value="<?php echo $_SESSION['questionObject']->op1 ?>" required> <label class="w3-left w3-margin-left  w3-margin-top"><?php echo $_SESSION['questionObject']->op1 ?></label><br><br>
                <input class="w3-left w3-margin-top" type="radio" name="selectedOpt" value="<?php echo $_SESSION['questionObject']->op2 ?>" > <label class="w3-left w3-margin-left  w3-margin-top"><?php echo $_SESSION['questionObject']->op2 ?></label><br><br>
                <input class="w3-left w3-margin-top" type="radio" name="selectedOpt" value="<?php echo $_SESSION['questionObject']->op3 ?>"> <label class="w3-left w3-margin-left  w3-margin-top"><?php echo $_SESSION['questionObject']->op3 ?></label><br><br>
                <input class="w3-left w3-margin-top" type="radio" name="selectedOpt" value="<?php echo $_SESSION['questionObject']->op4 ?>">  <label class="w3-left w3-margin-left  w3-margin-top"><?php echo $_SESSION['questionObject']->op4 ?></label><br><br>
                <input class="w3-left w3-margin-top w3-btn w3-blue w3-round" type="submit" name="submit" value="Next">
            </form>
     
        </div>
        <br>
        <br>
        <br>
        <div id="divCounter" class="w3-pink w3-margin-top w3-padding w3-round-large w3-white"style="width:50%; height:50px; display: inline-block; margin-top: 5%;"></div>
    </div>
     <a href=myscore.php><div class="w3-btn w3-red w3-round w3-margin" style="position:fixed; top:4%">End Test</div></a> 
    <script type="text/javascript">
    if(localStorage.getItem("counter"))
    {
      if(localStorage.getItem("counter") <= 0)
      {
        //var value = 0;
          var value=90;
      }
      else
      {
          //var value=8;
        var value = localStorage.getItem("counter");
      }
    }   
    else
    {
        //var value=8;
        var value = 90;
        localStorage.setItem("counter", 90);
    }
    document.getElementById('divCounter').innerHTML = value;

    var counter = function (){
      if(value <= 0)
      { 
        localStorage.removeItem("counter");
        window.location="myscore.php";
          //localStorage.setItem("counter", 0);
        
      }
      else
      {
        value = parseInt(value)-1;
        localStorage.setItem("counter", value);
      }
      document.getElementById('divCounter').innerHTML = value;
    };

    var interval = setInterval(function (){counter();}, 1000);
  </script>   
</body>
</html>
