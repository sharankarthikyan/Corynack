<?php
session_start();
require "dbconnect.php";
if(isset($_POST['login']))
{
if ( isset($_SESSION['Users'])!="" ) 
    {
     header("Location: index1.php");
     exit;
    }
     $errMSG='';
     $name = $_POST['username'];
     $password = $_POST['password'];
    $hashPassword = hash('sha256',$password);
    if($name=="admin"&& $password=="password")
    {
        header("Location:adminlogin.php");
    }
    
    $res=mysqli_query($scon,"SELECT * FROM details WHERE username='$name'");
    $row=mysqli_fetch_array($res);
    $count = mysqli_num_rows($res);                
      if( $count == 1 && $row['password']==$password ) 
            {
             $_SESSION['Users'] = $row['username'];
             header("Location: index1.php");
            } 
            else 
            {
             $errMSG = "Invalid data. Check credentials. <br>";
            }                
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Corynack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" href="icons/fire.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/w3-grey.css">
    <link rel="stylesheet" href="css/index11.css">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
    <style>
        #rotate3D {
    color: white;
    margin-top: 15px;
    margin-bottom: 15px;
        }

</style>
</head>
<body onload="rotateYDIV()" style="overflow:auto;">
    <div class="background">
        <div class="top w3-round-xlarge w3-white w3-row">
            <div class="left w3-card w3-third w3-white w3-center">
                <span class="headerfont w3-text-red"><centre>Login Now</centre></span>
                <hr>
                <br>
                <br>
                <br>
                <div class="form" style="height:80%; top:-13px; position:relative;">
                    <form action="index.php" method="post">
                        <div class="w3-card w3-padding" style="width:90%; margin-left:5%;">
                        <img src="icons/user.png" class="female w3-circle" style="width:30%;">
                        <img src="icons/user female.png" class="female w3-circle" style="width:30%;">
                        </div>
                        <br>
                        <br>
                        <br>
                        <!---  <div class="w3-margin-bottom w3-margin-left" style="text-align:left; margin: 0 auto 0 0;">Enter Username</div>-->
                        <input class="w3-input w3-card w3-border w3-round w3-margin-bottom" style="width:90%; margin-left:5%;" type="text" name="username" placeholder="Username">
                        
                        <input class="w3-input w3-card w3-border w3-round w3-margin-bottom" style="width:90%; margin-left:5%;" type="password" name="password" placeholder="Password" required>
                        
                        <br>
                        
                        <centre>
                            <button class="w3-button w3-red w3-round w3-margin-top" type="submit" name="login">
                                <img src="icons/login.png" style="width:20px;"> Login
                            </button>
                        </centre>
                        <div class="w3-text-blue">
                            <?php if(isset($errMSG)) echo $errMSG; ?>
                        </div>
                        
                        <br>
                        <br>
                                       
                        <div class="w3-right w3-padding" style="margin-top:20px;"><img src="icons/bulb.png" style="width:22px;"><span> Department of</span><span class="w3-text-red"> CSE</span></div>
                    </form>
                
                
                </div>
            </div>
            <div class="right w3-twothird" style="height:100%;">
                <div class="topright w3-bar w3-padding">
                        <div class="w3-right" id="head">
                            <span class="w3-text-black" style="position:relative; top:2px;"> St. Joseph's College of Engineering</span> <span class="w3-text-purple"><b>|</b></span> <span class="w3-text-blue " style="position:relative; top:2px; font-size:21px;">CORYNACK </span><img src="icons/code.png">
                        </div>
                </div>
                
                    <div onpageshow="rotateYDIV()" id="rotate3D" style="display:inline-block; margin-left:5%;" class="w3-center">
                        <img src="logo.jpg" style="width:130px;height:130px;padding-bottom:0px;">
                        
                    </div>
                
                <iframe src="lol.html" class="w3-round-large" style="width:90%; height:58%;" scrolling="no">          
                </iframe>
            </div>
        </div>
    </div>
<script>
var x,y,n=0,ny=0,rotINT,rotYINT
function rotateYDIV()
{
y=document.getElementById("rotate3D")
clearInterval(rotYINT)
rotYINT=setInterval("startYRotate()",10)
}
function startYRotate()
{
ny=ny+1
y.style.transform="rotateY(" + ny + "deg)"
y.style.webkitTransform="rotateY(" + ny + "deg)"
y.style.OTransform="rotateY(" + ny + "deg)"
y.style.MozTransform="rotateY(" + ny + "deg)"

}
</script>
</body>
</html>