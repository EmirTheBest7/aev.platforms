<?php 


include('../../../_inc/functions.php');

session_start();
auth();

$con = connect();

//
// ?watch=
// ?read=
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AEV - </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.css">
    <link rel="stylesheet" href="../assets/css/main-video-grid.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="video-app">
        <?php include("../inc/header.php"); ?>
        <div class="wrapper">
            <?php include("../inc/menu.php"); ?>
            <div class="main-container">
                <div class="profile">
                    <img src="https://images.unsplash.com/photo-1559543434-3e99643d333d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="" class="profile-cover">
                
                
                    <div class="profile-menu">
                        <div class="profile-avatar">
                            <img class="profile-img" src="<?php echo $_SESSION['user_photo']; ?>" alt="">
                            <div class="profile-name"><?php echo $_SESSION['username']; ?></div>
                        </div>
                        
                        <div class="menu-items c-tabs c-tab--navigation" data-toggle="c-tabs" role="navigation">
                            <a href="#vids" class="c-tab--item profile-menu-link active">Videos</a>
                            <a href="#music" class="profile-menu-link">Music</a>
                            <a href="#playlist" class="profile-menu-link">Playlists</a>
                            <a href="#about" class="profile-menu-link">About</a>
                        </div>

                    </div>
                </div>

                <div class="trends">
                    <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 50" fill="currentColor">
                    <path d="M5.03 12h-5v38h56V12h-5zm31.999 20.262l-12.951 7.521a2.02 2.02 0 01-2.04.004 1.984 1.984 0 01-1.008-1.735V23.01c0-.724.377-1.372 1.008-1.735a2.047 2.047 0 012.04.003L37.029 28.8a1.983 1.983 0 011.001 1.731c0 .719-.374 1.366-1.001 1.731z" data-original="#000000" class="active-path" />
                    <path d="M23.03 38.051v.004l12.994-7.524-12.951-7.525zM12.03 0h32v4h-32zM50.03 6h-44v4h44z" data-original="#000000" class="active-path" /></svg>
                    See what's trending
                    </a>
                    <div class="follow-buttons">
                    <button class="follow">Date Added</button>
                    <button class="follow follow-option active">Most Popular</button>
                    </div>
                    <div class="play-all">
                    <svg viewBox="0 0 494.942 494.942" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.353 0l424.236 247.471L35.353 494.942z" /></svg>
                    Play All
                    </div>
                </div>


                <div class="c-tab--content-container">

                
                    <div id="vids" class="c-tab--content active">
                        <article class="video-sec-wrap">
                            <div class="video-sec">
                                <ul class="video-sec-middle" id="vid-grid">
                                    <li class="thumb-wrap">
                                        <a href="../view/?watch=Y2cGqDd82dld4usJ">
                                            <img class="thumb" src="https://images.unsplash.com/photo-1555661225-ade1bbf3fbb3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1957&q=80" alt="">
                                            <div class="thumb-info">
                                                <p class="thumb-title">Video Fucking Title</p>
                                                <p class="thumb-user">Username</p>
                                                <p class="thumb-text">1.3K Views</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>

                    <div id="music" class="c-tab--content">
                        <div id="plwrap">
                            <ul id="plList">
                                <li class="plSel">
                                    <div class="plItem"> <span class="plNum">01.</span> <span class="plTitle">All This Is - Joe L.'s
                                            Studio</span> <span class="plLength">2:46</span> </div>
                                </li>
                                <li>
                                    <div class="plItem"> <span class="plNum">02.</span> <span class="plTitle">The Forsaken - Broadwing
                                            Studio (Final Mix)</span> <span class="plLength">8:30</span> </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div id="playlist" class="c-tab--content">Playlists</div>
                    <div id="about" class="c-tab--content">About Section</div>
                    


                </div>
  
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="../assets/js/script.js"></script>
    <script src="./script.js"></script>

</body>

</html>