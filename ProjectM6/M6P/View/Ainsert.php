<?php
$connect = mysqli_connect("localhost", "root", "krdept12", "m6project");
$sql = "INSERT INTO jobs(Title,Salary,Job_Description,Location,Qualifications,Employer,website) VALUES('".$_POST["Title"]."', '".$_POST["Salary"]."' , '".$_POST["Job_Description"]."' , '".$_POST["Location"]."' , '".$_POST["Qualifications"]."' , '".$_POST["Employer"]."' , '".$_POST["website"]."')";
if(mysqli_query($connect, $sql))
{
    echo 'Data Inserted';
}
?> 