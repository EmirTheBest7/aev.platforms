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
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="./crypto.css">
  <link rel="stylesheet" href="./style.css">

  <style>
    .swiper-cube-shadow {
      display: none;
    }
  </style>

</head>

<body>
  <nav class="Navbar">
    <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
      data-target="#navbarCollapse"><span></span></a>

    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

    <div id="navbarCollapse" class="Navbar-menu">
        <ul class="Navbar-menu-major">
            <li><a href="../" style="font-size: 1.2rem;">Dashboard</a></li>
          </ul>
    </div>

    <ul class="Navbar-quickLinks">
      <li><a href="#link">Facebook</a></li>
      <li><a href="#link">Twitter</a></li>
      <li><a href="#link">Instagram</a></li>
    </ul>
  </nav>

  <main id="main">
    <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

    <div class="wallet-container">
      <!-- SCREEN -->
      <div class="iphone__screen__body">
        <div class="wallet_top">
          <div class="wallet_top-container">
            <h1 class="wallet_top-copy font-sd-pro-dis">My Wallet</h1>
          </div>
          <div>
            <div class="wallet_top-addIcon">
              <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M22 0C9.85 0 0 9.85 0 22C0 34.15 9.85 44 22 44C34.15 44 44 34.15 44 22C44 9.85 34.15 0 22 0ZM33 22.5C33 23.33 32.33 24 31.5 24H24V31.5C24 32.33 23.33 33 22.5 33H21.5C20.67 33 20 32.32 20 31.5V24H12.5C11.67 24 11 23.33 11 22.5V21.5C11 20.67 11.67 20 12.5 20H20V12.5C20 11.67 20.67 11 21.5 11H22.5C23.33 11 24 11.67 24 12.5V20H31.5C32.33 20 33 20.67 33 21.5V22.5Z"
                  fill="black" />
              </svg>
            </div>
          </div>
        </div>
        <div class="wallet_cc-container swiper-container">
          <div class="wallet-cc-slider swiper-wrapper">
            <div id="cc-apple-slide" class="swiper-slide">
              <div class="cc-container cc-apple">
                <div class="card" style="transform: none">
                  <div class="apple"></div>
                  <div class="name"><?php echo $_SESSION['username']; ?></div>
                  <div class="chip"><span></span><span></span><span></span><span></span><span></span><span></span>
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
            <div id="cc-marriott-slide" class="cc-marriott-slide swiper-slide">
              <div class="cc-container cc-marriott">
                  <div class="card" style="transform: none">
                      <div class="apple"></div>
                      <div class="name">Steve Jobs</div>
                      <div class="chip"><span></span><span></span><span></span><span></span><span></span><span></span>
                      </div>
                    </div>
              </div>
            </div>
            <div id="cc-bank-slide" class="cc-bank-slide swiper-slide">
              <div class="cc-container cc-bank">
                <div class="card" style="transform: none">
                  <div class="apple"></div>
                  <div class="name">Steve Jobs</div>
                  <div class="chip"><span></span><span></span><span></span><span></span><span></span><span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="swiper-pagination"></div>
          <div class="action-btns" style="text-align:center;">
            <span class="action-btn-blue">
              <a onclick="ccViewHide()" style="margin: 3px -32px;
                position: absolute;
                background-color: #C4C4C4;
                border-radius: 50%;
                width: 63px;
                height: 63px;">
                <svg width="34" height="60" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M17.7557 8.52429C19.2486 8.55995 20.6986 8.79531 22.1272 9.22324C24.4843 9.92932 26.6129 11.0919 28.5986 12.5254C30.1914 13.6808 31.6629 14.9717 32.9772 16.4481C33.62 17.1684 33.6129 18.1313 32.97 18.8587C31.6272 20.3707 30.1129 21.683 28.4772 22.8598C27.1914 23.7799 25.8343 24.5858 24.3843 25.2277C23.0772 25.8125 21.7272 26.2476 20.32 26.5044C19.12 26.7183 17.9129 26.7896 16.6986 26.7041C15.5486 26.6185 14.42 26.3974 13.3129 26.0622C11.0129 25.3632 8.92001 24.2435 6.97716 22.8527C5.37001 21.7044 3.89858 20.4064 2.57001 18.9443C2.22716 18.5663 2.02001 18.1455 2.02716 17.632C2.0343 17.1399 2.2343 16.7262 2.57001 16.3625C4.12001 14.6579 5.86287 13.1744 7.77716 11.8978C9.15573 10.9849 10.6129 10.2075 12.1629 9.62264C13.3486 9.18045 14.5629 8.8381 15.8272 8.68833C16.47 8.61701 17.1129 8.57422 17.7557 8.52429ZM23.3486 12.7822C23.3414 12.7893 23.3272 12.7964 23.32 12.8107C23.8629 13.7379 24.1557 14.7435 24.1986 15.8062C24.2414 16.876 24.0272 17.8888 23.5629 18.8516C23.0986 19.8216 22.4272 20.6204 21.5629 21.2623C19.4557 22.8242 16.57 22.9454 14.3343 21.5475C12.8557 20.6204 11.8843 19.3081 11.4629 17.6177C11.0414 15.9274 11.2986 14.3227 12.1343 12.7964C11.9843 12.8464 11.8486 12.9105 11.7129 12.9747C9.36287 14.1301 7.31287 15.6921 5.47001 17.5322C5.37001 17.632 5.37716 17.6819 5.47001 17.7746C7.19858 19.5006 9.10573 20.9912 11.2843 22.1181C12.9772 22.9954 14.7557 23.6016 16.67 23.7728C17.8557 23.8797 19.0343 23.8084 20.1986 23.5659C21.4629 23.302 22.67 22.867 23.8343 22.2964C26.17 21.141 28.1986 19.5791 30.0272 17.7461C30.1129 17.6605 30.0914 17.6177 30.02 17.5464C29.6057 17.1542 29.2057 16.7548 28.7772 16.3768C27.2557 15.0288 25.5986 13.8662 23.7629 12.9747C23.6272 12.9105 23.4843 12.8464 23.3486 12.7822ZM22.2057 14.879C22.2057 14.2585 21.8414 13.6309 21.3057 13.3242C20.6414 12.9533 20.0057 13.2529 19.8772 13.9946C19.7629 14.6294 20.1557 15.4139 20.7557 15.7491C21.0129 15.8918 21.2843 15.9702 21.5772 15.8704C21.9772 15.742 22.1986 15.3783 22.2057 14.879Z"
                    fill="#353535" />
                  <path id="eye-slash" d="M4.52571 2.00001L2 4.52121L29.5124 32L32.0381 29.4788L4.52571 2.00001Z"
                    fill="#353535" stroke="#C4C4C4" stroke-width="2" stroke-miterlimit="10" />
                </svg>
              </a>
            </span>
            <span class="action-btn-blue"></span>
            <span class="action-btn-blue"></span>
            <span class="action-btn-blue"></span>
          </div>
          <div id="hidden" class="wallet_cc-name-container swiper-thumbs-container swiper-container">
            <div class="swiper-wrapper">
              <div class="wallet_cc-name-apple font-sd-pro-dis swiper-slide">Apple Card</div>
              <div class="wallet_cc-name-capital font-sd-pro-dis swiper-slide">Capital One Rewards</div>
              <div class="wallet_cc-name-marriott font-sd-pro-dis swiper-slide">Chase Marriott Bonvoy</div>
              <div class="wallet_cc-name-bank font-sd-pro-dis swiper-slide">Debit Bank Card</div>
            </div>
          </div>
        </div>

        <div class="wallet_cc-info-container swiper-thumbs-container-2 swiper-container">
          <div class="swiper-wrapper swiper-thumbs-container-2_flex">
            <div class="cc-info-apple swiper-slide">
              <div class="font-sd-pro-dis cc-info-name">John Doe</div>
              <div class="font-sd-pro-dis cc-info-number"><span id="cc-info-apple-number-toggle"
                  class="cc-info-number-hidden">****-****-****-8675</span></div>
              <div class="font-sd-pro-dis cc-info-exp">Exp : <span id="cc-info-apple-exp-toggle"
                  class="cc-info-exp-hidden">**/**</span></div>
              <div class="font-sd-pro-dis cc-info-sec">Security Code : <span id="cc-info-apple-sec-toggle"
                  class="cc-info-sec-hidden">***</span></div>

            </div>
            <div class="cc-info-capital swiper-slide">
              <div class="font-sd-pro-dis cc-info-name">Capital Doe</div>
              <div class="font-sd-pro-dis cc-info-number"><span id="cc-info-apple-number-toggle"
                  class="cc-info-number-hidden">****-****-****-5309</span></div>
              <div class="font-sd-pro-dis cc-info-exp">Exp : <span id="cc-info-apple-exp-toggle"
                  class="cc-info-exp-hidden">**/**</span></div>
              <div class="font-sd-pro-dis cc-info-sec">Security Code : <span id="cc-info-apple-sec-toggle"
                  class="cc-info-sec-hidden">***</span></div>

            </div>
            <div class="cc-info-marriott swiper-slide">
              <div class="font-sd-pro-dis cc-info-name">Marriott Doe</div>
              <div class="font-sd-pro-dis cc-info-number"><span id="cc-info-apple-number-toggle"
                  class="cc-info-number-hidden">****-****-****-1789</span></div>
              <div class="font-sd-pro-dis cc-info-exp">Exp : <span id="cc-info-apple-exp-toggle"
                  class="cc-info-exp-hidden">**/**</span></div>
              <div class="font-sd-pro-dis cc-info-sec">Security Code : <span id="cc-info-apple-sec-toggle"
                  class="cc-info-sec-hidden">***</span></div>
            </div>
            <div class="cc-info-bank swiper-slide">
              <div class="font-sd-pro-dis cc-info-name">Bank Doe</div>
              <div class="font-sd-pro-dis cc-info-number"><span id="cc-info-apple-number-toggle"
                  class="cc-info-number-hidden">****-****-****-6400</span></div>
              <div class="font-sd-pro-dis cc-info-exp">Exp : <span id="cc-info-apple-exp-toggle"
                  class="cc-info-exp-hidden">**/**</span></div>
              <div class="font-sd-pro-dis cc-info-sec">Security Code : <span id="cc-info-apple-sec-toggle"
                  class="cc-info-sec-hidden">***</span></div>
            </div>
          </div>

        </div>
      </div>


    </div>
  </main>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
  <script src="./script.js"></script>

</body>

</html>