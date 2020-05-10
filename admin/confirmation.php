<!DOCTYPE html>
<html lang="en">

<head>
  <title> Welcome back! </title>
  <script src="http://localhost:35729/livereload.js"></script>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
 <?php
  include_once('functions.php');

  session_start();

   if (isset($_POST['email']) || isset($_POST['pass'] )) {
       echo '<h1> We have sent the information regarding your account to the email provided.</h1>';
   }
   else{
     $row = $_SESSION['row'];
     displayAccount($row);
   }

   function displayAccount($row){ //row is the data from the results,s gathered from DB
     if($row['isAdmin'] == 1){
       echo "<h1> You are now logged in. Welcome back admin! </h1>";
       //display the usersTable
       $selectQuery  = "SELECT * FROM usersTable WHERE 1";

       // setup connection
       $dbConn = dbConnect();
       $result = mysqli_query($dbConn, $selectQuery);
       echo '<td> <a href="changeData.php?action=add"> Add a new user </a> <br><br> <a href="export.php?action=export"> Export data to csv <br><br> </a></td>';
       echo '<div id="data">';
       echo '<table id="usersTable">';
       echo "<tr>";
       echo '<th>Actions</th>';
       echo '<th>userID</th>';
       echo "<th>userEmail</th>";
       echo "<th>userPass</th>";
       echo "<th>userAddress</th>";
       echo "<th>userCity</th>";
       echo "<th>userState</th>";
       echo "<th>userZipcode</th>";
       echo "<th>isAdmin</th>";
       echo "</tr>";
       if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           //this href in the <a> tag sends a get request data to the php file
           echo '<td> <a href="changeData.php?action=mod&userID='.$row['userID'].'"> mod </a> <br> <a href="changeData.php?action=del&userID='.$row['userID'].'"> del </a></td>';
           foreach($row as $col => $val){
             if($col == "isAdmin"){
               if($val == 0){
                 echo '<td> No </td>';
               }
               else{
                 echo '<td> Yes </td>';
               }
             }
             else{
               echo '<td>'.$val."</td>";
             }
           }
           echo "</tr>";

         }
         echo "</table>";
         echo '</div>';
       }
       else{
         echo "error";
       }
     }
     else{
       echo "<h1> You are now logged in. Welcome back user! </h1>";
     }
   }
 ?>
</body>
