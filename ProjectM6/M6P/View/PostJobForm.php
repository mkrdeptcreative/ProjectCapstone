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
echo "<h4>" .$name." Successfully Posted Job</h4>";	
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
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="chats.php">Chats</a></li>
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
<div class="container ">
    <form  id="loginform" class=" cent regiForm" action="PostJobForm.php" method="post" >
           <center><h5>Post Job Registration Form</h5></center><br>
			
			<div class="col-md-9">
				<div class="row">
				<div class="form-group" >
					<label for  ="txt_jobTitle" class="control-label col-md-3" col-form-label> Job Title</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-md" id="txt_jobTitle" placeholder="Job title" name="job_title"><br>
					</div>
				</div>
				</div>	
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_AnnualSalary"  class="control-label col-md-3" col-form-label>Salary</label>
						<div class="col-md-6 .row-bottom-margin">
							<input type="text" class="form-control input-md" id="txt_AnnualSalary"   placeholder="annual salary(in $)" name="job_salary"?><br>
						</div>
				</div>
				
				</div>		
				<div class="row">
				<div class="form-group" >
					<label for  ="txt_Job_Description" class=" control-label col-md-3" col-form-label>JobDescription</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Job_Description"  placeholder="Describe Job roles and responsibilities" name="job_desc"  ><br>
						</div>
				</div>
				</div>		
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_WorkLocation" class="control-label col-md-3" col-form-label>WorkLocation</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_WorkLocation" placeholder="Work Location" name="job_location"><br> 
           				</div>
				</div>
				</div>							
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_Job" class="control-label col-md-3" col-form-label> Employer</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Job"  placeholder="Employer's name" name="job_employer" ><br> 
           				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_CompanyName"  class=" control-label col-md-3" col-form-label> Website</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-sm" id="txt_CompanyName"  placeholder="Employer's Website Url" name="job_website" ><br>
           			</div>
				</div>
				</div>		
				
				<div class="row">
				<div class="form-group  ">
					<label for  ="txt_City" class=" control-label col-md-3" col-form-label>Qualifications</label>
						<div class="col-md-6">
								<input type="text" class="form-control input-md" id="txt_City"  placeholder="Minimum Qualification required" name="job_qual" ><br> 
           				</div>
				</div>
				</div>	
				
				
						
					<center><button class="btn btn-primary" name="submitted" value="submit">Submit</button></center> </center>
			</form>
                   
            </div>
        </div>        
 </div>  

<div class="container"> 
	<?php include 'includes/footer.php'; ?>
</div>
</body>
</html>

