<?php 

require '../../_inc/functions.php';
session_start();

$conn = connect();
session_start();
auth();


if($_SESSION['new_user']) { //NEW USER PROFILE SETUP
    $setup = false;
    $rewriteURL = false;

    $setup_query = "SELECT * FROM users WHERE nickname = '".$_SESSION['nickname']."' and token_id='".$_SESSION['token_id']."'";// and id='".$id."'
    $setup_result = mysqli_query($conn, $setup_query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($setup_result);


    if (isset($_POST['basic_info']) && $_POST['basic_info']==1) {
        
        // Variables
        $trn_date = date("Y-m-d H:i:s");

        $set_name =$_POST['name'];
        $set_email =$_POST['email'];
        $set_birth =$_POST['birth'];
        $set_refer =$_POST['refer'];
        $set_image = $_FILES['image']['name']; // First image from array

        
        $update="UPDATE users SET username='".$set_name."', image='".$set_image."', refer='".$set_refer."', birth='".$set_birth."', email='".$set_email."' WHERE nickname = '".$_SESSION['nickname']."' and token_id='".$_SESSION['token_id']."'";
        /*mysqli_query($con, $update) or die(mysqli_error());

        */

        echo $update;
    }

    // if everything ok -> unset($_SESSION['new_user']);

} else {


//Delete Account 
if(isset($_POST['btn_delete']) && $_POST['btn_delete']==1) {

    echo "Hello";

    // Select user for: if pw1 === pw2
    //$d_query = "SELECT FROM users WHERE token_id = 'hello' ";
    //$d_result = mysqli_query($con,$query_delete) or die(mysqli_error());

    echo $_SESSION['token_id'];
    
    
    if ($_POST['pw_1'] === $_POST['pw_2']) { // && $_POST['pw_1'] == $sel['password']
        //$sql = mysql_query($con, "DELETE FROM users WHERE token_id='$_SESSION['token_id']'") or die ( mysqli_error());
        //echo $sql;
        echo $_POST['pw_1'];

        $path = '../_uploads/user_'.$_SESSION["token_id"];

        /*
		if (file_exists($path) {
            echo "hey";
        }*/

        /*
        if($sql){
            echo "Deleted";
        }*/        

    }
}                   





}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

    <title>CodePen - Dashboard UI </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre|Roboto" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->

    <nav class="Navbar">
        <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
            data-target="#navbarCollapse"><span></span></a>

        <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link"
            src="<?php echo LOGO; ?>">

        <div id="navbarCollapse" class="Navbar-menu">
            <ul class="Navbar-menu-major">
                <li><a href="#link">Gear</a></li>
                <li><a href="#link">Music</a></li>
                <li><a href="#link">Robotics</a></li>
                <li><a href="#link">Photography</a></li>
            </ul>
            <div class="Navbar-menu-minor">
                <ul>
                    <li><a href="#link">Store</a></li>
                    <li><a href="#link">Deals</a></li>
                    <li><a href="#link">Themes</a></li>
                </ul>
                <ul>
                    <li><a href="#link">Advertising</a></li>
                    <li><a href="#link">Privacy Policy</a></li>
                    <li><a href="#link">Contact</a></li>
                    <li><a style="color:white;" href="<?php echo BASE_URL . "/home/"; ?>">Log In</a></li>
                </ul>
                <ul class="Navbar-menu-social u-Navbar-hidden@sm-up">
                    
                </ul>
            </div>
        </div>

        <ul class="Navbar-quickLinks">
            
        </ul>
    </nav>


    <main class="main" id="main">

        <?php if ($setup) { ?>

        <div class="responsive-wrapper setup-wrapper">
            <div class="modal__container">
                <div class="modal">
                    <div class="modal__form__container">
                        <form action="" method="POST" class="form setup_form" enctype="multipart/form-data">
                            <input type="hidden" name="basic_info" value="1" />

                            <div class="main-header" style="display: block;padding: 20px;">
                                <h1>Let's finish setting up your profile</h1>
                            </div>
                            <div class="form__step__container">

                                <div class="form__step">
                                    <p style="text-align: left;padding: 0 20px;text-align: left;font-size: 20px;">
                                        Welcome/Introduction</p>
                                    <p style="padding: 0 20px;text-align: left;">The entire team of [name of the
                                        company] is thrilled to welcome you on board. We hope you’ll do some amazing
                                        works here!</p>

                                </div>
                                <div class="form__step">
                                    <h3>Profile Picture</h3>

                                    <div class="profile-pic-wrapper">
                                            <div class="pic-holder">
                                              <!-- uploaded pic shown here -->
                                              <img id="profilePic" class="pic" src="<?php echo $_SESSION['user_photo']; ?>">
                                          
                                              <label for="newProfilePhoto" class="upload-file-block">
                                                <div class="text-center">
                                                  <div class="mb-2">
                                                    <i class="fa fa-camera fa-2x"></i>
                                                  </div>
                                                  <div class="text-uppercase">
                                                    Update <br /> Profile Photo
                                                  </div>
                                                </div>
                                              </label>
                                              <input class="uploadProfileInput" type="file" name="image" id="newProfilePhoto" accept="image/*" style="display: none;" />
                                            </div>
                                          
                                            </hr>
                                            <p class="text-info text-center small">Note: Selected image will not be uploaded anywhere. </br> It's just for demonstration purposes.</p>
                                          </div>
                                    
                                    
                                </div>

                                <div class="form__step">
                                    <h3>Step 3</h3>
                                    
                                        <input type="text" value="<?php echo $row['username'];?>" name="name" id="name" placeholder="Full Name" required/>
                                        <input type="text" value="<?php echo $row['email'];?>" name="email" id="email" placeholder="Email" required>
                                        <input type="text" value="<?php echo $row['birth'];?>" name="birth" id="datepicker" class="date" readonly="readonly" placeholder="Date" required>

                                        <?php 
                                        if (empty($row['refer'])) {
                                            echo '<input type="text" name="refer" placeholder="Refferal Code"/>';
                                        }
                                        ?>
                                        <input type="submit" placeholder="Submit"/>
                                </div>

                                <div class="form__step">
                                    <h3>Step 4</h3>
                                    <h4>Thank you!</h4>
                                    <a href="#" class="btn btn--cta">Back to browsing</a>
                                </div>

                                <div class="form__step">
                                    <h3>Step 5</h3>
                                    <h4>Thank you!</h4>
                                    <a href="#" class="btn btn--cta">Back to browsing</a>

                                </div>

                            </div>
                            <div class="form__bullet__container">
                                <div class="form__bullet form__bullet--active"></div>
                                <div class="form__bullet"></div>
                                <div class="form__bullet"></div>
                                <div class="form__bullet"></div>
                                <div class="form__bullet"></div>
                            </div>
                            <div class="form__nav">
                                <a href="#" class="form__nav__prev">Back</a>
                                <a href="#" class="form__nav__next">Next</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php } else { ?>

        <div class="responsive-wrapper">
            <div class="main-header">
                <h1>Settings</h1>
            </div>
            <div class="horizontal-tabs c-tabs" data-toggle="c-tabs" role="navigation">
                <ul class="c-tab--navigation">
                    <a href="#test1" class="active">My details</a>
                    
                    <a href="#test2">Profile</a>

                    <a href="#test3">Privacy</a>
                    
                    <a href="#test4">API</a>

                    <a href="#test5">Settings</a>
                </ul>
            </div>
            <div class="c-tab--content-container">
                <div id="test1" class="c-tab--content active">

                    <div class="content-header">
                        <div class="content-header-intro">
                            <h2>Intergrations and connected apps</h2>
                            <p>Supercharge your workflow and connect the tool you use every day.</p>
                        </div>
                        <div class="content-header-actions">
                            <a href="#" class="button">
                                <i class="ph-faders-bold"></i>
                                <span>Filters</span>
                            </a>
                            <a href="#" class="button">
                                <i class="ph-plus-bold"></i>
                                <span>Request integration</span>
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-panel">
                            <div class="vertical-tabs">
                                <a href="#" class="active">View all</a>
                                <a href="#">Developer tools</a>
                                <a href="#">Communication</a>
                                <a href="#">Productivity</a>
                                <a href="#">Browser tools</a>
                                <a href="#">Marketplace</a>
                            </div>
                        </div>
                        <div class="content-main">
                            <div class="card-grid">
                                Content
                                
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div id="test2" class="c-tab--content">
                Test2
                    <form action="" method="POST" >
                        <input type="hidden" name="btn_delete" value="1">
                        <input type="password" name="pw_1">
                        <input type="password" name="pw_2">
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div id="test3" class="c-tab--content">Test 3</div>
                <div id="test4" class="c-tab--content" style="height: calc(100vh - 10em);overflow: scroll;">
                        <nav>

                                <ul>
                                <li><a href="#intro">Intro</a></li>
                                    <li>
                                        <a href="#first">First section</a>
                                        <ul>
                                            <li>
                                      <a href="#second">Second section</a>
                                      <ul>
                                        <li>
                                          <a href="#third">Third section</a>
                                        </li>
                                      </ul>
                                    </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#fourth">Fourth section</a>
                                  <ul>
                                    <li><a href="#fifth">Fifth section</a></li>
                                    <li><a href="#sixth">Sixth section</a></li>
                                  </ul>
                                    </li>
                                <li><a href="#seventh">Seventh section</a></li>
                                <li><a href="#eighth">Eighth section</a></li>
                                </ul>
                              
                              <svg xmlns="http://www.w3.org/2000/svg">
                                <path />
                              </svg>
                              
                            </nav>
                            
                            <article id="top">
                              
                              <div class="subheading">An intersectionObserver approach to</div>
                              <h1>Emir's Progress Nav Concept</h1>
                              
                              <section id="intro">
                                <h2>Intro</h2>
                                <p>

                                The Bot API is an <a href="#">HTTP-based interface</a> created for developers keen on building bots for Telegram.
                                To learn how to create and set up a <code>bot</code>, please consult our Introduction to Bots and Bot FAQ.
                                </br></br>
                                All queries to the Telegram Bot API must be served over HTTPS and need to be presented in this form: <code>https://api.telegram.org/bot</code>/METHOD_NAME. Like this for example:
                                
                                
                                </p></br>

                                <code><?php echo BASE_URL; ?>home/_api/index.php/login/{Nickname}:{Password}</code>
                                </br></br>
                                <code>https://api.emiraliev.com/login/{Nickname}:{Password}</code>
                                </br></br>

                                <h2>base_info</h2>
                                <table class="rwd-table">
                                    <tr>
                                        <th>Column ID</th>
                                        <th>Description</th>
                                    </tr>
                                    <tr>
                                        <td data-th="Column ID">0</td>
                                        <td data-th="Description">This is main URL</td>
                                    </tr>
                                    <tr>
                                        <td data-th="Column ID">1</td>
                                        <td data-th="Description">LOGO URL</td>
                                    </tr>
                                    <tr>
                                        <td data-th="Column ID">2</td>
                                        <td data-th="Description">Core CSS file</td>
                                    </tr>
                                    <tr>
                                        <td data-th="Column ID">3</td>
                                        <td data-th="Description">Core JS File</td>
                                    </tr>
                                </table>
                              </section>
                              
                              <section id="first">
                                <h2>First section</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nisi nisl, pharetra et odio non, sollicitudin bibendum enim. Integer posuere, est et posuere feugiat, nisi nunc auctor nisi, eu tristique ipsum justo ut tellus. Phasellus molestie ultricies sodales. Nunc nec ligula placerat, vehicula orci a, tincidunt ante. Donec ac metus quis nunc cursus tincidunt.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                              </section>
                              
                              <section id="second">
                                <h2>Second section</h2>
                                <p>Phasellus congue felis quis arcu dignissim, pulvinar mollis ante pretium. Sed ac auctor quam. Mauris ac tellus et quam porta mattis quis quis quam. Sed tristique gravida mauris, eget eleifend nunc accumsan in.</p>
                                <p>Donec consequat fringilla diam, sit amet aliquam magna faucibus vel. Sed sagittis id nisi et facilisis. Aliquam erat volutpat. Mauris arcu nunc, euismod at enim at, porttitor laoreet lorem. In molestie dui at augue aliquet, in tincidunt nisi dictum. Donec sagittis enim vestibulum est elementum, vel lobortis libero suscipit.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                              </section>
                              
                              <section id="third">
                                <h2>Third section</h2>
                                <p>Etiam id ex dolor. Curabitur quis tellus vitae neque finibus suscipit. Donec vel nisl ac justo mattis molestie. Vivamus in interdum est. Fusce sed malesuada tellus. Suspendisse imperdiet condimentum sem in tristique. Donec faucibus dui non pharetra cursus. Praesent congue turpis leo, vitae porttitor elit fringilla vel. Phasellus ut aliquet augue. Donec egestas luctus placerat.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nisi nisl, pharetra et odio non, sollicitudin bibendum enim. Integer posuere, est et posuere feugiat, nisi nunc auctor nisi, eu tristique ipsum justo ut tellus. Phasellus molestie ultricies sodales. Nunc nec ligula placerat, vehicula orci a, tincidunt ante. Donec ac metus quis nunc cursus tincidunt.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              </section>
                              
                              <section id="fourth">
                                <h2>Fourth section</h2>
                                <p>Aenean purus ex, auctor id dictum in, consequat ac lacus. Fusce aliquam tellus sed ante porttitor eleifend. Nam rutrum vulputate arcu sed euismod. Fusce diam nunc, cursus eget leo eget, interdum tempus arcu. Maecenas vestibulum faucibus dolor non fermentum. Donec tortor dui, aliquet vitae mauris id, condimentum eleifend felis.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              </section>
                              
                              <section id="fifth">
                                <h2>Fifth section</h2>
                                <p>Vivamus in elit non turpis eleifend egestas eget scelerisque turpis. Integer semper eget sem vel porttitor. Phasellus nec rhoncus elit. Donec feugiat mollis dui ac vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                                <p>Fusce quis rutrum turpis. Proin pulvinar, nisi id porttitor laoreet, neque diam finibus eros, a aliquam nibh libero quis nisi. Morbi vehicula tincidunt maximus.</p>
                              </section>
                              
                              <section id="sixth">
                                <h2>Sixth section</h2>
                                <p>Etiam id ex dolor. Curabitur quis tellus vitae neque finibus suscipit. Donec vel nisl ac justo mattis molestie. Vivamus in interdum est. Fusce sed malesuada tellus. Suspendisse imperdiet condimentum sem in tristique. Donec faucibus dui non pharetra cursus. Praesent congue turpis leo, vitae porttitor elit fringilla vel. Phasellus ut aliquet augue. Donec egestas luctus placerat.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nisi nisl, pharetra et odio non, sollicitudin bibendum enim. Integer posuere, est et posuere feugiat, nisi nunc auctor nisi, eu tristique ipsum justo ut tellus. Phasellus molestie ultricies sodales. Nunc nec ligula placerat, vehicula orci a, tincidunt ante. Donec ac metus quis nunc cursus tincidunt.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              </section>
                              
                              <section id="seventh">
                                <h2>Seventh section</h2>
                                <p>Aenean purus ex, auctor id dictum in, consequat ac lacus. Fusce aliquam tellus sed ante porttitor eleifend. Nam rutrum vulputate arcu sed euismod. Fusce diam nunc, cursus eget leo eget, interdum tempus arcu. Maecenas vestibulum faucibus dolor non fermentum. Donec tortor dui, aliquet vitae mauris id, condimentum eleifend felis.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              <p>Vivamus sed ullamcorper ex. Suspendisse potenti. Nam sodales hendrerit enim, non fringilla mauris gravida maximus. Sed pharetra purus eget quam auctor luctus. Aenean arcu nulla, aliquam ut consectetur non, tincidunt eget sem. Aliquam tristique mattis urna, a posuere justo dapibus nec. Aenean non lacinia nisl. Aenean ac bibendum eros. Integer posuere enim tempor auctor venenatis. Etiam convallis nunc at eros ultrices, et elementum erat ultrices.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                              </section>
                              
                              <section id="eighth">
                                <h2>Eighth section</h2>
                                <p>Vivamus in elit non turpis eleifend egestas eget scelerisque turpis. Integer semper eget sem vel porttitor. Phasellus nec rhoncus elit. Donec feugiat mollis dui ac vehicula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <p>In aliquam maximus dui, nec iaculis nunc gravida et. Cras dapibus porta est, sed finibus arcu viverra in. Vivamus volutpat placerat urna, non varius sapien tempor sit amet. Cras quis dictum enim. Vestibulum ac rhoncus diam, non venenatis dolor. Curabitur ut velit tincidunt, pulvinar dolor sit amet, tincidunt arcu. Integer at ipsum eu ex blandit consectetur.</p>
                                <p>Fusce quis rutrum turpis. Proin pulvinar, nisi id porttitor laoreet, neque diam finibus eros, a aliquam nibh libero quis nisi. Morbi vehicula tincidunt maximus.</p>
                              </section>
                              
                            </article>
                        
                
                </div>
            </div>
        </div>

        <?php } ?>
    </main>



    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='https://unpkg.com/phosphor-icons'></script>
    <?php 
    if ($setup && $rewriteURL) {
        echo "
        <script>
        let newUrlIS =  '".BASE_URL."' + 'home/setup';
        history.pushState({}, null, newUrlIS);
        </script>";
    } 
    ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    <script src="./script.js"></script>
</body>

</html>