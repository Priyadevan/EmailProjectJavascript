<html>
<head>
<title>Shopping Cart</title>
<link rel="stylesheet"type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<h1>Online Users</h1>
<?php
$q="select fullname from tblusers where loginstatus=1";
$result=mysqli_query($con,$q);
$users  = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<ul>";
foreach ($users as $user) {
	echo "<li>$user[fullname]</li>";
}
echo "</ul>";
?>

<hr>

<h1>All Users</h1>
<?php
$q="select fullname,loginstatus from tblusers";
$result=mysqli_query($con,$q);
$users  = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<ul>";
foreach ($users as $user) {
	if($user['loginstatus']==1)
	{
		$csscls="online";
	}
	else
	{
		$csscls="offline";
	}
	echo "<li class=$csscls>$user[fullname]</li>";
}
echo "</ul>";
?>