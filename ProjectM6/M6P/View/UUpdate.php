<?php
require_once 'includes/autoload.php';
use M6P\Models\util\DBUtil;
use M6P\Controller\UserManager;
use M6P\Models\entity\User;
ob_start();
$email="";
$name="";
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
    $UM=new UserManager();
    $user=$UM->getUserByEmail($email);
    $name = $user->firstName;
    
}
?>
<?php

ob_start();
require_once 'includes/security.php';

$formerror="";
$firstname="";
$lastname="";
$email=$_SESSION["email"];
$password="";
$job="";
$companyname="";
$city="";
$country="";


if(!isset($_REQUEST["submitted"])){
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($_SESSION["email"]);
    $firstname=$existuser->firstName;
	$lastname=$existuser->lastName;
	$email=$existuser->email;
	$password=$existuser->password;
	$job=$existuser->job;
	$companyname=$existuser->companyname;
	$city=$existuser->city;
	$country=$existuser->country;
	}else{
		$firstname=$_REQUEST["FirstName"];
		$lastname=$_REQUEST["LastName"];
		$job=$_REQUEST["Job"];
		$companyname=$_REQUEST["CompanyName"];
		$city=$_REQUEST["City"];
		$country=$_REQUEST["Country"];

		if($firstname!='' && $lastname!='' && $email!='' && $job!='' && $companyname!='' && $city!='' && $country!='')
		{
		   $update=true;
		   $UM=new UserManager();
		   $emailtoupdate = $_SESSION['email'];
		   $newemail      = $email;
		   if($newemail!=$emailtoupdate){
			   $existuser=$UM->getUserByEmail($emailtoupdate);
			   if(isset($existuser)){
				   $formerror="User Email already in use, unable to update email";
				   $update=false;
			   }
		   }
		   if($update){
				   $existuser=$UM->getUserByEmail($email);
				   $existuser->firstName=$firstname;
				   $existuser->lastName=$lastname;
				   $existuser->email=$email;
				   $existuser->job=$job;
				   $existuser->companyname=$companyname;
				   $existuser->city=$city;
				   $existuser->country=$country;
				   $UM->saveUser($existuser);
				   
			   }
  }else{
      $formerror="Please provide required values";
  }
}
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
	
	input[type="text"]{
		margin-top:5px ! important;
		height:32px; !important;
		}
	.btn{
		margin-top:1px;
	}
	.input-group .form-control {
		margin: 0px !important;
		
	}
	
</style>
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
				<nav class="navbar navbar-light navbar-left searchleft">
				 <form class="form-inline" name="searchform" method="POST" action="">
				  <div class="col-lg-12">
					<div class="input-group">
					  <input type="text" class="form-control"  name="txtSearch"placeholder="Search for...">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="submit" value="" name="search" id="search">Go!</button>
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
							<li><a href="PostJobForm.php">Post Job</a></li>
							<li><a href="jobListPage.php">Job List</a></li>
							<li><a href="jobsearch.php">Job Search</a></li>
						</ul>	
				</li>	
				<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Thread<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="threadsearchbar.php">Thread Topic</a></li>
							<li><a href="comment.php">Thread Messages</a></li>
							
						</ul>	
				</li>	
				<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="chats.php">Chats</a></li>
						</ul>	
				</li>							
				<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"> <?php echo $firstname; ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="profilepage.php">My Profile</a></li>
							<li><a href="UUpdate.php">Update Profile</a></li>
							<li><a href="logout.php">Sign Out</a></li>
						</ul>
				</li>
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
</div>
<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "krdept12";
   $databaseName = "m6project";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   // get values form input text and number
   $email=$_POST['email'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $job = $_POST['job'];
   $companyname = $_POST['companyname'];
   $city = $_POST['city'];
   $country = $_POST['country'];
           
   // mysql query to Update data
   $query = "UPDATE tb_user SET firstname='$firstname',lastname='$lastname',job= '$job',companyname='$companyname',city='$city',Country='$country' WHERE email='$email'";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo '<style=margin-top:30px;"><h4>Data Updated Successfully!</h4>';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> ABC Pvt Ltd </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body style="margin-top:45px; border:1px;">
	<div class="container ">
    	<form action="UUpdate.php" method="post">
            <center><h5 style="color:black"><br>Hi! <span style="color:blue"> <?=$email?> </span><br><br><span style="color:green"><b>Update your Profile Here!!! </span></h5></center><br>
<div id="err"></div>
			<div id="error"><?=$formerror?></div>
			
			<div class="col-md-9" align=center>
				 
				<div class="row">
				<div class="form-group" >
        

            <b>Email To Update <input type="text" name="email" required value="<?=$email?>" style="margin-left: 0px;"><br>

            <b>First Name<input type="text" name="firstname" required value="<?=$firstname?>" style="margin-left: 35px;"><br>

            <b>Last Name<input type="text" name="lastname" required value="<?=$lastname?>" style="margin-left: 35px;"><br>

            <b>Job<input type="text" name="job" required value="<?=$job?>"style="margin-left: 80px;"><br>
			
			<b>Company Name<input type="text" name="companyname" required value="<?=$companyname?>"><br>
			
			<b>City<input type="text" name="city" required value="<?=$city?>" style="margin-left: 80px;"><br>
			
			<b>Country<input type="text" name="country" required value="<?=$country?>" style="margin-left: 55px;"><br><br>

            <input type="submit" name="update" value="Update Data" style="background-color:orange; color:blue; margin-left:170px;">

        </form>
		
		
		 
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
    
    </body>


</html>


