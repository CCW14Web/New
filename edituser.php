<?php/*
  Document   : edituser.php
  Created on : 25/4/2014
  Author     : Cherry
  Description: Edit user Page
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

        <!-- jQuery library -->
        
		
        <!-- CSS file -->
    

         
    </head> <!-- End of Head -->



    <body>                                      <!-- Body of the page -->
               <?php include 'header/header.php'; ?>              <!-- End of Menu -->


               <div class="row-fluid">
        <div class="container-fluid ">          <!--  Container class  !-->
                                   <form class="form-horizontal span9 hero-unit" name="useredit" method="post" action="edit_exe.php" >
                <legend>Edit Registration </legend>

                <div class="control-group">
                    <label class="control-label" >Full Name</label>
                    <div class="controls">
                        <input required type="text" name="fname" id="fname" placeholder="First Name" />
                    
                        <input type="text" name="lname" id="sname" placeholder="Surname/Last Name" />


                    </div>
                </div>
               
                
                <div class="control-group">
                    <label class="control-label" >Password</label>
                    <div class="controls">
                        <input  required  type="password" name="pass" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" >Confirm Password</label>
                    <div class="controls">
                        <input  required  type="password" name="cpass"/>
                    </div>
                </div>
                <div class="control-group">
                        <label class="control-label" >Email</label>
                        <div class="controls">
                            <input  required  type="email" name="email" />
                        </div>
                    </div>
               
             
                    <input id="join_button" class="btn controls btn btn-primary" title="Update"  type="submit" name="Submit" value="Update" />

            </form>

                                         <!-- Ends View My Work Div -->
                
                                              <!-- Ends Slider Div -->
                
                                            <!-- Ends Keep in Touch Div -->
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
