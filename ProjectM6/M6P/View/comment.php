<?php
session_start();
use M6P\Controller\UserManager ;
require_once 'includes/autoload.php';
require 'config.php';

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

if (isset($_POST['submit']))
{
    $name=$_POST['name'];
    $com=$_POST['comment']; 
    
    if($name!="" && $com!=="")
    {
        $sql="insert into comments(name, comment,time) values('$name','$com',NOW())";
        $con->query($sql);
             
    }
	if($con)
   {
       echo '<style="text-align: center; color: black; margin-top: 5%; font-size:12px;"><h4> Thread Posted Successfully!</h4>';
   }else{
       echo 'oops! Thread is Not Posted';
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
	background-color:lightblue;
	opacity:0.9;
	font-family: calibri;  
	border-radius: 5px; 
	box-shadow: 2px 5px 5px black;">
}	
.title
{
color:black;
padding-left:20px;

}
.data
{
padding-left:20px;
color:black;
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
<center>
<form method=post action="comment.php">
<h3 style="margin-top:50px">Thread Messages</h3>

<table>
<tr><td><input type="text" placeholder="name" name=name id="txt"></td></tr>
<tr><td><br><textarea type="text" name=comment placeholder="description" id="com"></textarea></td></tr>
<tr><td align=center><br><input type="submit" name=submit value=post><br><br> </td></tr>
</table>

<div class="table-responsive">
   <table class="table table bordered" style='border: 1px solid white'>
    <tr>
     <th><p style="color:Blue"> Name</th>
     <th><p style="color:Blue"> Comment</th>
     <th><p style="color:Blue">Time</th>
    </tr>
    </table>

​
<p>
<span align="center"><?php
$sql="select * from comments order by id desc";
if ($result=$con->query($sql))
{
    if($result->num_rows)
    {
     while($row=$result->fetch_object())
     {
         echo "<div style='text-align:left'><b>".$row->name."</b></div>";
         
         echo "<div style='text-align:center'>" .$row->comment. "</div>";
            
         echo "<div style='text-align:right'>" .$row->time. "</div>";
         
         echo"<hr style='border: 1px solid white' />​ ";
     }
     
    }
}

?></span>
</center>
</form>
</div>
</div>
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</head>
</html>
