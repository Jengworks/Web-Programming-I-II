<!doctype html>
<?php
// include your file(s) here
include_once('functions.php');
include_once('validate.php');
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
    <!-- form's post method takes values names from "name" attribute, not by id -->
    <div id="login">
      <form id="prompt" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <h1>Hi, please log in to continue. </h1><br>
        <?php
          if (isset($_POST['submit'])) {
            searchLogin($_POST);
          }
        ?>
        <label for="username">Username: </label><br><br>
        <input type="text" name ="username" autocomplete='new-password' ><br><br>

        <label for="password">Password: </label><br><br>
        <input type="password" name ="password" autocomplete='new-password'><br><br>

        <input type="submit" name = "submit" value="Log in"><br><br>

        <a href="forgot_username.php"> Forgot Username</a><br><br>
        <a href="forgot_pass.php"> Forgot Password</a><br><br>
      </form>

    </div>


  </body>

</html>
