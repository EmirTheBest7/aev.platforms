<?php 

include('../../../_inc/functions.php');

$con = connect();
session_start();
auth();

if($_SESSION['new_user']) { //NEW USER PROFILE SETUP
    $setup = false;
    $rewriteURL = true;
    $setup_done = false;
}


$profile_query = "SELECT * FROM users WHERE token_id = '".$_SESSION['token_id']."' and user_id= '".$_SESSION['user_id']."' ";// and id='".$id."'
$result = mysqli_query($con, $profile_query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);


if(isset($_POST['ch_profile']) && $_POST['ch_profile']==1) { 
    // Changing Basic Profile Info
    $fullname = $_POST['full_name'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $bio = $_POST['bio'];
    $photo = $_FILES['user_photo']['name'];


    //echo $fullname . $nickname . $email . $birth . $bio . $photo;
    $setup_done = true;

    
    if (!empty($fullname) && !empty($nickname) && !empty($email)) {
        // Check credentials - Must be checked on javascript
        if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE nickname = '$nickname' ")) > 0 && $nickname != $_SESSION['nickname'] || // Check nickname availibility
            mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ")) > 0 && $email != $_SESSION['email'] || // Check email availibility
            strlen($fullname) <= 4 || strlen($nickname) <= 4 // Username|Nickname.len() < 4 
            ) {
            $msg = "Error: Wrong Credentials Inserted";
        } else {
            /*Upload*/
            if (($photo!="")){
                // Where the file is going to be stored
                $target_dir = "../../_uploads/user_".$_SESSION['token_id']."/profile/";
                $file = $_FILES['user_photo']['name'];
                $path = pathinfo($file);
                $filename = random_str(16); //$path['filename']
                $ext = $path['extension'];
                $temp_name = $_FILES['user_photo']['tmp_name'];
                $path_filename_ext = $target_dir.$filename.".".$ext;
                 
                // Check if file already exists
                if (file_exists($path_filename_ext)) {
                    echo "Sorry, file already exists.";
                } else {
                    move_uploaded_file($temp_name,$path_filename_ext);
                    echo "Congratulations! File Uploaded Successfully.";
                }
            }
            /*/Upload*/

            $update="UPDATE users set username='".$fullname."', nickname='".$nickname."',
            email='".$email."', user_photo='".$filename.'.'.$ext."', bio='".$bio."'
            WHERE token_id = '".$_SESSION['token_id']."' and user_id='".$_SESSION['user_id']."'";
            
            mysqli_query($con, $update) or die(mysqli_error());

            header('Refresh: 3; URL='.BASE_URL.'home/dashboard/?action=logout');
        }
    }
}


if(isset($_POST['ch_pwd']) && $_POST['ch_pwd']==1) { 
    // Changing Password
    $old_pw = $_POST['old_pwd'];
    $new_pw = $_POST['new_pwd1'];
    $rep_pw = $_POST['new_pwd2'];

    if (md5($old_pw) === $row['password']) {
        if (!empty($new_pw) && ($new_pw === $rep_pw)) {
            $update="UPDATE users set password='".md5($new_pw)."' WHERE token_id = '".$_SESSION['token_id']."' and user_id='".$_SESSION['user_id']."'";
            mysqli_query($con, $update) or die(mysqli_error());
            $msg = "Status: Password updated successfully!";
        } else {
            $msg = "Status: Password is not equal. Try again!";
        }
    } else {
        $msg = "Status: Old Password is incorrect. Try again!";
    }
}

