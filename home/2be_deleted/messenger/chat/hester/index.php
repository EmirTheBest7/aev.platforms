<?php 

include('../../../../_inc/functions.php');
$conn = connect();

session_start();


$BOT_TOKEN = "2117013421:AAFUAr-9BAt16uQtfz_OGqvZb1R17XZda9A";
$bot_id = "2117013421";
$admin_id = "2130023332";
$update = file_get_contents('php://input');
$update = json_decode($update, true);
$userChatId = $update["message"]["from"]["id"]?$update["message"]["from"]["id"]:null;

if($userChatId){
    if (isset($_POST['message'])) {
        $userMessage = $update["message"]["text"]?$update["message"]["text"]:"Nothing";
    } else {
        $userMessage = $update["message"]["text"]?$update["message"]["text"]:"Nothing";
    }
    
    $firstName = $update["message"]["from"]["first_name"]?$update["message"]["from"]["first_name"]:"N/A";
    $lastName = $update["message"]["from"]["last_name"]?$update["message"]["from"]["last_name"]:"N/A";
    $fullName = $firstName." ".$lastName;
    $replyMsg = "Hello ".$fullName."\nYou said: ".$userMessage;


    $parameters = array(
        "chat_id" => $userChatId,
        "text" => $replyMsg,
        "parseMode" => "html"
    );

    send("sendMessage", $parameters);
}

//https://api.telegram.org/bot2117013421:AAFUAr-9BAt16uQtfz_OGqvZb1R17XZda9A/sendMessage?chat_id=2130023332&text=Message1
function send($method, $data){
    global $BOT_TOKEN;
    $url = "https://api.telegram.org/bot$BOT_TOKEN/$method";

    if(!$curld = curl_init()){
        exit;
    }
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    return $output;
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Write...</title>
  <link rel="stylesheet" href="../style_orig.css">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style>
      main {
          position: relative!important;
          margin: 0 3rem;
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

    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="http://192.168.0.103/CV4/ALIEV.svg">

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
        <a href="../index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="https://emiraliev.com/img/InstaProfile.png" alt="">
        <div class="details">
          <span><?php echo "Hester AI"; ?></span>
          <p><?php echo "Online"; ?></p>
        </div>
      </header>
      <div class="chat-box">
      <div class="chat outgoing">
                                <div class="details">
                                    <p>/start</p>
                                </div>
                                </div>

                                <div class="chat incoming">
                                <img src="php/images/" alt="">
                                <div class="details">
                                    <p>Heloo back</p>
                                </div>
                                </div>

      </div>
      <form action="index.php" method="POST" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button type="submit" value="Submit"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
</main>

  

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>

</body>
</html>
