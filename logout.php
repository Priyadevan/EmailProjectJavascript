<?php
session_start();
require_once "connect.php";
$q="update tblusers set loginstatus=0
			where uid=$_SESSION[userid]";
			
mysqli_query($con,$q);
session_destroy();
header("Location:login.php");
?>