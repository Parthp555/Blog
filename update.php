<?php
    session_start();
    $email = $_SESSION['email'];
    $title_old = $_POST['title'];
    //$blog_text_old = $_POST['blog_text'];
    $conn1 = mysqli_connect('localhost','root','','Blog');
    $sql1 = "SELECT Blog_title,Blog_text FROM user_blogs WHERE Email='$email' AND Blog_text='$title_old'";
    $query1 = mysqli_query($conn1,$sql1);
    $row1 = mysqli_fetch_array($query1);
    echo $row1['Blog_text'];
    if (isset($_POST['update'])){
        $title = $_POST['title'];
        $date = gmdate("jS F Y");
        $time = gmdate("h:i:s A");
        $newfilename = round(microtime(true)) . '.txt';
        if(!file_exists("Blogs/".$newfilename)){
            $file = tmpfile();
        }
        $file = fopen("Blogs/".$newfilename,"a+");
        /*while(!feof($file)){
            $old = $old.fgets($file)."<br/>";
        }*/
        $blog_text = $_POST['blog_text'];
        file_put_contents("Blogs/".$newfilename, $blog_text);
        fclose($file);
        $conn = mysqli_connect('localhost','root','','Blog');
        $sql = "INSERT INTO user_blogs(Email,Blog_title,Blog_text,Blog_date,Blog_time) values('$email','$title','$newfilename','$date','$time')";
        $query = mysqli_query($conn,$sql);
        if ($query){
            echo "Success";
        }
        else {
            echo "sorry";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Blog</title>
        <link rel="stylesheet" type="text/css" href="Css/createblog.css">
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script type="text/javascript" src="wysiwyg.js"></script>
    <body onload="iFrameon();">
        <div class="container">
            <div class="header">
                <div id="upper_heading">
                    <ul id="navigation">
                        <li><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;<a href="myblogs.php">My Blogs</a></li>
                    </ul>
                </div>
                <div id="title1">
                    <h1>Update Blog</h1>
                </div>
            </div>
            <div class="main">
                <form action="#" method="post" id="blog_form">
                    <div id="blog_title">
                        <input type="text" name="title" id="title" placeholder="Enter Blog title Here.." value="<?php echo $row1['Blog_title']; ?>">
                    </div>
                    <div id="options">
                        <button onclick="return iBold();"><i class="fa fa-bold fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iUnderline()"><i class="fa fa-underline fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iItalic()"><i class="fa fa-italic fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ileft()"><i class="fa fa-align-left fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iright()"><i class="fa fa-align-right fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ijustify()"><i class="fa fa-align-justify fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iFontsize()"><i class="fa fa-text-height fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iOl()"><i class="fa fa-list-ol fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iul()"><i class="fa fa-list-ul fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return ilink()"><i class="fa fa-link fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iUnlink()"><i class="fa fa-chain-broken fa-lg" aria-hidden="true"></i></button>
                        <button onclick="return iimage()"><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <div id="blog_main">
                        <!--<textarea placeholder="Enter Text Here.."  rows="20" id="blog_text"></textarea>-->
                        <textarea id="blog_text" name="blog_text" style="display:none;"></textarea>
                        <iframe id="richtextfield" name="richtextfield"><?php echo $row1['Blog_text']; ?></iframe>
                    </div>
                    <button id="update" name="update" onclick="submit_form()">Update</button>
                    <button id="reset">Reset</button>
            </form>
            </div>
        </div>
    </body>
</html>