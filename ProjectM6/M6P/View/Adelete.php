<?php
$connect = mysqli_connect("localhost", "root", "krdept12", "m6project");
$sql = "DELETE FROM jobs WHERE id = '".$_POST["id"]."'";
if(mysqli_query($connect, $sql))
{
    echo 'Data Deleted';
}
?>