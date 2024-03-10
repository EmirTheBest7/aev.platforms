<?php 
require '../../_inc/functions.php';


$conn = connect();
session_start();
auth();
logout();

ob_start(); 


$sel_query="Select * from users where user_id= '".$_SESSION['user_id']."' ;";
$row_names = mysqli_query($conn,$sel_query);

if (isset($_POST['liked'])) {
    $post_id = $_POST['post_id'];
    $result = mysqli_query($conn, "SELECT * FROM tl_posts WHERE post_id=$post_id");
    $row = mysqli_fetch_array($result);
    $n = $row['likes'];

    mysqli_query($conn, "INSERT INTO tl_likes (user_id, post_id) VALUES (".$_SESSION['user_id'].", $post_id)"); 
    mysqli_query($conn, "UPDATE tl_posts SET likes=$n+1 WHERE post_id=$post_id");

    echo $n+1;
    exit();
}
if (isset($_POST['unliked'])) {
    $post_id = $_POST['post_id'];
    $result = mysqli_query($conn, "SELECT * FROM tl_posts WHERE post_id=$post_id");
    $row = mysqli_fetch_array($result);
    $n = $row['likes'];

    mysqli_query($conn, "DELETE FROM tl_likes WHERE post_id=$post_id AND user_id=".$_SESSION['user_id']."  ");
    mysqli_query($conn, "UPDATE tl_posts SET likes=$n-1 WHERE post_id=$post_id");
    
    echo $n-1;
    exit();
}


