<?php
session_start();

use M6P\Controller\UserManager ;
use M6P\Models\util\DBUtil;
use M6P\Controller\JobManager;
use M6P\Models\entity\Job;
require_once 'includes/autoload.php';
ob_start();
$email="";
$name="";

if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
		$UM=new UserManager();
        $user=$UM->getUserByEmail($email);
		$name = $user->firstName;
		$lastname=$user->lastName;
		$job=$user->job;
		$companyname=$user->companyname;
		
	}
if (isset($_REQUEST['search'])) {
	$searchvalue =  $_REQUEST['txtSearch'];
	$_SESSION['searchvalue'] = $searchvalue ;
	header('Location:successlogin.php');
}   
?>   	

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
<title>simple comment in php</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src = "js/loginform.js"></script>
<style  align="center"  top="100px" type="text/css">
#txt{

height:100px;
width:450px;
resize:none;
}
#com{
height:100px;
width:450px;

resize:none;

}
</style>
</head>
<body>
<div>
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
							<li><a href="jobsearch.php">Job Search </a></li>
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
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"> <?php echo $name; ?><b class="caret"></b></a>
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
    

<div class="container ">
    	
     <div class="row">
     <div class="cent outerbox">
				 <center><img src="image/pp.png" class="img-square"  width="100" height="100" style="padding-top:5px;"> 
				 <br>
				 <br>
			    <p>Name:            <?=$name ,$lastname;?></br>
				   Job:             <?=$job ?></br>
				   Company Name :   <?=$companyname?></br> <center>
</div>	


<div class="container">
  <img src="image/green.jpg" width="1110" height="260" style="margin-left:210px;" ><br>
  <div class="text-block">    
  <p style="height:200; width=200;"><h2 align=center>Welcome! <?=$name ,$lastname;?></h2></br></p>
  </div>
</div>
<img src="image/gt.jpg" width="1100" height="300" style="margin-left:225px;">			
</div>		   
</div> 
<div class="container"> 
   <?php include 'includes/footer.php';?>
</div>
</body>
</html>