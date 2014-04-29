<?php
session_start();

require_once '../includes/connect.php';
require_once '../includes/functions.php';
$username= mysql_real_escape_string($_POST['username']);

 $result = mysql_query("SELECT * FROM user WHERE name='$username'");
  if(mysql_num_rows($result)>0){  
    //and we send 0 to the ajax request  
    echo 0;  
}else{  
    //else if it's not bigger then 0, then it's available '  
    //and we send 1 to the ajax request  
    echo 1; 
    
} 
?>