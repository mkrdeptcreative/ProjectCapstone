<?php
//session_start();
use M6P\Controller\JobManager;
use M6P\Controller\UserManager;
use M6P\Models\util\DBUtil;
use M6P\Models\entity\Job;
require_once 'includes/autoload.php';
//require 'config.php';
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



      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Job Apply</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
     
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"Aselect.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var Title = $('#Title').text();  
		   var Salary = $('#Salary').text(); 
		   var Job_Description = $('#Job_Description').text(); 
		   var Location = $('#Location').text(); 
		   var Qualifications = $('#Qualifications').text(); 
		   var Employer = $('#Employer').text(); 
		   var website= $('#website').text();          
           if(Title == '')  
           {  
                alert("Enter Title");  
                return false;  
           }  
           if(Salary == '')  
           {  
                alert("Enter Salary");  
                return false;  
           }  
		   if(Job_Description == '')  
           {  
                alert("Enter Job_Description");  
                return false;  
           }  
		   if(Location == '')  
           {  
                alert("Enter Location");  
                return false;  
           }  
		   if(Qualifications == '')  
           {  
                alert("Enter Qualifications");  
                return false;  
           }  
		   if(Employer == '')  
           {  
                alert("Enter Employer");  
                return false;  
           }  
		   if(website == '')  
           {  
                alert("Enter website");  
                return false;  
           }  
           $.ajax({  
                url:"Ainsert.php",  
                method:"POST",  
                data:{Title:Title, Salary:Salary,Job_Description:Job_Description,Location:Location,Qualifications:Qualifications,Employer:Employer,website:website},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      }); 
      
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"Aedit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.Title', function(){  
           var id = $(this).data("id1");  
           var Title = $(this).text();  
           edit_data(id, Title, "Title");  
      });  
      $(document).on('blur', '.Salary', function(){  
           var id = $(this).data("id2");  
           var Salary = $(this).text();  
           edit_data(id,Salary, "Salary");  
      });  
	  $(document).on('blur', '.Job_Description', function(){  
           var id = $(this).data("id3");  
           var Job_Description = $(this).text();  
           edit_data(id,Job_Description, "Job_Description");  
      });  
	  $(document).on('blur', '.Location', function(){  
           var id = $(this).data("id4");  
           var Location = $(this).text();  
           edit_data(id,Location, "Location");  
      });  
	  $(document).on('blur', '.Qualifications', function(){  
           var id = $(this).data("id5");  
           var Qualifications = $(this).text();  
           edit_data(id,Qualifications, "Qualifications");  
      });  
	  $(document).on('blur', '.Employer', function(){  
           var id = $(this).data("id6");  
           var Employer = $(this).text();  
           edit_data(id,Employer, "Employer");  
      });  
	  $(document).on('blur', '.website', function(){  
           var id = $(this).data("id7");  
           var website = $(this).text();  
           edit_data(id,website, "website");  
      }); 
	  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id8");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"Adelete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });                 
           }  
      });
      
      
 });  
 </script>
 
 <div class="container"> 
	<?php include 'includes/footer.php';?>
</div> 
</body>
</html>

 