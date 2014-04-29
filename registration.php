
<?php
  /*Document   : registration.php
  Created on : 22/4/2014
  Author     : Sateesh
  Description: Registration Page
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E-Survey</title>
        <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
       
    </head>
    <body>
        <?php
        include 'header/header.php';
       
        ?>



        <script type="text/javascript" src="registration/jquery-1.3.2.js"></script>
        <link href="registration/css.css" media="screen" rel="stylesheet" type="text/css" />

        <script type="text/javascript">

            $(document).ready(function() {
                $('#Loading').hide();    
            });

            function check_username(){

                var username = $("#username").val();
                if(username.length >= 1){
                    $('#Loading').show();
                    $.post("check_username.php", {
                        username: $('#username').val()
                    }, function(response){
                        $('#Info').fadeOut();
                        $('#Loading').hide();
                        setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
                    });
                    return false;
                }
            }

            function finishAjax(id, response){
 
                $('#'+id).html(unescape(response));
                $('#'+id).fadeIn(1000);
            } 
<?php require_once 'include/connect.php';
//require_once '../include/functions.php';
?>
        </script>
        <div class=" row">  
            <div class="span3"></div>
            <form class="form-horizontal span9 hero-unit" name="userreg" method="post" action="registration/register_exe.php" >
                <legend>User Registration </legend>

                <div class="control-group">
                    <label class="control-label" >Full Name</label>
                    <div class="controls">
                        <input required type="text" name="fname" id="fname" placeholder="First Name" />
                    
                        <input type="text" name="lname" id="sname" placeholder="Surname/Last Name" />


                    </div>
                </div>
               
                <div class="control-group">
                    <label class="control-label" >Gender</label>
                    <div class="controls">
                        <label class="radio inline "> <input required type="radio" name="gender" value="M"checked/>M</label>
                        <label class="radio inline"> <input required type="radio" name="gender" value="F"/>F </label>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" >User Name<h6>Min 3 characters</h6></label>
                    <div class="controls">

                        <div class="both">


                            <input id="username" name="username" type="text" value="" onblur="return check_username();" />
                            <span id="Loading"><img src="registration/loader.gif" alt="" /> </div>
                        <div id="Info"></div></span>	



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
                <div class="control-group">
                        <label class="control-label" >Contact Number</label>
                        <div class="controls">
                            <input maxlength="10" required type="tel" name="scontactno" />
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" >Date of Birth</label>
                        <div class="controls">
                            <input class="span2" required  type="date" name="dob" />
                        </div>
                    </div>
                
                
               
                <div class="control-group">
                    <em style="color:red"></em><label class="control-label" >Address</label>
                    <div class="controls">
                        <input  required  type="text" name="flatno"placeholder="Flat/Block/Door No"/>
                     
                        <input required type="text" name="roadname" placeholder="Road/Lane/Street Name"/>  <br/><br/>
                        <input required type="text" name="town" placeholder="City"/>
                        <input required type="text" name="state" placeholder="Province/Union Territory"/>

                        <input maxlength="6" required type="text" name="pincode" placeholder="PinCode"class="span2"/><br/><br/>
                        <input required type="text" name="country" placeholder="Country"/>
                    </div>
                    </div>
             
                    <input id="join_button" class="btn controls btn btn-primary" title="Join"  type="submit" name="Submit" value="Join" />

            </form>

        
    </div>



<?php if (isset($_SESSION['status'])) { ?>
        <div class="alert alert-block fade in navbar-fixed-top">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <p> <?php
    echo $_SESSION['status'];
    unset($_SESSION['status']);
    ?></p>
        </div>
    <?php } ?>


    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="include/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>    