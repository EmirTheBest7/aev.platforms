<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ΛΞV | Coming soon!</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://js.arcgis.com/4.4/esri/css/main.css">
  <script src="https://js.arcgis.com/4.4/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/167af2010b.js"></script>
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel="stylesheet" href="./style.css">

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
  <div id="topTitle" class="app-titles" style="display:none;">
    <h1 id="appTitle"></h1>
    <button title="Layers" id="layerButton" class="app-button fa fa-list-ul"></button>
    <button title="Map Key" id="legendButton" class="app-button fa fa-key"></button>
  </div>
  <div id="layerListDiv" class="app-titles" style="display:none;">Layers</div>
  <div id="viewDiv"></div>
</div>
  

<!-- partial -->

<script  src="./script.js"></script>
  
</body>
</html>
