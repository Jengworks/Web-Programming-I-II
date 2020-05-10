var xmlhttp;
var questionID = 0;
var answers = []; //0->name, 1->snack, 2->beverage, 3->availability

function getInput(DataString) {
  xmlhttp = new XMLHttpRequest();

  if(questionID == 0){ //name
    if(DataString == ''){
      document.getElementById('prompt').innerHTML = 'No name was entered. Please tell me your name!';
      return;
    }
    else{
      // In JS, you can pass the reference of the function. You do this by without the parenthesis.
      // So, there's no need to redeclare the same functionNane() function again.
      xmlhttp.onreadystatechange = changePrompt;
      answers[questionID] = DataString;
      questionID += 1;
      xmlhttp.open("GET","data.php? src=" + DataString + "&question=" + questionID, true);
    }
  }
  else if(questionID == 1){ //snack
    if(DataString == "No"){
      DataString = "Okay. ";
    }
    else{
      DataString = DataString + "! Nice choice.";
    }
    answers[questionID] = DataString;
    xmlhttp.onreadystatechange = changePrompt;
    questionID += 1;
    xmlhttp.open("GET","data.php? src=" + DataString + "&question=" + questionID, true);
  }
  else if(questionID == 2){ //bev
    if(DataString == "No"){
      DataString = "That's fine. ";
    }
    else{
      DataString = DataString + "! Cool.";
    }
    answers[questionID] = DataString;
    xmlhttp.onreadystatechange = changePrompt;
    questionID += 1;
    xmlhttp.open("GET","data.php? src=" + DataString + "&question=" + questionID, true);
  }
  else if(questionID == 3){ // availability
    if(DataString == "No"){
      xmlhttp.open("GET","data.php? src=" + answers[0] + "&question=-1", true);
    }
    else if(DataString == "Maybe"){
      xmlhttp.open("GET","data.php? src=" + answers[0] + "&question=-2", true);
    }
    else{
      questionID += 1;
      xmlhttp.open("GET","data.php? src=" + answers[0] + "&question=" + questionID, true);
      answers[questionID] = DataString;
    }
    xmlhttp.onreadystatechange = changePrompt;
  }
  xmlhttp.send();
}

function changePrompt(){
  if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
    //change to next question, asking user to choose a snack
    document.getElementById('interface').innerHTML = xmlhttp.responseText;
  }
}
