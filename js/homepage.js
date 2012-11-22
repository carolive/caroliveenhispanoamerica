$(document).ready(function(){
  $("#courage_carousel").jcarousel({
    visible: 3,
    auto: 5,
    wrap: "circular"
  });
});

$(document).ready(function(){
  while(true) {
    var nbElements = $("#photos ul li").length;
    var photoToDisplayId = 'photo_' + Math.floor((Math.random()*nbElements)+1);
	$("#photos ul li").effect({
	  easing: "easeOutBounce"
	}).delay(5000);
	$(photoToDisplayId).show();
  }
});