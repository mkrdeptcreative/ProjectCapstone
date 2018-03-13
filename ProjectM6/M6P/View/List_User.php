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
					    
						<button type="submit" class="btn btn-primary" style="background-color:orange;" name="list">ViewUsers</button>
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
            </div>
    </nav>
    </div>
    </div>
</div> 

<div class="container" >
        <div class="row">
		 <div class="col-md-12" height=50px;>
			<?php
			if(isset($_REQUEST['list']))
			{
			$UM=new UserManager();
			$users=$UM->getAllUsers();
			include 'ASdelete.php';
			}
			if(isset($_POST['Delete'])){
            $idArr = $_POST['checkbox'];
				foreach($idArr as $value){
				$UM=new UserManager();
				$existuser=$UM->deleteUser($value);
				}
			}

			?>
		 
         </div>
		</div>
</div> 


<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>