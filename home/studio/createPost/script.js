/* Poost Picture Drag&View */
function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
        $('.remove-image').show();
  
        //$('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    $('.remove-image').hide();
  }
  $('.image-upload-wrap').bind('dragover', function () {
          $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
          $('.image-upload-wrap').removeClass('image-dropping');
  });

/* */

const wrapper = document.querySelector(".wrapper"),
  postContainer = wrapper.querySelector(".postContainer"),
  privacyContainer = wrapper.querySelector(".privacyContainer"),
  privacyButton = postContainer.querySelector("span.privacy"),
  postContent = postContainer.querySelector(".postContent"),
  postButton = postContainer.querySelector(".postButton"),
  backButton = privacyContainer.querySelector(".back");

postContent.addEventListener("input", () => {
  if (postContent.value.length > 11) postButton.classList.remove("disabled");
  else postButton.classList.add("disabled");
});

privacyButton.addEventListener("click", () => {
  privacyContainer.classList.add("active");
  postContainer.classList.remove("active");
});

backButton.addEventListener("click", () => {
  postContainer.classList.add("active");
  privacyContainer.classList.remove("active");
});

/* Characters counter */

const input = document.querySelector(".postContent");
const count = document.querySelector(".count");
const mxlenght = input.getAttribute("maxlength"); //140
input.onkeyup = () => {
  count.innerText = input.value.length; // 140 - typed
};


/* Dropdown */
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});



/* NSFW */

// const nsfwjs = require('nsfwjs')
const img = new Image();
img.crossOrigin = "anonymous";
// some image here
img.src = "https://i.imgur.com/Kwxetau.jpg";

// Load the model.
nsfwjs.load().then((model) => {
    // Classify the image.
    model.classify(img).then((predictions) => {
        console.log("Predictions", predictions);
    });
});