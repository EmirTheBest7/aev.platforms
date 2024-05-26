<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ΛΞV | Investor Relations</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <nav class="Navbar">
        <a href="https://aliev.io/" class="Toggle Navbar-toggle d-none d-sm-block">
            <i class="uil uil-estate"></i>
		</a>

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
                    <li class="tabitem app-name">Investor Relations</li>
                    <li class="tabitem active"><a href="#box1"><i class="uil uil-graph-bar"></i> Stock Price<span></span></a></li>
                    <li class="tabitem"><a href="#box2"><i class="uil uil-newspaper"></i> News<span></span></a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div id="box1" class="box show">   

                <div class="first-section" id="top">
                <!-- particles.js container --> 
                    <div id="particles-js">
                        <div class="btext">
                            <h1 class="text-light">Information for shareholders</h1>
                            <h2 class="text-light">In this section, Λ L I Ξ V Platforms. publishes information for its shareholders. Directly from leading experts you can trust</h2>
                        </div>
                        <canvas class="particles-js-canvas-el" width="971" height="550" style="width: 100%; height: 100%;"></canvas>
                    </div> 
                    
                </div>
                

                <div class="item">
                    <div class="itemhead">
                        <h1>Dear Shareholders,</h1>
                    </div>
                    <p> We appreciate your interest in our company and your desire to invest. As a startup, we are committed to growth and innovation. Currently, our stock is not available for purchase because we are in the early stages of development. However, we have ambitious plans to expand and reach new milestones.</p>

                    <p> Our goal is to continue building a strong foundation, enhance our product offerings, and achieve sustainable growth. Once we reach a more mature stage, we will explore options such as an Initial Coin Offering (ICO) to raise capital. Until then, we kindly ask for your patience and continued support.</p>

                    <p> Thank you for believing in our vision. We look forward to sharing our progress with you as we move forward on this exciting journey.</p>

                    <p> Sincerely,</p>

                    <p> ΛΞV Team </p>
                </div>
                
                        
            </div>

            <div id="box2" class="box">
                <iframe class="news-iframe" src="https://e.widgetbot.io/channels/1244065397611823264/1244076984619892736"></iframe>
            </div>
        </div>

    </main>

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="./script.js"></script>

</body>

</html>