// Load More
if (isset($_POST['row'])) {
    $row = $_POST['row'];
    $rowperpage = 5;

    $sql = "SELECT tl_posts.post_caption, tl_posts.post_time, tl_posts.post_public, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id, tl_posts.post_id, tl_posts.likes, tl_posts.token
                FROM tl_posts
                JOIN users
                ON tl_posts.post_by = users.user_id
                WHERE tl_posts.post_public = 'Y' OR users.user_id = {$_SESSION['user_id']}
                UNION
                SELECT tl_posts.post_caption, tl_posts.post_time, tl_posts.post_public, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id, tl_posts.post_id, tl_posts.likes, tl_posts.token
                FROM tl_posts
                JOIN users
                ON tl_posts.post_by = users.user_id
                JOIN (
                    SELECT tl_friendship.user1_id AS user_id
                    FROM tl_friendship
                    WHERE tl_friendship.user2_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
                    UNION
                    SELECT tl_friendship.user2_id AS user_id
                    FROM tl_friendship
                    WHERE tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
                ) userfriends
                ON userfriends.user_id = tl_posts.post_by
                WHERE tl_posts.post_public = 'N' limit ".$row.",".$rowperpage;

    // selecting posts
    //$result = mysqli_query($conn,'SELECT * FROM tl_posts limit '.$row.','.$rowperpage);
    $result = mysqli_query($conn,$sql);


    // Likes unavailable!!! Only first 3 works

    while($row = mysqli_fetch_array($result)){
        if (!empty($row["user_photo"])) {
            $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"];
        } else {
            $user_profile = BASE_URL . "_assets/images/avatar.png";
        }
        echo '

        <article class="post">
                <div class="post__header hide">
                    <div class="post__profile">
                        <a href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank" class="post__avatar">
                            <img src="'.$user_profile.'" alt="User Picture">
                        </a>
                        <a href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank" class="post__user">'.ucwords($row['username']).verified($row['access']).'</a>
                    </div>

                    <button class="post__more-options"><i class="uil uil-ellipsis-v"></i></button>
                </div>

                <div class="post__content">
                    <div class="nft-card--header">
                        <div class="nft-user">
                            <img src="'.$user_profile.'">
                            '.ucwords($row['username']).verified($row['access']).'
                            <span>@'.$row['nickname'].'</span>
                        </div>
                    </div>
                    <div class="nft-action">
                        <span>35 <i class="uil uil-comment"></i></span>
                        <span>'.$row['likes'].'&nbsp;<i class="uil uil-heart"></i></span>
                    </div>
                    <div class="post__medias">
                        <img class="post__media" src="assets/4P4W.png" alt="Post Content">
                    </div>
                </div>

                <div class="post__footer">
                    <div class="post__buttons">
                        <button class="post__button">';

                    // determine if user has already liked this post
                    $results = mysqli_query($conn, "SELECT * FROM tl_likes WHERE user_id=".$_SESSION['user_id']." AND post_id=".$row['post_id']."");

                    if (mysqli_num_rows($results) == 1) {
                        echo ' 
                        <!-- user already likes post -->
                        <div class="row-b">
                            <div class="icon-div">
                                <i class="unlike uil uil-heart" style="color: red!important;" data-id="'.$row['post_id'].'"></i> 
                                <i class="like hide uil uil-heart" style="color: white!important;" data-id="'.$row['post_id'].'"></i> 
                            </div>';
                    } else {
                        echo '
                        <!-- user has not yet liked post -->
                        <div class="row-b">
                            <div class="icon-div">
                                <i class="like uil uil-heart" style="color: white!important;" data-id="'.$row['post_id'].'"></i> 
                                <i class="unlike hide uil uil-heart" style="color: red!important;" data-id="'.$row['post_id'].'"></i> 
                            </div>';
                    }



                echo '
                        </button>
                        <button class="post__button" onclick="window.location=\' '.BASE_URL.'home/timeline/p/?token='.$row['token'].' \';" ><i class="uil uil-comment"></i></button>
                        <button class="post__button"><i class="uil uil-upload"></i></button>

                        <div class="post__indicators"></div>

                        <button class="post__button post__button--align-right"><i class="uil uil-bookmark"></i></button>
                    </div>

                    <div class="post__infos">
                        <div class="post__likes hide">
                            <a href="#" class="post__likes-avatar">
                                <img src="'.BASE_URL.'_assets/images/avatar.png" alt="User Picture">
                            </a>

                            <span>Liked by <span class="likes_count">'.$row['likes'].'</span> '.($row['likes'] == 1 ? "user" : "users").'</a></span>
                        </div>

                        <div class="post__description">
                            <span>
                                <a class="post__name--underline" href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank">' . ucwords($row['username']) . '</a>
                                ' . $row['post_caption'] . '
                            </span>
                        </div>

                        <span class="hide time timeago post__date-time" data-date="' . $row['post_time'] . '">' . $row['post_time'] . '</span>
                    </div>
                </div>
            </article>';
    
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ΛΞV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1">
    <?php echo file_get_contents(BASE_URL . "_assets/icon/");  ?>

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/header.css" ?>">

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" defer></script>

    <script>
        var js_username='<?php echo $_SESSION['username'];?>';

        function calcTimeAgo() {
                $('.timeago').each(function () {
                    var timeAgo = $.timeago($(this).attr('data-date'));
                    $(this).text(timeAgo);
                    $(this).removeClass('timeago');
                });
            }
    
    </script>

    <style>
		main {
			position: relative;
		}

		canvas {
			position: fixed!important;
            z-index: 0;
        }
        
        .Navbar-icons{
            height: unset!important;
        }
    </style>
</head>

<body>

    <?php file_get_module('./header.php'); ?>

    <main class="main-container" id="main">
        <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

        <section class="content-container">
        
            <div class="content">
                

                <div class="stories">
                    <button class="stories__left-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="var(--primary)" d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z"></path>
                        </svg>
                    </button>
                    <div class="stories__content">

                        <div class="dailies hide"> <!-- Add Dailies -->
                            <div class="dailies-card-container" style="background: transparent;border-radius: 16px;border: 5px solid white;">
                                <div class="author-container">
                                    <div class="logo-container"></div>
                                </div>

                                <div class="card-headline-container"></div>
                            </div>
                        </div>

                        <div class="dailies">
                            <div class="dailies-card-container">
                                <div class="background-cards">
                                <div class="background-card-1"></div>
                                <div class="background-card-2"></div>
                                </div>
                                <img src="./assets/punk.jpg" class="dailies-card-img" alt="A cat">
                                <div class="author-container">
                                <div class="logo-container">
                                    <img class="dailies-card-logo" src="<?php echo $_SESSION['user_photo']; ?>"
                                    alt="Publisher logo">
                                </div>
                                <span class="dailies-card-subtitle"> <?php echo $_SESSION['username']; ?> </span>
                                </div>

                                <div class="card-headline-container">
                                <span class="dailies-card-headline"> Dailies </span>
                                </div>
                            </div>
                        </div>

                        <div class="dailies">
                            <div class="dailies-card-container">
                                <div class="background-cards">
                                <div class="background-card-1"></div>
                                <div class="background-card-2"></div>
                                </div>
                                <img src="./assets/punk2.jpeg" class="dailies-card-img" alt="A cat">
                                <div class="author-container">
                                <div class="logo-container">
                                    <img class="dailies-card-logo" src="<?php echo $_SESSION['user_photo']; ?>"
                                    alt="Publisher logo">
                                </div>
                                <span class="dailies-card-subtitle"> <?php echo $_SESSION['username']; ?> </span>
                                </div>

                                <div class="card-headline-container">
                                <span class="dailies-card-headline"> Dailies </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="stories__right-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="var(--primary)" d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm113.9 231L234.4 103.5c-9.4-9.4-24.6-9.4-33.9 0l-17 17c-9.4 9.4-9.4 24.6 0 33.9L285.1 256 183.5 357.6c-9.4 9.4-9.4 24.6 0 33.9l17 17c9.4 9.4 24.6 9.4 33.9 0L369.9 273c9.4-9.4 9.4-24.6 0-34z"></path>
                        </svg>
                    </button>
                </div>



                <div class="posts">

                <?php
        // Public Posts Union Friends' Private Posts

        // Load More
        $rowperpage = 3;

        // counting total number of posts
        $allcount_query = "SELECT count(*) as allcount FROM tl_posts";
        $allcount_result = mysqli_query($conn,$allcount_query);
        $allcount_fetch = mysqli_fetch_array($allcount_result);
        $allcount = $allcount_fetch['allcount'];
        // -Load More 


        $sql = "SELECT tl_posts.post_caption, tl_posts.post_time, tl_posts.post_public, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id, tl_posts.post_id, tl_posts.likes, tl_posts.token
                FROM tl_posts
                JOIN users
                ON tl_posts.post_by = users.user_id
                WHERE tl_posts.post_public = 'Y' OR users.user_id = {$_SESSION['user_id']}
                UNION
                SELECT tl_posts.post_caption, tl_posts.post_time, tl_posts.post_public, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id, tl_posts.post_id, tl_posts.likes, tl_posts.token
                FROM tl_posts
                JOIN users
                ON tl_posts.post_by = users.user_id
                JOIN (
                    SELECT tl_friendship.user1_id AS user_id
                    FROM tl_friendship
                    WHERE tl_friendship.user2_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
                    UNION
                    SELECT tl_friendship.user2_id AS user_id
                    FROM tl_friendship
                    WHERE tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
                ) userfriends
                ON userfriends.user_id = tl_posts.post_by
                WHERE tl_posts.post_public = 'N'
                ORDER BY post_id asc limit 0,$rowperpage"; //ORDER BY post_time DESC
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo mysqli_error($conn);
        }
        if (mysqli_num_rows($query) == 0) {
            echo '<div class="post">';
            echo 'There are no posts yet to show.';
            echo '</div>';
        } else {
            while ($row = mysqli_fetch_assoc($query)) {
                if (!empty($row["user_photo"])) {
                    $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"];
                } else {
                    $user_profile = BASE_URL . "_assets/images/avatar.png";
                }
                echo '

                <article class="post">
                        <div class="post__header hide">
                            <div class="post__profile">
                                <a href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank" class="post__avatar">
                                    <img src="'.$user_profile.'" alt="User Picture">
                                </a>
                                <a href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank" class="post__user">'.ucwords($row['username']).verified($row['access']).'</a>
                            </div>

                            <button class="post__more-options"><i class="uil uil-ellipsis-v"></i></button>
                        </div>

                        <div class="post__content">
                            <div class="nft-card--header">
                                <div class="nft-user">
                                    <img src="'.$user_profile.'">
                                    '.ucwords($row['username']).verified($row['access']).'
                                    <span>@'.$row['nickname'].'</span>
                                </div>
                            </div>
                            <div class="nft-action">
                                <span>35 <i class="uil uil-comment"></i></span>
                                <span>'.$row['likes'].'&nbsp;<i class="uil uil-heart"></i></span>
                            </div>
                            <div class="post__medias">
                                <img class="post__media" src="assets/4P4W.png" alt="Post Content">
                            </div>
                            <div class="nft-badge">
                                <span class="badge">
                                    <i class="uil uil-heart" style="color:red!important;"></i>
                                    <i class="uil uil-comment"></i>
                                    <i class="uil uil-upload"></i>
                                    <span class="marquee">"Hello World!"</span>
                                    <i class="uil uil-bookmark"></i>
                            
                                </span>
                            </div>
                        </div>

                        <div class="post__footer hide">
                            <div class="post__buttons hide">
                                <button class="post__button">';
                                // determine if user has already liked this post
                                $results = mysqli_query($conn, "SELECT * FROM tl_likes WHERE user_id=".$_SESSION['user_id']." AND post_id=".$row['post_id']."");

                                if (mysqli_num_rows($results) == 1) {
                                    echo ' 
                                    <!-- user already likes post -->
                                    <div class="row-b">
                                        <div class="icon-div">
                                            <i class="unlike uil uil-heart" style="color: red!important;" data-id="'.$row['post_id'].'"></i> 
                                            <i class="like hide uil uil-heart" style="color: white!important;" data-id="'.$row['post_id'].'"></i> 
                                        </div>';
                                } else {
                                    echo '
                                    <!-- user has not yet liked post -->
                                    <div class="row-b">
                                        <div class="icon-div">
                                            <i class="like uil uil-heart" style="color: white!important;" data-id="'.$row['post_id'].'"></i> 
                                            <i class="unlike hide uil uil-heart" style="color: red!important;" data-id="'.$row['post_id'].'"></i> 
                                        </div>';
                                }



                        echo '
                                </button>
                                <button class="post__button" onclick="window.location=\' '.BASE_URL.'home/timeline/p/?token='.$row['token'].' \';" ><i class="uil uil-comment"></i></button>
                                <button class="post__button"><i class="uil uil-upload"></i></button>

                                <div class="post__indicators"></div>

                                <button class="post__button post__button--align-right"><i class="uil uil-bookmark"></i></button>
                            </div>

                            <div class="post__infos">
                                <div class="post__likes hide">
                                    <a href="#" class="post__likes-avatar">
                                        <img src="'.BASE_URL.'_assets/images/avatar.png" alt="User Picture">
                                    </a>

                                    <span>Liked by <span class="likes_count">'.$row['likes'].'</span> '.($row['likes'] == 1 ? "user" : "users").'</a></span>
                                </div>

                                <div class="post__description">
                                    <span>
                                        <a class="post__name--underline" href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank">' . ucwords($row['username']) . '</a>
                                        ' . $row['post_caption'] . '
                                    </span>
                                </div>

                                <span class="hide time timeago post__date-time" data-date="' . $row['post_time'] . '">' . $row['post_time'] . '</span>
                            </div>
                        </div>
                    </article>';
            }
        }
        ?>

                
                    
                    
                </div>
                <button class="load-more" style="width: 100px;margin: 15px auto;border: 1px solid white;padding: 10px 0;background: black;color: white;font-weight: 900;">Load More</button>
                <input type="hidden" id="row" value="0">
                <input type="hidden" id="all" value="<?php echo $allcount; ?>">
                
                
            </div>

            <section class="side-menu">
                <div class="side-menu__user-profile">
                    <a href="<?php echo BASE_URL . "home/profile/?nickname=" . strtolower($_SESSION['nickname']); ?>" target="_blank" class="side-menu__user-avatar">

                        <img src="<?php echo $_SESSION['user_photo']; ?>" alt="User Picture">
                    </a>
                    <div class="side-menu__user-info">
                        <a href="<?php echo BASE_URL . "home/profile/?nickname=" . strtolower($_SESSION['nickname']); ?>" target="_blank"><?php echo $_SESSION['nickname'] . verified($_SESSION['access']); ?></a>
                        <span><?php echo $_SESSION['username']; ?></span>
                    </div>
                    <a class="side-menu__user-button" href="<?php echo BASE_URL . "home/profile/?nickname=" . strtolower($_SESSION['nickname']); ?>">View</a>
                </div>

                <div class="side-menu__suggestions-section">
                    <div class="side-menu__suggestions-header">
                        <h2>Suggestions for You</h2>
                        <button onclick="window.location.href='<?php echo BASE_URL . 'home/timeline/search/' ?>'">Search</button>
                    </div>
                    <div class="side-menu__suggestions-content">
                    <?php
                    $sel_rand_users="SELECT * FROM users order by RAND() LIMIT 5";
                    $rand_users = mysqli_query($conn,$sel_rand_users);
                    while($row_user = mysqli_fetch_assoc($rand_users)) { 
                        if (!empty($row_user["user_photo"])) {
                            $user_profile = BASE_URL . "home/_uploads/user_".$row_user["token_id"]. "/profile/" .$row_user["user_photo"];
                        } else {
                            $user_profile = BASE_URL . "_assets/images/avatar.png";
                        }
                    ?>
                        <div class="side-menu__suggestion">
                            <a class="side-menu__suggestion-avatar">
                                <img src="<?php echo $user_profile; ?>" alt="User Picture">
                            </a>
                            <div class="side-menu__suggestion-info">
                                <a><?php echo $row_user["nickname"] .verified($row_user['access']); ?></a>
                                <span><?php echo $row_user["username"]; ?></span>
                            </div>
                            <a href="<?php echo BASE_URL . "home/profile/?nickname=" . strtolower($row_user["nickname"]); ?>" class="side-menu__suggestion-button">Follow</a>
                        </div>
                    
                    <?php } ?>
                    </div>
                </div>

                <div class="side-menu__footer try-premium">
                    
                    <div>
                        <i class="uil uil-rocket"></i>
                        <h4>Premium</h4>
                        <p>The best Λ L I Ξ V experience, with new features.</p>
                    </div>
                    <button class="try-premium-btn">Coming Soon!</button>
                </div>

                <div class="side-menu__footer">
                    <div class="side-menu__footer-links">
                        <ul class="side-menu__footer-list">
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">About</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Help</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Press</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="<?php echo BASE_URL . "home/_api/"; ?>">API</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Jobs</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Privacy</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Terms</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Locations</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Top Accounts</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Hashtag</a>
                            </li>
                            <li class="side-menu__footer-item">
                                <a class="side-menu__footer-link" href="#">Language</a>
                            </li>
                        </ul>
                    </div>

                    <span class="side-menu__footer-copyright">Λ L I Ξ V Inc <i class="uil uil-copyright"></i> 2022. All rights reserved</span>
                </div>
            </section>
        </section>
    </main>

    <nav class="navbar">
        <a onclick="window.location.href='<?php echo BASE_URL . 'home/dashboard/'; ?>' " class="navbar__button uil uil-estate"></a>
        <a onclick="window.location.href='./search/' " class="navbar__button uil uil-search"></a>
        <a href="<?php echo BASE_URL . 'home/studio/createPost/'; ?>" class="navbar__button uil uil-plus-circle"></a>
        <a href="#" class="navbar__button uil uil-shopping-bag"></a>
        <button class="navbar__button profile-button" onclick="window.location.href='<?php echo BASE_URL . 'home/profile/'; ?>' ">
            <div class="profile-button__border"></div>
            <div class="profile-button__picture">
                <img src="<?php echo $_SESSION['user_photo']; ?>" alt="User Picture">
            </div>
        </button>
    </nav>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
  <script  src="./assets/js/jquery.timeago.js"></script>
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>

  <script>
	$(document).ready(function(){
		$('.like').on('click', function(){
			var post_id = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'liked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + ""); // + " likes"
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		$('.unlike').on('click', function(){
			var post_id = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'unliked': 1,
					'post_id': post_id
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + ""); // + " likes"
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
        });
        
        calcTimeAgo();

        // Load more data
        $('.load-more').click(function(){
            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            row = row + 3;

            if(row <= allcount){
                $("#row").val(row);

                $.ajax({
                    url: 'index.php', //getData.php
                    type: 'post',
                    data: {row:row},
                    beforeSend:function(){
                        $(".load-more").text("Loading...");
                    },
                    success: function(response){

                        // Setting little delay while displaying new content
                        setTimeout(function() {
                            // appending posts after last post with class="post"
                            $(".post:last").after(response).show().fadeIn("slow");

                            var rowno = row + 3;

                            // checking row value is greater than allcount or not
                            if(rowno > allcount){

                                // Change the text and background
                                $('.load-more').text("Hide");
                                $('.load-more').css("background","darkorchid");
                            }else{
                                $(".load-more").text("Load more");
                            }
                        }, 2000);


                    }
                });
            }else{
                $('.load-more').text("Loading...");

                // Setting little delay while removing contents
                setTimeout(function() {

                    // When row is greater than allcount then remove all class='post' element after 3 element
                    $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

                    // Reset the value of row
                    $("#row").val(0);

                    // Change the text and background
                    $('.load-more').text("Load more");
                    $('.load-more').css("background","#15a9ce");

                }, 2000);


            }

        });
    });
</script>
</body>

</html>