<?php

/*
if($row['post_public'] == 'Y') {
    echo '<p class="public">';
    echo 'Public';
}else {
    echo '<p class="public">';
    echo 'Private';
}*/

echo'<br/>
<div class="t-item">
    <div class="body">
        <div class="navbar">
            <div class="left">
                <div class="profile-pic">
                    <div class="border"></div>';
                    include 'profile_picture.php';
echo'
                </div>
                <div class="user-name">
                    <div class="name"><a href="profile.php?nickname=' . strtolower($row['nickname']) .'">' . $row['username'] . '</a></div>
                    <div class="since">' . $row['post_time'] . '</div>
                </div>
            </div>
            <div class="right">
                <!-- <i class="fas fa-angle-down"></i> -->
                <i class="material-icons">more_horiz</i>

            </div>
        </div>
        <div class="content">
            <p class="post-text">' . $row['post_caption'] . '</p>
            <img class="post-img" style="display:none;" src="#">
        </div>
    </div>
    <div class="comments">
        <div class="row-a">
           
        </div>';
?>
<?php 
					// determine if user has already liked this post
					$results = mysqli_query($conn, "SELECT * FROM tl_likes WHERE user_id=".$_SESSION['user_id']." AND post_id=".$row['post_id']."");

					if (mysqli_num_rows($results) == 1 ): ?>

                    <!-- user already likes post -->
                    <div class="row-b">
                        <div class="icon-div">
						    <i class="unlike material-icons" style="color: blue!important;" data-id="<?php echo $row['post_id']; ?>">thumb_up</i> 
						    <i class="like hide material-icons" style="color: gray!important;" data-id="<?php echo $row['post_id']; ?>">thumb_up</i> 
                            <div class="icon-text"><span class="likes_count"> <?php echo $row['likes']; ?> </span></div>
                        </div>
					<?php else: ?>
						<!-- user has not yet liked post -->
                    <div class="row-b">
                        <div class="icon-div">
						    <i class="like material-icons" style="color: gray!important;" data-id="<?php echo $row['post_id']; ?>">thumb_up</i> 
						    <i class="unlike hide material-icons" style="color: blue!important;" data-id="<?php echo $row['post_id']; ?>">thumb_up</i> 
                            <div class="icon-text"><span class="likes_count"> <?php echo $row['likes']; ?> </span></div>
                        </div>
					<?php endif ?>
                    
                    

<!--
        <div class="row-b">
           <div class="like icon-div">
                <i class="material-icons">thumb_up</i>
                <div class="icon-text">Like</div>
            </div>-->


<?php
echo'
            <div class="icon-div">
                <a style="display: flex;
                line-height: 1.5;" href="view.php?token='.$row['token'].'"><i class="material-icons">mode_comment</i>
                <div class="icon-text">Comment</div></a>
            </div>
            <div class="share icon-div my-button click-handler">
                <i class="material-icons">share</i>
                <div class="icon-text">Share</div>
            </div>
        </div>
        <div class="row-c">

        </div>
        <div class="row-d">

        </div>
    </div>
</div> <br/>';

/*
$target = glob("data/images/posts/" . $row['post_id'] . ".*");
if($target) {
    echo '<img src="' . $target[0] . '" style="max-width:580px">';
}*/

?>

<div class='notify -hidden'>
  Copied to clipboard 👌
</div>


