$('.slider').slick({
  centerMode: true,
  dots: true,
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 979,
      settings: {
        arrows: false,
        centerMode: true,
     
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
         slidesToShow: 1
      }
    }
  ]
});



// Make LEFT and RIGHT slides - i.e. not centered 
// clickable - i.e. Go to PREVIOUS and NEXT 
// slides respectively.

$(".slider").on("click", ".slick-slide", function(e) {
  e.stopPropagation();
  var index = $(this).data("slick-index");
  if ($(".slider").slick("slickCurrentSlide") !== index) {
    $(".slider").slick("slickGoTo", index);
  }
});