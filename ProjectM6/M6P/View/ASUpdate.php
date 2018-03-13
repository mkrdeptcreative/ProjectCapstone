<!DOCTYPE html>
<html>
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
		margin-top: 50px;
	}
	
	input[type="text"]{
		margin-top:5px ! important;
		height:10px; !important;
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
	

table,tr,th,td
{
background-color:lightblue;
border: 1px solid black;
width:1200px;
}
</style>

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
<body style="margin-left:50px;">

<?php
$id = $_REQUEST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$job = $_POST["job"];
$companyname = $_POST["companyname"];
$city = $_POST["city"];
$country = $_POST["country"];

mysql_connect('localhost', 'root', 'krdept12') or die(mysql_error());


mysql_select_db("m6project") or die(mysql_error());

$query = "UPDATE tb_user SET firstname = '$firstname', lastname = '$lastname',
email = '$email',job='$job',companyname='$companyname', city='$city',country='$country' WHERE id = '$id'";

$res = mysql_query($query);

if ($res)
    echo "<p align=center><h4>Record Updated Successfully! Click here <a href='frontpage.php'>Home</a> to HomePage<p></h4>";
    else
        echo "Problem updating record. MySQL Error: " . mysql_error();
        ?>
		<div class="container"> 
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>
