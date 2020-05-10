<?php
include_once('functions.php');

if($_GET['action'] == 'export'){
  $connect = dbConnect();
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');
  $output = fopen('php://output', 'w');
  fputcsv($output, array('userID', 'userEmail', 'userPass', 'userAddress', 'userCity', 'userState', 'userZipcode', 'isAdmin'));
  $query = "SELECT * from usersTable WHERE 1";
  $result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_assoc($result)){
    fputcsv($output, $row);
  }
  fclose($output);
}

?>
