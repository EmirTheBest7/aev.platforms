<?php 

include('../../_inc/functions.php');

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
	<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
	<link rel="stylesheet" href="./style.css">


</head>

<body>
	<nav class="Navbar">
		<a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
			data-target="#navbarCollapse"><span></span></a>

		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

		<div id="navbarCollapse" class="Navbar-menu">

		</div>

		<ul class="Navbar-quickLinks">

		</ul>
	</nav>

	<main id="main">

		<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

		<article class="video-sec-wrap">
			<div class="video-sec">
				<ul class="video-sec-middle" id="vid-grid">
					<li class="thumb-wrap">
						<a href="./createPost">
							<div class='content thumb-info'>
								<i class="uil uil-inbox"></i>
								<p>Create Post<span>&gt;</span></p>
							</div>
						</a>
					</li>
					<li class="thumb-wrap">
						<a href="./writeArticle">
							<div class='content thumb-info'>
							<i class="uil uil-document-layout-left"></i>
								<p>Write Article<span>&gt;</span></p>
							</div>
						</a>
					</li>
					<li class="thumb-wrap">
						<a href="./editProfile">
							<div class='content thumb-info'>
								<i class="uil uil-user-square"></i>
								<p>Edit Profile<span>&gt;</span></p>
							</div>
						</a>
					</li>
					<li class="thumb-wrap">
						<a href="./editProfile">
							<div class='content thumb-info'>
								<i class="uil uil-server-network-alt"></i>
								<p>Website<span>&gt;</span></p>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</article>


	</main>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

	<script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>


</body>

</html>