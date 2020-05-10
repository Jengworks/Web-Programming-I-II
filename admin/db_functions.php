<?php
/*
  Notes: pdo vs. mysqli: https://www.w3schools.com/php/php_mysql_connect.asp
  TL;DR:
  - pdo to work on 12 different database systems.
  - mysqli works only on MySQL databases.
*/
include_once('db_vars.php');

// This function makes a connection to the server
// MySQLi procedure
function dbConnect() {
  global $debug, $dbServer, $dbUsername, $dbPassword, $dbDatabase;
  $dbConn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbDatabase);
  // Check connection
  if (!$dbConn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  else{
    // echo "Connected successfully<br>";
  }

  return $dbConn;
}

// This function creates a table in the database
function dbCreate($dbConn, $tableName, $createQuery) {
  global $debug;
  //create DROP query (Optional)
  /*
  $dropQuery = "DROP TABLE IF EXISTS ". "$tableName";
  echo "Dropping if it exists... <br>";
  // execute the query to MySQL
  if (mysqli_query($dbConn, $dropQuery)) {
      echo "$tableName". " dropped successfully<br>";
  } else {
      echo "Error dropping table: " . mysqli_error($dbConn);
      return;
  }
  */
  if (mysqli_query($dbConn, $createQuery)) {
      echo $createQuery."<br>";
      echo "$tableName". " created successfully<br>"; return;
  }
  else {
      echo "Error creating table: " . mysqli_error($dbConn).'<br>'; return;
  }
  // // return result status
  // return $result;
}

// This function inserts records into the table
function dbInsert($dbConn,$tableName,$vals) {
  // add your arrays here
  global $debug;
  global $records;

  // setup INSERT query
  $insertQuery = "INSERT INTO ".$tableName." (userEmail, userPass, userAddress, userCity, userState, userZipcode, isAdmin) VALUES";
  $insertQuery .= '(';
  for($x = 0; $x < sizeof($vals); $x+=1){
    // echo ($vals[$x].'<br>'); //feedback
    if($x == (sizeof($vals) - 1) ){
      $insertQuery .= '"'.$vals[$x].'"';
    }
    else{
      $insertQuery .= '"'.$vals[$x].'"'.',';
    }
  }
  $insertQuery.= ')';
  // echo $insertQuery."<br>";
  //execute the query to MySQL
  if (mysqli_query($dbConn, $insertQuery)) {
      // echo "$tableName". " created successfully<br>";
      echo "Inserted data successfully<br>";

  }
  else {
      echo "Error inserting into table: " . mysqli_error($dbConn)."<br>";
  }
  return;
}

// This function selects records from the databases
function dbSelect($dbConn){
  // setup SELECT query
  $selectQuery = "SELECT * FROM monthsTable";
  // execute the query to MySQL
  $result = $dbConn->query($selectQuery);
  $dbConn->close();
  return $result;
}

// This function displays the selected data
function displaySelect($result){
  if ($result->num_rows > 0) {
    echo "Displaying table from selected data...";
    // output data of each row
    echo '<table>';
    echo "<tr>";
    echo '<th>monthsID</th>';
    echo "<th>monthName</th>";
    echo "<th>monthDays</th>";
    echo "</tr>";
    $odd = true;
    while($row = $result->fetch_assoc()) {
      if($odd){
        echo "<tr>";
        $odd = false;
      }
      else {
        echo '<tr style="background-color: #d6d6d6;">';
        $odd = true;
      }
      foreach($row as $col => $val){
        echo '<td>'.$val."</td>";
      }

      echo "</tr>";
    }
    echo "</table>";
  }
  else {
    echo "0 results";
  }
}

function dbDelete($dbConn, $deleteQuery){
  // execute the query to MySQL
  // echo $deleteQuery.'<br>';
  if (mysqli_query($dbConn, $deleteQuery)) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
}

function dbUpdate($dbConn, $updateQuery){
  echo $updateQuery.'<br>';

  if (mysqli_query($dbConn, $updateQuery)) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . mysqli_error($dbConn);
  }
}
?>
