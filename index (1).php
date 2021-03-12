<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header("Location:login.php");
}
require_once "connect.php";			
?>
<!DOCTYPE html>

<html>
<head>
	<title>Home</title>
	<link href="styles.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	
</head>
<body>
	<header>
		<h1>Index Page</h1>
		<p>Welcome <?php echo $_SESSION['username']; ?> </p>
	</header>

	<nav>		
		<a href="?ch=in">Inbox</a>
		<a href="?ch=out">Sent</a>
		<a href="?ch=new">Compose</a>
		<a href="logout.php">Logout</a>
	</nav>
	<aside>
		<?php include "onlineusers.php"; ?>
	</aside>
	<main>
		<?php
		if(isset($_GET['ch']))
		{
			switch($_GET['ch'])
			{
				case 'in': include "inbox.php"; break;
				case 'Delete': 	
								$q="update tblmessages 
									set sentvisibility=0 
									where mid=$_GET[msgid]";
								mysqli_query($con,$q);
				case 'out': include "sent.php"; break;
				case 'new': include "compose.php"; break;
				case 'sview': include "sentview.php"; break;
			}
		}
		else
		{
			include "inbox.php";
		}
		?>
	</main>
	<script src="checkvalues.js"></script>
</body>
</html>