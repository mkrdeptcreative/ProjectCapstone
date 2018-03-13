<?php
$con=new mysqli('localhost','root','krdept12','m6project');

if($con->connect_errno){
    echo $con->connect_error;
    die();
}
else
{
    echo "database connected";

}