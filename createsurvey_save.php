<?php
/*
    File name : createsurvey_save.php
    Author's name : Zhixiang Hu
    Web site name : Project Survey
    This page save post survey information to database
*/
session_start();

$ownerID = 1;
$surveyid = $_POST["surveyid"];
$title = $_POST["title"];
$description = $_POST["description"];
$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];
$responselimit = $_POST["responselimit"];
$category = $_POST["category"];
$isactive = $_POST["active"];


    if(isset($_SESSION["username"]))
    {    
      $dsn = 'mysql:host=127.0.0.1;dbname=dbsurvey';
      $username = 'root';
      $password = '';
      
      $db = new PDO($dsn, $username, $password);

      if ($surveyid == 0){
          $query = "Insert into surveys (ownerID,description, startdate,enddate,responselimit,category,title,isActive) Values (".
          $ownerID . ",'" . $description . "','" . $startdate . "','" . $enddate . "'," . $responselimit . ",'" . $category . "','" . $title . "','" . $isactive . "' );" ;
      }
      else{
          $query = "Update surveys set description='" . $description . "', startdate='" . $startdate . "', enddate='" . $enddate . "', responselimit=".
          $responselimit . ", category='" . $category . "', title='" . $title . "', isActive='" . $isactive ."' where ID=" . $surveyid ;
      }
      $records = $db->exec($query);
      
      //echo $query;
      //echo($records);
      
      header("Location: createsurvey.php");   // you need to assign createsurvey_questions.php?sid=1 in order to load the survey
      exit();
       
    }
          
exit;
/*
echo $surveyid;
echo $title;
echo $description;
echo $startdate;
echo $enddate;
echo $responselimit;
echo $category;
echo $isactive;
*/

?>