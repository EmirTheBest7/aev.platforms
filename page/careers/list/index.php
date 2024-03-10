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
  <link rel="stylesheet" href="./style.css">

</head>

<body>
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
    <h2>Search for your next job</h2>
    <form action="">
      <input type="text" placeholder="Search by title, skill" disabled/>
      <input type="text" placeholder="City, state, or zip code" disabled/>
      <button class="search__btn">Search</button>
    </form>
  </section>

  <section class="listings container">
    <h3 class="listings__heading">Based on your profile</h3>
    <ul class="listings__grid">
      <?php 

        $jobs_result = mysqli_query($con, "SELECT * FROM jobs") or die( mysqli_error());
        while ($jobs_row = mysqli_fetch_assoc($jobs_result)) {

          echo '

          <li class="jobcard">
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

</body>

</html>