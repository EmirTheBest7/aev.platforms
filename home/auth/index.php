<?php 

include('../../_inc/functions.php');

$con = connect();

session_start();

if(isset($_SESSION["token_id"])){
	header("Location:" . BASE_URL . "home/timeline/");
	exit();
}

if(isset($_POST['login']) && $_POST['login']==1) {
	//echo "Login Submitted";
	$email = stripslashes($_POST['logemail']); // removes backslashes
	$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
	$password = stripslashes($_POST['logpass']);
	$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
	$rows = mysqli_num_rows($result);

	
	
    if($rows==1){

		while($data = mysqli_fetch_assoc($result)) {

			// Data Store Session
			$_SESSION['user_id'] = $data["user_id"];
			$_SESSION['token_id'] = $data["token_id"];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nickname'] = $data['nickname'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['phone'] = $data['phone'];
			$_SESSION['access'] = $data['access'];
			$_SESSION['bio'] = $data['bio'];

			// Set Time 
			//$_SESSION['timestamp'] = date("h:i:s"); // logout if > 2 hours && online/offline
			

			//Profile picture session set
			$imageURL = BASE_URL . "home/_uploads/user_".$data["token_id"]. "/profile/" .$data["user_photo"];
			if (!empty($data["user_photo"]) && getimagesize($imageURL) !== false) { // Check if image exists in DB && as file
				$_SESSION['user_photo'] = $imageURL;
			} else {
				$_SESSION['user_photo'] = BASE_URL . "_assets/images/avatar.png";
			}
			
			//Create user_directory 
			$path = '../_uploads/user_'.$data["token_id"];
			if (file_exists($path) || mkdir($path, 0777, true)) {
				mkdir($path.'/profile',0777,true);
				mkdir($path.'/posts',0777,true);

				// JSON 
				/*
				$fp = fopen($path.'/conf.json', 'w');
				fclose($fp); */
			}

			if(empty($data['refer'])) { // (empty($data['refer']) && $data['registered'] == date('Y-m-d'))
				//redirect to settings SETUP PROFILE
				$_SESSION['new_user'] = true;
				header("Location:" . BASE_URL . "home/studio/editProfile/");
				exit();
			}

			header("Location:" . BASE_URL . "home/timeline/"); // Redirect user to index.php


		}

    }else{
		echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
	}

}

if(isset($_POST['register']) && $_POST['register']==1) {
	//echo "Registration Submitted";

	$token_id = random_str(16);
	$token_id = mysqli_real_escape_string($con,$token_id);

	$username = stripslashes($_POST['regname']); // removes backslashes
	$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
	
	$nickname = stripslashes($_POST['regnick']);
	$nickname = mysqli_real_escape_string($con,$nickname);

	$email = stripslashes($_POST['regemail']);
	$email = mysqli_real_escape_string($con,$email);

	$password1 = stripslashes($_POST['regpass']);
	$password2 = stripslashes($_POST['regpass2']);

	if ($password1 === $password2) {
		$password = mysqli_real_escape_string($con,$password1);
	} else {
		echo "Password is not equal. Try again";
		exit();
	}

	$empty = NULL;
	
	$refer = (isset($_POST['regref'])) ? strtolower($_POST['regref']) : $empty;
	$refer = mysqli_real_escape_string($con,$refer);

	$trn_date = date("Y-m-d H:i:s");


	if (!empty($refer)) {
		
		
		$refer_sql = "SELECT * FROM `users` WHERE refer='$refer' ";
		$refer_result = mysqli_query($con,$refer_sql);

		while($refferal = mysqli_fetch_assoc($refer_result)) {
			$refer = $refferal['token_id'];
		} echo $refer;
	} 
	
	// Check if values already exists in DB
	if (!empty($username) && !empty($nickname) && !empty($email) && !empty($password)) {
		
		// Check credentials - Must be checked on javascript
		
        if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE nickname = '$nickname' ")) > 0 || // Check nickname availibility
            mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ")) > 0 || // Check email availibility
            strlen($username) <= 4 || strlen($nickname) <= 4 || // Username|Nickname.len() < 4 
            strlen($email) <= 8 || strlen($password) <= 8 	// Email|Password.len() < 4 
            ) {
				echo "Wrong credentials";
            exit();
        } else {
            $query = "INSERT into `users` (token_id, username, nickname, user_photo, email, password, bio, phone, refer, balance, bank, access, birth, registered, activity) 
						   VALUES ('$token_id', '$username' ,'$nickname', '$empty', '$email', '".md5($password)."', '$empty', '$empty', '$refer', 0, '$empty', 2, '$empty', '$trn_date', '$trn_date')";

			//echo $query; // DEBUG
			$result = mysqli_query($con,$query);
			if($result){
				echo "Registration Status: Success";
			}
		}
	}
	
	
	
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

	<title>Log In</title>

	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="./style.css">
</head>

