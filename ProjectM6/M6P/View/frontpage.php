
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ABC PVT LTD</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
 <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#rightmenu" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
               
                </button>
                <img class="pull-left" src="image/u22.png" width="50" height="50"  /> 
            </div>
            <div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav" >
                <li><a href="adminLogin.php">Admin</a></li>
                <li><a href="login.php">Login </a></li>
                <li><a href="Registration.php">Sign Up</a></li>
            </ul>
            </div>            
    </nav>    
    </div>
    </div>
</div>
 <div class="container">
     <div class="row ">
            <div class=" col-xs-2"></div>
            <div class="col-xs-8 quote ">            
                <h4 style=color:darkblue;"><b>WELCOME TO ABC JOBS PVT LTD.</h4>                             
             </div>
             <div class=" col-xs-2 "> </div>
     </div>        
     </div> 
</div>
<div class="container">
 <script>
	$('.carousel').carousel({
		interval: 1000
	})
</script>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="image/abc.jpg"  style="width:100%;">
        <div class="carousel-caption"> 
        <h3>ABC Jobs pvt ltd!</h3>         
        </div>
      </div>

      <div class="item">
        <img src="image/h.jpg"  style="width:100%;">
        <div class="carousel-caption">
         <h3>ABC Jobs pvt ltd!</h3> 
        </div>
      </div>
    
      <div class="item">
        <img src="image/cp1.jpg" style="width:100%;">
        <div class="carousel-caption">
          <h3>ABC Jobs pvt ltd!</h3> 
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>        
</body>
</html>