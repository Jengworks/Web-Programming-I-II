<!DOCTYPE html>
<html lang="en">

<head>
  <title> Welcome back! </title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>

<body>
 <?php
   if (isset($_POST['submit'])) {
       echo '<h1> We have sent information regarding your account to the email provided.</h1>';
   }
   else {
     echo '<h1> You are now logged in. Welcome back! </h1>';
   }
 ?>
</body>
