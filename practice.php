<?php
session_start();
$_SESSION['prob']=1;
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
        <link href="css/w3-theme-red.css" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
      <style>
           .invis{
               visibility: hidden;
               display: none;
           }       
      </style>
    </head>
    <body class="w3-theme-l5 (w3-theme-light)">

<div class="w3-container w3-mobile" style="padding:0;">
    <div class="w3-bar w3-theme-d4 w3-mobile" style="padding:0">
        <!----<a href="prog2.php"><div class="w3-left w3-padding" style="background: gray; position: absolute; z-index: 10;"><i class="fas fa-laptop-code"></i>  PROBLEMS </div></a>-->
        <div class="w3-dropdown-hover"><button class="w3-left w3-theme-d3 w3-padding w3-button w3-hover-red"><i class="fas fa-laptop-code"></i>  PROBLEMS </button>
            <div id="navbar" class="w3-dropdown-content w3-bar-block w3-card-4"  style="width: 69%; top: 38;">
                <a href="prob1.php" class="w3-bar-item w3-button w3-hover-deep-orange" style="height: 50px; padding-top: 15px;"><b>Statement 1</b> Number Cracker</a>
                <a href="prob2.php" class="w3-bar-item w3-button w3-hover-orange" style="height: 55px; padding-top: 15px;"><b>Statement 2</b> The Hourglass </a>
                <a href="prob3.php" class="w3-bar-item w3-button w3-hover-amber" style="height: 55px; padding-top: 15px;"><b>Statement 3</b> Book Cricket</a>
                <a href="practice.php" class="w3-bar-item w3-button w3-hover-yellow w3-center" style="height: 55px; padding-top: 15px;"><b>Practice</b></a>
              </div>
        </div>
        <a href="logout.php"><div class="w3-right w3-theme-d3 w3-padding w3-hover-red"><img src="https://image.freepik.com/free-icon/power_318-10548.jpg" class="w3-circle" style="height:24px; width:auto;" ></div></a>
        <a href="index1.php"><div class="w3-right w3-theme-d3 w3-padding w3-hover-red">HOME <i class="fas fa-home"></i></div></a>
     </div>
     <!---- BEginning of main window-->
     <div class="w3-cell-row w3-mobile w3-row-padding" style="padding:0;">
            <div class="w3-container w3-theme-l5 (w3-theme-light) w3-padding w3-cell w3-mobile" style="width: 70%; padding-bottom: 20px;">
                    <div class="w3-center w3-margin-left">
     <div class="w3-card-2 w3-theme-l3 w3-margin w3-round-large w3-center" style="width:97%;">
      <header class="w3-container w3-theme-d2 w3-margin-top w3-center w3-hover-border-red w3-border w3-round-large" style="border:none;">
      <h3><b> Code </b></h3>
      </header>
      <form action="compile.php" id="form" method="post" name="f2">
            <br>
            <div class="w3-container">
                  <button class="w3-div w3-theme-d4 w3-padding w3-round" style="border: none; margin-bottom: 7px;"><b>Choose Language</b></button>
            </div>

            <select class="w3-select w3-margin-left w3-border w3-border-red w3-round w3-margin-bottom" name="language" style="width:10%;">
                <option value="c">
                C
                </option>
                <option value="cpp">
                C++
                </option>
            </select>
            
            <br>

            <div class="w3-container w3-margin-top">
                  <button class="w3-div w3-theme-d4 w3-padding w3-round" style="border: none; margin-bottom: 7px;"><b>Write Your Code</b></button>
            </div>
        <textarea class="w3-margin-left w3-round w3-border-red" style="width: 60%; padding: 8px 8px;" id="autosaveprac" cols="50" name="code" rows="15" required spellcheck="false"></textarea>


            
            <br>

            <div class="w3-container w3-margin-top">
                        <button class="w3-div w3-theme-d4 w3-padding w3-round" style="border: none; margin-bottom: 7px;"><b>Input</b></button>
            </div>
      
            <textarea class="w3-border-red w3-round w3-margin-left" style="width: 60%; padding: 10px 10px;" cols="50" name="input" rows="3" spellcheck="false"></textarea>
                                          <br>
                                          <br>
                                    
                                    <input class="btn btn-success w3-btn w3-blue"  id="st" type="button" value="Compile and Run">             
         </form>     					
<br>

<div class="w3-container w3-margin-top">
<button class="w3-div w3-theme-d4 w3-padding w3-round" style="border: none; margin-bottom: 7px;"><b>Output</b></button>
</div>
<div class="w3-center">
    <textarea class="w3-border-red w3-round w3-margin-left" style="width: 80%; padding: 10px 10px;" cols="50" id='div' name="output" rows="5"></textarea>
