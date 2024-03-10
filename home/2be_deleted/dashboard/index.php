<?php 

include('../../_inc/functions.php');

session_start();
auth();
logout();


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Dashboard Concept</title>
  <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.2.0/css/all.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="./dashboard.css">
  
</head>
<body onload="checkCookie('ps_pl')">
<!-- partial:index.partial.html -->

<div class="ps5_intro" id="ps5_intro">

  <div id="initial_logo"><i class="fab fa-playstation"></i></div>

  <div class="intro_info" id="intro_info">
  <img src="<?php echo LOGO; ?>" style="width: 3.25em;" class="svg-inline--fa fa-ps5-alt">
    <span class="toast">Press the&nbsp<b>A</b>&nbspbutton to start the journey</span>
  </div>

  <div class="controller_container" id="controller_container">
    <img src="https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/dualsense.png" id="controller_image">
    <div class="pulse"></div>
    <div id="playstation" onclick="setCookie()"><i class="fab fa-playstation"></i></div>
  </div>

</div>

<nav class="Navbar">
    <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
      data-target="#navbarCollapse"><span></span></a>

    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

    <div id="navbarCollapse" class="Navbar-menu">
      <ul class="Navbar-menu-major">
        <li class="tab active" id="default" onclick="switchTabs('bg_home', 'fg_home', this)" active-color="#fff"><a>Home</a></li>
        <li class="tab" onclick="switchTabs('bg_friends', 'fg_friends', this)" active-color="rgba(0, 0, 0, .8)"><a>Friends</a></li>
        <li class="tab" onclick="switchTabs('bg_store', 'fg_store', this)" active-color="rgba(0, 0, 0, .8)"><a>Store</a></li>
        <li class="tab" onclick="switchTabs('bg_settings', 'fg_settings', this)" active-color="rgba(0, 0, 0, .8)"><a>Settings</a></li>
      </ul>
    </div>

    <ul class="Navbar-quickLinks">
      <li><a href="?action=logout">Logout</a></li>
    </ul>
  </nav>

	<main id="main">