<body>
	<!-- partial:index.partial.html -->

	<nav class="Navbar">
		<a href="<?php echo BASE_URL; ?>" class="Toggle Navbar-toggle d-none d-sm-block">
			<i class="uil uil-estate"></i>
		</a>


		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

	</nav>

	<main id="main">
		<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />
		<div class="section">
			<div class="container">
				<div class="row full-height justify-content-center">
					<div class="col-12 text-center align-self-center p-form">
						<div class="section pb-5 pt-4 pt-sm-2 text-center">
							<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
							<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
							<label style="margin-bottom: 25px;" for="reg-log"></label>
							<div class="card-3d-wrap mx-auto">
								<div class="card-3d-wrapper">

									<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
										<input type="hidden" name="login" value="1">
										<div class="card-front overflow-hidden ">
											<!-- style="display:none;" -->
											<div id="login1" class="center-wrap switch-group">
												<div class="section text-center">
													<h4 class="mb-4 pb-3">Log In</h4>
													<div class="form-group">
														<input type="email" name="logemail" class="form-style"
															placeholder="Your Email" id="logemail" autocomplete="off">
														<i class="input-icon uil uil-at"></i>
													</div>
													<div class="form-group mt-2">
														<input type="password" name="logpass" class="form-style"
															placeholder="Your Password" id="logpass" autocomplete="off">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>

													<a type="submit" value="submit" class="submit-btn mt-4"
														onclick="document.forms['form1'].submit()">
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														Log In
													</a>

													<p class="mb-0 mt-4 text-center">
														<a href="./reset/" class="link">Forgot your password?</a>
													</p>
												</div>
											</div>

											<div id="register1" class="ext-sign-in center-wrap switch-group">
												<div id="ext-sign-in-content" class="section text-center">
													<h4 class="mt-4"><div class="ext-sign-in-back btn" onclick="login()"><i class="uil uil-angle-left-b"></i>&nbsp;Back</div>External</h4>

													<div class="connect-wallet-head">

														<div class="connect-wallet-content">
															<ul class="wallet-list">
																<li><img src="https://bin.bnbstatic.com/static/images/common/favicon.ico">Binance Chain</li>
																<li><img src="https://opensea.io/static/images/logos/metamask-fox.svg">Metamask</li>
																<li><img src="https://static.opensea.io/logos/walletlink-alternative.png">Coinbase Wallet</li>
																<li><img src="https://brave.com/static-assets/images/brave-favicon.png">Brave</li>
																<!--
																	Google
																	Show More
																-->
															</ul>
														</div>
														
														<div class="connect-wallet-footer">
															<p>New with Ethereum Network ?<br><a href="https://ethereum.org/en/wallets/">Learn about wallet network.</a></p>
														</div>
													</div>
													
												</div>
											</div>


										</div>
									</form>

									<form name="form2" method="post"
										action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
										<input type="hidden" name="register" value="1">
										<div class="card-back">
											<div class="center-wrap">
												<div class="section text-center">
													<h4 class="mb-4 pb-0">Sign Up</h4>
													
													<div class="form-group">
														<input type="text" name="regname" class="form-style"
															placeholder="Your Full Name" id="regname"
															autocomplete="off">
														<i class="input-icon uil uil-user"></i>
													</div>
													<div class="form-group mt-2">
														<input type="text" name="regnick" class="form-style" onchange="checkAvailibility()"
															placeholder="Desired Nickname" id="regnick" minlength="5"
															autocomplete="off">
														<i class="input-icon uil uil-user"></i>
													</div>
													<div class="form-group mt-2">
														<input type="email" name="regemail" class="form-style" onchange="checkAvailibility()"
															placeholder="Your Email" id="regemail" autocomplete="off" minlength="13">
														<i class="input-icon uil uil-at"></i>
													</div>
													<div class="form-group mt-2" style="display: flex;">
														<input type="password" name="regpass" class="form-style" minlength="8"
															placeholder="Your Password" id="regpass" autocomplete="off">
														<i class="input-icon uil uil-lock-alt"></i>
														<i style="right: 12px; left: unset;"
															class="input-icon uil uil-eye-slash" aria-hidden="true"
															id="eye" onclick="showPass()"></i>
													</div>
													<div class="form-group mt-2">
														<input type="password" name="regpass2" class="form-style"
															placeholder="Repeat Password" id="regpass2"
															autocomplete="off" minlength="8">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<!-- Hidden for qr code-->
													<?php

													if (isset($_GET['refer'])) {
														echo '

														<div class="form-group mt-2">
														<input type="text" name="regref" class="form-style"
															value="'.$_GET['refer'].'"
															placeholder="Refferal Code" autocomplete="off">
														<i class="input-icon uil uil-users-alt"></i>
														</div>
														';

														echo '
														<script>
														// One liner function:
														const addCSS = s => document.head.appendChild(document.createElement("style")).innerHTML=s;
														
														// Usage: 
														addCSS(".card-front, .card-back {height: 500px!important;}")
														</script>';
														
													}
													?>


													<a type="submit" value="submit" class="submit-btn mt-4"
														style="filter: hue-rotate(270deg);"
														onclick="document.forms['form2'].submit()">
														<span></span>
														<span></span>
														<span></span>
														<span></span>
														Register
													</a>
												</div>
											</div>
										</div>
									</form>
								</div>

								<div class="ext-sign-in-btn" onclick="register()" style="height: 48px;width: 100%;background: black;position: absolute;bottom: 165px; border: 1px solid #c4c3ca;">
									<p style="line-height: 48px;"><i class="uil uil-keyboard"></i>Sign-In Options</p>
								</div>

							</div>
						</div>
					</div>
					<p style="visibility: visible;position: fixed;bottom: 0; z-index: 1;" class="">By signing up, you
						agree on our <a href="#!">Privacy
							Policy</a> and <a href="#!">Terms of Use</a> including <a href="#!">Cookie Use</a>.
					</p>
				</div>
			</div>
		</div>
	</main>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

	<script src="<?php echo BASE_URL . "_assets/js/core.js" ?>"></script>
	<script src="./script.js"></script>
</body>

</html>