<!DOCTYPE html>
<html lang="en">
<?php include_once('functions.php');?>

<head>
  <title> Welcome! </title>
  <link rel="stylesheet" type="text/css" href="stylesheetPHP.css">
  <meta name="author" content="<?php echo $my_name;?>">
  <meta name="software editor" content="<?php echo $webpage_editor;?>">
  <meta name="$web server software" content="<?php echo $web_server_software;?>">
  <!-- <meta http-equiv="refresh" content="10"> -->
</head>

<body>
  <h3>
    (You are in my index.php view!)
  </h3>
  <h1>
    Hi! My name is <?php echo $my_name;?>!
  </h1>
  <img id="me" src="me.png" alt= "My Picture">

  <div id="intro">
    <p id="headline">
      Senior student @ University at Buffalo graduating May 2020
    </p>
    <p>
      Hi, I am actively looking for full-time software <br> engineering positions after graduating in May 2020.
      <br> I have worked in Web, Mobile, Software Development <br> involving Java, Python, HTML, CSS, JS, and still learning more.
      <br> Feel free to connect with me on LinkedIn and check out my other links: <br>
    </p>
    <a target="_blank" href="https://www.linkedin.com/in/jengworks/"> LinkedIn </a>
    <a target="_blank" href="https://github.com/JackFrostiez"> GitHub </a>
    <a target="_blank" href="https://devpost.com/software/whatchuwant"> Devpost </a>
  </div>
    <hr>
    <p id="header_of_list"> These are my remaining assignments for my CDA216 course: </p>

    <table id="list">
      <tr>
        <th> Assignments</th>
        <th> Links </th>
      </tr>
      <!-- insert function to display list -->
      <?php displayList($list); ?>
    </table>
    <hr>
    <p class="footnote"> <?php
        date_default_timezone_set("America/New_York");
        echo ("The current time you just visited: " . date("Y-m-d H:i:s"));
      ?>
    </p>
</body>
