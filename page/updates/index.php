<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ΛΞV | Updates</title>
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
                    <li class="tabitem app-name">Updates</li>
                    <li class="tabitem active"><a href="#box1"><i class="uil uil-clipboard-notes"></i> Release<span></span></a></li>
                    <li class="tabitem"><a href="#box2"><i class="uil uil-bug"></i> Report<span></span></a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            
            <div id="box1" class="box show">
                <h1 style="text-align: center;font-size: 3.25rem;font-weight: 400;">Release Updates</h1>
                <div class="item">
                    <div class="itemhead">
                        <h2>[ v168.7.2 ]</h2>
                    </div>
                    <ul style="font-size: 19px; padding: 0 45px;">
                        <li>
                            <strong>New Features</strong>
                            <ul>
                            <li>+ New API Store: <a href="https://aliev.io/home/_api/UI/?Page=store">Link Store</a></li>
                            <li>Why: Sometimes it's just easier and faster to talk things out when inspiration or curiosity strikes, whether that's brainstorming a new business idea, simplifying a complex topic, or rehearsing for an important conversation.</li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="item">
                    <div class="itemhead">
                        <h2>[ Update v2.18 ]</h2>
                    </div>
                    <ul style="font-size: 19px; padding: 0 45px;">
                        <li>
                            <strong>New Maps App</strong>
                            <ul>
                            <li>What: Starting in English, HesterGPT Live is a new way to have natural, free flowing conversations with HesterGPT on your phone. Brainstorm, learn, and practice out loud with real-time spoken responses. HesterGPT adapts to your conversational style so you can interrupt, ask follow-up questions or come back to the conversation later with ease. Now available in HesterGPT Advanced, learn more.</li>
                            <li>Why: Sometimes it's just easier and faster to talk things out when inspiration or curiosity strikes, whether that's brainstorming a new business idea, simplifying a complex topic, or rehearsing for an important conversation.</li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>

            <div id="box2" class="box">
                <h1 style="text-align: center;font-size: 3.25rem;font-weight: 400;"><i class="uil uil-bug"></i> Bugs and Suggestions</h1>
                <div class="item">
                    <div class="itemhead">
                        <h2>Welcome to Our Bugs and Suggestions Page!</h2>
                    </div>
                    <p>
                        We value your feedback and are committed to improving our services. If you encounter any issues or have suggestions, please let us know. Your input helps us enhance your experience.

                        To report a bug or share a suggestion, please use our <a href="https://aliev.io/page/contact/">Contact Form</a>. We appreciate your time and effort in helping us grow!
                    </p>
                </div>

            </div>

        </div>

    </main>

    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>