if(isset($_POST['del_acc']) && $_POST['del_acc']==1) { 
    // Delete Account
    $del_pwd1 = $_POST['del_pwd1'];
    $del_pwd2 = $_POST['del_pwd2'];

    if (!empty($del_pwd1) && !empty($del_pwd2) && md5($del_pwd1) === $row['password']) {
        if ($del_pwd1 === $del_pwd2) {
            echo "Deleted() -> Done";
        } else {
            echo "Password is incorrect!";
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
    <link rel="shortcut icon" type="image/x-icon" href="img/EAlogo.svg">

    <title>ΛΞV</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
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

    <main id="main">

        <?php if ($setup) { ?>

        <div class="loading-screen">
            <div class="loading-animation">
                <div id="container">
                    <svg id="hello-svg" data-name="hello" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 582 197">
                        <path class="path path-1" d="M208,338c38-16.67,73.74-45.72,97.33-66,21.33-18.33,32.67-35.67,37.33-52.67C347.12,203.12,344,192,332,192c-11,0-21,10.33-24.94,27.68-4.52,19.89-22.06,107.82-29.39,149,15.67-72.33,36.33-81.33,53.67-81.33,22.33,0,24.67,18.67,19.42,39-5.43,21.07-7.42,44.32,17.91,44.32,18,0,35.53-8.17,52.67-20,14-9.67,23-24,23-40,0-13.42-8-23.33-20.67-23.33s-24.33,12-24.33,33.33c0,27,16.33,48,44,48,25.67,0,47.67-19.67,62-44.67,13.61-23.74,30.67-64.67,33.33-92.67s-5.33-36-18.67-36-24.67,17.33-28.67,43.33S486,302,491.33,330s28,37.67,46,37.67,38.17-15.67,52-37c16.54-25.51,35.87-67.45,38.67-102,2-24.67-8.67-33.33-20-33.33-14.67,0-23.33,13.33-28,38-4.5,23.81-8,64-2,94,4.64,23.21,25.33,40.33,44.67,40.33s32.67-19,36.67-42.33" transform="translate(-199 -183)"/>
                        <path class="path path-2" d="M697.33,287.33C672,287.33,661.33,305,659,327c-2.81,26.54,10.33,41.67,29.67,41.67,22,0,34.54-20.78,36.67-40.67,2-18.67-7.39-39.13-28-40.67" transform="translate(-199 -183)"/>
                        <path class="path path-3" d="M714.8,295.12c12.11,12.26,43.53,9.55,56.53-5.79" transform="translate(-199 -183)"/>
                        <line class="path path-4" x1="561" y1="181.67" x2="561" y2="181.67"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="responsive-wrapper setup-wrapper">
            <div class="edit-modal__container">
                <div class="edit-modal">
                    <div class="edit-modal__form__container">
                        <?php if($setup_done != true) {  ?>
                        <form action="" method="POST" class="form setup_form" enctype="multipart/form-data">
                            <input type="hidden" name="ch_profile" value="1" />



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

                                    <div class="avatar-upload" style="margin-bottom: 20px;">
                                        <div class="avatar-edit">
                                            <input type="file" name="user_photo" id="imageUpload" onclick="avatar_check()"
                                                accept=".png, .jpg, .jpeg" />
                                            <label class="uil uil-pen" for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url(<?php echo $_SESSION['user_photo']; ?>);">
                                            </div>

                                        </div>
                                    </div>
                                    <p id="error1" style="display:none; color:#FF0000;">
                                    Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                    </p>
                                    <p id="error2" style="display:none; color:#FF0000;">
                                    Maximum File Size Limit is 1MB.
                                    </p>


                                </div>

                                <div class="form__step">
                                    <h3>Step 3</h3>

                                    <input type="text" value="<?php echo $row['username'];?>" name="fullname" id="name"
                                        placeholder="Full Name" required />
                                    <input type="text" value="<?php echo $row['email'];?>" name="email" id="email"
                                        placeholder="Email" onchange="checkAvailibility()" required>
                                    <input type="text" value="<?php echo $row['birth'];?>" name="birth" id="datepicker"
                                        class="date" readonly="readonly" placeholder="Date" required>

                                    <?php 
                                    if (empty($row['refer'])) {
                                        echo '<input type="text" name="refer" placeholder="Refferal Code (optional)"/>';
                                    }
                                    ?>
                                    <input type="submit" placeholder="Submit" />
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
                        <?php } else { ?>
                        <div class="main-header" style="display: block;padding: 20px;">
                            <h1 style="color: limegreen;">Congratulations!</h1>
                        </div>

                        <div class="form__step__container" style="display: grid;">

                            <div class="form__step">
                                <p style="font-size: 20px; display: grid;">
                                    Your profile is complete. Now you can fully interact with everyone on platform.</p>
                                <button onclick="window.location.href='<?php echo BASE_URL . 'home/dashboard/' ;?>'"
                                    class="btn btn-success">Let's go!</button>

                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <?php } else { ?>

        <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

        <div class="responsive-wrapper container setup-wrapper edit-wrapper">
            <nav class="c-tabs" data-toggle="c-tabs" role="navigation">
                <ul class="c-tab--navigation">
                    <li class="c-tab--item"><a href="#test1" class="active">Profile</a></li>
                    <li class="c-tab--item"><a href="#prefs">Preferences</a></li>
                    <li class="c-tab--item"><a href="#sec">Security</a></li>
                    <li class="c-tab--item"><a href="#privacy">Privacy</a></li>
                    <li class="c-tab--item"><a href="#api">API</a></li>
                    <li class="c-tab--item"><a href="#test3">Delete</a></li>
                    <li class="c-tab--item hide"><a href="#test4">Test 4</a></li>
                    <li class="c-tab--slider">
                        <div class="c-tab-indicator"></div>
                    </li>
                </ul>
            </nav>
            <div class="row">
                <div class="c-tab--content-container">
                    <div id="test1" class="c-tab--content active">
                        <?php if (isset($msg)) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="uil uil-label"></i>&nbsp;
                            <?php echo $msg; ?>
                        </div>
                        <?php } ?>
                        <form class="form-horizontal" role="form" name="form1" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="ch_profile" value="1" />
                            <!-- left column -->
                            <div class="col-md-3">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" name="user_photo" id="imageUpload" onclick="avatar_check()"
                                            accept=".png, .jpg, .jpeg" />
                                        <label class="uil uil-pen" for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            style="background-image: url(<?php echo $_SESSION['user_photo']; ?>);">
                                        </div>

                                    </div>
                                    <div class="avatar-name"><?php echo $_SESSION['username'] . verified($_SESSION['access']); ?></div>
                                    <div class="avatar-nick">@<?php echo $_SESSION['nickname']; ?></div>

                                    <p id="error1" style="display:none; color:#FF0000;">
                                    Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                                    </p>
                                    <p id="error2" style="display:none; color:#FF0000;">
                                    Maximum File Size Limit is 1MB.
                                    </p>
                                </div>
                                <!--
                                <div class="text-center">
                                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                                    <h6>Upload a different photo...</h6>

                                    <input type="file" class="form-control">
                                </div>-->
                            </div>

                            <!-- edit form column -->
                            <div class="col-md-9 personal-info">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Full name:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="full_name" minlength="4"
                                            value="<?php echo $row['username']; ?>" placeholder="Full Name (*required)"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Username:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="nickname" id="nickname" onchange="checkAvailibility()"
                                            value="<?php echo $row['nickname']; ?>" placeholder="Nickname (*required)" minlength="5" required>
                                        <span id="availability_nick"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="email" id="email" onchange="checkAvailibility()"
                                            value="<?php echo $row['email']; ?>" placeholder="Email (*required)" minlength="13" required>
                                        <span id="availability_email"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Birth:</label>
                                    <div class="col-lg-8">
                                        <input type="text" value="<?php echo $row['birth'];?>" name="birth"
                                            id="datepicker" class="date form-control" readonly="readonly"
                                            placeholder="Date">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Phone:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" placeholder="Phone" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Gender:</label>
                                    <div class="col-lg-8">
                                        <div class="ui-select">
                                            <select id="user_time_zone" class="form-control" disabled>
                                                <option value="Binary" selected>Non-Binary</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="wallmart">Wallmart bag</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Web:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" placeholder="My Web" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Bio:</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" type="text" name="bio"
                                            placeholder="Bio"><?php echo $row['bio']; ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-3 control-label"></label>
                                    <div class="col-lg-8">
                                        <input type="submit" value="Save Changes" class="ripple-button"
                                            onclick="document.forms['form1'].submit()">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                        <a href="<?php echo BASE_URL . "home/profile/"; ?>" style="right: 0;position: absolute;padding: 5.5px 15px;">View Profile</a>
                                        
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div id="prefs" class="c-tab--content">

                        <div class="security-block">
                            <h3>Appearance</h3>
                            <div class="line"></div>
                            <div class="theme-switch" onclick="theme_switch()">
                                <div class="theme-switch-header">
                                    <div class="theme-switcher">
                                        <input type="radio" id="dark-theme" name="themes" checked />
                                        <label for="dark-theme">
                                            <span>
                                                <i class="uil uil-moon"></i>&nbsp;Dark
                                            </span>
                                        </label>
                                        <input type="radio" id="light-theme" name="themes" />
                                        <label for="light-theme">
                                            <span>
                                                <i class="uil uil-brightness-low"></i>&nbsp;Light
                                            </span>
                                        </label>
                                        <input type="radio" id="black-theme" name="themes" />
                                        <label for="black-theme">
                                            <span>
                                                <i class="uil uil-bolt"></i>&nbsp;SE
                                            </span>
                                        </label>
                                        <span class="slider"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="security-block">
                            <h3>Notifications</h3>
                            <div class="line"></div>
                            
                            <div class="control-group">
                                <label class="control control--checkbox">First checkbox
                                    <input type="checkbox" disabled="disabled" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Second checkbox
                                    <input type="checkbox" disabled="disabled" />
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Disabled
                                    <input type="checkbox" disabled="disabled" />
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Disabled & checked
                                    <input type="checkbox" disabled="disabled" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>
                    <div id="privacy" class="c-tab--content">
                        <div class="security-block">
                            <h3>Manage Cookies</h3>
                            <div class="line"></div>
                            
                            <div class="control-group">
                                <label class="control control--checkbox">Strictly Necessary Cookies <i class="uil uil-info-circle"></i>
                                    <input type="checkbox" disabled="disabled" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Functional Cookies <i class="uil uil-info-circle"></i>
                                    <input type="checkbox"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Performance Cookies <i class="uil uil-info-circle"></i>
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                                <label class="control control--checkbox">Targeting Cookies <i class="uil uil-info-circle"></i>
                                    <input type="checkbox" />
                                    <div class="control__indicator"></div>
                                </label>
                                
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>

                    </div>
                    <div id="sec" class="c-tab--content">
                        

                        <div class="security-block">
                            <div class="security-manage" style="min-width: 100%; margin: 0;">
                                <div class="security-info">
                                    <p style="font-size: 20px;">Change Password</p>
                                    <p>Remember not to store your password in your email or cloud and don't share it with anyone</p>
                                </div>
                                <button onclick="pass_toggle()">Change Password</button>
                            </div>
                        </div>
                        
                        <form class="form-horizontal" role="form" name="chpwd" method="post" action=""
                            enctype="multipart/form-data" style="display: none;">
                            <input type="hidden" name="ch_pwd" value="1" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Current Password:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="old_pwd" type="password"
                                        placeholder="Current Password" minlength="8">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">New Password:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="new_pwd1" type="password"
                                        placeholder="New Password" minlength="8">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Repeat Password:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="new_pwd2" type="password"
                                        placeholder="Repeat Password" minlength="8">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"></label>
                                <div class="col-lg-8">
                                    <input type="submit" value="Change Password" class="btn btn-primary"
                                        onclick="document.forms['chpwd'].submit()">
                                    <span></span>
                                </div>
                            </div>

                        </form>

                        <div class="security-block">
                            <h3>Phone Numbers</h3>
                            <div class="line"></div>
                            <div class="security-manage" style="margin: 0;">
                                <img src="">
                                <div class="security-info">
                                    <p>+xxx xxx xxx x<?php echo substr( $_SESSION['phone'], -2 ); ?></p>
                                    <p>Keep your primary phone number up-to-date</p>
                                    <p style="color: orange;">Inavailable</p>
                                </div>
                                <button>Manage</button>
                            </div>
                        </div>

                        <div class="security-block">
                            <h3>2-step verification (2FA)</h3>
                            <div class="line"></div>
                            
                            <h4>Select your 2-step verification method</br>
                                Your 2-step verification method is valid across all your accounts</h4>
                            <span>Current</span>
                            <div class="security-manage">
                                <img src="">
                                <div class="security-info">
                                    <p>Authenticator</p>
                                    <p>Time-based one-time 6-digits codes</p>
                                    <p style="color: lime;">Secure</p>
                                </div>
                                <button>Select</button>
                            </div>

                            <span>Other Options</span>
                            <div class="security-manage">
                                <img src="">
                                <div class="security-info">
                                    <p>Text-message</p>
                                    <p>Phone number: +xxx xxx xxx x<?php echo substr( $_SESSION['phone'], -2 ); ?></p>
                                    <p style="color: lime;">Moderately secure</p>
                                </div>
                                <button>Select</button>
                            </div>
                        </div>

                    </div>
                    <div id="api" class="c-tab--content">
                        <div class="col-lg-12 text-right" style=" padding: 15px 0; ">
                            <input type="submit" value="Add new token" class="ripple-button" onclick="#" style="padding: 1px 5px;">
                            <span></span>
                            <input type="submit" class="ripple-button hide-api" value="View the entire token" style="padding: 1px 5px;">
                            
                        </div>
                        <div class="table-wrapper">
                            <table class="fl-table">
                                <thead>
                                    <tr>
                                        <th>Description:</th>
                                        <th>Token:</th>
                                        <th>Account:</th>
                                        <th>Type:</th>
                                        <th>Entered by:</th>
                                        <th>Valid from:</th>
                                        <th>Valid to:</th>
                                        <th>State:</th>
                                        <th>Action:</th>
                                    </tr>

                                    <tr class="table-api-form">
                                        <th colspan="2"><input placeholder="App Name" type="string"></th>
                                        <th colspan="2">
                                            <select value="Access">
                                                <option value="View">View Only</option>
                                                <option value="Edit">Edit Only</option>
                                            </select>
                                        </th>
                                        <th colspan="2" >
                                            <select placeholder="Valid (y)">
                                                <option value="30d">30 days</option>
                                                <option value="60d">60 days</option>
                                                <option value="6m">6 months</option>
                                                <option value="1y">1 year</option>
                                                <option value="2y">2 years</option>
                                            </select>
                                        </th>
                                        <th colspan="2">
                                            <select placeholder="State">
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                            </select>
                                        </th>
                                        <td><input type="submit" class="ripple-button" value="Submit" style="padding: 1px 5px; color: lime;"></td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                        $select_token = "SELECT * FROM api_keys WHERE api_user = '".$_SESSION['token_id']."'";
                                        $api_result = mysqli_query($con, $select_token) or die( mysqli_error());
                                        $api_row = mysqli_fetch_assoc($api_result);

                                        echo '

                                        <tr>
                                            <td>'.$api_row['api_desc'].'</td>
                                            <td class="api_token" type="text">'.$api_row['api_token'].'</td>
                                            <td>'.$_SESSION['nickname'].'</td>
                                            <td>'.$api_row['api_token'].'</td>
                                            <td>'.$_SESSION['username'].'</td>
                                            <td>03/18/2023</td>
                                            <td>03/18/2033</td>
                                            <td></td>
                                            <td><input type="submit" class="ripple-button" value="Delete" style="padding: 1px 5px; color: red;"></td>
                                        </tr>
                                        
                                        
                                        '; // echo if($state==1) ? 'Active' : 'Disabled').
                                        // INSERT INTO `api_keys` (`api_desc`, `api_user`, `api_token`, `api_access`, `api_vfrom`, `api_vto`, `api_state`) VALUES ('new_app', 'AbdCmkXqvPpScpQ4', '7hARQC9HV5xnGvTO', '1', '2023-04-27', '2023-04-28', '0');




                                    
                                    ?>

                                    <tr>
                                        <td>test_app</td>
                                        <td class="api_token" type="text">7hARQC9HV5xnGvTO</td>
                                        <td><?php echo $_SESSION['nickname']; ?></td>
                                        <td>View account only</td>
                                        <td><?php echo $_SESSION['username']; ?></td>
                                        <td>03/18/2023</td>
                                        <td>03/18/2033</td>
                                        <td>Active</td>
                                        <td><input type="submit" class="ripple-button" value="Delete" style="padding: 1px 5px; color: red;"></td>
                                    </tr>

                                    <tr>
                                        <td>Content 1</td>
                                        <td class="api_token" type="text">kDxQ7zlQ6pcprDo9</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Content 1</td>
                                        <td class="api_token" type="text">zCGEl6w10OKIZ4Hq</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                        <td>Content 1</td>
                                    </tr>
                                    
                                
                                <tbody>
                            </table>
                        </div>
                    </div>
                    <div id="test3" class="c-tab--content">
                        <form class="form-horizontal" role="form" name="chpwd" method="post" action="">
                            <input type="hidden" name="del_acc" value="1" />

                            <div class="form-group">
                                <p style="text-align: left;padding: 0 15px;color: white; font-weight: bold;">
                                    Hi, <?php echo $_SESSION['nickname'] .verified($_SESSION['access']); ?></br></br>

                                    We're sorry to hear you'd like to delete your account. If you want just a little break, you can <a href="#">temporarily disable</a> your account instead of deleting it.</br></br>


                                </p>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Why are you deleting your account?</label>
                                <div class="col-lg-8">
                                    <select class="form-control">
                                        <option value="Undefined">---</option>
                                        <option value="small-pp" selected>Because of small pp &#60;3 </option>
                                        <option value="unapropriate">Unapropriate content</option>
                                        <option value="privacy-friends">Data trust issues</option>
                                        <option value="no-friends">My friends are not there</option>
                                        <option value="cookies">I hate pancakes & cookies</option>
                                    </select>
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="del_pwd1" type="password"
                                        placeholder="Current Password" minlength="8">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Repeat Password:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="del_pwd2" type="password"
                                        placeholder="Just to be sure..." minlength="8">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"></label>
                                <div class="col-lg-8">
                                    <span></span>
                                    <div id="six" class="ripple-button del-button" style="color:red;">Delete </div>
                                </div>
                            </div>

                            <div id="modal-container">
                                    <div class="modal-background">
                                        <div class="modal">
                                            <h2>Are u sure?</h2>
                                            <p>This action will delete all the data about your profile & can't be undone.
                                                <br>Anyways, thank you for being with us and good luck... 
                                                <i class="uil uil-grin-tongue-wink"></i>
                                            </p>
                                            <input type="submit" value="Delete Account" class="ripple-button"
                                                                onclick="document.forms['del_acc'].submit()" style="z-index: 1;position: relative; color: red;">
                                            <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                preserveAspectRatio="none">
                                                <rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div id="test4" class="c-tab--content">Test 4</div>
                </div>

            </div>
        </div>

        



        <?php } ?>

    </main>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>


    <script src="./script.js"></script>
    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    


</body>

</html>