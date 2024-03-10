<?php 
require '../../_inc/functions.php';
$con = connect();
session_start();
auth();
ob_start();
?>

<?php

if(isset($_GET['nickname']) && $_GET['nickname'] == strtolower($_SESSION['nickname'])) {
    $current_id = $_SESSION['user_id'];
    $flag = 0;
    header('location:'.$_SERVER['PHP_SELF']);
} else if (isset($_GET['nickname']) && $_GET['nickname'] == empty($_GET) ) {
    echo "Nickname is empty";
    //neww
}

if(isset($_GET['nickname']) && $_GET['nickname'] != $_SESSION['nickname']) {
    $sel_user= "SELECT * from users where nickname='".$_GET['nickname']."'"; 
    $result = mysqli_query($con,$sel_user);
    while ($select = mysqli_fetch_assoc($result)) {
        $user_id = $select['user_id'];
        $user_nick = $select['nickname'];
    }
    $current_id = $user_id;
    $flag = 1;
} else {
    $current_id = $_SESSION['user_id'];
    $flag = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ΛΞV</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo file_get_contents(BASE_URL . "_assets/icon/");  ?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
	<link rel="stylesheet" href="./style.css">

	<style>
		main {
			position: relative;
		}

		canvas {
			position: fixed!important;
		}
    </style>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" integrity="sha512-p7Ey2nBhKYEi9yh0iDs+GMA0ttebOqVl3OO2oWRzRxtDoN/RedyYcHFUJZhMVi8NKRdEA7n+9NTNQX/kFIZgNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- For Edit / rewrite main page to edit mode after clicking on EDIT button-->

</head>

<body>
	<!-- partial:index.partial.html -->

	<nav class="Navbar">
		<a id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
		  data-target="#navbarCollapse"><span></span></a>
	
		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">
	
		<div id="navbarCollapse" class="Navbar-menu">
			<!-- Menu -->
		</div>
	
		<ul class="Navbar-quickLinks hide">
		  <li><a href="#link">Facebook</a></li>
		  <li><a href="#link">Twitter</a></li>
		  <li><a href="#link">Instagram</a></li>
		</ul>
	  </nav>
	  


	<main id="main">
		<header>
				<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

			<div class="container">
            <div class="profile">

            <?php
            function count_stat($op, $profile_id) {
                global $con;

                if ($op == "friends_total") {
                    $friends_total_sql = mysqli_query ($con,"SELECT * FROM tl_friendship WHERE user1_id = ".$profile_id." OR user2_id = ".$profile_id." AND friendship_status = 1 ");
                    $friends_total=mysqli_num_rows($friends_total_sql);
                    return $friends_total;
                    //print_r($friends_total);
                } else if ($op == "posts_total") {
                    $posts_total_sql = mysqli_query ($con,"SELECT * FROM tl_posts WHERE post_by = ".$profile_id." "); //  AND post_public = 'Y' 
                    $posts_total=mysqli_num_rows($posts_total_sql);
                    return $posts_total;
                    //print_r($friends_total);
                } else if ($op == "followers_total") {
                    return "x";
                } else if ($op == "comments_total") {
                    $comments_total_sql = mysqli_query ($con,"SELECT * FROM tl_comments WHERE token = '".$profile_id."' "); //  AND post_public = 'Y' 
                    $comments_total=mysqli_num_rows($comments_total_sql);
                    return $comments_total;
                } else {
                    return "Undefined";
                }
            }


            $postsql;
            if($flag == 0) { // Your Own Profile 


                $postsql = "SELECT tl_posts.post_caption, tl_posts.post_time, users.username,
                                tl_posts.post_public, users.user_id,  users.nickname,
                                tl_posts.post_id, tl_posts.likes, tl_posts.token
                        FROM tl_posts
                        JOIN users
                        ON users.user_id = tl_posts.post_by
                        WHERE tl_posts.post_by = $current_id
                        ORDER BY tl_posts.post_time DESC";
                $profilesql = "SELECT users.user_id,    
                                 users.username
                          FROM users
                          WHERE users.user_id = $current_id";
                $profilequery = mysqli_query($con, $profilesql);

                echo '

        

					<div class="profile-image">

						<img src="'.$_SESSION['user_photo'].'" alt="">

					</div>

					<div class="profile-user-settings">

                        <h1 class="profile-user-name">'.$_SESSION['nickname'] .verified($_SESSION['access']).'</h1>

						<a href="'. BASE_URL. "home/studio/editProfile/" .'" class="btn profile-edit-btn">Edit Profile</a>

						<a href="'. BASE_URL. "home/studio/editProfile/" .'" class="btn profile-settings-btn" aria-label="profile settings"><i class="uil uil-setting" style="font-size: 2.6rem;"></i></a>

					</div>

					<div class="profile-stats">

						<ul>
							<li><span class="profile-stat-count">'. count_stat("posts_total", $_SESSION['user_id']) .'</span> '.(count_stat("posts_total", $_SESSION['user_id']) == 1 ? "post" : "posts").'</li>
							<li><span class="profile-stat-count">'. count_stat("friends_total", $_SESSION['user_id']) .'</span> '.(count_stat("friends_total", $_SESSION['user_id']) == 1 ? "friend" : "friends").'</li>
							<li><span class="profile-stat-count">'. count_stat("followers_total", $_SESSION['user_id']) .'</span> following</li>
						</ul>

					</div>

					<div class="profile-bio">

						<p><span class="profile-real-name">'.$_SESSION['username'].':</span> '.$_SESSION['bio'].'</p>

                    </div>

        
        
        ';

            } else { // Another Profile ---> Retrieve User data and friendship status
                $profilesql = "SELECT users.user_id, users.nickname, users.bio, users.token_id, users.access,
                                    users.username, userfriends.friendship_status
                            FROM users
                            LEFT JOIN (
                                SELECT tl_friendship.user1_id AS user_id, tl_friendship.friendship_status
                                FROM tl_friendship
                                WHERE tl_friendship.user1_id = $current_id AND tl_friendship.user2_id = {$_SESSION['user_id']}
                                UNION
                                SELECT tl_friendship.user2_id AS user_id, tl_friendship.friendship_status
                                FROM tl_friendship
                                WHERE tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.user2_id = $current_id
                            ) userfriends
                            ON userfriends.user_id = users.user_id
                            WHERE users.user_id = $current_id";
                $profilequery = mysqli_query($con, $profilesql);
                $row = mysqli_fetch_assoc($profilequery);
			    mysqli_data_seek($profilequery,0);
			
            if(isset($row['friendship_status'])){ // Either a friend or requested as a friend
                if($row['friendship_status'] == 1){ // Friend
                    $postsql = "SELECT tl_posts.post_caption, tl_posts.post_time, users.username, users.access,
                                        tl_posts.post_public, users.user_id,  users.nickname,
                                          
                                        tl_posts.post_id, tl_posts.likes, tl_posts.token
                                FROM tl_posts
                                JOIN users
                                ON users.user_id = tl_posts.post_by
                                WHERE tl_posts.post_by = $current_id
                                ORDER BY tl_posts.post_time DESC";
                }
                else if($row['friendship_status'] == 0){ // Requested as a Friend
                    $postsql = "SELECT tl_posts.post_caption, tl_posts.post_time, users.username, users.access,
                                        tl_posts.post_public, users.user_id, users.token_id, users.nickname,
                                          
                                        tl_posts.post_id, tl_posts.likes, tl_posts.token
                                FROM tl_posts
                                JOIN users
                                ON users.user_id = tl_posts.post_by
                                WHERE tl_posts.post_by = $current_id AND tl_posts.post_public = 'Y'
                                ORDER BY tl_posts.post_time DESC";
                }
            } else { // Not a friend
                $postsql = "SELECT tl_posts.post_caption, tl_posts.post_time, users.username, users.access,
                                    tl_posts.post_public, users.user_id, users.token_id, users.nickname,    
                                    tl_posts.post_id, tl_posts.likes, tl_posts.token
                            FROM tl_posts
                            JOIN users
                            ON users.user_id = tl_posts.post_by
                            WHERE tl_posts.post_by = $current_id AND tl_posts.post_public = 'Y'
                            ORDER BY tl_posts.post_time DESC";
            }
            // Profile Info
        $row = mysqli_fetch_assoc($profilequery);
        if (!empty($row["user_photo"])) {
            $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"]. ".png";
        } else {
            $user_profile = BASE_URL . "_assets/images/avatar.png";
        }
        echo '
					<div class="profile-image">

						<img src="'.$user_profile.'" alt="" style="width:152px;">

					</div>

					<div class="profile-user-settings" style="display: flex;align-items: center;">

                        <h1 class="profile-user-name">'.$row['nickname'] .verified($row['access']).'</h1>';

                        // Friendship Status
                 
if($flag == 1){
    echo '<br>';
    if(isset($row['friendship_status'])) {
        if($row['friendship_status'] == 1){
            echo '<form method="post">';
            echo '<input class="btn profile-edit-btn" type="submit" value="Friends" disabled="disabled" id="special">';
            echo '</form>';
        } else if ($row['friendship_status'] == 0){
            echo '<form method="post">';
            echo '<input class="btn profile-edit-btn" type="submit" value="Request Pending" disabled="disabled" id="special">';
            echo '</form>';
        }
    } else {
        echo '<form method="post">';
        echo '<input class="btn profile-edit-btn" type="submit" value="Send Friend Request" name="request">';
        echo'</form>';
    }
}
                        
        echo '

						<a class="btn profile-settings-btn" href="'. BASE_URL. "home/messenger/chat/?user_id=".$row['token_id'].'" aria-label="profile settings"><i class="uil uil-message" style="font-size: 2.6rem;"></i></a>

					</div>

					<div class="profile-stats">

						<ul>
							<li><span class="profile-stat-count">'. count_stat("posts_total", $row['user_id']) .'</span> '.(count_stat("posts_total", $row['user_id']) == 1 ? "post" : "posts").'</li>
							<li><span class="profile-stat-count">'. count_stat("friends_total", $row['user_id']) .'</span> '.(count_stat("friends_total", $row['user_id']) == 1 ? "friend" : "friends").'</li>
							<li><span class="profile-stat-count">'. count_stat("followers_total", $row['user_id']) .'</span> following</li>
						</ul>

					</div>

					<div class="profile-bio">

						<p><span class="profile-real-name">'.$row['username'].': </span>'.$row['bio'].'</p>

					</div>

        
        
        ';
        } 

        
        
        
        ?>

        </div>

        



				
				<!-- End of profile section -->

			</div>
			<!-- End of container -->

		</header>

		<div class="container">

        <nav class="c-tabs" data-toggle="c-tabs" role="navigation">
        <ul class="c-tab--navigation">
          <li class="c-tab--item"><a href="#test1" class="active"><i class="uil uil-inbox"></i></a></li>
          <li class="c-tab--item"><a href="#test2" class=""><i class="uil uil-airplay"></i></a></li>
          <li class="c-tab--item"><a href="#test3" class=""><i class="uil uil-newspaper"></i></i></a></li>
          <li class="c-tab--item"><a href="#test4" class=""><i class="uil uil-music"></i></a></li>
          <li class="c-tab--item"><a href="#test5" class=""><i class="uil uil-shopping-bag"></i></a></li>
          <li class="c-tab--slider">
            <div class="c-tab-indicator" style="width: 213.75px; left: 641.25px;"></div>
          </li>
        </ul>
      </nav>

      <!--
      <div class="c-tab--content-container">
      <div id="test1" class="c-tab--content active">Test 1</div>
      -->

      

      <div class="c-tab--content-container">
      <div id="test1" class="c-tab--content active"> 
			<div class="gallery">
            <?php
        $postquery = mysqli_query($con, $postsql);
        if($postquery){
			
			// Posts
			if(mysqli_num_rows($postquery) == 0){ // No Posts
				
				
                if($flag == 0){ // Message shown if it's your own profile
                    echo '<div class="post">';
                    echo 'You don\'t have any posts yet';
                    echo '</div>';
                }  else { // Message shown if it's another profile other than you.
                    echo '<div class="post">';
                    echo 'There is no public posts to show.';
                    echo '</div>';
                }
			} else {
                while ($row = mysqli_fetch_assoc($postquery)) {
					echo '<div class="gallery-item" tabindex="0" onclick="window.location=\' '.BASE_URL.'home/timeline/p/?token='.$row['token'].' \';">

					<img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop"
						class="gallery-image" alt="">

					<div class="gallery-item-info">

						<ul>
							<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i
									class="fas fa-heart" aria-hidden="true"></i> '.$row['likes'].'</li>
							<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i
									class="fas fa-comment" aria-hidden="true"></i> '. count_stat("comments_total", $row['token']) .'</li>
						</ul>

					</div>

				</div>';
                }
                //
			}
		}
                // Profile Info
                
                
        ?>


				

            </div>
            </div>

            <div id="test2" class="c-tab--content">Videos Coming Soon!</div>
            <div id="test3" class="c-tab--content">
                <div class="gallery">
                    <article class="gallery-item" tabindex="0" onclick="">

                        <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop"
                            class="gallery-image" alt="">
    
                        
                        <div class="blog-header-box">
                            <p class="blog-alias">
                                <span role="img" aria-label="Coffee mug emoji" style="margin-right:6px">☕️</span> 
                                <span>Articles Coming Soon!</span>
                            </p>
                            <h5 class="blog-header">CoffeeBrew</h5>
                            <p class="blog-date">02.26.2022</p>
                            </div>
    
                    </article>
                    <article class="gallery-item" tabindex="0" onclick="">

                        <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop"
                            class="gallery-image" alt="">
    
                        
                        <div class="blog-header-box">
                            <p class="blog-alias">
                                <span role="img" aria-label="Coffee mug emoji" style="margin-right:6px">☕️</span> 
                                <span>Videos Coming Soon!</span>
                            </p>
                            <h5 class="blog-header">The one sanction Western leaders can’t agree on...</h5>
                            <p class="blog-date">02.26.2022</p>
                            </div>
    
                    </article>
                    <article class="gallery-item" tabindex="0" onclick="">

                        <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop"
                            class="gallery-image" alt="">
    
                        
                        <div class="blog-header-box">
                            <p class="blog-alias">
                                <span role="img" aria-label="Coffee mug emoji" style="margin-right:6px">☕️</span> 
                                <span>Videos Coming Soon!</span>
                            </p>
                            <h5 class="blog-header">The one sanction Western leaders can’t agree on...</h5>
                            <p class="blog-date">02.26.2022</p>
                            </div>
    
                    </article>
                </div>
            </div>
      <div id="test4" class="c-tab--content">Music Coming Soon!</div>
      <div id="test5" class="c-tab--content">Goods Coming Soon!</div>
        
        </div>
			<!-- End of gallery -->

			<div class="loader"></div>

		</div>
		<!-- End of container -->

	</main>
	<!-- partial -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
  <script src="./script.js"></script>
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>

</body>

<script>
function showPath(){
    var path = document.getElementById("selectedFile").value;
    path = path.replace(/^.*\\/, "");
    document.getElementById("path").innerHTML = path;
}

setTimeout(function() {
    $('.loader').fadeOut('fast');
}, 3000);
</script>

</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['request'])) { // Send a Friend Request
        $sql3 = "INSERT INTO tl_friendship(user1_id, user2_id, friendship_status)
                 VALUES ({$_SESSION['user_id']}, $current_id, 0)";
        $query3 = mysqli_query($conn, $sql3);
        if(!$query3){
            echo mysqli_error($conn);
        }
    } else if(isset($_POST['remove'])) { // Remove
        $sql3 = "DELETE FROM tl_friendship
                 WHERE ((tl_friendship.user1_id = $current_id AND tl_friendship.user2_id = {$_SESSION['user_id']})
                 OR (tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.user2_id = $current_id))
                 AND tl_friendship.friendship_status = 1";
        $query3 = mysqli_query($conn, $sql3);
        if(!$query3){
            echo mysqli_error($conn);
        }
    }
    sleep(4);
}
?>