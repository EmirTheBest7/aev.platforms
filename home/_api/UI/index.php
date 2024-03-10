<?php 

include('../../../_inc/functions.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="shortcut icon" type="image/x-icon" href="img/EAlogo.svg">

    <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet' href='https://cdn.rawgit.com/desandro/masonry/master/dist/masonry.pkgd.min.js'>
    <link rel="stylesheet" href="./style.css">


    <title>ΛΞV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>


    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">

    <link rel="stylesheet" href="./screen.css">

    <style>
        main {
            position: relative;
        }

        canvas {
            position: fixed !important;
        }


        .Navbar-quickLinks {
            padding-left: 0 !important;
            transform: none;
            display: grid;

        }

        .Navbar-quickLinks a {
            position: relative;
            padding: 1rem;

        }

        .quickLinks-btn {
            width: 100%;
            font-size: 25px;
            border: 1px solid white;
            border-radius: 4px;
            height: 100%;
            background: transparent;
            color: white;
        }

        @media (max-width: 767px) {
            .Navbar-quickLinks, .window__tabs, .windows__add, .window__minimize, .window__maximize  {
                display: none!important;
            }
        }
    </style>


</head>

<body>
    <nav class="Navbar">
        <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
            data-target="#navbarCollapse"><span></span></a>

        <img class="Navbar-brand u-pullRight Navbar-brand-mobile" style="width: 140px;" src="<?php echo BASE_URL . "page/downloads/logo/AEV_Dev.svg"; ?>">

        <div id="navbarCollapse" class="Navbar-menu">
            
        </div>

        <ul class="Navbar-quickLinks">
            <li><a class="Toggle Navbar-toggle"><button class="quickLinks-btn"><i
            class="uil uil-document-info taskbar__item taskbar__item--mail" data-window="docs"></i></button></a></li>
            <li class="line"></li>


            <li><a class="Toggle Navbar-toggle"><button class="quickLinks-btn"><i
                            class="uil uil-brackets-curly taskbar__item taskbar__item--mail" data-window="cmd"></i></button></a></li>
        </ul>
    </nav>

    <main id="main" class="desktop">
        <input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter"/>


        <div class="window window--mail window--active" data-window="cmd" style="width:70%;height:80vh;top:10%;left:10%;">
            <div class="window__titlebar">
                <div class="window__controls window__controls--left">
                    <a class="window__icon" href="#"><i class="uil uil-brackets-curly"></i></i></a>
                    <a class="window__menutoggle" href="#"><i class="uil uil-bars"></i></a>

                    <a class="window__tabs" href="#" style="">CMD <span class="tab__close" data-id="tab-cmd">×</span></a>
                    <a class="window__tabs" href="#" style="">Dashboard</a>
                </div>



                <span class="window__title">CMD</span>

                <div class="window__controls window__controls--right">
                    <a class="windows__add" id="#"><i class="uil uil-plus"></i></a>
                    <a class="" id="reload_iframe"><i class="uil uil-redo"></i></a>
                    <a class="window__minimize" href="#"><i class="uil uil-minus"></i></a>
                    <a class="window__maximize" href="#"><i class="uil uil-square"></i></a>
                    <a class="window__close" href="#"><i class="uil uil-multiply"></i></a>
                </div>
            </div>


            <ul class="window__menu">
                <li>
                    <a href="#">
                        <i class="menu__icon uil uil-search"></i>
                        Search
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="menu__icon uil uil-share-alt"></i>
                        Share
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="menu__icon uil uil-plug"></i>
                        Devices
                    </a>
                </li>
                <li class="divided">
                    <a href="#">
                        <i class="menu__icon uil uil-setting"></i>
                        Settings
                    </a>
                </li>
            </ul>

            <div class="window__body">
                <div class="window__main" style="overflow: hidden;">
                    <iframe class="frame" id="iframeid" src="./terminal/"></iframe>
                </div>
            </div>

        </div>
        <div class="window window--mail window--active" data-window="docs" style="display:none; width:100%;height:100vh;top:0;left:0;">
            <div class="window__titlebar">
                <div class="window__controls window__controls--left">
                    <a class="window__icon" href="#"><i class="uil uil-document-info"></i></i></a>
                    <a class="window__menutoggle" href="#"><i class="uil uil-bars"></i></a>
                </div>



                <span class="window__title">Docs</span>

                <div class="window__controls window__controls--right">
                    <a class="window__minimize" href="#"><i class="uil uil-minus"></i></a>
                    <a class="window__maximize" href="#"><i class="uil uil-square"></i></a>
                    <a class="window__close" href="#"><i class="uil uil-multiply"></i></a>
                </div>
            </div>


            <ul class="window__menu">
                <li>
                    <a href="#">
                        <i class="menu__icon fa fa-search"></i>
                        Search
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="menu__icon fa fa-share-alt"></i>
                        Share
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="menu__icon fa fa-plug"></i>
                        Devices
                    </a>
                </li>
                <li class="divided">
                    <a href="#">
                        <i class="menu__icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>
            </ul>

            <div class="window__body">
                <iframe class="frame" id="iframeid" src="./docs/"></iframe>
            </div>

        </div>
    </main>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

    

    <script src="./screen.js"></script>


</body>

</html>