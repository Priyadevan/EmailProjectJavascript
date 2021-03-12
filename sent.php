<html>
<head>
<title>Shopping Cart</title>
<link rel="stylesheet"type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<h1>Sent Items</h1>
<?php
//DELETE MAIL CODE
if(isset($_POST['btn']) && $_POST['btn']=="Delete")
{
$q="update tblmessages set sentvisibility=0 where mid=$_POST[msgid]";
mysqli_query($con,$q);
}
?>


<?php
$q="select mid,fullname,subject,dtime from tblmessages 
	 inner join tblusers on uid=toid
	where fromid=$_SESSION[userid] and sentvisibility=1
	order by dtime desc";
$result=mysqli_query($con,$q);
$mails = mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($mails);
?>

<table>
	<tr>
		<th>TO</th> <th>SUBJECT</th> <th>DATETIME</th>
	</tr>

	<?php
	foreach ($mails as $mail) {
		echo "<tr>
			<td>$mail[fullname]</td>
			<td>$mail[subject]</td>
			<td>$mail[dtime]</td>
			<td><a href='?msg=$mail[mid]&ch=sview'>View</a></td>
			<td>
				<form method='post'>
				<input type='hidden' name='msgid' value='$mail[mid]'>
				<input type='submit' value='Delete' name='btn'>
				</form>
			</td>
			</tr>";
	}
	?>
</table>
