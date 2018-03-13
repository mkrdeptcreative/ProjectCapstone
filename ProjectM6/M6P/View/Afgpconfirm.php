<?php
session_start();
use M6P\Controller\AdminManager ;

require_once  'includes/autoload.php';

$formerror="";
$email="";
if(isset($_REQUEST["submitted"])){
	
    $email=$_REQUEST["email"];
    $AM=new AdminManager();
    $existuser=$AM->getAdminByEmailPassword($email,$password);
		if(isset($existuser)){
        $_SESSION['email']=$email;
		header('Location: EmailConfirmation.php');
    }else{
        $formerror="Invalid User Name or Password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
	<title>Aforgot password confirmation page</title>
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
<div >
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
                 <li><a  href="adminLogin.php"> AdminLogin </a></li>
                 
                 <li><a  href="frontpage.php"> Home </a></li>
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
 </div>


 <div class="container">
        <div class="row cent">
		     <div class="loginform">
                    <form  id="loginform"  action="" method="post" onSubmit="return ValidationForm();" >
                        <center><h3 >Email Confirmation</h3></center><br>
						<center><h5 style="color:black;">We sent an Information To Your Email.<br>Please Check Your Email. <br><br>Thank you.</h5></center><br>					
                        <center><p><button class="btn btn-primary" name="submitted" value="Login">Ok </button></p><center>
                    
                   </form> 
            </div>
		</div>
        </div>        
 </div> 
 <Footer>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#ftrrightmenu" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">© ABC PVT LTD. All rights reserved.</div>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="ftrrightmenu">
            <ul class="nav navbar-nav">                
                <li><a href="#"> User Agreement</a></li>
                <li><a href="#"> Privacy Policy</a></li>
                
            </ul>
            </div>
    </nav>
    </Footer>    
                   
</body>
</html>