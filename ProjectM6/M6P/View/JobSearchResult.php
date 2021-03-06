<?php
session_start();

use M6P\Models\util\DBUtil;
use M6P\Controller\JobManager;
use M6P\Controller\UserManager;
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
    
}
if(isset($_REQUEST["search"])){
    $searchitem = $_REQUEST['searchvalue'];
    $category = $_REQUEST['searchlist'];
    
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
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <style>
	.searchbox
	{
	margin-top:200px;
	}

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
	
	</style
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
                <img class="pull-left" src="image/logo.jpg" width="50" height="50"  /> 
				<nav class="navbar navbar-light navbar-left searchleft">
				 <form class="form-inline" name="searchform" method="POST" action="">
				  <div class="col-lg-12">
					<div class="input-group">
					  <input type="text" class="form-control"  name="txtSearch"placeholder="Search for...">
					  <span class="input-group-btn">
						<button class="btn btn-secondary" type="submit" value="" name="search" id="search">Go!</button>
					  </span>
					</div>
				  </div>
				</form>
				</nav>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav" >
               
                <li class="dropdown">
						<a href="" data-toggle="dropdown" class="dropdown-toggle">job<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="jobListPage.php">JobList</a></li>
							<li><a href="jobsearch.html">Search Job By Title</a></li>
							<li><a href="PostJobForm.php">Post a job</a></li>
							
						</ul>
				</li>
				<li class="dropdown">
						<a href="" data-toggle="dropdown" class="dropdown-toggle">Threads<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="chatindex.php">Topic</a></li>
							<li><a href="#">Topic List</a></li>
						</ul>
				</li>
				<li class="dropdown">
						<a href="" data-toggle="dropdown" class="dropdown-toggle">Messaging<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">compose</a></li>
							<li><a href="#">Inbox</a></li>
						</ul>
				</li>
				<li class="dropdown">
						<a href="" data-toggle="dropdown" class="dropdown-toggle"> <?php echo $name; ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="viewProfilepage.php">My Profile</a></li>
							<li><a href="updateProfilepage.php">Edit Profile</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
				</li>
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
</div> 
<div class="container">
   
  <h1> <?php echo $category; ?>
  <h1> <?php echo $searchitem; ?>
</div>
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>
