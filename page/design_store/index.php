<?php include('../../_inc/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Λ L I Ξ V Store</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./_assets/css/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="window">

    <div class="header">
      <div class="burger-container">
        <div id="burger">
          <div class="bar topBar"></div>
          <div class="bar btmBar"></div>
        </div>
      </div>

      <a class="icon icon-logo" href=""><img src="https://aliev.io/page/downloads/logo/ALIEV.svg"></a>

      <ul class="menu">
          <li class="menu-item"><input type="text" value="Search..." disabled></li>
          <?php
            // Read JSON file
            $json = file_get_contents('./_inc/json/cat_menu.json');
            $categories = json_decode($json, true);

            // Display categories
            if (!empty($categories['categories'])) {
              foreach ($categories['categories'] as $category) {
                echo '<li class="menu-item"><a href="' . $category['link'] . '">' . $category['name'] . '</a></li>';
              }
            }
          ?>
        </li>
      </ul>
      <div class="shop icon icon-bag uil uil-shopping-bag"></div>
    </div>

    <div id="bottombar">
      <div class="g-4">
        <div class="bar-container">
          <a>login</a> &nbsp; / &nbsp; 
          <a>register</a>
        </div>
      </div>

      <div class="m-4">
        <div class="bar-container"><a>bones</a> &nbsp; &nbsp; <span id="subaccounts_menu">
            <form name="subswitch" method="POST">
              <input type="hidden" name="auth_key" value="">
              <input type="hidden" name="UserName" value="">
              <input type="hidden" name="PassWord" value="">
              <input type="hidden" name="referer" value="">
              <select class="forminput" name="sub_id" onchange="this.form.submit()">
                <option value="------------" selected="selected">Switch Account</option>
                <option value="13">&nbsp;&nbsp;» cerberus greyback </option>
                <option value="12">&nbsp;&nbsp;» december rookwood </option>
                <option value="14">&nbsp;&nbsp;» pegasus lestrange </option>
              </select>
            </form>
          </span> &nbsp; &nbsp; &nbsp; &nbsp; 
          <a>controls</a> &nbsp; &nbsp; 
          <a>messages (0)</a> &nbsp; &nbsp; 
          <a>alerts (0)</a> &nbsp; &nbsp; 
          <a>logout</a> &nbsp; &nbsp; 
          <a target="_blank" class="acp-1">admin cp</a> &nbsp; &nbsp; 
          <input type="checkbox" name="lightmode" id="lightmode" onchange="toggleLightMode();"><label>light mode</label>
          </div>
      </div>
    </div>


    <section class="content section">
      <div class="cards">
        <a href="#" class="card card-1">
          <figure class="visual">
            <img class="card-img" src="https://raw.githubusercontent.com/mobalti/ui/main/cards-01/images/img-1.avif" alt="Person with a game controller in hand">
            <figcaption class="figcaption">Early Access</figcaption>
          </figure>
        </a>
        <a href="#" class="card card-2">
          <figure class="visual">
            <img class="card-img" src="https://raw.githubusercontent.com/mobalti/ui/main/cards-01/images/img-2.avif" alt="Person with curly hair in neon lighting">
            <figcaption class="figcaption">Top Sellers</figcaption>
          </figure>
        </a>
        <a href="#" class="card card-3">
          <figure class="visual">
            <img class="card-img" src="https://raw.githubusercontent.com/mobalti/ui/main/cards-01/images/img-3.avif" alt="Person in vibrant neon lighting with abstract shapes">
            <figcaption class="figcaption">New Releases</figcaption>
          </figure>
        </a>
        <a href="#" class="card card-4">
          <figure class="visual">
            <img class="card-img" src="https://raw.githubusercontent.com/mobalti/ui/main/cards-01/images/img-4.avif" alt="Person wearing a virtual reality headset in a blue-lit room">
            <figcaption class="figcaption">Upcoming</figcaption>
          </figure>
        </a>
      </div>


    </div>
  </div>
  <!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js'></script>

  <script src="./_assets/js/script.js"></script>

</body>

</html>