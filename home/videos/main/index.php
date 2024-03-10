<?php 


include('../../../_inc/functions.php');

session_start();
auth();

$con = connect();

//
// ?watch=
// ?read=
//

if (isset($_GET['articles'])) {header('Location: ./articles.php');}
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
                
                <div class="filter">
                    <div class="pill active">For Me</div>
                    <div class="pill">Popular</div>
                    <div class="pill">Trending</div>
                    <div class="pill">Broadcasting</div>
                    <div class="pill">iOS</div>
                    <div class="pill">Branding</div>
                    <div class="pill">3D</div>
                    <i class="uil uil-angle-right-b"></i>
                </div>

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
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="../assets/js/script.js"></script>

</body>

</html>