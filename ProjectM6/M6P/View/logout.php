<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['searchvalue']);
session_destroy();

header("Location: login.php");
exit;
?>