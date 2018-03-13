<?php
    session_start();
    $email = $_SESSION['email'];
    $conn = mysqli_connect('localhost','root','','Blog');
    $sql = "SELECT Firstname,Lastname FROM users WHERE Email = '$email'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $name = $row['Firstname']." ".$row['Lastname'];
    $sql1 = "SELECT * FROM user_blogs WHERE Email='$email'";
    $query1 = mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Blogs</title>
    <link rel="stylesheet" type="text/css" href="Css/createblog.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="upper_heading">
                    <ul id="dropdown_menu">
                        <li id="dropdown"><?php echo $name; ?>&emsp;<i class="fa fa-caret-down" id="drop_icon" aria-hidden="true"></i>
                            <div id="dropdown_content">
                                <a href="makeblog.php">Create Blog</a>
                                <a href="">Profile</a>
                                <a href="">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            <div id="title1">
                <h1>My Blogs</h1>
            </div>
        </div>
        <div class="blogs_list">
            <?php
                while($row1 = mysqli_fetch_array($query1)){?>
                    <form action="changeblog.php" method="post" id="blog_detail">
                        <div id="list">
                            <h3><input type="hidden" name="title" id="title" value="<?php echo $row1['Blog_title']; ?>"><span><?php echo $row1['Blog_title']; ?></span></h3>
                            <h4 id="timings">Created On : <span><?php echo $row1['Blog_date'];?>&emsp;<?php echo $row1['Blog_time']; ?> (UTC)</span></h4>
                            <div id="likes">
                                <h4><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i>&emsp;Likes : <span><?php ?></span></h4>
                                <h4><i class="fa fa-comments fa-lg" aria-hidden="true"></i>&emsp;Comments : <span><?php ?></span></h4>
                            </div>
                            <input type="submit" value="View" id="submit1">
                        </div>
                    </form>
                <?php }
            ?>
        </div>
    </div>
</body>
</html>