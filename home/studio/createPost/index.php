<?php 

include('../../../_inc/functions.php');
$con = connect();
session_start();
auth();


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

    <main id="main">

        <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

        <article class="social-article">
            <div class="social-left-col">
                <div class="file-upload upload-area">
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" name="user_photo" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                                <span class="upload-area-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 340.531 419.116" style="fill: blue;" width="36"
                                        height="36">
                                        <g id="files-new" clip-path="url(#clip-files-new)">
                                            <path id="Union_2" data-name="Union 2"
                                                d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z"
                                                transform="translate(2944 428)" fill="var(--c-action-primary)"></path>
                                        </g>
                                    </svg>
                                </span>
                            
                                <span class="upload-area-title">Drag file(s) here to upload.</span>
                                <span class="upload-area-description">
                                    Alternatively, you can select a file by <br><strong>clicking here</strong>
                                </span>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" id="img" src="#" alt="your image" />
                        <div class="image-title-wrap">
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-right-col">
                <div class="wrapper">
                    <div class="postContainer active">
                        <div class="body">
                            <div class="profile">
                                <img src="<?php echo $_SESSION['user_photo']; ?>" alt="Profile Picture"
                                    class="profilePicture">
                                <p class="details">
                                    <span class="profileName"><?php echo $_SESSION['username']; ?></span>
                                    <span class="privacy">
                                        <i class="uil uil-globe"></i>
                                        Public
                                        <i class="uil uil-angle-down"></i>
                                    </span>
                                </p>
                            </div>
                            <textarea rows="4" class="postContent" maxlength="140"
                                placeholder="What's on your mind, <?php echo strtok($_SESSION['username'], " "); ?>?"
                                autofocus></textarea>
                            <div class="actions">
                                <div class="helpers">
                                        <p style="margin: 3.5px;"><span class="count">0</span>/140</p>
                                <i class="uil uil-auto-flash theme" style="font-size: 25px; margin-left: 5px;"></i>
                                    <i class="uil uil-smile-beam emoji" style="font-size: 25px; margin-right: 5px;"></i>
                                </div>
                                <div class="addons">
                                    <p class="title">Add to Your Post</p>
                                    <div class="items">
                                        <i class="uil uil-image-plus item" style="color: lime;"></i>
                                        <i class="uil uil-at item" style="color: dodgerblue;"></i>
                                        <i class="uil uil-map-marker item" style="color: red;"></i>
                                        <i class="uil uil-ellipsis-h item"></i>
                                    </div>
                                </div>
                                

                                <!-- Pokro -->
                                <ul id="accordion" class="accordion">
                                    <li>
                                        <div class="link">Location <span><i class="uil uil-map-marker"></i></span></div>
                                        <ul class="submenu">
                                            <li class="space"><a><i class="uil uil-arrows-up-right"></i></a><input type="text" placeholder="Location" value="Prague" style="margin-right: 10px;background: transparent;color: white; border: 0;padding: 10px;"/></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="link">Advanced Options<i class="uil uil-angle-down"></i></div>
                                        <ul class="submenu">
                                            <li class="space"><a>Comments:</a> <input type="checkbox" id="switch" /><label for="switch">Toggle</label></li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="btn-div">
                                    <button class="btn postButton disabled">Post</button>
                                    
                                    <button type="button" onclick="removeUpload()" class="remove-image"><i class="uil uil-image-times"></i> <span
                                        class="image-title hide">Uploaded Image</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="privacyContainer">
                        <div class="body">
                            <div class="bodyHeader">
                                <button href="#" class="back btn" style="padding: 10px; margin: 10px 0 0 0; border-radius: 4px;line-height: 10px;">
                                    <i class="uil uil-angle-left-b"></i> Back
                                </button>
                                <p class="title">
                                    Who can see your post?
                                </p>
                                <p class="subTitle">
                                    Your post will show up in News Feed, on your profile and in search results.
                                </p>
                            </div>
                            <div class="audience">
                                <div class="item">
                                    <div class="icon">
                                        <i class="uil uil-users-alt"></i>
                                    </div>
                                    <div class="details">
                                        <p class="title">Public</p>
                                        <p class="subTitle">Anyone on or off ALIEV</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <i class="uil uil-user-check"></i>
                                    </div>
                                    <div class="details">
                                        <p class="title">Friends</p>
                                        <p class="subTitle">Your friends on ALIEV</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <i class="uil uil-user-exclamation"></i>
                                    </div>
                                    <div class="details">
                                        <p class="title">Specific friends</p>
                                        <p class="subTitle">Beta</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <i class="uil uil-lock"></i>
                                    </div>
                                    <div class="details">
                                        <p class="title">Only me</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="icon">
                                        <i class="uil uil-cog"></i>
                                    </div>
                                    <div class="details">
                                        <p class="title">Custom</p>
                                        <p class="subTitle">Include and exclude friends and lists</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </article>




    </main>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

        <!-- Load TensorFlow.js. This is required 
    <script src="./nsfw_js/ts.js" type="text/javascript"></script>
    <script src="./nsfw_js/nsfwjs.js" type="text/javascript"></script>-->

    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    <script src="./script.js"></script>


    <script>
        /*
        // Invoke preview when an image file is choosen.
        $(document).ready(function () {
            $('#imagefile').change(function () {
                preview(this);
            });
        });
        // Preview function
        function preview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $('#preview').attr('src', event.target.result);
                    $('#preview').css('display', 'initial');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Form Validation
        function validatePost() {
            var required = document.getElementsByClassName("required");
            var caption = document.getElementsByTagName("textarea")[0].value;
            required[0].style.display = "none";
            if (caption == "") {
                required[0].style.display = "initial";
                return false;
            }
            return true;
        }*/
    </script>


