<!doctype html>
<?php
// include your file(s) here
include_once('functions.php');
include_once('validation.php');
$title = "Hi, sign up today to register an account!";
?>
<html>
  <head>
    <title> Register Page </title>
    <!-- put meta tags here -->
    <meta name="author" content="<?php echo $my_name;?>">
    <meta name="software editor" content="<?php echo $webpage_editor;?>">
    <meta name="$web server software" content="<?php echo $web_server_software;?>">
    <!-- put style link tag here -->
    <link rel="stylesheet" type="text/css" href="formstyle.css">
  </head>

  <body>
    <h1><?php echo($title); ?></h1>
    <?php
      $vals = [];
      $errors = [];
      $redMarkError = [
                        'email' => false,
                        'password' => false,
                        'address' => false,
                        'city' => false,
                        'state' => false,
                        'zipcode' => false
                      ];
      $email = '';
      $password = '';
      $address = '';
      $city = '';
      $state = '';
      $zipcode = '';
      // If the name field is filled in
      // create variables for each $_POST[] element
      if (isset($_POST['submit'])) {
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $address = addslashes($_POST['address']);
        $city = addslashes($_POST['city']);
        $state = addslashes($_POST['state']);
        $zipcode = addslashes($_POST['zipcode']);
        if(validate($_POST, $errors, $redMarkError)){
          echo('VALIDATION COMPLETE!<br>');
          // encrypt password before sending to DB
          $password = addslashes(sha1($_POST['password']));
          array_push($vals,$email, $password, $address, $city, $state, $zipcode);
          // Once validation passes, we are ready to insert the data to DB
          // setup connection
          $dbConn = dbConnect();
          // // insert the record into the table
          $tableName = "usersTable";
          $createQuery = "CREATE TABLE ". $tableName . "(
            userID INT AUTO_INCREMENT PRIMARY KEY,
            userEmail VARCHAR(30),
            userPass VARCHAR(30),
            userAddress VARCHAR(30),
            userCity VARCHAR(30),
            userState VARCHAR(2),
            userZipcode VARCHAR(10),
            isAdmin BIT DEFAULT 0
          )";
          dbCreate($dbConn, $tableName, $createQuery);
          dbInsert($dbConn, $tableName, $vals);
          //go to thank you page
          header('Location: thankyou.php'); //comment this to see error feedback
        }
        else{
          foreach($errors as $error){
            echo ($error);
          }
          echo('<p>Once you fixed these errors, you may resubmit the form.</p><br>');
        }
      }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" novalidate>

      <label for="email">Email</label><br>
      <input type="text" id="email" name="email" size="20" maxlength="60" required
      <?php echo ( ($_POST != null && $redMarkError['email']) ?
      'autofocus '.
      'style = "border: 2px solid red; "'.'value="'.$email.'"'
      : 'value="'.$email.'"'); ?>
    ><br><br>

    <label for="email"> Password<br>
      (Requires at least one of each:<br>
      - At least 16 characters<br>
      - A number<br>
      - An uppercase<br>
      - A symbol)
    </label><br>
    <input type="text" id="password" name="password" size="20" maxlength="60" required
    <?php echo ( ($_POST != null && $redMarkError['password']) ?
    'autofocus '.
    'style = "border: 2px solid red; "'.'value="'.$password.'"'
    : 'value="'.$password.'"'); ?>
  ><br><br>

      <label for="address">Address</label><br>
      <input type="text" id="address" name="address" size="20" maxlength="30" required
        <?php echo ( ($_POST != null && checkEmpty($address)) ?
        'autofocus '.
        'style = "border: 2px solid red;"'
        : 'value="'.$address.'"'); ?>
      ><br><br>

      <label for="state">City</label><br>
      <input type="text" id="city" name="city" size="20" maxlength="30" required
      <?php echo ( ($_POST != null && checkEmpty($city)) ?
      'autofocus '.
      'style = "border: 2px solid red;"'
      : 'value="'.$city.'"'); ?>
    ><br><br>

      <label for="state">State (Initials)</label><br>
      <input type="text" id="state" name="state" size="2" maxlength="2" required
      <?php echo ( ($_POST != null && checkEmpty($state)) ?
      'autofocus '.
      'style = "border: 2px solid red;"'
      : 'value="'.$state.'"'); ?>
    ><br><br>

      <label for="zipcode">Zipcode</label><br>
      <input type="text" id="zipcode" name="zipcode" size="10" maxlength="10" required
      <?php echo ( ($_POST != null && $redMarkError['zipcode']) ?
      'autofocus '.
      'style = "border: 2px solid red; "'.'value="'.$zipcode.'"'
      : 'value="'.$zipcode.'"'); ?>
    ><br><br>

      <input type="submit" id="submit" name = "submit" value="Sign Up!"/>
    </form>
  </body>
</html>
