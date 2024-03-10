<?php 


include('../../../_inc/functions.php');

session_start();
auth();

//
// ?watch=
// ?read=
// 

/*
if (isset($_GET['watch'])) {
  $content = 1;
} 
else if (isset($_GET['listen'])) {
  $content = 2;
}
else if (isset($_GET['read'])) {
  $content = 3;
}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Watch</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-grid.css">
  <link rel="stylesheet" href="../assets/css/style.css">

  <?php if (isset($_GET['watch'])) { ?>
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/aev-video.css "?>">
    <link rel="stylesheet" href="./watch.css">
  <?php } ?>

  <?php if (isset($_GET['read'])) { ?>
    <link rel="stylesheet" href="./read.css">
  <?php } ?>

  <?php if (isset($_GET['listen'])) { ?>
    <link rel="stylesheet" href="./listen.css">
  <?php } ?>
  


</head>

<body>

  <div class="video-app">
    <?php include("../inc/header.php"); ?>
    <div class="wrapper">
      <?php include("../inc/menu.php"); ?>
      <div class="main-container">

          <?php if (isset($_GET['watch'])) { ?>
          <section class="video-section">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-lg-8">
                  <div class="displayed-video">
                    <div class="video-image">
                      <div class="video-container image-container aspect-ratio-16by9">
                        <div id="video_player">
                          <div class="videoSpinner">

                          </div>
                          <video preload="metadata" id="main-video">
                            <source src="./video.mp4" id="id_videoSource" type="video/mp4">
                          </video>
                          <div class="thumbnail"></div>
                          <div class="progressAreaTime">0:00</div>

                          <div class="controls">
                            <div class="progress-area">
                              <!-- <style data-css-webkit-slider-thumb="cwst" type="text/css"></style> -->
                              <input type="range" name="progressBar" id="id_progressBar" step="0.1" min="0" max="100"
                                value="0" class="progress-bar">
                              <span></span>
                            </div>

                            <div class="controls-list">
                              <div class="controls-left">
                                <span class="icon">
                                  <i class="material-icons play_pause">play_arrow</i>
                                </span>
                                <span class="icon">
                                  <i class="material-icons volume">volume_up</i>
                                  <input type="range" min="0" max="100" value="100" class="volume_range" />
                                </span>
                                <div class="timer">
                                  <span class="current">0:00</span> /
                                  <span class="duration">0:00</span>
                                </div>
                              </div>

                              <div class="controls-right">
                                <span class="icon">
                                  <i class="material-icons settingsBtn">settings</i>
                                </span>
                                <span class="icon mobile-hide">
                                  <i class="material-icons picture_in_picutre">picture_in_picture_alt</i>
                                </span>
                                <span class="icon mobile-hide">
                                  <img src="<?php echo LOGO; ?>" style="height: 12px;" />
                                </span>
                                <span class="icon">
                                  <i class="material-icons fullscreen">fullscreen</i>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div id="settings">
                            <div class="playback">
                              <span>Playback Speed</span>
                              <ul>
                                <li data-speed="0.25">0.25</li>
                                <li data-speed="0.5">0.5</li>
                                <li data-speed="0.75">0.75</li>
                                <li data-speed="1" class="active">Normal</li>
                                <li data-speed="1.25">1.25</li>
                                <li data-speed="1.5">1.5</li>
                                <li data-speed="1.75">1.75</li>
                                <li data-speed="2">2</li>
                              </ul>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="video-information">
                      <div class="video-title">
                        <h2>THRILL PILL, Егор Крид & MORGENSHTERN - Грустная Песня</h2>
                      </div>
                      <div class="video-description">Что-то с чем то</div>
                    </div>
                  </div>

                  <div class="channel"></div>

                  <div class="comment-wrapper">
                    <!-- Theme options-->

                      <div class="center-block">
                        <div class="box-theme-option">
                          <div class="box-theme-option-inner">
                            <div class="addonz-form-inline">
                              <label class="addonz-switch">
                                <input class="addonz-switch-input dark" type="checkbox" /><span
                                  class="addonz-switch-inner">Light</span>
                              </label>
                            </div>
                            <div class="selected-color-content">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="center-block">
                        <div class="media-comment">
                          <a class="avatar-content" href="javascript://">
                            <img class="avatar" src="<?php echo $_SESSION['user_photo']; ?>" width="70" height="70" />
                          </a>
                          <div class="media-content">
                            <div class="media-comment-body">
                              <div class="media-option">
                                <a class="ripple-grow" href="javascript://">
                                  <i class="uil uil-ellipsis-h"></i>
                                </a>
                              </div>
                              <div class="media-comment-data-person">
                                <a class="media-comment-name" href="javascript://">{Username}</a><span class="text-muted">2 h</span>
                              </div>
                                <div class="media-comment-text">
                                  Sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                  sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. 
                                  Fusce condimentum nunc ac nisi vulputate fringilla.
                                </div>
                            </div>
                            <div class="media-comment-footer">
                              <a class="media-footer-option repply" href="javascript://">
                                <span class="icon-bubble-content"><i class="uil uil-comment"></i></span>
                                <span class="media-footer-option-text">x</span>
                              </a>
                              <a class="media-footer-option like" href="javascript://">
                                <span class="icon-bubble-content"><i class="uil uil-heart-alt"></i></span>
                                <span class="media-footer-option-text">x</span>
                              </a>
                              <a class="media-footer-option share" href="javascript://">
                                <span class="icon-bubble-content"><i class="uil uil-comment-share"></i></span>
                              </a>
                            </div>
                            <!---->
                            <!-- Collapse button-->
                            <a class="collapse-repply" href="javascript://">
                              <i class="uil uil-angle-down"></i>
                              45 Replies
                            </a>

                            <!-- Repply-->
                            <div class="media-comment">
                              <a class="avatar-content" href="javascript://">
                                  <img class="avatar" src="<?php echo $_SESSION['user_photo'] ?>" width="55" height="55" />
                              </a>
                              <div class="media-content">
                                  <div class="media-comment-body">
                                      <div class="media-option">
                                          <a class="ripple-grow" href="javascript://">
                                              <i class="uil uil-ellipsis-h"></i>
                                          </a>
                                      </div>
                                      <div class="media-comment-data-person">
                                          <a class="media-comment-name" href="javascript://">{Username}</a>
                                          <span class="text-muted">25 min</span>
                                      </div>
                                      <div class="media-comment-text">
                                          Sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                          ante sollicitudin. Cras purus odio, vestibulum in vulputate.
                                      </div>
                                  </div>

                                  <div class="media-comment-footer">
                                      <a class="media-footer-option repply" href="javascript://">
                                          <span class="icon-bubble-content"><i class="uil uil-comment"></i></span>
                                          <span class="media-footer-option-text">x</span>
                                      </a>
                                      <a class="media-footer-option like" href="javascript://">
                                          <span class="icon-bubble-content"><i class="uil uil-heart-alt"></i></span>
                                          <span class="media-footer-option-text">x</span>
                                      </a>
                                      <a class="media-footer-option share" href="javascript://">
                                          <span class="icon-bubble-content"><i class="uil uil-comment-share"></i></span>
                                      </a>
                                  </div>
                              </div>
                          </div>
                            <!-- Repply-->
                            
                          </div>
                        </div>
                        <!-- Show more content-->
                        <div class="loading-content">
                          <svg class="svg-loading" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px"
                            viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                            <path opacity="0.2" fill="#000"
                              d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z">
                            </path>
                            <path fill="#000"
                              d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z">
                              <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20"
                                to="360 20 20" dur="0.5s" repeatCount="indefinite"></animateTransform>
                            </path>
                          </svg>
                        </div>

                      </div>
                  </div>

                </div>
                <div class="col-md-12 col-lg-4">
                  <div class="character-container">
                    <div class="add-ctl">Hello</div>
                    <div class="video-list">
                      <div class="list-item">
                        <div class="video-card active">
                          <div class="video-card-thumb">
                            <div class="image-container aspect-ratio-16by9">
                              <div class="image-background"
                                style="background-image: url(&quot;https://d2r55xnwy6nx47.cloudfront.net/uploads/2015/05/InTheory_Ft_BH_1920x10801-520x293.jpg&quot;);">
                              </div>
                              <div class="image-content-container">
                                <div class="video-play-icon"><img
                                    src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzIwMCcgd2lkdGg9JzIwMCcgIGZpbGw9IiM1MUE3RjkiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMDAgMTAwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZD0iTTg2LDU1LjVjLTAuNiwxLTEuNSwxLjgtMi41LDIuNEwyNi42LDg3LjljLTAuOSwwLjUtMiwwLjctMywwLjdjLTMuNiwwLTYuNC0yLjktNi40LTYuNFYxNy44ICBjMC0zLjYsMi45LTYuNCw2LjQtNi40YzEuMiwwLDIuMywwLjMsMy4zLDAuOWw1Ni45LDM0LjNDODYuOCw0OC41LDg3LjgsNTIuNCw4Niw1NS41eiI+PC9wYXRoPjwvc3ZnPg==">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="video-card-content">
                            <div class="video-title">Video {x}</div>
                            <div class="video-duration">2:18</div>
                          </div>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="video-card">
                          <div class="video-card-thumb">
                            <div class="image-container aspect-ratio-16by9">
                              <div class="image-background"
                                style="background-image: url(&quot;https://d2r55xnwy6nx47.cloudfront.net/uploads/2017/04/DysonPaintingStill-520x293.jpg&quot;);">
                              </div>
                              <div class="image-content-container">
                                <div class="video-play-icon"><img
                                    src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzIwMCcgd2lkdGg9JzIwMCcgIGZpbGw9IiM1MUE3RjkiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMDAgMTAwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZD0iTTg2LDU1LjVjLTAuNiwxLTEuNSwxLjgtMi41LDIuNEwyNi42LDg3LjljLTAuOSwwLjUtMiwwLjctMywwLjdjLTMuNiwwLTYuNC0yLjktNi40LTYuNFYxNy44ICBjMC0zLjYsMi45LTYuNCw2LjQtNi40YzEuMiwwLDIuMywwLjMsMy4zLDAuOWw1Ni45LDM0LjNDODYuOCw0OC41LDg3LjgsNTIuNCw4Niw1NS41eiI+PC9wYXRoPjwvc3ZnPg==">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="video-card-content">
                            <div class="video-title">Video {x}</div>
                            <div class="video-duration">2:18</div>
                          </div>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="video-card">
                          <div class="video-card-thumb">
                            <div class="image-container aspect-ratio-16by9">
                              <div class="image-background"
                                style="background-image: url(&quot;https://d2r55xnwy6nx47.cloudfront.net/uploads/2016/10/2015-05-26-14.48.01-520x390.jpg&quot;);">
                              </div>
                              <div class="image-content-container">
                                <div class="video-play-icon"><img
                                    src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzIwMCcgd2lkdGg9JzIwMCcgIGZpbGw9IiM1MUE3RjkiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMDAgMTAwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZD0iTTg2LDU1LjVjLTAuNiwxLTEuNSwxLjgtMi41LDIuNEwyNi42LDg3LjljLTAuOSwwLjUtMiwwLjctMywwLjdjLTMuNiwwLTYuNC0yLjktNi40LTYuNFYxNy44ICBjMC0zLjYsMi45LTYuNCw2LjQtNi40YzEuMiwwLDIuMywwLjMsMy4zLDAuOWw1Ni45LDM0LjNDODYuOCw0OC41LDg3LjgsNTIuNCw4Niw1NS41eiI+PC9wYXRoPjwvc3ZnPg==">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="video-card-content">
                            <div class="video-title">Video {x}</div>
                            <div class="video-duration">2:35</div>
                          </div>
                        </div>
                      </div>
                      <div class="list-item">
                        <div class="video-card">
                          <div class="video-card-thumb">
                            <div class="image-container aspect-ratio-16by9">
                              <div class="image-background"
                                style="background-image: url(&quot;https://d2r55xnwy6nx47.cloudfront.net/uploads/2016/10/2015-05-26-14.48.01-520x390.jpg&quot;);">
                              </div>
                              <div class="image-content-container">
                                <div class="video-play-icon"><img
                                    src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzIwMCcgd2lkdGg9JzIwMCcgIGZpbGw9IiM1MUE3RjkiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxMDAgMTAwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHBhdGggZD0iTTg2LDU1LjVjLTAuNiwxLTEuNSwxLjgtMi41LDIuNEwyNi42LDg3LjljLTAuOSwwLjUtMiwwLjctMywwLjdjLTMuNiwwLTYuNC0yLjktNi40LTYuNFYxNy44ICBjMC0zLjYsMi45LTYuNCw2LjQtNi40YzEuMiwwLDIuMywwLjMsMy4zLDAuOWw1Ni45LDM0LjNDODYuOCw0OC41LDg3LjgsNTIuNCw4Niw1NS41eiI+PC9wYXRoPjwvc3ZnPg==">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="video-card-content">
                            <div class="video-title">Video {x}</div>
                            <div class="video-duration">2:35</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <?php } if (isset($_GET['listen'])) { ?>

          <div class="music-player-container">
            <div class="music-player-content">
              <div class="music-player-main">
                <div class="current-select-category-container">
                  <div class="current-select-category-info">
                    <div class="selected-type">
                      <input type="checkbox" id="toggle" class="toggle-checkbox" />
                      <label for="toggle" class='toggle-container'>
                        <div>Song</div>
                        <div>Video</div>
                      </label>
                    </div>
                    <div class="poster-box">
                      <div class="front">
                        <div class="overlay"></div>
                      </div>
                      <div class="back">
                        <h4>About Starboy</h4>
                        <p><strong>Starboy</strong> is The Weeknd’s highly anticipated third studio album (excluding the mixtape
                          compilation album Trilogy). The “king of the fall” announced the album after teasing his fans on his
                          instagram. He dropped the first single, “Starboy” ft. Daft Punk on September 21st 2016, one day before
                          the start of the fall season in North America.</p>
                      </div>
                    </div>
                    <div class="poster-info">
                      <div class="poster-main-info">
                        <h2>Starboy</h2>
                        <p>The Weeknd</p>
                      </div>
                    </div>
                  </div>
                  <div class="current-select-category-content">
                    <div class="tabs">
                      <div class="tab active">Up Next</div>
                      <div class="tab">Lyrics</div>
                      <div class="tab">Related</div>
                    </div>
                    <div class="song-list scrollbar">
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Starboy</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Party Monster</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item active">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>False Alarm</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Reminder</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Rockin’</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Secrets</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>True Colors</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Stargirl Interlude</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                      <div class="song-list-item">
                        <div class="thumbnail"></div>
                        <div class="song-info">
                          <div class="song-name">
                            <h3>Sidewalks</h3>
                            <p>The Weeknd</p>
                          </div>
                          <div class="song-duration">
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 10.15625 6 C 8.746094 6 7.515625 6.996094 7.21875 8.375 L 5.0625 18.375 C 4.667969 20.222656 6.113281 22 8 22 L 13.75 22 L 13.5625 22.75 C 13.359375 22.90625 13.230469 22.972656 12.9375 23.375 C 12.46875 24.015625 12 25.007813 12 26.34375 C 12 27.769531 13.289063 29 14.90625 29 L 15.3125 29 L 15.625 28.71875 L 22.40625 22 L 27 22 L 27 6 Z M 10.15625 8 L 21 8 L 21 20.59375 L 14.59375 26.90625 C 14.171875 26.824219 14 26.652344 14 26.34375 C 14 25.441406 14.273438 24.882813 14.53125 24.53125 C 14.789063 24.179688 14.96875 24.09375 14.96875 24.09375 L 15.3125 23.90625 L 15.4375 23.5 L 16.03125 21.25 L 16.34375 20 L 8 20 C 7.339844 20 6.894531 19.425781 7.03125 18.78125 L 9.15625 8.78125 C 9.257813 8.3125 9.679688 8 10.15625 8 Z M 23 8 L 25 8 L 25 20 L 23 20 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M 16.6875 3 L 16.375 3.28125 L 9.59375 10 L 5 10 L 5 26 L 21.84375 26 C 23.253906 26 24.484375 25.003906 24.78125 23.625 L 26.9375 13.625 C 27.332031 11.777344 25.886719 10 24 10 L 18.25 10 L 18.4375 9.25 C 18.640625 9.09375 18.769531 9.027344 19.0625 8.625 C 19.53125 7.984375 20 6.992188 20 5.65625 C 20 4.230469 18.710938 3 17.09375 3 Z M 17.40625 5.09375 C 17.828125 5.175781 18 5.347656 18 5.65625 C 18 6.558594 17.726563 7.117188 17.46875 7.46875 C 17.210938 7.820313 17.03125 7.90625 17.03125 7.90625 L 16.6875 8.09375 L 16.5625 8.5 L 15.96875 10.75 L 15.65625 12 L 24 12 C 24.660156 12 25.105469 12.574219 24.96875 13.21875 L 22.84375 23.21875 C 22.742188 23.6875 22.320313 24 21.84375 24 L 11 24 L 11 11.40625 Z M 7 12 L 9 12 L 9 24 L 7 24 Z" />
                                </svg>
                            </button>
                            <button>
                              <svg xmlns="http://www.w3.org/2000/svg" id="map" viewBox="0 0 530.1818 533.4545">
                                <polygon class="cls-1"
                                  points="461.271 466 80.056 466 80.056 342.625 124.056 342.625 124.056 422 417.271 422 417.271 342.625 461.271 342.625 461.271 466" />
                                <polygon class="cls-1"
                                  points="375.67 216.627 292.663 296.793 292.663 75.562 248.663 75.562 248.663 296.793 165.657 216.627 135.091 248.276 270.663 379.21 406.236 248.276 375.67 216.627" />
                                </svg>
                            </button>
                            <span>2:52</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="music-player">
                <div class="current-playing-time"></div>

                <div class="current-playing-song-controls">
                  <div class="song-name">
                    <h4>The Weeknd - False Alarm (Audio)</h4>
                    <p><strong>The Weeknd</strong></p>
                  </div>

                  <div class="controls">
                    <button>
                      <svg data-v-74fd3200="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="17" height="17">
                        <path data-v-74fd3200="" fill="#fff"
                          d="M512 387.67L405.406 281.024v84.694h-10.435c-68.152 0-102.461-56.146-142.191-121.157-40.72-66.633-86.875-142.158-179.637-142.158H0v43.886h73.143c68.152 0 102.461 56.146 142.191 121.157 40.72 66.633 86.875 142.158 179.637 142.158h10.435v84.686L512 387.67z">
                        </path>
                        <path data-v-74fd3200="" fill="#fff"
                          d="M512 124.355L405.406 17.71v84.695h-10.435c-66.714 0-109.319 39.063-143.135 85.788 9.055 13.584 17.433 27.249 25.391 40.268 31.024-46.945 63.77-82.172 117.744-82.172h10.435v84.686L512 124.355zM190.887 283.548c-31.024 46.943-63.77 82.17-117.744 82.17H0v43.886h73.143c66.714 0 109.319-39.063 143.135-85.788-9.056-13.584-17.433-27.249-25.391-40.268z">
                        </path>
                      </svg>
                    </button>
                    <button>
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 16 16">
                        <path fill="#fff" d="M14 15V1L4 8zM2 1h2v14H2V1z" />
                      </svg>
                    </button>
                    <button class="play-button">
                      <svg data-v-0971d7ee="" width="16" height="20" viewBox="0 0 42 40" xmlns="http://www.w3.org/2000/svg">
                        <polygon data-v-0971d7ee="" fill="#fff" points="0,0,0,40,18.032,29.982,17.971,9.984"></polygon>
                        <polygon data-v-0971d7ee="" fill="#fff" points="18.032,29.982,35.823,20.099,36,20,17.971,9.984">
                        </polygon>
                      </svg>
                    </button>
                    <button>
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 16 16">
                        <path fill="#fff" d="M2 1v14l10-7zM12 1h2v14h-2V1z" />
                      </svg>
                    </button>
                    <button>
                      <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" width="20" height="20" viewBox="0 0 1024 1024">
                        <path fill="#fff"
                          d="M764.16 213.333333h-512l55.466667-55.04a42.666667 42.666667 0 0 0-60.586667-60.586666l-128 128a42.666667 42.666667 0 0 0 0 60.586666l128 128a42.666667 42.666667 0 0 0 60.586667 0 42.666667 42.666667 0 0 0 0-60.586666L252.16 298.666667h512a66.56 66.56 0 0 1 67.84 65.28V469.333333a42.666667 42.666667 0 0 0 85.333333 0V363.946667A151.893333 151.893333 0 0 0 764.16 213.333333zM776.96 609.706667a42.666667 42.666667 0 0 0-60.586667 60.586666l55.466667 55.04h-512a66.56 66.56 0 0 1-67.84-65.28V554.666667a42.666667 42.666667 0 0 0-85.333333 0v105.386666A151.893333 151.893333 0 0 0 259.84 810.666667h512l-55.466667 55.04a42.666667 42.666667 0 0 0 0 60.586666 42.666667 42.666667 0 0 0 60.586667 0l128-128a42.666667 42.666667 0 0 0 0-60.586666z" />
                      </svg>
                    </button>
                  </div>
                  <div class="volume-controls">
                    <svg data-v-0971d7ee="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                      <g data-v-0971d7ee="" fill="#dadadd" class="level-2">
                        <path data-v-0971d7ee=""
                          d="M37.992 22.752l-3.084 3.083A8.648 8.648 0 0 1 37.48 32c0 2.411-.984 4.593-2.572 6.165l3.084 3.083A13.047 13.047 0 0 0 41.82 32c0-3.611-1.463-6.88-3.828-9.248z">
                        </path>
                        <path data-v-0971d7ee=""
                          d="M50.496 32c0-6.005-2.44-11.441-6.383-15.369l-3.053 3.053A17.371 17.371 0 0 1 46.158 32c0 4.809-1.949 9.162-5.098 12.316l3.053 3.053A21.628 21.628 0 0 0 50.496 32z">
                        </path>
                        <path data-v-0971d7ee=""
                          d="M59.174 32c0-8.402-3.413-16.006-8.926-21.505l-3.068 3.068A25.95 25.95 0 0 1 54.835 32a25.95 25.95 0 0 1-7.655 18.437l3.068 3.068c5.513-5.498 8.926-13.103 8.926-21.505z">
                        </path>
                        <polygon data-v-0971d7ee="" points="21.085 66 44 87.208 44 12.791 21.517 34 0 34 0 66"
                          transform="matrix(.5754 0 0 .5754 3.343 3.23)"></polygon>
                      </g>
                    </svg>
                    <div class="volume"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php } if (isset($_GET['read'])) { ?>

          <div class="section">
            <div class="article-header"
              style="background:url(https://mobirise.com/bootstrap-template/assets/images/coffee-923094-1920-1920x1280-16.jpg);">
              <div class="article-container">
                <a class="tag">[Новости]</a>
                <h1 style="text-align: left; font-size: calc(32px + 8*(100vw - 375px)/625); letter-spacing: -.7px;">
                  Тим Кук ответил,
                  почему Apple не хочет поддерживать RCS — стандарт, заменяющий SMS
                </h1>
                <div class="author">
                  <img src="<?php echo $_SESSION['user_photo']; ?>">
                  Emir Aliev&nbsp;<i class="uil uil-check-circle"></i>
                </div>

                <div class="article-info">
                  <span>9 сентября, 2022 | 6 минут на чтение</span>
                  <span><i class="uil uil-comment-alt-lines"></i>&nbsp;|&nbsp; <i class="uil uil-link"></i></span>
                </div>
              </div>

            </div>
            <div class="">
              <div class="container article-container">
                <div class="row">
                  <a class="subscribe-btn"><i class="uil uil-telegram-alt"></i>&nbsp;Подписывайтесь</a>

                  <article class="article" style="margin: 3.75rem 0 0;
                    line-height: 1.75;
                    font-size: 1.125rem;">
                    <p>
                      Это первый раз, когда Тим Кук публично затронул тему стандарта Rich Communications
                      Services. Эта технология призвана заменить существующие стандарты SMS и MMS, так как
                      предлагает поддержку фото и видео с более высоким разрешением, файлов с большими
                      размерами, наличие аудиосообщений, улучшенное шифрование, эмодзи и групповые чаты.
                    </p>
                    <p>
                      Напомним, в августе 2022 года команда разработчиков Android запустила новый сайт
                      «Get the Message», который вновь призывает Apple принять RCS. Сайт напоминает о
                      необходимости решить проблему кросс-платформенного обмена сообщениями между
                      пользователями Android и iOS.
                    </p>
                    <p>
                      RCS может объединить всех пользователей смартфонов и предоставить всем безопасный,
                      современный опыт обмена сообщениями, — считают в Google.
                      По уверениям разработчиков, «дело не в цвете пузырьков», а в том, что это крошечные
                      фото и видео, невозможность отправки SMS через Wi-Fi и отсутствие отчётов о
                      прочтении. В компании считают, что Apple создаёт эти проблемы, когда люди пишут друг
                      другу сообщения с iPhone и Android-смартфонов.
                    </p>

                   
                  </article>
                   <img class="pt-5" src="./ad-banner.png"/>
                </div>
              </div>
            </div>
          </div>
          
          <?php } ?>


        <?php include("../inc/footer.php"); ?>
      
      </div>

      
    </div>

    <!-- partial:index.partial.html -->



    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="<?php echo BASE_URL . "_assets/js/aev-video.js"; ?>"></script>
    <script src="../assets/js/script.js"></script>

    <script>
/*
      $( document ).ready(function() {
        var adManager = function () {
          var vid = document.getElementById("main-video"),
              adSrc = "./small.mp4", src;
          //$(".controls").hide(); Hide 

          var adEnded = function () {
              vid.removeEventListener("ended", adEnded, false);
              vid.src = "./video.mp4";
              vid.load();
              vid.play();
          };
          return {
              init: function () {
                  src = vid.src;
                  vid.src = adSrc;
                  vid.load();
                  vid.addEventListener("ended", adEnded, false);
            
              }
          };
        }().init();		
		  });
*/    
    </script>


</body>

</html>