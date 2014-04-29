<?php
/*
    File name : readsurvey.php
    Author's name : Zhixiang Hu
    Web site name : Project Survey
    This page read survey information and return in JSON format
*/
    
$output = "{\"survey\": [{ \"title\":\"Title\" , \"description\":\"Description\" , \"startdate\":\"Start Date\" , \"enddate\":\"End Date\" , \"responselimit\":\"100\" , \"category\":\"Category\" , \"isactive\":\"Y\" }]}";
//echo $output;


$db = new PDO("mysql:host=127.0.0.1;dbname=dbSurvey", "root", "");
$rs = $db->query("SELECT Title,Description,StartDate,EndDate,Responselimit,Category,isActive FROM surveys where id=" . $_GET["sid"]);

if ($row = $rs->fetch())
{   // if player id found
    
    $title = $row["Title"];
    $description = $row["Description"];
    $startdate = $row["StartDate"];
    $enddate = $row["EndDate"];
    $responselimit = $row["Responselimit"];
    $category = $row["Category"];
    $isactive = $row["isActive"];

$output = "{\"survey\": [{ \"title\":\"" . $title . "\" , \"description\":\"" . $description
                        . "\" , \"startdate\":\"" . $startdate . "\" , \"enddate\":\"" . $enddate
                        . "\" , \"responselimit\":\"" . $responselimit . "\" , \"category\":\"" . $category
                        . "\" , \"isactive\":\"" . $isactive . "\" }]}";

}
echo $output;

?>