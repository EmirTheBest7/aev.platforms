<?php
require '../../../_inc/functions.php';

session_start();
auth();


//$loggedIn = false;

ob_start(); 
// Establish Database Connection

$conn = connect();

if (isset($_SESSION['user_id'])) {
    //echo $_SESSION['user_id'];

    $sel_query="Select * from users where user_id=".$_SESSION['user_id']." ";
    $result = mysqli_query($conn,$sel_query);
    while ($row = mysqli_fetch_assoc($result)) {
        //echo '<p>'.$row['nickname'].'</p>';
    

        $data['username'] = $row['nickname']; // dosad
        $data['user_photo'] = $row['user_photo']; // dosad
        $data['email'] = $row['email'];// dosad
        $data['user_id'] = $_SESSION['user_id'];// dosad
    
        $_SESSION['loggedIn'] = 1;
        $_SESSION['name'] = $row['nickname']; // В этой херне раньше была $data
        $_SESSION['email'] = $row['email'];
        $_SESSION['userID'] = $row['user_id'];
        $loggedIn = true;
    }
}

// SUKA ETO OKAZUJETSA MySQLi tolko v OOP



// SELECT FROM DB where user_id == $_SESSION['user_id'] a dosad

// Vezde gde token L7a5FX0M6Swb7ZnD dosad $token, NERABOTAET
// Inserting and displaying comment with token is sorking properly. Cant get $token into SQL



function createCommentRow($data, $isReply = false) {
    global $conn;
    global $addr;
    global $token;

    if ($isReply)
        $isReply = 'yes';
    else
        $isReply = 'no';

        
    if (!empty($data["user_photo"])) {
        $user_profile = BASE_URL . "home/_uploads/user_".$data["token_id"]. "/profile/" .$data["user_photo"];
    } else {
        $user_profile = BASE_URL . "_assets/images/avatar.png";
    }

    $response = '
            <div id="comment_'.$data['id'].'" style="display:flex; margin: 4px 17px 12px;">
            <div class="avatar-content" style="margin-right: 1rem;" href="javascript://"><img style="border-radius: 50%; max-width: fit-content;" class="avatar" src="'.$user_profile.'" width="50" height="50"></div>
            <div class="comment">
                <a class="user" href="'.BASE_URL. "home/profile/?nickname=". $data['nickname'].'">'.$data['nickname'].'</a><span class="time timeago" data-date="'.$data['createdOn'].'"> '.$data['createdOn'].'</span>
                <div class="userComment">'.$data['comment'].'</div>
                <div class="reply">
                    <i class="uil uil-thumbs-up" data-isReply="'.$isReply.'" onclick="react(this,'.$data['id'].', \'up\')"></i>
                    <i class="uil uil-thumbs-down" data-isReply="'.$isReply.'" onclick="react(this,'.$data['id'].', \'down\')"></i>
                    <a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a>
                </div>

                  <a class="collapse-repply" style="display:flex;" href="javascript://">
                  <svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
                  </svg>(0) replies</a>

                <div class="replies">';

    $sql = $conn->query("SELECT tl_replies.id, nickname, users.user_photo, users.token_id, comment, tl_replies.createdOn FROM tl_replies INNER JOIN users ON tl_replies.userID = users.user_id WHERE tl_replies.commentID = '".$data['id']."' ORDER BY tl_replies.id DESC LIMIT 1");
    while($dataR = $sql->fetch_assoc())
        $response .= createCommentRow($dataR, true);

    $response .= '</div></div></div>';

    return $response;
}

if (isset($_POST['getUserReactions'])) { // OK
    $reactions = [];
    $sql = $conn->query("SELECT commentID, type, isReply FROM tl_reactions");
    while($data = $sql->fetch_assoc())
        $reactions[] = array("commentID" => $data['commentID'], "type" => $data['type'], "isReply" => $data['isReply']);
    
    exit(json_encode($reactions));
}

if (isset($_POST['getAllComments'])) { // vrode ok
    
    $start = $conn->real_escape_string($_POST['start']);
    //$token = $conn->real_escape_string($_POST['token']);

    $response = "";
    // original $sql = $conn->query("SELECT tl_comments.id, tl_comments.token, nickname, comment, tl_comments.createdOn FROM tl_comments INNER JOIN users ON tl_comments.userID = users.user_id ORDER BY tl_comments.id DESC LIMIT $start, 20");
    $sql = $conn->query("SELECT tl_comments.id, tl_comments.token, nickname, users.user_photo, users.token_id, comment, tl_comments.createdOn FROM tl_comments INNER JOIN users ON tl_comments.userID = users.user_id WHERE tl_comments.token = 'L7a5FX0M6Swb7ZnD' ORDER BY tl_comments.id DESC LIMIT $start, 20");
    
    while($data = $sql->fetch_assoc())
        $response .= createCommentRow($data);

    exit($response);
}

