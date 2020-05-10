<?php
//Notes: I really need to create/update an actual dbfunction for dbSelect lol
session_start(); //sessions can hold data throughout multiple PHP files. (Only if those files also call session_start() )

function searchLogin($formData){
  $username = addslashes($formData['username']);
  $password = addslashes($formData['password']);

  if(($username != '') && ($password != '')){ //if not empty fields
    // check if username/password combination is in the users table
    $selectQuery = 'SELECT * FROM usersTable WHERE userEmail = ';
    $selectQuery .= "'".$username."'";
    $selectQuery .= ' AND userPass = ';
    $selectQuery .= "'".sha1($password)."'";
    // echo $selectQuery."<br>";

    // setup connection
    $dbConn = dbConnect();
    $result = mysqli_query($dbConn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
      global $row;
      while($row = mysqli_fetch_assoc($result)) {
        // echo "Email: " . $row["userEmail"]. "<br>"."Pass: ". $row["userPass"]."<br>"."Admin: ". $row["isAdmin"]."<br>";
        $_SESSION['row'] = $row;
        header('Location: confirmation.php');
      }
    }
    else {
        echo "<p>Sorry, we couldn't find your provided information in our systems.<br>";
        echo "Please try again.</p><br><br>";
    }
  }
  else{ //empty fields
    echo("<p> One or more fields are empty! Please check your inputs again! </p>");
  }
}

?>
