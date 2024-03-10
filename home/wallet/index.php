<?php 

include('../../_inc/functions.php');

session_start();
auth();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

    <title>My Wallet</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap'>
        
        
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="./crypto.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./try.css">

    <style>
        main {
            padding: 0 0 0 6rem;
        }

        /* Mobile Layout: 320px. */
        @media only screen and (max-width: 767px) {
            main {
                padding: var(--navbar-height) 0 0 0;
            }
        }
    </style>

</head>

<body>
    <nav class="Navbar">
        <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="foot-cardlapse"
            data-target="#navbarCollapse"><span></span></a>

        <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

        <div id="navbarCollapse" class="Navbar-menu">
            <ul class="Navbar-menu-major">
                <li><a href="../" style="font-size: 1.2rem;">Dashboard</a></li>
            </ul>
        </div>
        
    </nav>

    <main id="main">



        <!-- SCREEN -->

        <div class="wallet_cc-container swiper-container">
            <div class="wallet-cc-slider swiper-wrapper">
                <div id="cc-apple-slide" class="swiper-slide">
                    <div class="cc-container cc-apple">
                        <div class="card" style="transform: none">
                            <div class="apple">Λ L I Ξ V | Premium</div>
                            <div class="name"><?php echo $_SESSION['username']; ?></div>
                            <div class="chip">
                                <span></span><span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cc-apple-slide" class="swiper-slide">
                    <div class="cc-container cc-apple">
                        <div class="card" style="transform: none; background-image: linear-gradient(to bottom right, #f4f2f3, #d5d3d4);">
                            <div class="apple" style="font-size: 68px;"></div>
                            <div class="name" style="top: 150px;"><?php echo $_SESSION['username']; ?></div>
                            <div class="chip">
                                <span></span><span></span><span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cc-capital-slide" class="cc-capital-one-slide swiper-slide">
                    <div class="cc-container cc-capital-one">
                        <div class="card-item">
                            <div class="card-item__side -front">
                                <div class="card-item__focus" style=""></div>
                                <div class="card-item__cover"><img
                                        src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/15.jpeg"
                                        class="card-item__bg"></div>
                                <div class="card-item__wrapper">
                                    <div class="card-item__top"><img
                                            src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/chip.png"
                                            class="card-item__chip">
                                        <div class="card-item__type"><img
                                                src="https://raw.githubusercontent.com/muhammederdem/credit-card-form/master/src/assets/images/visa.png"
                                                alt="" class="card-item__typeImg"></div>
                                    </div> <label for="cardNumber" class="card-item__number"><span>

                                            <div class="card-item__holder">Card Holder</div>
                                            <div class="card-item__name"><?php echo $_SESSION['username']; ?></div>

                                        </span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="swiper-pagination"></div>
        </div>



        <div class="transactions"><span class="t-desc">Recently Added</span>

          <div class="transaction">
            <div class="t-icon-container"><img src="https://www.paypalobjects.com/webstatic/icon/pp144.png" class="t-icon"></div>
            <div class="t-details">
              <div class="t-title"><?php echo $_SESSION['username']; ?></div>
              <div class="t-time">@<?php echo $_SESSION['nickname']; ?></div>
            </div>
            <div class="t-amount">+&nbsp;<?php echo 750; ?>$</div>
          </div>

        </div>





        <div class="container-fluid">
            <div class=" fixed-footer">
                <div class="foot-card">
                    <i id="login" class="login">Login</i>
                </div>
                <div class="foot-card">
                    <i id="usermenu" class="uil uil-user"></i>
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
            <div id="login-area" class="ask-question">
                
            </div>
            <div id="user-profile" class=" user-profile">
                <div>
                    <div><img src="<?php echo $_SESSION['user_photo']; ?>" alt=""></div>
                    <div class="user-details pl-3">
                        <span><?php echo $_SESSION['username']; ?></span>
                        <span><i class="logout">Logout</i></span>
                    </div>
                </div>
                <ul>
                    <li><a href="">CareClues Wallet</a></li>
                    <li><a href="">Clinic Appointment</a></li>
                    <li><a href="">Home Consultation</a></li>
                    <li><a href="">Phone Consultation</a></li>
                    <li><a href="">Chat Consultation</a></li>
                    <li><a href="">Health Tests & Plans</a></li>
                    <li><a href="">Medical Records</a></li>
                    <li><a href="">Medical History</a></li>
                    <li><a href="">Payments</a></li>
                    <li><a href="">Feedback</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="">Profile</a></li>
                </ul>
            </div>
            <div id="ask-question" class="ask-question">
                <p><span>Invite friend to get</span>Free coins!
                <img src="./lib">
                <span style="margin-top: 5%;"><?php echo $_SESSION['username']; ?></span>
                </p>
            </div>
            <div id="app-download" class="ask-question">
                
            
            </div>
            <div id="content-menu" class="ask-question">
                
            </div>
        </div>
    </main>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>

    <script src="./try.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    <script src="./script.js"></script>

</body>

</html>