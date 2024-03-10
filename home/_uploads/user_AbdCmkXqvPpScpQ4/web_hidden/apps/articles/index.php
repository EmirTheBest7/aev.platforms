<?php include('../../../../../../_inc/functions.php'); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - minimal blog concept</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Nunito:400,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../../_assets/css/style.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="app">
    <div class="window">
        <div class="header">
          <div class="burger-container">
          <a @click="closePost()" class="shop icon icon-bag uil uil-newspaper"></a>
          </div>
          <a class="icon icon-logo" href="<?php echo BASE_URL . "?link=emir"; ?>"><img src="<?php echo LOGO; ?>"></a>
          <a href="<?php echo BASE_URL . "?link=emir"; ?>" class="shop icon icon-bag uil uil-estate"></a>
        </div>
        <div class="content">
            <div :class="['post-view', selected ? 'post-view--active' : '' , ready ? 'post-view--ready' : '' ]">
                <div class="post-view__image" :style="'background-image:url('+postImage+');clip-path:'+clipPath">
                </div>
                <div class="post-view__container" v-if="selected">
                  <div class="post-controls">
                    <div class="post-control post-control--close" @click="closePost()"><i class="uil uil-times"></i></div>
                    <div class="post-control" id="next-post" @click="nextPost()"><i class="uil uil-angle-right-b"></i></div>
                    <div class="post-control" id="prev-post" @click="prevPost()"><i class="uil uil-angle-left-b"></i></div>
                  </div>
                  <h2 class="post-view__title">{{currentPost.title}}</h2>
                  <h3 class="post-view__date">{{currentPost.date}}</h3>
                  <div class="post-view__content" v-html="currentPost.description"></div>
                </div>
              </div>
              <div :class="['post-list', selected ? 'post-list--hide' : '']">
                <div class="post" v-for="(item, index) in posts" v-on:mouseenter="changePost(index)" @click="selectedPost(index)">
                  <h2 class="post__title">{{item.title}} <span class="post__date">{{item.date}}</span></h2>
                </div>
              </div>
        </div>
      </div>

  
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.1/vue-resource.min.js'></script>

<script  src="./script.js"></script>

</body>
</html>
