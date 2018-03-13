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
<div class="header"><h2 title="Welcome to MyBlog">MyBlog</h2>
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
	<form action = "register.php?reg=1" method="post" class = "reg">
		<label>Name:</label><input type="text" name="name" placeholder="Jhon Doe"><p>
        <label>Username:</label><input type = "text" name = "userID" placeholder="Search user.doe123"><p>
		<label>Password:</label><input type="password" name="pswd" placeholder="xxxx"><p>
		<label>E-Mail:</label><input type="text" name="mail" placeholder="jhonedoe@mail.com"><p>
		<label>Birthdate:</label><input type="date" name="bday"><p>
		<label>Profession:</label><input type="text" name="job" placeholder="Student"><p>
		<label>Current City:</label><input type="text" name="city" placeholder="London"><p>
		<button type="submit">REGISTER</button>
	</form>
</body>
</html>
