$('.owl-carousel').owlCarousel({
    loop: true,
    nav: false,
    navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1.4
      },
      1000: {
        items: 2.5
      }
    }
  })
  
  $("#login").click(function(e) {
      e.preventDefault();
      $(this).addClass('current');
      $("#login-area").slideToggle(200);
      $("#user-profile").slideUp(200);
      $("#ask-question").slideUp(200);
      $("#app-download").slideUp(200);
      $("#content-menu").slideUp(200);
  });
  
  $("#usermenu").click(function(e) {
      e.preventDefault();
      $(this).addClass('current');
      $("#login-area").slideUp(200);
      $("#user-profile").slideToggle(200);
      $("#ask-question").slideUp(200);
      $("#app-download").slideUp(200);
      $("#content-menu").slideUp(200);
  });
  
  $("#question").click(function(e) {
      e.preventDefault();
      $(this).addClass('current');
      $("#login-area").slideUp(200);
      $("#user-profile").slideUp(200);
      $("#ask-question").slideToggle(200);
      $("#app-download").slideUp(200);
      $("#content-menu").slideUp(200);
  });
  
  $("#download").click(function(e) {
      e.preventDefault();
      $(this).addClass('current');
      $("#login-area").slideUp(200);
      $("#user-profile").slideUp(200);
      $("#ask-question").slideUp(200);
      $("#app-download").slideToggle(200);
      $("#content-menu").slideUp(200);
  });
  
  $("#contents").click(function(e) {
      e.preventDefault();
      $(this).addClass('current');
      $("#login-area").slideUp(200);
      $("#user-profile").slideUp(200);
      $("#ask-question").slideUp(200);
      $("#app-download").slideUp(200);
      $("#content-menu").slideToggle(200);
  });