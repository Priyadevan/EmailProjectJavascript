<html>
<head>
<title>Shopping Cart</title>
<link rel="stylesheet"type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<h1>Sent Message</h1>
<?php
$q="select mid,fullname,subject,dtime,message from tblmessages 
	 inner join tblusers on uid=toid
	where mid=$_GET[msg]";
$result=mysqli_query($con,$q);
$mail = mysqli_fetch_assoc($result);
//var_dump($mail);
?>

<article>
	<p>
			<strong>FROM</strong> 
			<?php echo $mail['fullname']; ?>
	</p>

	<p>
			<strong>SUBJECT</strong> 
			<?php echo $mail['subject']; ?>
	</p>

	<p>
			<strong>DATE TIME</strong> 
			<?php echo $mail['dtime']; ?>
	</p>

	<p>
			<strong>MESSAGE</strong> 
			<?php echo $mail['message']; ?>
	</p>
	<form method='get'>
	<input type="hidden" name="msgid" value="<?php echo $mail['mid']; ?>">
	<input type="submit" value="Delete" name="ch">
	</form>
</article>