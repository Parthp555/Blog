<?php
	if(isset($_GET['send'])){
	$from = $_POST['mail'];
	if(filter_var($from,FILTER_VALIDATE_EMAIL)){
		$msg = "<html><body>From:".$from."<p>".$_POST['msg']."</body></html>";
		$msg = wordwrap($msg,70);
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail("mailit987@gmail.com",$_POST['subject'],$msg,$headers);
		echo "<script>alert('Your query has been submitted')</script>";}
	else
		echo "<script>alert('Invalid Email address')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Contact Us
	</title>
	<script src='tinymce/tinymce.min.js'></script>
  	<script>
  	tinymce.init({
    	selector: 'textarea',
			menubar: false
  	});
  	</script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
	<div class="header"><h2 title="Welcome to MyBlog">MyBlog</h2>
			<p style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;Express your views</p>
	</div>
	<br>
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<li><a href="profile.php">My Profile</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
		</ul>
	</div>
	<br>
	<form class = "contact" action = "contactUs.php?send=1" method="post" onsubmit="return check()">
		<label>E-mail:</label><input type="text" name="mail" id="mail">
		<label>Subject:</label><input type="text" name="subject" id="subject">
		<textarea rows="20" cols="40" name = "msg" id="msg">
		</textarea><p>
		<button type="submit">Send</button>
	</form>
	<script type="text/javascript">
		function check() {
			var sub = document.getElementById('subject').value;
			var msg = document.getElementById('msg').value;
			if(sub==''){
				alert('Subject can\'t be blank');
				return false;
			}
   			return true;
		}
	</script>
</body>
</html>
