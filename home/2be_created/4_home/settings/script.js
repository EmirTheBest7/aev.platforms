/* Profile Setup - Upload Image */

$(document).on("change", ".uploadProfileInput", function () {
  var triggerInput = this;
  var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
  var holder = $(this).closest(".pic-holder");
  var wrapper = $(this).closest(".profile-pic-wrapper");
  $(wrapper).find('[role="alert"]').remove();
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) {
    return;
  }
  if (/^image/.test(files[0].type)) {
    // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function () {
      $(holder).addClass("uploadInProgress");
      $(holder).find(".pic").attr("src", this.result);
      //$(holder).find(".uploadProfileInput").attr("value", this.result);
      $(holder).append(
        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
      );

      // Dummy timeout; call API or AJAX below
      setTimeout(() => {
        $(holder).removeClass("uploadInProgress");
        $(holder).find(".upload-loader").remove();
        // If upload successful
        if (Math.random() < 0.9) {
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
          );

          // Clear input after upload
          //$(triggerInput).val("");

          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        } else {
          $(holder).find(".pic").attr("src", currentImg);
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
          );

          // Clear input after upload
          //$(triggerInput).val("");
          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        }
      }, 1500);
    };
  } else {
    $(wrapper).append(
      '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
    );
    setTimeout(() => {
      $(wrapper).find('role="alert"').remove();
    }, 3000);
  }
});


$(function () {

  $('.c-tab--navigation').each(function (element) {

    var slider_width,
      tab_width,
      left_position,
      $active,
      $content,
      $links = $(this).find('a'),
      $currentTab = $(this).find('a.active'),
      $indicator = $(this).find('.c-tab-indicator');

    if ($currentTab.hasClass('active')) {
      slider_width = $('.c-tab--slider').innerWidth();
      tab_width = $currentTab.innerWidth();
      // var $tab_position = $slider_width - tab_width;
      left_position = $currentTab.position().left;
      $indicator.css({
        'width': tab_width + 'px',
        'left': left_position + 'px'
      });
    }

    $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
    $active.addClass('active');
    $content = $($active[0].hash);

    $links.not($active).each(function () {
      $(this.hash).hide();
    });

    // Binds the click event handler
    $(this).on('click', 'a', function (e) {
      $active.removeClass('active');
      $content.hide();

      $active = $(this);
      $content = $(this.hash);

      $active.addClass('active');
      $content.show();

      moveSlider($active);
      addRipple(e);
      e.preventDefault();
    });
  });
});


function moveSlider($tab_clicked) {
  var $new_tab = $tab_clicked;
  var $tab_parent = $new_tab.parent();
  var $list_parent = $tab_parent.parent();
  var $indicator = $list_parent.find('.c-tab--slider').children();
  var new_tab_width = $new_tab.innerWidth();
  var left_position = $new_tab.position().left;

  $indicator.css({
    'width': new_tab_width + 'px',
    'left': left_position + 'px'
  });
}

function addRipple(e) {
  var target = e.target;
  var targetPosition = target.getBoundingClientRect(),
    offsetX = e.clientX - targetPosition.left,
    offsetY = e.clientY - targetPosition.top;
  var top = offsetY;
  var left = offsetX;
  var timeout = null;
  var ripple = document.createElement('span');
  var styleString = 'top:calc(' + top + 'px - .5em); left:calc(' + left + 'px - .5em);';

  target.appendChild(ripple);
  ripple.setAttribute("style", styleString);
  ripple.classList.add('-ripple');
  timeout = setTimeout(function () {
    ripple.parentNode.removeChild(ripple);
  }, 5000);
}


/* Setup Profile Form */

const $stepContainer = $('.form__step__container'),
  $steps = $('.form__step'),
  numSteps = $steps.length,
  $form = $('.form'),
  $next = $('.form__nav__next'),
  $prev = $('.form__nav__prev'),
  $bullets = $('.form__bullet');

let stepWidth = $form.width();
let currentSlide = 0;


function animateSlider() {
  $stepContainer.css('transform', `translateX(${-stepWidth * currentSlide}px)`);
  $bullets.removeClass('form__bullet--active')
    .eq(currentSlide).addClass('form__bullet--active');
}

function init() {
  stepWidth = $form.width();
  $steps.css({
    width: stepWidth + "px"
  });
  $stepContainer.css("width", stepWidth * numSteps + "px");
  animateSlider();
}

