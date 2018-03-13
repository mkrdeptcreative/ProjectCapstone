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
       <div style="margin-top:100px;">              
					<center><img src="image/privacy.jpg" width=350" height="350"> </img></center>
					<div>
					<p style="color:black;">
A privacy policy is a statement or a legal document (in privacy law) that discloses 
some or all of the ways a party gathers, uses, discloses, and manages a customer or client's data.
 It fulfills a legal requirement to protect a customer or client's privacy. Personal information can be 
 anything that can be used to identify an individual, not limited to the person's name, address, date of birth, 
 marital status, contact information, ID issue and expiry date, financial records, credit information, medical history, 
 where one travels, and intentions to acquire goods and services.[1] In the case of a business it is often a 
 statement that declares a party's policy on how it collects, stores, and releases personal information it collects.
 It informs the client what specific information is collected, and whether it is kept confidential, shared with partners,
 or sold to other firms or enterprises.[2]
The exact contents of a certain privacy policy will depend upon the applicable law and may need 
to address requirements across geographical boundaries and legal jurisdictions. Most countries have 
their own legislation and guidelines of who is covered, what information can be collected, and what it
 can be used for. In general, data protection laws in Europe cover the private sector as well as the public sector. 
 Their privacy laws apply not only to government operations but also to private enterprises and commercial transactions.[3]

 
</p>

</div>
            </div>
        </div>        
 </div>  
 

 
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>