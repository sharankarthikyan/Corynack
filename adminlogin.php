<?php
     session_start();
     
     $PASSWORD= "password";
     $ADMINNAME= "admin";
    // it will never let you open login page if session is set
    if( isset($_SESSION['admin'])!="") 
    {
        header("Location: adminpage.php");
        exit;
    }
    $error = false;
    $enteredName="";
    if( isset($_POST['loginButton']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $enteredName = htmlspecialchars(strip_tags(trim($_POST['adminName'])));
  $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
  
  if(empty($enteredName))
  {
   $error = true;
   $adminNameError = "Please enter the Admin username";
  } 
  
  if(empty($pass))
  {
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) 
  { 
    if($PASSWORD==$pass && $ADMINNAME==$enteredName) 
    {
        $_SESSION['admin'] = "SET";
        header("Location: adminpage.php");
    } 
    else 
    {
        $errMSG = "Invalid data, Please try again...<br>";
    } 
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Corynack Admin Login</title>
    <link rel="icon" type="image/png" href="icons/fire.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-2.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="adminlogin.php" method="post">
                    <div class="text-danger">
                        <?php
                        if (isset($errMSG)) 
                        { echo $errMSG; }
                        ?></div>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="adminName" placeholder="User name" value="<?php echo $enteredName;?>">
                    </div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="loginButton" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
</body>
</html>