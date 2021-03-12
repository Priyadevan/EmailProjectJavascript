<?php
$con=mysqli_connect("localhost","root","","phpprojectdb");
if(!$con)
{
	$errmsg = mysqli_connect_error($con);
	die("<p>ERROR : $errmsg</p>");	
}
?>