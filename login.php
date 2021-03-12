<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<form method="post">
	<div>
		<label>Username</label>
		<input type="email" name="user" required>
</div>
<div>
		<label>Password</label>
		<input type="Password" name="pass" required>
</div>
<div>
		<input type="submit" name="btn">
</div>
</form>
</body>
</html>

<?php
if(isset($_POST['btn']))
{
	session_start();
	require_once "connect.php";
	$q="select uid,fullname from tblusers 
	where email='$_POST[user]' 
	and password='$_POST[pass]'";
	$result=mysqli_query($con,$q);
	if($result==false)
	{
		$err = mysqli_error($con);
		echo "<p>ERROR : $err</p>";
	}
	else
	{
		$userdata = mysqli_fetch_assoc($result);
		if($userdata==null)
		{
			echo "<p>ERROR : Invalid Login<p>";
		}
		else
		{
			$_SESSION['username'] = $userdata['fullname'];
			$_SESSION['userid'] = $userdata['uid'];

			$q="update tblusers set loginstatus=1
			where uid=$_SESSION[userid]";

			mysqli_query($con,$q);
			header("Location:index.php");
		}
	}
}
?>