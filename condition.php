<?php
session_start();
if ( !isset($_SESSION['Users'])!="" ) 
{
        header("Location: logout.php");
}
?>
<html>
   <head>
      <title>Corynack</title>
      <link rel="icon" type="image/png" href="icons/fire.png">
       <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="css/w3.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="css/font-awesome.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link href="css/all.css" rel="stylesheet">
      <link href="css/w3-theme-blue-grey.css" rel="stylesheet">
      <style>
         table {
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
         }
         td, th {
         border: 1px solid #dddddd;
         text-align: left;
         padding: 8px;
         }
         tr:nth-child(even) {
         background-color: #dddddd;
         }
      </style>
   </head>
   <body class="w3-theme-l5 (w3-theme-light)">
      <div class="w3-container w3-mobile" style="padding:0;">
      <div class="w3-bar w3-theme-d4 w3-mobile" style="padding:0">
          <a href="logout.php"><div class="w3-right w3-theme-d3 w3-padding w3-hover-blue"><img src="https://image.freepik.com/free-icon/power_318-10548.jpg" class="w3-circle" style="height:24px; width:auto;" ></div></a>
          <a href="index1.php">
            <div class="w3-left w3-theme-d3 w3-padding w3-hover-blue">HOME <i class="fas fa-home"></i></div>
         </a>
      </div>
      <!---- BEginning of main window-->
      <div class="w3-cell-row w3-mobile" style="padding:0;">
      <div class="w3-container w3-theme-l5 (w3-theme-light) w3-cell w3-mobile">
         <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3 w3-padding w3-mobile"  style="margin-top:20px;">
               <!-- Profile -->
               <div class="w3-card-2 w3-round w3-white w3-border w3-hover-border-blue w3-mobile">
                  <div class="w3-container w3-mobile">
                     <h4 class="w3-center">My Profile</h4>
                     <p class="w3-center"><img src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                     <hr>
                     <p><i class="fas fa-pencil-alt fa-fw w3-margin-right w3-text-theme"></i> <?php echo ($_SESSION['Users'])?></p>
                     <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Chennai, TN</p>
                     <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1998</p>
                  </div>
               </div>
               <br>
               <!-- Accordion -->
               <!-- Alert Box -->
               <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-hover-border-blue w3-theme-border w3-margin-bottom w3-hide-small w3-mobile">
                  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright w3-hover-blue">
                  <i class="fa fa-remove"></i>
                  </span>
                  <p class="w3-center"><strong><i class="w3-text-blue fas fa-laptop-code fa-2x"></i> Welcome! <i class="w3-text-blue fas fa-laptop-code fa-2x"></i></strong></p>
                  <hr style="border-color: blue;">
                  <p class="w3-center">This is a platform to develop your programming skills.</p>
               </div>
            </div>
            <div class="w3-container w3-theme-l5 (w3-theme-light) w3-cell w3-mobile" style="padding-top:10px;">
               <div class="w3-container w3-card-2 w3-white w3-round w3-margin w3-border w3-hover-border-blue w3-mobile" >
                  <br>      
                  <img src="http://wikiprogramming.org/wp-content/uploads/2015/05/c-logo.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                  <h2><b>C programming</b></h2><br>
                  <hr class="w3-clear">
          <table align="center"><br>
    
    <tr>
    <td><b>Test Name</b></td>
    <td>Arrays and Pointers </td>
  </tr>
   <tr>
    <td><b>Description</b></td>
    <td>This section contains questions from Arrays and Pointers</td>
  </tr>
  <tr>
    <td><b>Duration</b></td>
    <td><i>20 minutes</i></td>
  </tr>
  <tr>
    <td><b>Negative Marking</b></td>
    <td><b>NO</b></td>
  </tr>
</table>
        <p>Please DO NOT REFRESH the page.
<br><br>
Please DO NOT HIT BACK button.
<br><br>
Please DO NOT navigate out of the test window. Disable pop ups like anti-virus alert, messenger notification.
<br><br>
Use ONLY Mozilla Firefox / Chrome / Opera browsers without ad-wares which opens pop-up windows.
<br><br>
Incase power failure occurs or internet connectivity is not available, close the browser.<br> <br>Login after the connectivity resumes and click on the button to "RESUME TEST"</p>
                  <div class=" w3-row-padding w3-center" style="margin:0px 0px"><a href="taketest.php">
                     <div class=" w3-btn w3-theme-d1 w3-margin-bottom w3-red" style="width: 100px; margin:0px 150px; padding: 7px;"><b>Begin</b></div></a>
                  </div>
               </div>
            </div>
            <div class="w3-container w3-theme-l5 (w3-theme-light) w3-padding w3-cell w3-mobile" style="width: 40%;">
               <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-hover-border-blue w3-margin-bottom w3-hide-small w3-mobile" style="margin-top:20px;">
                  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright w3-hover-blue">
                  <i class="fa fa-remove"></i>
                  </span>
                  <p class="w3-center"><strong><img src="icons/googleflip.png"> Keep Learning! <img src="icons/google.png"></strong></p>
                  <hr style="border-color: blue;">
                  <p class="w3-center">Innovation never ceases to end.</p>
                  <p class="w3-center">Use the internet to stay up-to-date or to re-learn well know concepts. </p>
                  <p class="w3-center"></p>
               </div>
               <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-hover-border-blue w3-theme-border w3-margin-bottom w3-hide-small w3-mobile" style="margin-top:25px;">
                  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright w3-mobile w3-hover-blue">
                  <i class="fa fa-remove"></i>
                  </span>
                  <br>
                  <p class="w3-center"><strong><img src="icons/bulb.png"> Rules and Scoring <img src="icons/bulb.png"></strong></p>
                  <hr style="border-color: blue;">
                   <ol>
                  <p class="w3-center"><li>Each section consists of 10 MCQ type questions, individually worth 10 point for a total of 100 points.</li></p>
                  <p class="w3-center"><li>The section is timed and users will automatically be timed out after the set time limit.</li></p>
                  <p class="w3-center"><li>Each section can be attened only once.</li></p>
                       </ol>
               </div>
            </div>
         </div>
      </div>
          </div>
       </div>
       <br>
      <!-- Footer -->
      <footer class="w3-container w3-theme-d5">
         <p>Powered by the CSE Dept</p>
      </footer>
   </body>
</html>