<?php
require_once 'include/connect.php';


if(isset($_POST['username']))
{
$username = $_POST['username'];
$sql = mysql_query("select id from users where username='$username'");
if(mysql_num_rows($sql))
{
echo '<STRONG>'.$username.'</STRONG> is already in use.';
}
else
{
echo ' Avaliable';
}
}
?>