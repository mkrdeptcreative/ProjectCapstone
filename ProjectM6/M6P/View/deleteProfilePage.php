<?php
require_once 'includes/autoload.php';
use M6P\Models\util\DBUtil;
use M6P\Controller\UserManager;
use M6P\Models\entity\User;

if(isset($_Get['deleteUseremail'])){
    $UM=new UserManager();
	$usertoDelete =$UM->deleteUser($_GET["deleteUseremail"]);
	echo $_Get['deleteUseremail'];
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
	body{
		background:none ;
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
	.btn-primary{
		margin-right:20px;
		
	}
</style>
</head>

</body>
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
					  <span class="input-group-btn ">
					    <button type="submit" class="btn btn-primary " name="search">Go!</button>
						<button type="submit" class="btn btn-primary active" style="background-color:grey;"name="list">UsersList</button>
       			      </span>
					</div>
				  </div>
				</form>
				</nav>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav" >
			   
                <li><a  href="index.php">Home </a></li>
                <li><a  href="#"> Posts </a></li>
				<li><a  href="#"> Jobs</a></li>
				<li><a  href="#"> Messages</a></li>
				<li><a href="logout.php">Logout</a></li>
				</ul>
            </div>
            
    </nav>
    </div>
    </div>
</div> 

<div class="container">
        <h1></h1>
</div> 


<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 

</body>
</html>