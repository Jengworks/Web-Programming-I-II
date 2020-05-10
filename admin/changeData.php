<!doctype html>
<?php
// include your file(s) here
include_once('functions.php');
?>
<html>
  <head>
    <title> Welcome back! </title>
    <script src="http://localhost:35729/livereload.js"></script>
    <!-- put style link tag here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
  </head>

  <body>
    <?php
    if (isset($_POST['add'])) {
      add();
    }
    if (isset($_POST['modify'])) {
      updateRecord();
    }
    else if ($_GET['action'] == 'delete') {
      deleteRecord();
    }
    else if($_GET['action'] == 'add'){ //add
      displayAdd();
    }
    else if($_GET['action'] == 'del'){ //del
      displayDelete();
    }
    else if($_GET['action'] == 'mod'){
      displayMod();
    }
    else{
      echo "yikes";
    }

    function displayAdd(){
      // $dbConn = dbConnect();

      // $result = mysqli_query($dbConn, $selectQuery);
      $add = '<div id="add">
        <form id="add-prompt" action="'.$_SERVER['PHP_SELF'].'" method="post">
          <a href=confirmation.php> Go back </a>

          <h1>Fill in the fields to add a new user. </h1><br>

          <label for="email">Email: </label><br><br>
          <input type="text" name ="email" size="20" maxlength="60"  ><br><br>

          <label for="password">Password: </label><br><br>
          <input type="password" name ="password" size="20" maxlength="60" ><br><br>

          <label for="address">Address: </label><br><br>
          <input type="text" name ="address" size="20" maxlength="30" ><br><br>

          <label for="city">City: </label><br><br>
          <input type="text" name ="city" size="20" maxlength="30"><br><br>

          <label for="state">State: </label><br><br>
          <input type="text" name ="state" size="2" maxlength="2"><br><br>

          <label for="zipcode">Zipcode: </label><br><br>
          <input type="text" name ="zipcode" size="10" maxlength="10" ><br><br>

          <label for="admin">Admin Rights?<br> (0 for no, 1 for yes): </label><br><br>
          <input type="text" name ="admin" ><br><br>

          <input type="submit" name = "add" value="Add"><br><br>

        </form>
      </div>';
      echo ($add);
    }

    function add(){
      $dbConn = dbConnect();
      $vals = [];
      array_push($vals,
        addslashes($_POST['email']),
        addslashes(sha1($_POST['password'])),
        addslashes($_POST['address']),
        addslashes($_POST['city']),
        addslashes($_POST['state']),
        addslashes($_POST['zipcode']),
        addslashes($_POST['admin']));
      dbInsert($dbConn,"usersTable",$vals);
      header('Location: confirmation.php');
    }

    function displayDelete(){
      $del = '<div id="del">
          <h1> Are you sure you want to delete this record? </h1><br>
          <a href="changeData.php?action=delete&userID='.$_GET['userID'].'"> Yes, delete</a><br><br>
          <a href=confirmation.php> No, go back </a>
      </div>';
      echo $del;
    }

    function deleteRecord(){
      $dbConn = dbConnect();
      $deleteQuery = 'DELETE FROM usersTable WHERE userID = ';
      $deleteQuery .= $_GET['userID'];
      dbDelete($dbConn,$deleteQuery);
      header('Location: confirmation.php');
    }

    function displayMod(){
      // $dbConn = dbConnect();

      // $result = mysqli_query($dbConn, $selectQuery);
      $mod = '<div id="mod">
        <form id="mod-prompt" action="'.$_SERVER['PHP_SELF'].'?userID='.$_GET['userID'].'" method="post">
          <a href=confirmation.php> Go back </a>

          <h1>Please input the necessary changes to these fields.<br>
          If it stays the same, please put &quot;same&quot;. <br>
          If you want it empty, just leave it empty as is.</h1><br>

          <label for="email">Email: </label><br><br>
          <input type="text" name ="userEmail" size="20" maxlength="60"  ><br><br>

          <label for="password">Password: </label><br><br>
          <input type="password" name ="userPass" size="20" maxlength="60" ><br><br>

          <label for="address">Address: </label><br><br>
          <input type="text" name ="userAddress" size="20" maxlength="30" ><br><br>

          <label for="city">City: </label><br><br>
          <input type="text" name ="userCity" size="20" maxlength="30"><br><br>

          <label for="state">State: </label><br><br>
          <input type="text" name ="userState" size="2" maxlength="2"><br><br>

          <label for="zipcode">Zipcode: </label><br><br>
          <input type="text" name ="userZipcode" size="10" maxlength="10" ><br><br>

          <label for="admin">Admin Rights?<br> (0 for no, 1 for yes): </label><br><br>
          <input type="text" name ="isAdmin" ><br><br>

          <input type="submit" name = "modify" value="Modify"><br><br>

        </form>
      </div>';
      echo ($mod);
    }

    function updateRecord(){
      $dbConn = dbConnect();
      $updateQuery = 'UPDATE usersTable SET ';
      //go thru array of added post inputs
      $vals = [];

      foreach($_POST as $key => $value){
        if($value != "same"){
          if($key == "modify"){

          }
          else{
            $vals[$key] = $value;
          }
        }

        //skip
      }
      //add the params to $query
      $x = 0;
      foreach($vals as $key => $value){
        $x += 1;
        if($x == sizeof($vals)){
          $updateQuery .= $key."='".$value."' ";
        }
        else{
          $updateQuery .= $key."='".$value."'".', ';
        }
      }

      $updateQuery .= 'WHERE userID= '.$_GET['userID'];
      dbUpdate($dbConn,$updateQuery);
      header('Location: confirmation.php');
    }

    ?>
  </body>

</html>
