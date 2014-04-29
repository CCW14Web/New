<?php
/*
  Document   : Connect.php
  Created on : Mar 1/ 2014,
  Author     : Cherry Jose
  Description: Connect 
  
 */
include 'constants.php';
   
    $con = mysql_connect($DBADD,$DBUNAME,$DBPASS);
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    $db=mysql_select_db($DB);
    if(!$db)
    {
        die('Could Not find Database'. mysql_error());
    }

?>
