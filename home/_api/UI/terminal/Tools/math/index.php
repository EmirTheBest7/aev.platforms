<?php 

header("Access-Control-Allow-Origin: *");

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>AEV Math</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="header">
  <div class="logo">
    <a href="#">Math</a>
  </div>  
  <nav>
    <form class="search" action="search.php"> 
      <input name="q" placeholder="Search..." type="search">
    </form>
    <ul>
      <li>
        <a href="">Home</a>
      </li>
      <li>
        <a href="">Functions</a>
        <ul class="mega-dropdown">
          <li class="row">
            <ul class="mega-col">
              <li><a onclick="loadExternalHTML('./functions/percentage.html');">Percentage</a></li>
              <li><a href="#">x</a></li>
              <li><a href="#">x</a></li>
              <li><a href="#">x</a></li>
            </ul>
          </li>
        </ul>        
      </li>
      <li class="dropdown d-none">
        <a href="">Contact</a>
          <ul>
            <li><a href="#">About Version</a></li>
            <li><a href="#">About Version</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
      </li>
    </ul>
  </nav>
</div>

<div class="container">
    <h1>Online kalkulačky a výpočty</h1>
    <p>Na našem webu naleznete online kalkulačky, vzorce, nákresy a mnoho dalšího pro matematické i jiné výpočty.</p>

    <div id="content">
      <button onclick="loadExternalHTML('./functions/percentage.html');" class="percentage">Procenta</button>
    </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>

  <script>
    function loadExternalHTML(fileUrl) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', fileUrl, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var content = document.getElementById('content');
            content.innerHTML = xhr.responseText;

            // Extract and execute script tags
            var scripts = content.getElementsByTagName('script');
            for (var i = 0; i < scripts.length; i++) {
                var script = document.createElement('script');
                script.text = scripts[i].innerHTML;
                document.head.appendChild(script).parentNode.removeChild(script);
            }
        }
    };
    xhr.send();
}
  </script>

</body>
</html>
