<?php/*
  Document   : create survey.php
  Created on : 
  Author     : 
  Description: Home Page
 */
?>
<?php
  session_start();//Session starting 
  require_once 'include/connect.php';
 
  $id = $_POST['play1'];
  
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
            <form id="answer" method="post" action="takeans.php">
                   <?php
                    $query2 = "SELECT ID FROM questions where title='$id' ";
                   
                    $result = mysql_query($query2);
                     $rs= mysql_fetch_row($result);?>
                     <h1><?php echo $id;echo "<br />";?></h1>
                     <?php $i=1;
                     $rs2=mysql_query("select * from questionoptions where questionID='$rs[0]'");
                     $_SESSION['questionid']=$rs[0];
                     while($row = mysql_fetch_array($rs2))
                    { 
                    
                     
                    ?>
                     
                          
                       <h3> <input type="radio" name="values" value=" <?php echo $i;?> "><?php echo $row['text'];echo "<br />";?></h3>
                    <?php  
                    
                   
                    $i++;
                    }
                   ?>  <input type="hidden" name="questionid" id="questionid" values="<?php echo $rs[0]; ?>" />
                       <input type="submit" name="submits" value="Submit" id="submits"/>
            </form>
                                            <!-- Ends Keep in Touch Div -->
            </div>
</div>

        </div>                                       <!--  Ends Container class  !-->
  

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
