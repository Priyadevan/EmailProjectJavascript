<html>
<head>
<title>Shopping Cart</title>
<link rel="stylesheet"type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<h1>Inbox</h1>
<?php
$q="select mid,fullname,subject,dtime from tblmessages 
	 inner join tblusers on uid=fromid
	where toid=$_SESSION[userid] and inboxvisibility=1
	order by dtime desc";
$result=mysqli_query($con,$q);
$mails = mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($mails);
?>


<table>
	<tr>
		<th>FROM</th> <th>SUBJECT</th> <th>DATETIME</th>
	</tr>

	<?php
	foreach ($mails as $mail) {
		echo "<tr>
			<td>$mail[fullname]</td>
			<td>$mail[subject]</td>
			<td>$mail[dtime]</td>
			</tr>";
	}
	?>
</table>