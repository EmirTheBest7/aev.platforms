// Birth Calendar
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

//Hello Animation 
/*
$(function() {
    function animationStart() {
        $('#container').addClass('fin');
    }
    setTimeout(animationStart, 250);
});*/

/* Preloader */
$(document).ready(function() {
    function animationStart() {
        $('#container').addClass('fin');
        setTimeout(animationEnd, 10000);
        var start_sound = new Audio('https://aliev.io/_assets/voices/start-up.mp3');
        start_sound.loop = false;
        start_sound.play();
    }
    animationStart();
    
    function animationEnd() { // Hides the overlay
        $('.loading-screen').css('z-index', 15).delay(1000);
        $('.loading-screen').fadeOut().delay(2000);
    }
});

//Theme Switcher
function theme_switch() {

    // Just a tiny bit of JavaScript to add classnames to the HTML-element on toggle
    var html = document.getElementsByTagName('html');
    var radios = document.getElementsByName('themes'); 

    for (i = 0; i < radios.length; i++) {
        radios[i].addEventListener('change', function() {
        html[0].classList.remove(html[0].classList.item(0));
            html[0].classList.add(this.id);
            console.log(this.id);
        });
    }
}

//Avatar format check
function avatar_check() {
    $('input[type="submit"]').prop("disabled", true);
    var a = 0;
    //binds to onchange event of your input field
    $('#imageUpload').bind('change', function () {
        if ($('input:submit').attr('disabled', false)) {
            $('input:submit').attr('disabled', true);
        }
        var ext = $('#imageUpload').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $('#error1').slideDown("slow");
            $('#error2').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#error2').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error2').slideUp("slow");
            }
            $('#error1').slideUp("slow");
            if (a == 1) {
                $('input:submit').attr('disabled', false);
            }
        }
    });
} // /Format Check


function pass_toggle() {
    var x = document.querySelector("[name='chpwd']")
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

// Modal
function showNotification() {
    $('.del-button').click(function () {
      var buttonId = $(this).attr('id');
      $('#modal-container').removeAttr('class').addClass(buttonId);
      $('body').addClass('modal-active');
    })
  
    $('#modal-container').click(function () {
      $(this).addClass('out');
      $('body').removeClass('modal-active');
    });
  } showNotification();

// Profile Picture Preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function () {
    readURL(this);
});

// Check if Email || Nickname exists

function checkAvailibility() {
    var validationFile = '../../auth/helpers/checkValidation.php'
    $('#nickname').blur(function () {
        var nickname = $(this).val();
        $.ajax({
            url: validationFile,
            method: "POST",
            data: {
                nick_name: nickname
            },
            success: function (data) {
                if (data != '0') {
                    console.log(data);
                    // Button
                    $("input[name='nickname']").css("border", "1px dashed red")

                    // Availibility Query
                    $('#availability_nick').html('<span class="text-danger">Nickname is not available</span>');
                    //$('input[type="submit"]').attr("disabled", true);
                } else {
                    $("input[name='nickname']").css("border", "1px solid white")

                    // Availibility Query
                    //$('#availability_nick').html('<span class="text-success">Nickname Available</span>');
                    $('#availability_nick').html('');
                    //$('input[type="submit"]').attr("disabled", false);
                }
            }
        })
    });
    $('#email').blur(function () {
        var email = $(this).val();
        $.ajax({
            url: validationFile,
            method: "POST",
            data: {
                mail_check: email
            },
            success: function (data) {
                if (data != '0') {
                    console.log(data);
                    // Button
                    $("input[name='email']").css("border", "1px dashed red")

                    // Availibility Query 
                    $('#availability_email').html('<span class="text-danger">Email is not available</span>');
                    //$('input[type="submit"]').attr("disabled", true);
                } else {
                    $("input[name='email']").css("border", "1px solid white")

                    // Availibility Query
                    //$('#availability_email').html('<span class="text-success">Email Available</span>');
                    $('#availability_email').html('');
                    //$('input[type="submit"]').attr("disabled", false);
                }
            }
        })
    });
};


// Page Switcher
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
            $content.fadeIn();

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


/* Profile Setup Picture */
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
