<?php 

include('../../../_inc/functions.php');
$conn = connect();

session_start();
auth();
logout();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>New Messenger</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

	<section class="mainApp">
		<div class="leftPanel">
			<header>
				<input class="searchChats" type="search" placeholder="Search..." />
			</header>
			<div class="chats">
				<div class="chatButton active">
					<div class="chatInfo">
						<div class="image my-image"></div>
						<p class="name">Emir Aliev</p>
						<p class="message">{Last Message}</p>
					</div>

					<div class="status onTop">
						<p class="date">00:02</p>
						<p class="count">10</p>
						<i class="material-icons read">done_all</i>
						<svg class="fixed" viewBox="0 0 24 24">
							<path d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z" />
						</svg>
					</div>
				</div>

				<div class="chatButton">
						<div class="chatInfo">
							<div class="image my-image"></div>
							<p class="name">Hester AI</p>
							<p class="message">{Last Message}</p>
						</div>
	
						<div class="status onTop">
							<p class="date">00:02</p>
							<p class="count">10</p>
							<i class="material-icons read">done_all</i>
							<svg class="fixed" viewBox="0 0 24 24">
								<path d="M16,12V4H17V2H7V4H8V12L6,14V16H11.2V22H12.8V16H18V14L16,12Z" />
							</svg>
						</div>
					</div>
			</div>
		</div>

		<div class="rightPanel">
			<div class="topBar">
				<div class="rightSide">
					<button class="tbButton search">
						<i class="material-icons">&#xE8B6;</i>
					</button>
					<button class="tbButton otherOptions">
						<i class="material-icons">more_vert</i>
					</button>
				</div>

				<div class="leftSide">
				<img class="chat-img" src="<?php echo $_SESSION['user_photo']; ?>">
					<p class="chatName"><?php echo $_SESSION['username'] . verified($_SESSION['access']); ?><span>| @<?php echo $_SESSION['nickname']; ?></span></p>
					<p class="chatStatus">Online</p>
				</div>
			</div>

			<div class="convHistory userBg">
				<!-- CONVERSATION GOES HERE! -->

				<div class="msg messageReceived">
					123
					<span class="timestamp">00:00</span>
				</div>

				<div class="msg messageSent">
					456
					<i class="material-icons readStatus"></i>
					<span class="timestamp">00:01</span>
				</div>

				
			</div>

			<div class="replyBar">
				<button class="attach">
					<i class="uil uil-paperclip"></i>
				</button>

				<input type="text" class="replyMessage" placeholder="Type your message..." />

				<div class="emojiBar">
					<div class="emoticonType">
						<button id="panelEmoji">Emoji</button>
						<button id="panelStickers">Stickers</button>
						<button id="panelGIFs">GIFs</button>
					</div>


					<!-- Emoji panel -->
					<div class="emojiList">
						<button id="smileface" class="pick">
						</button>
						<button id="grinningface" class="pick"></button>
						<button id="tearjoyface" class="pick"></button>
						<button id="rofl" class="pick"></button>
						<button id="somface" class="pick"></button>
						<button id="swfface" class="pick"></button>
					</div>

					<!-- the best part of telegram ever: STICKERS!! -->
					<div class="stickerList">
						<button id="smileface" class="pick">
						</button>
						<button id="grinningface" class="pick"></button>
						<button id="tearjoyface" class="pick"></button>
					</div>

				</div>

				<div class="otherTools">
					<button class="toolButtons emoji">
						<i class="uil uil-smile" style="font-size: 25px;"></i>
					</button>

					<button class="attach" style="float: right;">
						<i class="uil uil-message"></i>
					</button>

				</div>
			</div>
		</div>
	</section>

	<!-- ---------------------- -->
	<!-- MENU AND OVERLAY STUFF -->
	<!-- ---------------------- -->

	<!-- MENU -->

	<!-- CONVERSATION OPTIONS MENU -->
	<div class="moreMenu">
		<button class="option about settings">See Info</button>
		<button class="option notify">Disable Notifications</button>
		<button class="option block">Block User</button>
	</div>

	<!-- MOBILE OVERLAY -->
	<section class="switchMobile">
		<p class="title">Mobile Device Detected</p>

		<p class="desc">Switch to the mobile app for a better performance.</p>

		<a href="#">
			<button class="ripple-button">OK</button>
		</a>
	</section>

	<!-- PROFILE OPTIONS OVERLAY -->
	<section class="config">
		<section class="configSect">
			<div class="profile">
				<p class="confTitle">Settings</p>

				<div class="image"></div>

				<div class="side">
					<p class="name">Random Name</p>
					<p class="pStatus">Online</p>
				</div>

				<button class="changePic">Change Profile Picture</button>
				<button class="edit">Edit Profile Info</button>
			</div>
		</section>

		<section class="configSect second">

			<!-- PROFILE INFO SECTION -->
			<p class="confTitle">Your Info</p>

			<div class="information">
				<ul>
					<li>Phone Number: <span class="blue phone">+1 12 1234 5678</span></li>
					<li>Username: <span class="blue username">@USERNAME</span></li>
					<li>Profile: <span class="blue">https://t.me/USERNAME</span></li>
				</ul>
			</div>

			<!-- NOTIFICATIONS SECTION -->
			<p class="confTitle">Notifications</p>

			<div class="optionWrapper deskNotif">
				<input type="checkbox" id="deskNotif" class="toggleTracer" checked>

				<label class="check deskNotif" for="deskNotif">
					<div class="tracer"></div>
				</label>
				<p>Enable Desktop Notifications</p>
			</div>

			<div class="optionWrapper showSName">
				<input type="checkbox" id="showSName" class="toggleTracer">

				<label class="check" for="showSName">
					<div class="tracer"></div>
				</label>
				<p>Show Sender Name</p>
			</div>

			<div class="optionWrapper showPreview">
				<input type="checkbox" id="showPreview" class="toggleTracer">

				<label class="check" for="showPreview">
					<div class="tracer"></div>
				</label>
				<p>Show Message Preview</p>
			</div>

			<div class="optionWrapper playSounds">
				<input type="checkbox" id="playSounds" class="toggleTracer">

				<label class="check" for="playSounds">
					<div class="tracer"></div>
				</label>
				<p>Play Sounds</p>
			</div>


			<p class="confTitle">Other Settings</p>

			<div class="optionWrapper">
				<input type="checkbox" id="checkNight" class="toggleTracer">

				<label class="check DarkThemeTrigger" for="checkNight">
					<div class="tracer"></div>
				</label>
				<p>Dark Theme</p>
			</div>

		</section>
	</section>

	<!-- DARK FRAME OVERLAY -->
	<section class="overlay"></section>

	<!-- -------------------------------- -->
	<!-- SPECIFIC FOR CONNECTION WARNINGS -->
	<!-- -------------------------------- -->
	<div class="alerts">
		Trying to reconnect...
	</div>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

	<script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
	<script src="./script.js"></script>

</body>

</html>


