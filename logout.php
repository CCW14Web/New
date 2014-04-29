<?php

/*
  Document   : logout.php
  Created on : April 3/ 2014,
  Author     : Cherry Jose
  Description: logout

 */
session_start();        //destroying and unsetting the session

unset($_SESSION['name']);
session_unset();
session_destroy();

header("location:index.php");
?>