$next.on('click', function () {
  if (currentSlide < numSteps - 1) {
    currentSlide++;
    animateSlider();
  }
  if (currentSlide != 0) {
    $prev.removeClass('disabled');
  }
  if (currentSlide === numSteps - 1) {
    $(this).addClass('disabled');
  }
});
$prev.on('click', function () {
  if (currentSlide > 0) {
    currentSlide--;
    animateSlider();
  }
  if (currentSlide === 0) {
    $(this).addClass('disabled');
  }
  if (currentSlide != numSteps - 1) {
    $next.removeClass('disabled');
  }
});

$bullets.on('click', function () {
  currentSlide = $(this).index();
  animateSlider();
});

$(window).on('resize', init).resize();



//
$("#datepicker").datepicker({
  firstDay: 1,
  showOtherMonths: true,
  changeMonth: true,
  changeYear: true,
  dateFormat: "yy-mm-dd",
  yearRange: '1944:2014',

});

$(".date").mousedown(function () {
  $(".ui-datepicker").addClass("active");
});


/* API NAV */


// === Vars ===

const elementsToObserve = document.querySelectorAll('#test4 section[id]'),
  visibleClass = 'visible',
  nav = document.querySelector('#test4 nav'),
  navPath = nav.querySelector('svg path'),
  navListItems = [...nav.querySelectorAll('li')],
  navItems = navListItems.map(listItem => {

    const anchor = listItem.querySelector('a'),
      targetID = anchor && anchor.getAttribute('href').slice(1),
      target = document.getElementById(targetID);

    return {
      listItem,
      anchor,
      target
    };

  })
  .filter(item => item.target);

// === Functions ===

function drawPath() {

  let path = [],
    pathIndent;

  navItems.forEach((item, i) => {
    const x = item.anchor.offsetLeft - 5,
      y = item.anchor.offsetTop,
      height = item.anchor.offsetHeight;

    if (i === 0) {

      path.push('M', x, y, 'L', x, y + height);
      item.pathStart = 0;

    } else {

      if (pathIndent !== x)
        path.push('L', pathIndent, y);

      path.push('L', x, y);

      navPath.setAttribute('d', path.join(' '));
      item.pathStart = navPath.getTotalLength() || 0;
      path.push('L', x, y + height);
    }

    pathIndent = x;
    navPath.setAttribute('d', path.join(' '));
    item.pathEnd = navPath.getTotalLength();
  });
}

function syncPath() {

  const someElsAreVisible = () =>
    nav.querySelectorAll(`.${visibleClass}`).length > 0,
    thisElIsVisible = el =>
    el.classList.contains(visibleClass),
    pathLength = navPath.getTotalLength();

  let pathStart = pathLength,
    pathEnd = 0,
    lastPathStart,
    lastPathEnd;

  navItems.forEach(item => {
    if (thisElIsVisible(item.listItem)) {
      pathStart = Math.min(item.pathStart, pathStart);
      pathEnd = Math.max(item.pathEnd, pathEnd);
    }
  });

  if (someElsAreVisible() && pathStart < pathEnd) {

    if (pathStart !== lastPathStart || pathEnd !== lastPathEnd) {

      const dashArray = `1 ${pathStart} ${pathEnd - pathStart} ${pathLength}`;

      navPath.style.setProperty('stroke-dashoffset', '1');
      navPath.style.setProperty('stroke-dasharray', dashArray);
      navPath.style.setProperty('opacity', 1);
    }

  } else {
    navPath.style.setProperty('opacity', 0);
  }

  lastPathStart = pathStart;
  lastPathEnd = pathEnd;
}

function markVisibleSection(observedEls) {

  observedEls.forEach(observedEl => {

    const id = observedEl.target.getAttribute('id'),
      anchor = document.querySelector(`#test4 nav li a[href="#${ id }"]`);

    if (!anchor)
      return false

    const listItem = anchor.parentElement;

    if (observedEl.isIntersecting) {
      listItem.classList.add(visibleClass);
    } else {
      listItem.classList.remove(visibleClass);
    }
    syncPath();
  });
}

// === Draw path and observe ===

drawPath();

const observer = new IntersectionObserver(markVisibleSection);
elementsToObserve.forEach(thisEl => observer.observe(thisEl));