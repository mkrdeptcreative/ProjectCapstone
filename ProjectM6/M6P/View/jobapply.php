<?php
//session_start();
use M6P\Controller\UserManager ;
require_once 'includes/autoload.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ABC PVT LTD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/portalstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
    <style>
	
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
     
<div style="margin-top:50px;">
<center>
<form action="//submit.form" id="EmploymentApplication100" method="post" onsubmit="return ValidateForm(this);">
<table border="0" cellpadding="5" cellspacing="0">
<tr> <td style="width: 50%">
<label for="First_Name"><b>First name *</b></label><br />
<input name="First_Name" type="text" maxlength="50" style="width: 260px" />
</td> <td style="width: 50%">
<label for="Last_Name"><b>Last name *</b></label><br />
<input name="Last_Name" type="text" maxlength="50" style="width: 260px" />
</td> </tr> <tr> <td colspan="2">
<label for="Email_Address"><b>Email *</b></label><br />
<input name="Email_Address" type="text" maxlength="100" style="width: 535px" />
</td> </tr> <tr> <td colspan="2">
<label for="Portfolio"><b>Portfolio website</b></label><br />
<input name="Portfolio" type="text" maxlength="255" value="http://" style="width: 535px" />
</td> </tr> <tr> <td colspan="2">
<label for="Position"><b>Position you are applying for *</b></label><br />
<input name="Position" type="text" maxlength="100" style="width: 535px" />
</td> </tr> <tr> <td>
<label for="Salary"><b>Salary requirements</b></label><br /> <input name="Salary" type="text" maxlength="50" style="width: 260px" /> </td> <td>
<label for="StartDate"><b>When can you start?</b></label><br />
<input name="StartDate" type="text" maxlength="50" style="width: 260px" />
</td> </tr> <tr> <td>
<label for="Phone"><b>Phone *</b></label><br />
<input name="Phone" type="text" maxlength="50" style="width: 260px" />
</td> <td>
<label for="Fax"><b>Fax</b></label><br />
<input name="Fax" type="text" maxlength="50" style="width: 260px" />
</td> </tr> <tr> <td colspan="2">
<label for="Relocate"><b>Are you willing to relocate?</b></label><br />
<input name="Relocate" type="radio" value="Yes" checked="checked" /> Yes      
<input name="Relocate" type="radio" value="No" /> No      
<input name="Relocate" type="radio" value="NotSure" /> Not sure
</td> </tr> <tr> <td colspan="2">
<label for="Organization"><b>Last company you worked for</b></label><br />
<input name="Organization" type="text" maxlength="100" style="width: 535px" />
</td> </tr> <tr> <td colspan="2">
<label for="Reference"><b>Reference / Comments / Questions</b></label><br />
<textarea name="Reference" rows="7" cols="40" style="width: 535px"></textarea>
</td> </tr> <tr> <td colspan="2" style="text-align: center;">
<div style="float: right"> <a href="https://www.100forms.com" id="lnk100" title="form to email">form to email</a></div>
<script src="https://www.100forms.com/js/FORMKEY:K85TQKT8QJ5N/SEND:my@email.com" type="text/javascript"></script>
<input name="skip_submit" type="submit" value="Send Application" />
</td> </tr>
</table>
</form>
</center>
</div>

<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>