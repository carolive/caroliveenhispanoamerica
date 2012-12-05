$(document).ready(function(){
  $("#courage_carousel").jcarousel({
    visible: 3,
    auto: 5,
    wrap: "circular"
  });
});

$(document).ready(function(){
  window.setInterval(function() {
    var nbElements = $("#photos ul li").length;
    var photoToDisplay = Math.floor((Math.random()*nbElements)+1);
	  /*$("#photos ul li").effect({
	    easing: "easeOutBounce"
	  })*/
    $("#photos ul li").fadeOut();
	  $("#photo_" + photoToDisplay).fadeIn().effect({
	    easing: "easeOutBounce"
	  });
  }, 5000);
});