<html>
<head>
<title></title>
</head>
<body>

<?php
session_start();
$user_email_id=$_POST['email'];
echo $user_email_id;
$_SESSION['email']=$user_email_id;

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/[\]/','',$body);
$body="Click link below to reser password http://localhost/civil/index/forgotpass.php";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "civilregistry.etnies@gmail.com";  // GMAIL username
$mail->Password   = "etnieswecode";            // GMAIL password

$mail->SetFrom("civilregistry.etnies@gmail.com", 'Civil Registry Online');

$mail->AddReplyTo("civilregistry.etnies@gmail.com","Civil Registry Online");

$mail->Subject    = "Reset your password";

$mail->AltBody    = "click link to reset your pass"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $user_email_id;
$mail->AddAddress($address, "Reset Password");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

//if (!$mail->Send()) {
//    $_SESSION['status'] = "<div id='errorMsg' class='style'>
//	     Message Couldnot be send to the Receiptent
//	       </div>";
//    echo "error";
//} else {
//    $_SESSION['status'] = "<div id='sucessMsg' class='style'>
//		 Mail send!Please check it
//		 </div>";
//    echo "hhh";
//}
if(!$mail->Send()) {
    //header('location:../../forgotpass/index.php');
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  // header('location:../../forgotpass/index.php');
}
//header('location:../../forgotpass/index.php');
?>

</body>
</html>
