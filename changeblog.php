<?php
    session_start();
    $email = $_SESSION['email'];
    $blog_title = $_POST['title'];
    $conn = mysqli_connect('localhost','root','','Blog');
    $sql = "SELECT * FROM user_blogs WHERE Blog_title = '$blog_title'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $file = $row['Blog_text'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <link rel="stylesheet" type="text/css" href="Css/changeblog.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-print fa-lg" aria-hidden="true"></i>&nbsp;<a href="">Print</a></li>
                        <!--<li><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="login.php">Edit Blogs</a></li>
                        <li><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<a href="login.php">Profile</a></li>-->
                    </ul>
                </div>
            <form method='post' action='update.php'>
                <div id="title">
                    <input type="hidden" name="title" value="<?php echo $file ?>">
                    <h2><?php echo $blog_title; ?></h2>
                </div>
            </div>
                <div class="main" name="blog_text">
                    <?php include('Blogs/'.$file.'.txt'); ?>
                </div>
                <div class="update">
                    <button>Update</button>
                </div>
            </form>
        </div>
    </body>
</html>