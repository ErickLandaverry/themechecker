jQuery(function($) {
 
  // bootstrap carousel
  slide = 0;
  $(".carousel").each(function() {
    slide++;
    $(this).attr("id", "carousel_" + slide);
  });
  $(".carousel-control").each(function() {
    slideControl = $(this).parent().attr("id");
    $(this).attr("href", "#" + slideControl);
  });


});

