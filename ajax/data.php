<?php
 // Report all PHP errors (see changelog)
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

if (isset($_GET['src'])) {

  $input = $_GET['src'];
  $questionID = $_GET['question'];

  if($questionID == -1){
    echo('<label id="prompt">');
    echo("Sorry to hear that, ".$input.'. Maybe next time!');
    echo('</label><br><br>');
  }
  else if($questionID == -2){
    echo('<label id="prompt">');
    echo("That's fine, ".$input.'. Let me know before then ASAP!');
    echo('</label><br><br>');
  }
  else if($questionID == 1){
    echo('<label id="prompt">');
    echo("Hi, ".$input.'. Which <b>snack</b> would you prefer?<br>(If you don&apos;t know, just choose "No Preference")<br><br>');
    echo('</label><br><br>');
    echo('<select id="select" onchange="getInput(this.value)">
    <option value="">Select a snack...</option>
    <option value="Oreos">Oreos cookies</option>
    <option value="Popcorn">Popcorn</option>
    <option value="Cheetos">Cheetos</option>
    <option value="Pretzels">Pretzels</option>
    <option value="Doritos">Doritos chips</option>
    <option value="Chip Ahoy">Chip Ahoy! cookies</option>
    <option value="No">No Preference</option>
    </select>');
  }
  else if($questionID == 2){
    echo('<label id="prompt">');
    echo($input.' Now, which <b>beverage</b> would you prefer?<br>(If you don&apos;t know, just choose "No Preference")<br><br>');
    echo('</label><br><br>');
    echo('<select id="select" onchange="getInput(this.value)">
    <option value="">Select a beverage...</option>
    <option value="Kool Aid">Kool Aid</option>
    <option value="Caprisun">Caprisun</option>
    <option value="Orange Juice">Orange Juice</option>
    <option value="Fruit Punch">Fruit Punch</option>
    <option value="Lemonade">Lemonade</option>
    <option value="No">No Preference</option>
    </select>');
  }
  else if($questionID == 3){
    echo('<label id="prompt">');
    echo($input.' Will you be available to come to my party this upcoming Friday @6PM?<br><br>');
    echo('</label><br><br>');
    echo('<select id="select" onchange="getInput(this.value)">
    <option value="">Select a response...</option>
    <option value="Yes">Yes! :)</option>
    <option value="No">No, sorry :(</option>
    <option value="Maybe">Maybe...</option>
    </select>');
  }
  else if($questionID == 4){
    echo('<label id="prompt">');
    echo('Thanks for letting me know, '.$input.'. See you then! :)');
    echo('</label><br><br>');
  }
}
?>
