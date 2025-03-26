<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ΛΞV | ΛWDC25</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="./style.css">

  <style>
    .button-container {
      display: flex;
      justify-content: center;
      gap: 10px; /* Adjust spacing between buttons */
      margin-top: 20px; /* Optional: Add top margin */
    }

    .button-container button {
      padding: 10px 20px;
      background-color: transparent;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 400;
      font-size: 16px;
      line-height: 1;
      color: #CC3341;
      letter-spacing: 2px;
      border: 1px solid #CC3341;
    }
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<nav class="Navbar">
		<a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
			data-target="#navbarCollapse"><span></span></a>

		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

		<div id="navbarCollapse" class="Navbar-menu">

		</div>

		<ul class="Navbar-quickLinks">

		</ul>
  </nav>
  
<div class="container">
  <div class="wrapper">
    <div class="content">
      
    <div class="title">
      <h3>Get ready for</h3>
      <h1>ΛWDC25</h1>
      <h3>Prague, CZ <strong>MAY 30-31</strong></h3>
      <h4>Let's Connect!</h4>

      <div class="button-container">
        <button onclick="location.href = 'https://forms.gle/Yn7FetmrzNHAdsWe8';">RSVP</button>
        <button onclick="location.href = 'https://aliev.io/page/DC25/AWDC25.PNG';">INVITE</button>
      </div>
    </div>

    </div>
  </div>
</div>
<!-- partial -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pixi.js/4.4.2/pixi.min.js'></script>
<script  src="./script.js"></script>
  
</body>
</html>
