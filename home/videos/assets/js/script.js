const toggleButton = document.querySelector('.dark-light');

toggleButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
});

const allVideos = document.querySelectorAll('.video');

allVideos.forEach(v => {
  v.addEventListener('mouseover', () => {
    const video = v.querySelector('video');
    video.play();
  });
  v.addEventListener('mouseleave', () => {
    const video = v.querySelector('video');
    video.pause();
  });
});

//Menu Appear
$('#toggle').click(function() {

  $(this).toggleClass('is-active');
  $('#navbarCollapse').toggleClass('is-active');
});


//Javascript for adding and removing the css classes

$(".header-left svg").on("click", function(e) {
  var pos = $(".main-content").position();
  var position = pos.left;
  if (position >= 240) {

    $(".left-side").addClass("hide-menu");
    $(".main-content").addClass("hide-menu");
  } else {

    $(".left-side").removeClass("hide-menu");
    $(".main-content").removeClass("hide-menu");
  }

  $('.side-menu li').each(function(i) {
    var t = $(this);
    if (position >= 240) {
      setTimeout(function() {
        t.addClass('hide-menu');
      }, (i + 1) * 10);
    } else {
      setTimeout(function() {
        t.removeClass('hide-menu');
      }, (i + 1) * 30);
    }
  });

});