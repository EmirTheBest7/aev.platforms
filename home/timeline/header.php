<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<nav class="Navbar">
    <a id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
        data-target="#navbarCollapse"><span></span></a>

    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

    <div id="navbarCollapse" class="Navbar-menu">
        <div style="margin: 8px 20px 0px;letter-spacing: 1px;justify-content: space-between;display: flex;">
            <h3><?php echo date("d/m"); ?></h3>
            <h3 id="clock">10:41</h3>
        </div>

        <div class="cc-container swiper-container">
            <div class="wallet-cc-slider swiper-wrapper">
                <div class="swiper-slide">
                    <div class="circle" onclick="location.href='../profile';">
                        <img src="<?php echo $_SESSION['user_photo']; ?>" alt="">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="enable-background:new -580 439 577.9 194;" xml:space="preserve">
                        <circle cx="50" cy="50" r="40"></circle>
                        </svg>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="circle test">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" style="enable-background:new -580 439 577.9 194;" xml:space="preserve">
                        </svg>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="cc-container cc-apple circle">
                        <div class="card" style="transform: none">
                            <div class="apple">Λ L I Ξ V | Premium</div>
                            <div class="name"><?php echo $_SESSION['username']; ?></div>
                            <div class="chip">
                                <span></span><span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
            <div class="swiper-pagination hide"></div>
        </div>

    
      
      
    

      <ul>
        <div class="hide" onclick="location.href='../profile';">
            <li><p href="#link" style="font-size: 1.4rem;"><?php echo $_SESSION["username"];?></p></li>
        </div>

        <div class="sidebar-search hide">
            <div>
                <div class="input-group">
                    <form action="./search/">
                        <input type="text" name="search" class="form-control search-menu" placeholder="&#x1F50D; Search..." autocomplete="off">
                    </form>
                </div>
            </div>
        </div>

        <div class="Navbar-menu-major" style="text-align:left;">
            <div class="dynamic-island">
                <span style="color: yellow; overflow: hidden;width: 90%;font-size: 12px;padding: 4px 0px 3px 3px;position: absolute;">
                <?php echo strtok($_SESSION["username"], " ").verified($_SESSION['access']); ?></span>
            
                <div class="spacer"></div>
                <div class="divider"></div>
                <div class="iconDiv" tooltip="Search" tabindex="0">
                    <div class="iconSVG uil uil-search">
                    <input style="display: none;"/>
                    </div>
                </div>
                <div class="iconDiv" tooltip="Notifications" tabindex="0">
                    <div class="iconSVG uil uil-comment-heart"></div>
                </div>
                <div class="iconDiv" tooltip="Log out" tabindex="0" onclick="href('?action=logout')">
                <div class="iconSVG uil uil-sign-out-alt"  style="color:red;"></div>
                </div>
            </div>

            <li>
                <a href="../profile/" style="padding: 1.6rem 3%;">
                    <i class="uil uil-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="../messenger/" style="padding: 1.6rem 3%;">
                    <i class="uil uil-envelope-alt"></i>
                    <span>Messenger</span>
                </a>
            </li>
            <li>
                <a class="soon" style="padding: 1.6rem 3%;">
                    <i class="uil uil-shopping-cart-alt"></i>
                    <span>Store</span>
                </a>
            </li>
            <li>
                <a class="soon" style="padding: 1.6rem 3%;">
                    <i class="uil uil-webcam"></i>
                    <span>ALLView+</span>
                </a>
            </li>
            <li>
                <a href="../studio/editProfile/" style="padding: 1.6rem 3%;">
                    <i class="uil uil-sliders-v"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <hr>
                <a href="#" style="padding: 1.6rem 3%;">
                    <i class="uil uil-external-link-alt"></i>
                    <span>Advertisements</span>
                </a>
                <hr>
            </li>

             
            <div class="fixed-footer">
                <div class="foot-card">
                    <a id="login" class="uil uil-6-plus"></a>
                </div>
                <div class="foot-card">
                    <i id="usermenu" class="uil uil-compass"></i>
                </div>
                <div class="foot-card">
                    <i id="question" class="uil uil-qrcode-scan"></i>
                </div>
                <div class="foot-card">
                    <i id="download" class="uil uil-bag"></i>
                </div>
                <div class="foot-card">
                    <i id="contents" class="uil uil-bars"></i>
                </div>
            </div>

            <div id="login-area" class="ask-question"></div>
            <div id="user-profile" class="ask-question"></div>
            <div id="ask-question" class="ask-question search-frame">
                <iframe src="<?php echo BASE_URL . "home/timeline/search/" ?>" title="Search App"></iframe>
            </div>
            <div id="app-download" class="ask-question"></div>
            <div id="content-menu" class="ask-question">
                <div class="widget-menu-ctl">
                    <button class=""><i class="uil uil-upload"></i>Sdílet</button>
                    <button class=""><i class="uil uil-link-h"></i>Odkaz</button>
                    <button class=""><i class="uil uil-closed-captioning-slash"></i>Nahlásit</button>
                </div>
                <div class="lang-trigger"><i class="uil uil-stop-circle"></i> English</div>
                <div class="lang-trigger hide" style="height: 250px;"></div>
            </div>

        </div>

    </div>

    


    <ul class="Navbar-quickLinks">
    
            <li><a class="Toggle Navbar-toggle Navbar-icons"><button class="quickLinks-btn explore"><i class="uil uil-icons"></i></button></a></li>
            <li><a class="Toggle Navbar-toggle Navbar-icons"><button class="quickLinks-btn"><i class="uil uil-video"></i></button></a></li>
            <li><a class="Toggle Navbar-toggle Navbar-icons"><button onclick="window.location.href='<?php echo BASE_URL . 'home/messenger/'; ?>'" class="quickLinks-btn messenger"><i class="uil uil-message"></i></button></a></li>
            <li><a class="Toggle Navbar-toggle Navbar-icons"><button class="quickLinks-btn"><i class="uil uil-estate"></i></button></a></li>
            <li class="line"></li>
            <li><a class="Toggle Navbar-toggle Navbar-icons"><button onclick="window.location.href='<?php echo BASE_URL . 'home/studio/createPost/'; ?>'" class="quickLinks-btn add-post"><i class="uil uil-plus-circle"></i></button></a></li>
    </ul>
