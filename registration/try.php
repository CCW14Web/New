
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Civil Registry (template)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../includes/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../includes/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

  </head>

  <body>
       <?php
        session_start();
        ?>
   
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Civil Registry</a>
          <div class="nav-collapse collapse">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="../registration/index.php">Register</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">Apply For Services </li>
                  <li><a href="#">Apply for Passport</a></li>
                  <li><a href="#">Apply For Pan Card</a></li>
                  <li><a href="#">Apply For Voters ID</a></li>
                  <li><a href="#">Apply For Driving License</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Registration </li>
                  <li><a href="#">Register Death Certificate</a></li>
                  <li><a href="#">Register Birth Certificate</a></li>
                  <li><a href="#">Register Marriage Certificate</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right" method="post" action="../login/user_login.php">
              <input class="span2" type="text" placeholder="User Name" name="login">
              <input class="span2" type="password" placeholder="Password"  name="password" >
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
        
    </div>
 
      <div class="container">
          <div class="hero-unit">
              <p>Hello Bloody buggers :P</p>
          </div>
       </div>
      
      
      
    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
    

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Our Services</h2>
          <p>We provide a hell lot of services!!</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>How to Apply</h2>
          <p>Simple!!just follow the procedure :P</p>
          <p><a class="btn" href="">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>FAQs</h2>
          <p>No one asked anything till now !!</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; BeNiLM</p>
      </footer>

    </div>
      
       

        
        <div id="statusMsg" style="<?php
    if (isset($_SESSION['status']))
        echo "right:30%";
    else
        echo "display:none";
     ?> ">
       <?php
     if (isset($_SESSION['status'])) {
         echo $_SESSION['status'];
         unset($_SESSION['status']);
     }
     ?>
      
      
   

   <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../includes/jquery-1.7.1.min.js"></script>
    <script src="../includes/bootstrap/js/bootstrap.js"></script>
  

  </body>
</html>