if (isset($_POST['react'])) {
    $commentID = $conn->real_escape_string($_POST['commentID']);
    $type = $conn->real_escape_string($_POST['type']);
    $isReply = $conn->real_escape_string($_POST['isReply']);

    $sql = $conn->query("SELECT id FROM tl_reactions WHERE commentID='$commentID' && userID='".$_SESSION['userID']."'");
    if ($sql->num_rows > 0) {
        $status = "updated";
        $conn->query("UPDATE tl_reactions SET type='$type' WHERE commentID='$commentID' && userID='".$_SESSION['userID']."'");
    } else {
        $status = "inserted";
        $conn->query("INSERT INTO tl_reactions (isReply,type,commentID, userID) VALUES ('$isReply','$type', '$commentID', '".$_SESSION['userID']."')");
        
    }

    exit(json_encode(array('status' => $status)));
}

if (isset($_POST['addComment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $isReply = $conn->real_escape_string($_POST['isReply']);
    $commentID = $conn->real_escape_string($_POST['commentID']);

    if ($isReply != 'false') {
        $conn->query("INSERT INTO tl_replies (comment,  commentID, userID, createdOn) VALUES ('$comment', '$commentID', '".$_SESSION['userID']."', NOW())");
        $sql = $conn->query("SELECT tl_replies.id, nickname, comment, tl_replies.createdOn FROM tl_replies INNER JOIN users ON tl_replies.userID = users.user_id ORDER BY tl_replies.id DESC LIMIT 1 ");
    } else {
        $conn->query("INSERT INTO tl_comments (userID, token, comment, createdOn) VALUES ('".$_SESSION['userID']."', 'L7a5FX0M6Swb7ZnD' ,'$comment',NOW())");
        $sql = $conn->query("SELECT tl_comments.id, nickname, comment, tl_comments.createdOn FROM tl_comments INNER JOIN users ON tl_comments.userID = users.user_id ORDER BY tl_comments.id DESC LIMIT 1 ");
    }

    $data = $sql->fetch_assoc();
    exit(createCommentRow($data));
}
$token = $_GET['token'];
$sqlNumComments = $conn->query("SELECT id FROM tl_comments WHERE token = '$token'");
$numComments = $sqlNumComments->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ΛΞV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1">
    <?php echo file_get_contents(BASE_URL . "_assets/icon/");  ?>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/brands.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">


    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js" defer></script>

</head>

<body>
    <nav class="Navbar">
        <a onclick="back()" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
        
            <i class="uil uil-angle-left-b"></i>
        </a>
    <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">
    </nav>
      
    
    <main class="main-container" id="main">
    <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />

        <section class="content-container">
        
            <div class="content">
                <div class="posts">
                    <?php
                    // Public Posts Union Friends' Private Posts
                    $sql = "SELECT tl_posts.post_caption, tl_posts.post_time, tl_posts.post_public, users.username, users.nickname, users.token_id, users.user_id, users.user_photo, tl_posts.post_id, tl_posts.likes, tl_posts.token
                            FROM tl_posts
                            JOIN users
                            ON tl_posts.post_by = users.user_id
                            WHERE tl_posts.token = '$token' ORDER BY post_time DESC";
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
                            (!empty($row["user_photo"])) ? $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"] : $user_profile = BASE_URL . "_assets/images/avatar.png";
                            
                            echo '
                            <article class="post">
                                    <div class="post__header">
                                        <div class="post__profile">
                                            <a href="#" target="_blank" class="post__avatar">
                                                <img src="'.$user_profile.'" alt="User Picture">
                                            </a>
                                            <a href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank" class="post__user">' . $row['nickname'] . '</a>
                                        </div>

                                        <button class="post__more-options"><i class="uil uil-ellipsis-v"></i></button>
                                    </div>

                                    <div class="post__content">
                                        <div class="post__medias">
                                            <img class="post__media" src="../assets/insta-clone.png" alt="Post Content">
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
                                <button class="post__button share-button"><i class="uil uil-upload"></i></button>

                                <div class="post__indicators"></div>

                                <button class="post__button post__button--align-right"><i class="uil uil-bookmark"></i></button>
                            </div>

                            <div class="post__infos">
                                <div class="post__likes">
                                    <a href="#" class="post__likes-avatar">
                                        <img src="'.BASE_URL.'_assets/images/avatar.png'.'" alt="User Picture">
                                    </a>

                                    <span>Liked by <span class="likes_count">'.$row['likes'].'</span> '.($row['likes'] == 1 ? "user" : "users").'</a></span>
                                </div>

                                <div class="post__description">
                                    <span>
                                        <a class="post__name--underline" href="'. BASE_URL . "home/profile/?nickname=" . strtolower($row['nickname']) .'" target="_blank">' . $row['nickname'] . '</a>
                                        ' . $row['post_caption'] . '
                                    </span>
                                </div>

                                <span class="post__date-time">' . $row['post_time'] . '</span>
                            </div>

                            <div class="comment-box post__comment" style="padding: 0;">
                                <div class="comment-icon">User:</div>
                                <div class="comment-form">
                                    <input type="hidden" name="token" id="token" value="' . $token . '">
                                    <input type="text" id="mainComment" class="comment-input" placeholder="Add Public Comment" autocomplete="off">
                                </div>

                                <div type="submit" class="go-icon" style="top: -1px;" onclick="isReply = false;" id="addComment">Send</div>
                            </div>

                        </div>



                    

                    

                    <div class="post__comment">
                        <div class="col-md-12">
                            <h2 style="color: white; padding: 20px; display:flex;">

                            <svg width="25" height="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path>
                  </svg>
                            
                            <b id="numComments">Comments ('.$numComments.')</b></h2>
                            <div class="userComments">
                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="post__comment replyRow" style="display:none">
                    <div class="col-md-12">
                        <textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea>
                        <button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
                        <button style="float:right" class="btn-default btn" onclick="$(\'.replyRow\').hide();">Close</button>
                    </div>
                </div>

                        
                    </article>



                    </div>
            </div>

            
                
                ';
            }
        }
        ?>

        
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

    <div class="share-dialog">
        <header>
            <h3 class="dialog-title">Share this post</h3>
            <i class="close-button uil uil-times-square" href="#close"></i>
        </header>
    
        <div class="link">
            <div class="pen-url"><?php echo BASE_URL. "home/timeline/p/?token=" .$token ?></div>
            <button class="copy-link copy_query" onclick="launch_toast()"  data-clipboard-text="<?php echo BASE_URL. "home/timeline/p/?token=" .$token ?>">Copy!</button>
        </div>
    </div>
    <div id="toast"><div id="img"><i class="uil uil-info-circle"></i></div><div id="desc">Link copied!</div></div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

  
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
  <script type="text/javascript">
            function launch_toast() {
		        var x = document.getElementById("toast")
		        x.className = "show";
		        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
            }
            new ClipboardJS('.copy_query');
            
            var isReply = false, commentID = 0, max = <?php echo $numComments ?> ;

            $(document).ready(function () {
                $("#addComment, #addReply").on('click', function () {
                    var comment;
                    var token = $("#token").val();


                    if (!isReply)
                        comment = $("#mainComment").val();
                    else
                        comment = $("#replyComment").val();

                    if (comment.length > 5) {
                        $.ajax({
                            url: 'index.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                addComment: 1,
                                comment: comment,
                                token: token,
                                isReply: isReply,
                                commentID: commentID
                            },
                            success: function (response) {
                                max++;
                                $("#numComments").text(max + " Comments");

                                if (!isReply) {
                                    $(".userComments").prepend(response);
                                    $("#mainComment").val("");
                                } else {
                                    commentID = 0;
                                    $("#replyComment").val("");
                                    $(".replyRow").hide();
                                    $('.replyRow').parent().next().append(response);
                                }

                                calcTimeAgo();
                            }
                        });
                    } else
                        alert('Please Check Your Inputs');
                });

                $("#registerBtn").on('click', function () {
                    var name = $("#userName").val();
                    var email = $("#userEmail").val();
                    var password = $("#userPassword").val();

                    if (name != "" && email != "" && password != "") {
                        $.ajax({
                            url: 'index.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                register: 1,
                                name: name,
                                email: email,
                                password: password
                            },
                            success: function (response) {
                                if (response === 'failedEmail')
                                    alert('Please insert valid email address!');
                                else if (response === 'failedUserExists')
                                    alert('User with this email already exists!');
                                else
                                    window.location = window.location;
                            }
                        });
                    } else
                        alert('Please Check Your Inputs');
                });

                $("#loginBtn").on('click', function () {
                    var email = $("#userLEmail").val();
                    var password = $("#userLPassword").val();

                    if (email != "" && password != "") {
                        $.ajax({
                            url: 'index.php',
                            method: 'POST',
                            dataType: 'text',
                            data: {
                                logIn: 1,
                                email: email,
                                password: password
                            },
                            success: function (response) {
                                if (response === 'failed')
                                    alert('Please check your login details!');
                                else
                                    window.location = window.location;
                            }
                        });
                    } else
                        alert('Please Check Your Inputs');
                });

                getAllComments(0, max);
                getAllUserReactions();
            });

            function getAllUserReactions() {
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        getUserReactions: 1
                    },
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            $('i[onclick="react(this,' + response[i].commentID + ', \'' + response[i].type +
                                '\')"]').each(function () {
                                if (response[i].isReply === $(this).attr('data-isReply'))
                                    $(this).css('color', 'lime');
                            });
                        }
                    }
                });
            }

            function reply(caller) {
                commentID = $(caller).attr('data-commentID');
                $(".replyRow").insertAfter($(caller));
                $('.replyRow').show();
            }

            function calcTimeAgo() {
                $('.timeago').each(function () {
                    var timeAgo = $.timeago($(this).attr('data-date'));
                    $(this).text(timeAgo);
                    $(this).removeClass('timeago');
                });
            }

            function react(caller, commentID, type) {
                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        react: 1,
                        commentID: commentID,
                        type: type,
                        isReply: $(caller).attr('data-isReply')
                    },
                    success: function (response) {
                        if (response.status === 'updated') {
                            if (type === 'up')
                                $(caller).next().css('color', '');
                            else
                                $(caller).prev().css('color', '');
                        }

                        $(caller).css('color', 'aqua');
                    }
                });
            }

            function getAllComments(start, max) {
                if (start > max) {
                    calcTimeAgo();
                    return;
                }

                $.ajax({
                    url: 'index.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        getAllComments: 1,
                        start: start
                    },
                    success: function (response) {
                        $(".userComments").append(response);
                        getAllComments((start + 20), max);
                    }
                });
            }
        </script>

        <script>
            $(document).ready(function () {
                // when the user clicks on like
                $('.like').on('click', function () {
                    var post_id = $(this).data('id');
                    $post = $(this);

                    $.ajax({
                        url: '../index.php',
                        type: 'post',
                        data: {
                            'liked': 1,
                            'post_id': post_id
                        },
                        success: function (response) {
                            $post.parent().find('span.likes_count').text(response +
                            ""); // + " likes"
                            $post.addClass('hide');
                            $post.siblings().removeClass('hide');
                        }
                    });
                });

                // when the user clicks on unlike
                $('.unlike').on('click', function () {
                    var post_id = $(this).data('id');
                    $post = $(this);

                    $.ajax({
                        url: '../index.php',
                        type: 'post',
                        data: {
                            'unliked': 1,
                            'post_id': post_id
                        },
                        success: function (response) {
                            $post.parent().find('span.likes_count').text(response +
                            ""); // + " likes"
                            $post.addClass('hide');
                            $post.siblings().removeClass('hide');
                        }
                    });
                });
            });
        </script>

        <script>
        $(document).ready(function () {
            $(".comment-input").focus(function () {
                $(".comment-box").addClass("border-commenting");
                $(".comment-icon").addClass("si-rotate");
            });
            $(".comment-input").blur(function () {
                $(".comment-box").removeClass("border-commenting");
                $(".comment-icon").removeClass("si-rotate");
            });
            $(".comment-input").keyup(function () {
                if ($(this).val().length > 0) {
                    $(".go-icon").addClass("go-in");
                } else {
                    $(".go-icon").removeClass("go-in");
                }
            });
            $(".go-icon").click(function () {
                $(".comment-form").submit();
            });
        });
    </script>

    <script>
    const shareButton = document.querySelector('.share-button');
    const shareDialog = document.querySelector('.share-dialog');
    const closeButton = document.querySelector('.close-button');

    shareButton.addEventListener('click', event => {
    if (navigator.share) { 
    navigator.share({
        title: 'WebShare API Demo',
        url: 'https://aliev.co/HelloMotherfuckers'
        }).then(() => {
        console.log('Thanks for sharing!');
        })
        .catch(console.error);
        } else {
            shareDialog.classList.add('is-open');
        }
    });

    closeButton.addEventListener('click', event => {
    shareDialog.classList.remove('is-open');
    });
    
    </script>

</body>

</html>
