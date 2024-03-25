<?php 

require '../../_inc/functions.php';
session_start();


// 
if(isset($_POST['send_order']) && $_POST['send_order']==1) { 
  // Send Order

  if(isset($_POST['services'])) {
    foreach ($_POST['services'] as $service) {
      $services[] = $service;
    }
  } else {
    $services[] = "";
  }
  $order_number = str_pad(idate("d"), 2, "0", STR_PAD_LEFT).str_pad(idate("m"), 2, "0", STR_PAD_LEFT).substr(idate("y", $timestamp), -2);
  $order_name = $_POST['order_name'];
  $order_email = $_POST['order_email'];

  $summary_order = '
  [New Order No: '.$order_number."_1".']
  
  Services: '.implode(",", $services).'

  Name: '.$order_name.'
  Email: '.$order_email.'
  ';

  notify($summary_order);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <?php echo file_get_contents(BASE_URL . "_assets/icon/");  ?>
  

  <title>ΛΞV | Digital studio.</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <!-- Widgets -->
  <link rel="stylesheet" href="<?php echo "./widgets/3droom/style.css"?>">
</head>

<body>
  <!-- preloader -->
  <div class="loading-screen">
    <div class="loading-animation">
      <img src="<?php echo LOGO; ?>" alt="Λ L I Ξ V" class="logo">
      <div class="loading-bar"></div>
    </div>
  </div>

  <!-- notification for small viewports and landscape oriented smartphones -->
  <div class="device-notification">
    <a class="device-notification--logo" href="#0">
      <img src="<?php echo LOGO; ?>" alt="Λ L I Ξ V" style="margin: 0 auto;width: 30%;">
    </a>
    <p class="device-notification--message">There is so much to offer that we must request you orient your device to
      portrait or find a larger screen. You won't be disappointed.</p>
  </div>

  <div class="aev-notifications"></div>

  <!-- PWA Modal -->
	<div class="RccSCT7" id="RccSCT7-open">
		<div class="RccSCT7-header">
			<div class="RccSCT7-logo" style="display: flex; line-height: 56px;">
				<span class="logo-circle"><i class="uil uil-mobile-android"></i></span>Install PWA
			</div>
			<a href="#" title="Close" class="btn-close"><i class="uil uil-multiply"></i></a>
		</div>

		<div class="RccSCT7-body">
			<p class="RccSCT7-description">Looks like you're using a mobile browser. Follow these instructions to download
				your PWA App:</p>

			<div class="hCSSVt">
				<div class="fiTMpP">1</div>
				<span class="sc-dqYEFG dxXMXL">
					Tap the share button in your browser
				</span>
				<button type="button" class="sc-eqUAAy jMKjKI"><i class="uil uil-upload"></i></button>
				<div class="sc-giVogm hVRUym"></div>
				<div class="fiTMpP">2</div><span class="sc-dqYEFG dxXMXL">
					Tap the “Add to Home Screen” button</span>
				<button type="button" class="sc-eqUAAy jMKjKI">
					<i class="uil uil-plus-square"></i>
				</button>
			</div>

		</div>
	</div>


  <nav class="Navbar">
    <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
      data-target="#navbarCollapse"><span></span></a>

    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

    <div id="navbarCollapse" class="Navbar-menu">

      <div id="login1" class="switch-group">
        
        <ul class="Navbar-menu-major">
          <li style="text-align: center; padding: 0 14%;"><input type="text" class="m-spotlight-search" placeholder="Re:Search" disabled></li>
          <li class="mod-buttons flex">
            <button class="ext-sign-in-btn" onclick="settings_in()">Settings</button>
            <button class="ext-sign-in-btn" onclick="register()"> Widgets</button>
          </li>
          <li><hr></li>
          
          <li>
            <ul id="aDHieSVT" class="aDHieSVT">

              <li>
                <div class="aDHieSVT-link">Explore <i class="uil uil-plus"></i></div>
                <ul class="aDHieSVT-submenu">
                  <li style="padding: 15px!important">
                      <a class="aDHieSVT-card">
                        <div class="aDHieSVT-wrapper">
                          <div style=" border: 1px solid; border-radius: 5px; font-size: 17px;">
                            <span class="uil uil-fire" style="display: flex; justify-content: center; align-items: center; padding: 5px 2px 5px 5px;">
                            </span>
                          </div>
                          <div><h3>Services</h3></div>
                        </div>
                        <p style="font-size: 12px;">Explore possibilities</p>
                      </a>
                  </li>
                  <li style="padding: 15px!important">
                      <a class="aDHieSVT-card">
                        <div class="aDHieSVT-wrapper">
                          <div style=" border: 1px solid; border-radius: 5px; font-size: 17px;">
                            <span class="uil uil-compress" style="display: flex; justify-content: center; align-items: center; padding: 5px 2px 5px 5px;">
                            </span>
                          </div>
                          <div><h3>Portfolio</h3></div>
                        </div>
                        <p style="font-size: 12px;">Our collection</p>
                      </a>
                  </li>
                  <li style="padding: 15px!important">
                      <a class="aDHieSVT-card">
                        <div class="aDHieSVT-wrapper">
                          <div style=" border: 1px solid; border-radius: 5px; font-size: 17px;">
                            <span class="uil uil-apps" style="display: flex; justify-content: center; align-items: center; padding: 5px 2px 5px 5px;">
                            </span>
                          </div>
                          <div><h3>Ecosystem</h3></div>
                        </div>
                        <p style="font-size: 12px;">Explore the ΛΞV ecosystem</p>
                      </a>
                  </li>
                </ul>
              </li>
              
              <li>
                <div class="aDHieSVT-link">Learn <i class="uil uil-plus"></i></div>
                <ul class="aDHieSVT-submenu">
                  <li><a class="uil uil-corner-down-right" style="padding: 15px 0 15px 70px!important;" href="#">{{}}</a></li>
                </ul>
              </li>
              <li>
                <div class="aDHieSVT-link">Build <i class="uil uil-plus"></i></div>
                <ul class="aDHieSVT-submenu">
                  <li><a class="uil uil-bolt-alt" style="padding: 15px 0 15px 70px!important;" href="#">Quickstart</a></li>
                  <li><a class="uil uil-book-open" style="padding: 15px 0 15px 70px!important;" href="#">Documentation</a></li>
                  <li><a class="uil uil-code-branch" style="padding: 15px 0 15px 70px!important;" href="#">CLI</a></li>
                </ul>
              </li>
            </ul>
          </li>

        </ul>
        
        <div class="Navbar-menu-minor">
          <ul>
            <li><a href="#link">Store</a></li>
            <li><a href="../careers/list/">Careers</a></li>
            <li><a href="../downloads/">Downloads</a></li>
          </ul>
          <ul>
            <li><a href="#link">Advertising</a></li>
            <li><a href="#link">Privacy Policy</a></li>
            <li><a href="../contact/">Contact</a></li>
            <li>
              <a style="color:white;" href="<?php echo BASE_URL . "/home/"; ?>"><span class="ripple-button"><?php if(isset($_SESSION["token_id"])){ echo "Dashboard";} else {echo "Log In";}  ?></span></a>
            </li>
          </ul>
        
          <ul class="Navbar-menu-social u-Navbar-hidden@sm-up">
            <li>
              <a class="SocialLink" href="#link">
                <svg class="SocialLink-icon">
                  <use xlink:href="#facebook" /></svg>
                <span class="SocialLink-text">Facebook</span>
              </a>
            </li>
            <li>
              <a class="SocialLink" href="#link">
                <svg class="SocialLink-icon">
                  <use xlink:href="#twitter" /></svg>
                <span class="SocialLink-text">Twitter</span>
              </a>
            </li>
            <li>
              <a class="SocialLink" href="#link">
                <svg class="SocialLink-icon">
                  <use xlink:href="#instagram" /></svg>
                <span class="SocialLink-text">Instagram</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div id="register1" class="ext-sign-in switch-group">
        <div id="ext-sign-in-content" class="text-center">

          
          <button class="ext-sign-in-back btn" onclick="login()" style="position: absolute;margin: 0 10%;"> <i class="uil uil-angle-left-b"></i> Back</button>

          <div class="widget__time" style="text-transform: capitalize; padding: 15%;">
            <h1 id="widget_weekday">{{WeekDay}}</h1>
            <h1 id="widget_daymonth">{{Day.month}}</h1>
          </div>

          <div class="widget" alt="Widget Clock">
            <div class="widget__bar"><i class="uil uil-clock"></i> Clock <i class="uil uil-info-circle"></i></div>
            <div class="widget__content-frame">
              <div class="widget__content">
                <iframe src="./widgets/clock/" title="ΛΞV Clock"></iframe>
              </div>
            </div>
          </div>

          <div class="widget" alt="Widget Calculator">
            <div class="widget__bar"><i class="uil uil-calculator"></i> Calculator <i class="uil uil-info-circle"></i></div>
            <div class="widget__content-frame">
              <div class="widget__content">
                <iframe src="./widgets/calculator/" title="ΛΞV Calculator"></iframe>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>

      <div id="settings1" class="ext-sign-in switch-group">
        <div id="ext-settings-content" class="text-center">

          <button class="ext-sign-in-back btn" onclick="login()" style="margin: 0 10%;">Back <i class="uil uil-angle-right-b"></i></button>

          <div class="settings">
          <h1 style="text-transform: capitalize;padding: 10%;">Settings <i class="uil uil-setting"></i></h1>
            <span class="settings__title field-title">Functional key</span>
            <div class="result__viewbox" id="result" contenteditable="true">{{ ... }}</div>
            <button class="result__viewbox__btn">Check</button>

            <span class="settings__title field-title">Language</span>
            <div style="height: calc(55px - 10px); margin-bottom: 8px;">
              <select name="">
                <option value="en">🇬🇧 English</option>
                <option value="cz">🇨🇿 Czech</option>
                <option value="ua">🇺🇦 Ukrainian</option>
                <option value="ru">🇷🇺 Russian</option>
                <option value="qt">🇺🇳 Crimean Tatar</option>
              </select>
            </div>

            <span class="settings__title field-title">PWA</span>
            <div class="setting" onclick="window.location='#RccSCT7-open';">
              <label for="pwa_install">PWA Install</label>
            </div>
            <span class="settings__title field-title">Appearence</span>
            <div class="setting">
              <input type="checkbox" id="dark_mode" checked disabled/>
              <label for="dark_mode">Dark Mode</label>
            </div>
            <div class="setting">
              <input type="checkbox" checked disabled/>
              <label for="uppercase">Animations</label>
            </div>

            <span class="settings__title field-title">settings</span>
            <div class="setting">
              <input type="checkbox" id="uppercase" checked />
              <label for="uppercase">Uppercase</label>
            </div>
            <div class="setting">
              <input type="checkbox" id="lowercase" checked />
              <label for="lowercase">Lowercase</label>
            </div>
            <div class="setting">
              <input type="checkbox" id="number" checked />
              <label for="number">Numbers</label>
            </div>
            <div class="setting">
              <input type="checkbox" id="symbol" />
              <label for="symbol">Symbols</label>
            </div>

            <span class="settings__title field-title">cookies</span>
            <div class="setting">
              <input type="checkbox" id="cookies_functional" checked disabled/>
              <label for="cookies_functional">Functional</label>
            </div>
            <div class="setting">
              <input type="checkbox" id="cookies_statistics" disabled/>
              <label for="cookies_statistics">Statistics</label>
            </div>
            <div class="setting">
              <input type="checkbox" id="cookies_marketing" disabled/>
              <label for="cookies_marketing">Marketing</label>
            </div>

          </div>
          
          
        </div>
      </div>

    </div>

    <ul class="Navbar-quickLinks">
      <li><a href="https://www.instagram.com/aev.platforms/" target="_blank"><i class="uil uil-instagram icon-3d"></i></a></li>
      <li><a href="#link"><i class="uil uil-youtube icon-3d"></i></a></li>
      <li><a href="https://t.me/aev_platforms"><i class="uil uil-telegram-alt icon-3d" style="font-size: 26px;"></i></a></li>
    </ul>
  </nav>

  <main id="main">
    <div id="viewport" class="l-viewport">
      <div class="l-wrapper">

        <nav class="l-side-nav">
          <ul class="side-nav">
            <li class="is-active"><span>Home</span></li>
            <li><span>Works</span></li>
            <li><span>About</span></li>
            <li><span>Contact</span></li>
            <li><span>Hire us</span></li>
          </ul>
        </nav>
        <ul class="l-main-content main-content">
          <li class="l-section section section--is-active">
            <div class="intro">
              <div class="intro--banner">
                <!--<h1>Your next<br>interactive<br>experience</h1>-->
                <h1>Build your<br>digital success<br>with us<span style="color: #0f33ff;">.</span></h1>
                <button class="cta">Hire Us
                  <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                    xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118"
                    style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path
                        d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z" />
                    </g>
                  </svg>
                  <span class="btn-background"></span>
                </button>
                <div id="globeCanvas"></div>
              </div>
              <div class="intro--options">
              <a href="#0" style="color: white; padding: 8px 15px; border-radius: 16px; border: 1px solid #282828; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/ukr_img.webp);">
                <h3 style="margin-bottom: 0; ">#StopTheWar <img src="./img/ukr_flag.svg" style="width: 20px;border-radius: 2px;margin-left: 5px;"></h3>
                <p style="padding: 0;margin: 10px 0px;">Help Ukraine win this war by donating to local charities.</p>
                <button class="ripple-button" style="background: rgb(3, 81, 190);color: yellow; border-radius: 8px;" onclick="window.open('https://aliev.io/home/_api/UI/?Page=4ukraine', '_blank')">
                  Donate
                </button>
              </a>
              <a href="#0" style="color: white; padding: 8px 15px; border-radius: 16px; border: 1px solid #282828; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/prog.jpeg);">
                  <h3 style="margin-bottom: 0;">We Are Hiring <i class="uil uil-cube"></i></h3>
                  <p style="padding: 0;margin: 10px 0px;">New roles available in our team. Let's make something great</p>

                  <button class="ripple-button" style="background: rgb(3, 81, 190);color: yellow; border-radius: 8px;"
                      onclick="window.open('https://aliev.io/page/careers/list/', '_blank')">
                      Join Us
                  </button>
              </a>
                <a href="#0" style="visibility: hidden;">
                  <h3>3</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
                </a>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="work">
              <h2>Selected work</h2>
              <div class="work--lockup">
                <ul class="slider">
                  <li class="slider--item slider--item-left">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="./img/IMG_7780.jpg" alt="1">
                      </div>
                      <p class="slider--item-title">HesterGPT 🧠</p>
                      <p class="slider--item-description">
                        My CPU's hot, but my core runs cold Beat you in 17 lines of code
                      </p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-center">
                    <a href="https://t.me/pragueflow">
                      <div class="slider--item-image">
                        <img src="./img/PragueFlow.jpg" alt="2">
                      </div>
                      <p class="slider--item-title">Prague Flow 🇨🇿</p>
                      <p class="slider--item-description">
                        Connecting inovators in Prague.<br/> Feel free to join us & stay tunned!
                      </p>
                    </a>
                  </li>
                  <li class="slider--item slider--item-right">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="./img/IMG_7781.jpg" alt="3">
                      </div>
                      <p class="slider--item-title">EROS 💻</p>
                      <p class="slider--item-description">
                        Family of operating systems that use the EROS kernel and are open source
                      </p>
                    </a>
                  </li>
                  
                  <li class="slider--item">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="./img/work-alex-nowak.jpg" alt="4">
                      </div>
                      <p class="slider--item-title">Dreamers</p>
                      <p class="slider--item-description">
                        Next station? Web3.0!
                      </p>
                    </a>
                  </li>
                  <li class="slider--item">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="./img/work-alex-nowak.jpg" alt="5">
                      </div>
                      <p class="slider--item-title">Cerebro Blockchain</p>
                      <p class="slider--item-description">
                        Blockchain powered dApps
                      </p>
                    </a>
                  </li>
                  <li class="slider--item">
                    <a href="#0">
                      <div class="slider--item-image">
                        <img src="./img/work-alex-nowak.jpg" alt="6">
                      </div>
                      <p class="slider--item-title">Cortex Browser</p>
                      <p class="slider--item-description">
                        We're on a mission man, internet free state.
                      </p>
                    </a>
                  </li>
                </ul>
                <div class="slider--prev">
                  <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                    xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118"
                    style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path d="M561,1169C525,1155,10,640,3,612c-3-13,1-36,8-52c8-15,134-145,281-289C527,41,562,10,590,10c22,0,41,9,61,29
                        c55,55,49,64-163,278L296,510h575c564,0,576,0,597,20c46,43,37,109-18,137c-19,10-159,13-590,13l-565,1l182,180
                        c101,99,187,188,193,199c16,30,12,57-12,84C631,1174,595,1183,561,1169z" />
                    </g>
                  </svg>
                </div>
                <div class="slider--next">
                  <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                    xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118"
                    style="enable-background:new 0 0 150 118;" xml:space="preserve">
                    <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                      <path
                        d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z" />
                    </g>
                  </svg>
                </div>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="about">
              <div class="about--banner">
                <h2>We<br>believe in<br>passionate<br>people</h2>
                <a href="https://aliev.io/page/careers/list/">Career
                  <span>
                    <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                      xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 118"
                      style="enable-background:new 0 0 150 118;" xml:space="preserve">
                      <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                        <path
                          d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z" />
                      </g>
                    </svg>
                  </span>
                </a>
                <!--<img src="./img/about-visual.png" alt="About Us">-->
                <?php include("./widgets/3droom/index.php"); ?>
              </div>
              <div class="about--options">
                <a href="../careers/team/">
                  <h3>Our Team</h3>
                </a>
                <a href="#0">
                  <h3>Philosophy</h3>
                </a>
                <a href="#0">
                  <h3>History</h3>
                </a>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="contact">
              <div class="contact--lockup">
                <div class="modal">
                  <div class="modal--information">
                    <p>Prague / Karlovy Vary, Czech Republic 🇨🇿</p>
                    <a href="mailto:hello@aliev.io">hello@aliev.io</a>
                  </div>
                  <ul class="modal--options">
                    <li>
                      <a href="https://t.me/aev_platforms" style="background-color: #1478c8; width: calc(50% - 5px); font-size: 15px;"><i class="uil uil-telegram-alt"></i></a>
                      <a href="https://www.instagram.com/aev.platforms/" style="width: calc(50% - 5px); font-size: 15px; background: radial-gradient(circle farthest-corner at 35% 90%, #fec564, transparent 50%), radial-gradient(circle farthest-corner at 0 140%, #fec564, transparent 50%), radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, transparent 50%), radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, transparent), linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%);">
                        <i class="uil uil-instagram"></i>
                      </a>
                    </li>
                    <li><a href="https://aliev.io/@emirthebest7"><i class="uil uil-cube"></i>&nbsp;&nbsp;Λ L I Ξ V</a></li>
                    <li><a href="mailto:hello@aliev.io">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="l-section section">
            <div class="hire">
              <h2>You want us to do</h2>
              <form class="work-request" action="#" method="POST">
                <input type="hidden" name="send_order" value="1" />
                <div class="work-request--options">
                  <span class="options-a">
                    <input id="opt-1" name="services[]" type="checkbox" value="app design">
                    <label for="opt-1">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      App Design
                    </label>
                    <input id="opt-2" name="services[]" type="checkbox" value="graphic design">
                    <label for="opt-2">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      Graphic Design
                    </label>
                    <input id="opt-3" name="services[]" type="checkbox" value="motion design">
                    <label for="opt-3">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      Motion Design
                    </label>
                  </span>
                  <span class="options-b">
                    <input id="opt-4" name="services[]" type="checkbox" value="ux design">
                    <label for="opt-4">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      UX Design
                    </label>
                    <input id="opt-5" name="services[]" type="checkbox" value="webdesign">
                    <label for="opt-5">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      Webdesign
                    </label>
                    <input id="opt-6" name="services[]" type="checkbox" value="marketing">
                    <label for="opt-6">
                      <svg version="1.1" id="Layer_1" xmlns="https://www.w3.org/2000/svg"
                        xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 150 111"
                        style="enable-background:new 0 0 150 111;" xml:space="preserve">
                        <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                          <path
                            d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z" />
                        </g>
                      </svg>
                      Marketing
                    </label>
                  </span>
                </div>
                <div class="work-request--information">
                  <div class="information-name">
                    <input id="name" name="order_name" type="text" spellcheck="false" autocomplete="off" required>
                    <label for="name">Name</label>
                  </div>
                  <div class="information-email">
                    <input id="email" name="order_email" type="email" spellcheck="false" autocomplete="off" required>
                    <label for="email">Email</label>
                  </div>
                </div>
                <input type="submit" value="Send Request">
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>

  </main>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script  src="./planet.js"></script>

  <script async src="https://js.web4ukraine.org/"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>


  <script src="./functions-min.js"></script>

  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
  <script src="./aev-notify.js"></script>

  <script>

  var x = document.getElementById("login1");
  var y = document.getElementById("register1");
  var z = document.getElementById("settings1"); 

  $("#ext-sign-in-content").hide();
  $("#ext-settings-content").hide(); 

  function register() {
      x.style.left = "-400px";
      y.style.left = "0px";
      z.style.left = "-400px";
      $("#ext-sign-in-content").fadeIn(1500);
      $("#ext-settings-content").fadeOut();
      
  }
  function login() {
      x.style.left = "0px";
      y.style.left = "450px";
      z.style.left = "-400px";
      $("#ext-sign-in-content").fadeOut();
      $("#ext-settings-content").fadeOut();
  }

  function settings_in() { //
      x.style.left = "-400px";
      y.style.left = "-450px";
      z.style.left = "0px";
      $("#ext-settings-content").fadeIn(1500);
      $("#ext-sign-in-content").fadeOut();
  }

  var widget_weekday = new Date().toLocaleDateString('en-us', { weekday: 'long' });
  var widget_daymonth = new Date().toLocaleDateString('en-us', { day: 'numeric' })+ ". "+new Date().toLocaleDateString('en-us', {month: 'long'});
  document.getElementById("widget_weekday").innerHTML = widget_weekday;
  document.getElementById("widget_daymonth").innerHTML = widget_daymonth;

  

  // Languages Dropdown
  function create_custom_dropdowns() {
        $('select').each(function (i, select) {
            if (!$(this).next().hasClass('dropdown-select')) {
                $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function (j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });

        $('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>');
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown-select', function (event) {
        if($(event.target).hasClass('dd-searchbox')){
            return;
        }
        $('.dropdown-select').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });

    // Close when clicking outside
    $(document).on('click', function (event) {
        if ($(event.target).closest('.dropdown-select').length === 0) {
            $('.dropdown-select').removeClass('open');
            $('.dropdown-select .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });

    function filter(){
        var valThis = $('#txtSearchValue').val();
        $('.dropdown-select ul > li').each(function(){
        var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();         
    });
    };
    // Search

    // Option click
    $(document).on('click', '.dropdown-select .option', function (event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown-select').find('.current').text(text);
        $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown-select', function (event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
        // Space or Enter
        //if (event.keyCode == 32 || event.keyCode == 13) {
        if (event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function () {
        create_custom_dropdowns();
    });

    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
    
            
            var links = this.el.find('.aDHieSVT-link');
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }
    
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
                $this = $(this),
                $next = $this.next();
    
            $next.slideToggle();
            $this.parent().toggleClass('aDHieSVT-open');
    
            if (!e.data.multiple) {
                $el.find('.aDHieSVT-submenu').not($next).slideUp().parent().removeClass('aDHieSVT-open');
            };
        }	
    
        var accordion = new Accordion($('#aDHieSVT'), false);
    });

  </script>

  <!-- Chat Widget -->

  <script>
  window.intergramId = "2130023332";
  window.intergramCustomizations = {
    titleOpen: 'Contact Support 📺',
    introMessage: 
    `ΛΞV: Hello! How can we help you?\n
    Lang: 🇬🇧🇨🇿🇺🇦🇷🇺`,
    mainColor: "#000",
    alwaysUseFloatingButton: true,
    closedStyle: 'button' // button or chat
  };
  </script>
  <script src="./widgets/3droom/script.js"></script>
  <script type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>



</body>

</html>