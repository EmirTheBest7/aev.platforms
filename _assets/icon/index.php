<?php require_once('../../_inc/functions.php'); ?>


<!-- Dynamic Icons -->
<?php 
// get today's date
$today = new DateTime();
//echo 'Today is: ' . $today->format('m-d-Y') . '<br />';

// get the season dates
$spring = new DateTime('March 20');
$summer = new DateTime('June 20');
$fall = new DateTime('September 22');
$winter = new DateTime('December 21');

// Add specific holidays
// Christmas == winter
$halloween = new DateTime('October 31');
// Hanookah //Datum: čt 7. 12. 2023 – pá 15. 12. 2023

function icon_template($icon_folder) {
    return '

    <link rel="canonical" href="https://aliev.io/page/main/">

    <link rel="alternate" href="https://aliev.io/page/main/" hreflang="en-US" />

    <meta name="robots" content="index, follow">
    <meta name="title" content="ΛΞV | Digital studio." />
    <meta name="description" content="We design and develop beautiful and effective digital products. Our smart innovations will make you shine online. Based in Prague.">
    <meta name="keywords" content="digital agency, developers, app development, website development, business innovation, Prague">
    <meta name="author" content="Λ L I Ξ V Platforms">

    <meta property="og:locale" content="en-US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Innovations and digital products ⋆ Λ L I Ξ V">
    <meta property="og:description" content="We design and develop beautiful and effective digital products. Our smart innovations will make you shine online. Based in Prague.">
    <meta property="og:url" content="https://aliev.io/">
    <meta property="og:site_name" content="Λ L I Ξ V">
    <meta property="og:image" content="https://aliev.io/_assets/img/pixelove.jpg">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Innovations and digital products ⋆ Λ L I Ξ V">
    <meta name="twitter:description" content="We design and develop beautiful and effective digital products. Our smart innovations will make you shine online. Based in Prague.">
    <meta name="thumbnail" content="https://aliev.io/_assets/img/pixelove.jpg">

    <link rel="manifest" href="/_assets/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#000">

    <link rel="shortcut icon" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/favicon.ico" type="image/x-icon" />

    <!-- Apple Icons -->
    <link rel="apple-touch-icon" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="'.BASE_URL . "_assets/icon/".$icon_folder.'/apple-touch-icon-180x180.png" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3Q5VQ2PV2F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag("js", new Date());

        gtag("config", "G-3Q5VQ2PV2F");
    </script>
    
    ';
}

switch(true) {
    case $today >= $spring && $today < $summer: // Jaro
        $icon_folder = "season1";
        echo icon_template($icon_folder);
        break;

    case $today >= $summer && $today < $fall: // Léto
        $icon_folder = "season3";
        echo icon_template($icon_folder);
        break;

    case $today >= $fall && $today < $winter: //Podzim
        $icon_folder = "season1";
        echo icon_template($icon_folder);
        break;

    default: // Kurwa Bober Zima
        $icon_folder = "season3";
        echo icon_template($icon_folder);
        break;  
}



?>