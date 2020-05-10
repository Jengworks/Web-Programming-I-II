<?php
include_once('vars.php');
include_once('db_functions.php');


/*
  Note: AVOID GLOBAL VARIABLES and rely on passing as parameter (aacording to web)
  Note: print vs print_r:
  print returns value of 1.
  print_r returns information about the variable
*/

/*
  Display all assignments and their related links.
*/
function displayList($list){
    foreach ($list as $assignment => $links){ //for each row, there's an assignment and a set of links
      echo("<tr>");
      echo("<td> $assignment </td>");
      echo("<td>");
      foreach ($links as $link){ //for each set of links, display links along with <a> tag descriptions
          echo('<a target="_blank" href="'. $link[0] . '">' . $link[1] . '</a>');
      }
      echo("</td>");
      echo("</tr>");
      // echo "yooo";
    }
}

/*
  Reads the textfile
*/
function read($file){
  $data = file($file);
  return $data;
}
/*
  Get data from textfile, then display table
*/
function displayTable($fileNameIn){
  $data = read($fileNameIn);

  $even = false;
  foreach ($data as $record){
    echo("<tr>");

    list($id, $month, $days) = explode(",", $record);
    // Remove newline from $email
    $days = trim($days);
    if($even){
      echo('<tr>');
      echo('<td style="background-color:yellow;">' . $id . '</td>');
      echo('<td style="background-color:yellow;">' . $month . '</td>');
      echo('<td style="background-color:yellow;">' . $days . '</td>');
      echo('</tr>');
      $even = false;
    }
    else{
      echo('<tr>');
      echo('<td style="color:green;">' . $id . '</td>');
      echo('<td style="color:green;">' . $month . '</td>');
      echo('<td style="color:green;">' . $days . '</td>');
      echo('</tr>');
      $even = true;
    }
  }
}
/*
  Writes to textfile by reverse

  Note: fwrite wasn't working because
  cda216_ior.txt wasn't given write permissions haha...
*/
function revWrite($fileNameIn, $fileNameOut){
  $data = read($fileNameIn);
  $rev = fopen($fileNameOut, "w");

  for($i = sizeof($data) - 1; $i >= 0; $i--){
    $data[$i] = trim($data[$i]); //remove newline
    fwrite($rev, "\n$data[$i]");
    // echo("\n$data[$i]");
    // echo ("<br></br>");
  }
  fclose($rev);
}
?>
