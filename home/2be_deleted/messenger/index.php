<?php 

include('../../_inc/functions.php');
$conn = connect();

session_start();
auth();
logout();


$sql = mysqli_query($conn, "SELECT * FROM users WHERE token_id = '".$_SESSION['token_id']."' ");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">

    <link rel="shortcut icon" type="image/x-icon" href="img/EAlogo.svg">

    <title>ΛΞV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
    <link rel="stylesheet" href="./style.css">

    <style>
        .Navbar-menu-major a:hover {
            border-left: 3px solid green;
        }

        main {
            position: absolute;
        }

        canvas {
            position: fixed !important;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <nav class="Navbar">
        <a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
            data-target="#navbarCollapse"><span></span></a>

        <img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link"
            src="<?php echo LOGO;?>">

        <div id="navbarCollapse" class="Navbar-menu">


            <ul class="Navbar-menu-major"></ul>
            <div class="Navbar-menu-minor"></div>

        </div>



    </nav>

    <main id="main" class="users">

        <div class="app-container">
            <div class="app-content">
                <div class="app-contesnt-header" style="display:flex;">
                    <h1 class="app-content-headerText">Messenger</h1>
                    <div class="search app-content-actions-wrapper">
                        <input class="search-bar" placeholder="Search..." type="text">
                        <button style="display:none;"><i class="fas fa-search"></i></button>
                    </div>
                    <button class="mode-switch" title="Switch Theme" style="display:none;">
                        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                            <defs></defs>
                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                        </svg>
                    </button>
                </div>


                <div class="app-content-actions">
                    <h3 style="color: var(--app-content-main-color);">Friends</h3>
                    <div class="app-content-actions-wrapper">
                        <div class="filter-button-wrapper" style="display:none;">
                            <button class="action-button filter jsFilter"></button>
                        </div>
                        <button class="action-button list active" title="List View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6" />
                                <line x1="8" y1="12" x2="21" y2="12" />
                                <line x1="8" y1="18" x2="21" y2="18" />
                                <line x1="3" y1="6" x2="3.01" y2="6" />
                                <line x1="3" y1="12" x2="3.01" y2="12" />
                                <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
                        </button>
                        <button class="action-button grid" title="Grid View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" /></svg>
                        </button>
                    </div>
                </div>

                <div class="products-area-wrapper tableView users-list">

                </div>
            </div>
        </div>
        <!-- partial -->
    </main>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>

    <script src="./javascript/script.js"></script>
    <script src="./javascript/users.js"></script>
    <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>


</body>

</html>