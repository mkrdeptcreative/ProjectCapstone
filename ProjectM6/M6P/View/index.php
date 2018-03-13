<?php
session_start();
use M6P\Controller\UserManager ;
require_once 'includes/autoload.php';
ob_start();
$email="";
$name="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ABC PVT LTD</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <style>
	body{
		background-color:lightblue;
		margin-top: 60px;
	}
	
	input[type="text"]{
		margin-top:5px ! important;
		height:30px; !important;
		}
	.btn{
		margin-top:1px;
	}
	.input-group .form-control {
		margin: 0px !important;
		
	}
	.btn-primary{
		margin-right:20px;
		
	}
	
	
	</style>
</head>
</body>
 <div class="container-fluid">
    <div class="row">
    <div class="col-sm-7">
    <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#rightmenu" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <img class="pull-left" src="image/u22.png" width="50" height="50"  /> 
				<nav class="navbar navbar-light navbar-left searchleft">
				 <form class="form-inline" name="searchform" method="POST" action="">
				  <div class="col-lg-12">
					<div class="input-group">
					  <input type="text" class="form-control"  name="txtSearch"placeholder="Search for...">
					  <span class="input-group-btn ">
					    
						<button type="submit" class="btn btn-primary" style="background-color:orange;"name="list">ViewUsers</button>
       			      </span>
					</div>
				  </div>
				</form>
				</nav>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav" >
			   
                <li><a  href="frontpage.php">Home </a></li>
				
                <li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Jobs<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="Apost.php">Post Job</a></li>
							<li><a href="AjobListPage.php">Job List</a></li>
							<li><a href="Aindex1.php">Delete Job</a></li>
							
						</ul>	
				</li>	
						<li><a href="Asdelete.php">User</a></li>
							
						
				
                <li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Email<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sucessemail.php">ComposeEmail</a></li>
							<li><a href="index.php">SendBulkMails</a></li>
							
						</ul>	
				</li>	
				
				<li><a href="logout.php">Logout</a></li>
				</ul>
            </div>
            </div>
    </nav>
    </div>
    </div>
</div> 


<?php
//
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';
require 'class.smtp.php';
require 'class.phpmaileroauth.php';
require 'class.phpmaileroauthgoogle.php';
require 'class.pop3.php';



		/*$mysql_hostname = 'Database Host';
		$mysql_username = 'Database Username';
		$mysql_password = 'Database Password';
		$mysql_dbname = 'Database Name';
		
		$dbh = new PDO("mysql:host=$mysql_hostname";dbname="$mysql_dbname","$mysql_username", "$mysql_password");*/
        /*** $message = a message saying we have connected ***/
		$dsn ='mysql:dbname=m6project;host=localhost';
		$user = 'root';
		$password = 'krdept12';
    	$dbh = new PDO($dsn, $user, $password);
		
        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
         $stmt = $dbh->prepare("SELECT id, name, email, promocode FROM email");

        /*** execute the prepared statement ***/
        $stmt->execute();

        while($row = $stmt->fetch()) {
            //$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$promoCode = $row['promocode'];
			
			sendEmail($email, $name, $promoCode);
		
        }
		 
	function sendEmail($email, $name, $promoCode){

		$mail = new PHPMailer;

		$htmlversion="<p style='color:red;'>Hi ".$name.", <br><br> This is your promo code HTML : ".$promoCode.". </p>";
		$textVersion="Hi ".$name.",.\r\n This is your promo code:  ".$promoCode."text Version";
		$mail->isSMTP();                                     		 // Set mailer to use SMTP
		//$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		$mail->Host = 'smtp.gmail.com';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authentication
		$mail->Username = 'mnjlkrishnan@gmail.com';         // SMTP username
		$mail->Password = 'kr@dept12';                      // SMTP password
		$mail->Port = 25;                                   // TCP port to connect to
		$mail->setFrom('mnjlkrishnan@gmail.com', 'Test Email');
		$mail->addAddress($email);               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Test Email Subject';
		$mail->Body    = $htmlversion;
		$mail->AltBody = $textVersion;

	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
	}
}
?>
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>