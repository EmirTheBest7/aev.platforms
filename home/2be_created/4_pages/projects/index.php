<?php 

require '../../_inc/functions.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<link rel="shortcut icon" type="image/x-icon" href="img/EAlogo.svg">

	<title>ΛΞV</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>


	<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">

	<link rel="stylesheet" href="./style.css">

	<style>
		main {
			position: absolute !important;
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
					<li><a style="color:white;"
							href="<?php echo BASE_URL . "/home/"; ?>"><?php if(isset($_SESSION["token_id"])){ echo "Dashboard";} else {echo "Log In";}  ?></a>
					</li>
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

		<div class="hero-center-section">
			<div class="left-text">CVX Arch</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/nature.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-center-section">
			<div class="left-text">EVO 1S</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/travel.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-center-section">
			<div class="left-text">fashion</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/fashion.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-center-section">
			<div class="left-text">animals</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/animals.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-center-section">
			<div class="left-text">business</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/business.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hero-center-section">
			<div class="left-text">art</div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="img-wrap">
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/art.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="section padding-top-bottom over-hide z-bigger">
			<ul class="slide-buttons">
				<li class="">
					<a onclick="setTimeout(function(){ window.location.href= 'vault.php';}, 1500);" class="hover-target" data-hover="CVX Arch">CVX Arch</a>
				</li>
				<li class="">
					<a onclick="setTimeout(function(){ window.location.href= 'vault.php';}, 1500);" class="hover-target" class="hover-target" data-hover="EVO 1S">EVO 1S</a>
				</li>
				<li class="">
					<a href="#0" class="hover-target" data-hover="fashion">fashion</a>
				</li>
				<li class="">
					<a href="#0" class="hover-target" data-hover="animals">animals</a>
				</li>
				<li class="">
					<a href="#0" class="hover-target" data-hover="business">business</a>
				</li>
				<li class="">
					<a href="#0" class="hover-target" data-hover="art">art</a>
				</li>
			</ul>
		</div>

		<!-- Page cursor
		================================================== -->

		<div class='cursor' id="cursor"></div>
		<div class='cursor2' id="cursor2"></div>
		<div class='cursor3' id="cursor3"></div>






	</main>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

	

	<script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>

	<script src="./script.js"></script>


</body>

</html>