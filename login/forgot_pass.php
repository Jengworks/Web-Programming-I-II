<!doctype html>
<?php
// include your file(s) here
include_once('functions.php');
$title = "Hi, please login to continue!";
?>
<html>
  <head>
    <title> Login Page </title>
    <script src="http://localhost:35729/livereload.js"></script>
    <!-- put meta tags here -->
    <meta name="author" content="<?php echo $my_name;?>">
    <meta name="software editor" content="<?php echo $webpage_editor;?>">
    <meta name="$web server software" content="<?php echo $web_server_software;?>">
    <!-- put style link tag here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
  </head>

  <body>
    <div id="login">
      <form id="prompt" action="confirmation.php" method="post" autocomplete="off">

        <label for="email">
          We will email you the password associated with this email.<br>
          Please enter your email below.
        </label><br><br>
        <input type="text" name ="email"><br><br>
        <input type="submit" name = "submit" value="Submit"><br><br>
        <a href="login.php"> Go back </a>
      </form>
    </div>
  </body>
</html>
