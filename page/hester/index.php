<?php 

require '../../_inc/functions.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <title>HesterGPT Chatbot</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<header class="header">

  <div class="btn-top-div">
    <button class="btn-top" onClick="javascript:window.open('https://aliev.io/@Hester', '_blank');"><img src="https://aliev.io/page/downloads/logo/A.svg" alt="Λ L I Ξ V" class="logo"></button>
    <button class="btn-top" onClick="javascript:window.open('https://t.me/Hester_EAbot', '_blank');"><i class="uil uil-telegram-alt"></i></button>
  </div>

  <h2 class="title">
    Hello, <?php echo (isset($_SESSION['username'])) ? "{".strtolower(strtok($_SESSION['username'], " "))."}" : 'Friend!'  ; ?>.
  </h2>
  <h4 class="subtitle">
    How can I help you today?
  </h4>

  <select data-menu onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option selected disabled="disabled">HesterGPT v1.5</option>
    <option disabled="disabled">HesterGPT 1o</option>
    <option value="./avrora/">Avrora</option>
  </select>

  <ul class="suggestion-list">
    <li class="suggestion">
      <h4 class="text">
        Create a morning routine
        <span>to boost my productivity</span>
      </h4>
    </li>
    <li class="suggestion">
      <h4 class="text">Help me study
        <span>vocabulary for an exam</span>
      </h4>
    </li>
    <li class="suggestion">
      <h4 class="text">
        Make me a personal webpage
        <span>after asking me three questions</span>
      </h4>
    </li>
    <li class="suggestion">
      <h4 class="text">
        Plan a trip
        <span>to experience Crimea like a local</span>
      </h4>
    </li>
  </ul>

  <div class="intro-text">
    <p class="text custom-cursor-on-hover">Hi! I’m <span class="intro-title">HesterGPT</span>, your new experimental AI assistant on your device. I can assist you with writing, planning, learning, and much more.</p>
  </div>
</header>
<div class="chat-list">
</div>
<div class="typing-area">
  <form action="#" class="typing-form">
    <div class="input-wrapper">
      <input type="text" class="typing-input" placeholder="Enter a Prompt here..." required>
      <button class="icon"><i class="fa-regular fa-paper-plane"></i></button>
    </div>
    <div class="actions-buttons">
      <i id="toggle-theme-button" class="icon fa-regular fa-sun"></i>
      <i id="access-mic-button" class="icon uil uil-microphone-slash"></i>
      <i id="delete-chat-button" class="icon fa-solid fa-trash-can"></i>
    </div>
  </form>
  <p class="dis-text">HesterGPT can make mistakes. Check important info.</p>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script  src="./script.js"></script>

</body>
</html>
