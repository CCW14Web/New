<?php
 /*Document   : Editexe.php
  Created on : 22/4/2014
  Author     : Sateesh
  Description: Edit user Backend Page
 */
session_start();

require_once 'include/connect.php';
require_once 'include/functions.php';

$msg = "";
$success = true;

$count=0;
$pass=  clean($_POST['pass']);
$cpass = clean($_POST['cpass']);

$email = clean($_POST['email']);


$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);





//echo $uid;
$user=$_SESSION['name'] ;

if($pass!=$cpass)
{
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	    Passwords Dont Match!!
	       </div>";
    
    //echo "error!!";
 // header("location:index.php");
    
}

 else {
   $insert="UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`password`=SHA('$cpass'),`email`='$email' where `username`='$user'";

   $result1 = mysql_query($insert)or die($success=false);
  
if($result1)
{
         $_SESSION['status'] = "<div id='sucessMsg' class='style'>
		You have Updated the profile
		 </div>";
         header('location:index.php');
        $login_insert="UPDATE table `login` SET `password` =SHA('$cpass')where username='$user'";
        $result = mysql_query($login_insert)or die($success=false);
    
}
 else {
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	     error .'$msg'.
	       </div>";
}
}







?>
