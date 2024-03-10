<?php
    define("SITE_ADDR", "http://localhost/CV2/sandbox/search");
    include("./include.php");
    $site_title = 'Froogal';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

    <title>CodePen - Scroll List Animation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        .scroll-list {
            width: 100%;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 18vh;
        }

        @media screen and (max-width: 768px) {
            .scroll-list {
                margin-top: 0;
                padding: 0;
            }
        }

        .scroll-list__wrp {
            height: 88vh;
            overflow: auto;
            padding: 50px;
            box-shadow: 0px 7px 46px 0px rgba(41, 53, 108, 0.45);
            background: #4b1079;
            background: #4b1079;

            border-radius: 25px 25px 0 0;
            background-image: linear-gradient(147deg, #6e0777 0%, #380c70 74%);
        }

        .scroll-list__wrp .scrollbar-track {
            display: none !important;
        }

        @media screen and (max-width: 768px) {
            .scroll-list__wrp {
                padding: 25px;
                margin-bottom: 0;
            }
        }

        .scroll-list__item {
            width: 100%;
            height: 155px;
            display: block;
            margin-bottom: 15px;
            border-radius: 8px;
            background-image: linear-gradient(147deg, #ff7c34 0%, #c31269 74%);
            transition: all 0.35s ease-in-out;
            opacity: 0;
            transform: scale(0.7);
            box-shadow: 0px 7px 16px 0px rgba(41, 53, 108, 0.25);
        }

        .scroll-list__item.item-hide {
            opacity: 0;
            transform: scale(0.7);
        }

        .scroll-list__item.item-focus {
            opacity: 1;
            transform: scale(1);
        }

        .scroll-list__item.item-next {
            opacity: 1;
            transform: scale(1);
        }

        .scroll-list__item.item-next+.scroll-list__item {
            opacity: 1;
            transform: scale(1);
        }

        .scroll-list__item:last-child {
            margin-bottom: 155px;
        }

        .circle {
            width: 54px;
            height: 54px;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->

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

    <div class="wrapper">
        <div class="scroll-list">
            <div class="scroll-list__wrp js-scroll-content js-scroll-list">

                <?php

// CHECK TO SEE IF THE KEYWORDS WERE PROVIDED
if (isset($_POST['k']) && $_POST['k'] != '') {
    
    // save the keywords from the url
    $k = trim($_POST['k']);

    // create a base query and words string
    $query_string = "SELECT * FROM search_engine WHERE ";
    $display_words = "";

    // seperate each of the keywords
    $keywords = explode(' ', $k);
    foreach ($keywords as $word) {
        $query_string .= " keywords LIKE '%".$word."%' OR ";
        $display_words .= $word." ";
    }
    $query_string = substr($query_string, 0, strlen($query_string) - 3);

    // connect to the database
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    $query = mysqli_query($conn, $query_string);
    $result_count = mysqli_num_rows($query);

    // check to see if any results were returned
    if ($result_count > 0) {
        
        // display search result count to user
        echo '<br /><div class="right"><b><u>'.$result_count.'</u></b> results found</div>';
        echo 'Your search for <i>'.$display_words.'</i> <hr /><br />';

        // display all the search results to the user
        while ($row = mysqli_fetch_assoc($query)) {
            echo '

            <div class="scroll-list__item js-scroll-list-item">
            <h3><a href="'.$row['url'].'">'.$row['title'].'</a></h3>

            <tr>
                <td>'.$row['blurb'].'</td>
            </tr>
            <tr>
                <td><i>'.$row['url'].'</i></td>
            </tr>
            
            </div>';
        }

        echo '</table>';
    } else {
        echo 'No results found. Please search something else.';
    }
} else {
    echo '';
}
?>

                
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.3.1/smooth-scrollbar.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.3.1/plugins/overscroll.js'></script>
    <script>
        $(document).ready(function () {
            var Scrollbar = window.Scrollbar;

            Scrollbar.use(window.OverscrollPlugin);

            var customScroll = Scrollbar.init(document.querySelector('.js-scroll-list'), {
                plugins: {
                    overscroll: true
                }
            });

            var listItem = $('.js-scroll-list-item');

            listItem.eq(0).addClass('item-focus');
            listItem.eq(1).addClass('item-next');

            customScroll.addListener(function (status) {

                var $content = $('.js-scroll-content');

                var viewportScrollDistance = 0;


                viewportScrollDistance = status.offset.y;
                var viewportHeight = $content.height();
                var listHeight = 0;
                var $listItems = $content.find('.js-scroll-list-item');
                for (var i = 0; i < $listItems.length; i++) {
                    listHeight += $($listItems[i]).height();
                }

                var top = status.offset.y;
                // console.log(top);
                var visibleCenterVertical = 0;
                visibleCenterVertical = top;

                var parentTop = 1;
                var $lis = $('.js-scroll-list-item');
                var $focusLi;
                for (var i = 0; i < $lis.length; i++) {
                    var $li = $($lis[i]);
                    var liTop = $li.position().top;
                    var liRelTop = liTop - parentTop;

                    var distance = 0;
                    var distance = Math.abs(top - liRelTop);
                    var maxDistance = $('.js-scroll-content').height() / 2;
                    var distancePercent = distance / (maxDistance / 100);


                    if (liRelTop + $li.parent().scrollTop() > top) {
                        if (!$li.hasClass('item-focus')) {
                            $li.prev().addClass('item-hide');
                            $lis.removeClass('item-focus');
                            $lis.removeClass('item-next');
                        }
                        $li.removeClass('item-hide');
                        $li.addClass('item-focus');
                        $li.next().addClass('item-next');
                        break;
                    }
                }
            });

        });
    </script>

</body>

</html>