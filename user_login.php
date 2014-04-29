<?php

session_start();

             
    require_once 'include/connect.php';             // Databse connection file
require_once 'include/functions.php';
    $login = ($_POST['login']);
    $password = ($_POST['password']);
    $errflag = false;
    $success = true;
   
    $user_type_flag = "NULL";
    if ($login == '') {
        $success = false;
        $errmsg_arr[] = 'User Name missing';
        $errflag = true;
    }
    if ($password == '') {
        $success = false;
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }

    if ($errflag) {
        $msg = $errmsg_arr;
        session_write_close();
        header("location:index.php");
    }                                                               //Checking for username and password match
    $qr1 = "SELECT * FROM users WHERE username='$login' AND password=SHA('$password')";
    $result = mysql_query($qr1) or die($success = false);

    $priority = "SELECT priority FROM users WHERE username='$login' AND password=SHA('$password')"; //checking the priority
    $priority_result = mysql_query($qr1) or die(mysql_error());
    $row = mysql_fetch_array($result);
    if ($result) {
        echo "$login";
        
        if ($row) {


            if ($priority == 1) {
                
            } else {
             
                $_SESSION['name'] = $login;
                echo $_SESSION['uid'];
            }
        } else {
            
            $success = false;
            
            
            //$_SESSION['status']="error retrieving data";
            $msg = "Invalid Credential";
			
            //echo "Invalid login";
        }
    }



    //echo $_SESSION['status'];
    if (!$success) {                                                       //displaying the status messages
       $_SESSION['status'] = "<div id='errorMsg' class='style'>
      error  !! ".$msg."
         </div>";
        
        header("location:index.php");
    } else {
        $_SESSION['status'] = "<div id='sucessMsg' class='style'>
         You Have been Successfully LogedIn
         </div>";
        // echo "Succesfully logged in !! :-)";
        header("location:index.php");
    }

?>
