<?php include('../../../../_inc/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>IDK</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./_assets/css/style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="window">

    <div class="header">
      <div class="burger-container">
        <div id="burger">
          <div class="bar topBar"></div>
          <div class="bar btmBar"></div>
        </div>
      </div>

      <a class="icon icon-logo" href="<?php echo BASE_URL . "?link=emir"; ?>"><img src="<?php echo LOGO; ?>"></a>

      <ul class="menu">
        <li class="menu-item"><input type="text" value="Search..." disabled></li>
          <li class="menu-item"><a href="#">Works</a></li>
          <li class="menu-item"><a href="./apps/articles/">Articles</a></li>
          <li class="menu-item"><a href="#">iPhone</a></li>
          <li class="menu-item"><a href="#">Watch</a></li>
          <li class="menu-item"><a href="#">TV</a></li>
          <li class="menu-item"><a href="./apps/photo/">Photography</a></li>
          <li class="menu-item"><a href="#">Support</a>
        </li>
      </ul>
      <div class="shop icon icon-bag uil uil-shopping-bag"></div>
    </div>

    <div id="bottombar">
      <div class="g-4">
        <div class="bar-container">
          <a>login</a> &nbsp; / &nbsp; 
          <a>register</a>
        </div>
      </div>

      <div class="m-4">
        <div class="bar-container"><a>bones</a> &nbsp; &nbsp; <span id="subaccounts_menu">
            <form name="subswitch" method="POST">
              <input type="hidden" name="auth_key" value="">
              <input type="hidden" name="UserName" value="">
              <input type="hidden" name="PassWord" value="">
              <input type="hidden" name="referer" value="">
              <select class="forminput" name="sub_id" onchange="this.form.submit()">
                <option value="------------" selected="selected">Switch Account</option>
                <option value="13">&nbsp;&nbsp;» cerberus greyback </option>
                <option value="12">&nbsp;&nbsp;» december rookwood </option>
                <option value="14">&nbsp;&nbsp;» pegasus lestrange </option>
              </select>
            </form>
          </span> &nbsp; &nbsp; &nbsp; &nbsp; 
          <a>controls</a> &nbsp; &nbsp; 
          <a>messages (0)</a> &nbsp; &nbsp; 
          <a>alerts (0)</a> &nbsp; &nbsp; 
          <a>logout</a> &nbsp; &nbsp; 
          <a target="_blank" class="acp-1">admin cp</a> &nbsp; &nbsp; 
          <input type="checkbox" name="lightmode" id="lightmode" onchange="toggleLightMode();"><label>light mode</label>
          </div>
      </div>
    </div>


    <div class="content">

    </div>
  </div>
  <!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js'></script>

  <script src="./_assets/js/script.js"></script>

</body>

</html>