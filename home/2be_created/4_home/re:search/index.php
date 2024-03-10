<?php

    include("../../_inc/functions.php");
    session_start();
    $site_title = 'Re:search';
    echo $_SE
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    
    <title><?php echo $site_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel='stylesheet'
        href='https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css'>

    <link rel="stylesheet" href="./style.css">


</head>

<body>
    <!-- partial:index.partial.html -->
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
    <defs>
      <radialGradient id="Gradient1" cx="50%" cy="50%" fx="10%" fy="50%" r=".5">
        <animate attributeName="fx" dur="34s" values="0%;3%;0%" repeatCount="indefinite" />
        <stop offset="0%" stop-color="#ff0" />
        <stop offset="100%" stop-color="#ff00" />
      </radialGradient>
       <radialGradient id="Gradient2" cx="50%" cy="50%" fx="10%" fy="50%" r=".5">
        <animate attributeName="fx" dur="23.5s" values="0%;3%;0%" repeatCount="indefinite" />
        <stop offset="0%" stop-color="#0ff" />
        <stop offset="100%" stop-color="#0ff0" />
      </radialGradient>
      <radialGradient id="Gradient3" cx="50%" cy="50%" fx="50%" fy="50%" r=".5">
        <animate attributeName="fx" dur="21.5s" values="0%;3%;0%" repeatCount="indefinite" />
        <stop offset="0%" stop-color="#f0f" />
        <stop offset="100%" stop-color="#f0f0" />
      </radialGradient>
    </defs>
    <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient1)">
      <animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite" />
      <animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite" />
      <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="17s" repeatCount="indefinite"/>
    </rect>
    <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient2)">
      <animate attributeName="x" dur="23s" values="-25%;0%;-25%" repeatCount="indefinite" />
      <animate attributeName="y" dur="24s" values="0%;50%;0%" repeatCount="indefinite" />
      <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="18s" repeatCount="indefinite"/>
    </rect>
      <rect x="0" y="0" width="100%" height="100%" fill="url(#Gradient3)">
      <animate attributeName="x" dur="25s" values="0%;25%;0%" repeatCount="indefinite" />
      <animate attributeName="y" dur="26s" values="0%;25%;0%" repeatCount="indefinite" />
      <animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="19s" repeatCount="indefinite"/>
    </rect>
  </svg>

    <nav class="navbar navbar-light p-0">
        <div class="container">
            <a class="navbar-brand ml-auto" href="#">
            <div style="font-weight: bold;
text-align: center;
color: #fff6;">
                    Re:<span class="yellow">search</span>
                </div>
            </a>
            <a class="navbar-brand" href="#" style="display: flex; margin-right: 0;">
                <div style="line-height: 60px;text-align: center;">Hello</div>
                <div class="circle">
                    <img src="https://emiraliev.com/img/InstaProfile.png" alt="" />
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"
                        style="enable-background:new -580 439 577.9 194;" xml:space="preserve">
                        <circle cx="50" cy="50" r="40" />
                    </svg>
                </div>
            </a>
        </div>
    </nav>

    <div style="display: none" id="ocultar">
        <p>Imagen fuente:</p>
        <img src="https://persephonemagazine.com/wp-content/uploads/2013/10/ChumHum.jpg">
    </div>
    <main>

        <div class="contenedor">
            <div class="busqueda">
                <div class="logo">
                    Re:<span class="yellow">search</span>
                </div>

                <div class="d-flex justify-content-center">


                    <div class="search-box">
                        <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                        <form action="search.php" method="POST" name="" class="search-form">
                            <input type="text" name="k" placeholder="Search" id="search" autocomplete="off">
                        </form>

                        <div type="submit" class="go-icon"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>

                <?php require("search_engine.php"); ?>

                <header>
                    <nav>
                        <ul>
                            <li>Publishing</li>
                            <li>Gallery</li>
                            <li id="fuente">Foto</li>
                            <li>Email</li>
                            <li>Videos</li>
                            <li>Buy</li>
                            <li>FAQ </li>
                        </ul>
                    </nav>
                </header>

                <button onclick="launch_toast()" style="display:none;">Show Toast</button>

                <div id="toast">
                    <div id="img">Icon</div>
                    <div id="desc">A notification message..</div>
                </div>

            </div>
            <div class="contenedorLogo">
            </div>
        </div>

    </main>

    <footer>
        <nav style="padding-bottom: 10px;">
            <ul>
                <li>EA agency</li>
                <li>EA apps</li>
                <li>EA work group</li>
                <li>EA Photos</li>

            </ul>
        </nav>

        <p>© 2021 EA Systems LLC</p>
        <p>
        </p>
    </footer>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

    <script>
        $(document).ready(function () {
            $("#search").focus(function () {
                $(".search-box").addClass("border-searching");
                $(".search-icon").addClass("si-rotate");
            });
            $("#search").blur(function () {
                $(".search-box").removeClass("border-searching");
                $(".search-icon").removeClass("si-rotate");
            });
            $("#search").keyup(function () {
                if ($(this).val().length > 0) {
                    $(".go-icon").addClass("go-in");
                } else {
                    $(".go-icon").removeClass("go-in");
                }
            });
            $(".go-icon").click(function () {
                $(".search-form").submit();
            });
        });
    </script>

    <script>
        var form = document.querySelector('form');
        var aramaAlani = document.getElementById("search");

        $(document).on('keydown', function (e) {
            if (e.keyCode === 191) { //ESC key code

                aramaAlani.focus();
                form.reset();
                aramaAlani.scrollIntoView();

                //document.forms[ 'search' ].elements[ _element ].focus();
                //document.getElementById("search").focus();
            }
        });
    </script>

    <!-- Notification-->

    <script>
        function launch_toast() {
            var x = document.getElementById("toast")
            x.className = "show";
            setTimeout(function () {
                x.className = x.className.replace("show", "");
            }, 5000);
        }
    </script>



</body>

</html>