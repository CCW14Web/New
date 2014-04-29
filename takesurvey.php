<?php/*
  Document   : create survey.php
  Created on : 24/4/2014
  Author     : Cherry
  Description: Home Page
 */
?>
<?php
  session_start();//Session starting 
  require_once 'include/connect.php';
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
           
            
                               <div id="quiz">
                                   <form id="select_form" method="post" action="">
                <h2>Please choose  from the Category</h2>
                <select id="play" name="play">                      
                 <?php  $query2 = "SELECT * FROM surveys ";
                 $result = mysql_query($query2);
                        //$row= $db->query($query2);
                 while($rows = mysql_fetch_array($result)){
                    echo" <option value='".$rows['category']."'>".$rows['category']."</option>"?>
               

                    <?php } ?>
               </select>
                <br />
                <input type="submit" name="submits" value="Submit" id="submits"/>
                </form>
            </div> 
            <div id="quiz1">
            <?php 
            if (isset($_POST['play'])){
                $id=$_POST['play'];
               
                $rs = mysql_query("select ID from surveys where category='$id'");
                   $rs1= mysql_fetch_row($rs);
                   ?>
            <form id="select_form1" method="post" action="take.php">
                <h2>Please choose  from the Topic</h2>
                <select id="play1" name="play1">                      
                 <?php  $query2 = "SELECT title FROM questions where surveyid='$rs1[0]' ";
                 $result = mysql_query($query2);
                        //$row= $db->query($query2);
                 while($rows = mysql_fetch_array($result)){
                    echo" <option value='".$rows['title']."'>".$rows['title']."</option>"?>
               

                    <?php } ?>
               </select>
                <br />
                <input type="submit" name="submits" value="Submit" id="submits"/>
                </form>
           <?php } ?>
            </div><!-- Ends View My Work Div -->
                
                                              <!-- Ends Slider Div -->
                
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
