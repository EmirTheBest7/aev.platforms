// Pinspiration
// https://www.behance.net/gallery/35580657/Unsplash-Website-Redesign

// Array for feed images
var imgArray = ['https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg',
                'https://ribbonaroundabomb.files.wordpress.com/2013/06/hipster-art-three-of-the-possessed.jpg'

                ];

// Loop for placing the images into the divs on the page
for(var i=0;i<imgArray.length;i++) {

    // Changing height to width ratio of div based on the ratio of the image - SIZING NOT WORKING 100%
    var img = new Image();
    img.src = imgArray[i];
    if((img.width / img.height) > 1.2) {$('.image').eq(i).addClass('wide')}
    else if((img.width / img.height) < 0.8333) {$('.image').eq(i).addClass('long')}
    else {$('.image').eq(i).addClass('square')}; // Fallback to normal square

    // Setting the Background image
    $('.image').eq(i).css('background-image', 'url("'+imgArray[i]+'")');
};

// Load More images function - NOT WORKING PROPERLY WITH THE SIZING
$('.load-button').click(function(){
    for(var j = 1; j < 4; j++){
        var imageNum = $('.image').length; // Getting total number of images on the page.

        for(var i = 1; i < 4; i++){
            var thisImageNum = imageNum + i;
            $('.image-column.'+i).append('<div class="rela-block image '+thisImageNum+'"></div>'); 

            var img = new Image();
            img.src = imgArray[thisImageNum - 1];
            if((img.width / img.height) > 1.2) {$('.image.'+thisImageNum).addClass('wide')}
            else if((img.width / img.height) < 0.8333) {$('.image.'+thisImageNum).addClass('long')}
            else {$('.image.'+thisImageNum).addClass('square')};

            // Setting the Background image
            $('.image.'+thisImageNum).css('background-image', 'url("'+imgArray[thisImageNum - 1]+'")');
        };
    };
    return false;
});

// Image Layout Switching Function
$('.layout-option').click(function(){
    $('.layout-option').removeClass('active');
    $(this).addClass('active');
    $(this).hasClass('rows')?$('.image-column').addClass('rows'):$('.image-column').removeClass('rows');
    return false;
});

// Display Image function
// Click function written this way due to dynamically added images
$('.image-grid-container').on('click', '.image', function() {
    
    // get the url image clicked
    var thisBG = $(this).css('background-image');
    
    //assign background to the pop-up and display
    $('.photo-tab').css('background',thisBG+' center no-repeat');
    $('.photo-container').addClass('displayed');
    return false;
});

// closing the menu-overlay
$('.close, .photo-container').click(function(){ 
    $('.photo-tab').css('background','none');
    $('.photo-container').removeClass('displayed'); return false;
});
// preventing clicks on the menu closing it for now because there is nothing inside yet.
$('.photo-tab').click(function(){ return false; });