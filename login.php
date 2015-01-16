<?php
include_once("globals.php");

//$user = new User();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link rel="stylesheet" href="css/master.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <h4>Under development.<br />Login to preview.</h4>       
        </div>
    </div>
</div> <!-- /container -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        
            <form role="form" action="_login_submit.php" name="login" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="user" required  autofocus>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="password" class="form-control" name="pass" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>    
        
        </div>
    </div>
  

</div> <!-- /container -->


<!-- ****  Load javascripts bellow  ************* --> 
     
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> -->
<script src="js/vendor/jquery.mask.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/main.js"></script>

<script>
    
$( document ).ready(function() {
    
});    
    
</script>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src='//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