<div class="ps5_ui" id="ps5_ui">

  <div class="background">

    <div class="bg_home_content tab_content" id="bg_home">
      <div id="game_bg">
        <div class="black_rect"></div>
      </div>
      <div class="white_rect"></div>
    </div>

    <div class="bg_friends_content tab_content" id="bg_friends">
      <!-- Friends Content -->
      <h1>Shut the fuck upp</h1>
    </div>

    <div class="bg_store_content tab_content" id="bg_store">
      <!-- Store Content -->
    </div>

    <div class="bg_settings_content tab_content" id="bg_settings">
      <!-- Settings Content -->
    </div>
      

  </div>

  <div class="foreground">

    <div class="top_bar" id="top_bar" style="color: rgb(255, 255, 255);">
      <div class="profile">
        
      </div>

      <div class="l1r1_tabs_list">
        
        <div class="tab active" id="default" onclick="switchTabs('bg_home', 'fg_home', this)" active-color="#fff" style="color: rgb(255, 255, 255);">Home

        </div>
        <div class="tab" onclick="switchTabs('bg_friends', 'fg_friends', this)" active-color="rgba(0, 0, 0, .8)">Friends

        </div>
        <div class="tab" onclick="switchTabs('bg_store', 'fg_store', this)" active-color="rgba(0, 0, 0, .8)">Store

        </div>
        <div class="tab" onclick="switchTabs('bg_settings', 'fg_settings', this)" active-color="rgba(0, 0, 0, .8)">Settings

        </div>
        <span class="tab_indicator" style="left: 0px; background-color: rgb(255, 255, 255);"></span>
      </div>

      <span id="time">23:30</span>
    </div>

    <div class="fg_home_content tab_content xyz" id="fg_home">

      <div class="games_list">
        <div class="games_slider">

          <div class="game_card" style="background-image: url(https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/PS5%20Covers/swbf1-cov.jpg);">
          </div>
          <div class="game_card" style="background-image: url(https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/PS5%20Covers/swbf1-cov.jpg);">
          </div>
          <div class="game_card" style="background-image: url(<?php echo BASE_URL . '_assets/images/messenger.png'; ?>);">
          </div>

          <div class="game_card" style="background-image: url(https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/PS5%20Covers/swbf1-cov.jpg);">
          </div>
          <div class="game_card" style="background-image: url(https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/PS5%20Covers/swbf1-cov.jpg);">
          </div>

        </div>
      </div>

      <div class="games_actions_details">

        <div class="games_actions">
          <span><i class="fac fa-ps5-square"></i>Full game details</span>
          <span><i class="fac fa-ps5-triangle"></i>Game settings</span>
          <span><i class="fac fa-ps5-circle"></i>Back</span>
        </div>

        <div class="games_details">

          <div class="header">
            <p id="game_play_time"></p>
            <h1 id="game_name"></h1>
            <script>
              var game_name_href = [
                "<a class='game_start_button' href='<?php echo BASE_URL . "home/timeline"; ?>'>Start</a>",
                "<a class='game_start_button' href='<?php echo BASE_URL . "home/profile"; ?>'>Start</a>",
                "<a class='game_start_button' href='<?php echo BASE_URL . "home/messenger"; ?>'>Start</a>",

                "<a class='game_start_button' href='<?php echo BASE_URL . "home/studio"; ?>'>Start</a>",
                "<a class='game_start_button' href='<?php echo BASE_URL . "home/wallet"; ?>'>Start</a>",
              ];
            </script>
            <div id="game_name_href">
              <span id="game_name_href"><i class="fac fa-ps5-cross"></i>Start</span>
              
            </div>
          </div>

          <div class="player_progress">
            <div class="player_progress_card" id="last_checkpoint" style="margin: 0 1rem 0 0;">
              <img id="last_checkpoint_img">
              <p id="last_checkpoint_text">Last Checkpoint</p>
              <h1 id="last_checkpoint_name"></h1>
              <p id="last_checkpoint_time"></p>
            </div>

            <div class="player_progress_card" id="last_trophy">
              <img id="last_trophy_img">
              <p id="last_trophy_text">Last earned trophy</p>
              <h1 id="last_trophy_name"></h1>
              <p id="last_trophy_time"></p>
            </div>

            <div class="player_progress_card" id="top_trophy">
              <img id="top_trophy_img">
              <p id="top_trophy_text">Top earned trophy</p>
              <h1 id="top_trophy_name"></h1>
              <p id="top_trophy_time"></p>
            </div>

            <div class="player_progress_card" id="all_trophies" style="margin: 0 0 0 1rem;">
              <img id="all_trophies_img" src="https://raw.githubusercontent.com/maxym11/ps5-ui-assets/master/ps5-all-trophies.png">
              <p id="all_trophies_text">All earned trophies</p>
              <p id="all_trophies_numbers"></p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <!-- Can delete this div-->
    <div class="fg_friends_content tab_content xyz" id="fg_friends">
      <div class="notification_text">
        <p>Sorry but you have</p>
        <h1><a href="#">no friends. oof.</a></h1>
      </div>
    </div>

    <div class="fg_store_content tab_content xyz" id="fg_store">
      <div class="notification_text">
        <p>The store is closed.</p>
        <h1><a href="#">Come back tomorrow.</a></h1>
      </div>
    </div>

    <div class="fg_settings_content tab_content xyz" id="fg_settings">
      <div class="notification_text">
        <p>Empty settings.</p>
        <h1><a href="#">Yes, empty settings.</a></h1>
      </div>
    </div>
  </div>

</div>
</main>


<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js'></script>
<script src='https://npmcdn.com/flickity@2/dist/flickity.pkgd.js'></script>
<script src='https://use.fontawesome.com/releases/v5.2.0/js/all.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
<script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
<script  src="./script.js"></script>

</body>
</html>
