<?php 

include('../../../_inc/functions.php');

$con = connect();

// Change character set to utf8
mysqli_set_charset($con,"utf8");

$job_url = $_GET['job_url'];
$jobs_desc = mysqli_query($con, "SELECT * FROM jobs WHERE job_url = '$job_url' ") or die( mysqli_error());
$jobs_row = mysqli_fetch_assoc($jobs_desc);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
	<title>ΛΞV | <?php echo $jobs_row['job_name']; ?></title>
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
	<!-- partial:index.partial.html -->
	<div class="content-container">

		<article class="job-listing">

			<header class="job-listing-header">

				<div class="job-listing-header__banner">
					<span>Summary</span>
				</div>

				<div class="job-listing-header__content">

					<div class="job-listing-header__company-logo"> <!-- /_assets/job_icon.png -->
						<img src="<?php echo BASE_URL . "_assets/images/careers/". $jobs_row['job_logo']; ?>" alt="Logo Alt" itemprop="image" style="max-width:128px; border-radius: 30px;">
					</div>

					<div class="job-listing-header__job-details">
						<div class="job-listing-header__job-details-top">
							<h1 class="job-listing-header__job-title" itemprop="title">Професійний пожирач сирочків</h1>
							<span class="job-listing-header__company-name" itemprop="hiringOrganization">
								<span class="job-listing-header__company-type"><?php echo $jobs_row['job_company']; ?></span>
							</span>
						</div>
						<div class="job-listing-header__job-details-middle">
							<table class="job-listing-header__mata-table">
								<tr itemprop="baseSalary" itemscope itemtype="http://schema.org/MonetaryAmount">
									<th>Зарплата</th>
									<td>
										<span witemprop="currency"><i class="uil uil-crockery"></i></span>
										<span itemprop="value"><?php echo $jobs_row['job_salary']; ?><span>
									</td>
								</tr>
								<!--<tr>
									<th>Benefits</th>
									<td itemprop="jobBenefits">1</td>
									<td itemprop="jobBenefits">2</td>
								</tr>-->
								<tr itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
									<th>Локація:</th>
									<td itemprop="address">Прага, Чехія</td>
								</tr>
								<tr>
									<th>Категорія</th>
									<td itemprop="occupationalCategory">Пожирач сирочків</td>
								</tr>
								<tr>
									<th>Тип зайнятості</th>
									<td itemprop="employmentType"><?php echo $jobs_row['job_type']; ?></td>
								</tr>
								<tr>
									<th>Керівник команди</th>
									<td>Emir A.</td>
								</tr>
							</table>
						</div>
						<div class="job-listing-header__job-details-bottom">
							<a href="https://aliev.io/home/_api/UI/?Page=valentine" class="btn btn-apply">Подати заявку</a>
						</div>
					</div>

				</div>

			</header>

			<section class="job-listing__job-description" itemprop="description">

				<h2 class="job-listing__job-description-title">Job Description</h2>

				<p><?php echo $jobs_row['job_desc']; ?></p>
				<p><strong>Локація:</strong></p>
				<p>Прага, Чехія</p>
				
				<p><strong>Основні обов’язки:</strong></p>
				<ul>
					<li>Поглинання мінімум 7 сирочків на годину.</li>
					<li>Ведення щоденника смакових відчуттів.</li>
					<li>Медитації на тему сирка щовівторка.</li>
					<li>Участь у внутрішньому конкурсі «Сирочок року».</li>
					<li>Спонтанне виголошення сирочкових од у конференц-залі.</li>
					<li>Тестування нових видів сирочків.</li>
					<li>Глибоке занурення в сиркову філософію.</li>
					<li>Не зраджувати сирочкам <strong>навіть під час дієти</strong>.</li>
				</ul>
				<p><strong>Вимоги до кандидата:</strong></p>
				<ul>
					<li><strong>Дуже красиві очі.</strong> Щоб сирочки самі розкривались у твоїх руках.</li>
					<li>Досвід споживання сирочків в екстремальних умовах (наприклад, у ліфті, в метро, під час дзвінка клієнту).</li>
					<li>Гнучкість язика — для глибокого аналізу глазурі.</li>
					<li>Вміння дивитись на сирок з любов’ю, але без об’єктивізації.</li>
					<li><strong>Знання хоча б одного сиркового мемчика.</strong></li>
					<li>Не боятись бути сирково-залежним.</li>
					<li><strong>Робити дегустації на командних мітингах.</strong></li>
    				<li>Вести Telegram-канал <strong>“Життя з сирочком”.</strong></li>
				</ul>


				<p><strong>Бонуси:</strong></p>
				<ul>
					<li>Часті побачення з босом (особливо біля холодильника).</li>
					<li>Ліжко у формі сирочка в chill-зоні.</li>
					<li>Сирочковий дрес-код (піжами з принтом глазурі вітаються).</li>
					<li>Можливість кар’єрного росту до "Сирного шамана".</li>
					<li>Безлімітний доступ до VIP-сирочків, які звичайним смертним не сняться.</li>
					<li>Власна корпоративна ложка з гравіюванням.</li>
				</ul>
				
				<p><strong>Як податися</strong></p>
				<p>Надішли відео, де ти повільно їси сирочок під саундтрек із Титаніка, та <strong>CV у форматі <code>.syr</code></strong> на пошту <strong>info@aliev.io</strong>.</p>

				<strong>#СирОчіТвоєїМрії #ALIEVPlatforms #Кар’єраМрії</strong>

				<div class="job-listing-header__job-details-bottom" style="justify-content: left;">
					<a href="https://aliev.io/home/_api/UI/?Page=valentine" class="btn btn-apply">Подати заявку</a>
				</div>

			</section>

		</article>

		<aside class="job-listing-sidebar">

			<section class="sidebar-widget">
				<h3 class="sidebar-widget__title">Quick Actions</h3>
				<div class="sidebar-widget__quick-actions">
					<!-- Back to prev page link -->
					<a href="../list/" class="sidebar-widget__quick-actions-prev-page">
						<i class="uil uil-step-backward"></i> Back to Jobs - List
						<span></span>
					</a>
				</div>
			</section>

			<section class="sidebar-widget">
				<h3 class="sidebar-widget__title">Related Jobs <small>by <em>Category</em></small></h3>
				<ul class="sidebar-widget__related-jobs">

					<?php 

					$jobs_result = mysqli_query($con, "SELECT * FROM jobs ORDER BY rand() LIMIT 3") or die( mysqli_error());
					while ($jobs_row = mysqli_fetch_assoc($jobs_result)) {

					echo '

						<li class="sidebar-widget__related-job">
							<a href="'. BASE_URL . "page/careers/desc/?job_url=" .$jobs_row['job_url'].'" class="sidebar-widget__related-job--link">
								<h4 class="sidebar-widget__related-job-title">'.$jobs_row['job_name'].'</h4>
								<span class="sidebar-widget__related-job-company">'.$jobs_row['job_company'].'</span>
								<span class="sidebar-widget__related-job-location">'.$jobs_row['job_location'].'</span>
								<!--<span class="sidebar-widget__related-job-date">Posted 1 day ago</span>-->
							</a>
						</li>';
					}
					?>
				</ul>
			</section>

		</aside>

	</div>
	<!-- partial -->

</body>

</html>