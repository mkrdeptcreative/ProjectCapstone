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
$searchitem ="";
$category="";

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
    <style>
	.searchbox
	{
	margin-top:100px;
	left :20%;
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
	.joblist
	{
		float: left; 
		margin-top: 5%; 
		margin-left: 5%; 
		width: 500px; 
		height: 300px; 
		border: solid #ff9a00 0; 
		background-color:rgba(47, 50, 47, 0.74);
		opacity:0.9;
		font-family: calibri;  
		border-radius: 5px; 
		box-shadow: 2px 5px 5px black;">
	}	
	.title
	{
		color:rgba(54, 2, 54, 1);
		padding-left:15px;

	}
	.data
	{
		padding-left:20px;
		color:black;
	}	
	
	
	
	</style>
</head>
<body>
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


<div class="container">
    <div class="col-sm-8 pull-center well searchbox" id="searchbox">
        <form class="form-inline" action="" method="POST">
            <center>  
                        <select class="form-control" name="searchlist">
                            <option value="title">Title</option>
                            <option value="location">Location</option>
							<option value="employer">Employer</option>
                        </select>
                    
                    
                       <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..." name="searchvalue">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" name="search" type="submit">
                                      <i>search</i>
                                    </button>
                                </span>
                        </div>
			</center>
        </form>
    </div>
</div>

<?php
if(isset($_REQUEST["search"])){
	$searchitem = $_REQUEST['searchvalue'];
	$category = $_REQUEST['searchlist'];	
	$JM   = new JobManager();
	switch ($category) {
    case "title":
        $jobs = $JM->getJobByTitle($searchitem);
        break;
    case "location":
        $jobs = $JM->getJobByLocation($searchitem);
        break;
    case "employer":
         $jobs = $JM->getJobByEmployer($searchitem);
        break;
    default:
        echo "wrong list item";
	}
  
}
if(isset($jobs))
{
foreach($jobs as $job) 
	{
		if($jobs!=null)
		{
		?>
		<section>
		<center>
		<table>
		<table border="0" cellpadding="10">
			<tr>
				<td width="100">
					<h5 class="title"><b> Job Title :</h5>
				</td>
				<td>
					<p class="data"> <?php echo "<a href=Job_Detail.php?id=" . $job->id . ">" . $job->title . "</a>"; ?> </p>
					
				</td>
			</tr>
			<tr>
				<td width="100">
					<h5 class="title"><b> Employer :</h5>
				</td>
				<td>
					<p  class="data"> <?php echo $job->employer; ?> </p>
				</td>
			</tr>
			<tr>
				<td width="100">
					<h5 class="title"><b> Location :</h5>
				</td>
				<td>
					<p  class="data"> <?php echo $job->location; ?> </p>
				</td>
			</tr>
			<tr>
				<td colspan=2>
			</tr>
		</table>
</table>
<hr>
</center>		
	
			
	<?php 
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
