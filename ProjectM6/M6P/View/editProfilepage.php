<?php
require_once 'includes/autoload.php';
use M6P\Models\util\DBUtil;
use M6P\Controller\UserManager;
use M6P\Models\entity\User;
ob_start();
require_once 'includes/security.php';

$formerror="";
$firstname="";
$lastname="";
$email= $_GET["updateUseremail"];
$password="";
$job="";
$companyname="";
$city="";
$country="";


if(isset($_GET["updateUseremail"])){
		
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($_GET["updateUseremail"]);
    $firstname=$existuser->firstName;
	$lastname=$existuser->lastName;
	$email=$existuser->email;
	$password=$existuser->password;
	$job=$existuser->job;
	$companyname=$existuser->companyname;
	$city=$existuser->city;
	$country=$existuser->country;

		if($firstname!='' && $lastname!='' && $email!=''  && $job!='' && $companyname!='' && $city!='' && $country!='')
		{
			$UM=new UserManager();
			$existuser=$UM->getUserByEmail($_GET["updateUseremail"]);
			$existuser->firstName=$_REQUEST['firstname'];
			$existuser->lastName=$_REQUEST['lastname'];
			$existuser->email=$_REQUEST['email'];			
			$existuser->job=$_REQUEST['job'];
			$existuser->companyname=$_REQUEST['companyname'];
			$existuser->city=$_REQUEST['city'];
			$existuser->country=$_REQUEST['country'];
			$UM->saveUser($existuser);
				   
		}
 }else{
      $formerror="Record Not Found !......";
  }
  

if (isset($_REQUEST['search'])) {
	$searchvalue =  $_REQUEST['txtSearch'];
	$_SESSION['searchvalue'] = $searchvalue ;
	header('Location:successlogin.php');
}   
?>   
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

<?php include 'includes/header.php';?>
</div>


 <div class="container ">
    	<form  id="loginform" class=" cent regiForm" action="" method="post" >
            <center><h5 style="color:white">Hi<span style="color:blue"> <?=$_GET["updateUseremail"];?> </span> you can update your details </h5></center><br>
			
			<div id="err"></div>
			<div id="error"><?=$formerror?></div>
			
			<div class="col-md-9">
				 
				<div class="row">
				<div class="form-group" >
					<label for  ="txt_FirstName" class="control-label col-md-3" col-form-label>FirstName</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-md" id="txt_FirstName"  name="FirstName" value="<?=$firstname?>" ><br>
					</div>
				</div>
				</div>	
			
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_LastName" class="control-label col-md-3" col-form-label>LastName</label>
						<div class="col-md-6 .row-bottom-margin">
							<input type="text" class="form-control input-md" id="txt_LastName"  name="LastName" value="<?=$lastname?>" ><br>
						</div>
				</div>
				</div>
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_LastName" class="control-label col-md-3" col-form-label>Email</label>
						<div class="col-md-6 .row-bottom-margin">
							<input type="text" class="form-control input-md" id="txt_LastName"  name="Email" value="<?=$email?>" ><br>
						</div>
				</div>
				</div>
				
				
												
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_Job" class="control-label col-md-3" col-form-label>Job</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Job"  name="Job" value="<?=$job?>" ><br> 
           				</div>
				</div>
				</div>
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_CompanyName"  class=" control-label col-md-3" col-form-label>CompanyName</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-sm" id="txt_CompanyName"  name="CompanyName" value="<?=$companyname?>" ><br>
           			</div>
				</div>
				</div>		
				
				<div class="row">
				<div class="form-group  ">
					<label for  ="txt_City" class=" control-label col-md-3" col-form-label>City</label>
						<div class="col-md-6">
								<input type="text" class="form-control input-md" id="txt_City"  name="City" value="<?=$city?>" ><br> 
           				</div>
				</div>
				</div>	
				
				<div class="row">
				<div class="form-group " >
					<label for  ="txt_Country" class="control-label col-md-3" col-form-label>Country</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-md" id="txt_Country"  name="Country" value="<?=$country?>" ><br> 
           				</div>
				</div>
				</div>
				<div class="row">
				<div class="form-group " >
						<div class="col-md-8">
							<div class='btn-group'>
								 <input type="hidden" name="submitted" value="1">
								 <button class="btn-Primary " name= "update" onclick="return formValidation();">update</button>
								 <input type="reset" value="Cancel" class="btn-Primary onclick="javascript:clearForm();"">
							</div>
           				</div>
				</div>
				</div>				
				</div>
				
		</form> 
</div>        
<div class="container"> 
	<?phProjectM6 'includes/footer.php';?>
</div>
 </body>
</html>