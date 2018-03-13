<?php
    if($_GET['reg']==1){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";
        $conn = new mysqli($servername, $username, $password,$dbname);
        if ($conn->connect_error) {
            header("location:error.php");
            exit();
        }
        $sql = "SELECT * from users where userID like'".$_POST['userID']."' or mail like '".$_POST['mail']."';";
        $res = $conn->query($sql);
        if($res->num_rows==0){
            $sql = "INSERT into users (`userID`,`password`,`name`,`mail`,`birthdate`,`profession`,`city`) values('".$_POST['userID']."','".$_POST['pswd']."','".$_POST['name']."','".$_POST['mail']."','".$_POST['bday']."','".$_POST['job']."','".$_POST['city']."');";
            $conn->query($sql);
            session_start();
            $_SESSION['reg']=true;


            $msg = "Please click the following link for E-mail verification.\n http://127.0.0.1/verify.php?userID=".$_POST['userID']."\nGreetings,\nMyBlog";
            $msg = wordwrap($msg,70);
            mail($_POST['mail'],"MyBlog : Account Verification",$msg);
            header("location:index.php");
            exit();
        }
    $conn->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div class="header"><h2> MyBlog</h2>
            <p style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;Express your views</p>
    </div>
    <br>
    <div class = "menu">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contactUs.php">Contact Us</a></li>
        <li><a href="login.php?count=0">Login</a></li>
        </ul>
    </div>
    <br>
	<?php
		if($_GET['reg']==1)
			echo "<h1>Invalid details.Please check the form.</h1>";
			?>
	<form action = "register.php?reg=1" method="post" class = "reg" onsubmit="return check()">
		<label>Name:</label><input type="text" name="name" placeholder="Name" id="name"><p>
    <label>Username:</label><input type = "text" name = "userID" placeholder="eg.name123" id="userID"><p>
		<label>Password:</label><input type="password" name="pswd" placeholder="Password" id="pswd"><p>
		<label>E-Mail:</label><input type="E-mail" name="mail" placeholder="eg.abc@gmail.com" id="mail"><p>
		<label>Birthdate:</label><input type="date" name="bday" id="bday"><p>
		<label>Profession:</label><input type="text" name="job" placeholder="Student" id="job"><p>
		<label>Current City:</label><input type="text" name="city" placeholder="Surat" id="city"><p><br>
		<button type="submit">REGISTER</button>
	</form>
  <script type="text/javascript">
 		function check() {
 			var name = document.getElementById('name').value;
 			var pswd = document.getElementById('pswd').value;
      var user = document.getElementById('userID').value;
      var mail = document.getElementById('mail').value;
      var bday = document.getElementById('bday').value;
      var job = document.getElementById('job').value;
      var city = document.getElementById('city').value;
 			if(user=='' || pswd == '' || name=='' || mail=='' || bday=='' || job=='' || city==''){
 				alert("Invalid/Insufficient Form Data");
 			 	return false;
 			 }
       var atpos=mail_value.indexOf("@");
       var dotpos=mail_value.lastIndexOf(".");
       if(atpos<1 || dotpos<atpos+2 || dotpos+3>mail_value.length){
         alert("E-mail is incorrect..");
         return false;
       }
 			return true;
 		}
 	</script>
</body>
</html>