</body>

</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') { // Form is Posted
    // Assign Variables
    $caption = $_POST['createPost'];
    $public = "Y";

    /* Advanced {Studio} mode feature 
    if(isset($_POST['public'])) {
        $public = "Y";
    } else {
        $public = "N";
    }*/

    $author = $_SESSION['user_id'];
    $post_image = $_FILES['fileUpload']['name'];
    $valid_ext = array('png','jpeg','jpg');

    $token_id = random_str(16);
    $token_id = mysqli_real_escape_string($conn,$token_id);

    // Convert to format .jpg

    if (!empty($post_image)) { // && valid extension
        if ($_FILES["fileUpload"]["size"] > 2621440) { // = 2.5 MB *1024 *1024
            // compression {JS}

            echo "File is > 2.5 MB";

            // image as new image with variable 
            // $image = $CompressedImage
        }
        
        $target_file = "../_uploads/user_".$_SESSION['token_id']."/posts/";
        $extension=end(explode(".", $post_image));

        // Upload image alghoritm to user session['token'] uploads folder

        if (move_uploaded_file($post_image, $target_file . $token_id . "." . $extension)) {
            $post_image = $token_id . "." . $extension;
            //echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo $target_file . $token_id . "." . $extension;
            $post_image = $token_id . "." . $extension;
        }
        
    } else {
        $post_image = NULL;
    }
    
    // Apply Insertion Query


    $sql = "INSERT INTO tl_posts (post_caption, post_time, post_public, post_by, token, likes)
           VALUES ('$caption', NOW(), '$public', $author, '$token_id', 0)";
    
    echo $sql; // Testing mode


    /*  Disable for inserting into DB
    $query = mysqli_query($conn, $sql);
    // Action on Successful Query
    if($query){
        // Upload Post Image If a file was choosen
        if (!empty($_FILES['fileUpload']['name'])) {
            echo 'FUUUQ';
            // Retrieve Post ID
            $last_id = mysqli_insert_id($conn);
            include 'functions/upload.php';
        }
        header("location: home.php");
    }



$photo = $_FILES['user_photo']['name'];
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
        //move_uploaded_file($temp_name,$path_filename_ext);
        echo $path_filename_ext;
        echo "Congratulations! File Uploaded Successfully.";
    }
}
    */
}
?>