<?php
session_start();
require_once 'includes/autoload.php';
use M6P\Controller\UserManager ;
use M6P\Models\util\DBUtil;
use M6P\Controller\JobManager;
use M6P\Models\entity\job;
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
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"> <?php echo  $name; ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="profilepage.php">My Profile</a></li>
							<li><a href="UUpdate.php">Update Profile</a></li>
							<li><a href="logout.php"><p style="color:black;">Logout</p></a></li>
						</ul>
				</li>				
				
				</ul>
            </div>
            </div>
    </nav>
    </div>
    </div>
</div> 





<?php
session_start();
require_once 'includes/autoload.php';
use M6P\Models\util\DBUtil;
use M6P\Controller\JobManager;
use M6P\Controller\UserManager;
use M6P\Models\entity\job;

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

$title="";
$salary="";
$jobdesc="";
$location="";
$qualification="";
$employer="";
$website="";


if(isset($_REQUEST["submitted"])){
    
    
    $title=$_REQUEST['job_title'];
    $salary=$_REQUEST['job_salary'];
    $jobdesc=$_REQUEST['job_desc'];
    $location=$_REQUEST['job_location'];
    $qualification=$_REQUEST['job_qual'];
    $employer=$_REQUEST['job_employer'];
    $website=$_REQUEST['job_website'];
    
    
    if($title!='' && $salary!='' && $jobdesc!='' && $location!='' &&  $qualification!='' && $employer!='' && $website!='')
    {
        $JM = new JobManager();
        $job=new Job();
        $job->title=$title;
        $job->salary=$salary;
        $job->jobDescription=$jobdesc;
        $job->location=$location;
        $job->qualification=$qualification;
        $job->employer=$employer;
        $job->website=$website;
        
        
        $JM->saveJob($job);
        
    }
    
}
echo "<h1>" .$name." Successfully Posted Job</h1>";
?>
