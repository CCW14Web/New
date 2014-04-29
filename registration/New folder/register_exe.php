<?php

session_start();

require_once '../includes/connect.php';
require_once '../includes/functions.php';
$msg = "";
$success = true;


$pass=  clean($_POST['pass']);
$cpass = clean($_POST['cpass']);
$user = clean($_POST['uname']);
$email = clean($_POST['email']);
$contact = clean($_POST['scontactno']);
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$fname = clean($_POST['fname']);
$lname = clean($_POST['lname']);
$mname = clean($_POST['mname']);
$father_name=clean($_POST['fatname']);
$mother_name=clean($_POST['motname']);
$spouse_name=  clean($_POST['spname']);
$guardian=clean($_POST['guard']);
$flatno = clean($_POST['flatno']);
$buildingname = clean($_POST['buildingname']);
$roadname = clean($_POST['roadname']);
$town = clean($_POST['town']);
$state = clean($_POST['state']);
$pincode = clean($_POST['pincode']);
$country = clean($_POST['country']);
$tflatno = clean($_POST['tflatno']);
$tbuildingname = clean($_POST['tbuildingname']);
$troadname = clean($_POST['troadname']);
$ttown = clean($_POST['ttown']);
$tstate = clean($_POST['tstate']);
$tpincode = clean($_POST['tpincode']);
$tcountry = clean($_POST['tcountry']);
$uid=$_POST['uid'];

//echo $uid;
$_SESSION['uid']=$uid;
echo $_SESSION['uid'];

//echo $user;

if(isset($_POST['na1']))
{
$na1=clean($_POST['na1']);
$father_name=$na1;
}
if(isset($_POST['na2']))
{
$na2=clean($_POST['na2']);
$mother_name=$na2;
}
if(isset($_POST['na3']))
{
$na3=clean($_POST['na3']);
$spouse_name=$na3;
}
if(isset($_POST['na4']))
{
$na4=clean($_POST['na4']);
$guardian=$na4;
}
if($pass!=$cpass)
{
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	    Passwords Dont Match!!
	       </div>";
    
    //echo "error!!";
  header("location:index.php");
    
}
else
{
$select="select name from user where name='$user'";
$resss=  mysql_query($select);
 if(mysql_num_rows($resss)>0)
{
  $success=false;
  $msg="user name exist";
    //echo $msg;
}
 else {
    

$insert="INSERT INTO `user`(`uid`, `name`, `firstname`, `middlename`, `lastname`, `fathersname`, `mothersname`, `spousename`, `guardian`, `gender`, `flatno`, `bldgname`, `roadname`, `town`, `state`, `pincode`, `country`, `tflatno`, `tbldgname`, `troadname`, `ttown`,
    `tstate`, `tpincode`, `tcountry`, `pass`, `contact`, `email`, `dob`)VALUES('$uid','$user','$fname','$mname','$lname',
        '$father_name','$mother_name','$spouse_name','$guardian','$gender','$flatno','$buildingname','$roadname','$town','$state','$pincode','$country',
            '$tflatno','$tbuildingname','$troadname','$ttown','$tstate','$tpincode','$tcountry',SHA('$cpass'),'$contact','$email','$dob')";
   $result1 = mysql_query($insert)or die($success=false);
   
if($result1)
{
    
        $login_insert="INSERT INTO `user_login`(`uid`, `uname`, `pass`, `priority`) VALUES('$uid','$user',SHA('$cpass'),4)";
        $result = mysql_query($login_insert)or die($success=false);
    
}
 }

if (!$success) {
    $_SESSION['status'] = "<div id='errorMsg' class='style'>
	     error .'$msg'.
	       </div>";
} else {
    $_SESSION['status'] = "<div id='sucessMsg' class='style'>
		 Data Entered into DB
		 </div>";
}


header("location:../registration/index.php");


}


?>
