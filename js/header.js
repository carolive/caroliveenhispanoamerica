$(document).ready(function(){
  $("ul.menu li.universe").mouseover(function(event) {
    $("ul", this).show();
  });
  
  $("ul.menu li.universe").mouseout(function(event) {
    $("ul", this).hide();
  });
});