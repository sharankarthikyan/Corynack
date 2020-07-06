<?php

session_start();
//Import the SDK 
$code             = $_POST["code"];
$input_case       = array();
$output_case      = array();
$trim_output_case = array();
$cases            = $_POST["cases"];
$input_case[0]    = $_POST["incase1"];
$input_case[1]    = $_POST["incase2"];
$input_case[2]    = $_POST["incase3"];
$output_case[0]   = $_POST["outcase1"];
$output_case[1]   = $_POST["outcase2"];
$output_case[2]   = $_POST["outcase3"];
$output           = array();
$trim_output      = array();
$x                = 0;
$_SESSION['pscore']= 0;

            switch($_POST["language"])
			{
				case "c":
				{   putenv("\bin");
				    for ($x = 0; $x < $cases; $x++)
                    {       
                            //echo trim($input_case[$x]);
                            $trim_output_case[$x] = trim($output_case[$x]);       
                            $input=trim($input_case[$x]);
                            $CC="gcc";
	                        $out="a.exe";                        
                            $filename_code="main.c";
	                        $filename_in="input.txt";
	                        $filename_error="error.txt";
	                        $executable="a.exe";
	                        $command=$CC." -lm ".$filename_code;	
	                        $command_error=$command." 2>".$filename_error;
	                       //if(trim($code)=="")
	                       //die("The code area is empty");
	                       $file_code=fopen($filename_code,"w+");
	                       fwrite($file_code,$code);
	                       fclose($file_code);
	                       $file_in=fopen($filename_in,"w+");
	                       fwrite($file_in,$input);
	                       fclose($file_in);
	                       exec("cacls  $executable /g everyone:f"); 
	                       exec("cacls  $filename_error /g everyone:f");	
	                       shell_exec($command_error);
	                       $error=file_get_contents($filename_error);

	                       if(trim($error)=="")
	                       {
		                      if(trim($input)=="")
		                      {
			                     $output[$x]=shell_exec($out);
		                      }
		                      else
		                      {
			                     $out=$out." < ".$filename_in;
			                     $output[$x]=shell_exec($out);
		                      }
		//echo "$output[$x]";
	                        }
	                        else if(!strpos($error,"error"))
                            {
		                      if(trim($input)=="")
                              {
			                     $output[$x]=shell_exec($out);
		                      }
		                      else
		                      {
                                 $out=$out." < ".$filename_in;
			                     $output[$x]=shell_exec($out);
		                      }
		//echo "$output[$x]";
                            }
	                           else
	                           {
		//echo "<pre>$error</pre>";
	                           }
	                           exec("del $filename_code");
                               exec("del *.o");
	                           exec("del *.txt");
	                           exec("del $executable");
                
                            $trim_output[$x] = trim($output[$x]);
                            if ($trim_output[$x] === $trim_output_case[$x])
                            {
                                $_SESSION['pscore'] = $_SESSION['pscore'] + 10;
                            } 
                        //echo $_SESSION['pscore'];
                        //echo "\n";
                        //echo $trim_output[$x];
                        //echo "\n";     
                        //echo    trim($input_case[$x]);
                        //echo    trim($output_case[$x]);
                        //echo    trim($trim_output[$x]);
                        //echo    $_SESSION['pscore'];
                    }
                 
                    header("Location: score.php");
					break;
                }
                case "cpp":
				{
                    putenv("\bin");
				    for ($x = 0; $x < $cases; $x++)
                    {       
                            //echo trim($input_case[$x]);
                            $trim_output_case[$x] = trim($output_case[$x]);       
                            $input=trim($input_case[$x]);
                            $CC="g++";
	                        $out="a.exe";                        
                            $filename_code="main.cpp";
	                        $filename_in="input.txt";
	                        $filename_error="error.txt";
	                        $executable="a.exe";
	                        $command=$CC." -lm ".$filename_code;	
	                        $command_error=$command." 2>".$filename_error;
	                       //if(trim($code)=="")
	                       //die("The code area is empty");
	                       $file_code=fopen($filename_code,"w+");
	                       fwrite($file_code,$code);
	                       fclose($file_code);
	                       $file_in=fopen($filename_in,"w+");
	                       fwrite($file_in,$input);
	                       fclose($file_in);
	                       exec("cacls  $executable /g everyone:f"); 
	                       exec("cacls  $filename_error /g everyone:f");	
	                       shell_exec($command_error);
	                       $error=file_get_contents($filename_error);

	                       if(trim($error)=="")
	                       {
		                      if(trim($input)=="")
		                      {
			                     $output[$x]=shell_exec($out);
		                      }
		                      else
		                      {
			                     $out=$out." < ".$filename_in;
			                     $output[$x]=shell_exec($out);
		                      }
		//echo "$output[$x]";
	                        }
	                        else if(!strpos($error,"error"))
                            {
		                      if(trim($input)=="")
                              {
			                     $output[$x]=shell_exec($out);
		                      }
		                      else
		                      {
                                 $out=$out." < ".$filename_in;
			                     $output[$x]=shell_exec($out);
		                      }
		//echo "$output[$x]";
                            }
	                           else
	                           {
		//echo "<pre>$error</pre>";
	                           }
	                           exec("del $filename_code");
                               exec("del *.o");
	                           exec("del *.txt");
	                           exec("del $executable");
                
                            $trim_output[$x] = trim($output[$x]);
                            if ($trim_output[$x] === $trim_output_case[$x])
                            {
                                $_SESSION['pscore'] = $_SESSION['pscore'] + 10;
                            } 
                        //echo $_SESSION['pscore'];
                        //echo "\n";
                        //echo $trim_output[$x];
                        //echo "\n";     
                        //echo    trim($input_case[$x]);
                        //echo    trim($output_case[$x]);
                        //echo    trim($trim_output[$x]);
                        //echo    $_SESSION['pscore'];
                    }
                 
                    header("Location: score.php");
					break;
                    
                }
                
            }
                    
				
            
?>