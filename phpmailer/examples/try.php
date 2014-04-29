<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Carousel Template &middot; Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="sam">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="design.php">
</head>
<?php
include 'header.php';
include 'design.php';
?>
<body>
<div id="container">
<div class="row span8 offset2 feather">
<div id="myCarousel" class="carousel slide">
<!-- Carousel items -->
<div class="carousel-inner">
<div class="active item">
<img src="lighthouse.jpg" alt="">
</div>
<div class="item">
<img src="prediction.jpg" alt="">
</div>
<div class="item">
<img src="graduation.jpg" alt="">
</div>
</div>
<!-- Carousel nav -->
<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>
<div class="row">
<div class="span6"></div>
<div class="span4">
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Login</h3>
</div>
<div class="modal-body">
<div class="container-narrow">
<form class="form-horizontal">
<div class="control-group">
<label class="control-label" for="inputEmail">Email</label>
<div class="controls">
<input type="text" id="inputEmail" placeholder="Email">
</div>
</div>
<div class="control-group">
<label class="control-label" for="inputPassword">Password</label>
<div class="controls">
<input type="password" id="inputPassword" placeholder="Password">
</div>
</div>
<div class="control-group">
<div class="controls">
<label class="checkbox">
<input type="checkbox"> Remember me
</label>
<button type="submit" class="btn btn-success">Sign in</button>
</div>
</div>
</form>
</div>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>
</div>
<a href="#myModal" role="button" class="btn btn-inverse" data-toggle="modal">Login</a>
</div>
</div>
</div>

<div class="row-fluid marketing">
<div class="span6 ">
<h4 >Subheading</h4>
<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
<h4>Subheading</h4>
<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
<h4>Subheading</h4>
<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
</div>
<div class="span6">
<h4>Subheading</h4>
<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
<h4>Subheading</h4>
<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
<h4>Subheading</h4>
<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
</div>
</div>
<!-- Button to trigger modal -->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$('.carousel').carousel({
interval: 5000
})
//$('.carousel').carousel('cycle')
</script>
</body>
</html>