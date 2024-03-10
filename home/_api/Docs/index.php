<?php include('../../../_inc/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ΛΞV | Docs </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css'>
  
    <link rel="stylesheet" href="<?php echo BASE_URL . "home/videos";?>/assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="./grid.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="video-app">

		<div class="header">
			<div class="header-left">
				<svg id="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
					stroke-linecap="round" stroke-linejoin="round">
					<path d="M3 12h18M3 6h18M3 18h18" /></svg>
				<img class="logo" src="<?php echo LOGO; ?>" />
				<div class="marker">BETA</div>
				
			</div>

			<div href="#" class="v-badge">
				v4.3.1
				<span></span>
			</div>
			
		</div>
		
	

        <div class="wrapper">

			<div class="left-side is-active" id="navbarCollapse">
				<div class="side-wrapper">
					<div class="side-menu">

						<div class="courses d-flex c-tabs c-tab--navigation" data-toggle="c-tabs" role="navigation">
							<a href="#content-home" class="c-tab--item profile-menu-link active">Home</a>
							<a href="#content-learn" class="profile-menu-link">Learn</a>
                            <a href="#content-api" class="profile-menu-link">API</a>
						</div>

						<input type="text" placeholder="Search...">
						<p>Press&nbsp;<kbd>⌘</kbd> +&nbsp;<kbd>K</kbd> for Search</p>

						<hr style="margin: 1rem 0;">
					</div>
				</div>
				
				<div class="side-wrapper">
					<div class="c-tab--content-container">
						
						<div id="content-home" class="c-tab--content active">
							<div class="side-menu">
								<a onclick="loadPage('./mds/architecture.html')"><i class="uil uil-lightbulb-alt"></i>&nbsp;Overview</a>
								<a href="#"><i class="uil uil-film"></i>&nbsp;Comunity</a>
								<a href="#"><i class="uil uil-music-note"></i>&nbsp;Blog</a>
								<a href="#"><i class="uil uil-music-note"></i>&nbsp;Legals</a>
							</div>
						</div>

						<div id="content-learn" class="c-tab--content">
							<div class="side-menu">
								<a href="#"><i class="uil uil-setting"></i>&nbsp;Getting Started</a>
								<a href="#"><i class="uil uil-setting"></i>&nbsp;CLI</a>
							</div>
						</div>

						<div id="content-api" class="c-tab--content">
							<div class="side-menu">
								<a href="#"><i class="uil uil-setting"></i>&nbsp;info();</a>
							</div>
						</div>

					</div>
					

					

				</div>
			</div>
			
            <div id="loadContent" class="main-container">

				<section id="Hello_World">
					<header class="main-section__heading">Hello World </header>
					<p class="main-section__intro">The smallest ΛΞV example looks like this:</p>
						
						<code class="code">
							ΛΞVDOM.render(
								<br />
									&nbsp;&nbsp;&lth1&gtHello, world!&lt/h1&gt,
								<br />
									&nbsp;&nbsp;document.getElementById('root')
								<br />
							);
						</code>

					<p class="main-section__text">Consider the ticking clock example from one of the previous sections. In <a href="#" class="main-section__link--inline">Rendering Elements</a>, we have only learned one way to update the UI. We call <code class="code--inline">ΛΞVDOM.render()</code> to change the rendered output:</p>
					
					<a href="#" class="main-section__link">Try it on</a>
					<h3 class="main-section__subHeading">How to Read this Guide</h3>
					<p class="main-section__text">In this guide, we will examine the building blocks of ΛΞV apps: elements and components. Once you master them, you can create complex apps from small reusble code. </p>
					<blockquote class="main-section__tipbox">
						<h4>Tip</h4>
						<p class="main-section__text">This guide is designed for people who prefer <strong>learning concepts step by step</strong>. If you prefer to learn by doing, check out our <a href="#" class="main-section__link--inline">practical tutorial</a>. You might find this guide and that tutorial complementary to each other.</p>
						</blockquote>
					<p class="main-section__text">This is the first chapter in a step-by-step guide about main ΛΞV concepts. You can find a list of all its chapters in the navigation sidebar. If you’re reading this from a mobile device, you can access the navigation by pressing the button in the bottom right corner of your screen.</p>
				</section>

				<hr />
  
			</div>
			
			<div class="right-side d-none">
				<div class="side-wrapper">
					<div class="side-menu">Current</div>
				</div>
			</div>

        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='./script.js'></script>

</body>

</html>