<?php
session_start();
use M6P\Controller\JobManager;
use M6P\Controller\UserManager;
use M6P\Models\util\DBUtil;
use M6P\Models\entity\Job;
require_once 'includes/autoload.php';
require 'config.php';

if (isset($_POST['submit']))
{
    $name=$_POST['name'];
    $com=$_POST['comment']; 
    
    if($name!="" && $com!=="")
    {
        $sql="insert into comments(name, comment,time) values('$name','$com',NOW())";
        $con->query($sql);
        header('Location: http://localhost/ProjectM6/M6P/View/comment.php');
        
    }

}
?>
