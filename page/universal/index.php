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

	<main>

		<header class="block absolute inset-x-0 z-50 p-5 md:p-10 flex items-start justify-between gap-10">
			<div class="pl-5 md:pr-10 flex items-center">
				<img src="https://aliev.io/page/downloads/logo/A.svg" alt="" width="40" height="60">
			</div>

			<div
				class="px-6 md:px-10 py-4 md:py-6 flex items-center justify-between gap-10 bg-white/70 backdrop-blur-sm rounded-md sm:w-full lg:w-2/3 leading-none">
				<ul class="hidden sm:flex items-center gap-6 md:gap-8">
					<li>
						<a href="#"
							class="block relative after:block after:absolute after:-bottom-[5px] after:w-full after:h-px after:bg-current after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-right hover:after:origin-left">Link1</a>
					</li>
					<li>
						<a href="#"
							class="block relative after:block after:absolute after:-bottom-[5px] after:w-full after:h-px after:bg-current after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-right hover:after:origin-left">Link2</a>
					</li>
					<li>
						<a href="#"
							class="block relative after:block after:absolute after:-bottom-[5px] after:w-full after:h-px after:bg-current after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-right hover:after:origin-left">Link3</a>
					</li>
				</ul>
				<ul class="flex items-center gap-6 md:gap-8">
					<li>
						<button type="button" aria-label="Search" class="p-3 -m-3 rounded-full transition-colors hover:bg-violet-50">
							<i class="uil uil-search" style="font-size: 20px;"></i>
						</button>
					</li>
					<li>
						<button type="button" aria-label="Cart" class="p-3 -m-3 rounded-full transition-colors hover:bg-violet-50">
							<i class="uil uil-shopping-bag" style="font-size: 20px;"></i>
						</button>
					</li>
					<li>
						<button type="button" aria-label="Account" class="p-3 -m-3 rounded-full transition-colors hover:bg-violet-50">
							<i class="uil uil-user" style="font-size: 20px;"></i>
						</button>
					</li>
				</ul>
			</div>
		</header>

		<header class="l-header l-header--extended" style="padding-top: 150px;">

			<div class="l-header__background" style="background-color: rgb(25,25,25)">

			</div>

			<div class="l-container">
				<div class="l-grid h-push-bottom">

					<div class="l-col-12 l-col-sm-4 l-col--hidden-sm-down">

						<ul class="c-meta">
							<li class="c-meta__item">

								<span class="c-meta__content">
									<img src="./scc.svg" style="width: 150px; filter: invert(1); position: absolute;">
								</span>

							</li>
						</ul>

					</div>

					<div class="l-col-12 l-col-sm-6">
						<div class="c-header">
							<h1 class="c-header__title">Our Team</h1>
						</div>
					</div>
				</div>



				<div class="l-grid">
					<div class="l-col-12 l-col-sm-6 l-col-sm-offset-4">
						<div class="l-grid c-meta c-header__featured-meta">

							<div class="l-col-6 l-col-mi-4 l-col-sm-4">
								<span class="c-meta__item">
									<span class="c-meta__label">Meta</span>

									<span class="c-meta__content">Center</span>

								</span>
							</div>

							<div class="l-col-6 l-col-mi-4 l-col-sm-4">

								<span class="c-meta__label">Meta</span>

								<span class="c-meta__content c-meta__term">Center</span>
							</div>

							<div class="l-col-6 l-col-mi-4 l-col-sm-4">

								<span class="c-meta__label">Meta</span>

								<span class="c-meta__content c-meta__term">Center</span>
							</div>


						</div>
					</div>
				</div>


			</div>
		</header>



		<section class="l-case-media" hidden>
			<div class="l-container">
				<div class="l-grid">

					<div class="c-media c-frame c-frame--tablet">

						<div class="c-frame__inner">
							<div class="c-frame__content">


							</div>
						</div>
					</div> <!-- .c-media -->
				</div>
			</div>
		</section>

		<section class="l-case-content">
			<div class="l-container">

				<div class="c-card js-scrollspy a-fadeInUp was-in-view is-in-view">
					<div class="l-grid">

						<div class="l-col-12 l-col-sm-4">
							<h2 class="c-card__heading">Heading</h2>
						</div>

						<div class="l-col-12 l-col-sm-6 l-col-sm-offset-2">

							<div class="c-card__content">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin augue urna, rutrum id
									lacus eu, facilisis interdum nunc. Sed varius cursus sagittis. Etiam sit amet nunc
									vel lectus pulvinar scelerisque. Pellentesque ac dictum tellus. Ut lacus odio,
									molestie ac velit ac, iaculis volutpat odio. In gravida consequat quam vel volutpat.
									Curabitur volutpat facilisis leo a ornare. Mauris mattis libero vitae venenatis
									scelerisque. Aenean ornare viverra molestie.<br><br>

									Integer laoreet fringilla tellus eu bibendum. Cras fermentum dolor quis nibh
									lacinia, in ullamcorper lacus vulputate. Fusce eros mauris, posuere et vulputate et,
									tincidunt sed nunc. Nulla venenatis mi a consectetur tempor. Duis elementum, lacus
									quis pretium malesuada, nisi urna faucibus leo, non fringilla felis tellus sed nisl.
									Nunc in lobortis eros. Phasellus pharetra suscipit finibus. Cras condimentum, nibh
									placerat iaculis hendrerit, turpis risus sodales dolor, non egestas lacus turpis ut
									mauris. Mauris condimentum nunc turpis, id feugiat arcu lobortis et. Nunc vitae
									convallis neque. In hac habitasse platea dictumst. Phasellus eros arcu, convallis id
									pellentesque et, cursus id metus. Vivamus eu ultrices urna. Aenean arcu turpis,
									varius at est sed, tempus luctus velit. Nulla nulla magna, pretium ut purus id,
									sodales placerat neque.
								</p>
							</div>

						</div>
					</div>

				</div>
			</div>
		</section>

		<section class="l-section">
			<div class="l-container">
				<div class="l-grid">
					<div class="l-col-12">
						<a class="c-card c-card--image" href="#">
							<div class="l-grid l-grid--reverse-md-down">

								<div class="l-col-12 l-col-sm-6 l-col--equal-height">
									<h2 class="c-card__heading">Next Project</h2>

									<div class="c-card__content">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam est lorem,
										iaculis nec tortor at, bibendum rutrum arcu. In eleifend libero orci, sed
										ullamcorper justo dapibus tristique.
									</div>

									<div class="c-card__footer c-meta">

										<span class="c-meta__content c-meta__term">Page</span><span
											class="c-meta__content c-meta__term">Index</span>
									</div>
								</div>

								<div class="l-col-12 l-col-sm-6 l-col--equal-height">
									<div class="c-card__media">

										<img width="992" height="595" src="#" style="display: none;"
											class="c-card__image">

										<span class="c-featured-btn">Next <img class="icon" src="./scc.svg">
										</span>
									</div>
								</div>

							</div>
						</a>
					</div>
				</div>
			</div>
		</section>

		<footer id="site-footer">
				<section class="horizontal-footer-section" id="footer-bottom-section">
					<div id="footer-copyright-info">
						© Designed by <img style="height:11px;" src="<?php echo LOGO; ?>"> Platforms in Prague.</div>
						<div id="footer-social-buttons">
							<i class="uil uil-instagram"></i>
						</div>
				</section>
	
		</footer>

	</main>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>


</body>

</html>