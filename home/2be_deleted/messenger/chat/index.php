<?php 

include('../../../_inc/functions.php');
$conn = connect();

session_start();
auth();
logout();

if ($_GET['user_id'] == "Hester") {
  header("Location: ./hester/");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Write...</title>
  <link rel="stylesheet" href="style_orig.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style>
      main {
          position: relative!important;
          margin: 0;
      }

      canvas {
          position:fixed!important;
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
        <li><a href="#link">Gear</a></li>
        <li><a href="#link">Music</a></li>
        <li><a href="#link">Robotics</a></li>
        <li><a href="#link">Photography</a></li>
      </ul>
      <div class="Navbar-menu-minor">
        <ul>
          <li><a href="#link">Store</a></li>
          <li><a href="#link">Deals</a></li>
          <li><a href="#link">Themes</a></li>
        </ul>
        <ul>
          <li><a href="#link">Advertising</a></li>
          <li><a href="#link">Privacy Policy</a></li>
          <li><a href="#link">Contact</a></li>
          <li><a style="color:white;" href="http://192.168.0.103/CV4/home/">Log In</a></li>
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

    <ul class="Navbar-quickLinks">
      <li><a href="#link">Facebook</a></li>
      <li><a href="#link">Twitter</a></li>
      <li><a href="#link">Instagram</a></li>
    </ul>
  </nav>


<main id="main">

<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />
<div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE token_id = '$user_id'");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            if (!empty($row["user_photo"])) {
              $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"]. ".png";
            } else {
              $user_profile = BASE_URL . "_assets/images/avatar.png";
            }
          }else{
            header("location: ../index.php");
          }
        ?>
        <a href="../index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo $user_profile; ?>" alt="">
        <div class="details">
          <span><?php echo $row['username']; ?></span>
          <p>Status: <i style="color: lime;" class="uil uil-cloud-computing"></i></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
</main>

  

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>

  <script src="../javascript/chat.js"></script>

</body>
</html>
