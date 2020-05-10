$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown("slow");
  });
});

$(document).ready(function(){
  $("button").click(function(){
    $("#red").fadeIn(3000);
    $("#green").fadeIn(6000);
    $("#blue").fadeIn(8000);
  });
});

$(document).ready(function(){
  $("#mouse-area").mouseenter(function(){
    document.getElementById("mouse-area").innerHTML = "You just entered the red box!"
  });
});

$(document).ready(function(){
  $("#mouse-area").mouseleave(function(){
    document.getElementById("mouse-area").innerHTML = "You just left the red box!"
  });
});
