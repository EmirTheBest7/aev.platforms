<?php include('../../../../../../_inc/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Unsplash Redesign Stuff</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="../../_assets/css/style.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>


    <div class="window">
        <div class="header">
            <div class="burger-container">
                <div id="burger">
                    <div class="bar topBar"></div>
                    <div class="bar btmBar"></div>
                </div>
            </div>
            <a class="icon icon-logo" href="#">
                <img src="<?php echo LOGO; ?>"></a>
            <ul class="menu">
                <li class="menu-item"><a href="./apps/articles/">Articles</a></li>
                <li class="menu-item"><a href="#">iPad</a></li>
                <li class="menu-item"><a href="#">iPhone</a></li>
                <li class="menu-item"><a href="#">Watch</a></li>
                <li class="menu-item"><a href="#">TV</a></li>
                <li class="menu-item"><a href="#">Music</a></li>
                <li class="menu-item"><a href="#">Support</a></li>
            </ul>
            <div class="shop icon icon-bag uil uil-shopping-bag"></div>
        </div>
        <div class="content">
            <!-- partial:index.partial.html -->
            <!-- FONTS -->
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

            <!-- PAGE STUFF -->
            <input type="checkbox" id="menuCheckbox" />
            <input type="checkbox" id="searchCheckbox" />

            <div class="photo-container">
                <div class="close">close</div>
                <div class="photo-details">
                    <h2>Photo Details</h2>
                    <ul>
                        <li class="rela-inline"><span>PUBLISHED : </span> Jan 1, 1980</li>
                        <li class="rela-inline"><span>DIMENSIONS : </span>9999 x 9999</li>
                        <li class="rela-inline"><span>MAKE : </span>Canon</li>
                        <li class="rela-inline"><span>MODEL : </span>Canon EOS 6D</li>
                        <li class="rela-inline"><span>EXPOSURE TIME : </span>0.004</li>
                        <li class="rela-inline"><span>APERTURE : </span>5</li>
                        <li class="rela-inline"><span>FOCAL LENGTH : </span>178</li>
                        <li class="rela-inline"><span>ISO : </span>100</li>
                    </ul>
                </div>
                <div class="abs-center photo-tab"></div>
            </div>

            <div class="rela-block top-bar"></div>

            <div class="rela-block top-container">
                <div class="rela-block top-center-container">
                    <div class="inner-container top-text-container">
                        <h2 class="rela-block top-main-text">Unsplash</h2>
                        <p>Free High-resolution images every ten days.</p>
                        <div class="rela-inline button white-text">Subscribe</div>
                    </div>
                    <div class="inner-container top-search-container">
                        <p class="search-text">Search Unsplash</p>
                        <input type="text" placeholder="Type Something" class="top-search" />
                    </div>
                </div>
                <label for="menuCheckbox" class="checkbox-label menu-label">
                    <div class="abs-center black-lines"></div>
                </label>
                <label for="searchCheckbox" class="checkbox-label search-label">
                    <div class="abs-center magnifying-glass"></div>
                </label>
            </div>

            <div class="rela-block image-layout-selector">
                <div class="floated layout-option rows">
                    <div class="abs-center bars rotated"></div>
                </div>
                <div class="floated layout-option columns active">
                    <div class="abs-center bars"></div>
                </div>
            </div>

            <div class="rela-block image-grid-container">
                <div class="floated image-column 1">
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                </div>
                <div class="floated image-column 2">
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                </div>
                <div class="floated image-column 3">
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                    <div class="rela-block image"></div>
                </div>
            </div>

            <div class="rela-block button black-text load-button">Load More</div>
        </div>
    </div>



    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="../../_assets/js/script.js"></script>
    <script src="./script.js"></script>

</body>

</html>