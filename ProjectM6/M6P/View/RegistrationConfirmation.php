<?php
session_start();
use M6P\Models\util\DBUtil;
use M6P\Controller\UserManager;
use M6P\Models\entity\User;

require_once 'includes/autoload.php';
$formerror="";
$firstname="";
$lastname="";
$email="";
$upassword="";
$job="";
$companyname="";
$city="";
$country="";



if(isset($_REQUEST["Confirm"])){
	
	    
		$firstname=$_REQUEST["FirstName"];
		$lastname=$_REQUEST["LastName"];
		$email=$_REQUEST["Email"];
		$upassword=$_REQUEST["Password"];
		$job=$_REQUEST["Job"];
		$companyname=$_REQUEST["CompanyName"];
		$city=$_REQUEST["City"];
		$country=$_REQUEST["Country"];
		
		if($firstname!='' && $lastname!='' && $email!='' && $upassword!='' && $job!='' && $companyname!='' && $city!='' && $country!='')
		{
			$UM=new UserManager();
			$user=new User();
			$user->firstname=$firstname;
			$user->lastname=$lastname;
			$user->email=$email;
			$user->upassword=$upassword;
			$user->job=$job;
			$user->companyname=$companyname;
			$user->city=$city;
			$user->country=$country;
			
			$existuser=$UM->getUserByEmail($email);
		
			if(!isset($existuser)){
				// Save the Data to Database
				$UM->saveUser($user);
				header('Location:registerthankyou.php');
			}
			else{
				$formerror="User Already Exist";
			}
		}else{
			$formerror="Please fill in the fields";
		}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
<title>Login page</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.14.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.4.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src = "js/registration.js"></script>
</head>

<body>
 <div class="container-fluid">
    <div class="row">
    <div class="col-md-14">
    <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#rightmenu" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <img src="image/u22.png" width="50" height="50"  /> 
            </div>
            <div class="collapse navbar-collapse navbar-right" id="rightmenu">
            <ul class="nav navbar-nav" >
                <li><a  href="frontpage.php"> Home </a></li
            </ul>
            </div>
            
    </nav>
    </div>
    </div>
 </div>


 <div class="container ">
    	<form  id="loginform" class=" cent regiForm" action="" method="post" >
            <center><h5 style="color:DarkBlue">Confirm your Entries</h5></center><br>
			<div id="err"></div>
			
			<div class="col-md-9">
				<div class="row">
				<div class="form-group" >
					<label for  ="txt_FirstName" class="control-label col-md-3" col-form-label>FirstName</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-md" id="txt_FirstName"  name="FirstName" value="<?php echo $_SESSION['firstname']; ?>" ><br>
					</div>
				</div>
				</div>	
			
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_LastName" class="control-label col-md-3" col-form-label>LastName</label>
						<div class="col-md-6 .row-bottom-margin">
							<input type="text" class="form-control input-md" id="txt_LastName"  name="LastName" value="<?php echo $_SESSION['lastname'];?>" ><br>
						</div>
				</div>
				
				</div>		
				<div class="row">
				<div class="form-group" >
					<label for  ="txt_email" class=" control-label col-md-3" col-form-label>Email</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Email"  name="Email" value="<?php echo $_SESSION['email'];?>" ><br>
						</div>
				</div>
				</div>		
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_password" class="control-label col-md-3" col-form-label>Password</label>
						<div class="col-md-6">
							<input type="password" class="form-control input-md" id="txt_password"  name="Password" value="<?php echo $_SESSION['upassword'] ;?>" ><br> 
           				</div>
				</div>
				</div>							
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_Job" class="control-label col-md-3" col-form-label>Job</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Job"  name="Job" value="<?php echo $_SESSION['job'];?>" ><br> 
           				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_CompanyName"  class=" control-label col-md-3" col-form-label>Company Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-sm" id="txt_CompanyName"  name="CompanyName" value="<?php echo $_SESSION['companyname'];?>" >
           			</div>
				</div>
				</div>		
				
				<div class="row">
				<div class="form-group  ">
					<label for  ="txt_City" class=" control-label col-md-3" col-form-label>City</label>
						<div class="col-md-6">
								<input type="text" class="form-control input-md" id="txt_City"  name="City" value="<?php echo $_SESSION['city'];?>" ><br> 
           				</div>
				</div>
				</div>	
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_Country" class="control-label col-md-3" col-form-label>Country</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Country"  name="Country" value="<?php echo $_SESSION['country'];?>" ><br> 
           				</div>
				</div>
				</div>
				<div class="row">
				<div class="form-group " >
						<div class="col-md-8">
							<div class='btn-group'>
							 <button class="btn-Primary " name= "Confirm" onclick="return formValidation();">Confirm</button>
							 <input type="reset" value="Cancel" class="btn-Primary onclick="javascript:clearForm();"">
							</div>
           				</div>
				</div>
				</div>
				
			</div>
			
		</form> 
</div>        
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>