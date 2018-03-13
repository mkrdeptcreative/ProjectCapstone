<?php
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.14.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.4.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src = "js/registration.js"></script>
<style>
    .cent{
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: hsl(330, 68%, 20%);
		height:200x;
	}
</style>
</head>

<body>
 <div class="container-fluid" >
    <div class="row">
    <div class="col-md-14">
    <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#rightmenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <img src="image/u22.png" width="50" height="50"  /> 
            </div>
            <div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav">
                <li><a  href="frontpage.php"> Home </a></li
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
 </div>


 <div class="container">

 
    	<form  id="loginform" class="cent regiForm" action="" method="post" style="background-color: lightgreen;">
		<img src="image/thankyou.jpg" width="480" height="120"  /> 
		

		<center><h2>Your Registration Successfull!!!</h2></center><br /><br /><br>
		<br>
		<br>

		<center><h5>A confirmation email has been sent to your email to activate your account. Please activate before login</h5> </a></center>
            
		</form>  
</div>  
     
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>