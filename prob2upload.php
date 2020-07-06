<?php
 session_start();
  // if session is not set this will redirect to login page
 if(!isset($_SESSION['admin'])){
  header("Location: adminlogin.php");
  exit;
 }
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('dbconnect.php');
if(isset($_POST['Submit'])){
  $requiredFileType = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$requiredFileType)){
    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
    $Reader = new SpreadsheetReader($uploadFilePath);
    $totalSheet = count($Reader->sheets());
    echo "You have total ".$totalSheet." sheets".
    $html="<h1>Upload</h1><table border='1'>";
    $html.="<tr>"
            . "<th>Question</th>"
            . "<th>Input Constraints</th>"
            . "<th>Output Constraints</th>"
            . "<th>Sample input 1</th>"
            . "<th>Sample output 1</th>"
            . "<th>Sample input 2</th>"
            . "<th>Sample output 2</th>"
            . "<th>Case input 1</th>"
            . "<th>Case output 1</th>"
            . "<th>Case input 2</th>"
            . "<th>Case output 2</th>"
            . "<th>Case input 3</th>"
            . "<th>Case output 3</th>"
        . "<th>Problem Name</th>"
            . "</tr>";
    /* For Loop for all sheets */
    for($i=0;$i==0;$i++){
      $Reader->ChangeSheet($i);
      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $ques = isset($Row[0]) ? $Row[0] : '';
        $inc = isset($Row[1]) ? $Row[1] : '';
        $outc = isset($Row[2]) ? $Row[2] : '';
        $sin1 = isset($Row[3]) ? $Row[3] : '';
        $sou1 = isset($Row[4]) ? $Row[4] : '';
        $sin2 = isset($Row[5]) ? $Row[5] : '';
        $sou2 = isset($Row[6]) ? $Row[6] : '';
        $cin1 = isset($Row[7]) ? $Row[7] : '';
        $cou1 = isset($Row[8]) ? $Row[8] : '';
        $cin2 = isset($Row[9]) ? $Row[9] : '';
        $cou2 = isset($Row[10]) ? $Row[10] : '';
        $cin3 = isset($Row[11]) ? $Row[11] : '';
        $cou3 = isset($Row[12]) ? $Row[12] : '';
        $probname = isset($Row[13]) ? $Row[13] : '';
        $html.="<td>".$ques."</td>";
        $html.="<td>".$inc."</td>";
        $html.="<td>".$outc."</td>";
        $html.="<td>".$sin1."</td>";
        $html.="<td>".$sou1."</td>";
        $html.="<td>".$sin2."</td>";
        $html.="<td>".$sou2."</td>";
        $html.="<td>".$cin1."</td>";
        $html.="<td>".$cou1."</td>";
        $html.="<td>".$cin2."</td>";
        $html.="<td>".$cou2."</td>";
        $html.="<td>".$cin3."</td>";
        $html.="<td>".$cou3."</td>";
        $html.="<td>".$probname."</td>";
        $html.="</tr>";
        //" . $probname . "
        $query = "INSERT INTO prob2 (question,inc,outc,sin1,sou1,sin2,sou2,cin1,cou1,cin2,cou2,cin3,cou3,probname) VALUES('" . $ques . "','" . $inc . "','" . $outc . "','" . $sin1 . "','" . $sou1 . "','" . $sin2 . "','" . $sou2 . "','" . $cin1 . "','" . $cou1 . "','" . $cin2 . "','" . $cou2 . "','" . $cin3 . "','" . $cou3 . "','" . $probname . "')";
        //$query = "insert into prob1(question,inc,outc,sin1,sou1,sin2,sou2,cin1,cou1,cin2,cou2,cin3,cou3) "values('".$ques."','".$inc."','".$outc."','".$sin1."','".$sou1."','".$sin2."','".$sou2."','".$cin1."','".$cou1."','".$cin2"','".$cou2."','".$cin3."','".$cou3."')";
        //$mysqli->query($query);
        mysqli_query($scon,$query);
       }
    }
    $html.="</table>";
    echo $html;
    echo "<br />Data successfully inserted into dababase";
  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file. your file is of type ".$_FILES["file"]["type"]); 
  }
}
?>
<html>
    <head>
        <title>Upload</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
</html>