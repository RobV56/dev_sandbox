<?php
include("globals.php");
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
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/master.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<!-- <div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
    </div>
</div> -->

<div class="container">
    


    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <?php
            if(isset($_GET['success'])) {
                ?>
                    <div class="alert alert-success text-center">Thank You. Your message was sent.</div>
                <?php
            }
            if(isset($_GET['error'])) {
                ?>
                    <div class="alert alert-danger text-center"><?=$_SESSION['msg']?></div>
                <?php
            }
            ?>
            <h3>Standard Form</h3>
            <form role="form" action="_send_form.php" method="post" name="contact" id="contact" enctype="multipart/form-data" id="contact">
                <div class="form-group">
                    <label for="First_Name">First Name</label>
                    <input type="text" class="form-control" name="contact[First_Name]" id="First_Name" placeholder="First Name" required >
                </div>
                <div class="form-group">
                    <!-- Hide labels using .sr-only class -->
                    <label for="Last_Name" class="sr-only">Last Name</label>
                    <input type="text" class="form-control" name="contact[Last_Name]" id="Last_Name" placeholder="Last Name" required >
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" class="form-control" name="contact[Phone]" id="Phone" placeholder="Phone" required >
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control" name="contact[Email]" id="Email" placeholder="Email Address" required >
                </div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms"> Agree to Terms
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Option one is this and that&mdash;be sure to include why it's great
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Option two can be something else and selecting it will deselect option one
                    </label>
                </div>
                <div class="form-group">
                    <label for="Email">Feature List:</label>
                    <select class="form-control" name="select1">
                        <option value="none">Not interested</option>
                        <option value="interested">Interesed in</option>
                        <option value="required">Necessary requirement</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit1" class="btn btn-default">Submit</button>
                </div>
            </form>
           
            
        </div>
        <div class="col-md-5 col-md-offset-1">
            
             <?php
            if(isset($_GET['success'])) {
                ?>
                    <div class="alert alert-success text-center">Thank You. Your message was sent.</div>
                <?php
            }
            if(isset($_GET['error'])) {
                ?>
                    <div class="alert alert-danger text-center"><?=$_SESSION['msg']?></div>
                <?php
            }
            ?>
            <h3>Horizontal Form</h3>
            <form class="form-horizontal" role="form" action="_send_form.php" method="post" name="contact" id="contact" enctype="multipart/form-data">
                <h4>General Information:</h4>
                <div class="form-group">
                    <label for="First_Name" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact[fname]" id="First_Name" placeholder="First Name" required >
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="Last_Name" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact[lname]" id="Last_Name" placeholder="Last Name" required >                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="Phone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact[phone]" id="Phone" placeholder="Phone" required >                   
                    </div>
                </div>
                <div class="form-group">
                    <label for="Email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="contact[email]" id="Email" placeholder="Email Address" required >                   
                    </div>
                </div>
                
                <h5>Here is a question that requires a radio response?</h5>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Option 1 is this.
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
                        Option 2 is this.
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked>
                        Option 3 is this.
                    </label>
                </div>
                
                <h4>The following are grouped together:</h4>
                <div class="form-group">
                    <label for="Phone" class="col-sm-8 col-xs-8 control-label text-left">Fountains</label>
                    <div class="col-sm-4 col-xs-4">
                        <select class="form-control input-sm" name="fountains">
                            <option value="none">None</option>
                            <option value="interested">Interested</option>
                            <option value="required">Required</option>
                        </select>                  
                    </div>
                </div>
                <div class="form-group">
                    <label for="Phone" class="col-sm-8 col-xs-8 control-label text-left">Saltwater Pond with sharks and icky jelly fish!</label>
                    <div class="col-sm-4 col-xs-4">
                        <select class="form-control input-sm" name="saltpond">
                            <option value="none">None</option>
                            <option value="interested">Interested</option>
                            <option value="required">Required</option>
                        </select>                  
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" id="submit1" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; Company <?=date('Y')?>a</p>
    </footer>
</div> <!-- /container -->  

<!-- ****  Load javascripts bellow  ************* --> 
     
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>x
<!-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script> -->

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/holder.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        
        // contact handler
        $('#submit1').click(function(){
           $('#contact').attr('action', 'send_form.php');
        });
        
        
        // Konami Module
        var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
        
        $(document).keydown(function(e) {
        
          kkeys.push( e.keyCode );
        
          if ( kkeys.toString().indexOf( konami ) >= 0 ) {
        
            $(document).unbind('keydown',arguments.callee);
            
            // do something awesome
            //$("body").addClass("konami");
            window.open("http://www.youtube.com/watch?v=oHg5SJYRHA0", '_blank');
          
          }
        
        });
        
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
