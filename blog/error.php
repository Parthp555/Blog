<!DOCTYPE html>
<html>
<head>
  <title>MyBlog</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body bgcolor="white">
  <div class="header"><h2 title="Welcome to MyBlog">MyBlog</h2>
      <p style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;Express your views</p>
  </div>
  <br>
  <div class="search">
    <form action="search.php" method="post">
      <input type = "text" placeholder = "Search user" name ="key">
      <button type="submit">Search</button>
    </form>
  </div>
  <br>
  <div class = "menu">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="contactUs.php">Contact Us</a></li>
    </ul>
  </div>
  <br>
  <div class="posts">
    <center>
    <a href = "index.php">Click here to go back to Homepage</a><p>
    <img src = "error.png" alt = "Error"/><p>
    </center>
  </div>
</body>
</html>
