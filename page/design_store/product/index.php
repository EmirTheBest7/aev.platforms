<?php include('../../../_inc/functions.php'); ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel="stylesheet" href="../_assets/css/style.css">
  <link rel="stylesheet" href="./style.css">

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

      <a class="icon icon-logo" href="#"><img src="<?php echo LOGO; ?>"></a>

      <ul class="menu">
        <li class="menu-item"><input type="text" value="Search..." disabled></li>
          <li class="menu-item"><a href="#">Works</a></li>
          <li class="menu-item"><a href="./apps/articles/">Articles</a></li>
          <li class="menu-item"><a href="#">iPhone</a></li>
          <li class="menu-item"><a href="#">Watch</a></li>
          <li class="menu-item"><a href="#">TV</a></li>
          <li class="menu-item"><a href="./apps/photo/">Photography</a></li>
          <li class="menu-item"><a href="#">Support</a>
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


    <main class="section">
        <div class="container">
          <div class="grid second-nav">
            <div class="column-xs-12">
              <nav>
                <ol class="breadcrumb-list">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Watches</a></li>
                  <li class="breadcrumb-item active">ΛΞV Watch Evo</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="grid product">
            <div class="column-xs-12 column-md-7">
              <div class="product-gallery">
                <div class="product-image">
                  <img class="active" src="../_assets/images/CHRONO_WATCH.png">
                </div>
                <ul class="image-list">
                  <li class="image-item"><img src="../_assets/images/CHRONO_WATCH.png"></li>
                  <li class="image-item"><img src="../_assets/images/CHRONO_WATCH.png"></li>
                  <li class="image-item"><img src="../_assets/images/watch.png"></li>
                </ul>
              </div>
            </div>
            <div class="column-xs-12 column-md-5">
              <h1>ΛΞV Watch</h1>
              <h2>$399</h2>
              <div class="description">
                <p>a masterpiece of modern craftsmanship that redefines the essence of timekeeping. This exquisite watch seamlessly blends cutting-edge technology with timeless elegance, designed for those who seek perfection in every moment.</p>
              </div>
              <button class="add-to-cart">Add To Cart</button>
            </div>
          </div>
          <div class="grid related-products">
            <div class="column-xs-12">
              <h3>You may also like</h3>
            </div>
            <div class="column-xs-12 column-md-4">
              <img src="https://source.unsplash.com/miziNqvJx5M">
              <h4>Succulent</h4>
              <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
              <img src="https://source.unsplash.com/2y6s0qKdGZg">
              <h4>Terranium</h4>
              <p class="price">$19.99</p>
            </div>
            <div class="column-xs-12 column-md-4">
              <img src="https://source.unsplash.com/6Rs76hNbIWE">
              <h4>Cactus</h4>
              <p class="price">$19.99</p>
            </div>
          </div>
        </div>
      </main>




<!-- partial -->
<script src='https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js'></script>

  <script src="../_assets/js/script.js"></script>
  <script  src="./script.js"></script>

</body>
</html>
