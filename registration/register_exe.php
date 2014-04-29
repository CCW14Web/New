<?php
 /*Document   : registration.php
  Created on : 22/4/2014
  Author     : Sateesh
  Description: Registration Page
 */
session_start();

require_once '../include/connect.php';
//require_once '../includes/PHPMailer_5.2.2/class.smtp.php';
require_once '../include/functions.php';
require_once('../phpmailer/class.phpmailer.php');
$msg = "";
$success = true;

$count=0;
$pass=  clean($_POST['pass']);
$cpass = clean($_POST['cpass']);
$user = clean($_POST['username']);
$email = clean($_POST['email']);
$contact = clean($_POST['scontactno']);
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);


$flatno = clean($_POST['flatno']);

$streetno = clean($_POST['roadname']);
$city= clean($_POST['town']);
$province = clean($_POST['state']);
$pincode = clean($_POST['pincode']);
$country = clean($_POST['country']);



//echo $uid;
$_SESSION['user']=$user ;
echo $_SESSION['user'];

//echo $user;

if($pass!=$cpass)
{
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	    Passwords Dont Match!!
	       </div>";
    
    //echo "error!!";
 // header("location:index.php");
    
}
else
{
$select="select username from users where username='$user'";
$resss=  mysql_query($select);
 if(mysql_num_rows($resss)>0)
{
  $success=false;
  $msg="user name exist";
    //echo $msg;
}
 else {
   $insert="INSERT INTO `users`(`firstname`,`lastname`,`birthdate`,`gender`,`username`,`password`,`email`,`phonenumber`,`flatno`,`streetno`,`city`,`province`, `country`, `zip`, `priority`  )
       VALUES('$fname','$lname','$dob','$gender','$user',SHA('$cpass'),'$email','$contact','$flatno','$streetno','$city','$province','$country','$pincode',2)";

   $result1 = mysql_query($insert)or die($success=false);
   
if($result1)
{
  
        $login_insert="INSERT INTO `login`(`username`, `password`, `priority`) VALUES('$user',SHA('$cpass'),2)";
        $result = mysql_query($login_insert)or die($success=false);
    
}
if($count==0)
{

//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/[\]/','',$body);
$body="Welcome to E-Survey";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "cherianjose07@gmail.com";  // GMAIL username
$mail->Password   = "cherryjose";            // GMAIL password

$mail->SetFrom("cherianjose07@gmail@gmail.com", 'E-Survey Online');

$mail->AddReplyTo("cherianjose07@gmail@gmail.com","E-Survey Online");

$mail->Subject    = "Welcome";

$mail->AltBody    = "Welcome to E-Survey"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress($address, "Welcome");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if (!$mail->Send()) {
//    $_SESSION['status'] = "<div id='errorMsg' class='style'>
//	     Message Couldnot be send to the Receiptent
//	       </div>";
    echo "mail not send";
} else {
//    $_SESSION['status'] = "<div id='sucessMsg' class='style'>
//		 Mail send!Please check it
//		 </div>";
    $count++;
     echo "mail send";
}
 }
 if($count==1)
 {
//require('../phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "ipipi.com"; // specify main and backup server
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Port =25;
$mail->Username = "cherryjose"; // SMTP username at ipipi
$mail->Password = "12345cherry"; // SMTP password

$mail->From = "cherryjose@ipipi.com";
$mail->FromName = "E-Survey";
$ext=91;
$noo1=$ext.$contact;
$no=$noo1."@sms.ipipi.com";
$name="cherryjsoe";
    echo $no;
$mail->AddAddress($no,$name);

$mail->Subject = "hey!!";
$mail->Body = "welcome!";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   //exit;
}
else
{
    echo "text send!!";
}
//echo "Message has been sent";
 }
 }
if (!$success) {
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	     error .'$msg'.
	       </div>";
} else {
    $_SESSION['status'] = "<div id='sucessMsg' class='style'>
		 You Have been Registered !! Welcome
		 </div>";
}


header("location:../registration.php");


}


?>
