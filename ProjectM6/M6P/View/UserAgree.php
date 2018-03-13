<?php
session_start();
require_once 'includes/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
	<title>Login page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src = "js/loginform.js"></script>
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
						<img src="image/u22.png" width="50" height="50"  /> 
					</div>
					<div class="collapse navbar-collapse navbar-right" id="rightmenu">
					<ul class="nav navbar-nav" >
					    <li><a href="adminLogin.php">Admin</a></li>
						<li><a  href="login.php">Login</a></li>
						<li><a  href="Registration.php">Sign Up</a></li>
					</ul>
					</div>
			</nav>
		</div>
    </div>
 </div>

 <div class="container">
        
                    <div><center>
					<img src="image/UA.jpg" width="600" height="400"  /></center></div> 
                    <p style="color:black;">
					Our User Agreement has been updated. Click here to see a summary of changes.

Our mission is to connect the world’s professionals to allow them to be more productive and successful. Our services are designed to promote economic opportunity for our members by enabling you and millions of other professionals to meet, exchange ideas, learn, and find opportunities or employees, work, and make decisions in a network of trusted relationships.
</p>
            </div>
        </div>        
 </div>  
 

 
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>