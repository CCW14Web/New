<?php/*
  Document   : create survey.php
  Created on : 22/4/2014
  Author     : Zhixiang Hu
  Description: create or modify survry page
 */
?>
<?php
  session_start();//Session starting 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Survey</title> <!-- Title of Page -->
        
        <!-- Style Sheet for the website inlcuding Bootstrap Frame Work !-->
        <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

	<!--jQuery on CND-->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
		
        <!-- CSS file -->
    
    <link rel="stylesheet" type="text/css" href="css/createsurvey.css">
    <link rel="stylesheet" type="text/css" href="css/BeatPicker.css">
      
         
    </head> <!-- End of Head -->



    <body>   
        <!-- Body of the page -->
        
 <?php include 'header/header.php'; ?>              <!-- End of Menu -->
 <div class="row-fluid">


        <div id="container">          <!--  Container class  !-->
	<?php

	 
	  if(isset($_SESSION["name"]))
	  {    
               $_SESSION["username"]=$_SESSION["name"];
              // echo $_SESSION["username"];
               $_SESSION["isloggedin"] = true;
	      $dsn = 'mysql:host=127.0.0.1;dbname=dbsurvey';
	      $username = 'root';
	      $password = '';
	      
	      $db = new PDO($dsn, $username, $password);
      
	      $query = "Select count(*) FROM surveys, users where surveys.ownerid=users.id and username='" . $_SESSION["username"] . "'";
	      $records = $db->query($query);
	      $row = $records->fetch();
	      $num_row = $row[0];

	      echo "<div id='welcome_msg'>Welcome " . $_SESSION["username"] . ", you have " .  $num_row .  " survey(s).</div><br>";
	      
	      $sql = "SELECT surveys.id,`surveys`.Title,Description,StartDate,EndDate,Category,isActive, `users`.FirstName,LastName\n"
		  . "FROM surveys, users\n"
		  . "where surveys.ownerid=users.id\n"
		  . "and username='" . $_SESSION["username"] . "'";
	      $records = $db->query($sql);
	      $alt= true;
      
	      if ($num_row > 0)
	      {   // show table when there is survey
		  
		  echo "<table id='survry_table' cellpadding=0 cellspacing=0>";
            	      echo "<tr><th>Survey ID</th><th>Survey Title</th><th>Start Date</th><th>End Date</th><th>Category</th><th>Owner</th><th>Active</th><th>Options</th></tr>";
		  
		  foreach($records as $row)
		  {
		      $alt= ! $alt;
		      if ($alt)
		      {  echo "<tr class='alt'>";
		      }else
		      {  echo "<tr>";
		      }
		      echo "<td>". $row['id']. "</td><td>"  . $row['Title'] . "</td><td>". $row['StartDate'] ."</td><td>". $row['EndDate'] ."</td><td>". $row['Category'] ."</td><td>". $row['FirstName'] ." ". $row["LastName"] ."</td><td>". $row['isActive'] ."</td><td><p onclick='showSurvey(" .  $row['id']. ");' class='btn btn-lg btn-default'>Edit</p> <p onclick='modifyQuestions(" . $row['id'] . ");' class='btn btn-lg btn-default'> Add/Modify Questions </p></td></tr>";
		  }
              }
		  ?>
		  </table>
		  <button id="btn_new_survey" class="btn btn-lg btn-primary pull-right" type="button">New Survey</button>
		  
		
	 
	      <div id="edit_survey_panel">
		  <form action="createsurvey_save.php" method="post">
		      <table id="edit_survey_table">
			  <tr><td>Survey Title:</td><td><input type="text" name="title" maxlength="50" size="30"></td><td class='input_characters'>(50 max)</td></tr>
			  <tr><td>Survey Description:</td><td><input type="text" name="description" maxlength="100" size="50"></td><td class='input_characters'>(100 max)</td></tr>
			  <tr><td>Start Date:</td><td><input type="date" maxlength="10" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-module="clear" name="startdate"></td><td class='input_characters'></td></tr>
			  <tr><td>End Date:</td><td><input type="date" maxlength="10" data-beatpicker="true" data-beatpicker-position="['right','*']" data-beatpicker-module="clear" name="enddate"></td><td class='input_characters'></td></tr>
			  <tr><td>Response Limit:</td><td><input type="text" name="responselimit" maxlength="5" size="5"></td><td class='input_characters'>(1-999)</td></tr>
			  <tr><td>Category:</td><td><input type="text" name="category" maxlength="30" size="30"></td><td class='input_characters'>(30 max)</td></tr>
			  <tr><td>Active</td><td>
			      <select name="active">
				  <option value="Y" selected>Y</option>
				  <option value="N">N</option>
			  </td></tr>
			  <tr><td colspan=2><input type="hidden" name="surveyid" value=0>
			      <div class="alert alert-warning" id="err_msg" hidden="true" >abcd</div>
			  </td></tr>
			  <tr><td></td><td colspan=2><input name="btn_s_save" type="submit" class="btn btn-lg btn-info pull-right" value="Save" onclick="return checkSurveyToSubmit();"></td></tr>
		      </table>
		  </form>
	      </div>

        </div>                                       <!--  Ends Container class  !-->
  
</div>
                 <?php  }
                 
	  else{
              
              ?> <div class="span12">
                  <div class="span4">
                      
                  </div>
                  <div class="span7">
                      <h2>Please login to Create a survey</h2>
                  </div>
              </div>
              <?php
                 
          }
	  ?>
    <?php include 'include/footer.php'; ?>           <!--  Including the Footer  !-->   


   <?php if (isset($_SESSION['status'])) { ?>
        <div class="alert alert-block fade in navbar-fixed-top span5 offset4 pull-right">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p> <?php
    echo $_SESSION['status'];
    unset($_SESSION['status']);
        ?></p>
        </div>
    <?php } ?>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="include/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/createsurvey.js"></script>
    <script type="text/javascript" src="js/BeatPicker.js"></script>



</body>
<!--  Ends the Body  !-->
</html>
<!--  Ends the Html  !-->