</nav>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {

    $("#login").click(function (e) {
        e.preventDefault();
        $(this).addClass('current');
        $("#login-area").slideToggle(200);
        $("#user-profile").slideUp(200);
        $("#ask-question").slideUp(200);
        $("#app-download").slideUp(200);
        $("#content-menu").slideUp(200);
    });

    $("#usermenu").click(function (e) {
        e.preventDefault();
        $(this).addClass('current');
        $("#login-area").slideUp(200);
        $("#user-profile").slideToggle(200);
        $("#ask-question").slideUp(200);
        $("#app-download").slideUp(200);
        $("#content-menu").slideUp(200);
    });

    $("#question").click(function (e) {
        e.preventDefault();
        $(this).addClass('current');
        $("#login-area").slideUp(200);
        $("#user-profile").slideUp(200);
        $("#ask-question").slideToggle(200);
        $("#app-download").slideUp(200);
        $("#content-menu").slideUp(200);
    });

    $("#download").click(function (e) {
        e.preventDefault();
        $(this).addClass('current');
        $("#login-area").slideUp(200);
        $("#user-profile").slideUp(200);
        $("#ask-question").slideUp(200);
        $("#app-download").slideToggle(200);
        $("#content-menu").slideUp(200);
    });

    $("#contents").click(function (e) {
        e.preventDefault();
        $(this).addClass('current');
        $("#login-area").slideUp(200);
        $("#user-profile").slideUp(200);
        $("#ask-question").slideUp(200);
        $("#app-download").slideUp(200);
        $("#content-menu").slideToggle(200);
    });

    new QRCode(document.getElementsByClassName('test')[0], {
        text: "<?php echo BASE_URL . "home/auth/?refer=" . strtolower($_SESSION['nickname']); ?>",
        width: 128,
        height: 128,
        colorDark: "#fff",
        colorLight: "#000",
        correctLevel: QRCode.CorrectLevel.H
    });
    
    var galleryTop = new Swiper('.cc-container', {
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
        }
    });

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

    

    
});
</script>
