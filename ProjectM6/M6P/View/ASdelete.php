<?php
$dbc = mysqli_connect('localhost','root','krdept12','m6project')
or die('Error connecting to MySQL server');

$query = "select * from tb_user";

$result = mysqli_query($dbc,$query)
or die('Error querying database');

$count=mysqli_num_rows($result);

if(isset($_POST['search']))
{
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email= $_POST['email'];   
    
    $query = "SELECT * FROM `tb_user` WHERE firstname LIKE '%".$firstname."%' and
               lastname LIKE '%".$lastname."%' and email LIKE '%".$email."%'";
    $result = filterTable($query);
    
}
else {
    $query = "SELECT * FROM `tb_user`";
    $result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "krdept12", "m6project");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<?php 
mysql_connect('localhost', 'root', 'krdept12') or die(mysql_error());
mysql_select_db("m6project") or die(mysql_error());

if (isset($_GET['id'])) {
$id=$_GET['id'];    

$query = mysql_query("SELECT * FROM tb_user WHERE id = '$id'") or die(mysql_error());

if(mysql_num_rows($query)>=1){
    while($row = mysql_fetch_array($query)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];        
        $job=$row['job'];
        $companyname=$row['companyname'];
        $city=$row['city'];
        $country=$row['country'];
    }
}

?>
<form action="ASUpdate.php" method="POST">
<input type="hidden" name="id" value="<?=$id;?>">
<b>First Name:    <input type="text" name="firstname"  style="margin-left: 80px;"value="<?=$firstname;?>"><br>
<b>Last Name:     <input type="text" name="lastname"  style="margin-left: 80px;"value="<?=$lastname?>"><br>
<b>Email:         <input type="text" name="email"  style="margin-left: 115px;"value="<?=$email?>"><br>
<b>Jobs:          <input type="text" name="job"  style="margin-left: 120px;"value="<?=$job?>"><br>
<b>Company Name:  <input type="text" name="companyname"  style="margin-left: 48px;"value="<?=$companyname?>"><br>
<b>City:          <input type="text" name="city"  style="margin-left: 127px;"value="<?=$city?>"><br>
<b>Country:       <input type="text" name="country"  style="margin-left: 100px;"value="<?=$country?>" ><br><br>


<input type="Submit" value="update" style="margin-left: 200px; background-color: orange;"><br><br>
</form>
<?php
}
else{
   //echo 'please give ?id=(record number) in the url to edit the record';
}
?>

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
		margin-top: 60px;
	}
	
	input[type="text"]{
		margin-top:5px ! important;
		height:20px; !important;
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
							<li><a href="APost.php">Post Jobs</a></li>
							<li><a href="AjobListPage.php">Job List</a></li>
							<li><a href="Aindex1.php">Delete Jobs</a></li>
							
						</ul>	
				</li>			
				<li><a href="Asdelete.php">User</a></li>
                <li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Email<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sucessemail.php">ComposeEmail</a></li>
							<li><a href="bulkemailpage.php">SendBulkMails</a></li>
							
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
</head>
    <body style="margin-left:50px;">        
        <form action="ASdelete.php" method="post">
        	
            <b>First Name <input type="text" name="firstname" >
            <b>Last Name <input type="text" name="lastname" >
           <b> Email <input type="text" name="email" >
            
            <input type="submit" style="background-color:orange;" name="search" value="Search" >            
            <br><br>
                           
<?php echo '<marquee><span style="color:blue;">please give </span><span style="color:red;">?id=(record number)</span><span style="color:blue;"> in the url to <b>edit</b> the record</span></marquee><br><br>';?>
<table width="600" border="0" cellspacing="5" cellpadding="5">
<tr>
<td><form name="form1" method="post" action="">
<table width="600" border="0" cellpadding="4" cellspacing="5" >
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>FirstName</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>LastName</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Email</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>jobs</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>companyname</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>city</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>country</strong></td>
</tr>
<?php

while ($row=mysqli_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $row['id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $row['id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['firstname']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['lastname']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['email']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['job']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['companyname']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['city']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['country']; ?></td>

</tr>

<?php
}
?>
<td colspan="8" align="right" bgcolor="#FFFFFF"><input name="delete" type="submit" value="Delete" style="background-color:red;"></td>
</tr>



<?php

// Check if delete button active, start this 

if(isset($_POST['checkbox']))
{
    $checkbox = $_POST['checkbox'];

    for($i=0;$i<count($checkbox);$i++){

    $del_id = $checkbox[$i];
    $sql = "DELETE  FROM tb_user WHERE id='$del_id'";
    echo "<span style=color:blue><h3>".$sql."</span> click delete, the record will be delete successfully.</h3>";
    $result = mysqli_query($dbc,$sql);
    echo $result;    
    
}
mysqli_close($dbc);
}

?>
</table>
</form>
<div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>
