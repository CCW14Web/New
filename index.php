<?php/*
  Document   : index.php
  Created on :24/4/2014 
  Author     : Cherry Jose
  Description: Home Page
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
        <script src="js/jquery-1.8.2.min.js"></script>
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />

         <!-- JQuery for the SLider -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider').bxSlider({
                    mode: 'fade',
                    auto:true,
                    captions: true
                });
            });
        </script>
    </head> <!-- End of Head -->



    <body>                                      <!-- Body of the page -->
               <?php include 'header/header.php'; ?>              <!-- End of Menu -->



        <div class="container-fluid ">          <!--  Container class  !-->
            <div class="row-fluid ">   <!--  Row Fluid Class !-->
                <div class="span3">             <!--  The Logo div !-->
                    <img src="images/logo.jpg"/>
                </div>
                <div class="span8">             <!--  Welcome and Personal Tagline Div  !-->
                   
                        <h3> Welcome to Project Survey</h3>
                        <div class="span11">
                    <ul class="bxslider">           <!-- Slider Div -->
                        <li><img src="images/slider1.jpg"  /></li>
                        <li><img src="images/slider2.jpg" /></li>
                        <li><img src="images/slider3.jpg"  /></li>
                        <li><img src="images/slider4.jpg"  /></li>
                    </ul>
                </div>
                  
                </div> 
            </div><!-- Ends the Welcome and Personal Tagline Div -->
             <div class="row-fluid"> 
                 <div class="span2">
                     
                 </div>
              
                <!--  Ends Row Fluid class  !-->
            </div>
            
            <div class="row-fluid">              <!-- View My Work Div -->
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
