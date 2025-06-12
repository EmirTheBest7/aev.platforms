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
  <link rel="manifest" href="/manifest.json">
  <title>HesterGPT Chatbot</title>

  <!-- PWA Setup -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#181c1f">
  <meta name="apple-mobile-web-app-title" content="HesterGPT">

  <link rel="shortcut icon" href="./_assets/icons/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="./_assets/icons/apple-touch-icon.png">
  <link rel="apple-touch-icon" href="./_assets/icons/icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./_assets/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./_assets/icons/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="57x57" href="./_assets/icons/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="./_assets/icons/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="./_assets/icons/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="./_assets/icons/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="./_assets/icons/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="./_assets/icons/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="./_assets/icons/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="./_assets/icons/apple-touch-icon-180x180.png" />

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
    <span is="type-async" id="type-text">...</span>
    <span class="blinking-cursor">_</span>
  </h2>
  <!-- <h4 class="subtitle">How can I help you today?</h4> -->

  <select data-menu onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <option selected disabled="disabled">HesterGPT v1.7</option>
    <option disabled="disabled">HesterGPT 1o</option>
    <option value="./avrora/">Avrora</option>
  </select>

  <ul class="suggestion-list">
    <li class="suggestion">
      <h4 class="text">
        Create a morning routine
        <span>to boost my productivity</span>
      </h4>
      <i class="icon uil uil-lightbulb-alt"></i>
    </li>
    <li class="suggestion">
      <h4 class="text">Help me study
        <span>vocabulary for an exam</span>
      </h4>
      <i class="icon uil uil-book-open"></i>
    </li>
    <li class="suggestion">
      <h4 class="text">
        Make me a personal webpage
        <span>after asking me three questions</span>
      </h4>
      <i class="icon uil-code-branch"></i>
    </li>
    <li class="suggestion">
      <h4 class="text">
        Plan a trip
        <span>to experience Crimea like a local</span>
      </h4>
      <i class="icon uil uil-compass"></i>
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
      <input type="text" class="typing-input" placeholder="Say hi! 👋" required>
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
