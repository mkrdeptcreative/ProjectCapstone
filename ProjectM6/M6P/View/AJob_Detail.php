<?php
//session_start();
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

$id=$_GET['id'];
$JM = new JobManager();
$jobs = $JM->getJobById($id);

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

    .navbar
    {  min-height:30px !important;
        margin-bottom: 0!important;
    }
    .navbar-right {
        margin-right: 20px;
     }
    .navbar-right a{
        margin-right: 20px;
    }
    .navbar-toggle
    {
        background-color: #E492F5;
    }
    .navbar-toggler-icon
    {
       
    }
    #box-wrapper {
   
   }
     	
   #box-wrapper
    
   .loginform .btn-primary ,
   {
    color: #fff;
    background-color: #0495c9;
    border-color: #357ebd; /*set the color you want here*/
	}
   .cent{
		position: fixed;
		top: 40%;
		left: 50%;
		transform: translate(-50%, -50%);
   }
	.loginform
	{
		
		background-color:#393635;
		border: 5px solid #393635;
		border-radius: 10px;
		margin-top: 110px;
		opacity:0.9;
		max-width: 400px;
		padding: 10px 40px;
		color: #FFF;
	} 

	#disu,#disup{
		color:red;
	}
	#error{
		color:Red;
	}
    
	.quote
	{   text-align: center;
        color:purple;
        width:100%;
		margin-top: 50px;
	} 
	.quote h4{
		font-weight:bold;
		font-size:28px;
	}
	box{
		width:200px;
		height:200px;
		
	}
	.searchleft{
		padding-left:10px;
		padding-top:4px;
	}


.jumbotron{
	background-color:transparent !important;
	border:1px solid gray;
	-moz-box-shadow:    inset 0 0 2px #000000;
   -webkit-box-shadow: inset 0 0 2px #000000;
   box-shadow:         inset 0 0 3px #000000;
}
.cell1
{
	height:100%;
}
.cell2.
{
	height:100%
}
.cel3 
{
	height:100%
}
.joblist
{
	float: left; 
	margin-top: 5%; 
	margin-left: 5%; 
	width: 500px; 
	height: 150px; 
	border: solid #ff9a00 0; 
	background-color:grey; 
	font-family: calibri;  
	border-radius: 5px; 
	box-shadow: 2px 5px 5px black;">
}	
.title
{
color:rgba(54, 2, 54, 1);
padding-left:20px;

}
.data
{
padding-left:20px;
color:white;
}	

h4,h1 {
	font-family: cursive;
	font-size: 15px;
	font-weight: 5px;
	color:black;
}
p{
 color:black;
}
.content
{
	margin:10% 10%;
	font-family: calibri;
	box-shadow: 2px 5px 5px black;
	text-align:center;
	background-color: lightblue;
    border: 1px solid #5E5E5E;
    border-radius: 10px;
    opacity: 0.9;
    max-width:60%;
    
	
}
	
}
</style>
<!--

-->
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
							<li><a href="wlbulkemail.php">SendBulkMails</a></li>
							
						</ul>	
				</li>	
				
				<li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
</div> 
	<section class="content" >
	<center>
	<h3> Job Details</h3>
		<table cellpadding="5">
			<tr>
				<th colspan=2>
					<h4 style="text-align: left; color:red;"> <?php echo $jobs->title; ?></h4>
				</th>
			</tr>
			<tr>
				<td>
					<h5 style="text-align: left;"><b>Employer :</h5>
				</td>
				<td>
					<p><?php echo $jobs->employer; ?></p>
				</td>
			</tr>
			<tr>
				<td >
					<h5 style="text-align: left;"><b>JobDescription :</h5>
				</td>
				<td height="auto">
					<p><?php echo $jobs->jobDescription;  ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<h5 style="text-align: left;"><b> Salary :</h5>
				</td>
				<td>
					<p><?php echo $jobs->salary; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<h5 style="text-align: left;"><b> Location</h5>
				</td>
				<td>
					<p><?php echo $jobs->location; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<h5 style="text-align: left;"><b> Qualification :</h5>
				</td>
				<td>
					<p><?php echo $jobs->qualification;?></p>
				</td>
			</tr>
			<tr>
				<td>
					<h5 style="text-align: left;"><b> Website :</h5>
				</td>
				<td >
					<p><?php echo $jobs->website; ?></p>
				</td>
			</tr>
		</table>
		</center>
	</section>	
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>