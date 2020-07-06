<?php
 
 require 'taketestcpp.php';


 $NUMBER_OF_QUESTIONS_TO_BE_ASKED=10;
 
 // if session is not set this will redirect to login page
 if ( !isset($_SESSION['Users'])!="" ) 
{
	$user1=$_SESSION['Users'];
	exit;
}


//$_SESSION['start']=(date("i"));
//if($_SESSION['start'] > $_SESSION['end'] )
  // {
    //
      //  if($_POST['selectedOpt']==$_SESSION['questionObject']->rightChoice)
        // {
          //   $_SESSION['score']++;//right answer
         //}
        //header("Location: myscore.php");
   //}



if($NUMBER_OF_QUESTIONS_TO_BE_ASKED == $_SESSION['count']) {
  header("Location: myscore.php");
  exit;
 }
 
   $qnoCopy=0;  //Do get the question number out of scope
 //if alrdy set, increment the qestion number count
 if( isset($_SESSION['count']) ) 
   {
     if($_SESSION['count'] < $NUMBER_OF_QUESTIONS_TO_BE_ASKED && isset($_POST['submit']))
     {//echo $_SESSION['score'].'-'.$_POST['selectedOpt'].'-'.$_SESSION['questionObject']->rightChoice;
         if($_POST['selectedOpt']==$_SESSION['questionObject']->rightChoice)
         {
             $_SESSION['score']++;//right answer
         }
        $_SESSION['count']++; 
        //randomly generate a ques number
        while (TRUE)
        {
            $flag = 0;
            $qno = rand(1,50);
            //check if qno is asked earlier.. if not, then ask it.. 
            //else generate another qno whichs is not yet asked
            for($i=0 ; $i < count($_SESSION['questionNumbersAskedSoFar']) ; $i++)
            {
                if($qno == $_SESSION['questionNumbersAskedSoFar'][$i])
                {
                    $flag = 1;
                    break;
                }
            }
            if($flag==0)
            {
                $qnoCopy = $qno;
                array_push($_SESSION['questionNumbersAskedSoFar'], $qno);
                $_SESSION['questionObject'] = new FetchQuestion($qno,$scon);
                break;
            }
        }
      }
      
   }  
    header("Location: taketestcpp.php");
 ?>