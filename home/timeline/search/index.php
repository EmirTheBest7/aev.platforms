<?php 
// Include configuration file 
require '../../../_inc/functions.php';
require_once 'config.php'; 
 
// Include User class
require_once 'User.class.php'; 
 
// Initialize User class 
$user = new User(); 
 
// Get members data from database 
$members = $user->getRows(); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">

    <link rel="stylesheet" href="./search.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
.btn {
    font-size: 1.5rem!important;
}
    </style>


    <script>
        function searchFilter() {
            $.ajax({
                type: 'POST',
                url: 'getData.php',
                data: 'keywords=' + $('#searchInput').val() + '&filter=' + $('#filterSelect').val(),
                beforeSend: function () {
                    $('.loading-overlay').show();
                },
                success: function (html) {
                    $('.loading-overlay').hide();
                    $('#userData').html(html);
                }
            });
        }
    </script>
</head>

<body>


<main id="main" class="search-main">  
    <header class="search-header">
      <nav class="search-nav">
        <div class="search">
          <!--script type="search" placeholder="Search or enter address">-->
          <input type="search" id="searchInput" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : '';?>" placeholder="By Name or Email">
        </div>
      </nav>
      <div style="height: 100%;">
            <button class="btn uil uil-search" id="searchButton" type="button" onclick="searchFilter();"></button>
        </div>
        <div class="form-group" style="display:none;">
            <select class="form-control" id="filterSelect" onchange="searchFilter();">
                <option value="" default>Sort By</option>
            </select>
        </div>
    </header>
    
      


  <article class="search-article">
    <div class="main-content">
        <div class="loading-overlay" style="display: none;">
            <div class="overlay-content">Loading.....</div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Results</th>
                </tr>
            </thead>
            <tbody id="userData">
                <!-- if Search: Display Search Data -->
            
            </tbody>
        </table>
    </div>
    </article>
</main>

<?php 
    if (isset($_GET['search'])) {
        echo "
        <script>
        searchFilter();
        
        // Clears parameter in URL
        window.history.replaceState(null, null, window.location.pathname);
        </script>";
    } 
?>

<script>

var search_input = document.getElementById("searchInput");
search_input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("searchButton").click();
  }
});

</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>
    
</body>

</html>
