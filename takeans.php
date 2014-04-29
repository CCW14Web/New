<?php/*
  Document   : takeans.php
  Created on : 24/4/2014
  Author     : Cherry
  Description: Home Page
 */
?>
<?php
  session_start();//Session starting 
  require_once 'include/connect.php';
 if(isset( $_POST['values'])&& isset( $_POST['questionid']))
 {$ansid = $_POST['values'];
    $ques = $_SESSION['questionid'];
     $query2 =  mysql_query("SELECT * FROM questions where ID='$ques' ");
     $quer= mysql_fetch_array($query2);
     $survery= $quer['surveyid'];
  $insert="INSERT INTO `userresponses`(`surveryID`,`questionID`,`answer`)
       VALUES('$survery','$ques','$ansid')";

   $result1 = mysql_query($insert)or die($success=false);
   if($result1)
   {
       unset($_SESSION['questionid']);
       header('location:takesurvey.php');
   }
 }
  
?>