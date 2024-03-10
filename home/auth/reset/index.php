<?php 

include('../../../_inc/functions.php');

$con = connect();

session_start();
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
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<!-- partial:index.partial.html -->

	<nav class="Navbar">
		
		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

	</nav>

	<main id="main">
			<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />
		<div class="section">
			<div class="container">
				<div class="row full-height justify-content-center">
					<div class="col-12 text-center align-self-center p-form">
						<div class="section pb-5 pt-4 pt-sm-2 text-center">
                            
							<div class="card-3d-wrap mx-auto">
								<div class="card-3d-wrapper">
                                
                                <?php 

                                //?key='.$key.'&email='.$email.'&action=reset
                                //?key=12&email=3&action=reset
                                if ($_GET['key'] && $_GET['email'] && $_GET['action']) {
                                    echo '

                                    <form method="post" action="" name="update" style="background-color: black;padding: 20px;">
                                        <h4 class="mb-4 pb-0>Password Reset</h4>
	                                    <input type="hidden" name="action" value="update" />
                                        
                                        <div class="form-group mt-2">
                                            <input type="password" name="pass1" id="pass1" maxlength="15" class="form-style" placeholder="Your Password" autocomplete="off" minlength="8" required/>
												<i class="input-icon uil uil-lock-alt"></i>
										</div>
                                        <div class="form-group mt-2">
                                            <input type="password" name="pass2" id="pass2" class="form-style" placeholder="Repeat Password"  autocomplete="off" minlength="8" required>
											<i class="input-icon uil uil-lock-alt"></i>
                                        </div>

                                        <input type="hidden" name="email" value="'.$email.'"/>
                                        
                                        <a type="submit" value="submit" class="submit-btn mt-4" style="filter: hue-rotate(110deg);" onclick=\'document.forms["update"].submit(); return false;\'">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											Update
										</a>
	                                </form>
                                    
                                    
                                    ';

                                } else {
                                    echo '
                                    <form method="post" action="" name="reset" style="background-color: black;padding: 20px;">
                                        <h4 class="mb-4 pb-0">Enter Your Email Address:</h4>

                                        <div class="form-group">
                                            <input type="email" name="email"  class="form-style" placeholder="username@email.com" autocomplete="off">
											<i class="input-icon uil uil-at"></i>
										</div>


                                        <a type="submit" id="reset" class="submit-btn mt-4" style="filter: hue-rotate(110deg);" onclick=\'document.forms["reset"].submit(); return false;\'">
											<span></span>
											<span></span>
											<span></span>
											<span></span>
											Reset Password
										</a>
                                    </form>';
                                }
                                ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

	<script src="<?php echo BASE_URL . "_assets/js/core.js" ?>"></script>
</body>

</html>