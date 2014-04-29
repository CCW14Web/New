<?php/*
  Document   : createsurvey_questions.php
  Created on : 
  Author     : Zhixiang Hu
  Description: add or modify survey questions
 */
?>
<?php
    session_start();//Session starting
    $sid =$_GET["sid"];
    $dsn = 'mysql:host=127.0.0.1;dbname=dbsurvey';
    $username = 'root';
    $password = '';
    
    $db = new PDO($dsn, $username, $password);

    $query = "Select title,description FROM surveys where id=" . $sid ;
    $records = $db->query($query);
    $row = $records->fetch();
    $title = $row["title"];
    $description = $row["description"];

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
         
    </head> <!-- End of Head -->

    <body>                                      <!-- Body of the page -->
        <?php include 'header/header.php'; ?>              <!-- End of Menu -->



        <div id="container">          <!--  Container class  !-->
        
        <?php
        if(isset($_SESSION["name"]))
        {   // if user login
            $saved_question_id = 0;
            if (isset($_POST["Control"]))
            {   // post back
                //echo $_POST["questionid"];
                if($_POST["questionid"]>0)
                {   // save existing question and options
                    $query = "update questions set title='" . $_POST["question_title"] ."' where id=". $_POST["questionid"];
                    $records = $db->exec($query);
                    foreach($_POST as $key=>$value) {
                        if( substr($key,0,19)== "question_option_id_") {    // input name starting with 'question_option_id_' 
                            $query = "update questionoptions set text='" . $_POST[$key] . "' where id=" . str_replace('question_option_id_','',$key);
                            $records = $db->exec($query);
                        }
                    }
                }
                else
                {   //insert new question and options
                    $saved_question_id=999;
                    $question_id=0; // next question will be new question, rest its id in order to save on post back
                    if (strlen(trim($_POST["question_title"])) >0){
                        $query = "insert into questions (surveyID,title,type) values (" . $sid. ",'" . $_POST["question_title"] . "','C')";
                        $records = $db->exec($query);
                        $saved_question_id = $db->lastInsertId(); // abtain last insert id
                        foreach($_POST as $key=>$value) {
                            if( substr($key,0,19)== "question_option_id_" and  strlen(trim($value))>0) {    // input name starting with 'question_option_id_' 
                                $query = "insert into questionoptions (questionID,text) values ('" . $saved_question_id . "','" . $value ."')";
                                $records = $db->exec($query);
                            }
                        }
                    }
                }
                if($_POST["Control"]=="Exit")
                {
                    header("Location: createsurvey.php");
                    exit();
                }

                if ($_POST["Control"]=="Next" AND $saved_question_id==0)
                {   // not last question
                    $query = "select * from questions where surveyid=" . $sid . " and id>" . $_POST["questionid"] . " limit 0,1 ;";
                    $records = $db->query($query);
                    $row = $records->fetch();
                    $question_id = $row["ID"];  //  next question id
                }
            }
            else
            {   //initial page, load first question, or empty form
                $question_id = 0;
                $query = "select * from questions where surveyid=" . $sid . " limit 0,1 ;"; // load first question or no question
                $records = $db->query($query);
                $row = $records->fetch();
            }
    
            $question_title="";
            $option = array("","","","","","");
            $option_id = array(-1,-2,-3,-4,-5);
            if(empty($row) OR $saved_question_id>0)
            {   // new question and options
            }
            else
            {
                $question_title = $row["title"];
                $question_id= $row["ID"];
                
                $query = "select * from questionoptions where questionid=". $question_id;
                $records = $db->query($query);
                for ($i=1; $i<=4; $i++) 
                {
                    $row = $records->fetch();
                    if (empty($row))
                    {   //A or B or C or D question option not available
                        //echo "aaa",empty($option[$i]);
                        $option[$i] ="";
                        $option_id[$i] =-1;
                    }
                    else
                    {   //store options
                        $option[$i] = $row["text"];
                        $option_id[$i] = $row["ID"];
                        //echo "bbb", empty($option[$i]);
                    }
                }
            }
        }
        ?>
            <div class="page-header">
                <form id="question_form" method="post">
                    <h1><?php echo $title; ?>  <small>  <?php echo $description; ?></small> </h1>
                    <h4>Question Title: <input type="text" class="input-xxlarge" name="question_title" value="<?php echo $question_title; ?>"> </h4>
                    <h5>A: <input type="text" name="<?php echo "question_option_id_".$option_id[1];?>" value="<?php echo $option[1];?>"></h5>
                    <h5>B: <input type="text" name="<?php echo "question_option_id_".$option_id[2];?>" value="<?php echo $option[2];?>"></h5>
                    <h5>C: <input type="text" name="<?php echo "question_option_id_".$option_id[3];?>" value="<?php echo $option[3];?>"></h5>
                    <h5>D: <input type="text" name="<?php echo "question_option_id_".$option_id[4];?>" value="<?php echo $option[4];?>"></h5>
                    <input type="hidden" name="questionid" value="<?php echo $question_id; ?>">
                    <div class="alert alert-warning" id="err_msg" hidden="true" >abcd</div>
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group">
                            <input type="submit" class="btn btn-default" name="Control" value="Previous" disabled=true>
                        </div>
                        <div class="btn-group">
                            <input type="submit" class="btn btn-default" name="Control" value="Next" onclick="return checkQuestionToSubmit();">
                        </div>
                        <div class="btn-group">
                            <input type="submit" class="btn btn-default" name="Control" value="Exit">
                        </div>
                    </div>
                </form>
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
    <script type="text/javascript" src="js/createsurvey_questions.js"></script>



</body>
<!--  Ends the Body  !-->
</html>
<!--  Ends the Html  !-->
        