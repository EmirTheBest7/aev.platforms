<?php 

include('../../../_inc/functions.php');

$con = connect();

if(isset($_SESSION["token_id"])) {
	echo "";
} else {
	header("Location: https://aliev.io/page/empty/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ΛΞV | Our Team</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700|Open+Sans:400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<nav class="Navbar">
		<a href="../list/" class="Toggle Navbar-toggle d-none d-sm-block">
      		<i class="uil uil-step-backward-alt"></i>
		</a>

		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

		<div id="navbarCollapse" class="Navbar-menu">

		</div>

		<ul class="Navbar-quickLinks">

		</ul>
    </nav>
    
    <div class="container">
        <h1><span style="color: white; text-shadow: -1px -1px 0 #0F0F11, 1px -1px 0 #0F0F11, -1px 1px 0 #0F0F11, 1px 1px 0 #0F0F11;">Join Us</span><br> open positions at ABCD</h1>

        <img src="#" />

        <p style="text-align: center;">We bring our clients' products and ideas to digital life. Every single person in our company is passionate about what we do.</p>


    </div>

</body>

</html>