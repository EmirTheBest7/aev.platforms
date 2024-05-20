<?php 

include('../../../_inc/functions.php');

$con = connect();
session_start();

// Change character set to utf8
mysqli_set_charset($con,"utf8");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <title>ΛΞV | Careers List</title>
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
  <link rel='stylesheet' href='./uikit.min.css'>
  <link rel="stylesheet" href="./style.css">

</head>

<body class="filter-main" uk-filter="target: .filter">
  <!-- partial:index.partial.html -->

  <nav class="Navbar">
    <a href="<?php echo BASE_URL; ?>" class="Toggle Navbar-toggle d-none d-sm-block">
			<i class="uil uil-estate"></i>
		</a>

		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

		<div id="navbarCollapse" class="Navbar-menu">

		</div>

		<ul class="Navbar-quickLinks">

		</ul>
	</nav>

  <nav class="actions-menu container">
    <a href=""><i class="uil uil-bookmark"></i> Saved</a>
    <a href=""><i class="uil uil-shield-plus"></i> Applied</a>
    <a href="../team/"><i class="uil uil-book-reader"></i> Meet our Team</a>
  </nav>

  <section class="search container">

    <ul class="comp-filter flex">
      <li class="uk-active" uk-filter-control="group: tag"><a href="#">All</a></li>
      <div style="border-left: 1px solid #000;"></div>
      <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='ΛΞV - HR'];"><a href="#">AEV.HR</a></li>
      <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='4RLTY'];"><a href="#">3E.RLTY</a></li>
      <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='NXR.EX'];"><a href="#">Nexer</a></li>
    </ul>

    <form onsubmit="return false;" class="flex">
        <input onkeyup="filterSearch();" uk-filter-control="" class="uk-search-input" type="search" placeholder="Search..." style="color: black;">
        <button class="search__btn">Search</button>
    </form>
  </section>

  <section class="listings container">
      

    <h3 class="listings__heading">Based on your profile</h3>
    <ul class="listings__grid filter" tabindex="0">
      <p class="skills-no-result uk-hidden">No results</p>
      <?php 

        $jobs_result = mysqli_query($con, "SELECT * FROM jobs") or die( mysqli_error());
        while ($jobs_row = mysqli_fetch_assoc($jobs_result)) {

          echo '

          <li class="jobcard skills-el" tag="'.$jobs_row['job_company'].'" data-name="'.strtolower($jobs_row['job_name']).'">
            <img src="'. BASE_URL . "_assets/images/careers/". $jobs_row['job_logo'] .'" alt="" class="jobcard__logo" />
            <div class="jobcard__heading">'.$jobs_row['job_name'].'</div>
            <div class="jobcard__text">'.$jobs_row['job_company'].'</div>
            <div class="jobcard__text">'.$jobs_row['job_location'].'</div>
            <hr class="jobcard__separator" />
            <a href="'. BASE_URL . "page/careers/desc/?job_url=" .$jobs_row['job_url'].'" class="job-jobcard-menu-btn">More Information <i class="uil uil-angle-right-b"></i></a>
          </li>
          
          ';
        }
      ?>
    </ul>
  </section>
  <!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.6/js/uikit.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="./script.js"></script>

</body>

</html>