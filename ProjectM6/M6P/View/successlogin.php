<?php
session_start();
use M6P\Controller\UserManager ;
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
    
}
if (isset($_REQUEST['search'])) {
    $searchvalue =  $_REQUEST['txtSearch'];
    $_SESSION['searchvalue'] = $searchvalue ;
    
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
            <ul class="nav navbar-nav">
                <li><a  href="frontpage.php">Home </a></li>
                
				
				<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Jobs<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="PostJobForm.php">Post Job</a></li>
							<li><a href="jobListPage.php">Job List</a></li>
							<li><a href="jobsearch.php"><p style="color:black;">Job Search</p></a></li>
						</ul>	
				</li>	
				<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Thread<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="threadsearchbar.php">Thread Topic</a></li>
							<li><a href="comment.php"><p style="color:black;">Thread Messages</p></a></li>
							
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
							<li><a href="logout.php"><p style="color:black;">Sign Out</p></a></li>
						</ul>
				</li>
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
</div> 

 <!-- <div class="container-fluid">
	<?php include "includes/header.php" ?>
 </div> 
 -->
 
<div class="container">
        <div class="row">
		 <div class="col-md-12">    
             <center><h4>Welcome   <?php echo $name?></h4></center>
         </div>
		</div>
		<?php 
				if(isset($_SESSION['searchvalue']))
				{
				$searchvalue = $_SESSION['searchvalue'];
				$UM=new UserManager();
				$users=$UM->getUserBySearch($searchvalue);
				if(isset($users))
				{?>
					<?php
					foreach ($users as $user) 
					{
						if($user!=null)
						{?>
							<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-1 "></div>
							<div class="col-md-10 col-sm-10 col-xs-10 searchfetchrow ">
							
								<div class="col-md-2 col-sm-2 col-sx-2 " align=center>
									<img src="image/profile.jpg"class="img-square" width="100" height="100" style="padding-top:5px;">
								</div>
								<div class="col-md-6 col-sm-6 col-sx-6 ">
									
									<h6><?php echo '<b>FirstName:</b>' . $user->firstName;?></h6>
									<h6><?php echo '<b>LastName: </b>' . $user->lastName;?></h6>
									<h6><?php echo '<b>CompanyName: </b>' . $user->companyname; ?></h6>
									<h6><?php echo'<b>City: </b>' . $user->city; ?></h6>
								</div>
								<div class="col-md-2 col-sm-2 col-sx-2 ">
									<br>
									<button class="btn-Primary" name="Connect" style="background-color: green;">Connect</button>
									</br>
								</div>
							
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2 "></div>
							</div>
						<?php
						}
					} 
				}
			}
			?>
	</div> 
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>
