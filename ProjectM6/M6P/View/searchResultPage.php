<?php
session_start();
require_once 'includes/autoload.php';
use M6P\Models\util\DBUtil;
use M6P\Controller\UserManager;
use M6P\Models\entity\User;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ABC PVT LTD</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
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
		width:500px;
		height:500px;
		
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
.cell2
{
	height:100%
}
.cell3 
{
	height:100%
}
}
</style>
</head>
<body>
<div class="container-fluid"> 
<?php include 'includes/header.php';?>
</div>
<div class="container">
<?php 
if(isset($_SESSION['searchvalue']))
	{
		$searchvalue = $_SESSION['searchvalue'];
		$UM=new UserManager();
        $users=$UM->getUserBySearch($searchvalue);
		if(isset($users))
		{?>
			<div class="container">
			<?php 
	require 'includes/header.php';
			?>
			</div>
			<div class="container">
			<?php
			foreach ($users as $user) 
			{
				if($user!=null)
				{?>
					<div class="row">
					<div clas="col-md-12">
					<div class="">
						<div class="col-md-3 cell1">
							<img src="image/profile.jpg"class="img-square" width="50" height="50" style="padding-top:5px;">
						</div>
						<div class="col-md-6 cell2">
							
							<h6><?php echo $user->firstname;?></h6>
							<h6><?php echo $user->lastname;?></h6>
							<h6><?php echo $user->email;?></h6>
							<h6><?php echo $user->job;?></h6>
							<h6><?php echo $user->companyname; ?></h6>
							<h6><?php echo $user->city; ?></h6>
							<h6><?php echo $user->country;?></h6>
						</div>
						<div class="col-md-3 cell3">
							<br>
							<button class="btn-Primary" name="Connect">Connect</button>
							</br>
						</div>
					</div>
					</div>
					</div>
				<?php
				}
			} 
			?>
			</div>
		<?php
		}
	}
	?>
</div>
<div class="container"> 
	<?php include 'includes/footer.php'; ?>
</div>
</body>
</html>