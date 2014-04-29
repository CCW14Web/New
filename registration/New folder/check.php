<?php

require_once '../includes/connect.php';
require_once '../includes/functions.php';

// This is a sample code in case you wish to check the username from a mysql db table

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$sql_check = mysql_query("select name from user where name='".$username."'")
 or die(mysql_error());

if(mysql_num_rows($sql_check))
{
echo '<font color="red">The nickname <strong>'.$username.'</strong>'.
' is already in use.</font>';
}
else
{
echo 'OK';
}
}

?>
