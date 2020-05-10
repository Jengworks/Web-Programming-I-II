<?php
// I put ampersand because pass-by-reference:
// https://stackoverflow.com/questions/2158848/how-to-pass-an-array-into-a-function-and-return-the-results-with-an-array
// without it, it'll just be another copy of $errors called somewhere else (originally empty)
function validate($post, &$errors, &$redMarkError){
  checkBadEmail($post['email'], $errors, $redMarkError);
  checkStrongPassword($post['password'], $errors, $redMarkError);
  if(checkEmpty($post['address'])){
    array_push($errors, "<p> Please enter your address!</p>");
    $redMarkError['address'] = true;
  }
  if(checkEmpty($post['city'])){
    array_push($errors, "<p> Please enter your city!</p>");
    $redMarkError['city'] = true;
  }
  if(checkEmpty($post['state'])){
    array_push($errors, "<p> Please enter your state!</p>");
    $redMarkError['state'] = true;
  }
  checkBadZipcode($post['zipcode'], $errors, $redMarkError);
  if(count($errors) == 0){
    return true;
  }
  else{
    return false;
  }

}

function checkEmpty($val){
  return ($val == '') ? true : false;
}

function checkBadEmail($val, &$errors, &$redMarkError){
  if(checkEmpty($val)){
    array_push($errors, "<p> Please enter your email!</p>");
    $redMarkError['email'] = true;
    return true;
  }
  else if(!preg_match("/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i",$val)){
    array_push($errors, "<p> Please check your email again! Format: a@b.com </p>");
    $redMarkError['email'] = true;
    return true;
  }
  return false;
}

function checkStrongPassword($val, &$errors, &$redMarkError){
  if(checkEmpty($val)){
    array_push($errors, "<p> Please enter a <b>strong</b> password!</p>");
    $redMarkError['password'] = true;
    return true;
  }
  else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{16,})/",$val)){
    array_push($errors, "<p> Please check your password again! (Requires at least one of each:
    - At least 16 characters
    - A number
    - An uppercase
    - A symbol)</p>");
    $redMarkError['password'] = true;
    return true;
  }
  return false;
}

function checkBadZipcode($val, &$errors, &$redMarkError){
  if(checkEmpty($val)){
    array_push($errors, "<p> Please enter your zip code!</p>");
    $redMarkError['zipcode'] = true;
    return true;
  }
  else if(!preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$val)){
    array_push($errors, "<p> Please check your zip code again! Format: 12345 or 12345-6789</p>");
    $redMarkError['zipcode'] = true;
    return true;
  }
  return false;
}

?>
