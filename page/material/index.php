<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Material</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
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

    <main>
        <div class="toolbar">
            <div class="tabs">
                <ul>
                    <li class="tabitem app-name">App</li>
                    <li class="tabitem active"><a href="#box1"><i class="uil uil-airplay"></i> ALL<span></span></a></li>
                    <li class="tabitem"><a href="#box2">FAVORITES<span></span></a></li>
                    <li class="tabitem"><a href="#box3">Test<span></span></a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div id="box1" class="box show">
                <div class="item">
                    <div class="itemhead">
                        <img src="https://polymer-tut.appspot.com/images/avatar-01.svg" width="70" height"70" />
                        <h2>Eric</h2>
                        <div class="heart">
                            <svg viewBox="0 0 24 24"
                                style="pointer-events: none; width: 24px; height: 24px; display: block;">
                                <g id="favorite">
                                    <path
                                        d="M12,21.4L10.6,20C5.4,15.4,2,12.3,2,8.5C2,5.4,4.4,3,7.5,3c1.7,0,3.4,0.8,4.5,2.1C13.1,3.8,14.8,3,16.5,3C19.6,3,22,5.4,22,8.5c0,3.8-3.4,6.9-8.6,11.5L12,21.4z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <p>Have you heard about the Web Components revolution?</p>
                    <p>Click to tabs!</p>
                </div>
                <div class="item">
                    <div class="itemhead">
                        <img src="https://polymer-tut.appspot.com/images/avatar-05.svg" width="70" height"70" />
                        <h2>Norberrt</h2>
                        <div class="heart">
                            <svg viewBox="0 0 24 24"
                                style="pointer-events: none; width: 24px; height: 24px; display: block;">
                                <g id="favorite">
                                    <path
                                        d="M12,21.4L10.6,20C5.4,15.4,2,12.3,2,8.5C2,5.4,4.4,3,7.5,3c1.7,0,3.4,0.8,4.5,2.1C13.1,3.8,14.8,3,16.5,3C19.6,3,22,5.4,22,8.5c0,3.8-3.4,6.9-8.6,11.5L12,21.4z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <p>Decentralize! No canvas, no polymer.</p>
                    <p><strong>Needs only CSS and pure javascript!</strong></p>
                </div>
            </div>
            <div id="box2" class="box">
                <div class="item">
                    <div class="itemhead">
                        <img src="https://polymer-tut.appspot.com/images/avatar-02.svg" width="70" height"70" />
                        <h2>Rob</h2>
                        <div class="heart">
                            <svg viewBox="0 0 24 24"
                                style="pointer-events: none; width: 24px; height: 24px; display: block;">
                                <g id="favorite">
                                    <path
                                        d="M12,21.4L10.6,20C5.4,15.4,2,12.3,2,8.5C2,5.4,4.4,3,7.5,3c1.7,0,3.4,0.8,4.5,2.1C13.1,3.8,14.8,3,16.5,3C19.6,3,22,5.4,22,8.5c0,3.8-3.4,6.9-8.6,11.5L12,21.4z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <p>Loving this Polymer thing. This tab app from Polymer projects.</p>
                    <p><a href="http://www.polymer-project.org/samples/tutorial/finished/index.html" target="_blank">YOU
                            CAN SEE IT ON THIS LINK</a></p>
                </div>
            </div>
            <div id="box3" class="box">
                <div class="item">
                    <div class="itemhead">
                        <h2>test</h2>
                    </div>
                    <p>Loving this Polymer thing. This tab app from Polymer projects.</p>
                    <p><a href="http://www.polymer-project.org/samples/tutorial/finished/index.html" target="_blank">YOU
                            CAN SEE IT ON THIS LINK</a></p>
                </div>
            </div>
        </div>

    </main>

    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>