</div>
<br>
<br>
<br>
</div>
</div>      
            </div>
     
                    
            <div class="w3-container w3-theme-l5 (w3-theme-light) w3-padding w3-cell w3-mobile" style="width: 30%;">
                    <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-hover-border-red w3-margin-bottom w3-hide-small w3-mobile" style="margin-top:20px;">
                            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright w3-hover-red">
                            <i class="fa fa-remove"></i>
                            </span>
                            <p class="w3-center"><strong><img src="icons/googleflip.png"> Keep Learning! <img src="icons/google.png"></strong></p>
                            <hr style="border-color: red;">
                            <p class="w3-center">Innovation never ceases to end.</p>
                            <p class="w3-center">Use the internet to stay up-to-date or to re-learn well know concepts. </p>
                            <p class="w3-center"></p>
                    </div>
                    <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-hover-border-red w3-theme-border w3-margin-bottom w3-hide-small w3-mobile" style="margin-top:25px;">
                            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright w3-mobile w3-hover-red">
                            <i class="fa fa-remove"></i>
                            </span>
                            <br>
                            <p class="w3-center"><strong><img src="icons/bulb.png"> Scoring and Resubmission <img src="icons/bulb.png"></strong></p>
                            <hr style="border-color: red;">
                            <p class="w3-center">Each problem consists of multiple test cases. Each satisfied test case carries 10 points.</p>
                            
                            <p class="w3-center">Resubmitted answers are only considered if their score is more than the previously submitted value.</p>
                            
                            <p class="w3-center">No penalties for retrying.</p>
                        
                    </div>
            </div>
     </div>

        </div>
<!-- Footer -->
<footer class="w3-container w3-theme-d5">
   <p>Powered by CSE Dept</p>
</footer>
<script>
                var textarea = document.querySelector("#autosaveprac");
                textarea.addEventListener('keydown', autosize);
                function autosize(){
                var el = this;
                setTimeout(function(){
                el.style.cssText = 'height:auto; padding:0';
                el.style.cssText = 'height:' + el.scrollHeight + 'px; width:60%;';
                },0);
                }
            </script>
            <script>     //save code on exiting progs page
                  window.onbeforeunload=function(){
                  localStorage.setItem('saveprac',document.getElementById('autosaveprac').value);
                  }
             </script>
                 
             <script>     //retaining code on re-enTering progs page
                   window.onload = function () {
                   document.getElementById('autosaveprac').value = localStorage.getItem('saveprac');
                  }
             </script>                    
             <script>               //running nu print panna
                 $(document).ready(function(){
                 $("#st").click(function(){
                         $("#div").html("Compiling...");
                 });
                 });
             </script> 
                                
             <script>			 //run panna
             $(document).ready(function(){
             $("#st").click(function(){
             // AJAX 
                     $.ajax({
                             type: "POST", 
                                     cache: false, 
                                     url: "compile.php",
                                     datatype: "html", 
                                     data: $('form').serialize(), 
                                     success: function(result) { 
             
                                                      
                                              $('#div').html(result);
                                                  }
                                              });
                                           });
                                           });
             </script>               				
                                 <script>
                                             //tab adjustment
                                           HTMLTextAreaElement.prototype.getCaretPosition = function () { //return the caret position of the textarea
                                           return this.selectionStart;
                                           };
                                           HTMLTextAreaElement.prototype.setCaretPosition = function (position) { //change the caret position of the textarea
                                           this.selectionStart = position;
                                           this.selectionEnd = position;
                                           this.focus();
                                           };
                                           HTMLTextAreaElement.prototype.hasSelection = function () { //if the textarea has selection then return true
                                           if (this.selectionStart == this.selectionEnd) {
                                              return false;
                                           } else {
                                              return true;
                                           }
                                           };
                                           HTMLTextAreaElement.prototype.getSelectedText = function () { //return the selection text
                                           return this.value.substring(this.selectionStart, this.selectionEnd);
                                           };
                                           HTMLTextAreaElement.prototype.setSelection = function (start, end) { //change the selection area of the textarea
                                           this.selectionStart = start;
                                           this.selectionEnd = end;
                                           this.focus();
                                           };
             
                                           var textarea = document.getElementsByTagName('textarea')[0]; 
             
                                           textarea.onkeydown = function(event) {
             
                                           //support tab on textarea
                                           if (event.keyCode == 9) { //tab was pressed
                                              var newCaretPosition;
                                              newCaretPosition = textarea.getCaretPosition() + "       ".length;
                                              textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "       " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                                              textarea.setCaretPosition(newCaretPosition);
                                              return false;
                                           }
                                           if(event.keyCode == 8){ //backspace
                                              if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                  var newCaretPosition;
                                                  newCaretPosition = textarea.getCaretPosition() - 3;
                                                  textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
                                                  textarea.setCaretPosition(newCaretPosition);
                                              }
                                           }
                                           if(event.keyCode == 37){ //left arrow
                                              var newCaretPosition;
                                              if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                  newCaretPosition = textarea.getCaretPosition() - 3;
                                                  textarea.setCaretPosition(newCaretPosition);
                                              }    
                                           }
                                           if(event.keyCode == 39){ //right arrow
                                              var newCaretPosition;
                                              if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
                                                  newCaretPosition = textarea.getCaretPosition() + 3;
                                                  textarea.setCaretPosition(newCaretPosition);
                                              }
                                           } 
                                           }
                                           </script>	
</body>
</html>