<!DOCTYPE html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Civil Registry (template)</title>
        <link href="../includes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../includes/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="../stylesheet/main.css" rel="stylesheet">
    </head>
    <body>
        <?php include '../header/header.php';
                include '../includes/functions.php';
                $include_braces = false;
                $u=generateGuid($include_braces);
                
                ?>



        </div>
         <div class="row">  
            
            <form class="form-horizontal span12 hero-unit" name="userreg" method="post" action="register_exe.php" >
             <legend>User Registration </legend>
               
                <div class="control-group">
                    <label class="control-label" >Full Name</label>
                    <div class="controls">
                        <input required type="text" name="fname" id="fname" placeholder="First Name" />
                        <input type="text" name="mname" id="mname" placeholder="Middle Name" />
                        <input type="text" name="lname" id="sname" placeholder="Surname/Last Name" />


                    </div>
                </div>
              <div class="control-group">
                    <label class="control-label" >User Name</label>
                    <div class="controls">
                      <input type='text' id='username' name='uname'> <input type='button' id='check_username_availability' value='Check Availability'>  
<div id='username_availability_result'></div> 
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
                    <label class="control-label" >Fathers Name</label>
                    <div class="controls">
                     <input type="text" name="fatname" id="fname" />
                     <label class="checkbox"> <input type="checkbox" name="na1" value="Not Applicable"/>  (Check if Not Applicable)</label>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" >Mothers Name</label>
                    <div class="controls">
                     <input   type="text" name="motname" id="mname" />
                     <label class="checkbox"> <input type="checkbox" name="na2" value="Not Applicable"/>  (Check if Not Applicable)</label>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" >Spouse's Name</label>
                    <div class="controls">
                   <input   type="text" name="spname" id=" spname" />
                     <label class="checkbox"> <input type="checkbox" name="na3" value="Not Applicable"/>  (Check if Not Applicable)</label>
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" >Legal Guardians Name</label>
                    <div class="controls">
                     <input type="text" name="guard" id=" spname" />
                     <label class="checkbox"> <input type="checkbox" name="na4" value="Not Applicable"/>  (Check if Not Applicable)</label>
                    </div>
                </div>
                <div class="control-group">
                    <em style="color:red"></em><label class="control-label" >Permanent Address</label>
                    <div class="controls">
                        <input  required  type="text" name="flatno"placeholder="Flat/Block/Door No"/>
                        <input required type="text" name="buildingname" placeholder="Building/Premises/Village Name"/>
                        <input required type="text" name="roadname" placeholder="Road/Lane/Street Name"/>  <br/><br/>
                        <input required type="text" name="town" placeholder="Town/City/District"/>
                        <input required type="text" name="state" placeholder="State/Union Territory"/>

                        <input maxlength="6" required type="tel" name="pincode" placeholder="PinCode"class="span2"/><br/><br/>
                        <input required type="text" name="country" placeholder="Country"/>
                    </div>
                </div>
             <div class="control-group">
                    <em style="color:red"></em><label class="control-label" >Present Address</label>
                    <div class="controls">
                        <input  required  type="text" name="tflatno"placeholder="Flat/Block/Door No"/>
                        <input required type="text" name="tbuildingname" placeholder="Building/Premises/Village Name"/>
                        <input required type="text" name="troadname" placeholder="Road/Lane/Street Name"/>  <br/><br/>
                        <input required type="text" name="ttown" placeholder="Town/City/District"/>
                        <input required type="text" name="tstate" placeholder="State/Union Territory"/>

                        <input maxlength="6" required type="tel" name="tpincode" placeholder="PinCode"class="span2"/><br/><br/>
                        <input required type="text" name="tcountry" placeholder="Country"/>
                    </div>
                   <div class="control-group">
                    <label class="control-label" >Contact Number</label>
                    <div class="controls">
                      <input maxlength="10" required type="tel" name="scontactno" />
                    </div>
                </div>
              <div class="control-group">
                    <label class="control-label" >Email</label>
                    <div class="controls">
                   <input  required  type="email" name="email" />
                    </div>
                </div>
             <div class="control-group">
                    <label class="control-label" >Date of Birth</label>
                    <div class="controls">
                   <input  required  type="date" name="dob" />
                    </div>
                </div>
                     <div class="control-group">
                    <div class="controls">
                   <input    type="hidden" name="uid" value="<?php echo $u;?> "class="span4" />
                    </div>
                </div>
                <input id="join_button" class="btn controls btn btn-primary" title="Join"  type="submit" name="Submit" value="Join" />
                
            </form>
             
        </div>
             </div>
       


        <?php if (isset($_SESSION['status'])) { ?>
            <div class="alert alert-block fade in navbar-fixed-top">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p> <?php
        echo $_SESSION['status'];
        unset($_SESSION['status']);
            ?></p>
            </div>
        <?php } ?>


        <script src="../includes/jquery-1.7.1.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
        <script>
$(document).ready(function() {  
  
        //the min chars for username  
        var min_chars = 3;  
  
        //result texts  
        var characters_error = 'Minimum amount of chars is 3';  
        var checking_html = 'Checking...';  
  
        //when button is clicked  
        $('#check_username_availability').click(function(){  
            //run the character number check  
            if($('#username').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result').html(characters_error);  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#username_availability_result').html(checking_html);  
                check_availability();  
            }  
        });  
  
  });  
  
//function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
  
        //use ajax to run the check  
        $.post("check_username.php", { username: username },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(username + ' is Available');  
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html(username + ' is not Available');  
                }  
        });  
  
}
</script>
        <?php include '../footer/footer.php'; ?>
    </body>

</html>    