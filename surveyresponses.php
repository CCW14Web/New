<?php/*
  Document   : create survey.php
  Created on : 28/4/2014
  Author     : Khilan Patel
  Description: Survey Response Page
 */
?>
<?php
  session_start();//Session starting 
  
  $dsn= 'mysql:host=localhost;dbname=dbsurvey';
$username = 'root';
$password= '';

try{
$db= new PDO($dsn, $username, $password);
}
catch(PDOException $exception){
	echo "failed to connect";
}

if (mysqli_connect_errno($db))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

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

        <!-- jQuery library -->
        
		
        <!-- CSS file -->
    

         
    </head> <!-- End of Head -->



    <body>                                      <!-- Body of the page -->
               <?php include 'header/header.php'; ?>              <!-- End of Menu -->

               <div class="row-fluid">
               <div class="span3"></div>
                   <div class="span6">
        <div class="container-fluid ">          <!--  Container class  !-->
            
              <?php


$query = "
SELECT ID,surveryID,questionID,answer,COUNT(CASE WHEN answer = 1 then 1 ELSE NULL END) as 'a',
COUNT(CASE WHEN `answer` = 2 then 1 ELSE NULL END) as 'b',COUNT(CASE WHEN `answer` = 3 then 1 ELSE NULL END) as 'c',
COUNT(CASE WHEN `answer` = 4 then 1 ELSE NULL END) as 'd' FROM userresponses GROUP BY questionID";
?>
	  <h1> SURVEY RESPONSE </h1>
    <?php    $result=$db->query($query); ?>
		<table border="50" cellpadding="10" cellspacing="10" id="tblResults">
	  <?php  echo "<td>" . "<b> ID <b>". "</td>"   ?> 
	    <?php	echo "<td>" ."<b> surveryID </b>". "</td>"  ?>  
	 <?php	echo "<td>" ."<b> questionID <b>". "</td>"  ?> 
	 <?php	echo "<td>" ."<b> answer <b>". "</td>" ?> 
		<?php echo "<td>" ."<b> a <b>". "</td>" ?> 
		<?php echo "<td>" ."<b> b <b>". "</td>"  ?>  
		<?php echo "<td>" ."<b>    c <b>". "</td>"  ?> 
		<?php echo "<td>" ."<b>   d <b>". "</td>" ?> 
		 
 <?php		echo("\n<br/>"); 
		 
		while($row = $result->fetch()){ 
        echo "<tr>";
	 	echo "<td>" . $row["ID"]. "</td>" ?>  &nbsp
	<?php 	echo "<td>" .$row["surveryID"]. "</td>" ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<?php	echo  "<td>" .$row["questionID"]. "</td>" ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<?php		echo  "<td>" .$row["answer"]. "</td>"  ?> &nbsp &nbsp &nbsp &nbsp &nbsp
	<?php	echo  "<td>" .$row["a"]. "</td>" ?> &nbsp 
	<?php	echo  "<td>" .$row["b"]. "</td>"  ?> &nbsp 
	<?php	echo  "<td>" .$row["c"]. "</td>" ?> &nbsp 
	<?php	echo  "<td>" .$row["d"]. "</td>" ?>
		
	<?php	  //echo("\n<br/>");
		}
?>
    </table>
 
  <input type="button" onclick="window.print()" value="Print"/>
  
  
                          
                
                                            <!-- Ends Keep in Touch Div -->
            </div>


        </div>                                       <!--  Ends Container class  !-->
  
</div>
    
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




</body>
<!--  Ends the Body  !-->
</html>
<!--  Ends the Html  !-->
