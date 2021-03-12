<html>
<head>
<title>Shopping Cart</title>
<link rel="stylesheet"type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<h1>New Message Compose</h1>
<form method="post" onSubmit="return composevalidate()">
	<div>
		<label>To</label>
		<select name="to" id="to">
			<?php
			$q="select fullname,uid from tblusers 
				where uid!=$_SESSION[userid]
				 order by fullname asc";
			$result=mysqli_query($con,$q);
			$users = mysqli_fetch_all($result,MYSQLI_ASSOC);
			echo "<option>Choose</option>";
			foreach ($users as $user) 
			{

				echo "<option value=$user[uid]>
					$user[fullname]
					</option>";
			}
			?>
		</select>
	</div>	

	<div>
		<label>Subject</label>
		<input type="text" name="subject" required maxlength="100">
	</div>
	
	<div>
		<label>Message</label>	
		<textarea name="msg" required  maxlength="1000" rows="6"></textarea>
	</div>
	<div>
		<input type="submit" value="Send" name="btn">
	</div>	
</form>
<?php
//var_dump($_POST);

if(isset($_POST['btn']) && $_POST['btn']=='Send')
{
	$q="insert into tblmessages (fromid, toid,subject,dtime,message)
		values(
				$_SESSION[userid],
				$_POST[to],
				'$_POST[subject]',
				now(),
				'$_POST[msg]'
			)";

	$result=mysqli_query($con,$q);
	if($result==true)
	{
		echo "<p id='alertmsg'>Message Sent</p>";
	}
}
?>
<script src="checkvalues.js"></script>
<script>
	setTimeout(hidemessage,3000);
</script>