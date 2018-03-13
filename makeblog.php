<?php
    if (isset($_POST['post'])){
        session_start();
        $email = $_SESSION['email'];
        $title = $_POST['title'];
        //$blog = $_POST['blog_text'];
        //date_default_timezone_set('UTC');
        //echo date('l jS \of F Y h:i:s A');
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
                    <h1>Create Blogs</h1>
                </div>
            </div>
            <div class="main">
                <form action="#" method="post" id="blog_form">
                    <div id="blog_title">
                        <input type="text" name="title" id="title" placeholder="Enter Blog title Here..">
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
                        <iframe id="richtextfield" name="richtextfield"></iframe>
                    </div>
                    <button id="post" name="post" onclick="submit_form()">Post</button>
                    <button id="reset">Reset</button>
            </form>
            </div>
        </div>
    </body>
</html>