var galleryTop = new Swiper('.wallet_cc-container', {
  controller: {
    by: 'slide',
  },
effect: 'coverflow',
grabCursor: true,
slidesPerView: 'auto',
centeredSlides: true,
coverflowEffect: {
  rotate: 0,
  stretch: 0,
  depth: 100,
  modifier: 1,
  slideShadows: false,
},
// If we need pagination
pagination: {
  el: '.swiper-pagination',
},

});

/*
//thumbs
var galleryThumbs = new Swiper(".swiper-thumbs-container", {
  centeredSlides: true,
  slidesPerView: 1,
  slideToClickedSlide: true,
  direction: 'horizontal',
  effect:'cube',
  cubeEffect: {
    slideShadows: false,
  },
});

//thumbs 2 
var galleryThumbsTwo = new Swiper(".swiper-thumbs-container-2", {
  simulateTouch:false,
  centeredSlides: true,
  slidesPerView: 1,
  slideToClickedSlide: true,
  direction: 'horizontal',
  effect:'fade',
});
// set conteoller  

galleryTop.controller.control = galleryThumbsTwo;
galleryThumbs.controller.control = galleryTop;

galleryTop.controller.control = galleryThumbs;
galleryThumbs.controller.control = galleryThumbsTwo;



const appleToggle = document.getElementById('cc-apple-slide').classList.contains("swiper-slide-active");
const capitalToggle = document.getElementById('cc-capital-slide').classList.contains("swiper-slide-active");
const marriottToggle = document.getElementById('cc-marriott-slide').classList.contains("swiper-slide-active");
const bankToggle = document.getElementById('cc-bank-slide').classList.contains("swiper-slide-active");

if (capitalToggle === true && appleToggle === false && marriottToggle === false && bankToggle === false) {
document.querySelector(".wallet_cc-name-capital").style.display = "block";
document.querySelector(".cc-info-apple").style.display = "none";
document.querySelector(".cc-info-capital").style.display = "block";
document.querySelector(".cc-info-marriott").style.display = "none";
document.querySelector(".cc-info-bank").style.display = "none";
console.log('capital');
} else if (marriottToggle === true && appleToggle === false && capitalToggle === false && bankToggle === false) {
document.querySelector(".wallet_cc-name-marriott").style.display = "block";
document.querySelector(".cc-info-apple").style.display = "none";
document.querySelector(".cc-info-capital").style.display = "none";
document.querySelector(".cc-info-marriott").style.display = "block";
document.querySelector(".cc-info-bank").style.display = "none";
} else if (bankToggle === true && appleToggle === false && capitalToggle === false && marriottToggle === false) {
document.querySelector(".wallet_cc-name-bank").style.display = "block";
document.querySelector(".cc-info-apple").style.display = "none";
document.querySelector(".cc-info-capital").style.display = "none";
document.querySelector(".cc-info-marriott").style.display = "none";
document.querySelector(".cc-info-bank").style.display = "block";
}


function ccViewHide() {
  const iconToggle = document.getElementById('eye-slash');
  const appleToggle = document.getElementById('cc-apple-slide').classList.contains("swiper-slide-active");


  if (iconToggle.style.display === 'none') {
    iconToggle.style.display = 'block';
    document.getElementById('cc-info-apple-number-toggle').innerHTML ='****-****-****-5309';
    //document.getElementById('cc-info-apple-exp-toggle').innerHTML = '**//**';
    //document.getElementById('cc-info-apple-sec-toggle').innerHTML = '***';

  } else {
    appleToggle === true
    iconToggle.style.display = 'none';
    document.getElementById('cc-info-apple-number-toggle').innerHTML ='1234-5678-7654-5309';
    document.getElementById('cc-info-apple-exp-toggle').innerHTML = '1/25';
    document.getElementById('cc-info-apple-sec-toggle').innerHTML = '123';
  }
}
*/