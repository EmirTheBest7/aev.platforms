<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>ΛΞV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="./style.css">

    <style>

        main {
            position: relative;
            left: unset!important;
        }
    
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->

    <nav class="Navbar">
        <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
            data-target="#navbarCollapse"><span></span></a>

        <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

        <div id="navbarCollapse" class="Navbar-menu"></div>

        <ul class="Navbar-quickLinks"></ul>
    </nav>

    <main id="main">
        <div class="main-content">

            <!-- Header -->
            <div class="header">
                <div class="header__container">
                    <div class="header__left">
                        <h1>Downloads</h1>
                        <p>Here, you can find important Λ L I Ξ V documents, which can be beneficial for cooperation.</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <nav class="c-tabs secondary-nav" data-toggle="c-tabs" role="navigation">
                <ul class="c-tab--navigation secondary-nav__list">
                    <li class="c-tab--item secondary-nav__item active"><a href="#test1" class="active">Logos</a></li>
                    <li class="c-tab--item secondary-nav__item hide"><a href="#test2">Wallpapers</a></li>
                    <li class="c-tab--item secondary-nav__item hide"><a href="#test3">Programs</a></li>
                    <li class="c-tab--item secondary-nav__item"><a href="#test4">Docs</a></li>
                    <li class="c-tab--slider">
                        <div class="c-tab-indicator"></div>
                    </li>
                </ul>
            </nav>
            <div class="c-tab--content-container">
                <div id="test1" class="c-tab--content active">
                    <article class="video-sec-wrap">
                        <div class="video-sec">
                            <ul class="video-sec-middle" id="vid-grid">
                            
                                <li class="thumb-wrap">
                                    <div class="card">
                                        <div class="front">
                                            <div class="branded">
                                                <img src="<?php echo BASE_URL . "page/downloads/logo/ALIEV.svg"; ?>">
                                            </div>
                                            <div class="content">
                                                <div class="main" style=" color: white; border-top: 1px solid white;   position: relative;padding: 6px 15px;height: 36px;display: flex;justify-content: space-between;">
                                                    <div>Logo_</div>
                                                    <button onclick="window.open('<?php echo BASE_URL . "/home/_api/Docs/"  ?>')" class="btn ripple-button" style="padding: 0;width: 50px;"><i class="bi bi-filetype-doc"></i></button>
                                                    <button onclick="window.open('./logo/ALIEV.svg')" class="btn ripple-button" style="padding: 0;width: 50px;"><i class="bi bi-cloud-download"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="thumb-wrap">
                                    <div class="card">
                                        <div class="front">
                                            <div class="branded">
                                                <img style="filter: invert(1);"
                                                    src="<?php echo BASE_URL . "page/downloads/logo/weblogo.svg"; ?>">
                                            </div>
                                            <div class="content">
                                                <div class="main" style=" color: white; border-top: 1px solid white;   position: relative;padding: 6px 15px;height: 36px;display: flex;justify-content: space-between;">
                                                    <div>E.COM</div>
                                                    <button onclick="window.open('./logo/ALIEV.svg')" class="btn ripple-button" style="padding: 0;">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="thumb-wrap">
                                    <div class="card">
                                        <div class="front">
                                            <div class="branded">
                                                <img style="filter: invert(1);"
                                                    src="<?php echo BASE_URL . "page/downloads/logo/Dreamers.svg"; ?>">
                                            </div>
                                            <div class="content">
                                                <div class="main" style=" color: white; border-top: 1px solid white;   position: relative;padding: 6px 15px;height: 36px;display: flex;justify-content: space-between;">
                                                    <div>Dreamers</div>
                                                    <button onclick="window.open('./logo/Dreamers.svg')"
                                                        class="btn ripple-button" style="padding: 0;">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="thumb-wrap">
                                    <div class="card">
                                        <div class="front">
                                            <div class="branded">
                                                <img style="filter: invert(1);"
                                                    src="<?php echo BASE_URL . "page/downloads/logo/ALIEV_3D.png"; ?>">
                                            </div>
                                            <div class="content">
                                                <div class="main" style=" color: white; border-top: 1px solid white;   position: relative;padding: 6px 15px;height: 36px;display: flex;justify-content: space-between;">
                                                    <div>Logo_3D</div>
                                                    <button onclick="window.open('./logo/ALIEV_3D.png')"
                                                        class="btn ripple-button" style="padding: 0;">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </article>
                </div>
                <div id="test2" class="c-tab--content">
                    <article class="video-sec-wrap">
                        <div class="video-sec">
                            <ul class="video-sec-middle" id="vid-grid">
                                <li class="thumb-wrap">
                                    <div class="card">
                                        <div class="front">
                                            <div class="branded">
                                                <img src="<?php echo BASE_URL . "page/downloads/logo/ALIEV.svg"; ?>">
                                            </div>
                                            <div class="content">
                                                <div class="main" style=" color: white; border-top: 1px solid white;   position: relative;padding: 6px 15px;height: 36px;display: flex;justify-content: space-between;">
                                                    <div>Logo_</div>
                                                    <button onclick="window.open('./logo/ALIEV.svg')"
                                                        class="btn ripple-button" style="padding: 0;">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>
                <div id="test3" class="c-tab--content">Software</div>
                <div id="test4" class="c-tab--content">
                    <table class="rwd-table video-sec">
                        <tbody>
                            <tr>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td data-th="File Name">Whitepaper.pdf</td>
                                <td data-th="Action">-</td>
                            </tr>
                            <tr>
                                <td data-th="File Name">AAEV_Keynote.pptx</td>
                                <td data-th="Action">-</td>
                            </tr>
                            <tr>
                                <td data-th="File Name">ACS_System.pdf</td>
                                <td data-th="Action"><button class="ripple-button" type="submit" onclick="window.location.href='./docs/ACS_System.pdf'">Download</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    <script src="./script.js"></script>

</body>

</html>