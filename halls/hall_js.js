$("#button").click(function() {  
    $("#box form").toggle("slow");
    return false;
  }); 

  
  n =  new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();
  
  var weekday = new Array(7);
  weekday[0] = "Sun. ";
  weekday[1] = "Mon. ";
  weekday[2] = "Tue. ";
  weekday[3] = "Wed. ";
  weekday[4] = "Thu. ";
  weekday[5] = "Fri. ";
  weekday[6] = "Sat. ";

  var dita = weekday[n.getDay()];  
 
  document.getElementById("date").innerHTML = dita+d+"/ "+m + "/ " + y;