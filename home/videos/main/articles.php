<?php 


include('../../../_inc/functions.php');

session_start();
auth();

$con = connect();
 
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

                <div class="container">
                    <div class="row">

                      <div class="col-md-12 col-lg-6">
                          <div class="main-header col-12">
                            <h1>Telegram 203</h1>
                            <h3>Новости и авторские материалы о самом инновационном мессенджере в мире! Рассказываем простым языком о том, что происходит внутри проекта.</h3>
                          </div>
                      </div>
                      <div class="col-md-12 col-lg-6">
                          <div class="main-article">
                          </div>
                      </div>

                    </div>
                </div>

                <article class="container video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">

                            
                            <a href="#" class="cards_item">
                                <div class="card_image"><img src="https://picsum.photos/500/300/?image=5"></div>
                                <div class="card_content">
                                    <h2 class="card_title">Article</h2>
                                    <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
                                </div>
                            </a>


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