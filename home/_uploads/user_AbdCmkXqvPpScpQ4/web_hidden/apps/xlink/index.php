<?php 

include('../../../../../../_inc/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <title>xlink</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">


</head>

<body>
  <div class="background">
    <img src="https://wallpapercave.com/wp/wp1822724.jpg">
  </div>
  <header>


    <div class="profile-main">
      <div class="row m-0" style="transform: translateY(-120px);">
        <div class="col-lg-12 col-12 text-center profile-img-div">
          <img src="<?php echo BASE_URL ."_assets/images/avatar.png"?>" class="user-avatar">
        </div>
        <div class="col-lg-12 col-12 profile-info-div">
          <h2 class="profile_title d-flex align-items-center justify-content-center mt-2 mb-2">
            <span class="mr-2">Emir Aliex <i class="uil uil-check-circle"></i></span>
          </h2>
          <div class="profile_description">
            <div>I’m CEO, bitch!</div>
          </div>

          <p class="col-lg-12 col-12 text-center ">
            <a class="social-links-div"><i class="uil uil-instagram"></i></a>
            <a class="social-links-div"><i class="uil uil-linkedin-alt"></i></a>
            <a class="social-links-div"><i class="uil uil-telegram-alt"></i></a>
            <a class="social-links-div"><i class="uil uil-youtube"></i></a>
          </p>
        </div>
      </div>
    </div>


  </header>
  <div class="outer-form grid-1 clearfix" style="display:none;">
    <div class="inner-form clearfix box-sizing">
      <h1>Newsletter </h1>
      <p>Sign up for our newsletter to receive periodic articles, updates, freebies and premium items.</p>
      <input type="text" class="box-sizing" placeholder="Enter your email address" />
      <input type="submit" value="Subscribe" />
    </div>
  </div>
  <!-- SLICK CONTAINER -->
  <section class="slider">
    <?php 
    for ($i = 0; $i < 2; $i++){
      // code to repeat here
      echo '
      <!-- BEGIN SLICK SLIDE -->
      <div class="slick__slide">
        <figure class="menu-card">
          <img src="https://assets.codepen.io/191814/1920-1080.jpg" />
          <div class="date">Startup</div></i>
          <figcaption>
            <h4>Λ L I Ξ V (.co)</h4>
            <p>
              Become a Photoshop master with easy tutorials.
            </p>
            <button>Discover &#x1F680</button>
          </figcaption><a href="http://192.168.0.103"></a>
        </figure>
      </div>
      <!-- // END SLICK SLIDE -->

      <!-- BEGIN SLICK SLIDE -->
      <div class="slick__slide">
        <figure class="menu-card">
          <img src="https://assets.codepen.io/191814/1920-1080.jpg" />
          <div class="date">Project | AI</div></i>
          <figcaption>
            <h4>Hester AI</h4>
            <p>
              Become a Photoshop master with easy tutorials.
            </p>
            <button>Discover &#x1F680</button>
          </figcaption><a href="#"></a>
        </figure>
      </div>
      <!-- // END SLICK SLIDE -->
    '; // Stable/Beta
    }
    ?>
    <!-- // SLICK CONTAINER -->
  </section>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js'></script>
  <script src="./script.js"></script>

</body>

</html>