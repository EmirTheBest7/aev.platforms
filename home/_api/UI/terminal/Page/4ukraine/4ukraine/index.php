<?php 

include("../../../../../../../_inc/functions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ΛΞV - 4Ukraine</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/aev-video.css "?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <!-- partial:index.partial.html -->

  <div class="displayed-video">
    <div class="video-image">
      <div class="video-container image-container aspect-ratio-16by9">
        <div id="video_player">
          <div class="videoSpinner">

          </div>
          <video preload="metadata" id="main-video">
            <source src="./video.MP4" id="id_videoSource" type="video/mp4">
          </video>
          <div class="thumbnail"></div>
          <div class="progressAreaTime">0:00</div>

          <div class="controls">
            <div class="progress-area">
              <!-- <style data-css-webkit-slider-thumb="cwst" type="text/css"></style> -->
              <input type="range" name="progressBar" id="id_progressBar" step="0.1" min="0" max="100" value="0"
                class="progress-bar">
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
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="<?php echo BASE_URL . "_assets/js/aev-video.js"; ?>"></script>


</body>

</html>